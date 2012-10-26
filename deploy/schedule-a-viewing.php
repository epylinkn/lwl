<?php
include('config/config.inc.php');

if (isset($_GET['key']) && array_key_exists($_GET['key'], $project_array)) {
  $this_key = $_GET['key'];
} else {
  $this_key = '';
}

if (isset($_POST['_submitted'])) {
  
  $mail_body = array();
  $form_errors = array();
  
  //validate fields
  if(isset($_POST['name']) && !empty($_POST['name'])) {
    array_push($mail_body, "Name: ".$_POST['name']);
  } else {
    array_push($form_errors, "Please enter your name.");
  }
  if(isset($_POST['email']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    array_push($mail_body, "Email: ".$_POST['email']);
  } else {
    array_push($form_errors, "Please enter a valid email address.");
  }
  
  // phone numbers
  if(isset($_POST['mobile_phone']) && !empty($_POST['mobile_phone'])) {
    array_push($mail_body, "Mobile Phone: ".$_POST['mobile_phone']);
  }  
  if(isset($_POST['other_phone']) && !empty($_POST['other_phone'])) {
    array_push($mail_body, "Other Phone: ".$_POST['other_phone']);
  }
  
  // contact method
  if(isset($_POST['contact_method']) && !empty($_POST['contact_method'])) {
    array_push($mail_body, "Contact Method: ".$_POST['contact_method']);
  }
  
  // criteria
  if(isset($_POST['square_footage']) && !empty($_POST['square_footage'])) {
    array_push($mail_body, "Desired square footage: ".$_POST['square_footage']);
  }
  if(isset($_POST['budget']) && !empty($_POST['budget'])) {
    array_push($mail_body, "Budget: ".$_POST['budget']);
  }
  if(isset($_POST['move_date']) && !empty($_POST['move_date'])) {
    array_push($mail_body, "Target move-in date: ".$_POST['move_date']);
  }
  
  // area of interest
  if(isset($_POST['downtownla']) && !empty($_POST['downtownla'])) {
    array_push($mail_body, "Downtown LA: Yes");
  } else {
    array_push($mail_body, "Downtown LA: No");
  }
  if(isset($_POST['hollywood']) && !empty($_POST['hollywood'])) {
    array_push($mail_body, "Hollywood: Yes");
  } else {
    array_push($mail_body, "Hollywood: No");
  }
  if(isset($_POST['glendale']) && !empty($_POST['glendale'])) {
    array_push($mail_body, "Glendale: Yes");
  } else {
    array_push($mail_body, "Glendale: No");
  }
  
  // lease desired
  if(isset($_POST['short']) && !empty($_POST['short'])) {
    array_push($mail_body, "Short-term Lease: Yes");
  } else {
    array_push($mail_body, "Short-term Lease: No");
  }
  if(isset($_POST['one_year']) && !empty($_POST['one_year'])) {
    array_push($mail_body, "One Year Lease: Yes");
  } else {
    array_push($mail_body, "One Year Lease: No");
  }
  if(isset($_POST['multi_year']) && !empty($_POST['multi_year'])) {
    array_push($mail_body, "Multi-year Lease: Yes");
  } else {
    array_push($mail_body, "Multi-year Lease: No");
  }

  // buildings of interest
  if(isset($_POST['lacy']) && !empty($_POST['lacy'])) {
    array_push($mail_body, "Lacy Lofts: Yes");
  } else {
    array_push($mail_body, "Lacy Lofts: No");
  }
  if(isset($_POST['beverly']) && !empty($_POST['beverly'])) {
    array_push($mail_body, "Beverly: Yes");
  } else {
    array_push($mail_body, "Beverly: No");
  }
  if(isset($_POST['spring']) && !empty($_POST['spring'])) {
    array_push($mail_body, "Spring: Yes");
  } else {
    array_push($mail_body, "Spring: No");
  }
  if(isset($_POST['cosmo']) && !empty($_POST['cosmo'])) {
    array_push($mail_body, "Cosmo: Yes");
  } else {
    array_push($mail_body, "Cosmo: No");
  }
  if(isset($_POST['melrose']) && !empty($_POST['melrose'])) {
    array_push($mail_body, "Melrose: Yes");
  } else {
    array_push($mail_body, "Melrose: No");
  }
  if(isset($_POST['seeley']) && !empty($_POST['seeley'])) {
    array_push($mail_body, "Seeley: Yes");
  } else {
    array_push($mail_body, "Seeley: No");
  }
  
  // referral source?
  if(isset($_POST['search']) && !empty($_POST['search'])) {
    array_push($mail_body, "Referral Type: Search");
  }
  if(isset($_POST['referral']) && !empty($_POST['referral'])) {
    array_push($mail_body, "Referral Type: Tenant Referral");
    
    // referral name?
    if(isset($_POST['referral_name']) && !empty($_POST['referral_name'])) {
      array_push($mail_body, "Referrer: ".$_POST['referral_name']);
    } else {
      array_push($form_errors, "Please enter your referrer's name so we can thank them!");
    }
  }
  if(isset($_POST['craigslist']) && !empty($_POST['craigslist'])) {
    array_push($mail_body, "Referral Type: Craigslist");
  }
  if(isset($_POST['advertisement']) && !empty($_POST['advertisement'])) {
    array_push($mail_body, "Referral Type: Advertisement");
  }

  // message
  if(isset($_POST['message']) && !empty($_POST['message'])) {
    array_push($mail_body, "Message: ".$_POST['message']);
  }
  
  // email opt-in
  if(isset($_POST['option']) && !empty($_POST['option'])) {
    array_push($mail_body, "Email Opt-in: Yes");
  } else {
    array_push($mail_body, "Email Opt-in: No");
  }
  
  if(count($form_errors) == 0) {
    // sending email
    $to = "testing@hypelifebrands.com";
    $subject = "New Pre-Application from LiveWorkLoft.net";
    $body = "";
    foreach($mail_body as $msg) {
      $body .= $msg . "\n";
    }
    mail($to, $subject, $body);
  } 
}

include('includes/_header.inc.php');
?>

<div class='content clearfix'>
  <div class='content-left schedule-a-viewing'>
    <?php if(!isset($form_errors) || count($form_errors) > 0) { ?>
      <div class='page-1'>
        <span class='title black'>
          Interested? Let's Chat!
        </span>
        <div class='indicates'>
          <span class='title black tiny'>
            *Indicates Required Field
          </span>
        </div>
        <?php if(isset($form_errors) && count($form_errors) > 0) { ?>
          <ul class="form_errors" style="color: red; margin-left: 20px;">
            <?php foreach($form_errors as $error) { ?>
              <li><?= $error ?></li>
            <?php } ?>
          </ul>
        <?php } ?>
        <form action='/newsite/schedule-a-viewing.php' class='schedule-form' method='POST'>
          <div class='group-info'>
            <input id='name' name='name' placeholder='Your name*' type='text' <?php if(isset($_POST['name'])) echo 'value="'.$_POST['name'].'"'; ?> />
            <input id='email' name='email' placeholder='Your email*' type='text' <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'"'; ?> />
            <input id='mobile_phone' name='mobile_phone' placeholder='Phone (mobile)' type='text' <?php if(isset($_POST['mobile_phone'])) echo 'value="'.$_POST['mobile_phone'].'"'; ?> />
            <input id='other_phone' name='other_phone' placeholder='Phone (other)' type='text' <?php if(isset($_POST['other_phone'])) echo 'value="'.$_POST['other_phone'].'"'; ?> />
          </div>
          <div class='line'></div>
          <p class='title green'>Best way to reach you:</p>
          <div class='group-contact'>
            <label class='radio'>
              <input id='email' name='contact_method' type='radio' value="email" />
              <span></span>
            </label>
            <label for='email'>Email</label>
            <label class='radio'>
              <input id='phone' name='contact_method' type='radio' value="phone" />
              <span></span>
            </label>
            <label for='phone'>Phone</label>
            <label class='radio'>
              <input id='text' name='contact_method' type='radio' value="text" />
              <span></span>
            </label>
            <label for='text'>Text Message</label>
          </div>
          <div class='line'></div>
          <div class='group-criteria'>
            <select id='square_footage' name='square_footage'>
              <option selected='selected' value=''>Desired square footage</option>
              <option value='500'>500 sqft or less</option>
              <option value='500-1000'>500 to 1000</option>
              <option value='1000-2000'>1000 to 2000</option>
              <option value='2000+'>2000+</option>
            </select>
            <select id='budget' name='budget'>
              <option selected='selected' value=''>Budget</option>
              <option value='750-1500'>$750 to $1500</option>
              <option value='1500-2500'>$1500 to $2500</option>
              <option value='2500+'>$2500 and up</option>
            </select>
            <select id='move_date' name='move_date'>
              <option selected='selected' value=''>Target move-in date</option>
              <option value='Immediately'>Immediately</option>
              <option value='2 weeks to 1 month'>2 weeks to 1 month</option>
              <option value='1 month or longer'>1 month or longer</option>
            </select>
          </div>
          <div class='line'></div>
          <p class='title yellow'>Area you're looking in:</p>
          <div class='group-area'>
            <label class='checkbox'>
              <input name='downtownla' type='checkbox' value='1' <?php if(isset($_POST['downtownla']) && $_POST['downtownla'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='downtownla'>Close to downtown LA</label>
            <label class='checkbox'>
              <input name='hollywood' type='checkbox' value='1' <?php if(isset($_POST['hollywood']) && $_POST['hollywood'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='hollywood'>Hollywood</label>
            <label class='checkbox'>
              <input name='glendale' type='checkbox' value='1' <?php if(isset($_POST['glendale']) && $_POST['glendale'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='glendale'>Glendale</label>
          </div>
          <div class='line'></div>
          <p class='title red'>Looking for:</p>
          <div class='group-lease'>
            <label class='checkbox'>
              <input name='short' type='checkbox' value='1' <?php if(isset($_POST['short']) && $_POST['short'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='short'>Short-term lease</label>
            <label class='checkbox'>
              <input name='one_year' type='checkbox' value='1' <?php if(isset($_POST['one_year']) && $_POST['one_year'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='one_year'>1-year lease</label>
            <label class='checkbox'>
              <input name='multi_year' type='checkbox' value='1' <?php if(isset($_POST['multi_year']) && $_POST['multi_year'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='multi_year'>Multi-year lease</label>
          </div>
          <div class='line'></div>
          <p class='title purple'>Properties you're interested in:</p>
          <div class='group-lofts-1'>
            <label class='checkbox'>
              <input name='lacy' type='checkbox' <?php if($this_key=='lacy') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['lacy']) && $_POST['lacy'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='lacy'>Lacy Studio Lofts</label>
            <label class='checkbox'>
              <input name='beverly' type='checkbox' <?php if($this_key=='beverly') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['beverly']) && $_POST['beverly'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='beverly'>Beverly Union Lofts</label>
            <label class='checkbox'>
              <input name='spring' type='checkbox' <?php if($this_key=='spring') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['spring']) && $_POST['spring'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='spring'>Spring</label>
          </div>
          <div class='group-lofts-2'>
            <label class='checkbox'>
              <input name='cosmo' type='checkbox' <?php if($this_key=='cosmo') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['cosmo']) && $_POST['cosmo'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='cosmo'>Cosmo Lofts</label>
            <label class='checkbox'>
              <input name='melrose' type='checkbox' <?php if($this_key=='melrose') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['melrose']) && $_POST['melrose'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='melrose'>Melrose Studios</label>
            <label class='checkbox'>
              <input name='seeley' type='checkbox' <?php if($this_key=='seeley') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['seeley']) && $_POST['seeley'] == '1') echo 'checked="checked"'; ?> />
              <span></span>
            </label>
            <label for='seeley'>Seeley Studios</label>
          </div>
          <div class='line'></div>
          <p class='title blue'>How did you hear about us?</p>
          <div class='group-hear'>
            <table>
              <tr>
                <td>
                  <div class='control'>
                    <label class='checkbox'>
                      <input id='search' name='search' type='checkbox' value='1' <?php if(isset($_POST['search']) && $_POST['search'] == '1') echo 'checked="checked"'; ?> />
                      <span></span>
                    </label>
                    <label for='search'>Search Engine</label>
                  </div>
                </td>
                <td>
                  <div class='control'>
                    <label class='checkbox'>
                      <input id='referral' name='referral' type='checkbox' value='1' <?php if(isset($_POST['referral']) && $_POST['referral'] == '1') echo 'checked="checked"'; ?> />
                      <span></span>
                    </label>
                    <label for='referral'>Tenant Referral</label>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class='group-hear clearfix'>
            <table>
              <tr>
                <td>
                  <div class='control'>
                    <label class='checkbox'>
                      <input id='craigslist' name='craigslist' type='checkbox' value='1' <?php if(isset($_POST['craigslist']) && $_POST['craigslist'] == '1') echo 'checked="checked"'; ?> />
                      <span></span>
                    </label>
                    <label for='craigslist'>Craigslist.com</label>
                  </div>
                </td>
                <td>
                  <div class='control'>
                    <label class='checkbox'>
                      <input id='advertisement' name='advertisement' type='checkbox' value='1' <?php if(isset($_POST['advertisement']) && $_POST['advertisement'] == '1') echo 'checked="checked"'; ?> />
                      <span></span>
                    </label>
                    <label for='advertisement'>Advertisement</label>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class='group-who'>
            <input name="referral_name" placeholder='Who referred you?' type='text' <?php if(isset($_POST['referral_name'])) echo 'value="'.$_POST['referral_name'].'"'; ?> />
          </div>
          <div class='line'></div>
          <div class='group-textarea'>
            <textarea name="message" placeholder='Anything else you’d like to mention?' ><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea>
          </div>
          <table class='group-option'>
            <tr>
              <td>
                <label class='checkbox'>
                  <input checked='checked' name='option' type='checkbox' />
                  <span></span>
                </label>
              </td>
              <td>
                <label class='group-option-label' for='option'>
                  <span class='f12'>
                    I'm ok with you sending me more information about upcoming events, news and updates related to our properties. I'm not ok with you selling my information to a third-party, and understand you know this is uncool too.
                  </span>
                </label>
              </td>
            </tr>
          </table>
          <div class='group-submit'>
            Send now
          </div>
          <input type="hidden" id="_submitted" name="_submitted" value='1' />
        </form>
      <div>
    </div>
    <?php } else { ?>  
      <div class="page-2">
        <p class="title black f19">
          Thanks for your pre-application submission to Live Work Loft. One of our leasing agents will review your submission and get in touch with you shortly! If you have any further questions, don't hesitate to
          <a href="#">
            <span class="fblue underline">get in touch with us!</span>
          </a>
        </p>
      </div>
    <?php } ?>
  </div>
</div>

<?php include('includes/_footer.inc.php'); ?>