<?php 
include("config/oauth.php"); 
?>

<div class='status-feed'>
  <span class='title black'>We're Social.</span>
  <ul>
    <?php
      foreach($combo_feed as $status) {
        echo '<li class="'.$status['type'].'">';
        echo '<a href="'.$status['link'].'" target="_blank">';
        echo '<div class="text_here">';
        echo '<span class="ellipsis_text">'.$status['text'].'</span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
      }
    ?>
  </ul>
  <div class='social-buttons'>
    <p class='are-you'>ARE YOU?</p>
    <div class='social-icons'>
      <a href='http://www.facebook.com/liveworkloft' target='_blank'>
        <img alt='Connect with us on Facebook!' src='/images/social_facebook.png' />
      </a>
      <a href='https://twitter.com/liveworkloft' target='_blank'>
        <img alt='Follow us on Twitter!' src='/images/social_twitter.png' />
      </a>
      <a href='http://www.youtube.com/user/liveworkloft' target='_blank'>
        <img alt='Watch us on YouTube!' src='/images/social_youtube.png' />
      </a>
      <a href='http://www.pinterest.com/liveworkloft' target='_blank'>
        <img alt='Connect with us on Pinterest!' src='/images/social_pinterest.png' />
      </a>
      <a href='http://www.instagram.com/liveworkloft' target='_blank'>
        <img alt='Connect with us on Instagram!' src='/images/social_instagram.png' />
      </a>
    </div>
  </div>
</div>