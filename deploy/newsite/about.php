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
          A creative community.
        </span>
      </p>
      <p class='body'>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vest rutrum, ante at pretium hendrerit, doloris ullamcorper diam, volutpat diam odio ac lacus s. Morbi lobortis tempor dolor, eu pulvinar velit accumsan vel.
      </p>
      <br />
      <p>
        <span class='title yellow'>
          100% tax deductible
        </span>
      </p>
      <p class='body'>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vest rutrum, ante at pretium hendrerit, doloris ullamcorper diam, volutpat diam odio ac lacus s. Morbi lobortis tempor dolor, eu pulvinar velit accumsan vel.
      </p>
      <br />
      <p>
        <span class='title red'>
          Modern spaces
        </span>
      </p>
      <p class='body'>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vest rutrum, ante at pretium hendrerit, doloris ullamcorper diam, volutpat diam odio ac lacus s. Morbi lobortis tempor dolor, eu pulvinar velit accumsan vel.
      </p>
      <br />
      <p>
        <span class='title purple'>
          Friendly, available staff
        </span>
      </p>
      <p class='body'>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vest rutrum, ante at pretium hendrerit, doloris ullamcorper diam, volutpat diam odio ac lacus s. Morbi lobortis tempor dolor, eu.
      </p>
      <div class='avatar'>
        <ul>
          <li>
            <img class='avatar-img' src='/newsite/images/avatar.jpg' />
            <p class='avatar-name'>
              Rad Name
            </p>
            <p class='avatar-desc'>
              Title Goes Here
            </p>
          </li>
          <li>
            <img class='avatar-img' src='/newsite/images/avatar.jpg' />
            <p class='avatar-name'>
              Dick Tracy
            </p>
            <p class='avatar-desc'>
              Detective
            </p>
          </li>
          <li>
            <img class='avatar-img' src='/newsite/images/avatar.jpg' />
            <p class='avatar-name'>
              Frank Lloyd
            </p>
            <p class='avatar-desc'>
              Wrighter
            </p>
          </li>
          <li>
            <img class='avatar-img' src='/newsite/images/avatar.jpg' />
            <p class='avatar-name'>
              Rad Name
            </p>
            <p class='avatar-desc'>
              Title Goes Here
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <?php include('includes/_projects.inc.php'); ?>
</div>

<?php include('includes/_footer.inc.php'); ?>