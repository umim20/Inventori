<!-- resources/views/components/auth-card.blade.php -->
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">
    {{ $logo ?? '' }}

    <div class="mt-6">
        {{ $slot }}
    </div>
</div>
