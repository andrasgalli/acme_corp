<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    @include('admin.menu')

    @can('is_admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex align-middle justify-center gap-4 mb-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                    <h2 class="text-xl text-white">Mission Count</h2>
                    <h2 class="text-xl text-white">{{ $missionsCount }}</h2>
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                    <h2 class="text-xl text-white">Campaign Count</h2>
                    <h2 class="text-xl text-white">{{ $campaignCount }}</h2>

                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                    <h2 class="text-xl text-white">Donation Count</h2>
                    <h2 class="text-xl text-white">{{ $donationsCount }}</h2>

                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                    <h2 class="text-xl text-white">Donation amount</h2>
                    <h2 class="text-xl text-white">{{ $donationsAmount }} €</h2>

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="bg-orange-600 rounded p-4">
        <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;Authorization failed!</span>
    </div>
    @endcan
</x-app-layout>
