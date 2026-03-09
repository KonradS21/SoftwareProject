@props(['name','image','date','description','latitude','longitude','severity_scale'])

<div class="flex  justify-center align-center border rounded-lg shadow-md bg-white overflow-hidden">

    <!-- LEFT TEXT PANEL -->
    <div class="w-full p-6">
        <h1 class="font-bold text-4xl mb-2">{{ $name }}</h1>

        <p class="mb-4"><strong>Severity:</strong> {{ $severity_scale }}</p>
        <p class="mb-4"><strong>Date:</strong> {{ $date }}</p>

        <p class="mb-4">{{ $description }}</p>

        <p><strong>Location:</strong> {{ $latitude }}, {{ $longitude }}</p>
    </div>


</div>
    <!-- RIGHT IMAGE -->
    <div class="flex-1">
        <img src="{{ asset($image) }}" 
             alt="{{ $name }}" 
             class="w-cover h-full object-cover">
    </div>
    
