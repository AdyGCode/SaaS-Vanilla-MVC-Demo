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
    <section class="container mx-auto p-4 mt-4">
        <div class="px-8 py-6 bg-red-600 text-white flex justify-between rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mr-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742
                          2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012
                          0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                          clip-rule="evenodd"/>
                </svg>
                <div class="flex flex-col items-left gap-4">
                    <p class="text-4xl font-bold ">
                        <?= $status ?>
                    </p>
                    <p class="text-2xl font-semibold ">
                        <?= $message ?>
                    </p>
                    <p>
                        <a class="underline underline-offset-2
                                  hover:text-black transition ease-in-out duration-500"
                           href="/products">Go Back To Products</a>
                    </p>
                </div>
            </div>

        </div>

    </section>
<?php

loadPartial('footer');