<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeDonationRequest extends FormRequest
{
    protected $redirectRoute = 'home';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'campaign_type' => ['required', 'in:"campaign","external"'],
            'campaign_id' => ['required'],
            'donation_type' => ['required', 'in:"onetime","recurring"'],
            'donation_amount' => ['required', 'in:"5","10","20","50","-1"'],
            'custom_amount' => ['nullable'],
        ];
    }
}
