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
  }

  function preloader() {
    var outputCurrent = [0, 0, 0];
    var outputNext = [0, 0, 0];

    function format_number(x) {
      gsap.to("#preloaderVisualInner", {
        duration: 0.1,
        ease: "none",
        width: x + "%",
      });
      var outputCurrent1 = [],
        outputNext1 = [],
        sNumber = x,
        sNumberPrev;
      if (sNumber === 0) {
        sNumberPrev = 0;
      } else {
        sNumberPrev = x - 1;
      }
      sNumber = x.toString();
      sNumberPrev = sNumberPrev.toString();

      if (sNumber.length === 1) {
        sNumber = "00" + sNumber;
      }
      if (sNumber.length === 2) {
        sNumber = "0" + sNumber;
      }
      if (sNumberPrev.length === 1) {
        sNumberPrev = "00" + sNumberPrev;
      }
      if (sNumberPrev.length === 2) {
        sNumberPrev = "0" + sNumberPrev;
      }
      for (var i = 0, len = sNumber.length; i < len; i += 1) {
        outputNext1.push(+sNumber.charAt(i));
        outputCurrent1.push(+sNumberPrev.charAt(i));
      }

      $(".preloader-percent-digit").each(function (i) {
        var $digit = $(this);
        if (outputNext1[i] !== outputNext[i]) {
          $digit.find(".preloader-current").text(+sNumber.charAt(i));
        }
        if (outputCurrent1[i] !== outputCurrent[i]) {
          $digit.find(".preloader-prev").text(+sNumberPrev.charAt(i));
          gsap.to($digit, {
            duration: 0.1,
            ease: "none",
            y: "-100%",
            onComplete: function () {
              gsap.set($digit, {
                y: "0%",
              });
            },
          });
        }
      });

      outputCurrent = outputCurrent1;
      outputNext = outputNext1;
    }

    var counter = document.getElementById("counter"),
      value = {
        val: 100,
      };

    gsap.from(value, {
      duration: 2,
      delay: 0.5,
      ease: "none",
      val: 0,
      roundProps: "val",
      onUpdate: function () {
        format_number(value.val);
      },
      onComplete: function () {
        $(".preloader-percent-digit").each(function (i) {
          var $digit = $(this);
          gsap.to($digit, {
            duration: 0.1,
            ease: "none",
            y: "-100%",
            onComplete: function () {
              $(".global-wrapper").css("opacity", 1);
              gsap.to("#preloader", {
                duration: 0.5,
                ease: "quad.in",
                scale: 5,
                opacity: 0.5,
                onComplete: function () {
                  $("#preloader").hide();
                },
              });
            },
          });
        });
      },
    });
  }

  if ($("#preloader").length) {
    preloader();
  }
});
