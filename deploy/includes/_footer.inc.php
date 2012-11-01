    <div id='push'></div>
  </div>
</div>
<div id='footer'>
  <div id='hypelife'>
    <a href='http://www.hypelifebrands.com/' target='_blank'>
      <img alt='Hypelife Brands' src='/images/hypelife_logo.jpg' />
      <div id='popup'>
        Branding Development
        <br />
        By HypeLife Brands
        <br />
        Learn More at
        <br />
        hypelifebrands.com
      </div>
    </a>
  </div>
  <div id='tenant-links'>
    <div class='tenant-title'>
      For Tenants
    </div>
    <ul>
      <li>
        <a class="secure-notext" href='maintenance(secure)liveworkloft{secure}net'>
          Got a Leak?
        </a>
      </li>
      <!-- <li>
        <a href='/frequently-asked-questions'>
          Frequently Asked Questions
        </a>
      </li> -->
      <li>
        <a class="secure-notext" href='leasing(secure)liveworkloft{secure}net'>
          Got a Question?
        </a>
      </li>
    </ul>
  </div>
  <div class='footer-wrap'>
    <div class='footer'>
      <div class='footer-column1'>
        <p class='header'><strong>LEASING OFFICE</strong></p>
        <p class='nonheader'>2664 Lacy Street</p>
        <p class='nonheader'>
          Los Angeles, CA 90031&nbsp;&nbsp;
          <a class='link-yellow' href='https://maps.google.com/maps?q=2664+Lacy+Street,+Los+Angeles,+CA+90031&amp;hl=en&amp;sll=37.269174,-119.306607&amp;sspn=13.223431,16.040039&amp;hnear=2664+Lacy+St,+Los+Angeles,+California+90031&amp;t=m&amp;z=17' target='_blank'>
            <strong class='f11'>GET DIRECTIONS</strong>
          </a>
        </p>
        <p class='nonheader'>Phone: 323.441.8694</p>
      </div>
      <div class='footer-column2'>
        <p class='header'><strong>HOURS &amp; APPOINTMENTS</strong></p>
        <p class='nonheader'>Open 9am to 6pm Monday - Friday. Weekend appointments available when scheduled in advance.</p>
      </div>
      <div class='footer-column3'>
        <?php $qkey = array_rand($quote_array, 1); ?>
        <p class='header'><strong>PEOPLE DIG US</strong></p>
        <p class='nonheader'>"<?= $quote_array[$qkey]['quote']; ?>"</p>
        <p class='nonheader'>- <?= $quote_array[$qkey]['name']; ?></p>
      </div>
      <div class='footer-row'>
        <p class='f11'>&copy; 2012 Live Work Loft. All rights reserved. In other words, stealing is very uncool.</p>
        <a href='http://www.hypelifebrands.com/' target='_blank'>
          <span class="branding-development">Branding Development by Hypelife Brands (Los Angeles | Kansas City | NYC)</span>
        </a>
      </div>
    </div>
  </div>
</div>
  <!-- Javascripts -->
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
  <script type='text/javascript'>
    //<![CDATA[
    window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.8.0.min.js"><\/script>')
    //]]>
  </script>
  <script src="/javascripts/vendor/jquery.ui.effect.js" type="text/javascript"></script>
  <script src="/javascripts/main.ready.js" type="text/javascript"></script>
  <script src="/javascripts/main.load.js" type="text/javascript"></script>
  <script src="/javascripts/vendor/jquery.threedots.min.js" type="text/javascript"></script>
  <script src="/javascripts/vendor/placeholder.js" type="text/javascript"></script>
  <script src="/javascripts/social.js" type="text/javascript"></script>
  
  <!--[if lt IE 9]> 
    <script src="/javascripts/vendor/jquery.backgroundSize.js" type="text/javascript"></script>       
    <script>
      $("body").css("background-size", "cover");
    </script>
  <![endif]-->

  <!-- Google Analytics -->
  <script type='text/javascript'>
    //<![CDATA[
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
    //]]>
  </script>
</body>
</html>
