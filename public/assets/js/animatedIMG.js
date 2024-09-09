var containerIMG = document.getElementById("containerIMG");

document.addEventListener("DOMContentLoaded", function () {
    AnimatedIMG1();
    AnimatedIMG2();
    AnimatedIMG3();
    AnimatedIMG4();
    AnimatedIMG5();
    AnimatedIMG6();
    AnimatedIMG7();
    AnimatedIMG8();
});

function AnimatedIMG1() {
    var animatedIMG1 = document.getElementById("animatedIMG1");
    var ObserverAnimatedIMG1 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG1.classList.add("animatedIMG1");
        } else {
            animatedIMG1.classList.remove("animatedIMG1");
        }
    });
    ObserverAnimatedIMG1.observe(animatedIMG1);
}

function AnimatedIMG2() {
    var animatedIMG2 = document.getElementById("animatedIMG2");
    var ObserverAnimatedIMG2 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG2.classList.add("animatedIMG2");
        } else {
            animatedIMG2.classList.remove("animatedIMG2");
        }
    });
    ObserverAnimatedIMG2.observe(animatedIMG2);
}

function AnimatedIMG3() {
    var animatedIMG3 = document.getElementById("animatedIMG3");
    var ObserverAnimatedIMG3 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG3.classList.add("animatedIMG3");
        } else {
            animatedIMG3.classList.remove("animatedIMG3");
        }
    });
    ObserverAnimatedIMG3.observe(animatedIMG3);
}

function AnimatedIMG4() {
    var animatedIMG4 = document.getElementById("animatedIMG4");
    var ObserverAnimatedIMG4 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG4.classList.add("animatedIMG4");
        } else {
            animatedIMG4.classList.remove("animatedIMG4");
        }
    });
    ObserverAnimatedIMG4.observe(animatedIMG4);
}

function AnimatedIMG5() {
    var animatedIMG5 = document.getElementById("animatedIMG5");
    var ObserverAnimatedIMG5 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG5.classList.add("animatedIMG5");
        } else {
            animatedIMG5.classList.remove("animatedIMG5");
        }
    });
    ObserverAnimatedIMG5.observe(animatedIMG5);
}

function AnimatedIMG6() {
    var animatedIMG6 = document.getElementById("animatedIMG6");
    var ObserverAnimatedIMG6 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG6.classList.add("animatedIMG6");
        } else {
            animatedIMG6.classList.remove("animatedIMG6");
        }
    });
    ObserverAnimatedIMG6.observe(animatedIMG6);
}

function AnimatedIMG7() {
    var animatedIMG7 = document.getElementById("animatedIMG7");
    var ObserverAnimatedIMG7 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG7.classList.add("animatedIMG7");
        } else {
            animatedIMG7.classList.remove("animatedIMG7");
        }
    });
    ObserverAnimatedIMG7.observe(animatedIMG7);
}

function AnimatedIMG8() {
    var animatedIMG8 = document.getElementById("animatedIMG8");
    var ObserverAnimatedIMG8 = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
            animatedIMG8.classList.add("animatedIMG8");
        } else {
            animatedIMG8.classList.remove("animatedIMG8");
        }
    });
    ObserverAnimatedIMG8.observe(animatedIMG8);
}