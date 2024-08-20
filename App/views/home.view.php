<?php
require_once basePath("App/views/partials/header.view.php");

loadPartial('navigation');

?>

<main class="container mx-auto bg-gray-100 py-8 px-4 flex flex-col min-h-screen shadow shadow-black/25 rounded-b-lg">
    <article class="flex-1">
        <header class="bg-gray-700 text-gray-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h1>Testing</h1>
        </header>
        <section>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci aut cumque dignissimos est fugit
                numquam quasi reprehenderit, sed ut? Blanditiis consectetur ipsum necessitatibus nihil officiis quaerat
                ratione soluta vel.</p>
        </section>

    </article>
</main>


<?php
require_once basePath("App/views/partials/footer.view.php");
?>
