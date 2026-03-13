<x-app-layout>
        <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-3xl font-bold text-blue-900">
                    {{ __("Submit a Report") }}
                </div>
            </div>
        </div>
        
    </div>

    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Create Report:</h3>
                    <x-report-form :action="route('reports.store')" method="POST" />
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