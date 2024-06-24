<div id="donateModal" class="modal">
    <div class="modal__inner">
        <div class="w-full mb-3">
            <span class="text-xl text-white">Make a Donation</span>
        </div>
        <form action="{{ route('make_donation') }}" method="post">
            @csrf
            <input type="hidden" name="campaign_type" id="campaign_type">
            <input type="hidden" name="campaign_id" id="campaign_id">
            <div class="text-center">
                <span class="text-lg text-white text-uppercase text-center">Donation type</span>
            </div>
            <div class="mb-6">
                <div class="flex w-full justify-between gap-4">
                    <x-donation-type donationType="onetime" active="active"/>
                    <x-donation-type donationType="recurring" active=""/>
                </div>
            </div>
            <div class="text-center">
                <span class="text-lg text-white text-uppercase text-center">Amount</span>
            </div>
            <div class="mb-6">
                <div class="flex w-full justify-between gap-4">
                    <x-donation-amount amount="5" active="active" />
                    <x-donation-amount amount="10" active="" />
                    <x-donation-amount amount="20" active="" />
                    <x-donation-amount amount="50" active="" />
                    <x-donation-amount amount="-1" active="" />
                </div>
                <div class="hidden text-center"  id="customAmountContainer">
                    <x-input-label for="customAmount" :value="__('Custom amount')" />
                    <x-text-input id="customAmount" class="block mt-1 w-full" type="text" name="custom_amount" :value="old('custom_amount')" />
                </div>
            </div>

            <div class="mb-6">
                <div class="bg-orange-600 rounded p-4">
                    <span class="text-lg text-white"><i class="fa fa-exclamation-triangle"></i>&nbsp;Due to PCI-DSS the payment information input fields are coming from the Payment Processor in iFrame, or during donation the user will be redirected to the Payment Processor's payment page.</span>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="p-4 bg-red text-white rounded text-lg"><i class="fa fa-check"></i>&nbsp;Make donation</button>
            </div>
        </form>

        <button class="modal__button" data-close="donateModal">
            <i class="fa fa-times"></i>
        </button>
    </div>
</div>
