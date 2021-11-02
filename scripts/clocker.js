const degr = 6;
const hr = document.querySelector('#hours');
const mn = document.querySelector('#minutes');
const sc = document.querySelector('#seconds');

var test = document.getElementsByTagName('timestamp');

setInterval(() => {
    let day = new Date();
    let hh = day.getHours() * 30;
    let mm = day.getMinutes() * degr;
    let ss = day.getSeconds() * degr;
    hr.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
    mn.style.transform = `rotateZ(${mm}deg)`;
    sc.style.transform = `rotateZ(${ss}deg)`;
})