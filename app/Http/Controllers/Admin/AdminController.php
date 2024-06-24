<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CampaignRepository;
use App\Repositories\DonationRepository;
use App\Repositories\ExternalMissionRepository;
use App\Repositories\UserRepository;
use App\Services\ExternalMissionService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function dashboard() {
        $missionsCount = ExternalMissionRepository::getCount();
        $campaignCount = CampaignRepository::getCount();
        $donationsCount = DonationRepository::getCount();
        $donationsAmount = DonationRepository::getSumAmount();

        return view('admin.dashboard', compact('missionsCount', 'campaignCount', 'donationsCount', 'donationsAmount'));
    }

    public function missions() {
        $externalMissionService = new ExternalMissionService();

        $missions = $externalMissionService->getMissions();

        return view('admin.missions', compact('missions'));
    }

    public function campaigns() {
        $campaigns = CampaignRepository::getAll();

        return view('admin.campaigns', compact('campaigns'));
    }

    public function users() {
        $users = UserRepository::getAll();

        return view('admin.users', compact('users'));
    }

    public function system() {
        return view('admin.system');
    }

    public function reports() {
        return view('admin.reports');
    }
}
