<?php
include('config/config.inc.php');

if (isset($_GET['key']) && array_key_exists($_GET['key'], $project_array)) {
  $this_key = $_GET['key'];
} else {
  $this_key = '';
}

$title = 'Schedule a Viewing | ' . $meta_array['title'];

if (!empty($_POST['_submitted'])) {
  
  $mail_body = array();
  $form_errors = array();
  
  //validate fields
  $name_default = "Your name*";
  if(!empty($_POST['name']) && $_POST['name'] != $name_default) {
    array_push($mail_body, "<strong>Name:</strong> ".$_POST['name']);
  } else {
    array_push($form_errors, "Please enter your name.");
  }
  $email_default = "Your email*";
  if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['email'] != $email_default) {
    array_push($mail_body, "<strong>Email:</strong> ".$_POST['email']);
  } else {
    array_push($form_errors, "Please enter a valid email address.");
  }
  
  // phone numbers
  $mphone_default = "Phone (mobile)";
  if(!empty($_POST['mobile_phone']) && $_POST['mobile_phone'] != $mphone_default) {
    array_push($mail_body, "<strong>Mobile Phone:</strong> ".$_POST['mobile_phone']);
  }
  $ophone_default = "Phone (other)";
  if(!empty($_POST['other_phone']) && $_POST['other_phone'] != $ophone_default) {
    array_push($mail_body, "<strong>Other Phone:</strong> ".$_POST['other_phone']);
  }
  
  // contact method
  if(!empty($_POST['contact_method'])) {
    array_push($mail_body, "<strong>Contact Method:</strong> ".$_POST['contact_method']);
  }
  
  // criteria
  if(!empty($_POST['square_footage'])) {
    array_push($mail_body, "<strong>Desired square footage:</strong> ".$_POST['square_footage']);
  }
  if(!empty($_POST['budget'])) {
    array_push($mail_body, "<strong>Budget:</strong> ".$_POST['budget']);
  }
  if(!empty($_POST['move_date'])) {
    array_push($mail_body, "<strong>Target move-in date:</strong> ".$_POST['move_date']);
  }
  
  // area of interest
  $areas = array();
  if(!empty($_POST['downtownla'])) {
    array_push($areas, "Downtown LA");
  }
  if(!empty($_POST['hollywood'])) {
    array_push($areas, "Hollywood");
  }
  if(!empty($_POST['glendale'])) {
    array_push($areas, "Glendale");
  }
  $areas_selected = (empty($areas)) ? "None selected" : implode(', ', $areas);
  array_push($mail_body, "<strong>Area they're looking in:</strong> ".$areas_selected);
  
  // lease desired
  $leases = array();
  if(!empty($_POST['short'])) {
    array_push($leases, "Short-term Lease");
  }
  if(!empty($_POST['one_year'])) {
    array_push($leases, "One Year Lease");
  }
  if(!empty($_POST['multi_year'])) {
    array_push($leases, "Multi-year Lease");
  }
  $leases_selected = (empty($leases)) ? "None selected" : implode(', ', $leases);
  array_push($mail_body, "<strong>Looking for:</strong> ".$leases_selected);

  // buildings of interest
  $properties = array();
  if(!empty($_POST['lacy'])) {
    array_push($properties, "Lacy Lofts");
  }
  if(!empty($_POST['beverly'])) {
    array_push($properties, "Beverly");
  }
  if(!empty($_POST['spring'])) {
    array_push($properties, "Spring");
  }
  if(!empty($_POST['cosmo'])) {
    array_push($properties, "Cosmo");
  }
  if(!empty($_POST['melrose'])) {
    array_push($properties, "Melrose");
  }
  if(!empty($_POST['seeley'])) {
    array_push($properties, "Seeley");
  }
  $props_selected = (empty($properties)) ? "None selected" : implode(', ', $properties);
  array_push($mail_body, "<strong>Properties they're interested in:</strong> ".$props_selected);
  
  // referral source?
  if(!empty($_POST['search'])) {
    array_push($mail_body, "<strong>Referral Type:</strong> Search");
  }
  if(!empty($_POST['referral'])) {
    array_push($mail_body, "<strong>Referral Type:</strong> Tenant Referral");
  }
  if(!empty($_POST['craigslist'])) {
    array_push($mail_body, "<strong>Referral Type:</strong> Craigslist");
  }
  if(!empty($_POST['advertisement'])) {
    array_push($mail_body, "<strong>Referral Type:</strong> Advertisement");
  }
  // referral name?
  $referral_name_default = "Who referred you?";
  if(!empty($_POST['referral_name']) && $_POST['referral_name'] != $referral_name_default) {
    array_push($mail_body, "<strong>Referrer Name:</strong> ".$_POST['referral_name']);
  }

  // message
  $message_default = "Anything else you'd like to mention?";
  if(!empty($_POST['message']) && $_POST['message'] != $message_default) {
    array_push($mail_body, "<strong>Other Comments:</strong> ".$_POST['message']);
  }
  
  // email opt-in
  if(!empty($_POST['option'])) {
    array_push($mail_body, "<strong>Email Opt-in Permission:</strong> Yes");
  } else {
    array_push($mail_body, "<strong>Email Opt-in Permission:</strong> No");
  }
  
  if(count($form_errors) == 0) {
    // sending email
    $to = "testing@hypelifebrands.com";
    $subject = "New Pre-Application from LiveWorkLoft.net";
    $body = "";
    foreach($mail_body as $msg) {
      $body .= '<p>'.stripslashes($msg).'</p>' . "\n";
    }
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: LiveWorkLoft.net <do-not-reply@liveworkloft.net>';
    
    $message = '
    <html>
      <head>
        <title>New Pre-Application Form</title>
      </head>
      <body>'.
        $body
      .'</body>
    </html>';
        
    mail($to, $subject, $message, $headers);
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
              <input id='email' name='contact_method' type='radio' value="email" <?php if(!empty($_POST['contact_method']) && $_POST['contact_method'] == 'email') echo ' selected="selected" ' ?>/>
              <span></span>
            </label>
            <label for='email'>Email</label>
            <label class='radio'>
              <input id='phone' name='contact_method' type='radio' value="phone" <?php if(!empty($_POST['contact_method']) && $_POST['contact_method'] == 'phone') echo ' selected="selected" ' ?>/>
              <span></span>
            </label>
            <label for='phone'>Phone</label>
            <label class='radio'>
              <input id='text' name='contact_method' type='radio' value="text" <?php if(!empty($_POST['contact_method']) && $_POST['contact_method'] == 'text') echo ' selected="selected" ' ?>/>
              <span></span>
            </label>
            <label for='text'>Text Message</label>
          </div>
          <div class='line'></div>
          <div class='group-criteria'>
            <select id='square_footage' name='square_footage'>
              <option value='' <?php if(!empty($_POST['square_footage']) && $_POST['square_footage'] == '') echo ' selected="selected" ' ?> >Desired square footage</option>
              <option value='500' <?php if(!empty($_POST['square_footage']) && $_POST['square_footage'] == '500') echo ' selected="selected" ' ?> >500 sqft or less</option>
              <option value='500-1000' <?php if(!empty($_POST['square_footage']) && $_POST['square_footage'] == '500-1000') echo ' selected="selected" ' ?> >500 to 1000</option>
              <option value='1000-2000' <?php if(!empty($_POST['square_footage']) && $_POST['square_footage'] == '1000-2000') echo ' selected="selected" ' ?> >1000 to 2000</option>
              <option value='2000+' <?php if(!empty($_POST['square_footage']) && $_POST['square_footage'] == '2000+') echo ' selected="selected" ' ?> >2000+</option>
            </select>
            <select id='budget' name='budget'>
              <option value='' <?php if(!empty($_POST['budget']) && $_POST['budget'] == '') echo ' selected="selected" ' ?>>Budget</option>
              <option value='750-1500' <?php if(!empty($_POST['budget']) && $_POST['budget'] == '750-1500') echo ' selected="selected" ' ?>>$750 to $1500</option>
              <option value='1500-2500' <?php if(!empty($_POST['budget']) && $_POST['budget'] == '1500-2500') echo ' selected="selected" ' ?>>$1500 to $2500</option>
              <option value='2500+' <?php if(!empty($_POST['budget']) && $_POST['budget'] == '2500+') echo ' selected="selected" ' ?>>$2500 and up</option>
            </select>
            <select id='move_date' name='move_date'>
              <option value='' <?php if(!empty($_POST['move_date']) && $_POST['move_date'] == '') echo ' selected="selected" ' ?>>Target move-in date</option>
              <option value='Immediately' <?php if(!empty($_POST['move_date']) && $_POST['move_date'] == 'Immediately') echo ' selected="selected" ' ?>>Immediately</option>
              <option value='2 weeks to 1 month' <?php if(!empty($_POST['move_date']) && $_POST['move_date'] == '2 weeks to 1 month') echo ' selected="selected" ' ?>>2 weeks to 1 month</option>
              <option value='1 month or longer' <?php if(!empty($_POST['move_date']) && $_POST[''] == '1 month or longer') echo ' selected="selected" ' ?>>1 month or longer</option>
            </select>
          </div>
          <div class='line'></div>
          <p class='title yellow'>Area you're looking in:</p>
          <div class='group-area'>
            <table>
              <tr>
                <td>
                  <label class='checkbox'>
                    <input name='downtownla' type='checkbox' value='1' <?php if(isset($_POST['downtownla']) && $_POST['downtownla'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='downtownla'>Close to downtown LA</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='hollywood' type='checkbox' value='1' <?php if(isset($_POST['hollywood']) && $_POST['hollywood'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='hollywood'>Hollywood</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='glendale' type='checkbox' value='1' <?php if(isset($_POST['glendale']) && $_POST['glendale'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='glendale'>Glendale</label>
                </td>
              </tr>
            </table>
          </div>
          <div class='line'></div>
          <p class='title red'>Looking for:</p>
          <div class='group-lease'>
            <table>
              <tr>
                <td>
                  <label class='checkbox'>
                    <input name='short' type='checkbox' value='1' <?php if(isset($_POST['short']) && $_POST['short'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='short'>Short-term lease</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='one_year' type='checkbox' value='1' <?php if(isset($_POST['one_year']) && $_POST['one_year'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='one_year'>1-year lease</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='multi_year' type='checkbox' value='1' <?php if(isset($_POST['multi_year']) && $_POST['multi_year'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='multi_year'>Multi-year lease</label>
                </td>
              </tr>
            </table>
          </div>
          <div class='line'></div>
          
          <p class='title purple'>Properties you're interested in:</p>
          <div class='group-lofts-1'>
            <table>
              <tr>
                <td>
                  <label class='checkbox'>
                    <input name='lacy' type='checkbox' <?php if($this_key=='lacy') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['lacy']) && $_POST['lacy'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='lacy'>Lacy Studio Lofts</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='seeley' type='checkbox' <?php if($this_key=='seeley') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['seeley']) && $_POST['seeley'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='seeley'>Seeley Studios</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='spring' type='checkbox' <?php if($this_key=='spring') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['spring']) && $_POST['spring'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='spring'>Spring</label>
                </td>
              </tr>
            </table>
          </div>
          <div class='group-lofts-2'>
            <table>
              <tr>
                <td>
                  <label class='checkbox'>
                    <input name='beverly' type='checkbox' <?php if($this_key=='beverly') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['beverly']) && $_POST['beverly'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='beverly'>Beverly Union Lofts</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='melrose' type='checkbox' <?php if($this_key=='melrose') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['melrose']) && $_POST['melrose'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='melrose'>Melrose Studios</label>
                </td>
                <td>
                  <label class='checkbox'>
                    <input name='cosmo' type='checkbox' <?php if($this_key=='cosmo') { echo 'checked="checked"'; } ?> value='1' <?php if(isset($_POST['cosmo']) && $_POST['cosmo'] == '1') echo 'checked="checked"'; ?> />
                    <span></span>
                  </label>
                  <label for='cosmo'>Cosmo Lofts</label>
                </td>
              </tr>
            </table>
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