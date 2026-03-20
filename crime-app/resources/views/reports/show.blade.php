<x-app-layout>
    
    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-3xl font-bold text-blue-900">
                    {{ __("Reports") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg">
                
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
        <footer class="mt-16 mb-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-900 text-white rounded-lg shadow-sm p-6 text-center">

            <h3 class="text-lg font-semibold mb-2">Crime App</h3>

            <p class="text-gray-300 text-sm mb-3">
                Helping communities stay informed about local crime reports and
                improve neighbourhood awareness through shared information.
            </p>

            <p class="text-gray-400 text-xs">
                © {{ date('Y') }} Crime App. All rights reserved.
            </p>

        </div>
    </div>
</footer>
</x-app-layout>