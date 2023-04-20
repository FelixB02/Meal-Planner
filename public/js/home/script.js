$(document).ready(function () {
    $(".testmon").slick({
      centerMode: true,
      centerPadding: "350px",
      dots: true,
      arrows: false,
      slidesToScroll: 1,
      slidesToShow: 1,
      responsive: [
        {
          breakpoint: 1250,
          settings: {
            centerMode: true,
            centerPadding: "250px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 990,
          settings: {
            centerMode: true,
            centerPadding: "150px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 768,
          settings: {
            centerMode: true,
            centerPadding: "50px",
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            centerMode: true,
            centerPadding: "15px",
            slidesToShow: 1,
          },
        },
      ],
    });
  });
  