<?php

require (__DIR__ . '/../partials/head.php');
require (__DIR__ . '/../partials/nav.php');
require (__DIR__ . '/../partials/banner.php');

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul class="list-disc">
            <?php foreach ($notes as $note): ?>
                <a href="/note?id=<?= $note['id'] ?>">
                    <li class="mb-1 font-bold text-blue-400 hover:underline"><?= $note['note'] ?></li>
                </a>
            <?endforeach ?>
        </ul>
        <a href="/notes/create">
            <button type="button" class="mt-4 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create a Note</button>
        </a>
    </div>
</main>

<?php

require (__DIR__ . '/../partials/footer.php')

?>