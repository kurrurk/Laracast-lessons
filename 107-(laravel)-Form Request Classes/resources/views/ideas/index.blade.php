<x-layout>
    @if ($ideas->count()) {{-- Such syntax is possible because `$ideas` is a collection. --}}

        <div class="pt-3 mt-3 text-gray-400">
            <h2 class="mb-3 pb-1 border-b-1 border-gray-400 text-white font-bold">Your Ideas</h2>
            <ul>
                @foreach ($ideas as $idea)

                <li class="text-gray-400 text-sm">
                    <a class="hover:text-gray-300" href="/ideas/{{ $idea->id }}">{{ $idea->description }}</a>
                </li>

                @endforeach
            </ul>
        </div>
    @else
        <p class="text-gray-400 text-sm">No ideas yet. <a class="text-indigo-400 hover:text-indigo-300 underline" href="/ideas/create">Create a new one.</a></p>
    @endif
</x-layout>
