 <div class="navbar bg-base-200 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
            </div>
            <ul
                tabindex="-1"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a class="cursor-pointer" href="/ideas">Home</a></li>
                <li><a class="cursor-pointer" href="/ideas/create">New Idea</a></li>
            </ul>
            </div>
            <a class="btn btn-ghost text-xl">Idea</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a class="cursor-pointer" href="/ideas">Home</a></li>
                <li><a class="cursor-pointer" href="/ideas/create">New Idea</a></li>
            </ul>
        </div>
        <div class="navbar-end space-x-2">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                            Log Out
                        </span>
                    </button>
                </form>
            @auth
                <a href="/register" class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                        Register
                    </span>
                </a>
                <a href="/login" class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                        Login
                    </span>
                </a>
            @endauth
        </div>
    </div>
