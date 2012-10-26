<?php
include('config/config.inc.php');
include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left'>
    <span class='title black'>
      Events
    </span>
    <div class='events-list first'>
      <p>
        <span class='title purple'>
          Upcoming.
        </span>
      </p>
      <ul>
        <?php $count=0; foreach($event_array['upcoming'] as $key => $event) { ?>
          <!-- only do 4 max -->
          <?php $count++; if($count > 4) { break; } ?>
          <li>
            <a href="<?= $event['link'] ?>" target="_blank">
              <div class='event-container upcoming'>
                <div class='event-image'>
                  <img alt="<?= $event['image_alt'] ?>" src="<?= $event['image'] ?>" />
                </div>
                <div class='event-image-overlay'>
                  RSVP
                </div>
                <div class='event-detail clearfix'>
                  <div class='event-detail-date'>
                    <p class='event-detail-date-day'><?= $event['day'] ?></p>
                    <p class='event-detail-date-month'><?= $event['month'] ?></p>
                  </div>
                  <div class='event-detail-description'>
                    <p class='event-detail-title'><?= $event['title'] ?></p>
                    <span><?= $event['description'] ?></span>
                  </div>
                </div>
              </div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class='events-list'>
      <p>
        <span class='title yellow'>
          Past.
        </span>
      </p>
      
      <ul>
        <?php $count=0; foreach($event_array['past'] as $key => $event) { ?>
          <!-- only do 4 max -->
          <?php $count++; if($count > 4) { break; } ?>
          <li>
            <a href="<?= $event['link'] ?>" target="_blank">
              <div class='event-container'>
                <div class='event-image'>
                  <img alt="<?= $event['image_alt'] ?>" src="<?= $event['image'] ?>" />
                </div>
                <div class='event-detail clearfix'>
                  <div class='event-detail-date'>
                    <p class='event-detail-date-day'><?= $event['day'] ?></p>
                    <p class='event-detail-date-month'><?= $event['month'] ?></p>
                  </div>
                  <div class='event-detail-description'>
                    <p class='event-detail-title past'><?= $event['title'] ?></p>
                    <span><?= $event['description'] ?></span>
                  </div>
                </div>
              </div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

<?php include('includes/_footer.inc.php'); ?>