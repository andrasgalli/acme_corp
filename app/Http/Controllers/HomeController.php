<?php

namespace App\Http\Controllers;

use App\Enums\ListingTypeEnum;
use App\Repositories\CampaignRepository;
use App\Services\ExternalMissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home() : View {
        return view('welcome');
    }
    public function listCampaigns(Request $request) : View {
        $listing = $request->query('listing', null);
        $nameSearch = $request->query('name_search', null);
        switch($listing) {

            case ListingTypeEnum::OWN->value: {
                if(Auth::guest()) {
                    $resultItems = [];
                } else {
                    $resultItems = CampaignRepository::getAllOwn(Auth::id(), $nameSearch);
                }

                break;
            }
            case ListingTypeEnum::CAMPAIGNS->value: {
                $resultItems = CampaignRepository::getAll(nameSearch: $nameSearch);

                break;
            }
            case ListingTypeEnum::EXTERNAL->value: {
                $externalMissionService = new ExternalMissionService();

                $resultItems = $externalMissionService->getMissions($nameSearch);

                break;
            }
            case ListingTypeEnum::ALL->value:
            default: {
                $campaigns = CampaignRepository::getAll(nameSearch: $nameSearch);

                $externalMissionService = new ExternalMissionService();

                $externalMissions = $externalMissionService->getMissions($nameSearch);

                $tempCollection = collect([$campaigns, $externalMissions]);

                $resultItems = $tempCollection->flatten(1);

                break;
            }
        }

        return view('dashboard', compact('resultItems', 'listing'));
    }
}
