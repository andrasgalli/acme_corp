<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    @include('admin.menu')

    @can('is_admin')
        <div class="w-full flex align-middle justify-center gap-4 mb-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                @if(count($campaigns) > 0)
                    <table class="table-auto w-full">
                        <thead class="border-b">
                        <tr>
                            <th class="text-white text-left p-2"><strong>Name</strong></th>
                            <th class="text-white text-left p-2">Goal</th>
                            <th class="text-white text-left p-2">Deadline</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaigns as $campaign)
                            <tr>
                                <td class="text-white text-left p-2">{{ $campaign->name }}</td>
                                <td class="text-white text-left p-2">{{ $campaign->goal_amount }} €</td>
                                <td class="text-white text-left p-2">{{ $campaign->deadline }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    @include('layouts.list-no-items')
                @endif
            </div>
        </div>
    @else
        <div class="bg-orange-600 rounded p-4">
            <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;Authorization failed!</span>
        </div>
    @endcan
</x-app-layout>
