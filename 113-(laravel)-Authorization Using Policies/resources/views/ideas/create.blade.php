<x-layout>
    <div class="card bg-base-300 text-neutral-content p-6">
    <form method="POST" action="/ideas">
        @csrf
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Create new Idea</label>
            <div class="mt-2">
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    class="textarea bg-base-300 w-full @error('description') textarea-error @enderror"
                ></textarea>
                {{-- @if($errors->has('description'))
                    <div class="bg-red-800 bg-opacity-5 text-sm/6 border-1 border border-orange-500 text-red-100 px-4 py-2 mt-2 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $errors->first('description') }}</span>
                    </div>
                @endif --}}
               <x-forms.error name="description" />
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an Idea you want to save later?</p>
        </div>
        <div class="mt-6 flex items-center justify-start gap-x-6">
            {{-- <button type="button" class="text-sm/6 font-semibold text-white cursor-pointer">Cancel</button> --}}
            <button class="relative rounded-sm inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-3 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                <span class="relative rounded-sm px-4 py-2.5 transition-all ease-in duration-75 bg-base-100 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                    Save
                </span>
            </button>
        </div>
    </form>
</div>
</x-layout>
