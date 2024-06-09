    <?php require base_path('views/partials/head.php'); ?>

    <?php require base_path('views/partials/nav.php'); ?>

    <?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p class="mb-8">
                <a href="/notes" class="text-blue-600 hover:underline">Zurük zum Notizenlist.</a>
            </p>

            <p><?= htmlspecialchars($note['body']); ?></p>

            <form class="mt-6" method="post">
                <input type="hidden" name="id" value="<?= $note['id']; ?>">
                <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Notiz löschen
                </button>
            </form>
        </div>
    </main>

    <?php require base_path('views/partials/footer.php'); ?>