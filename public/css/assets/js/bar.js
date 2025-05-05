$(document).ready(function() {
    // Toggle Sidebar on button click
    $('.toggle-sidebar').click(function() {
        console.log('Sidebar button clicked');
        $('#sidebar').toggleClass('open');  // Toggle the 'open' class on the sidebar
    });

    // Optional: Sidenav Toggler button functionality (if you need to implement)
    $('.sidenav-toggler').click(function() {
        console.log('Sidenav button clicked');
        $('body').toggleClass('sidenav-open');  // Optional, for custom body class
    });

    // Optional: Topbar More button functionality
    $('.topbar-toggler').click(function() {
        console.log('Topbar button clicked');
        $('.topbar-menu').toggleClass('show');  // Toggle topbar menu visibility if needed
    });
});
