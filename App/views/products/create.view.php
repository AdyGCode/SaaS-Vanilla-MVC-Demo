<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        index.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */


loadPartial("header");

loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
            <h1 class="grow text-2xl font-bold ">Products - Add</h1>
            <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                <a href="/products/create">Add Product</a>
            </p>
        </header>
        <section>
            <form method="POST" action="/products">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                    Product Information
                </h2>
                <?= loadPartial('errors', [
                    'errors' => $errors ?? []
                ]) ?>
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Product Name"
                           class="w-full px-4 py-2 border rounded focus:outline-none"
                           value="<?= $listing['title'] ?? '' ?>"/>
                </div>
                <div class="mb-4">
                    <textarea name="description" placeholder="Product Description"
                              class="w-full px-4 py-2 border rounded focus:outline-none"><?= $listing['description'] ?? '' ?></textarea>
                </div>
                <div class="mb-4">
                    <input type="text" name="price" placeholder="Price"
                           class="w-full px-4 py-2 border rounded focus:outline-none"
                           value="<?= $listing['salary'] ?? '' ?>"/>
                </div>
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3
                rounded focus:outline-none">
                    Save
                </button>
                <a href="/"
                   class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
                    Cancel
                </a>
            </form>
        </section>

    </article>
</main>


<?php
loadPartial("footer");
?>

