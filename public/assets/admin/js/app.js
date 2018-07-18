
// ---------------------------------------------------------------------------

// MetisMenu
$("#menu").metisMenu({
  toggle: false
});

// Switchery
if (document.querySelector('.js-switch') != null) {
  new Switchery(document.querySelector('.js-switch'), {color: '#F9D600'});
}

// Editor summer note
$('.summernote').summernote({
  height: 270,
  lang: 'pt-BR'
});

// ---------------------------------------------------------------------------

// Bootstrap

$('.alert').alert();

// Tooltips demo
// $('[data-toggle="tooltip"]').tooltip();

// Popover
// $("[data-toggle=popover]").popover();

// Move modal to body
// Fix Bootstrap backdrop issu with animation.css
// $('.modal').appendTo("body");

// ---------------------------------------------------------------------------
