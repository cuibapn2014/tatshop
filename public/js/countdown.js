var expire = document.getElementById('expire-deals').getAttribute('data-time');
var countDownDate = new Date(expire).getTime();
var x = setInterval(function() {

    var now = new Date().getTime();
    var distance = countDownDate - now;

    if (distance <= 0) {
      clearInterval(x);
      document.getElementById('_event-1').style.height="0px";
    }else{

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementsByClassName('days')[0].innerHTML = days + "d";
    document.getElementsByClassName('hours')[0].innerHTML = hours + "h";
    document.getElementsByClassName('minutes')[0].innerHTML = minutes + "m";
    document.getElementsByClassName('seconds')[0].innerHTML = seconds + "s";
    }
    
  }, 1000);