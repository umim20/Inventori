<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-xl font-bold text-indigo-700">Login Admin</h1>
        </x-slot>

        <form method="POST" action="{{ route('login.admin') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
            </div>

            <!-- Button -->
            <div class="mt-4">
                <x-primary-button class="w-full">Login</x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
