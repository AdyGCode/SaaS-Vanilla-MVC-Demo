<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        login.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    23/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation'); ?>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">

        <div class="bg-white p-8 rounded-lg shadow-md mx-6">
            <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>
            <form method="POST" action="/auth/login">
                <div class="mb-4">
                    <input type="text" name="email" placeholder="Email Address"
                           class="w-full px-4 py-2 border rounded focus:outline-none"/>
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password"
                           class="w-full px-4 py-2 border rounded focus:outline-none"/>
                </div>
                <button type="submit"
                        class="w-full bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded focus:outline-none transition ease-in-out duration-500">
                    Login
                </button>

                <p class="mt-4 text-zinc-700">
                    Don't have an account?
                    <a class="text-sky-700" href="/auth/register">Register</a>
                </p>
            </form>
        </div>
    </main>

<?php
loadPartial('footer');

