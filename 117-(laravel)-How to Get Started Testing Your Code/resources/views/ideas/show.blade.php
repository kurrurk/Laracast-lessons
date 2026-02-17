<x-layout>
    <div class="card bg-base-300 text-neutral-content p-6">
        <div class="text-gray-400">
            <h2 class="mb-3 pb-1 border-b-1 border-gray-400 text-white font-bold">Your Idea</h2>
            <div class="mt-6">{{ $idea->description }}</div>
        </div>
        <div>
            <a data-test="edit-button" href="/ideas/{{ $idea->id }}/edit" class="relative rounded-sm inline-flex items-center justify-center p-0.5 mt-6 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-3 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                    Edit
                </span>
            </a>
        </div>
    </div>
</x-layout>
