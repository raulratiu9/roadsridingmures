$(document).ready(function() {
    $(".toggle").click(function() {
        $(".toggle").toggleClass("active")
    })
})
$(window).on("scroll", function() {
    if ($(window).scrollTop()) {
        $("nav").addClass("black");
    } else {
        $("nav").removeClass("black");
    }
})
$(document).ready(function() {
    $(".toggle").click(function() {
        $("nav ul").toggleClass("active")
    })
})