<?php

namespace App\Actions;

use App\Enums\CampaignStatusEnum;
use App\Models\Campaign;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateCampaignAction
{
    use AsAction;

    public function handle(int $userId, string $name, string $description, float $goalAmount, Carbon $deadline, bool $isFeatured = false) : Model|null
    {
        try {
            $campaign = new Campaign();
            $campaign->setTranslation('name', App::getLocale(), $name);
            $campaign->setTranslation('description', App::getLocale(), $description);
            $campaign->goal_amount = $goalAmount;
            $campaign->deadline = $deadline;
            $campaign->is_featured = $isFeatured;
            $campaign->status = CampaignStatusEnum::IDLE->value;
            $campaign->user_id = $userId;
            $campaign->save();

            return $campaign;
        } catch(\Exception $e) {
            Log::error('Unable to save Campaign: ' . $e->getMessage());

            return null;
        }
    }
}
