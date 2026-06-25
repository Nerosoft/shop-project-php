
  $(function () {

    // AOS ANIMATION
    AOS.init({
      disable: 'mobile',
      duration: 800,
      anchorPlacement: 'center-bottom'
    });


    // SMOOTH SCROLL
    $(function() {
      //dropdown
      $('.nav-link').on('click', function(event) {
        if(!$(this).hasClass('dropdown-toggle'))
          $('.nav-link').each(function(){   
            if($(this) === event)
              $(this).addClass('active');   
            else{             
              $(this).removeClass('active');
              $(this).removeClass('my_active');
            }
          });
        
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
          }, 1000);
            event.preventDefault();
      });
    });  


    // PROJECT SLIDE
    $('#project-slide').owlCarousel({
      loop: true,
      center: true,
      autoplayHoverPause: false,
      autoplay: true,
      margin: 30,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          768:{
              items:2,
          }
      }
    });

  });