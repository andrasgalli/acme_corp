<?php

namespace App\Models;

use App\Enums\CampaignTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Donation extends Model
{
    use HasFactory;

    public function campaign() : BelongsTo|null {
        if($this->campaign_type === CampaignTypeEnum::CAMPAIGN->value) {
            return $this->belongsTo(Campaign::class);
        } else {
            return null;
        }
    }

    public function externalMission() : BelongsTo|null {
        if($this->campaign_type === CampaignTypeEnum::EXTERNAL->value) {
            return $this->belongsTo(Campaign::class);
        } else {
            return null;
        }
    }

    public function payments() : HasMany {
        return $this->hasMany(DonationHasPayment::class);
    }
}
