// scrollTop button
const scrollTop = document.querySelector(".scrolltop");



function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        // summon tombol
        scrollTop.style.display = "block";
    } else {
        // jika sudah diatas tombol akan ilang
        scrollTop.style.display = "none";
    }
}

scrollTop.addEventListener("click", function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});

window.onscroll = function () {
    scrollFunction();
};