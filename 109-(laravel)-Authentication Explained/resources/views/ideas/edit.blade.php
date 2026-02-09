<x-layout>
    <div class="card bg-base-300 text-neutral-content p-6">
        <form method="POST" action="/ideas/{{ $idea->id }}">
            @csrf
            @method('PATCH')
            <div class="col-span-full">
                <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
                <div class="mt-2">
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="textarea bg-base-300 w-full @error('description') textarea-error @enderror"
                    >{{ $idea->description }}</textarea>
                    <x-forms.error name="description" />
                </div>
            </div>
            <div class="mt-6 flex items-center justify-start gap-x-6">
                {{-- <button type="button" class="text-sm/6 font-semibold text-white cursor-pointer">Cancel</button> --}}
                <button type="submit" class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                        Update
                    </span>
                </button>
                <button type="submit" form="delete-idea-form" class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-3 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                        Delete
                    </span>
                </button>
            </div>
        </form>
        <form id="delete-idea-form" method="POST" action="/ideas/{{ $idea->id }}">
            @csrf
            @method('delete')
        </form>
    </div>
</x-layout>
