<x-app-layout>
    <body class="bg-[url(/public/images/bgpic.jpg)] bg-no-repeat bg-cover">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reports') }}
            </h2>
        </x-slot>
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("Here you can view all the reports.") }}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                        @foreach($reports as $report)
                            <a href="{{ route('reports.show', $report) }}" class="block p-4 bg-gray-100 rounded-lg shadow hover:bg-gray-200">
                                <x-report-card :name="$report->name" :image="$report->image" />
                                <a href="{{ route('reports.edit', $report) }}" class="block p-4 bg-gray-100 rounded-lg shadow hover:bg-gray-200">
                                {{ __("Edit Report") }}
                            </a>
                            <form action="{{ route('reports.destroy', $report) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    {{ __("Delete Report") }}
                                </button>
                            </form>
                            </a>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>