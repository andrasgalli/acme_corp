@if (session('status') == \App\Enums\ControllerResultEnum::SUCCESS->value)
    <div class="bg-green-600 rounded p-4">
        <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;{{ session('statusMessage') }}</span>
    </div>
@elseif (session('status') == \App\Enums\ControllerResultEnum::ERROR->value)
    <div class="bg-red rounded p-4">
        <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;{{ session('statusMessage') }}</span>
    </div>
@endif
@if(session('errors'))
    <div class="bg-red rounded p-4">
        <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;{{ session('errors') }}</span>
    </div>
@endif
