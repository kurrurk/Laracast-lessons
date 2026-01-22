<x-layout>
    @dump($tasks)
    <h1>{{ $greeting }}, {!! $person !!}!</h1>
    @if (count($tasks))
        <p>Yes, we have some tasks. How many? {{ count($tasks) }} tasks, in fact!</p>
        <ul>
        @foreach ( $tasks as $task )
            <li>{{ $task }}</li>
        @endforeach
        </ul>
    @endif
    {{-- @unless (count($tasks))
    <p>There are no active tasks.</p>
    @endunless --}}
    <hr>
    @forelse ( $tasks as $task )
        <li>{{ $task }}</li>
    @empty
        <p>There are no active tasks.</p>
    @endforelse
    <hr>
</x-layout>
