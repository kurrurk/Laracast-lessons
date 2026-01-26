<x-layout>
    <form method="POST" action="/ideas">
        @csrf
        <div class="col-span-full">
          <label for="idea" class="block text-sm/6 font-medium text-white">New Idea</label>
          <div class="mt-2">
            <textarea id="idea" name="idea" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-400">Have an Idea you want to save later?</p>
        </div>
        <div class="mt-6 flex items-center justify-start gap-x-6">
            {{-- <button type="button" class="text-sm/6 font-semibold text-white cursor-pointer">Cancel</button> --}}
            <button class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-3 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                <span class="relative px-4 py-2.5 transition-all ease-in duration-75 bg-gray-700 rounded-base group-hover:bg-transparent group-hover:dark:bg-transparent leading-5 cursor-pointer">
                    Save
                </span>
            </button>
        </div>
    </form>

    @if (count($ideas))

        <div class="pt-3 mt-3 text-gray-400">
            <h2 class="mb-3 pb-1 border-b-1 border-gray-400 text-white font-bold">Your Ideas</h2>
            <ul>
                @foreach ($ideas as $idea)

                <li class="text-gray-400 text-sm">{{ $idea }}</li>

                @endforeach
            </ul>
        </div>

    @endif
</x-layout>
