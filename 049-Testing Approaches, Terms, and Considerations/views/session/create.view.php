    <?php view('partials/head.php'); ?>

    <?php view('partials/nav.php'); ?>

    <?php view('partials/banner.php', ['heading' => $heading]); ?>
    
    <main>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <svg class="mx-auto h-10 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 40" fill="none">
                    <path fill="#4f46e5" d="M23.5 6.5C17.5 6.5 13.75 9.5 12.25 15.5C14.5 12.5 17.125 11.375 20.125 12.125C21.8367 12.5529 23.0601 13.7947 24.4142 15.1692C26.6202 17.4084 29.1734 20 34.75 20C40.75 20 44.5 17 46 11C43.75 14 41.125 15.125 38.125 14.375C36.4133 13.9471 35.1899 12.7053 33.8357 11.3308C31.6297 9.09158 29.0766 6.5 23.5 6.5ZM12.25 20C6.25 20 2.5 23 1 29C3.25 26 5.875 24.875 8.875 25.625C10.5867 26.0529 11.8101 27.2947 13.1642 28.6693C15.3702 30.9084 17.9234 33.5 23.5 33.5C29.5 33.5 33.25 30.5 34.75 24.5C32.5 27.5 29.875 28.625 26.875 27.875C25.1633 27.4471 23.9399 26.2053 22.5858 24.8307C20.3798 22.5916 17.8266 20 12.25 20Z"/>
                    <defs>
                        <linearGradient id="%%GRADIENT_ID%%" x1="33.999" x2="1" y1="16.181" y2="16.181" gradientUnits="userSpaceOnUse">
                            <stop stop-color="%%GRADIENT_TO%%"/>
                            <stop offset="1" stop-color="%%GRADIENT_FROM%%"/>
                        </linearGradient>
                    </defs>
                </svg>
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">In Ihr Konto einloggen</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="/session" method="POST" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">E-Mail-Adresse</label>
                        <div class="mt-2">
                            <input  id="email" 
                                    type="email" 
                                    name="email" 
                                    required 
                                    autocomplete="email" 
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                                    value="<?= old('email'); ?>"/>
                        </div>                        
                    </div>

                    <div>
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Passwort</label>
                        <div class="mt-2">
                            <input  id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password" 
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        <?php if (isset($errors['email'])): ?>
                            <div class="flex items-center p-4 mt-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium"><?= $errors['email'] ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($errors['password'])): ?>
                            <div class="flex items-center p-4 mt-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium"><?= $errors['password'] ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Einloggen</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <?php view('partials/footer.php'); ?>