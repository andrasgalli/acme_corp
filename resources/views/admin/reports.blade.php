<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    @include('admin.menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('is_admin')
                <div class="bg-orange-600 rounded p-4">
                    <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;Not implemented yet</span>
                </div>
            @else
                <div class="bg-orange-600 rounded p-4">
                    <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;Authorization failed!</span>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
