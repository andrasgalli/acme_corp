<?php

namespace App\Http\Controllers;

use App\Actions\CreateDonationAction;
use App\Enums\ControllerResultEnum;
use App\Enums\DonationStatusEnum;
use App\Enums\ListingTypeEnum;
use App\Enums\PaymentMethodEnum;
use App\Http\Requests\MakeDonationRequest;
use App\Models\Donation;
use App\Repositories\CampaignRepository;
use App\Repositories\PaymentMethodRepository;
use App\Services\ExternalMissionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class MakeDonationController extends Controller {
    public function makeDonation(MakeDonationRequest $request) : RedirectResponse {
        try {
            Log::debug('OK');
            //faking payment method
            $paymentMethod = PaymentMethodRepository::getByLogicalName(PaymentMethodEnum::CREDITCARD->value);
            $amount = $request->input('donation_amount') == -1 ? $request->input('custom_amount') : $request->input('donation_amount');

            (new CreateDonationAction)->handle(Auth::id(), $paymentMethod->id, $request->input('campaign_type'), $request->input('campaign_id'), $request->input('donation_type'), $amount);

            return redirect()
                ->route('home')
                ->with('status', ControllerResultEnum::SUCCESS->value)
                ->with('statusMessage', __('common.success_message'));
        } catch(\Exception $e) {
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->with('status', ControllerResultEnum::ERROR->value)
                ->with('statusMessage', $e->getMessage());
        }
    }
}
