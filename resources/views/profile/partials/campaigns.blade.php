<section>
    <header class="mb-3">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Own Campaigns') }}
            <a href="{{ route('campaigns.add') }}" class="text-base text-gray-400 dark:hover:text-white hover:bg-gray-700 rounded p-2 float-end"><i class="fa fa-plus"></i> Create campaign</a>
        </h2>
    </header>

    <div class="w-full">
        @if(count($ownCampaigns) > 0)
            <table class="table-auto w-full">
                <thead class="border-b">
                    <tr>
                        <th class="text-white text-left p-2"><strong>Name</strong></th>
                        <th class="text-white text-left p-2">Goal</th>
                        <th class="text-white text-left p-2">Deadline</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ownCampaigns as $campaign)
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

</section>
