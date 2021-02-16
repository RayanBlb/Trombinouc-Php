$(document).ready(function() {
    var $sidebarArrow = $('.sidebar-menu-arrow');
    $sidebarArrow.click(function() {
        $(this).next().slideToggle(300);
    });
});