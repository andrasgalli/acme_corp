<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DonationAmount extends Component
{
    public float $amount;
    public string $active;
    /**
     * Create a new component instance.
     */
    public function __construct(float $amount, string $active)
    {
        $this->amount = $amount;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.donation-amount');
    }
}
