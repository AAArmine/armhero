// Testimonials carousel (uses the Owl Carousel library)
$(".testimonials-carousel").owlCarousel({
  autoplay: true,
  dots: true,
  loop: true,
  responsive: {
    0: {
      items: 1
    },
    320: {
      items: 1
    },
    425: {
      items: 1
    },
    768: {
      items: 3
    },
    900: {
      items: 5
    },
    1024: {
      items: 5
    },
    1440: {
      items: 5
    }
  }
});

$(".birth-event-carousel").owlCarousel({
  autoplay: true,
  dots: true,
  loop: true,
  responsive: {
    0: {
      items: 1
    },
    320: {
      items: 1
    },
    425: {
      items: 1
    },
    768: {
      items: 2
    },
    900: {
      items: 2
    },
    1024: {
      items: 3
    },
    1440: {
      items: 3
    }
  }
});

// $("#testimonials11>div").owlCarousel({
//   items: 3,
//   loop: false,
//   mouseDrag: false,
//   touchDrag: false,
//   pullDrag: false,
//   rewind: true,
//   autoplay: true,
//   margin: 0,
//   nav: true
// });






