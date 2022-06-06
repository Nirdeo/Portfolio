$(document).ready(function () {
    $("#myTable").DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
        },
    });
    /*Effet Jquery 1v2*/
    $("#flip").click(function () {
        $("#panel").slideToggle("slow");
    });
    /* Tooltip */
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    $(".icon1").mouseenter(function () {
        $(".icon1").animate({
            left: "250px",
            opacity: "1",
            height: "150px",
            width: "150px",
        });
    });
    /* Effet noir et blanc */
    $(".carousel").hover(
        function () {
            $(".w-100").removeClass("bw");
        },
        function () {
            $(".w-100").addClass("bw");
        }
    );
    /* Effet scroll */
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
});