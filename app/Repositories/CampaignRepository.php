<?php

namespace App\Repositories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Collection;

class CampaignRepository extends RepositoryBase {
    protected static string $modelClass = Campaign::class;

    public static function getAllOwn(int $userId, string|null $nameSearch = null) : Collection|array|null {
        $result = static::$modelClass::where(['user_id' => $userId]);

        if(! is_null($nameSearch)) {
            $result = $result->where('name', 'like', '%' . $nameSearch . '%')->orWhere('description', 'like', '%' . $nameSearch . '%');
        }

        return $result->get();
    }
}
