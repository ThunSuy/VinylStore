(function ($) {

  "use strict";

  const tabs = document.querySelectorAll('[data-tab-target]')
  const tabContents = document.querySelectorAll('[data-tab-content]')

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const target = document.querySelector(tab.dataset.tabTarget)
      tabContents.forEach(tabContent => {
        tabContent.classList.remove('active')
      })
      tabs.forEach(tab => {
        tab.classList.remove('active')
      })
      tab.classList.add('active')
      target.classList.add('active')
    })
  });

  // Responsive Navigation with Button

  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".menu-list");

  hamburger.addEventListener("click", mobileMenu);

  function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("responsive");
  }

  const navLink = document.querySelectorAll(".nav-link");

  navLink.forEach(n => n.addEventListener("click", closeMenu));

  function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("responsive");
  }

  var initScrollNav = function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
      $('#header-wrap').addClass("fixed-top");
    } else {
      $('#header-wrap').removeClass("fixed-top");
    }
  }

  $(window).scroll(function () {
    initScrollNav();
  });

  $(document).ready(function () {
    initScrollNav();

    Chocolat(document.querySelectorAll('.image-link'), {
      imageSize: 'contain',
      loop: true,
    })

    $('#header-wrap').on('click', '.search-toggle', function (e) {
      var selector = $(this).data('selector');

      $(selector).toggleClass('show').find('.search-input').focus();
      $(this).toggleClass('active');

      e.preventDefault();
    });


    // close when click off of container
    $(document).on('click touchstart', function (e) {
      if (!$(e.target).is('.search-toggle, .search-toggle *, #header-wrap, #header-wrap *')) {
        $('.search-toggle').removeClass('active');
        $('#header-wrap').removeClass('show');
      }
    });

    $('.main-slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      fade: true,
      dots: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
    });

    // $('#header-wrap').addClass('fixed-top');
    // setTimeout(function () {
    //   $('#header-wrap').addClass('fixed-animate');
    // }, 1000);

    // // Khi cuộn lên:
    // $('#header-wrap').removeClass('fixed-animate');
    // setTimeout(function () {
    //   $('#header-wrap').removeClass('fixed-top');
    // }, 1000);

    // document.querySelectorAll('.menu-list > li > a').forEach(function (link) {
    //   link.addEventListener('click', function () {
    //     // Xóa active ở tất cả các menu item
    //     document.querySelectorAll('.menu-list > li').forEach(function (li) {
    //       li.classList.remove('active');
    //     });
    //     // Đặt active cho menu item vừa click
    //     this.parentElement.classList.add('active');
    //   });
    // });

    window.addEventListener('scroll', function () {
      const header = document.getElementById('header-wrap');
      if (window.scrollY > 250) {
        header.classList.add('header-fixed');
      } else {
        header.classList.remove('header-fixed');
      }
    });

    function updateCartCountDisplay(count) {
      document.getElementById('cart-count-span').innerText = 'Giỏ hàng:(' + count + ')';
    }

    // // Select elements
    // const button = document.getElementById('kt_docs_toast_stack_button');
    // const container = document.getElementById('kt_docs_toast_stack_container');
    // const targetElement = document.querySelector('[data-kt-docs-toast="stack"]'); // Use CSS class or HTML attr to avoid duplicating ids

    // // Remove base element markup
    // targetElement.parentNode.removeChild(targetElement);

    // // Handle button click
    // button.addEventListener('click', e => {
    //   e.preventDefault();

    //   // Create new toast element
    //   const newToast = targetElement.cloneNode(true);
    //   container.append(newToast);

    //   // Create new toast instance --- more info: https://getbootstrap.com/docs/5.1/components/toasts/#getorcreateinstance
    //   const toast = bootstrap.Toast.getOrCreateInstance(newToast);

    //   // Toggle toast to show --- more info: https://getbootstrap.com/docs/5.1/components/toasts/#show
    //   toast.show();
    // });

    $('.product-grid').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
      dots: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 999,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 660,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

    AOS.init({
      duration: 1200,
      once: true,
    })

    jQuery('.stellarnav').stellarNav({
      theme: 'plain',
      closingDelay: 250,
      // mobileMode: false,
    });

  }); // End of a document


})(jQuery);