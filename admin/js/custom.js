$(document).ready(function() {
    /* ..............................................
    Open and close sidebar
    ................................................. */
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        // Close all drop-down menu
        // $('.collapse.in').toggleClass('in');
        // $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });


    /* ..............................................
    Ajax indicator
    ................................................. */
    $(document).ajaxStart(function() {
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function() {
        $("#wait").css("display", "none");
    });

})