<x-app-layout>
    <div class="py-10 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-3xl font-bold text-blue-900">
                    {{ __("Profile") }}
                </div>
            </div>
        </div>
        
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
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
