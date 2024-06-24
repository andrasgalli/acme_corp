<?php

namespace App\Actions;

use App\Enums\DonationStatusEnum;
use App\Exceptions\CreateDonationFailedException;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateDonationAction
{
    use AsAction;

    public function handle($userId, $paymentMethodId, $campaignType, $campaignId, $donationType, $amount)
    {
        try {
            $newDonation = new Donation();
            $newDonation->user_id = $userId;
            $newDonation->payment_method_id = $paymentMethodId;
            $newDonation->campaign_type = $campaignType;
            $newDonation->campaign_id = $campaignId;
            $newDonation->donation_type = $donationType;
            $newDonation->donation_status = DonationStatusEnum::FINISHED->value;
            $newDonation->amount = $amount;
            $newDonation->save();

            return $newDonation;
        } catch(\Exception $e) {
            Log::error('Unable to save Campaign: ' . $e->getMessage());

            throw new CreateDonationFailedException($e->getMessage());
        }
    }
}
