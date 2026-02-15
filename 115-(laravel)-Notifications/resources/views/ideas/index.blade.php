<x-layout>
    @if ($ideas->count()) {{-- Such syntax is possible because `$ideas` is a collection. --}}

        <div class="pt-3 mt-3 text-gray-400">
            <h2 class="mb-3 pb-1 border-b-1 border-gray-400 text-white font-bold">Your Ideas</h2>
            <div class="mt-6 grid grid-cols-2 gap-x-6 gap-y-6">
                @foreach ($ideas as $idea)

                <x-idea-card href="/ideas/{{ $idea->id }}">
                    {{ $idea->description }}
                </x-idea-card>

                @endforeach
            </div>
        </div>
    @else
        <p class="text-gray-400 text-sm">No ideas yet. <a class="text-indigo-400 hover:text-indigo-300 underline" href="/ideas/create">Create a new one.</a></p>
    @endif
    <div class="new-idea-wrapper w-full mt-9 pt-6 border-t-1 border-dashed border-gray-600">
        <a href="/ideas/create" class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative flex rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Idea
            </span>
        </a>
    </div>
</x-layout>
