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

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
            <h1 class="grow text-2xl font-bold ">Products - Edit</h1>
            <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                <a href="/products/create">Edit Product</a>
            </p>
        </header>

        <section>

        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>

            <form id="ProductForm" method="POST" action="/products/<?= $product->id ?>">
                <input type="hidden" name="_method" value="PUT">

                <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                    Product Information
                </h2>

                <div class="mb-4">
                    <input id="Name" type="text" name="name" placeholder="Product Name"
                           class="w-full px-4 py-2 border rounded focus:outline-none"
                           value="<?= $product->name ?? '' ?>"/>
                </div>

                <div class="mb-4">
                    <div id="toolbar"></div>
                    <textarea id="Description" name="description" placeholder="Product Description"
                          class="w-full px-4 py-2 border border-zinc-500 rounded focus:outline-none"
                         ><?= $product->description ?? '' ?></textarea>
                </div>

                <div class="mb-4">
                    <input id="Price" type="text" name="price" placeholder="Price"
                           class="w-full px-4 py-2 border rounded focus:outline-none"
                           value="<?= $product->price ?? '' ?>"/>
                </div>

                <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3
                               rounded focus:outline-none">
                    Save
                </button>

                <a href="/products/<?= $product->id ?>"
                   class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded
                      focus:outline-none">
                    Cancel
                </a>

            </form>

        </section>

    </article>
</main>


<?php
loadPartial("footer");

