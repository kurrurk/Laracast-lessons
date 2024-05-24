    <?php require('views/partials/head.php'); ?>

    <?php require('views/partials/nav.php'); ?>

    <?php require('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p><?= htmlspecialchars($note['body']); ?></p>
            <p class="mt-6">
                <a href="/notes" class="text-blue-600 hover:underline">Zurük zum Notizenlist.</a>
            </p>
        </div>
    </main>

    <?php require('views/partials/footer.php'); ?>