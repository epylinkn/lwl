<?php
include('config/config.inc.php');

$title = $meta_array['title'];

include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left home'>
    <span class='title black'>
      Spaces that
      <span class='fblue'>
        inspire.
      </span>
    </span>
    <p class='body'>
      Live Work Loft is dedicated to delivering
      <a href="/newsite/about.php">
        <span class='fblue underline'>top notch creative spaces</span>
      </a>
      in Los Angeles to the thought leaders of the world. We aim
      for the unique; anything that is comparable
      to the status quo is unacceptable.
    </p>
  </div>

  <?php include('includes/_projects.inc.php'); ?>  
  <?php include('includes/_feed.inc.php'); ?>
</div>

<?php include('includes/_footer.inc.php'); ?>