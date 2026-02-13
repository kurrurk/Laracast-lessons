<x-layout>
    <form action="/login" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4 mx-auto">
            <legend class="fieldset-legend">Log In</legend>

            <label class="label">Email</label>
            <input type="email" class="input w-full" name="email" placeholder="Your Email" required/>
            <x-forms.error name="email"/>

            <label class="label">Password</label>
            <input type="password" class="input w-full" name="password" placeholder="Password" required/>
            <x-forms.error name="password"/>

            <div class="button-wrapper mt-4 inline-flex items-center justify-center">
                <button class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative rounded-sm px-8 py-2 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                        Log In
                    </span>
                </button>
            </div>
        </fieldset>
    </form>
</x-layout>
