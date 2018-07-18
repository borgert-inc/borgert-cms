
$(document).ready(function () {

    // --------------------------------------------------------------------------------------

    /**
     * Others plugins
     */

    // Editor summer note
    $('.summernote').summernote({
        height: 270,
        lang: 'pt-BR'
    });

    // Metis Menu
    $('.metismenu').metisMenu();

    // Switchery
    if (document.querySelector('.js-switch') != null) {
        new Switchery(document.querySelector('.js-switch'), {color: '#F9D600'});
    }

    // Datetimepicker
    $('.datetimepicker').datetimepicker({
        step: 10
    });

    // --------------------------------------------------------------------------------------

    /**
     * Bootstrap
     */

    // Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Popover
    $('[data-toggle="popover"]').popover();

    // --------------------------------------------------------------------------------------

});
