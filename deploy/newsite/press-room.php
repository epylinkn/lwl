<?php
include('config/config.inc.php');

$title = 'Press Room | ' . $meta_array['title'];


include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left press-room'>
    <span class='title black'>
      Press Room
    </span>
    <div class='press-list'>
      <ul>
        <?php foreach($pressitem_array as $key => $item) { ?>
          <li class='pressitem'>
            <div class='pressitem-date'>
              <p class='pressitem-date-day'><?= $item['day'] ?></p>
              <p class='pressitem-date-month'><?= $item['month'] ?></p>
            </div>
            <p class='pressitem-title'>
              <?= $item['title'] ?>
            </p>
            <div class='pressitem-line'></div>
            <p class='pressitem-body'>
              <span class='pressitem-location'><?= $item['location'] ?></span>
              <?= $item['description'] ?>
              <a class='link-blue' href="<?= $item['link'] ?>" target="_blank">
                - Read Full Press Release
              </a>
            </p>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

<?php include('includes/_footer.inc.php'); ?>