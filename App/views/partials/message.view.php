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
    <div class="message bg-green-600 text-green-50 p-3 my-3">
        <?= $successMessage ?>
    </div>
<?php
endif;

$errorMessage = Session::getFlashMessage('error_message');
if ($errorMessage !== null) : ?>
    <div class="message bg-red-600 text-red-50 p-3 my-3 rounded">
        <?= $errorMessage ?>
    </div>
<?php
endif;
