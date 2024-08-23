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


loadpartial("header");
loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
            <h1 class="grow text-2xl font-bold ">Products - Detail</h1>
            <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                <a href="/products/create">Add Product</a>
            </p>

        </header>
        <section class="max-w-192 min-w-64 bg-white shadow rounded p-2 flex flex-col">
            <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0 flex justify-between">
                <h4>
                    <?= $product->name ?>
                </h4>
                <?php if (Framework\Authorisation::isOwner($product->user_id)) : ?>
                    <div class="flex space-x-4 ml-4">
                        <a href="/products/edit/<?= $product->id ?>"
                           class="px-8 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded transition ease-in-out duration-500">
                            Edit
                        </a>
                        <!-- Delete Form -->
                        <form method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded transition ease-in-out duration-500">Delete</button>
                        </form>
                        <!-- End Delete Form -->
                    </div>
                <?php endif; ?>
            </header>

            <section class="flex-grow grid grid-cols-12">
                <p class="ml-4 col-span-2">
                    <img class="w-24 h-24 " src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                         alt="">
                </p>
                <p class="col-span-10 text-zinc-600"><?= $product->description ?></p>
            </section>

            <footer class="-mx-2 bg-zinc-200 text-zinc-900 text-lg px-4 py-1 mt-4 -mb-2 rounded-b flex-0">
                <p>Price: $<?= $product->price / 100 ?></p>
            </footer>

        </section>

    </article>
</main>


<?php
require_once basePath("App/views/partials/footer.view.php");
?>

