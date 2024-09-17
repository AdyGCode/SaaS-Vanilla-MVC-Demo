<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        ProductController.php
 * Location:
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    22/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Framework\Authorisation;
use Framework\Database;
use Framework\Session;
use Framework\Validation;
use JetBrains\PhpStorm\NoReturn;
use League\HTMLToMarkdown\HtmlConverter;
use Parsedown;


class ProductController
{

    protected Database $db;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }


    /**
     * Produce home page
     *
     * @return void
     * @throws \Exception
     */
    public function index(): void
    {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";

        $products = $this->db->query($sql)->fetchAll();

        loadView('products/index', [
            'products' => $products
        ]);
    }


    /**
     * Show the create product form
     *
     * @return void
     */
    public function create(): void
    {
        loadView('products/create');
    }


    /**
     * Show a single product
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function show(array $params): void
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $sql = 'SELECT * FROM products WHERE id = :id';
        $product = $this->db->query($sql, $params)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            return;
        }

        loadView('products/show', [
            'product' => $product
        ]);
    }

    /**
     * Store data in database
     *
     * @return void
     * @throws \Exception
     */
    #[NoReturn] public function store()
    {
        $allowedFields = ['name', 'description', 'price'];

        $newProductData = array_intersect_key($_POST, array_flip($allowedFields));

        $newProductData['user_id'] = Session::get('user')['id'];

        $newProductData = array_map('sanitize', $newProductData);

        $requiredFields = ['name', 'price'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newProductData[$field]) || !Validation::string($newProductData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            // Reload view with errors
            loadView('products/create', [
                'errors' => $errors,
                'product' => $newProductData
            ]);
        }


        // accept the Markdown from the form and store as HTML
        if (isset($newProductData['description'])) {
            $description = $newProductData['description'] ?? '';
            // Normalize line endings to \n
            $description = preg_replace('/\r\n|\r|\n/', "\n", $description);

            // Split the Markdown content by double new lines to handle paragraphs
            $paragraphs = preg_split('/\n{2,}/', $description);


            $parsedown = new Parsedown();
            // Convert each paragraph to HTML
            $finalHtml = '';
            foreach ($paragraphs as $paragraph) {
                $trimmedParagraph = trim($paragraph);
                if ($trimmedParagraph !== '') {
                    $html = $parsedown->text($trimmedParagraph);
                    if (!preg_match('/^<(h[1-6]|ul|ol|li|blockquote|pre|table|div|p)/i', $html)) {
                        $finalHtml .= '<p>' . $html . '</p>';
                    } else {
                        $finalHtml .= $html;
                    }
                }
            }
            $newProductData['description'] = $finalHtml;
        }


        // Save the submitted data
        $fields = [];

        foreach ($newProductData as $field => $value) {
            $fields[] = $field;
        }

        $fields = implode(', ', $fields);

        $values = [];

        foreach ($newProductData as $field => $value) {
            // Convert empty strings to null
            if ($value === '') {
                $newProductData[$field] = null;
            }
            $values[] = ':' . $field;
        }

        $values = implode(', ', $values);

        $insertQuery = "INSERT INTO products ({$fields}) VALUES ({$values})";

        $this->db->query($insertQuery, $newProductData);

        Session::setFlashMessage('success_message', 'Product created successfully');

        redirect('/products');
    }

    /**
     * Show the product edit form
     *
     * @param array $params
     * @return null
     * @throws \Exception
     */
    public function edit(array $params): null
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $product = $this->db->query('SELECT * FROM products WHERE id = :id', $params)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            exit();
        }

        // Authorisation
        if (!Authorisation::isOwner($product->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorized to update this product');
            return redirect('/products/' . $product->id);
        }

        $converter = new HtmlConverter();

        $product->description = $converter->convert($product->description ?? '');

        loadView('products/edit', [
            'product' => $product
        ]);
        return null;
    }

    /**
     * Update a product
     *
     * @param array $params
     * @return null
     * @throws \Exception
     */
    #[NoReturn] public function update(array $params): null
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $product = $this->db->query('SELECT * FROM products WHERE id = :id', $params)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            exit();
        }

        // Authorisation
        if (!Authorisation::isOwner($product->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorised to update this product');
            return redirect('/products/' . $product->id);
        }

        $allowedFields = ['name', 'description', 'price'];

        $updateValues = array_intersect_key($_POST, array_flip($allowedFields)) ?? [];

        $updateValues = array_map('sanitize', $updateValues);

        $requiredFields = ['name', 'price'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('products/edit', [
                'product' => $product,
                'errors' => $errors
            ]);
            exit;
        }

        if (isset($updateValues['description'])) {
            $description = $updateValues['description'] ?? '';
            // Normalize line endings to \n
            $description = preg_replace('/\r\n|\r|\n/', "\n", $description);

            // Split the Markdown content by double new lines to handle paragraphs
            $paragraphs = preg_split('/\n{2,}/', $description);


            $parsedown = new Parsedown();
            // Convert each paragraph to HTML
            $finalHtml = '';
            foreach ($paragraphs as $paragraph) {
                $trimmedParagraph = trim($paragraph);
                if ($trimmedParagraph !== '') {
                    $html = $parsedown->text($trimmedParagraph);
                    if (!preg_match('/^<(h[1-6]|ul|ol|li|blockquote|pre|table|div|p)/i', $html)) {
                        $finalHtml .= '<p>' . $html . '</p>';
                    } else {
                        $finalHtml .= $html;
                    }
                }
            }
            $updateValues['description'] = $finalHtml;
        }

        // Submit to database
        $updateFields = [];

        foreach (array_keys($updateValues) as $field) {
            $updateFields[] = "{$field} = :{$field}";
        }

        $updateFields = implode(', ', $updateFields);

        $updateQuery = "UPDATE products SET $updateFields WHERE id = :id";

        $updateValues['id'] = $id;
        $this->db->query($updateQuery, $updateValues);

        // Set flash message
        Session::setFlashMessage('success_message', 'Product updated');

        redirect('/products/' . $id);

    }


    /**
     * Search products by keywords/location
     *
     * @return void
     * @throws \Exception
     */
    public function search(): void
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

        $query = "SELECT * FROM products WHERE name LIKE :keywords OR description LIKE :keywords ";

        $params = [
            'keywords' => "%{$keywords}%",
        ];

        $products = $this->db->query($query, $params)->fetchAll();

        loadView('/products/index', [
            'products' => $products,
            'keywords' => $keywords,
        ]);
    }

}