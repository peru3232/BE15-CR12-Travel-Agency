const footer = document.getElementsByTagName("footer")[0] as HTMLElement;
const body = document.getElementsByTagName("body")[0] as HTMLElement;
footer.addEventListener("mouseenter", function() {footerSlide(true)});
footer.addEventListener("mouseleave", function() {footerSlide(false)});
 //slide out only with mouse in window
body.addEventListener("mouseenter", function() {footerSlide(false)});

function footerSlide(over:boolean) {
    const toggle = document.getElementsByClassName("toggle")[0] as HTMLElement;
    if (over){
        toggle.classList.remove("animate__slideOutDown");
        toggle.classList.add("animate__slideInUp");
    } else {
        toggle.classList.remove("animate__slideInUp");
        toggle.classList.add("animate__slideOutDown");
    }
}

