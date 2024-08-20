<?php
require_once basePath("App/views/partials/header.view.php");

loadPartial('navigation');

?>

<main class="container mx-auto bg-gray-100 py-8 px-4 flex flex-col min-h-screen shadow shadow-black/25 rounded-b-lg">
    <article class="flex-1">
        <header class="bg-gray-700 text-gray-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h1>WHOOPSIE!</h1>
        </header>
        <section class="text-lg">
            <p>Sorry to say that the cat did a whoopsie and could not find the file you were looking for...</p>
        </section>

    </article>
</main>


<?php
require_once basePath("App/views/partials/footer.view.php");
?>
