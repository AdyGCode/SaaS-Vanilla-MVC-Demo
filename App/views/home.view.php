<?php
/**
 * Home Page View
 *
 * Filename:        home.view.php
 * Location:        /App/views
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    23/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h1>Vanilla PHP MVC Demo</h1>
        </header>
        <section class="flex flex-row flex-wrap justify-center my-8 gap-8">

            <section class="w-1/4 bg-zinc-700 text-sky-300 shadow rounded p-2 flex flex-row">
                <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-sky-800 text-white text-lg p-4 -my-2 rounded-l">
                    Products:
                </h4>
                <p class="grow text-4xl ml-6">
                    <?= $productCount->total ?>
                </p>
            </section>

            <section class="w-1/4 bg-zinc-700 text-red-300 shadow rounded p-2 flex flex-row">
                <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-red-800 text-white text-lg p-4 -my-2 rounded-l">
                    Users:
                </h4>
                <p class="grow text-4xl ml-6">
                    <?= $userCount->total ?>
                </p>
            </section>

        </section>

        <section class="my-8 flex flex-wrap gap-8 justify-center">

            <?php
            foreach ($products as $product):
                ?>
                <!--            article>(header>h4{Name})+(section>p{Description})+(footer>p{Price})-->
                <article class="max-w-96 min-w-64 bg-white border border-zinc-400 shadow rounded flex flex-col overflow-hidden">
                    <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 rounded-t flex-0">
                        <h4>
                            <?= $product->name ?>
                        </h4>
                    </header>
                    <img class="h-56 w-full object-cover" src="https://picsum.photos/640/480"
                         alt="">
                    <section class="flex-grow p-4">
                        <div class="text-zinc-600 bg-white parsedown">
                            <?= $product->description ?>
                        </div>
                    </section>
                    <footer class="-mx-2 bg-zinc-200 text-zinc-900 text-sm px-4 py-4 -mb-2 rounded-b flex-0 flex justify-between">
                        <p class="">Price: $<?= $product->price / 100 ?></p>
                        <a href="/products/<?= $product->id ?>"
                           class="">
                            More details...
                        </a>
                    </footer>
                </article>

            <?php
            endforeach
            ?>
        </section>

        <section  class="mx-auto w-1/2 m-8 bg-zinc-200 text-zinc-800 p-8 rounded-lg shadow">
            <dl class="flex flex-col gap-2">
                <dt>Tutorial:</dt>
                <dd>Part 1:
                    <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07">
                        https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
                    </a>
                </dd>
                <dd>Part 2:
                    <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07">
                        https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
                    </a>
                </dd>
                <dt>Source Code:</dt>
                <dd>
                    <a href="https://github.com/AdyGCode/SaaS-Vanilla-MVC-Demo">
                        https://github.com/AdyGCode/SaaS-Vanilla-MVC-Demo
                    </a>
                </dd>
                <dt>HelpDesk</dt>
                <dd><a href="https://help.screencraft.net.au"></a></dd>
                <dt>HelpDesk FAQs</dt>
                <dd><a href="https://help.screencraft.net.au"></a>
                </dd>
                <dt>Make a HelpDesk Request (TAFE Students only)</dt>
                <dd><a href="https://help.screencraft.net.au"></a></dd>
            </dl>

        </section>

    </article>
</main>


<?php
loadPartial('footer');
?>
