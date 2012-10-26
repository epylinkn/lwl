<?php
include('config/config.inc.php');
include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left our-properties'>
    <span class='title black'>
      Our Properties
    </span>
    <div class='properties-list'>
      <ul>
        <?php foreach( $project_array as $key => $project) { ?>
          <li class="project <?= $key ?>">
            <a href="/properties/property.php?key=<?= $key ?>">
              <div class='project-background'>
                <img alt="<?= $project['title'] ?>" src="<?= $project['large_image'] ?>" />
              </div>
              <div class='project-foreground'>
                <img class='ribbon-end' src="/images/ribbon_<?= $project['theme'] ?>.png" />
                <div class="<?= $project['theme'] ?> ribbon">
                  <!-- removes the period from title -->
                  <span><?php echo substr($project['title'],0,-1); ?></span>
                </div>
              </div>
            </a>
          </li>
        <?php } ?>
        <!-- Retail and Warehouse is manual b/c so custom -->
        <li class='project warehouse'>
          <a href='/properties/retail-and-warehouse.php'>
            <div class='project-background'>
              <img alt='property image' src='/images/properties_warehouse.png' />
            </div>
            <div class='project-foreground'>
              <img class='ribbon-end' src='/images/ribbon_black.png' />
              <div class='black ribbon'>
                <span>Retail &amp; Warehouse Space</span>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

<?php include('includes/_footer.inc.php'); ?>