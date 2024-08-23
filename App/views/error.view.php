<?php
/**
 * Error Message View
 *
 * Filename:        error.view.php
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
    <section>
        <div class="container mx-auto p-4 mt-4">
            <div class="text-center text-3xl mb-4 font-bold bg-red-500 text-white border border-red-500 rounded p-3"><?= $status ?></div>
            <p class="text-center text-2xl mb-4">
                <?= $message ?>
            </p>
            <a class="block text-center" href="/products">Go Back To Products</a>
        </div>
    </section>
<?php

loadPartial('footer');