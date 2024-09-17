<?php
/**
 * Helper Functions
 *
 * Filename:        helpers.php
 * Location:        ${FILE_LOCATION}
 * Project:         SaaS-FED-Notes
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

use JetBrains\PhpStorm\NoReturn;

/**
 * Get the base path
 *
 * BasePath function to provide accurate paths to files
 *
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


/**
 * Load a view
 *
 * @param string $name
 * @return void
 *
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name} not found!'";
    }
}


/**
 * Load a partial
 *
 * @param string $name
 * @return string
 *
 */
function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/views/partials/{$name}.view.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$name} not found!'";
    }
}


/**
 * Inspect a value(s)
 *
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s) and die
 *
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}


/**
 * Dump the values of one or more variables, objects or similar.
 *
 * @return void
 */
 function dump(): void
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
}

/**
 * Dump the values of one or more variables, objects or similar, then terminate the script.
 *
 * @return void
 */
 function dd(): void
{
    // Load the HTML header for formatting...
    loadPartial("header");
    echo "<section class='flex flex-col gap-8'>";
    array_map(function ($x) {

        echo "<pre class='border bg-gray-100 color-black m-2 p-2 rounded shadow text-sm'>";
        var_dump($x);
        echo "</pre>";
    }, func_get_args());
    echo "</section>";
    die();
}


/**
 * Sanitize Data
 *
 * @param string $dirty
 * @return string
 */
function sanitize(string $dirty): string
{
    // Sanitize the input while preserving new lines
    $sanitized = htmlspecialchars($dirty, ENT_QUOTES, 'UTF-8');
    // Replace escaped new lines with actual new lines and return result
    return str_replace(['&#10;', '&#13;'], ["\n", "\r"], $sanitized);
}

/**
 * Redirect to a given url
 *
 * @param string $url
 * @return void
 */
#[NoReturn] function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}