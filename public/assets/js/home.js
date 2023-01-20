

// scrollTop button
const scrollTop = document.querySelector(".scrolltop");

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
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

// scrollspy

// $(".scroll-spy").scrollSpy({
//     offsetElement: ".navbar",
// });

// $(".scroll-spy").scrollSpy({
//     offset: 0,
//     scrollDuration: 800,
//     scrollEasing: "easeInBack",
// });

// $(".scroll-spy").scrollSpy({
//     activeClass: "active",
// });

// $(".scroll-spy").scrollSpy({
//     anchors: ["a[href*=\\#]"],
// });
