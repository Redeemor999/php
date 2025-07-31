<?php

require (__DIR__ . '/../partials/head.php');
require (__DIR__ . '/../partials/nav.php');
require (__DIR__ . '/../partials/banner.php');

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="/notes/edit" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="note" value="<?= $heading ?>">
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Edit</button>
        </form>
        <form action="/notes/destroy" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value=<?= $_GET['id'] ?>>
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Delete</button>
        </form>
    </div>
</main>

<?php

require (__DIR__ . '/../partials/footer.php')

?>