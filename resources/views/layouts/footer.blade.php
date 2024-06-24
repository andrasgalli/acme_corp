<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-4 p-4">
            <div>
                <x-application-logo></x-application-logo>
                <span class="text-lg text-gray-500">Corporation</span>
            </div>
            <div class="flex flex-col gap-2">
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('home') }}">{{ __('common.menu_home') }}</a>
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('about') }}">{{ __('common.menu_about') }}</a>
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('dashboard') }}">{{ __('common.menu_missions') }}</a>
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('profile.edit') }}">{{ __('common.menu_profile') }}</a>
            </div>
            <div class="flex flex-col gap-2">
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('contact') }}">{{ __('common.footer_contact') }}</a>
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('terms') }}">{{ __('common.footer_terms') }}</a>
                <a class="px-1 pt-1 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out my-2" href="{{ route('privacy') }}">{{ __('common.footer_privacy') }}</a>
            </div>
        </div>
    </div>
</div>
<div class="grid lg:grid-cols-1  p-2 text-center text-gray-500 text-sm">
    Copyright &copy; {{ date('Y') }} - Andras Galli
</div>
