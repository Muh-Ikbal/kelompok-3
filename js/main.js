// JavaScript to toggle between sign-up and sign-in sections
$(document).ready(function () {
    $(".signup-image-link").click(function () {
        $("#signup-section").hide();
        $("#signin-section").show();
    });

    $(".signin-image-link").click(function () {
        $("#signup-section").show();
        $("#signin-section").hide();
    });
});
