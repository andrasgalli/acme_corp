<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonationHasPayment extends Model
{
    use HasFactory;

    public function donation() : BelongsTo {
        return $this->belongsTo(Donation::class);
    }
}
