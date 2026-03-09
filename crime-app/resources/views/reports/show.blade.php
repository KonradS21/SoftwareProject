<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Here you can view all the reports.") }}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                    
                <x-report-details
                        :name="$report->name"
                        :image="$report->image"
                        :date="$report->created_at"
                        :description="$report->description"
                        :latitude="$report->latitude"
                        :longitude="$report->longitude"
                        :severity_scale="$report->severity_scale"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>