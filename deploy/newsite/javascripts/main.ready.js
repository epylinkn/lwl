$(document).ready(function() {
  
  // Obfuscate email addresses
  $('a.secure').each(function() {
    el = $(this);
    var mail = el.text().replace('(secure)','@').replace('{secure}','.').replace('NOSPAM','')
      .replace(/^\s\s*/, '').replace(/\s\s*$/, '');
    el.each(function(){
      el.attr('href','mailto:' + mail);
      if(el.attr('title')){
        el.html(el.attr('title'));
      }else{
        el.html(mail);
      }
    });
  });


  $('form.schedule-form .group-submit').click(function () {
      $('form.schedule-form').submit();
  });
  
  // *****************************
  // Navigation Links
  // *****************************  
  
  $("#navigation ul li a").hover(function(){
    $(this).stop().animate({ color: '#5CACC1' }, 300, "easeInOutQuart");
  }, function(){
    $(this).stop().animate({ color: '#FFFFFF' }, 300, "easeInOutQuart");
  });

  // *****************************
  // Project Ribbons
  // *****************************  
  
  $(".projects-list li.project").hover(function(){
    $(this).find(".project-foreground").stop().animate({ top: 50 }, 300, "easeInOutQuart");
  }, function(){
    $(this).find(".project-foreground").stop().animate({ top: 70 }, 300, "easeInOutQuart");
  });
  
  $(".properties-list li.project").hover(function(){
    $(this).find(".project-foreground").stop().animate({ top: 70 }, 300, "easeInOutQuart");
  }, function(){
    $(this).find(".project-foreground").stop().animate({ top: 90 }, 300, "easeInOutQuart");
  });
  
  // *****************************
  // For Tenant Links
  // *****************************  
  
  $("#tenant-links").hover(function(){
    $(this).stop().animate({ top: -157 }, 300, "easeInOutQuart");
  }, function(){
    $(this).stop().animate({ top: -33 }, 300, "easeInOutQuart");
  });
  
  // *****************************
  // Carousels
  // *****************************  
  $('.carousel #next-slide').click(function() {
    next_slide(true);
    return false;
  });
  
  $('.carousel #prev-slide').click(function() {
    prev_slide(true);
    return false;
  });
  
  // *****************************
  // Schedule a viewing
  // *****************************
  $('input#referral').on('click', function () {
    $('form.schedule-form .group-who').slideToggle('slow', "easeInOutQuart", function() {
        // Animation complete.
    });
  });
});

function next_slide(stop) {
  if (stop) {
    clearInterval(next_image);
  }

  $.easing.def = 'jswing';
  var slides = $('.carousel-images .item').length;
  var class_list = $(".carousel-images .active").attr("class").split(/\s+/);
  var curr = parseInt(class_list[0].substring(5));
  
  if(curr < slides) {
    next = curr + 1;
  } else {
    next = 1;
  }
  
  $('.carousel-images .item-' + curr).fadeOut(500).removeClass('active');
  $('.carousel-images .item-' + next).fadeIn(500).addClass('active');
}

function prev_slide(stop) {
  if (stop) {
    clearInterval(next_image);
  }
  
  $.easing.def = 'jswing';
  var slides = $('.carousel-images .item').length;
  var class_list = $(".carousel-images .active").attr("class").split(/\s+/);
  var curr = parseInt(class_list[0].substring(5));
  
  if(curr > 1) {
    prev = curr - 1;
  } else {
    prev = slides;
  }
  
  $('.carousel-images .item-' + curr).fadeOut(500).removeClass('active');
  $('.carousel-images .item-' + prev).fadeIn(500).addClass('active');
}
;
