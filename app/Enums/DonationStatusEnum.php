<?php

namespace App\Enums;

enum DonationStatusEnum: string {
    case NEW = 'new';
    case PENDING = 'pending';
    case FINISHED = 'finished';
}
