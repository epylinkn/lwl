<?php
$rootdir = '../';
include($rootdir.'config/config.inc.php');

$title = 'Retail and Warehouse | ' . $meta_array['title'];
$this_key = 'retail';

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
include($rootdir.'includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left our-properties-detail'>
    <div class='property-detail'>
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
        <div class='carousel-title'>
          <span class='title black'>Retail &amp; Warehouse Space</span>
        </div>
      </div>
      <p>
        <span class='title black'>
          Go Beyond the Loft.
        </span>
      </p>
      <p class='body'>
        In addition to our live/work loft spaces, we also have several other retail, office and warehouse properties available for lease. For more information, get in touch with us at <span class='fyellow'>323.441.8694</span> or email us at leasing@liveworkloft.net.
      </p>
      <p>
        <span class='title black'>
          Incentives.
        </span>
      </p>
      <ul>
        <li>
          100% Tax Deductible
        </li>
        <li>
          Creative Corridor Program with City of Glendale
        </li>
      </ul>
    </div>
  <!-- </div> -->
    

    
    <div class='bottom clearfix'>
    <div class='bottom-box'>
      <a href='/schedule-a-viewing/melrose-studios'>
        <div class='bottom-box-square blue'>
          MELROSE STUDIOS
        </div>
      </a>
      <p class='bottom-box-body'>
        Lorem ipsum dolor sit amet con ibe, consectetur adipiscing elit por das. Vestibulum rutrum, ante at pretium hendrerit, dolor nibh ullamcorper diam, ut volutpat diam odio ac lacus.
      </p>
      <a href='/schedule-a-viewing/melrose-studios'>
        <div class='bottom-box-button blue'>
          SCHEDULE A VIEWING
        </div>
      </a>
    </div>
    <div class='bottom-box'>
      <a href='/schedule-a-viewing/seeley-studios'>
        <div class='bottom-box-square orange'>
          SPRING
        </div>
      </a>
      <p class='bottom-box-body'>
        Lorem ipsum dolor sit amet con ibe, consectetur adipiscing elit por das. Vestibulum rutrum, ante at pretium hendrerit, dolor nibh ullamcorper diam, ut volutpat diam odio ac lacus.
      </p>
      <a href='/schedule-a-viewing/seeley-studios'>
        <div class='bottom-box-button orange'>
          SCHEDULE A VIEWING
        </div>
      </a>
    </div>
  </div>
</div>

<?php include($rootdir.'includes/_projects.inc.php'); ?>

<?php include($rootdir.'includes/_footer.inc.php'); ?>