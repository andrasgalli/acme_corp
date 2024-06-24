<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Campaign') }}
        </h2>
    </x-slot>

    @include('layouts.form-status')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <form method="post" action="{{ route('campaigns.create') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="campaign_name" :value="__('Name')" />
                            <x-text-input id="campaign_name" name="campaign_name" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('campaign_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="campaign_description" :value="__('Description')" />
                            <x-text-input id="campaign_description" name="campaign_description" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('campaign_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="campaign_goal_amount" :value="__('Goal Amount')" />
                            <x-text-input id="campaign_goal_amount" name="campaign_goal_amount" type="number" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('campaign_goal_amount')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="campaign_image" :value="__('Campaign image')" />
                            <x-text-input id="campaign_image" name="campaign_image" type="file" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('campaign_image')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="campaign_is_featured" :value="__('Campaign is featured?')" />
                            <x-text-input id="campaign_is_featured" name="campaign_is_featured" type="checkbox" class="mt-1" />
                            <span class="text-white text-sm">{{ __('Yes, campaign is featured') }}</span>
                            <x-input-error :messages="$errors->get('campaign_is_featured')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
