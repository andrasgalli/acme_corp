<?php

namespace App\Services;

use App\Models\ExternalMission;
use App\Repositories\ExternalMissionRepository;
use Database\Factories\ExternalMissionFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ExternalMissionService {

    /**
     * @var int Lifetime of the cached data
     */
    protected $resultCacheLifetime = 1800;

    /**
     * Returns the missions from an external source.
     * Due implementing this was not in the description, I've created mock data response,
     * but in the future it can be changed to a real data source.
     *
     * The result is cached, because these kind of data is not changing frequently.
     *
     * @return mixed
     */
    public function getMissions(string|null $nameFilter = null) : mixed {
        $result = Cache::remember('external_missions', $this->resultCacheLifetime, function () {
            return $this->getMockDataForRunningMissions();
        });

        if(! is_null($nameFilter)) {
            $result = $result->filter(function($item) use ($nameFilter) {
                return str_contains($item->name, $nameFilter) || str_contains($item->description, $nameFilter);
            });
        }

        return $result;
    }

    /**
     * Generated mock external mission data, or if already generated, returns the records from the database
     *
     * @param int $amount
     * @return Collection|Model
     */
    protected function getMockDataForRunningMissions(int $amount = 10) : Collection|Model {
        if(ExternalMissionRepository::getCount() === 0) {
            $result = ExternalMission::factory($amount)->create();
        } else {
            $result = ExternalMissionRepository::getAll();
        }

        return $result;
    }
}
