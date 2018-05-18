$(document).ready(function(){
    window.ns = Storages.initNamespaceStorage('manning390');
    s = window.ns.localStorage;

    var accent = 'accent-orange';
    if(s.isSet('accent')) accent = s.get('accent');
    else s.set('accent', accent);

    $('.accent,.accent-picker').addClass(accent);
});
$(document).on('click','.accent-select', function() {
    $('.accent,.accent-picker')
        .addClass('transition')
        .removeClass('accent-orange accent-teal accent-violet accent-ruby')
        .addClass($(this).data('accent'));

    // Remove the transition class
    setTimeout(function(){
        $('.accent.transition,.accent-picker.transition').removeClass('transition');
    }, 600); // Set delay to be slightly longer than animation
    window.ns.localStorage.set('accent', $(this).data('accent'));
});