@props(['action', 'method'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
@csrf
@if($method === 'PUT' || $method === 'PATCH')
@method($method)
@endif

<div class="mb-4">
    <label for="name" class="block text-sm text-gray-700">name</label>

    <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $report->name ?? ' ') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    />
    @error('name')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror

</div>


<div class="mb-4">
<label for="image" class="block text-sm font-medium text-gray-700">report Cover Image</label>

    <input
        type="file"
        name="image"
        id="image"
        {{ isset($report) ? '' : 'required' }}
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
    />
    @error('image') 
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror

</div>


@isset($report->image)
    <div class="mb-4">
    <img src="{{ asset($report->image) }}" alt="report cover" class="w-24 h-32 object-cover">

</div>

@endisset
<div class="mb-4">
    <label for="description" class="block text-sm text-gray-700">description</label>

    <textarea
        name="description"
        id="description"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    >{{ old('description', $report->description ?? '') }}</textarea>
    @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="latitude" class="block text-sm text-gray-700">latitude</label>

    <input
        type="text"
        name="latitude"
        id="latitude"
        value="{{ old('latitude', $report->latitude ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    />
    @error('latitude')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="longitude" class="block text-sm text-gray-700">longitude</label>

    <input
        type="text"
        name="longitude"
        id="longitude"
        value="{{ old('longitude', $report->longitude ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    />
    @error('longitude')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="severity_scale" class="block text-sm text-gray-700">severity scale</label>

    <input
        type="number"
        name="severity_scale"
        id="severity_scale"
        value="{{ old('severity_scale', $report->severity_scale ?? '') }}"
        required
        min="1"
        max="10"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    />
    @error('severity_scale')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div>
    <x-primary-button>

        {{ isset($report) ? 'Update report' : 'Add report' }}

    </x-primary-button>

</div>  

</form>