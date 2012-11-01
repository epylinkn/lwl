<?php
include('config/config.inc.php');

$title = 'About | ' . $meta_array['title'];


include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left about'>
    <span class='title black'>
      Live Work Lofts is...
    </span>
    <div class='about-body'>
      <p>
        <span class='title blue'>
          A Creative Community.
        </span>
      </p>
      <p class='body'>
        All of our spaces are unique, which means they attract personalities that match. Filled with creative people from all walks of life, each building contains businesses that thrive on an inter-connected sense of community and purpose.
      </p>
      <br />
      <p>
        <span class='title yellow'>
          100% Tax Deductible
        </span>
      </p>
      <p class='body'>
        Live/work spaces for business, unlike home offices, are completely tax-deductible. In a normal home office situation, only a portion of your space can be written off as a business expense. With <strong>Live Work Loft</strong>, you can write off the whole space, potentially saving you thousands annually.
      </p>
      <br />
      <p>
        <span class='title red'>
          Modern Spaces
        </span>
      </p>
      <p class='body'>
        All of our lofts have been re-purposed from original warehouses or industrial buildings to become urban, modern spaces to live and work. Built specifically with the creative tenant in mind, we take pride in our next generation architecture that continues to stand out in the Los Angeles area.
      </p>
      <br />
      <p>
        <span class='title purple'>
          Friendly, Available staff
        </span>
      </p>
      <p class='body'>
        Sure, you could do lots of research and then call and ask for a showing and hope it all works out. But we prefer a different approach. <strong>Live Work Loft</strong> represents spaces all over Los Angeles, so our staff will find one that matches your location, your budget requirements, and most importantly, you.
      </p>
      <div class='avatar'>
        <ul>
          <li>
            <!-- <img class='avatar-img' src='/images/avatar.jpg' /> -->
            <p class='avatar-name'>
              Amie Childers
            </p>
            <p class='avatar-desc'>
              Leasing Coordinator
            </p>
          </li>
          <li>
            <!-- <img class='avatar-img' src='/images/avatar.jpg' /> -->
            <p class='avatar-name'>
              Ellen Pauwels
            </p>
            <p class='avatar-desc'>
              Leasing Agent
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <?php include('includes/_projects.inc.php'); ?>
</div>

<?php include('includes/_footer.inc.php'); ?>