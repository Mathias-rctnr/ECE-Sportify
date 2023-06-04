const header = document.querySelector("header");
const body = document.body;

let DessinValid = anime({       //animation du svg
    targets: 'svg path',
    strokeDashoffset: [anime.setDashoffset, 0],
    easing: 'easeInOutSine',
    duration: 4000,
    delay: function(el, i) { return i * 250 },
    loop: false,
    complete: function(){
        body.style.overflow = "visible";
        isAnime = true;
    }
});