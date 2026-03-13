<x-app-layout>
    

    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-3xl font-bold text-blue-900">
                    {{ __("Welcome to Crime app!") }}
                </div>
            </div>
        </div>
        
    </div>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="text-2xl font-bold mb-4">Crime Reports Map</h1>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div id="map" class="h-96 w-full">
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- About the App -->
        <div class="bg-blue-900 shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl text-white font-semibold mb-3">About This App</h2>
            <p class="text-gray-300">
                The Crime App helps users report and view incidents happening in the local
                area. Reports are displayed on an interactive map so people can stay
                informed about activity in their community.
            </p>
        </div>

        <!-- Community Awareness -->
        <div class="bg-blue-900 shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl text-white font-semibold mb-3">Community Awareness</h2>
            <p class="text-gray-300">
                Staying aware of crime patterns helps communities respond better and
                improve safety. By sharing verified reports, users contribute to a
                transparent and informed neighbourhood.
            </p>
        </div>

        <!-- Safety Tips -->
        <div class="bg-blue-900 shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl text-white font-semibold mb-3">Safety Tips</h2>
            <ul class="text-gray-300 list-disc list-inside space-y-1">
                <li>Be aware of your surroundings</li>
                <li>Report suspicious activity</li>
                <li>Travel in well-lit areas at night</li>
                <li>Keep emergency contacts accessible</li>
            </ul>
        </div>

    </div>
    <h1 class="text-2xl font-bold mb-4 text-blue-900 py-4">An Gardá Síochana phone : +353 1 666 0000 </h1>
</div>


        <script>
            const reports = @json($reports);
        </script>
    
         <script>
            document.addEventListener("DOMContentLoaded", function () {
            
                var map = L.map('map').setView([53.3498, -6.2603], 13);
            
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    maxZoom: 20,
                    attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
                    subdomains: 'abcd'
                }).addTo(map);
            
                reports.forEach(report => {
                
            if(report.latitude && report.longitude){
            
                let marker = L.marker([report.latitude, report.longitude])
                    .addTo(map)
                    .bindPopup(`
                        <strong>${report.name}</strong><br>
                        ${report.description}<br>
                        <a href="/reports/${report.id}">Read report</a>`);
            }
        
        });
    
            });
         </script>
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
