//jQuery.noConflict();

jQuery(document).ready(function($) {
    $('.dropDownHook span').on('click', function() {
        $(this).parents('.dropDownHook').children('.dropDownContent').stop(true, true).slideToggle('medium', function() {

            // if ($('.dropDownContent').is(':visible')) {
            //     //  This alters the content of the "hook" when we open the drop down
            //     $('.dropDownHook span').html('Close Dropdown');
            // }
            // else {
            //     //  This alters the content of the "hook" when we close the dropdown
            //     $('.dropDownHook span').html('Open Dropdown');
            // }

        });
    });
    
    $('html').on('click', function() {
        $('.dropDownContent:visible').slideToggle('fast');
    });

    $('.dropDownHook > *').on('click', function(event) {
        event.stopPropagation();
    });
});