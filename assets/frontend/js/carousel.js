$(document).ready(function() {
$('#myCarousel3').on('slide.bs.carousel', function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $('.carousel-item3').length;
    //alert(itemsPerSlide);
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('#carousel-item3').eq(i).appendTo('#carousel-inner3');
            }
            else {
                $('#carousel-item3').eq(0).appendTo('#carousel-inner3');
            }
        }
    }
});


  $('#myCarousel').carousel({ 
                interval: 2000
        });



$('#myCarousel1').on('slide.bs.carousel', function (e) {

  
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item1').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('#carousel-item1').eq(i).appendTo('#carousel-inner1');
            }
            else {
                $('#carousel-item1').eq(0).appendTo('#carousel-inner1');
            }
        }
    }
});


  $('#myCarousel1').carousel({ 
                interval: 2000
        });



$('#myCarousel2').on('slide.bs.carousel', function (e) {

  
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item2').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('#carousel-item2').eq(i).appendTo('#carousel-inner2');
            }
            else {
                $('#carousel-item2').eq(0).appendTo('#carousel-inner2');
            }
        }
    }
});


  $('#myCarousel2').carousel({ 
                interval: 2000
        });


 $('#carouselClient').on('slide.bs.carousel', function (e) {

  
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
  $("#carouselClient").swiperight(function() {
      $(this).carousel('prev');
    });
   $("#carouselClient").swipeleft(function() {
      $(this).carousel('next');
   });
  $('#carouselClient').carousel({ 
                interval: 2000
        });
});