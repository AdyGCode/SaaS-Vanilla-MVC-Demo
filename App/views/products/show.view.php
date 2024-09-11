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
        <section class="w-full bg-white shadow rounded p-4 flex flex-col gap-4">
            <h4 class="-mx-4 bg-zinc-700 text-zinc-200 text-2xl p-4 -mt-4 mb-4 rounded-t flex-0 flex justify-between">
                <?= $product->name ?>
            </h4>

            <section class="flex-grow flex flex-row">
                <h5 class="text-lg font-bold w-1/6 min-w-1/6">
                    Image:
                </h5>
                <p class="grow">
                    <img class="w-64 h-64 rounded-lg"
                         src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                         alt="">
                </p>
            </section>

            <section class="flex-grow flex flex-row">
                <h5 class="text-lg font-bold w-1/6 min-w-1/6">
                    Description:
                </h5>
                <section class="parsedown grow max-w-96 text-zinc-600 text-lg">
                    <?= $product->description ?>
                </section>
            </section>

            <section class="flex-grow flex flex-row">
                <h5 class="text-lg font-bold w-1/6 min-w-1/6">
                    Price:
                </h5>
                <p class="grow text-lg text-zinc-600">
                    $<?= $product->price / 100 ?>
                </p>
            </section>

            <?php
            if (Framework\Authorisation::isOwner($product->user_id)) :
                ?>
                <form method="POST"
                      class="px-4 py-4 mt-4 -mx-4 border-0 border-t-1 border-zinc-300 text-lg flex flex-row">
                    <span class="w-1/6 min-w-1/6"></span>
                    <a href="/products/edit/<?= $product->id ?>"
                       class="px-16 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded transition ease-in-out duration-500">
                        Edit
                    </a>

                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                            class="ml-8 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded transition ease-in-out duration-500">
                        Delete
                    </button>
                </form>

            <?php
            endif;
            ?>

        </section>

    </article>
</main>


<?php
require_once basePath("App/views/partials/footer.view.php");
?>

