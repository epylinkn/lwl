var next_image; // used in main.ready.js so needs to be global
$(window).load(function() {
  
  // Truncate status feed texts
  $('.text_here').ThreeDots({max_rows: 3});

  var Q = $({});
  
  if ($(".carousel-images").length) {
    Q.queue('anim', function(next) {
      next_image = setInterval(function() {
        // $('.carousel #next-slide').click();
        next_slide(false);
      }, 2000);
    });
  }

  setTimeout(function() {
    Q.dequeue('anim');
  }, 1000);
});
