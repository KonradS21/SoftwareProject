<x-app-layout>
    <body class="bg-[url('/images/bgpic.jpg')] bg-no-repeat bg-cover">

    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-3xl font-bold text-blue-900">
                    {{ __("Report Page") }}
                </div>
            </div>
        </div>
        
    </div>

        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

                <div class="bg-blue-900 shadow-sm sm:rounded-lg p-6 ">

                    <h2 class="text-white font-bold text-2xl mb-6">
                        {{ __("Here you can view all the reports.") }}
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach($reports as $report)

                            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 flex flex-col justify-between">

                                {{-- View Report --}}
                                <a href="{{ route('reports.show', $report) }}" class="block mb-4">
                                    <x-report-card 
                                        :name="$report->name" 
                                        :image="$report->image" 
                                    />
                                </a>

                               @if(auth()->check() && auth()->user()->isAdmin())
    <div class="flex justify-between items-center mt-4">

        <a href="{{ route('reports.edit', $report) }}"
           class="text-blue-600 hover:text-blue-800 font-medium">
            {{ __("Edit") }}
        </a>

        <form action="{{ route('reports.destroy', $report) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="text-white bg-blue-900 px-4 py-2 shadow-sm sm:rounded-lg hover:bg-red-800 font-medium">
                {{ __("Delete") }}
            </button>
        </form>

    </div>
@endif
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>

    </body>
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