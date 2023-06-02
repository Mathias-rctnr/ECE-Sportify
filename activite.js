let DessinLogo = anime({
    targets: 'svg path',
    strokeDashoffset: [anime.setDashoffset, 0],
    easing: 'easeInOutSine',
    duration: 5000,
    direction: 'alternate',
    delay: function(el, i) { return i * 250 },
    loop: true,
    complete: function(){
        header.style.opacity = "1";
        Anim.style.opacity = "0";
        body.style.overflow = "visible";
        btnOffres.style.opacity = "1"
        isAnime = true;
    }
});