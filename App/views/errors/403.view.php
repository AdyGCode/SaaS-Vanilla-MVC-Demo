<?php
require_once basePath("App/views/partials/header.view.php");

loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
    <article>
        <header class="bg-text-zinc-700-700 text-text-zinc-700-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h1>Bad User</h1>
        </header>

        <section class="text-lg">
            <p>You are not allowed to visit this page...</p>
        </section>

    </article>
</main>


<?php
require_once basePath("App/views/partials/footer.view.php");
?>
