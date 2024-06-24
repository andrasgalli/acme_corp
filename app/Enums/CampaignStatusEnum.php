<?php

namespace App\Enums;

enum CampaignStatusEnum: string {
    case IDLE = 'idle';
    case RUNNING = 'running';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
