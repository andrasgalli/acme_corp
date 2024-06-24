<?php

namespace App\Http\Requests\Campaigns;

use Illuminate\Foundation\Http\FormRequest;

class CreateCampaignRequest extends FormRequest
{
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
            'campaign_name' => ['string', 'min:3', 'max:255', 'unique:campaigns,name'],
            'campaign_description' => ['nullable', 'string'],
            'campaign_goal_amount' => ['integer', 'min:5', 'max:10000'],
            'campaign_deadline' => ['nullable', 'date_format:Y-m-d'],
            'campaign_is_featured' => ['nullable'],
            'campaign_image' => ['nullable', 'extensions:jpg,png,jpeg'],
        ];
    }
}
