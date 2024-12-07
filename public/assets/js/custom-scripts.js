(function ($) {
   "use strict";

   $.fn.andSelf = function () {
      return this.addBack.apply(this, arguments);
   };

   /* Loader Code Start */
   $(window).on("load", function () {
      $(".section-loader").fadeOut("slow");

      var $container = $(".portfolioContainer");
      $container.isotope({
         filter: "*",
         animationOptions: {
            queue: true,
         },
      });

      $(".portfolio-nav li").click(function () {
         $(".portfolio-nav .current").removeClass("current");
         $(this).addClass("current");

         var selector = $(this).attr("data-filter");
         $container.isotope({
            filter: selector,
            animationOptions: {
               queue: true,
            },
         });
         return false;
      });
   });
   /* Loader Code End */

   /*
                                                  |====================
                                                  | Mobile NAv trigger
                                                  |=====================
                                                  */

   var trigger = $(".navbar-toggler"),
      overlay = $(".overlay"),
      navc = $(".navbar-collapse"),
      active = false;

   $(".navbar-toggler, .navbar-nav li a, .overlay").on("click", function () {
      $(".navbar-toggler").toggleClass("active");
      //   $('#js-navbar-menu').toggleClass('active');
      //   $('.navbar-collapse').toggleClass('show');
      overlay.toggleClass("active");
      navc.toggleClass("active");
   });

   /*
                                                  |=================
                                                  | Onepage Nav
                                                  |================
                                                  */

   $("#mh-header").onePageNav({
      currentClass: "active",
      changeHash: false,
      scrollSpeed: 750,
      scrollThreshold: 0.5,
   });

   /*
                                                  |=================
                                                  | fancybox
                                                  |================
                                                  */

   $("[data-fancybox]").fancybox({});

   /*
                                                  |===============
                                                  | WOW ANIMATION
                                                  |==================
                                                  */
   var wow = new WOW({
      mobile: true, // trigger animations on mobile devices (default is true)
   });
   wow.init();

   /*
                                                  |=================
                                                  | AOS
                                                  |================
                                                  */

   //AOS.init();

   /*
                                                  | ==========================
                                                  | NAV FIXED ON SCROLL
                                                  | ==========================
                                                  */
   $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();
      if (scroll >= 50) {
         $(".nav-scroll").addClass("nav-strict");
      } else {
         $(".nav-scroll").removeClass("nav-strict");
      }
   });

   /*
                                                  |=================
                                                  | Progress bar
                                                  |================
                                                  */
   $(".determinate").each(function () {
      var width = $(this).text();
      $(this)
         .css("width", width)
         .empty()
         .append('<i class="fa fa-circle"></i>');
   });

   /*
                                                  |=================
                                                  | Portfolio mixin
                                                  |================
                                                  */
   $("#portfolio-item").mixItUp();

   /*
                                                  |=================
                                                  | Client review
                                                  |================
                                                  */
   $("#mh-client-review").owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: true,
      autoplay: true,
      smartSpeed: 450,
      stopOnHover: false,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      pagination: true,
      autoplayHoverPause: true,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 2,
         },
         1170: {
            items: 3,
         },
      },
   });

   /*
                                                  |=================
                                                  | Project review slide
                                                  |================
                                                  */
   $(".mh-project-testimonial").owlCarousel({
      loop: true,
      responsiveClass: true,
      nav: false,
      dots: false,
      autoplay: true,
      smartSpeed: 450,
      stopOnHover: true,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      autoplayHoverPause: true,
      pagination: false,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 1,
         },
         1170: {
            items: 1,
         },
      },
   });

   /*
                                                  |=================
                                                  | Single Project review
                                                  |================
                                                  */
   $("#single-project").owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: false,
      dots: true,
      autoplay: false,
      smartSpeed: 450,
      stopOnHover: true,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      autoplayHoverPause: true,
      pagination: false,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 1,
         },
         1170: {
            items: 1,
         },
      },
   });

   /*
                                                  |=================
                                                  | Project review slide
                                                  |================
                                                  */
   $(".mh-single-project-slide-by-side").owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: true,
      navText: [
         "<i class='fa fa-angle-left'></i>",
         "<i class='fa fa-angle-right'></i>",
      ],
      dots: false,
      autoplay: false,
      smartSpeed: 450,
      stopOnHover: true,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      autoplayHoverPause: true,
      pagination: false,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 1,
         },
         1170: {
            items: 1,
         },
      },
   });

   /*
                                                  |=================
                                                  | Single client review
                                                  |================
                                                  */
   $("#mh-single-client-review").owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: true,
      autoplay: false,
      smartSpeed: 450,
      stopOnHover: true,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      autoplayHoverPause: true,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 1,
         },
         1170: {
            items: 1,
         },
      },
   });

   /*
                                                  |=================
                                                  | Clint review slide
                                                  |================
                                                  */
   $("#mh-2-client-review").owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: true,
      autoplay: false,
      smartSpeed: 450,
      stopOnHover: true,
      animateIn: "slideInRight",
      animateOut: "slideOutLeft",
      autoplayHoverPause: true,
      responsive: {
         0: {
            items: 1,
         },
         768: {
            items: 2,
         },
         1170: {
            items: 2,
         },
      },
   });

   // Smooth Scroll
   // $(function() {
   //   $('a[href*=#]:not([href=#])').click(function() {
   //    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
   //      var target = $(this.hash);
   //      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
   //      if (target.length) {
   //       $('html,body').animate({
   //         scrollTop: target.offset().top
   //       }, 600);
   //       return false;
   //      }
   //    }
   //   });
   // });

   /*
      |=================
      | CONTACT FORM
      |=================
      */
   
   $("#contactForm")
      .validator()
      .on("submit", function (event) {
         if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Did you fill in the form properly?");
         } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
         }
      });

   function submitForm() {
      var name = $("#name").val();
      var l_name = $("#L_name").val();
      var email = $("#email").val();
      var message = $("#message").val();

      let formData = {
         email,
         message,
         firstname: name,
         lastname: l_name,
      };
      $("#form-submit").attr("disabled", "true").text("Please wait...");

      $.ajax({
         type: "POST",
         url: "/api/v1/contact",
         data: JSON.stringify(formData),
         success: function (text) {
            if (text == "success") {
               formSuccess();
            } else {
               formError();
               submitMSG(false, text);
            }
         },
         error: function (err) {
            formError();
            submitMSG(false, err.status + ' - ' + err.responseText || err.statusText);
         },
      });
   }

   function formSuccess() {
      $("#contactForm")[0].reset();
      submitMSG(true, "Message Sent!");
   }

   function formError() {
      $("#contactForm")
         .removeClass()
         .addClass("shake animated")
         .one(
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
            function () {
               $(this).removeClass();
            }
         );
   }

   function submitMSG(valid, msg) {
      if (valid) {
         var msgClasses = "h3 text-center fadeInUp animated text-success";
      } else {
         var msgClasses = "h3 text-center shake animated text-danger";
      }
      $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
      $("#form-submit").removeAttr("disabled").html("Send Message <i class='fa fa-inbox'></i>");
   }

   /*
     |=================
     | ADD REVIEW FORM
     |=================
     */
   $("#select-avatar").on("focus", () => {
      $("#select-avatar").blur();
      $("#avatar").click();
   });

   $("#avatar").on("change", () => {
      $("#select-avatar").val($("#avatar").val());
   });

   $("#reviewForm")
      .validator()
      .on("submit", function (event) {
         if (event.isDefaultPrevented()) {
            // handle the invalid form...
            reviewFormError();
            submitReviewMSG(false, "Did you fill in the form properly?");
         } else {
            // everything looks good!
            event.preventDefault();
            submitReviewForm();
         }
      });

   async function submitReviewForm() {
      let formData = new FormData($("#reviewForm")[0]);
      $("#review-form-submit").attr("disabled", "true").text("Please wait...");

      try {
         let { data, message } = await axios.post('/api/v1/review/add', formData, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
         });

         if (data == "success") {
            reviewFormSuccess();
         } else {
            reviewFormError();
            submitReviewMSG(false, data.exception || data || message);
         }
      } catch ({ response, message }) {
         reviewFormError();
         submitReviewMSG(false, response.data.exception || response.data || message);
      }
   }

   function reviewFormSuccess() {
      $("#reviewForm")[0].reset();
      submitReviewMSG(true, "Review Added. Thanks.");
   }

   function reviewFormError() {
      $("#reviewForm").removeClass().addClass("shake animated")
      .one(
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
            function () {
               $(this).removeClass();
            }
         );
   }

   function submitReviewMSG(valid, msg) {
      if (valid) {
         var msgClasses = "h3 text-center fadeInUp animated text-success";
         $("#review-form-submit").text("Review Added!")
      } else {
         var msgClasses = "h3 text-center shake animated text-danger";
         $("#review-form-submit").removeAttr("disabled").text("Post Review")
      }
      $("#reviewMsgSubmit").removeClass().addClass(msgClasses).text(msg);
   }
   
   /**
    * REVIEW BUTTON
    */
   $('#review-container').hide()

   $('#review-btn').on('click', () => {
      $('#review-container').slideToggle()
   })
})(jQuery);
