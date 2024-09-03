<?php
/**
 * Flash Message Partial
 *
 * Filename:        message.view.php
 * Location:        App/views/partials
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    23/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

use Framework\Session;

$successMessage = Session::getFlashMessage('success_message');
if ($successMessage !== null) : ?>
    <div class="flex w-full shadow-lg rounded-lg my-4">
        <div class="bg-green-600 py-2 px-6 rounded-l-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current" viewBox="0 0 16 16" width="20"
                 height="20">
                <path fill-rule="evenodd"
                      d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6
                      10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
            </svg>
        </div>
        <div class="px-4 py-2 bg-white rounded-r-lg flex justify-between items-center w-full border
                    border-l-transparent border-gray-200">
            <?= $successMessage ?>
        </div>
    </div>
<?php
endif;

$errorMessage = Session::getFlashMessage('error_message');
if ($errorMessage !== null) : ?>
    <div class="flex w-full shadow-lg rounded-lg my-4">
        <div class="bg-red-600 py-2 px-6 rounded-l-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20"
                 height="20">
                <path fill-rule="evenodd"
                      d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0
                      01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75
                      0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8
                      4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z">
                </path>
            </svg>
        </div>
        <div class="px-4 py-2 bg-white rounded-r-lg flex justify-between items-center w-full border
                    border-l-transparent border-gray-200">
            <?= $errorMessage ?>
        </div>
    </div>
<?php
endif;
