document.addEventListener("DOMContentLoaded", function() {
    var animated = document.getElementById("footerDetails");
    var animatedFooterSistemInfo = document.getElementById("footerSistemInfo");
    
    var observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
            animated.classList.add("footerDetailsAnimated");
            animatedFooterSistemInfo.classList.add("footerDetailsAnimated");
        } else {
            animated.classList.remove("footerDetailsAnimated");
            animatedFooterSistemInfo.classList.remove("footerDetailsAnimated");
        }
    });
    observer.observe(animated);
});