<?php

namespace App\Http\Controllers\Admin\Campaigns;

use App\Http\Controllers\Controller;
use App\Repositories\CampaignRepository;
use Illuminate\Http\Request;

class ListCampaignsController extends Controller
{
    public function listCampaigns() {
        $campaigns = CampaignRepository::getAll();

        return view('campaigns.list', compact('campaigns'));
    }
}
