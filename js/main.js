// Main JS file

var ME = {};

(function($) {

	ME._init = function() {	    
    ME.startListeners();     
    ME.removeToggles(); 
    ME.slideImages(); 
	}
  
	ME.startListeners = function() {         
    $('#burger').on('click', handlers.clickBurger);
    $('nav li.parent a:first-child:not(.sub-menu a)').on('click', handlers.clickNavLinkParent);  
    $('nav li span').on('click', handlers.clickParentPlus);  
    $('.accordions .accordion span').on('click', handlers.clickAccordion);  
	}
  
	ME.removeToggles = function() {         
    $("nav li:not(.menu-item-has-children)").find('span.toggle').remove();
	}
  
	ME.slideImages = function() {         
    $("#hh1,#hh2,#hh3").addClass('open');
    $("#sh1,#sh2").addClass('open');
	}
  
	var handlers = {
        
		clickBurger: function(e) {
      e.preventDefault();    
      $("body,html").toggleClass('nav-open'); 
      $("nav").toggleClass('open'); 
      $("header").toggleClass('open'); 
		},
    
		clickNavLinkParent: function(e) {  
      console.log('clickParent');
      e.preventDefault();    
      $(this).parent().toggleClass('open'); 
		},
    
		clickParentPlus: function(e) {  
      e.preventDefault();  
      $(this).parent().toggleClass('open');  
		},
    
		clickAccordion: function(e) {  
      e.preventDefault();  
      $(this).parent().toggleClass('open'); 
		},
    

    
    

	}

})(jQuery);

jQuery(document).ready(function() {
	ME._init();
  jQuery('.slider').slick({
     infinite:true,
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: true,
     autoplay: true,
     autoplaySpeed: 30000
  });
  
  jQuery('#books').slick({
     infinite:true,
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: true,
     adaptiveHeight: true,
     fade:true,
     autoplay: true,
     autoplaySpeed: 3000,
  });
  
  jQuery('.project-photos .photos').slick({
     infinite:true,
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: true,
     fade:true,
     autoplay: true,
     autoplaySpeed: 5000,
     slide: '.photo-wrap'
  });
  
  jQuery('.news-images-wrap').slick({
     infinite:true,
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: true,
     fade:true,
     autoplay: true,
     autoplaySpeed: 5000,
     slide: '.img-wrap'
  });
  
  jQuery.fn.random = function() {
      var randomIndex = Math.floor(Math.random() * this.length);  
      return jQuery(this[randomIndex]);
  };
  
  jQuery(document).ready(function() {
    if ('.onlyone') {
      jQuery('.onlyone').random().addClass('show');
    }
     
  });
  
  
    

   setTimeout(() => {
     jQuery('.slideshow.left').slick({
       infinite:true,
       slidesToShow: 1,
       slidesToScroll: 1,
       arrows: false,
       autoplay: true,
       autoplaySpeed: 5000,
       fade:true
     });
   }, "0")
    

    
   // jQuery('.slideshow.left').on('init', function(event, slick, direction){
       // jQuery(".hideafterloadleft").addClass('hidenow');
   // });
    
   // jQuery('.slideshow.right').on('init', function(event, slick, direction){
        //jQuery(".hideafterloadright").addClass('hidenow');
    //});
    
    
  
});



// Select all links with hashes
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });