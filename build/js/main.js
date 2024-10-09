// lenis
const lenis = new Lenis({
  lerp: 0.06,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

jQuery(document).ready(function ($) {
  // swiper
  if ($(".block-slider").length) {
    var names = [];
    const slides = document.querySelectorAll(".block-slider .swiper-slide");
    slides.forEach((slide) => {
      names.push(slide.getAttribute("data-title"));
    });

    const swiper = new Swiper(".block-slider .swiper", {
      loop: true,
      spaceBetween: 0,
      speed: 1000,
      autoplay: {
        delay: 2000,
      },
      navigation: {
        prevEl: ".block-slider .swiper-button-prev",
        nextEl: ".block-slider .swiper-button-next",
      },
      pagination: {
        el: ".block-slider .slider-pagination",
        clickable: true,
        type: "custom",

        renderCustom: function (swiper, current, total) {
          var text = "";
          for (let i = 0; i < total; i++) {
            if (current == i + 1) {
              text += '<div class="swiper-pagination-bullet active">' + names[i] + "</div>";
            } else {
              text += '<div class="swiper-pagination-bullet">' + names[i] + "</div>";
            }
          }

          return text;
        },
      },
      on: {
        realIndexChange: function (swiper) {
          console.log(swiper.realIndex);
          var scale = (100 / slides.length / 100) * (swiper.realIndex + 1);
          gsap.to(".swiper-pagination-progressbar-fill", {
            scaleX: scale,
          });
        },
      },
    });

    $(".swiper-overlay-right").on("click", function () {
      swiper.slideNext();
    });
    $(".swiper-overlay-left").on("click", function () {
      swiper.slidePrev();
    });
  }

  if ($(".image-slider").length) {
    document.querySelectorAll(".image-slider").forEach((slider) => {
      const swiper = new Swiper(slider, {
        loop: true,
        direction: "vertical",
        autoHeight: true,
        spaceBetween: 0,
        speed: 1000,
        autoplay: {
          delay: 2000,
        },
      });
    });

    $(".swiper-overlay-right").on("click", function () {
      swiper.slideNext();
    });
    $(".swiper-overlay-left").on("click", function () {
      swiper.slidePrev();
    });
  }

  function preloader() {
    const tl = gsap.timeline({
      delay: 0.5,
    });

    tl.set(".global-wrapper.page-landing", {
      opacity: 1,
    })
      .to(".preloader-logo", {
        opacity: 1,
        ease: "none",
        duration: 1.5,
      })
      .to(".preloader-logo", {
        opacity: 0,
        ease: "none",
        duration: 1.5,
      })
      .to(
        ".preloader",
        {
          opacity: 0,
          ease: "none",
          duration: 1,
          onComplete: function () {
            $(".preloader").hide();
          },
        },
        "-=0.2"
      );
  }

  if ($("#preloader").length) {
    preloader();
  }

  $(".btn-scroll").on("click", function () {
    lenis.scrollTo(window.innerHeight, { duration: 1 });
  });

  $(".btn-play").on("click", function (e) {
    e.preventDefault();
    $(this).hide();
    var video = $(this).prev("video");
    video.attr("controls", true);
    video.get(0).play();
  });

  document.querySelectorAll(".subtitle").forEach((subtitle) => {
    gsap.to(subtitle, {
      scrollTrigger: {
        trigger: subtitle,
        start: "top 70%",
      },
      "--scale": 1,
    });
  });

  if (window.location.hash) {
    var dest = document.querySelector(window.location.hash);
    if (dest) {
      lenis.scrollTo(dest);
    }
  }
});
