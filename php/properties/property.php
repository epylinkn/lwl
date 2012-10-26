<?php
$rootdir = '../';
include($rootdir.'config/config.inc.php');
if (isset($_GET['key']) && array_key_exists($_GET['key'], $project_array)) {
  $this_key = $_GET['key'];
  $project = $project_array[$this_key];
} else {
  header("Location: http://www.liveworkloft.net");
}

include($rootdir.'includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left our-properties-detail'>
    <div class='property-detail'>
      <div class='carousel'>
        <div class='carousel-images'>
          <div class='item-1 item active'>
            <img src='/images/properties/seeley01.jpg' />
          </div>
          <div class='item-2 item'>
            <img src='/images/properties/seeley02.jpg' />
          </div>
          <div class='item-3 item'>
            <img src='/images/properties/seeley03.jpg' />
          </div>
          <div class='item-4 item'>
            <img src='/images/properties/seeley04.jpg' />
          </div>
        </div>
        <img alt='Previous Slide' id='prev-slide' src='/images/slider_left.png' />
        <img alt='Next Slide' id='next-slide' src='/images/slider_right.png' />
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
    <a href="/schedule-a-viewing.php?key=<?= $this_key ?>">
      <div class='bottom-schedule-a-viewing'>
        SCHEDULE A VIEWING
      </div>
    </a>
    <div class='bottom-property-map'>
      <?php echo $project['map_iframe']; ?>
    </div>
    <div class="bottom-social-buttons">
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