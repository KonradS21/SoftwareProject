<x-app-layout>
    

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        
    </div>
        <div class="container">
            <div id="map" class="h-96 w-full">
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
                        <strong>report ${report.id}</strong><br>
                        ${report.description}<br>
                        <a href="/reports/${report.id}">Read report</a>`);
            }
        
        });
    
            });
         </script>
        </div>
    </div>
</x-app-layout>
