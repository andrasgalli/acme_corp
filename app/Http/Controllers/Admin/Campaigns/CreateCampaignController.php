<?php

namespace App\Http\Controllers\Admin\Campaigns;

use App\Actions\AddImageToCampaignAction;
use App\Actions\CreateCampaignAction;
use App\Enums\ControllerResultEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Campaigns\CreateCampaignRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CreateCampaignController extends Controller
{
    public function showAddForm() : View {
        return view('campaign.create');
    }

    public function createCampaign(CreateCampaignRequest $request) : RedirectResponse {
        try {
            DB::beginTransaction();

            $campaignAddResult = (new CreateCampaignAction)->handle(
                Auth::id(),
                $request->input('campaign_name'),
                $request->input('campaign_description'),
                $request->input('campaign_goal_amount'),
                $request->has('campaign_deadline') ? $request->input('campaign_deadline') : Carbon::now()->addMonths(2),
                $request->input('campaign_is_featured') === '1'
            );

            if (!is_null($campaignAddResult)) {
                if ($request->hasFile('campaign_image')) {
                    (new AddImageToCampaignAction)->handle($campaignAddResult, $request->file('campaign_image'));
                }
            }

            DB::commit();

            return redirect()
                ->route('campaigns.add')
                ->with('status', ControllerResultEnum::SUCCESS->value)
                ->with('statusMessage', __('common.success_message'));
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->with('status', ControllerResultEnum::ERROR->value)
                ->with('statusMessage', $e->getMessage());
        }
    }
}
