<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalMission extends Model
{
    use HasFactory;

    public function currentAmount() {
        return $this->current_amount ?? 0;
    }

    public function currentAmountPercent() {
        return ($this->current_amount / $this->goal_amount) * 100;
    }
}
