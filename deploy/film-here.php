<?php
include('config/config.inc.php');

$title = 'Film Here | ' . $meta_array['title'];
$this_key = 'filmhere';

$file_exts = 'jpg|jpeg|png|gif';
$slides = array();
if($fh = scandir($rootdir.'images/properties/'.$this_key)) {
  foreach($fh as $image) {
    $arr = explode('.', $image);
    $ext = array_pop($arr);
    if($ext && stristr($file_exts, $ext)) {
      $slides []= $image;
    }
  }
}

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
          <?php for($i = 1; $i <= count($slides); $i++) { ?>
            <?php if(1 == $i) { ?>
              <div class='item-1 item active'>
            <?php } else { ?>
              <div class="item-<?= $i ?> item">
            <?php } ?>
                <img src="/images/properties/<?= $this_key ?>/<?= $slides[$i-1] ?>" />
              </div>
          <?php } ?>
        </div>
        <img alt='Previous Slide' id='prev-slide' src='/images/slider_left.png' />
        <img alt='Next Slide' id='next-slide' src='/images/slider_right.png' />
      </div>
      <p class='body'>
        In addition to our live/work loft spaces, we also have several other
        <a class='link-yellow underline' href='/properties/retail-and-warehouse'><strong>retail and warehouse locations</strong></a>
        available for filming and photo shoots. Doritos, Chris Brown, CSI:NY, Bones, Maxim and Cracked.com are just a few of the productions and clients that have filmed here.
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