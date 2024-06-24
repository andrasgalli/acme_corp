<div class="rounded border bg-gray-600 flex flex-col align-items-center donationTypeBox {{ $active }}" data-donation_type="{{ $donationType }}">
    <span class="text-5xl text-white text-uppercase"><strong>{{ $donationType }}</strong></span>
    <input type="radio" name="donation_type" id="donation_type_{{ $donationType }}" value="{{ $donationType }}" class="donationTypeBoxInput" style="width: 0px; height: 0px;"{{ $active == 'active' ? 'checked' : '' }}>
</div>
