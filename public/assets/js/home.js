//  FaQ
const Btn_trigger_Faq = document.querySelectorAll(".btn-trigger");

Btn_trigger_Faq.forEach((btn) => {
    btn.addEventListener("click", function () {
        let content_status = document.querySelector(".opened");
        const Faq_sign_opened = document.querySelector(".fa-minus");
        content_status.classList.replace("opened", "hidden");
        const Faq_name = btn.getAttribute("content");
        let get_Faq = document.querySelector("." + Faq_name);
        get_Faq.classList.replace("hidden", "opened");
        Faq_sign_opened.classList.replace("fa-minus", "fa-plus");
        const faq_closed = btn.getAttribute("sign");
        const faq_open_trigger = document.querySelector("." + faq_closed);
        faq_open_trigger.classList.replace("fa-plus", "fa-minus");
    });
});

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
