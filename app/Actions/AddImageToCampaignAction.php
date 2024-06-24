<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class AddImageToCampaignAction
{
    use AsAction;

    public function handle(Model $campaign, UploadedFile $uploadedFile) : Model|null {
        $extension = $uploadedFile->getClientOriginalExtension();

        $fileName = $campaign->id . '_' . Str::random(32) . '.' . $extension;

        $uploadedFile->storeAs('public/campaign_images', $fileName);

        $url = 'storage/campaign_images/' . $fileName;

        $campaign->image_url = $url;
        $campaign->save();

        return $campaign;
    }
}
