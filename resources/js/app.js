import './bootstrap';
import Modals from "@marcomessa/tailwind-modal";
import jQuery from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const modals = new Modals();

modals.init();

window.$ = window.jQuery = jQuery


function donationTypeSelect(e) {
    console.log('OK');
    let target = e.currentTarget;

    let elements = document.getElementsByClassName('donationTypeBox');
    for(var i = 0; i < elements.length; i++) {
        elements[i].classList.remove('active');
    }

    target.classList.add('active');
}

$(document).ready(function() {
    $(document).on('click', '.donationTypeBox', function(event) {
        let target = event.currentTarget;
        let donationType = $(event.currentTarget).data('donation_type');

        $('.donationTypeBox').removeClass('active');
        $('.donationTypeBoxInput').attr('checked', false);
        $('#donation_type_' + donationType).attr('checked', true);
        $(target).addClass('active');
    });

    $(document).on('click', '.donationAmountBox', function(event) {
        let target = event.currentTarget;
        let donationAmount = $(event.currentTarget).data('donation_amount');

        $('.donationAmountBox').removeClass('active');
        $('.donationAmountBoxInput').attr('checked', false);
        $('#donation_amount_' + donationAmount).attr('checked', true);
        $(target).addClass('active');

        if(donationAmount == '0') {
            $('#customAmountContainer').show();
        } else {
            $('#customAmountContainer').hide();
        }
    });

    $('#search-navbar').on('keyup', function(event) {
        if(event.which === 13) {
            event.preventDefault();
            console.log('Performing search');

            if ('URLSearchParams' in window) {
                var searchParams = new URLSearchParams(window.location.search);

                searchParams.set("name_search", $('#search-navbar').val());

                window.location.search = searchParams.toString();
            }
        }
    })

    $(document).on('click', '.donateCampaignButton', function(event) {
        $('#campaign_id').val($(event.currentTarget).data('campaign_id'));
        $('#campaign_type').val($(event.currentTarget).data('campaign_type'));
    });
});


