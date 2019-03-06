(function($) {

  "use strict"; // Start of use strict



  $(window).on('load', function(){

    $('.hero-text').hide();

    $('#grve-loader-overflow').fadeOut('slow',function(){

      $('.hero-text').show();

      $(this).remove()

    ;});

  });





   $(window).on('load', function(){

    // Set the date we're counting down to

    var countDownDate = new Date("Feb 5, 2019 15:37:25").getTime();



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

      

    // Output the result in an element with id="demo"

    $("#time").html(days + "d " + hours + "h "

    + minutes + "m " + seconds + "s ");

      

    // If the count down is over, write some text 

    if (distance < 0) {

      clearInterval(x);

      $("#time").html('Próximamente');

    }

    }, 1000);

  });



  // Smooth scrolling using jQuery easing

  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {

    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

      var target = $(this.hash);

      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

      if (target.length) {

        $('html, body').animate({

          scrollTop: (target.offset().top - 70)

        }, 1000, "easeInOutExpo");

        return false;

      }

    }

  });



  // Closes responsive menu when a scroll trigger link is clicked

  $('.js-scroll-trigger').click(function() {

    $('.navbar-collapse').collapse('hide');

  });



  // Activate scrollspy to add active class to navbar items on scroll

  $('body').scrollspy({

    target: '#mainNav',

    offset: 100

  });



  // Collapse Navbar

  var navbarCollapse = function() {

    if ($("#mainNav").offset().top > 100) {

      $("#mainNav").addClass("navbar-shrink");

    } else {

      $("#mainNav").removeClass("navbar-shrink");

    }

  };

  // Collapse now if page is not at top

  navbarCollapse();

  // Collapse the navbar when page is scrolled

  $(window).scroll(navbarCollapse);



  // tooltip launcher

  $(function () {

    $('[data-toggle="tooltip"]').tooltip()

  })



})(jQuery); // End of use strict

