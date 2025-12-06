<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <form method="post" action="/notes">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Neue Notiz</label>
                            <div class="mt-2">
                                <textarea id="body"
                                          name="body"
                                          rows="3"
                                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                          placeholder="Füge dein Notiz hier ein..."
                                          required
                                ><?= $_POST['body'] ?? ''; ?></textarea>
                                <?php if (isset($errors['body'])) : ?>

                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-10 rounded relative" role="alert">
                                        <span class="absolute top-0 bottom-0 left-0 px-4 py-3">
                                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span class="block sm:inline ml-10"><?= $errors['body']; ?></span>
                                    </div>

                                <?php endif; ?>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Schreiben Sie ein paar Sätze</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" type="button" class="text-sm font-semibold leading-6 text-gray-900">Abrechen</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Speichern</button>
            </div>
        </form>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
