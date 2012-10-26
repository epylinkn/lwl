var next_image; // used in main.ready.js so needs to be global
$(window).load(function() {
  var Q = $({});
  
  if ($(".carousel-images").length > 0) {
    Q.queue('anim', function(next) {
      next_image = setInterval(function() {
        // $('.carousel #next-slide').click();
        next_slide(false);
      }, 2000);
    });
  }

  setTimeout(function() {
    Q.dequeue('anim');
  }, 2000);
});
