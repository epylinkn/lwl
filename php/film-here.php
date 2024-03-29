<?php
include('config/config.inc.php');
include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left film-here'>
    <span class='title black'>
      Film Here
    </span>
    <div class='films'>
      <div class='carousel'>
        <div class='carousel-images'>
          <div class='item-1 item active'>
            <img src='/images/properties/filmhere01.jpg' />
          </div>
          <div class='item-2 item'>
            <img src='/images/properties/filmhere02.jpg' />
          </div>
        </div>
        <img alt='Previous Slide' id='prev-slide' src='/images/slider_left.png' />
        <img alt='Next Slide' id='next-slide' src='/images/slider_right.png' />
      </div>
      <p class='body'>
        Duis at lacus est, sed rhoncus risus. Maecenas ornare urna dolor, vitae luctus ligula. Sed blandit purus tempus diam tincidunt a vehicula velit pretium. Suspendisse vitae sapien ipsum. Nulla tortor enim, pulvinar quis vestibulum in, laoreet at est. Curabitur convallis dolor eget dui ornare pretium ut lacinia eros. Mauris eu dolor at nibh bibendum auctor.
      </p>
      <p class='body'>
        In addition to our live/work loft spaces, we also have several other
        <a class='link-yellow underline' href='/properties/retail-and-warehouse.php'>
          <strong>retail and warehouse locations</strong>
        </a>
        available for filming and photo shoots.
      </p>
      <p class='body'>
        Call one of our leasing agents for rats and more information at 323.441.8694, or email us at
        <a class='link-yellow underline fbold secure'>
          film(secure)liveworkloft{secure}net
        </a>.
      </p>
    </div>
  </div>
  <div class='clients'>
    <span class='title black'>
      Past Clients
    </span>
    <ul>
      <li>
        <img alt='Food Network' src='/images/logo_food.png' />
      </li>
      <li>
        <img alt='SyFy Network' src='/images/logo_syfy.png' />
      </li>
      <li>
        <img alt='The Guild' src='/images/logo_guild.png' />
      </li>
      <li>
        <img alt='Audi' src='/images/logo_audi.png' />
      </li>
    </ul>
  </div>
</div>

<?php include('includes/_footer.inc.php'); ?>