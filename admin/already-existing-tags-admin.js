jQuery(function($) {
    'use strict';
    $('#select-all-categories').on('click', function() {
        if ($(this).is(':checked')) {
            $('.chkbx').each(function() {
                this.checked = true;
            });
        } else {
            $('.chkbx').each(function() {
                this.checked = false;
            });
        }
    });
});
