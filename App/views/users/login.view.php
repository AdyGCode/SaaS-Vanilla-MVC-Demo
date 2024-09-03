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

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg
                 flex justify-center items-center mt-8 w-1/2 ">

        <section class="bg-white p-8 rounded-lg shadow-md md:w-500 mx-6 w-full">

            <h2 class="text-4xl text-left font-bold mb-4">
                Login
            </h2>

            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <form method="POST" action="/auth/login">

                <section class="mb-4">
                    <label for="Email" class="mt-4 pb-1">Email:</label>
                    <input type="email" id="Email"
                           name="email" placeholder="Email Address"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                           value="<?= $user['email'] ?? '' ?>"/>
                </section>

                <section class="mb-4">
                    <label for="Password" class="mt-4 pb-1">Password:</label>
                    <input type="password" id="Password"
                           name="password" placeholder="Password"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"/>
                </section>

                <section class="mb-4">

                    <button type="submit"
                            class="w-full bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded
                                   focus:outline-none transition ease-in-out duration-500">
                        Login
                    </button>
                </section>

                <section class="mb-4">
                    <p class="mt-8 text-zinc-700">
                        So you are not a member...
                        <a class="bg-sky-900 hover:bg-sky-600 text-white px-1 pb-1 rounded
                              transition ease-in-out duration-500"
                           href="/auth/register">Register</a> now!
                    </p>
                </section>

            </form>

        </section>
    </main>

<?php
loadPartial('footer');

