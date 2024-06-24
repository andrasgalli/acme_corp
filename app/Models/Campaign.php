<?php

namespace App\Models;

use App\Repositories\DonationRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'description'];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function currentAmount() {
        return DonationRepository::getDonationSumByCampaignId($this->id) ?? 0;
    }

    public function currentAmountPercent() {
        return ($this->currentAmount() / $this->goal_amount) * 100;
    }
}
