<?php

namespace App\Repositories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Collection;

class DonationRepository extends RepositoryBase {
    protected static string $modelClass = Donation::class;

    public static function getAllByCampaign($campaignId) : Collection|array|null {
        return static::$modelClass::where(['campaign_id' => $campaignId])->get();
    }

    public static function getAllByUserId($userId) : Collection|array|null {
        return static::$modelClass::where(['user_id' => $userId])->orderBy('created_at', 'desc')->get();
    }

    public static function getDonationSumByCampaignId($campaignId) : int|null {
        return static::$modelClass::where(['campaign_id' => $campaignId])->sum('amount');
    }

    public static function getSumAmount() : float|null {
        $result = static::$modelClass::whereRaw('id > 0');

        return $result->sum('amount');
    }
}
