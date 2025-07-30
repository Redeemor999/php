<?php

require (__DIR__ . '/../partials/head.php');
require (__DIR__ . '/../partials/nav.php');
require (__DIR__ . '/../partials/banner.php');

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="/note/store" method="POST">
            <div class="col-span-full">
            <label for="note" class="block text-sm/6 font-medium text-gray-900">Note:</label>
            <div class="mt-2">
                <textarea id="note" name="note" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?php if(!empty($note)): ?><?= $note ?><?php endif ?></textarea>
            </div>
            <?php if (!empty($errors)): ?>
                <p class="mt-3 text-sm/6 text-gray-600 text-red-500"><?= $errors ?></p>
            <?php endif ?>  
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</main>

<?php

require (__DIR__ . '/../partials/footer.php')

?>