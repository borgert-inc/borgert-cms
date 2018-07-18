
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
        new Switchery(document.querySelector('.js-switch'), {color: '#2281C3'});
    }

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
