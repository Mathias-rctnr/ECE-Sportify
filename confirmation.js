const header = document.querySelector("header");
const body = document.body;

let DessinValid = anime({
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

/* const accountSid = 'AC539ed8bc5ced29ddc5cf5dd0fa89ce08';
const authToken = '5c57c30318073c68e33ebbc875a25491';
const client = require('twilio')(accountSid, authToken);

document.addEventListener("onload", (e) => {
    client.messages
    .create({
        body: 'Bonjour, nous vous confirmons la réservation de votre cours !',
        from: '+13204464830',
        to: '+330646763608'
    })
    .then(message => console.log(message.sid))
    .catch(err => console.error(err));

    console.log("test");

}) */