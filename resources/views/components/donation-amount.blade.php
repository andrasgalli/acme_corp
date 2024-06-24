<div class="rounded border bg-gray-600 flex align-items-center donationAmountBox {{ $active }}" data-donation_amount="{{ $amount }}">
    <input type="radio" name="donation_amount" id="donation_amount_{{ $amount }}" value="{{ $amount }}" class="donationAmountBoxInput" style="width: 0px; height: 0px;"{{ $active == 'active' ? 'checked' : '' }}>
    <span class="text-5xl text-white text-uppercase"><strong>{{ $amount == -1 ? 'Custom' : $amount . ' €' }}</strong></span>
</div>
