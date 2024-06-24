<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('common.menu_about') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5>{{ __('about.welcome') }}</h5>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('about.created_by') }}: <strong>{{ config('app.created_by') }}</strong> (<a href="mailto:{{ config('app.created_by_email') }}">{{ config('app.created_by_email') }}</a>)<br>
                    {{ __('about.created_at') }}: <strong>June 2024</strong><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
