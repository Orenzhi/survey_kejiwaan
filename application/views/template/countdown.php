<script type="text/javascript">
  // Set the date we're counting down to
  //var countDownDate = new Date("April 20, 2020 10:00:00").getTime();
    var countDownDate = new Date("September 6, 2019 00:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);


    // Display the result in the element with id="demo"
    document.getElementById("timer").innerHTML = "DEADLINE : " + days + " Hari " + hours + " Jam " +
      minutes + " Menit " + seconds + " Detik ";

    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("timer").innerHTML = "WAKTU TELAH HABIS";
    }
  }, 1000);
</script>