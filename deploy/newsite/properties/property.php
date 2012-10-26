<?php
$rootdir = '../';
include($rootdir.'config/config.inc.php');
if (isset($_GET['key']) && array_key_exists($_GET['key'], $project_array)) {
  $this_key = $_GET['key'];
  $project = $project_array[$this_key];
  
  $title = $project['title'] . ' | ' . $meta_array['title'];
} else {
  header("Location: http://www.liveworkloft.net");
}

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
                <img src="/newsite/images/properties/<?= $this_key ?>/<?= $slides[$i-1] ?>" />
              </div>
          <?php } ?>
        </div>
        <img alt='Previous Slide' id='prev-slide' src='/newsite/images/slider_left.png' />
        <img alt='Next Slide' id='next-slide' src='/newsite/images/slider_right.png' />
        <div class='carousel-title'>
          <span class="title <?= $project['theme'] ?>"><?= $project['title']; ?></span>
        </div>
      </div>
      <p>
        <span class='title black'>
          Historical Landmark Meets Urban Chic
        </span>
      </p>
      <p class='body'>
        <?= $project['description']; ?>
      </p>
      <p>
        <span class='title black'>
          Amenities.
        </span>
      </p>
      <ul>
        <?php 
          foreach($project['amenities'] as $key => $amenity) { 
            echo '<li>'.$amenity.'</li>';
          } 
        ?>
      </ul>
      <p>
        <span class='title black'>
          Incentives.
        </span>
      </p>
      <ul>
        <?php 
          foreach($project['incentives'] as $key => $incentive) { 
            echo '<li>'.$incentive.'</li>';
          } 
        ?>
      </ul>
    </div>
  </div>
  
  <?php include($rootdir.'includes/_projects.inc.php'); ?>
  
  <div class='bottom clearfix'>
    <a href="/newsite/schedule-a-viewing.php?key=<?= $this_key ?>">
      <div class='bottom-schedule-a-viewing'>
        SCHEDULE A VIEWING
      </div>
    </a>
    <div class='bottom-property-map'>
      <?php echo $project['map_iframe']; ?>
    </div>
    <div class='bottom-social-buttons'>
      <?php foreach($project['social'] as $key => $social) { ?>
        <a href="<?= $social['link'] ?>" target='_blank'>
          <div class="button <?= $key ?>">
            <?= $social['blurb'] ?>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
</div>

<?php include($rootdir.'includes/_footer.inc.php'); ?>