<x-layout>
    <x-form title="Register an Account" description="Start tracking your ideas today">
        <form action="/register" method="POST" class="mt-10 space-y-4">
            @csrf
            
            <x-form.field label="Name" name="name" />
            <x-form.field label="Email" type="email" name="email" />
            <x-form.field label="Password" type="password" name="password" />

            <button type="submit" class="btn mt-2 h-10 w-full">Create Accaunt</button>
        </form>
    </x-form>
</x-layout>
