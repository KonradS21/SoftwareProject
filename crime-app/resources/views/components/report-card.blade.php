@props(['name', 'image'])

<div class="bg-gray-100 p-4 rounded-lg shadow">
    <h3 class="font-bold text-lg">{{ $name }}</h3>

    <div class="mt-2 w-full h-40 overflow-hidden rounded-md">
       <img src="{{ asset($image) }}" alt="{{ $name }}">
    </div>
</div>

