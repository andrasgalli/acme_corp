<section>
    <header class="mb-3">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Donation history') }}
        </h2>
    </header>

    <div class="w-full">
        @if(count($donations) > 0)
        <table class="table-auto w-full">
            <thead class="border-b">
                <tr>
                    <th class="text-white text-left p-2">Type</th>
                    <th class="text-white text-left p-2">Name</th>
                    <th class="text-white text-left p-2">Amount</th>
                    <th class="text-white text-left p-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                <tr>
                    <td class="text-white text-left p-2">{{ $donation->campaign_type === \App\Enums\CampaignTypeEnum::CAMPAIGN->value ? 'Campaign' : 'External mission' }}</td>
                    <td class="text-white text-left p-2">{{ $donation->campaign_type === \App\Enums\CampaignTypeEnum::CAMPAIGN->value ? $donation->campaign->name : $donation->externalMission->name }}</td>
                    <td class="text-white text-left p-2">{{ $donation->amount }} €</td>
                    <td class="text-white text-left p-2">{{ $donation->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        @include('layouts.list-no-items')
        @endif
    </div>

</section>
