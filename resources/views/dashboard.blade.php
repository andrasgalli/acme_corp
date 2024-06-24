<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('common.menu_home') }}
        </h2>
    </x-slot>

    @include('layouts.form-status')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="flex justify-center gap-4">
                <a href="{{ url('/dashboard?') . \Illuminate\Support\Arr::query(['listing' => \App\Enums\ListingTypeEnum::ALL->value]) }}" class="text-lg {{ request('listing') === \App\Enums\ListingTypeEnum::ALL->value || request('listing') === null ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">All</a>
                <a href="{{ url('/dashboard?') . \Illuminate\Support\Arr::query(['listing' => \App\Enums\ListingTypeEnum::OWN->value]) }}" class="text-lg {{ request('listing') === \App\Enums\ListingTypeEnum::OWN->value ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Own campaigns</a>
                <a href="{{ url('/dashboard?') . \Illuminate\Support\Arr::query(['listing' => \App\Enums\ListingTypeEnum::CAMPAIGNS->value]) }}" class="text-lg {{ request('listing') === \App\Enums\ListingTypeEnum::CAMPAIGNS->value ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Campaigns</a>
                <a href="{{ url('/dashboard?') . \Illuminate\Support\Arr::query(['listing' => \App\Enums\ListingTypeEnum::EXTERNAL->value]) }}" class="text-lg {{ request('listing') === \App\Enums\ListingTypeEnum::EXTERNAL->value ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">External missions</a>
                <button class="text-lg text-gray-400 dark:hover:text-white hover:bg-gray-700 rounded p-2" data-open="filterModal"><i class="fa fa-filter"></i></button>
            </div>
        </div>

        @if(count($resultItems) > 0)
        @foreach($resultItems as $resultItem)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex w-full relative">
                        <div class="p-2 flex justify-between w-full">
                            <div class="flex-none">
                                <img src="{{ asset($resultItem->image_url) }}" alt="{{ $resultItem->name }}" style="width: 300px; height: 200px;">
                            </div>
                            <div class="grow w-full ml-3 pe-4 relative">
                                <span class="text-xl text-white"><strong>{{ $resultItem->name }}</strong> ({{ (get_class($resultItem) === \App\Models\ExternalMission::class ? 'External mission' : 'Campaign') }})</span><br>
                                <span class="text-sm text-white">{{ $resultItem->description }}</span><br>
                                <div class="flex justify-between mb-1">
                                    <span class="text-base font-medium text-blue-700 dark:text-white">Current: {{ $resultItem->currentAmount() }} €</span>
                                    <span class="text-sm font-medium text-blue-700 dark:text-white">Goal: <strong>{{ $resultItem->goal_amount }} €</strong></span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mb-3">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $resultItem->currentAmountPercent() }}%"></div>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-blue-700 dark:text-white">Deadline: {{ $resultItem->deadline }}</span>
                                    <span class="text-sm font-medium text-blue-700 dark:text-white">Created by: {{ (get_class($resultItem) === \App\Models\ExternalMission::class ? $resultItem->created_by : $resultItem->user->name) }}</span>
                                </div>

                                @auth
                                <button class="rounded bg-red p-2 absolute bottom-0 left-0 donateCampaignButton" data-open="donateModal" data-campaign_type="{{ (get_class($resultItem) === \App\Models\ExternalMission::class ? 'external' : 'campaign') }}" data-campaign_id="{{ $resultItem->id }}">
                                    <strong>Donate&nbsp;<i class="fa fa-chevron-right"></i></strong>
                                </button>
                                @else
                                <div class="rounded bg-gray-500 p-2 absolute bottom-0 left-0">
                                    <span class="text-white">Please login to donate!</span>
                                </div>
                                @endauth
                            </div>
                        </div>
                        <!--<button class="rounded bg-gray-600 p-2 hover:bg-gray-700 absolute top-0 right-0">
                            <i class="fa fa-fw fa-heart"></i>
                        </button>-->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('layouts.list-no-items')
            </div>
        </div>
        @endif
    </div>

    @include('modals.filterModal')
    @include('modals.donateModal')
</x-app-layout>
