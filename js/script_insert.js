setTimeout(function () {
    $('.loader').fadeToggle();
}, 2000);

window.addEventListener("load", function () {
    setTimeout(
        function open(event) {
            document.querySelector(".pop-up").style.display = "block";
        },
        2000
    )
});

function redirect() {
    location.replace('teacher_attendance.php');
}
setTimeout('redirect()', 5000);