@props([
    'name' => 'required'
])

@error($name)
    <div class="bg-gradient-to-br from-pink-800 to-red-800 bg-opacity-5 text-sm/6 border-1 border border-orange-500 text-red-100 px-4 py-2 mt-2 rounded relative" role="alert">
        <span class="block sm:inline">{{ $message }}</span>
    </div>
@enderror
