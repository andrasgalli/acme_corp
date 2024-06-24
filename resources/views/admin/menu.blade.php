<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Dashboard</a>
            <a href="{{ route('admin.missions') }}" class="{{ request()->routeIs('admin.missions') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Missions</a>

            <a href="{{ route('admin.campaigns') }}" class="{{ request()->routeIs('admin.campaigns') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Campaigns</a>

            <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Users</a>

            <a href="{{ route('admin.system') }}" class="{{ request()->routeIs('admin.system') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">System</a>

            <a href="{{ route('admin.reports') }}" class="{{ request()->routeIs('admin.reports') ? 'text-white dark:hover:text-white hover:bg-gray-700' : 'text-gray-400 dark:hover:text-white hover:bg-gray-700' }} rounded p-2">Reports</a>
        </div>
    </div>
</div>
