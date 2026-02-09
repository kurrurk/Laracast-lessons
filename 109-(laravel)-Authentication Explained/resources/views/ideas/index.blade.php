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
</x-layout>
