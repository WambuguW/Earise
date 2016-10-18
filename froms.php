
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function saccodetails() {

    $Rows = mysql_query('select * from saccodetails where id="1"') or die(mysql_error());

    $res = mysql_fetch_array($Rows);


    echo'<form method="post" action="" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
<div class="form-body">
<div class=col-md-4>
<img src="photos/' . base64_decode($res['logo']) . '" width="100px" height="100px">

<div class="form-group">
<label class="control-label">Company Name</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="name" value="' . base64_decode($res['compname']) . '" placeholder="Enter Name" title="Enter Name" required>
</div>

<div class="form-group">
<label class="control-label">Slogan</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="slogan" value="' . base64_decode($res['slogan']) . '" placeholder="Enter Slogan here" title="Enter Slogan here">
</div>

<div class="form-group">
<label class="control-label">Physical Address</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="phaddress" value="' . base64_decode($res['phyaddress']) . '" required placeholder="Enter Physical address" title="Enter Physical address">
</div>

<div class="form-group">
<label class="control-label">Postal Address</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="poaddress" value="' . base64_decode($res['postaladdress']) . '" placeholder="Enter Postal address" title="Enter Postal address">
</div>
</div>
<div class="col-md-4 col-md-offset-1">
<div class="form-group">
<label class="control-label">Website</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="website" value="' . base64_decode($res['website']) . '" title="Enter Website" placeholder="Enter Website">
</div>

<div class="form-group">
<label class="control-label">Branch Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="branchno" value="' . base64_decode($res['branchnumber']) . '" placeholder="Enter Branch Number" title="Enter Branch Number">
</div>

<div class="form-group">
<label class="control-label">Tel Number</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="telno" value="' . base64_decode($res['telnumber']) . '" required placeholder="Enter Telephone Number" title="Enter Telephone Number">
</div>

<div class="form-group">
<label class="control-label">Email Address</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="email" value="' . base64_decode($res['emailaddress']) . '" placeholder="Enter Email address" title="Enter Email address">
</div>

<div class="form-group">
<label class="control-label">Mobile Number</label>
<input pattern="([0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="number" name="mobile" value="' . base64_decode($res['mobileno']) . '" placeholder="Enter Mobile Number" title="Enter Mobile Number">
</div>

<div class="form-group">
<label class="control-label">Logo</label>
<input   class="form-control input-medium" type="file" name="image" title="Choose image from folder"/>
</div>


<button  class="btn green"  name="submit">Save</button>

</div>
</div>

</form>';
}

function updateNo() {
    
}

function UpdateDays() {
    echo'<div class="col-md-4"><form action="" method="GET"><div class="form-group">
<label>Medium Input</label>
<input pattern="[0-9]{12}" type="number" name="No2" class="form-control input-medium" placeholder="No of days" required>
</div>
<input type="submit" name="ref23" value="UPDATE"  >
</form></div>';
}

function settings() {

    $sql = mysql_query("SELECT * FROM settings where id='1'") or die(mysql_error());

    while ($row = mysql_fetch_assoc($sql)) {
        $days = base64_decode($row['days']);
        $aed = base64_decode($row['aed']);
        $usd = base64_decode($row['usd']);

        $bank = base64_decode($row['defaultbank']);

        echo'
<form action="" method="post">
<div class="form-body">
<div class="row">

<div class="col-md-4">

<div class="form-group">
<label>Number of Days Allowed for Edit</label>
<input pattern="[0-9]{12}" type="number" step="0.01" name="days" value="' . $days . '" class="form-control input-medium" placeholder="No of days" title="No of days" required>
</div>



<div class="form-group">
<label>AED to KSH Exchange Rate</label>
<input pattern="([0-9]| |/|\\|@|#|\$|%|&)+{50}" type="number" step="0.01" name="aed" value="' . $aed . '" class="form-control input-medium" placeholder="AED to KSH Exchange Rate" title="AED to KSH Exchange Rate" required>
</div>

<div class="form-group">
<label>USD to KSH Exchange Rate</label>
<input type="number" step="0.01" name="usd" value="' . $usd . '" class="form-control input-medium" placeholder="USD to KSH Exchange Rate" title="USD to KSH Exchange Rate" required>
</div>

<div class="form-group">
<label>Default Bank</label>
<input type="text" name="bankname" value="' . getbankname($bank) . '" class="form-control input-medium" placeholder="Default Bank" title="Default Banks" required>
</div>

<div class="form-group">
<label>Select New Default Bank</label><br />
<select name="bank" class="form-control input-medium select2me" required  data-placeholder="Select New Default Bank" title="Select New Default Bank" >';
        $chi = mysql_query('select * from addbank where status="' . base64_encode('Active') . '" AND primarykey="' . $bank . '" ') or die(mysql_error());
        while ($rq = mysql_fetch_array($chi)) {
            echo '<option value="' . $rq['primarykey'] . '">' . base64_decode($rq['bankname']) . '</option>';
        }
        $ch = mysql_query('select * from addbank where status="' . base64_encode('Active') . '"') or die(mysql_error());
        while ($rq = mysql_fetch_array($ch)) {
            echo '<option value="' . $rq['primarykey'] . '">' . base64_decode($rq['bankname']) . '</option>';
        }
        echo '
</select></div>

<div class="form-group">
<label>Financial Period  </label>
<input type="text"  name="date" class="form-control input-medium  date-picker"  data-date-format="dd-M" value="' . base64_decode($row['financial_year']) . '"  placeholder="Enter financial Date"  title="Enter Financial period" required  />
    </div>
    
</div>
<div class="col-md-4">
    
 <div class="form-group">
<label>Set Default Insurance Fee</label><br />
<select  class="form-control input-medium select2me"  name = "definsurance" required data-placeholder="Select Default Insurance Fee" title = "Select Default Insurance Fee">';
        $stlls = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND   accgroup="' . base64_encode(4) . '" AND id="' . base64_decode($row['def_insurance_fee']) . '"  ') or die(mysql_error());
        while ($rowls = mysql_fetch_array($stlls)) {
            echo '<option value="' . $rowls['id'] . '">' . base64_decode($rowls['acname']) . '</option>';
        }
        $stll = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND   accgroup="' . base64_encode(4) . '"   ') or die(mysql_error());
        while ($rowl = mysql_fetch_array($stll)) {
            echo '<option value="' . $rowl['id'] . '">' . base64_decode($rowl['acname']) . '</option>';
        }

        echo '</select></div>
            
            <div class="form-group">
<label>Set Default Legal Fee </label><br />
<select  class="form-control input-medium select2me"  name = "deflegal" required title = "Select Default Legal Fee" data-placeholder= "Select Default Legal Fee">';
        $stmt1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"  AND   accgroup="' . base64_encode(4) . '" AND id="' . base64_decode($row['def_legal_fee']) . '" ') or die(mysql_error());
        while ($rws = mysql_fetch_array($stmt1)) {
            echo '<option value="' . $rws['id'] . '">' . base64_decode($rws['acname']) . '</option>';
        }

        $stmt = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"  AND   accgroup="' . base64_encode(4) . '" ') or die(mysql_error());
        while ($rw = mysql_fetch_array($stmt)) {
            echo '<option value="' . $rw['id'] . '">' . base64_decode($rw['acname']) . '</option>';
        }

        echo '</select></div>
            
            <div class="form-group">
<label>Set Default Accrued Income</label><br/>
<select  class="form-control input-medium select2me"  name = "accruedAcc" required title = "Select Account">';
        $dscaa = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" AND id="' . base64_decode($row['accruedincome']) . '"') or die(mysql_error());
        while ($rowg = mysql_fetch_array($dscaa)) {
            echo '<option value="' . $rowg['id'] . '">' . base64_decode($rowg['acname']) . '</option>';
        }
        $dsca1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '"') or die(mysql_error());
        while ($rowg = mysql_fetch_array($dsca1)) {
            echo '<option value="' . $rowg['id'] . '">' . base64_decode($rowg['acname']) . '</option>';
        }

        echo '</select></div>




<div class="form-group">
<label>Select Default Currrency</label><br />
<select name="currency" class="form-control input-medium" required title="Select Currency" >';
        $chqryr = mysql_query('select * from  currency  WHERE  id="' . base64_decode($row['defaultcurrency']) . '" ') or die(mysql_error());
        while ($row22 = mysql_fetch_array($chqryr)) {
            echo '<option value="' . $row22['id'] . '">' . base64_decode($row22['name']) . '</option>';
        }

        $chqry = mysql_query('select * from  currency ') or die(mysql_error());
        while ($rowy = mysql_fetch_array($chqry)) {
            echo '<option value="' . $rowy['id'] . '">' . base64_decode($rowy['name']) . '</option>';
        }
        echo '</select></div>
            
<div class="form-group">
<label>Set Default Savings Account</label><br />
<select  class="form-control input-medium select2me"  name = "defsaacc" required title = "Select Account">';
        $dsa1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND id="' . base64_decode($row['defaultsavingacc']) . '" ') or die(mysql_error());
        while ($rowd = mysql_fetch_array($dsa1)) {
            echo '<option value="' . $rowd['id'] . '">' . base64_decode($rowd['acname']) . '</option>';
        }
        $dsa = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
        while ($row1 = mysql_fetch_array($dsa)) {
            echo '<option value="' . $row1['id'] . '">' . base64_decode($row1['acname']) . '</option>';
        }

        echo '</select></div>
            
     <div class="form-group">
<label>Minimum Balance in default savings account</label>
<input type="currency" onkeyup="FormatAsCurrency(this.value)" pattern="([0-9]*[.]*)+" name="mindsacc" value="' . base64_decode($row['minsavingbal']) . '"  class="form-control input-medium" placeholder="Minimum savings account balance" title="minmum amount" required>
' . getsymbol() . ' :<span id=formatted></span>
</div>

</div>
<div class="col-md-4"> 

<div class="form-group">
<label>Set Default Share Capital Account</label><br />
<select  class="form-control input-medium select2me"  name = "defscacc" required title = "Select Account">';

        $dscas = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND id="' . base64_decode($row['defaultshareacc']) . '" ') or die(mysql_error());
        while ($rows = mysql_fetch_array($dscas)) {
            echo '<option value="' . $rows['id'] . '">' . base64_decode($rows['acname']) . '</option>';
        }
        $dsca = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
        while ($row9 = mysql_fetch_array($dsca)) {
            echo '<option value="' . $row9['id'] . '">' . base64_decode($row9['acname']) . '</option>';
        }

        echo '</select></div>
            
  <div class="form-group">
<label>Minimum Balance in default share capital account</label>
<input type="currency" onkeyup="FormatAsCurrenc(this.value)" name="minscacc" value="' . base64_decode($row['minsharebal']) . '" class="form-control input-medium" placeholder="minimum share capital account balance" title="Minimum amount" pattern="([0-9]*[.]*)+" required>
' . getsymbol() . ':<span id="formatt"></span>
</div>

<div class="form-group">
<label>Set Default Processing Fee</label><br />
<select  class="form-control input-medium select2me"  name = "defprocess" required data-placeholder="Select Default Processing Fee" title = "Select Default Processing Fee">';
        $stls = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND   accgroup="' . base64_encode(4) . '" AND id="' . base64_decode($row['def_processing_fee']) . '" ') or die(mysql_error());
        while ($rqs = mysql_fetch_array($stls)) {
            echo '<option value="' . $rqs['id'] . '">' . base64_decode($rqs['acname']) . '</option>';
        }
        $stl = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND   accgroup="' . base64_encode(4) . '"  ') or die(mysql_error());
        while ($rq = mysql_fetch_array($stl)) {
            echo '<option value="' . $rq['id'] . '">' . base64_decode($rq['acname']) . '</option>';
        }

        echo '</select></div>
            
           
 <div class="form-group">
<label>Maximum number of loans a member can guarantee</label>
<input type="number" name="maxloan" value="' . base64_decode($row['maxloan']) . '" class="form-control input-medium" placeholder="minimum share capital account balance" title="Minimum amount" pattern="([0-9]*[.]*)+" required="true">
</div> 

<div class="form-group">
<label>System  Url</label>
<input type="text" name="system_url" value="' . base64_decode($row['system_url']) . '" class="form-control input-medium" placeholder="Enter System Url" title="Enter System Url"  required="true">
</div> 


<div class="form-group">
<label>DashBoard Url</label>
<input type="text" name="dashboard_url" value="' . base64_decode($row['dashboard_url']) . '" class="form-control input-medium" placeholder="Enter Dashboard Url" title="Enter Dashboard Url"  required="true">
</div> 

<input class="btn green" type="submit" name="ref1" value="Update"  >
</div></form>  </div></div>';
    }
}

function membersearchresults
($user, $photo, $fname, $mname, $lname, $dob, $gender, $recruitedby, $idnumber, $membernumber, $county, $mobileno, $pinnumber, $residence, $email, $comments, $status, $regdate, $member_cat_id, $title_id, $floor, $org_name, $cro_id, $country, $building_name, $frequency_payment, $occupation, $periodical_saving, $region, $post_address, $business_location, $post_code, $constituency, $office_cell, $office_landline, $office_mail, $primarykey) {
    if (base64_decode($recruitedby) == 1) {
        $introd = "CRO";
    } else if (base64_decode($recruitedby) == 2) {
        $introd = "Agents";
    } else {
        $introd = "Member";
    }

    echo '

</br/></br/></br/><div class="portlet-body form">
<form method = "post" action = "" class="form-horizontal" enctype="multipart/form-data" autocomplete = "off">
<div class="form-body">
<div class="form-group">
<div class="col-md-3 col-md-offset-1">
 <div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="photos/' . base64_decode($photo) . '" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail"  style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																	<span class="fileinput-new">
																		 Select image
																	</span>
																	<span class="fileinput-exists">
																		 Change
																	</span>
																	<input type="file" name="image"  />
																</span>
																<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																	 Remove
																</a>
															</div>
														</div>   
		</div>
														</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Title</label><br/>
<select class="form-control input-medium select2me" type="text" name="title"  placeholder="Select title" title="Select title">';
    $queryq = mysql_query("SELECT * FROM  memebr_title where id='" . base64_decode($member_cat_id) . "' and status='" . base64_encode('active') . "'");
    while ($rowe = mysql_fetch_array($queryq)) {
        echo '<option value="' . $rowe['id'] . '">' . base64_decode($rowe['title']) . '</option>';
    }
    $queryq1 = mysql_query("SELECT * FROM  memebr_title where status='" . base64_encode('active') . "'");
    while ($rowe1 = mysql_fetch_array($queryq1)) {
        echo '<option value="' . $rowe1['id'] . '">' . base64_decode($rowe1['title']) . '</option>';
    }
    echo'</select>
    </div>
<div class="col-md-3 col-md-offset-0">
<label>Member No.</label>
<input  type="hidden" name="theid" value="' . $primarykey . '"/>
	<input type="hidden" name="pro_pic" value="' . base64_decode($photo) . '" />
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" readonly class="form-control input-medium" name="mno" value="' . base64_decode($membernumber) . '" required placeholder="Enter Member No." title="Enter Member No."/>
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>First Name</label>
<input pattern="([a-zA-Z]{1,20}"  class="form-control input-medium" type="text" name="fname" value="' . base64_decode($fname) . '" required="required" placeholder="Enter First Name" title="Enter First Name" /></div>
<div class="col-md-3 col-md-offset-0">
<label>Middle Name</label>
<input  pattern="([a-zA-Z]{1,20}" class="form-control input-medium" type="text" name="mname" value="' . base64_decode($mname) . '" placeholder="Enter Middle Name" title="Enter Middle Name" />
</div>
<div class="col-md-3 col-md-offset-0">
<label>Last Name</label>
<input pattern="([a-zA-Z]{1,20}" class="form-control input-medium" type="text" name="lname" value="' . base64_decode($lname) . '" title="Enter Last Name" placeholder="Enter Last Name" />
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Date of Registration</label>
<input  class="form-control input-medium" type = "date" name = "regdate" value = "' . base64_decode($regdate) . '" placeholder = "Enter date of registration" title = "Enter date of registration"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Date OF Birth </label>
';
    $time = new DateTime('now');
    $newtime = $time->modify('-18 years')->format('d-m-Y');
    echo '

    <input id="dob" class="form-control input-medium date-picker"   data-date-format="dd-M-yyyy" type="date" name = "dob" value="' . $newtime . '"  placeholder = "Enter date of birth" title = "Enter date of birth"/>
													
</div>
<div class="col-md-3 col-md-offset-0">
<label>Gender  </label>
<select  class="form-control input-medium" type = "text" name = "gender"  title = "Select Gender" placeholder = "Select Gender"/>
<option value = "' . base64_decode($gender) . '">' . base64_decode($gender) . '</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>ID/Passport Number </label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "idno" value = "' . base64_decode($idnumber) . '" placeholder = "Enter Id No. or Passport No" title = "Enter Id No. or Passport No"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Mobile Number </label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mobile" value = "' . base64_decode($mobileno) . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number" />
</div>
<div class="col-md-3 col-md-offset-0">
<label>KRA Pin</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "krapin" value = "' . base64_decode($pinnumber) . '" placeholder = "Enter KRA pin" title = "Enter KRA Pin"/>
</div>
</div>


<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Email Address  </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "email" name = "email" value = "' . base64_decode($email) . '" placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Postal Address </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "postaldress" value = "' . base64_decode($post_address) . '" title = "Enter Postal Address" placeholder = "Enter Postal Address"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Country</label><br />
<select name="country" id="select2_sample4"  data-placeholder="Select Country"  class="input-medium form-control  select2me">
<option value="' . base64_decode($country) . '">' . base64_decode($country) . '</option>
<option value="Afghanistan">Afghanistan</option>
<option value="land Islands">land Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote Divoire">Cote Divoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bissau">Guinea-bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jersey">Jersey</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic Peoples Republic of">Korea, Democratic Peoples Republic of</option>
<option value="Korea, Republic of">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macao">Macao</option>
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
<option value="Moldova, Republic of">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan, Province of China">Taiwan, Province of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Timor-leste">Timor-leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, British">Virgin Islands, British</option>
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
<option value="Wallis and Futuna">Wallis and Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label> County/State </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "county" value = "' . base64_decode($county) . '" placeholder = "Enter County/State" title = "Enter County/State"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Estate </label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "residence" value = "' . base64_decode($residence) . '" placeholder = "Enter Residence" title = "Enter Residence"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Building Name </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "buildingname" value = "' . base64_decode($building_name) . '" title = "Enter Building Name" placeholder = "Enter Building Name"/>
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Occupation  </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "occupation" value = "' . base64_decode($occupation) . '" title = "Enter Department" placeholder = "Enter Department"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Business/Organization </label>
<select  class="form-control input-medium"  name = "org" title = "Enter Business / Organisation Name" placeholder = "Enter Business / Organisation Name" >';
    $sth = mysql_query("SELECT  *  FROM  organisation   WHERE id='" . base64_decode($org_name) . "' and status='" . base64_encode('active') . "'  ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo'<option value="' . $row1['id'] . '">' . (base64_decode($row1['organisation'])) . '</option>';
    }
    $sthf = mysql_query("SELECT  *  FROM  organisation   WHERE  status='" . base64_encode('active') . "'  ");
    while ($row1f = mysql_fetch_array($sthf)) {
        echo'<option value="' . $row1f['id'] . '">' . (base64_decode($row1f['organisation'])) . '</option>';
    }
    echo'</select>

</div>
<div class="col-md-3 col-md-offset-0">
<label>Location of business </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "bus_location" value = "' . base64_decode($business_location) . '" title = "Enter Department" placeholder = "Enter Department"/>
</div>
</div>


<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Expected periodical savings  </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "period_save" value = "' . base64_decode($periodical_saving) . '" title = "Enter periodical savings" placeholder = "Enter periodical savings"/>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Frequency of payment </label>
<select class="form-control input-medium" type = "text" name = "freq_payment" title = "Mode Of Payment" placeholder = "Mode Of Payment"/>
';
    $fgeta = mysql_query("SELECT  *  FROM  periodictyrecord where periodname='" . base64_decode($frequency_payment) . "'  ");
    while ($rowfa = mysql_fetch_array($fgeta)) {
        echo'<option value="' . base64_decode($rowfa['periodname']) . '">' . base64_decode($rowfa['periodname']) . '</option>';
    }
    $fget = mysql_query("SELECT  *  FROM  periodictyrecord  ORDER BY numberdays DESC  ");
    while ($rowf = mysql_fetch_array($fget)) {
        echo'<option value="' . base64_decode($rowfa['periodname']) . '">' . base64_decode($rowf['periodname']) . '</option>';
    }
    echo'</select>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Introduced By </label>
<select id= "introduced_by" class="form-control input-medium select2me"   onchange = "showIntroduced(this.value)"   type = "text" name = "introduced_by"  title = "Select Who Introduced You" data-placeholder = "Select Who Introduced You"/>
<option value="' . $recruitedby . '">' . $introd . '</option>
<option value="1">CRO</option>
<option value="2">Agents</option>
<option value="3">Member</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label> Comment </label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" name = "comment" placeholder = "Enter Comments" title = "Enter Comments">' . base64_decode($comments) . '</textarea>
</div>
<div class="col-md-3 col-md-offset-0">

<label>Status</label>
<select  class="form-control input-medium" required="true"  name="status" placeholder="Enter Status of Member" title="Enter Status of Member" />
<option value = "' . base64_decode($status) . '">' . base64_decode($status) . '</option>
<option value="active">Active</option>
 <option value="withdraw">Withdraw</option>  
  <option value="deceased">Deaceased</option> 
   <option value="suspend">Suspend</option> 
     
</select>
</div>
<div class="col-md-3 col-md-offset-0">
<label>Customer Relationship Officer</label>
<select  class="form-control input-medium select2me" type = "text" name = "cro" required value = "' . $_REQUEST['cro'] . '" title = "Enter Customer Relationship Officer" data-placeholder = "Enter Customer Relationship Officer"/>';
    $sthc = mysql_query("SELECT  *  FROM  users   WHERE id='" . base64_decode($cro_id) . "' and status='" . base64_encode(Active) . "'  ");
    while ($row1c = mysql_fetch_array($sthc)) {
        echo'<option value="' . $row1c['id'] . '">' . base64_decode($row1c['fname']) . " " . base64_decode($row1c['mname']) . " " . base64_decode($row1c['lname']) . '</option>';
    }
    $sth = mysql_query("SELECT  *  FROM  users   WHERE  status='" . base64_encode(Active) . "'  ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo'<option value="' . $row1['id'] . '">' . base64_decode($row1['fname']) . " " . base64_decode($row1['mname']) . " " . base64_decode($row1['lname']) . '</option>';
    }
    echo'</select>
</div>
</div>
<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label>Member Category  </label>
<select id= "membcat"  class="form-control input-medium select2me" type = "text" onchange = "showMemberCater(this.value)" name = "member_cate"  title = "Enter memeber category" data-placeholder = "Enter memeber category"/>';
    $qryaq = mysql_query("SELECT  *  FROM  member_category  where id='" . base64_decode($member_cat_id) . "' and status='" . base64_encode('active') . "'");
    while ($rowqz = mysql_fetch_array($qryaq)) {
        echo'<option value="' . $rowqz['id'] . '">' . base64_decode($rowqz['category_name']) . '</option>';
    }
    $qrya = mysql_query("SELECT  *  FROM  member_category  where status='" . base64_encode('active') . "'");
    while ($rowq = mysql_fetch_array($qrya)) {
        echo'<option value="' . $rowq['id'] . '">' . base64_decode($rowq['category_name']) . '</option>';
    }
    echo'</select>
</div>

<div class="col-md-3 col-md-offset-0">
<div id="introduced">

</div>
</div></div>
<div class="form-actions">
	<div class="col-md-3 col-md-offset-7">
<button class="btn green"  name="edit">Update</button>

							
</div>
</div></form>';
}

function fmembersearchresults($user, $photo, $id, $fname, $mname, $lname, $dob, $gender, $pcode, $mop, $intro, $nitro, $bname, $bloc, $nameb, $ccmf, $idno, $mnumber, $distr, $divi, $mobile, $pin, $residence, $occupation, $email, $comments, $dates, $status) {

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout col-md-10">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "on">

<div class="col-md-10"><div class="col-md-10" >

<img src="photos/' . base64_decode($photo) . '" width="100px" height="100px"/>
</div>

<div class = "one">
<label>First Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "fname" value = "' . base64_decode($fname) . '" autofocus required = "required" placeholder = "Enter First Name" title = "Enter First Name" pattern = "[a-zA-Z]+"/>
<input class="form-control input-medium" type = "hidden" name = "id" value = "' . ($id) . '" autofocus required = "required" placeholder = "Enter First Name" title = "Enter First Name" pattern = "[a-zA-Z]+"/>
</div>
<div class = "one">
<label>Middle Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "mname" value = "' . base64_decode($mname) . '" placeholder = "Enter Middle Name" title = "Enter Middle Name" pattern = "[a-zA-Z]+"/>

</div>
<div class = "one">
<label>Last Name</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "lname" value = "' . base64_decode($lname) . '" title = "Enter Last Name" placeholder = "Enter Last Name" pattern = "[a-zA-Z]+"/>
</div>
<div class = "one">
<label>Date OF Birth</label>
<input   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  type="text" name = "dob" value = "' . base64_decode($dob) . '" title = "Enter Date Of Birth" placeholder = "Date Of Birth"/>
</div>
<div class = "one">
<label>Gender</label>
<select  class="form-control input-medium" type = "text" name = "gender" value = "' . base64_decode($gender) . '" title = "Select Gender" placeholder = "Select Gender"/>

<option>Female</option>
<option>Male</option>
</select>
</div>
<div class = "one">
<label>Business / Organisation Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "bname" value = "' . base64_decode($bname) . '" title = "Enter Business / Organisation Name" placeholder = "Enter Business / Organisation Name"/>
</div>
<div class = "one">
<label>Location of Business / Organisation</label>
<input class="form-control input-medium" type = "text" name = "bloc" value = "' . base64_decode($bloc) . '" title = "Enter Location of Business / Organisation" placeholder = "Enter Location of Business / Organisation"/>
</div>
<div class = "two">
<label>Passport No. / ID No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "idno" value = "' . base64_decode($idno) . '" placeholder = "Enter Id No. or Passport No" title = "Enter Id No. or Passport No"/>
</div>
<div class = "two">
<label>Estate Where You Live</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "residence" value = "' . base64_decode($residence) . '" placeholder = "Enter Residence" title = "Enter Residence"/>
</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-4">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "one">
<label>Postal Address</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "pcode" value = "' . base64_decode($pcode) . '" title = "Enter Postal Code" placeholder = "Enter Postal Code"/>
</div>
<div class = "two">
<label>Member No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "mno" value = "' . base64_decode($mnumber) . '" required placeholder = "Enter Member No." title = "Enter Member No."/>
</div>
<div class = "two">
<label>District</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "dist" value = "' . base64_decode($distr) . '" placeholder = "Enter Town" title = "Enter Town"/>
</div>
</div>
<div class = "two">
<label>Division</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "divi" value = "' . base64_decode($divi) . '" placeholder = "Enter County" title = "Enter County" pattern = "[a-zA-Z ]+"/>
</div>
<div class = "two">
<label>Mobile</label>
<input  class="form-control input-medium" type = "number" name = "mobile" value = "' . base64_decode($mobile) . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number" />
</div>
<div class = "two">
<label>Pin</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "pin" value = "' . base64_decode($pin) . '" placeholder = "Enter KRA pin" title = "Enter KRA Pin"/>
</div>
<div class = "one">
<label>Building Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "nameb" value = "' . base64_decode($nameb) . '" title = "Enter Building Name" placeholder = "Enter Building Name"/>
</div>
<div class = "one">
<label>Introduced By</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "intro" value = "' . base64_decode($intro) . '" title = "Select Who Introduced You" placeholder = "Select Who Introduced You"/>

</div>
<div class = "one">
<label>Name of Introducer</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "nitro" value = "' . base64_decode($nitro) . '" title = "Enter Name of Introducer" placeholder = "Enter Name of Introducer"/>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<label>Mode Of Payment</label>
<select  class="form-control input-medium" type = "text" name = "mop" value = "' . base64_decode($mop) . '" title = "Mode Of Payment" placeholder = "Mode Of Payment"/>
<option>Weekly</option>
<option>Monthly</option>
</select>
</div>
<div class = "two">
<label>Your Position</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "occupation" value = "' . base64_decode($occupation) . '" title = "Enter Department" placeholder = "Enter Department"/>
</div>
<div class = "two">
<label>Email Address</label>
<input   class="form-control input-medium" type = "text" name = "email" value = "' . base64_decode($email) . '" placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
</div>
<div class = "art-layout-cell" style = "width: 100%" >

<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . base64_decode($comments) . '</textarea>
</div>
<div class = "two">
<label>Registration Date</label>
<input  class="form-control input-medium" type = "text" name = "date" value = "' . base64_decode($dates) . '" placeholder = "Enter date of registration" title = "Enter date of registration"/>
</div>
<div class = "one">
<label>Committment Fee</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "ccmf" value = "' . base64_decode($ccmf) . '" title = "Commitment Fee" placeholder = "Commitment Fee"/>
</div>
<div class = "two">
<label>Picture</label>
<input class="form-control input-medium" type = "file" name = "image" title = "Choose image from folder"/>
</div>
<div class = "two">
<label>Status</label>
<select  class="form-control input-medium"  name="status" required="required" placeholder="Enter Status of Member" title="Enter Status of Member" />';

    if (base64_decode($status) == 'active') {
        echo '<option>' . base64_decode($status) . '</option>
<option>WITHDRAWN</option>';
    } else {
        echo '<option selected>' . base64_decode($status) . '</option>
<option>active</option>';
    }
    echo '</select>

</div>
<div class = "two">
<br><br>
<button  class="btn green" name = "edit">Edit</button>
</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >

</form>
</div>
</div>
</div>
</div>';
}

function personalvehiclelistsearch($user, $s) {
    $mqry = mysql_query('select * from newmember where membernumber like "%' . base64_encode($s) . '%"') or die(mysql_error());
    $mrslt = mysql_fetch_array($mqry);
    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th class="style">Member Number</th><th class="style">Member Name</th><th class="style">Phone</th></tr>
<tr><td class="style">' . base64_decode($mrslt['membernumber']) . '</td>
<td class="style">' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
<td class="style">' . base64_decode($mrslt['mobileno']) . '</td></tr>
</table>';
    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="6">Vehicle list</th></tr>
<tr><th class="style">Reg Number</th><th class="style">Vehicle Type</th><th class="style">Nickname</th><th class="style">Value</th><th class="style">Edit</th><th class="style">Delete</th></tr>';
    $qry = mysql_query('select * from newvehicle where memberno like "%' . base64_encode($s) . '%" or nickname like "%' . base64_encode($s) . '%" order by primarykey desc') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td class="style">' . base64_decode($row['vehicleregno']) . '</td><td class="style">' . base64_decode($row['vehicletype']) . '</td><td class="style">' . base64_decode($row['nickname']) . '</td> <td class="style">' . base64_decode($row['evalue']) . '</td>

<td class="style">
<a href="personalvehicle.php?vid=' . $row['primarykey'] . '"><img src="images/edit.png"> </a>
</td>
<td class="style">
<a href="personalvehicle.php?vdel=' . $row['primarykey'] . '"><img src="images/delete.png"></a>
</td>
</tr>';
    }

    echo '</table>';
}

function pvehiclelistsearch($user, $s) {
    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="6">Vehicle list</th></tr>
<tr><th class="style">Reg Number</th><th class="style">Vehicle Type</th><th class="style">Nickname</th><th class="style">Value</th><th class="style">Edit</th><th class="style">Delete</th></tr>';
    $qry = mysql_query('select * from newvehicle where vehicleregno like "%' . strtoupper(base64_encode($s)) . '%" or nickname like "%' . strtoupper(base64_encode($s)) . '%" order by primarykey desc') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td class="style">' . strtoupper(base64_decode($row['vehicleregno'])) . '</td><td class="style">' . base64_decode($row['vehicletype']) . '</td><td class="style">' . base64_decode($row['nickname']) . '</td> <td class="style">' . number_format(base64_decode($row['evalue']), 2) . '</td>

<td class="style">
<a href="personalvehicle.php?vid=' . $row['primarykey'] . '"><img src="images/edit.png"> </a>
</td>
<td class="style">
<a href="personalvehicle.php?vdel=' . $row['primarykey'] . '"><img src="images/delete.png"></a>
</td>
</tr>';
        $erno = $row['memberno'];
    }

    echo '
</table>';
    $mqry = mysql_query('select * from newmember where membernumber="' . ($erno) . '"') or die(mysql_error());
    while ($mrslt = mysql_fetch_array($mqry)) {
        echo '

<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th class="style">Member Number</th><th class="style">Member Name</th><th class="style">Phone</th></tr>
<tr><td class="style">' . base64_decode($mrslt['membernumber']) . '</td>
<td class="style">' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
<td class="style">' . base64_decode($mrslt['mobileno']) . '</td></tr>
</table>';
    }
}

function withdrawmember($user, $mnumber) {
    echo '
<form method="post" action="" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>Member Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="mnumber" value="' . base64_decode($mnumber) . '" placeholder="Enter Member Number" title="Enter Member Number"/>
</div>
<div class="two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="mname" value="' . getMembername($mnumber) . '" placeholder="Enter Member Name" title="Enter Member Name" />
</div>
<div class="two">
<label>Withdrawn Amount</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="number" step="0.01" name="amount" placeholder="Enter Withdrawn Amount" title="Enter Withdrawn Amount"/>
</div>
</div><div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>Cheque Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="cheque" placeholder="Enter Cheque Number" title="Enter Cheque Number"/>
</div>
<div class="two">
<label>Withdraw Fees</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="number" step="0.01" name="fees" placeholder="Enter Withdraw Fees" title="Enter Withdraw Fees" required />
</div>
<div class="two">
<label>Date of Withdrawal</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="date" placeholder="Enter Withdraw the withdrawal date" title="Enter the Withdrawal date" required />
</div>
<div class="two">
<label>Approved By</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="approvedby" placeholder="Enter Approving Officer" title="Enter Approving Officer" required />
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>Comments</label>
<textarea  class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments"></textarea>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<br><br><button  class="btn green"  name="submit">Save</button>
</div>
</div>
</div>
</div>
</form>
';
}

function withdrawalsview() {

    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Amount Withdrawn</th>
<th class="style">Cheque Number</th>
<th class="style">Withdrawal fees</th>
<th class="style">Date of Withdrawal</th>
<th class="style">Approved By</th>
<th class="style">Comments</th>
</tr>
</thead>';
    $Rows = mysql_query('SELECT * FROM withdrawals');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td class="style">' . base64_decode($Row['cheque']) . '</td>
<td class="style">' . getsymbol() . ' ' . number_format(base64_decode($Row['fees']), 2) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>
<td class="style">' . base64_decode($Row['approvedby']) . '</td>
<td class="style">' . base64_decode($Row['comments']) . '</td>
</tr>';
    }
    echo '</table>';
}

function accedit($user, $id, $acname, $actype, $status, $comments) {
    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input   class="form-control input-medium" type="hidden" value="' . $id . '" name="id" autofocus required placeholder="Enter Account Name" title="Enter Account Name"/>

<label>Account Group</label>
<input   class="form-control input-medium" type="text" value="' . $acname . '" name="acname" autofocus required placeholder="Enter Account Name" title="Enter Account Name" />

<label>Select Account Type</label><br /> 
<select  class="form-control input-medium  select2me" data-placeholder="Select Account Type" name="actype" required title="Select Account Type">
<option></option>
<option>Profit & Loss</option>
<option>Balance Sheet</option>
</select><br />
<label>Status</label><br />
<select  class="form-control input-medium"  name="status" required title="Enter Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
<br><br><button  class="btn green"  name="ace">Save</button>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

function glaccedit($user, $id, $accode, $acname, $accgroup, $status) {
    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input   class="form-control input-medium" type="hidden" value="' . $id . '" name="id" autofocus required placeholder="Enter Account Name" title="Enter Account Name"/>
<label>GL Account Code</label>
<input   class="form-control input-medium" type = "text" value="' . $accode . '" name = "gaccode" autofocus required placeholder = "Enter GL Account Code" title = "Enter GL Account Code" />
<label>GL Account Name</label>
<input   class="form-control input-medium" type = "text" value="' . $acname . '" name = "gacname" autofocus required placeholder = "Enter GL Account Name" title = "Enter GL Account Name" />

<label>Select Account Group</label>
<select name = "accgrp" class="form-control input-medium" required title = "Select Account Group">
<option></option>';

    $row = mysql_query('SELECT * FROM accounts');
    while ($row3 = mysql_fetch_array($row)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select>

<label>Status</label>
<select  class="form-control input-medium"  name="status" required title="Enter Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
<br><br><button  class="btn green"  name="gace">Save</button>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

function assedit($user, $id, $asname, $asvalue, $status, $comments, $acc) {
    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" hidden value="' . $id . '" name="id" autofocus required placeholder="Enter Account Name" title="Enter Account Name"/>

<label>Asset Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" value="' . $asname . '" name="asname" autofocus required placeholder="Enter Account Name" title="Enter Account Name" />
<label>Account</label><br />
<select  class="form-control input-medium select2me"  name = "account" value="' . $acc . '" required title = "Enter Account status">
<option></option>';
    $me = 1;
    $query = mysql_query(" SELECT * FROM glaccounts  WHERE   	accgroup='" . base64_encode($me) . "'    ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . base64_decode($row['accode']) . '">' . (base64_decode($row['acname'])) . '</option>';
    }
    echo'</select><br />s
<label>Asset Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" value="' . $asvalue . '" name="asvalue" autofocus required placeholder="Enter Asset Value" title="Enter Asset Value"/>

<label>Select Status</label><br />
<select  class="form-control input-medium"  name="status" required title="Select Account Status" data-placeholder="Select Account Status">
<option></option>
<option>Current</option>
<option>Fixed</option>
</select><br />
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments">' . $comments . '</textarea>
<br><button  class="btn green" type="submit"  name="ase">Save</button>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

function liabedit($user, $id, $lname, $amount, $lstatus, $comments, $acc) {
    echo '<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Capital Or Liability Name</label>
<input type="hidden" name="id" value="' . $id . '">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "lname" value="' . $lname . '" autofocus required placeholder = "Enter Capital Or  Liability Name" title = "Enter Liability Name" />
<label>Select Account</label><br />
<select  class="form-control input-medium Select2me"  name = "account" value="' . $acc . '"  data-placeholder="Select Account" title = "Select Account">
<option></option>';
    $me = 2;
    $query = mysql_query(" SELECT * FROM glaccounts  WHERE   	accgroup='" . base64_encode($me) . "'    ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . ($row['id']) . '">' . (base64_decode($row['acname'])) . '</option>';
    }
    echo'</select><br />
<label>Capital Or Liability amount</label>
<input class = "form-control input-medium" type = "number" name = "lamount" value="' . $amount . '" required placeholder = "Enter Capital Or  liability Amount" title = "Enter Capital Or  Libility Value" />

<label>Status</label>
<br />
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" data-placeholder="Select Account status" value="' . $lstatus . '" class = "form-control input-medium select2me" name = "status" required title = "Select Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select><br />
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" name = "comments" value="' . $comments . '" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<br><button class = "btn green" name = "lid">Save</button>
</form>

</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div></div>
</div>';
}

function editglaccounts() {
    echo '
<table id="sample_editable_1" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">GL Account Code</th>
<th class="style">GL Account Name</th>
<th class="style">Account Group</th>
<th class="style">Status</th>
<th class="style">Edit</th>
<th class="style">Deactivate</th>

</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirm = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM glaccounts order by accode');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class="style">' . base64_decode($Row['accode']) . '</td>
<td class="style">' . base64_decode($Row['acname']) . '</td>
<td class="style">' . getaccname(base64_decode($Row['accgroup'])) . '</td>
<td class="style">' . base64_decode($Row['status']) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="accountsettings.php?gacid=' . $Row['id'] . '"><img src="images/edit.png"> </a></td>';
        if (base64_decode($Row['status']) == 'Active') {
            echo '<td class="style"><a class="deac" href="javascript:;" id="deactivate">Deactivate</a></td>  ';
        } else {
            echo '<td class="style"><a class="act" href="javascript:;" id="act">Activate</a></td>  ';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function editaccounts() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" >
<thead  class="style">
<tr>
<th class="style">Account Name</th>
<th class="style">Account Type</th>
<th class="style">Status</th>


</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM accounts');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class="style">' . base64_decode($Row['acname']) . '</td>
<td class="style">' . base64_decode($Row['actype']) . '</td>
<td class="style">' . base64_decode($Row['status']) . '</td>

</tr>';
    }
    echo '</table>
';
}

function editassets() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Asset Name</th>
<th class="style">Asset Account</th>
<th class="style">Asset Value</th>
<th class="style">Status</th>
<th class="style">Comments</th>
<th class="style">Edit</th>
<th class="style">Delete</th>

</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM assets');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class="style">' . base64_decode($Row['asname']) . '</td>
<td class="style">' . base64_decode($Row['accountid']) . '</td>
<td class="style">' . base64_decode($Row['asvalue']) . '</td>
<td class="style">' . base64_decode($Row['status']) . '</td>
<td class="style">' . base64_decode($Row['comments']) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="accountsettings.php?asid=' . $Row['id'] . '"><img src="images/edit.png"> </a></td>
<td class="style"> <a onClick="' . $confirmdelete . '" href="accountsettings.php?adel=' . $Row['id'] . '"><img src="images/delete.png"></a></td>
    
</tr>';
    }
    echo '</table>
';
}

function editliabilities() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Liability Name</th>
<th class="style">Liability Account</th>
<th class="style">Liability Amount</th>
<th class="style">Comments</th>
<th class="style">Status</th>
<th class="style">Edit</th>
<th class="style">Delete</th>
</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM liabilities');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'<tr>
<td class="style">' . base64_decode($Row['lname']) . '</td>
<td class="style">' . base64_decode($Row['accountid']) . '</td>
<td class="style">' . base64_decode($Row['lamount']) . '</td>
<td class="style">' . base64_decode($Row['lcomments']) . '</td>
<td class="style">' . base64_decode($Row['status']) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="accountsettings.php?lid=' . $Row['id'] . '"><img src="images/edit.png"> </a></td>
<td class="style"> <a onClick="' . $confirmdelete . '" href="accountsettings.php?del=' . $Row['id'] . '"><img src="images/delete.png"></a></td>
</tr>';
    }
    echo '</table>
';
}

function banking() {
    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-4 col-md-offset-1">
<label>Select Bank Name</label><br/>
<select name="bankname" class="form-control input-medium select2me" required   data-placeholder="Select Bank Name" title="Select Bank Name" onchange="showUser(this.value)">';
    echo '<option></option>';
    $chqry = mysql_query('select * from addbank where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row1 = mysql_fetch_array($chqry)) {
        echo '<option value="' . $row1['primarykey'] . '">' . base64_decode($row1['bankname']) . '</option>';
    }
    echo '</select><br />
<div id="txtHint"></div>
<label>Amount</label>
<input   class="form-control input-medium" type="number" step="0.01" name="amt" required placeholder="Enter Amount" title="Enter Amount"/>
<label>Select Transaction Type</label><BR />
<select  class="form-control input-medium select2me" data-placeholder="Select Transaction Type" name="type" required title="Select Transaction Type">
<option></option>
<option>deposit</option>
<option>withdraw</option>
</select>
</div><BR />
<div class="col-md-offset-6">
<a data-toggle="modal" data-target="#responsive6" href="transfer_officermodal.php">Add Banking Officer</a><br />
<label>Banking Officer</label><br />
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium select2me" type="text" name="approvby"  placeholder="Select Approving Officer" title="Enter Approving Officer"/>
<option></option>';
    $query = mysql_query("SELECT * FROM  bankingofficer");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['officer']) . '</option>';
    }
    echo'</select><br />
<label>Select Mode of Payment</label><br />
<select class="form-control input-medium select2me"  name="mode" required   data-placeholder="Select Mode of Payment"  title="Select Mode of Payment"  >
<option></option>
<option>Cash</option>
<option>Cheque</option>
</select><br />

<label>Select Account From</label><br />
<select class="form-control input-medium select2me"  name="accFrom" required   data-placeholder="Select Account From"  title="Select Account From"  >
<option></option>';
    $stml = mysql_query("SELECT *  FROM   glaccounts WHERE  status='QWN0aXZl'   AND   accgroup ='" . base64_encode(2) . "' ");
    while ($rq = mysql_fetch_array($stml)) {
        echo '<option value="' . $rq['id'] . '">' . base64_decode($rq['acname']) . '</option>';
    }
    echo'</select><br />

<label>Comments</label>
<input class="form-control input-medium" type="text" name="comments" placeholder="Enter Comments" title="Enter Comments" />
<label>Status</label><br/>


<select  class="form-control input-medium select2me" data-placeholder="Select status" name="status" required title="Select status">
<option></option>
<option value="active">active</option>
<option value="pending">pending</option>
</select><br/>

<label>Date</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"   required type="text" name="date" maxlength="11" value="' . date("d-M-Y") . '" placeholder="Enter Date of Banking" title="Enter Date of Banking" required/>
<input   class="form-control input-medium" type="hidden"  name="transid" value="' . gmdate("dmyhisG") . '"/>
<br><button  class="btn green"  name="submit">Save</button>
</div>
<div style="display: none;" id="responsive6" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
</button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>
</form>';
}

function viewbanking($bank, $datefrom, $dateto) {



    echo '<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Bank Name</th>
<th class="style">Branch</th>
<th class="style">Account No.</th>
<th class="style">Amount</th>
<th class="style"> Banking Type</th>
<th class="style">Payment Mode</th>

<th class="style">Approving Officer</th>


<th class="style">Comments</th>
<th class="style">Date</th>
<th>Reconcile Status  </th>
</tr>
</thead>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);

    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $Rows = mysql_query("SELECT * FROM banking WHERE bnkid = '$bank' AND date = '" . base64_encode(date("d-M-Y", $s)) . "'");



            while ($Row = mysql_fetch_array($Rows)) {


                echo'	<tr>
<td class="style">' . base64_decode($Row['bankname']) . '</td>
<td class="style">' . base64_decode($Row['branch']) . '</td>
<td class="style">' . base64_decode($Row['accno']) . '</td>
<td class="style">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td class="style">' . ucwords(base64_decode($Row['mode'])) . '</td>
<td class="style">';

                if ((base64_decode($Row['ptype']) == 1) || (base64_decode($Row['ptype']) == 2) || (base64_decode($Row['ptype']) == 3) || (base64_decode($Row['ptype']) == 4)) {

                    echo getpaytype(base64_decode($Row['ptype']));
                } else {

                    echo base64_decode($Row['ptype']);
                }
                echo'</td>
<td class="style">' . getbankinoff(base64_decode($Row['approvedby'])) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['comments']))) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>
 <td class="style">';


                $confirmedit = "return confirm('Are you sure you want to reconcile?');";
                if (( $Row['state']) == base64_encode("Not Reconciled")) {

                    echo'<form method="post" action="finishreconcoliation">
                <input type="submit" onclick=' . $confirmedit . '" name="recon" class="btn green" value="Reconcile"> 
                <input type="hidden" value="' . $Row['primarykey'] . '" name="primarykey"> 
                </form>';
                } else {
                    echo base64_decode($Row['state']);
                }


                echo'</td></tr>';
            }
            $s = $s + 86400;
        }
    }
    echo '</table>';
}

function editvehicleregistration($user, $id, $mno, $vrgno, $logbk, $value, $pdate, $vtyp, $routes, $cond, $com, $fleet, $nname) {
    echo '
<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<form method="post" action="" autocomplete="off">
<div class="two">
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" hidden name="id" value="' . $id . '"/>

<label>Member No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="mno" value="' . base64_decode($mno) . '" placeholder="Enter Member no." title="Enter Member No." required  autofocus onkeyup="showUser(this.value)"/>
</div>

<div class="two">
<label>Member Name</label>
<div id="txtHint">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="mname" readonly value="' . getMembername($mno) . '" required placeholder="Enter Member Name." title="Enter Member Name"/>
</div>
</div>
<div class="two">
<label>Vehicle Number</label>
<input   class="form-control input-medium" type="text" name="regno" required value="' . base64_decode($vrgno) . '" placeholder="Enter Vehicle Registration number" title="Enter Vehicle Registration number"/>
</div>
<div class="two">
<label>Vehicle Type</label>
<input  class="form-control input-medium" type="text" name="vehicletype" value="' . base64_decode($vtyp) . '" placeholder="Enter Vehicle Type" title="Enter Vehicle Type"/>
</div>
<div class="two">
<label>Fleet Number</label>
<input   class="form-control input-medium" type="text" name="fleet" value="' . base64_decode($fleet) . '" placeholder="Enter Fleet Number" title="Enter Fleet Number"/>
</div>
<div class="two">
<label>Nickname</label>
<input   class="form-control input-medium" type="text" name="nickname" value="' . base64_decode($nname) . '" placeholder="Enter Vehicle Nickname" title="Enter Vehicle Nickname"/>
</div>
</div><div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>Log book No.</label>
<input   class="form-control input-medium" type="text" name="logbookno" value="' . base64_decode($logbk) . '" placeholder="Enter Log Book No." title="Enter Log Book No."/>
</div>
<div class="two">
<label>Purchase Date</label>
<input   class="form-control input-medium" type="text" name="purchasedate" value="' . base64_decode($pdate) . '" required placeholder="Enter Purchase Date" title="Enter Purchase Date"/>
</div>
<div class="two">
<label>Estimate Value</label>
<input   class="form-control input-medium" type="number" step=0.01 name="vvalue" min="0" value="' . base64_decode($value) . '" required placeholder="Enter Vehicle Estimated Value" title="Enter Vehicle Estimated Value" pattern="[0-9]{1,}"/>
</div>
<div class="two">
<label>Capacity</label>
<input   class="form-control input-medium" type="text" name="capacity" value="' . base64_decode($cond) . '" title="Enter Passenger Capacity" placeholder="Enter Passenger Capacity"/>
</div>
<div class="two">
<label>Status</label>
<select  class="form-control input-medium"  name="status" value="' . $_REQUEST['status'] . '" placeholder="Select the Status" title="Select the Status"/>
<option>Active</option>
<option>Inactive</option>
</select>
</div>								<div class="two">
<label>Driver</label>
<select  class="form-control input-medium"  name="dri" value="' . $_REQUEST['driver'] . '" placeholder="Select the Driver" title="Select the Driver"/>';
    $rer = mysql_query('select * from crew where career="' . base64_encode('Driver') . '" and status="' . base64_encode('Active') . '"');
    while ($rim = mysql_fetch_array($rer)) {
        echo '<option></option>';
        echo '<option value="' . $rim['id'] . '">' . base64_decode($rim['name']) . '</option>';
    }
    echo '</select>
</div>
<div class="two">
<label>Conductor</label>
<select  class="form-control input-medium"  name="cond" value="' . $_REQUEST['conductor'] . '" placeholder="Select the Conductor" title="Select the Conductor"/>';
    $per = mysql_query('select * from crew where career="' . base64_encode('Conductor') . '" and status="' . base64_encode('Active') . '"');
    while ($sim = mysql_fetch_array($per)) {
        echo '<option></option>';
        echo '<option value="' . $sim['id'] . '">' . base64_decode($sim['name']) . '</option>';
    }
    echo '</select>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >
<div class="two">
<label>Route(s)</label>
<textarea  class="form-control input-medium" name="routes" placeholder="Enter Operation routes" title="Enter Operation routes">' . base64_decode($routes) . '</textarea>
</div>
<div class="two">
<label>Comments</label>
<textarea  class="form-control input-medium" name="comments" placeholder="Enter any Comments" title="Enter any Comments"/>' . base64_decode($com) . '</textarea>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<br><button  class="btn green"  name="update">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>        ';
}

function vehicleregistration() {
    echo '
<form method="post" class="form-horizontal" action="" autocomplete="off">
<div class="form-body">

<div class="form-group">

<div class="col-md-4">
<label>Member Number</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)"  value = "' . $_REQUEST['mno'] . '" class="input-medium form-control select24">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>    
</div>

<div class="form-group">
<label>Member Name</label>
<div id="txtHint">
<input id="mname"  class="form-control input-medium" type="text" name="mname" readonly value="" placeholder="Member Name" title="Enter Name" />
</div>
</div>

<div class="form-group">
<label>Vehicle Number</label>
<input   class="form-control input-medium" type="text" name="regno" required value="' . $_REQUEST['regno'] . '" placeholder="Enter Vehicle Registration number" title="Enter Vehicle Registration number"/>
</div>

<div class="form-group">
<label>Vehicle Type</label>
<input   class="form-control input-medium" type="text" name="vehicletype" value="' . $_REQUEST['vehicletype'] . '" placeholder="Enter Vehicle Type" title="Enter Vehicle Type"/>
</div>

<div class="form-group">
<label>Fleet Number</label>
<input   class="form-control input-medium" type="text" name="fleet" value="' . $_REQUEST['fleet'] . '" placeholder="Enter Fleet Number" title="Enter Fleet Number"/>
</div>



<div class="form-group">
<label>Nickname</label>
<input   class="form-control input-medium" type="text" name="nickname" value="' . $_REQUEST['nickname'] . '" placeholder="Enter Vehicle Nickname" title="Enter Vehicle Nickname"/>
</div>


<div class="form-group">
<label>Log book No.</label>
<input   class="form-control input-medium" type="text" name="logbookno" value="' . $_REQUEST['logbookno'] . '" placeholder="Enter Log Book No." title="Enter Log Book No."/>
</div>


<div class="form-group">
<label>Purchase Date</label>
<input   class="form-control input-medium input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" name="purchasedate" value="' . $_REQUEST['purchasedate'] . '" required placeholder="Enter Purchase Date" title="Enter Purchase Date"/>
</div>

<div class="form-group">
<label>Estimate Value</label>
<input   class="form-control input-medium" type="number" step=0.01 name="vvalue" min="0" required placeholder="Enter Vehicle Estimated Value" title="Enter Vehicle Estimated Value" pattern="[0-9]{1,}"/>
</div>
<div class="form-group">
<label>Capacity</label>
<input   class="form-control input-medium" type="text" name="capacity" value="' . $_REQUEST['capacity'] . '" title="Enter Passenger Capacity" placeholder="Enter Passenger Capacity"/>
</div>
<div class="form-group">
<label>Driver</label>
<select  class="form-control input-medium"  name="dri" value="driver" placeholder="Select the Driver" title="Select the Driver"/>';
    $rer = mysql_query('select * from crew where career="' . base64_encode('Driver') . '" and status="' . base64_encode('Active') . '"');
    echo '<option>driver</option>';
    while ($rim = mysql_fetch_array($rer)) {
        echo '<option></option>';
        echo '<option value="' . $rim['id'] . '">' . base64_decode($rim['name']) . '</option>';
    }
    echo '</select>
</div>
<div class="form-group">
<label>Conductor</label>
<select  class="form-control input-medium"  name="cond" value="conductor" placeholder="Select the Conductor" title="Select the Conductor"/>';
    $per = mysql_query('select * from crew where career="' . base64_encode('Conductor') . '" and status="' . base64_encode('Active') . '"');
    echo '<option>conductor</option>';
    while ($sim = mysql_fetch_array($per)) {
        echo '<option></option>';
        echo '<option value="' . $sim['id'] . '">' . base64_decode($sim['name']) . '</option>';
    }
    echo '</select>
</div>

<div class="form-group">
<label>Route(s)</label>
<textarea  class="form-control input-medium" name="routes" placeholder="Enter Operation routes" title="Enter Operation routes">' . $_REQUEST['routes'] . '</textarea>
</div>

<div class="form-group">
<label>Comments</label>
<textarea  class="form-control input-medium" name="comments" placeholder="Enter any Comments" title="Enter any Comments"/>' . $_REQUEST['comments'] . '</textarea>
</div>

<div class="form-group">
<br><button  class="btn green"  name="submit">Save</button>
</div>
</div>
</div>

</form>';
}

function vehicleinspection() {
    echo '<div class="col-md-8">
<form method="post" action="" autocomplete="off">
<div class="col-md-4">

<div class="two">
<label>Inspected By.</label>
<input   class="form-control input-medium" type="text" name="inspectee" value="' . $_REQUEST['inspectee'] . '" placeholder="Enter Inspector Name" title="Enter Inspector Name" required pattern="[a-zA-Z ]+"/>
</div>

<div class="two">
<label>Vehicle Reg No.</label>
<input   class="form-control input-medium" type="text" name="regno" value="' . $_REQUEST['regno'] . '" required placeholder="Enter Vehicle Reg No." title="Enter Vehicle Reg No." pattern="[0-9a-zA-Z ]{6,}"/>
</div>

<div class="two">
<label>Inspection Date</label>
<input   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" name="inspectiondate"  value="' . $_REQUEST['inspectiondate'] . '" placeholder="Enter Date of Inspection" title="Enter Date of Inspection"/> 
</div>

<div class="two">
<label>Insurance</label>
<input   class="form-control input-medium" type="text" name="insure" value="' . $_REQUEST['insure'] . '" required placeholder="Enter Insurance Company" title="Enter Insurance Company" pattern="[0-9a-zA-Z ]{5,}"/>
</div>

<div class="two">
<label>Date of Expiry</label>
<input   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" name="expire"  value="' . $_REQUEST['expire'] . '" placeholder="Enter Insurance Date of Expiry" title="Enter Insurance Date of Expiry"/>
</div>


<div class="two">
<label>Body Works</label>
<input   class="form-control input-medium" type="text" name="bodyworks" value="' . $_REQUEST['bodyworks'] . '" placeholder="Enter Body Works" title="Enter Body Works"/>
</div>



<div class="two">
<label>Tyres</label>
<input   class="form-control input-medium" type="text" name="tyres" value="' . $_REQUEST['tyres'] . '" required placeholder="Enter Tyre state" title="Enter Tyre state" pattern="[a-zA-Z ]+"/>
</div>



<div class="two">
<label>Status</label>
<input   class="form-control input-medium" type="text" name="mechstatus" value="' . $_REQUEST['mechstatus'] . '" placeholder="Enter Mechanical Status" title="Enter Mechanical Status"/>
</div>

</div>
<div class="col-md-offset-5">

<div class="two">
<label>Speed Governor</label>
<input   class="form-control input-medium" type="text" name="cert" value="' . $_REQUEST['cert'] . '" required placeholder="Enter Speed Governor Certificate No." title="Enter Speed Governor Certificate No." pattern="[0-9a-zA-Z ]{2,}"/>
</div>

<div class="two">
<label>TLB Receipt No.</label>
<input   class="form-control input-medium" type="text" name="tlb"  value="' . $_REQUEST['tlb'] . '" placeholder="Enter TLB Receipt number" title="Enter TLB Receipt number"/>
</div>

<div class="two">
<label>Findings</label>
<textarea  class="form-control input-medium" name="findings" placeholder="Enter Findings" title="Enter Findings">' . $_REQUEST['findings'] . '</textarea>
</div>

<div class="two">
<label>Recommendations</label>
<textarea  class="form-control input-medium" name="recommendations" title="Enter Recommendations" placeholder="Enter Recommendations"/>' . $_REQUEST['recommendations'] . '</textarea>
</div>

<div class="two">
<label>Comments</label>
<textarea  class="form-control input-medium" name="comments" value="" placeholder="Enter any Comments" title="Enter any Comments"/>' . $_REQUEST['comments'] . '</textarea>
</div>

<div class="two">
<br><br><button  class="btn green"  name="submit">Save</button>
</div>
</div>
</form>
</div>';
}

function incomeform(){
    echo '<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">
										Input
									</a>
								</li>
								<li>
									<a href="#tab_1_2" data-toggle="tab">
										Import
									</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">';
									income();
								echo '</div>
								<div class="tab-pane fade" id="tab_1_2">';
									uploadincome(); 
								echo '</div>
								
							</div>';
}

function income() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'paymentin'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

//$qry = mysql_query('select * from glaccounts where status="' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 52%" >
<form method="post" action = "" autocomplete = "on" name="abc">																										<div class="col-md-4">


<div class="two">
<label>Receipt No.</label><span class="red">  required * </span>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  type="text" name="tid" value="' . getreceipt() . $nextId . '" min="0" required placeholder="Receipt Number" title="Receipt Number" />
</div>
<div class="two">
<label>Payee/Member</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  type="text" name="payee" value="' . $_REQUEST['payee'] . '" autofocus required placeholder="Name of the paying person" title="Name of the paying person" pattern="[a-zA-Z ]{4,}"/>
</div>
<div class="two">
<label>Payee/M No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  type="number" name="pid" value="' . $_REQUEST['pid'] . '" min="0" required placeholder="Payee ID/Member Number" title="Payee ID/Member Number" pattern="[0-9]{4,}"/>
</div>
<div class="two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="apby" value="' . $_REQUEST['apby'] . '" placeholder="Approved by" title="Approved by" required pattern="[a-zA-Z ]{4,}"/>
</div>
<div class="two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
<div class = "two">
<label>Select Bank Account</label><br />
<select class="form-control input-medium select2me" name = "bankname" required title = "Select Bank Account" data-placeholder= "Select Bank Account" >
<option></option>';
    $query = mysql_query("SELECT * FROM addbank ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['primarykey'] . '">' . base64_decode($row['bankname']) . '</option>';
    }
    echo '</select>
</div>

</div>
</div>
<div class="col-md-4" style="margin-left:200px">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>Select Account Name</label><br />
<select  class="form-control input-medium select2me"  name="tname" required  data-placeholder="Select Account Name" title="Select Account Name">
<option></option>';
    $id = base64_encode(4);

    $qry = mysql_query("select * from glaccounts where accgroup='$id'   AND   status='" . base64_encode(Active) . "' ");

    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }

    echo '</select>';
    echo '</div>
<div class="two">
<label>Select Payment Type</label><br />
<select class="form-control input-medium select2me" name = "ptype" required title = "Select Payment Type" data-placeholder="Select Payment Type">';
    echo '<option></option>';
    $qu = mysql_query("SELECT * FROM paymentmode ");
    while ($rowr = mysql_fetch_array($qu)) {
        echo '<option value="' . $rowr['id'] . '">' . base64_decode($rowr['mode']) . '</option>';
    }

    echo '</select>
</div>
</div>
<div class = "two"><br />
<label>Select Currency</label><br />
<select id="one" class="form-control input-medium select2me" name = "one" value = "' . $_REQUEST['curr'] . '" required data-placeholder="Select Currency" title = "Select Currency">
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select>
</div>
<a data-toggle="modal" data-target="#responsive76" href="setting_modal.php">Add Currency Rate</a>
<div class = "two">
<label>Amount</label>
<input type="currency" onClick="FormatAsCurrency(this.value)"required class="form-control input-medium" type = "number" name = "two" min = "0"  step="0.01" placeholder = "Enter Amount" title = "Enter Amount"   id="two" onkeyup="amultiply();"/>
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" readonly step="0.001" type = "number"  name = "res" min = "0" value = "" required placeholder = "Enter Amount in ' . getsymbol() . '" title = "Enter Amount in ' . getsymbol() . '"  id="res"/>
' . getsymbol() . ':<span id="formatted"></span>
</div>
</div>
<div class="two">
<label>Date</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d"  required type="text"  name="date" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>
<div class="two">
<br><button  class="btn green" name="submit" value="1">Add Transaction</button>
<button  class="btn green" name="submit" value="2">Finish Transaction</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

</div>
</div>
</div>
</div>

<div style="display: none;" id="responsive76" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>

';
}

function editincome($user, $id, $payee, $pid, $apby, $comments, $amount, $date, $tid, $paytype, $session, $bnkid) {
    $qry = mysql_query('select * from glaccounts where status="' . base64_encode("Active") . '" and accgroup="' . base64_encode("4") . '"') or die(mysql_error());
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="col-md-6">
<form method = "post" action = "" autocomplete = "off" name="abc">

<input   class="form-control input-medium" type="hidden" name="id" value="' . $id . '">

<div class="two">
<label>Receipt Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="tid" value="' . ($tid) . '" autofocus required placeholder="Receipt Number" title="Receipt Number" />
</div>
<div class="two">
<label>Payee/Member</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="payee" value="' . $payee . '" autofocus required placeholder="Name of the paying person" title="Name of the paying person" />
</div>

<div class="two">
<label>Payee/M No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="number" name="pid" value="' . $pid . '" min="0" required placeholder="Payee ID/Member Number" title="Payee ID/Member Number" />
</div>
<div class = "two">
<label>Select Bank Account</label><br />
<select class="form-control input-medium select2me" name = "bankname" required title = "Select Bank Account" data-placeholder= "Select Bank Account" >';
    $query = mysql_query("SELECT * FROM addbank where primarykey='" . $bnkid . "' ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['primarykey'] . '">' . base64_decode($row['bankname']) . '</option>';
    }
    $querya = mysql_query("SELECT * FROM addbank  ");
    while ($rowa = mysql_fetch_array($querya)) {
        echo '<option value="' . $rowa['primarykey'] . '">' . base64_decode($rowa['bankname']) . '</option>';
    }
    echo '</select>
</div>
<div class="two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="apby" value="' . $apby . '" placeholder="Approved by" title="Approved by" required />
</div>

<div class="two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments">' . $comments . '</textarea>
</div>
</div>
</div>
<div class="col-md-6">
<div class="art-layout-cell" style="width: 50%; margin-left:200px;" >
<div class="two">
<label>Select Account Name</label><br />
<select  class="form-control input-medium select2me" name="tname" required data-placeholder="Select Account Name"  title="Select Account Name">
';
    $qry = mysql_query('select * from glaccounts where status="' . base64_encode("Active") . '" and accgroup="' . base64_encode("4") . '" and id="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }
    $qry = mysql_query('select * from glaccounts where status="' . base64_encode("Active") . '" and accgroup="' . base64_encode("4") . '" ') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>


<div class = "two">
<label>Select Payment Type</label><br />
<select class="form-control input-medium select2me" name = "ptype" required title = "Select Payment Type" data-placeholder="Select Payment Type">';

    $stl = mysql_query("SELECT * FROM paymentmode WHERE id='" . $paytype . "' ");
    while ($rowr = mysql_fetch_array($stl)) {
        echo '<option value="' . $rowr['id'] . '">' . base64_decode($rowr['mode']) . '</option>';
    }
    $stl = mysql_query("SELECT * FROM paymentmode ");
    while ($rowr = mysql_fetch_array($stl)) {
        echo '<option value="' . $rowr['id'] . '">' . base64_decode($rowr['mode']) . '</option>';
    }
    echo '</select>
</div>



<div class = "two">
<label>Select Currency</label><br />
<select id="one" class="form-control input-medium select2me" name = "one" value = "' . $_REQUEST['curr'] . '" required title = "Select Currency" data-placeholder= "Select Currency">
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select>
</div>
<div class = "two">
<label>Amount</label>
<input pattern="([0-9]*[.,]*)+"  class="form-control input-medium" type = "number" name = "two" min = "0" required placeholder = "Enter Amount" value="' . $amount . '" title = "Enter Amount"  id="two" onkeyup="amultiply();"/>
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input  class="form-control input-medium" type = "number" name = "res" min = "0" required placeholder = "Enter Amount in ' . getsymbol() . '" value="' . $amount . '" title = "Enter Amount in ' . getsymbol() . '"  id="res"/>
</div>
</div>

<div class="two">
<label>Date</label>
<input class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d" type="text" name="date" value="' . ($date) . '" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>

<div class="two">

<input class="form-control input-medium" type="hidden" name="session" required value="' . ($session) . '" placeholder="Enter Amount" title="Enter Amount"/>

<br><button  class="btn green"  class="btn green" name="btnupdate">Update</button>

</form>

</div>
</div>
</div>
</div>
</div>

</div>';
}

function incomeedit($datefrom, $dateto) {
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead  class="style">
<tr>
<th class="style">Date</th>
<th class="style">Receipt Number</th>
<th class="style">Paid By</th>
<th class="style">Payee ID</th>
<th class="style">Approved By</th>
<th class="style">Transaction</th>
<th class="style">Payment Type</th>
<th class="style">Amount</th>';
    $write = check_write_permission();
    if($write == 1){//if has write permission
echo '<th class="style">Edit</th>
<th class="style">Delete</th>';
    }
echo '</tr>

</thead>';
    $t = strtotime($dateto);
    $s = strtotime($datefrom);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $Rows = mysql_query('SELECT * FROM paymentin WHERE  date="' . base64_encode(date('d-M-Y', $s)) . '" ');

            while ($Row = mysql_fetch_array($Rows)) {

                $dd = base64_decode($Row['date']);
                $qtime = strtotime($dd);
                $dd1 = date("Y-m-d", $qtime);

//date range difference
                $now = time(); // or your date as well
                $your_date = strtotime($dd1);
                $datediff = $now - $your_date;
                $editday = floor($datediff / (60 * 60 * 24));

                $person = "SELECT * FROM settings";
                $query = mysql_query($person);
                if (mysql_num_rows($query) == 1) {
                    $row1 = mysql_fetch_array($query);
                    $num = base64_decode($row1['days']);
                }



                echo'	<tr>
<td class="style">' . base64_decode($Row['date']) . '</td>
<td class="style">' . base64_decode($Row['transid']) . '</td>
<td class="style">' . base64_decode($Row['paidby']) . '</td>
<td class="style">' . base64_decode($Row['payeeid']) . '</td>
<td class="style">' . base64_decode($Row['approvedby']) . '</td>
<td class="style">' . getglacc(base64_decode($Row['transname'])) . '</td>
<td class="style">' . paytype(base64_decode($Row['paymentype'])) . '</td>
<td class="style">' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>';
                $confirmedit = "return confirm('Are you sure you want to edit?');";
                $confirmdelete = "return confirm('Are you sure you want to Delete?');";
                if ($num > $editday) {
                    $write = check_write_permission();
                    if($write == 1){//if has write permission
                    echo '<td class="style"><form action="" method="POST"><input type="hidden" name="iid" value="' . $Row['primarykey'] . '" /><button name="btnedit" onClick="' . $confirmedit . '" ><img src="images/edit.png"> </button></form></td>';
                    }
                } else {
                    echo'<td class="style" style="font-size:10px; color:red;">Edit period is over</td>';
                }

                if ($num > $editday) {
                    $write = check_write_permission();
                    if($write == 1){//if has write permission
                    echo'<td class="style"> <a onClick="' . $cnfirmdoelete . '" href="incomeedit.php?idel=' . $Row['primarykey'] . '&amount=' . $Row['amount'] . '&date=' . $Row['date'] . '"><img src="images/delete.png"></a></td>';
                    }
                } else {
                    echo'<td class="style" style="font-size:10px; color:red;">Delete period is over</td>';
                }
            }
            $s = $s + 86400;
        }
    }
    echo '</table>';
}

function sharesform() {
    $qry = mysql_query('select * from accounts where actype!="' . base64_encode("Expense") . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    $qry1 = mysql_query('select * from accounts where actype!="' . base64_encode("Expense") . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<form method="post" action="" autocomplete="off">
<div class="two">
<label>From Member No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="from" autofocus required placeholder="Enter Member Number" title="Enter Member Number"/>
</div>

<div class="two">
<label>To Member No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="to" required placeholder="Enter Member Number" title="Enter Member Number"/>
</div>
<div class="two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name="apby" placeholder="Approved by" title="Approved by" required pattern="[a-zA-Z ]{6,}"/>
</div>
<div class="two">
<label>Status</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name="status" required title="Enter contribution status" placeholder="Enter contribution status"/>
</div>
</div>
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<label>From Account</label>
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  name="facc" required title="Account Name">
<option></option>
';
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class="two">
<label>To Account</label>
<select  class="form-control input-medium"  name="racc" required title="Account Name">
<option></option>
';
    while ($row2 = mysql_fetch_array($qry1)) {
        echo '<option>' . base64_decode($row2['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class="two">
<label>Amount</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="number" step="0.01" name="amount" min="0" required placeholder="Enter Amount" title="Enter Amount"/>
</div>
<div class="two">
<label>Comments</label>
<textarea pattern="[A-Z][a-z]{15}" class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<input   class="form-control input-medium"type="text" name="tid" value="' . gmdate("dmyhisG") . '" hidden required/>
<br><button  class="btn green"  name="submit">Adjust Shares</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function personalcontributionsearch($user, $s) {

//to make pagination
    $statement = "`newmember`";
    $mqry = mysql_query("SELECT * FROM {$statement} where membernumber like '%" . base64_encode($s) . "%' or firstname like '%" . base64_encode($s) . "%' or middlename like '%" . base64_encode($s) . "%' or lastname like '%" . base64_encode($s) . "%' order by primarykey desc ");

    $mrslt = mysql_fetch_array($mqry);
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<tr><th class="style">Member Number</th><th class="style">Member Name</th><th class="style">Phone</th></tr>
<tr><td class="style">' . base64_decode($mrslt['membernumber']) . '</td>
<td class="style">' . base64_decode($mrslt['firstname']) . ' ' . base64_decode($mrslt['middlename']) . ' ' . base64_decode($mrslt['lastname']) . '</td>
<td class="style">' . base64_decode($mrslt['mobileno']) . '</td></tr>
</table>';
    echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<tr><th colspan="4">Transaction Details</th></tr>
<tr><th class="style">Receipt No</th><th class="style">Transaction</th><th class="style">Amount</th><th class="style">Date</th></tr>';
    $qry = mysql_query('select * from membercontribution where memberno like "%' . base64_encode($s) . '%" order by primarykey desc') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr><td class="style">' . base64_decode($row['payeeid']) . '</td>
<td class="style">' . getglacc(base64_decode($row['transaction'])) . '</td>
<td class="style">' . getsymbol() . '.' . base64_decode($row['amount']) . '</td>
<td class="style">' . base64_decode($row['date']) . '</td></tr>';
    }
    echo '</table>';
}

function loanapplication() {
    echo '<form method="post" action="" class="form-horizontal" id="loanapp" autocomplete="off">
<div class="col-md-6">
<div class="form-group">
<label>Select Member Number</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)"   class="input-medium form-control select2me" required  data-placeholder="please select a member number" title="please select a member number">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>


<div id="txtHint">
</div>

<div class="form-group">
<label>Select Loan Type</label><br />
<select id="loant"  class="form-control input-medium select2me" data-placeholder="Select Loan Type"  name="loant" required title="Select Loan Type">
<option></option>';

    $loans = mysql_query('select * from loansettings where status="' . base64_encode("Active") . '" ');
    while ($row = mysql_fetch_array($loans)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['lname']) . '  ( ' . base64_decode($row['ltype']) . ' )</option>';
    }

    echo '</select></div>

<div class="form-group">
<label>Loan Purpose</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="purp"  class="form-control input-medium" type = "text" name = "purpose" required value = "" placeholder = "Enter loan Purpose" title = "Enter loan Purpose"/>
</div>

<div class="form-group">
<label>Amount</label>
<input TYPE="currency"  onkeyup="FormatAsCurrency(this.value)"  id="amount" class="form-control input-medium"  name = "amount" min = "1" value = "" placeholder = "Enter amount of loan" title = "Enter amount of loan" required pattern="([0-9]*[.]*)+" />
' . getsymbol() . ': <span id="formatted"></span></td>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>No. Repayment</label><br />
<input id="inv"  class="form-control input-medium"   type = "number" name="norep" min = "1" value = "" placeholder = "No of Intervals" title = "No of Intervals" required >

</div>
<div class="form-group">
<label>Select Time Btn Intervals</label><br />
<select  id="tper" class="form-control input-medium select2me" name="mode" required title = "Select Time Btn Intervals" data-placeholder = "Select Time Btn Intervals">
<option></option>
<option>Days</option>
<option>Weeks</option>
<option>Months</option>
</select>
</div>

<div class="form-group">
<label>Date of Loan Application</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="dateapp" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d" name = "appdate" required title = "Enter Loan Application Date" placeholder = "Enter Loan Application Date">
</div>

<div class="form-group">
<label>Grace Period</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="gperiod" class="form-control input-medium " type="number"   name = "gperiod" required title = "Enter Loan Grace Preriod in days" placeholder = "Enter Loan Grace Preriod in days">
</div>

<input  class="form-control input-medium" type = "hidden" name = "tid" value = "' . gmdate("dmyhisG") . '" hidden required/>
<br><button  class="btn green"  class="btn green" name = "appl">Apply Loan</button>


<div class="form-group">';
    if (nguarantors("user", $_SESSION['ltid'], $_SESSION['lmid']) == 'Apply for a loan first' || targetguaranteed($_SESSION['ltid'], $_SESSION['amtt']) == 'Apply for a loan first' || amountguaranteed("user", $_SESSION['ltid'], $_SESSION['lmid']) == 'Apply for a loan first' || amountremaining("user", $_SESSION['ltid'], $_SESSION['lmid'], $_SESSION['amtt']) == 'Apply for a loan first') {
        echo 'Apply for a loan first';
    } else {
        if (nguarantors("user", $_SESSION['ltid'], $_SESSION['lmid']) == '<span class="green" >Apply for a loan first</span></br>') {
            echo '<span class="green" >Apply for a loan first</span></br>';
        } else {
            echo nguarantors("user", $_SESSION['ltid'], $_SESSION['lmid']) .
            targetguaranteed($_SESSION['ltid'], $_SESSION['amtt']) . '
' . amountguaranteed("user", $_SESSION['ltid'], $_SESSION['lmid']) . '
' . amountremaining("user", $_SESSION['ltid'], $_SESSION['lmid'], $_SESSION['amtt']);
        }
    }
    echo '</div>
</div>
</form>';
}

function guarantors() {
    echo '<form method="post" action = "" class="form-horizotal" autocomplete = "off">
    <div class="form-body">
    <div class="col-md-4">
    
    <div class="form-group">
    <label> Choose Guarantor  </label>
<label>Non Member</label>
<input type="radio" id="sizla" required name="gu" class="form-control input-medium"/>
</div>

<div class="form-group">
<label>Member</label>
<input type="radio" id="lex"  required name="gu" class="form-control input-medium" >
</div>

<div class="form-group">
<label>Gurantor name</label>
<input type="text" id="in" placeholder="Enter  Gurantor name"  title="Enter  Gurantor name"  required name="name" class="form-control input-medium">
</div>

<div class="form-group">
<label>Gurantor Id No</label>
<input type="text" id="inn"  required placeholder="Enter  Gurantor ID Number"  title="Enter  Gurantor ID Number"  name = "gno" class="form-control input-medium">
</div>

<div class="form-group">
<label>Select Guarantor Number</label><br />
<select name = "gno" required id="select2_sample_modal_4" title="Select Guarantor Number" data-placeholder="Select Guarantor Number"   class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>


<label>Guarantor Name</label>
<div id = "txtHin">
</div>

</div>
<div class="col-md-offset-5">

<div class="form-group">
<label>Choose Collateral Or Savings</label><br />
<label>Savings </label>
<input type="radio" required class="form-control  input-medium" value="1" name="gtype" id="yes">
</div>

<div class="form-group">
 <label>Collateral</label>
<input type="radio" required class="form-control  input-medium" value="2" name="gtype" id="no">
</div>

<div class="form-group">
<label>Amount</label>
<input type = "currency" onkeyup="FormatAsCurrenc(this.value)" required class="form-control input-medium" id="jay" name = "gamount"  placeholder = "Enter amount contribution" title = "Enter amount contribution" />
' . getsymbol() . ':<span id="ormatted"></span></td>
</div>

<div class="form-group">
<label>Collateral</label>
<select id="col" class="form-control input-medium" name = "collateral"  placeholder = "Select Collateral" title = "Enter Collateral" pattern = "[0-9]{1,}"/>
</select>

<a onclick="showColl()" href="javascript:;">Refresh Collateral</a>
    </div>
    
<div class="form-group">
    <label>Date </label>
<input  id="dateapp" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d" name = "date" required title = "Enter  Date" placeholder = "Enter  Date">
</div>

<div class="form-group">
<label>Comments</label>
<textarea required pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
</div>

<br><button  class="btn green"  class="btn green" name = "gadd">Add Guarantor</button>

<div class = "form-group">';

    echo nguarantors("user", $_SESSION['ltid'], $_SESSION['lmid']) .
    targetguaranteed($_SESSION['ltid'], $_SESSION['amtt']) . '
' . amountguaranteed("user", $_SESSION['ltid'], $_SESSION['lmid']) . '
' . amountremaining("user", $_SESSION['ltid'], $_SESSION['lmid'], $_SESSION['amtt']);

    echo
    '</div>

</div>
</div>
</form>';
}

function viewmembers2() {
    $mytable = '<div id="parent">
        <form action="get_members.php" method="post">
<table  class="table table-striped table-bordered table-hover"  id="sample_1">
<thead  class="style">
<tr> <th colspan="9"> <h3 align="center"> <b>All Members Reports </b> </h3>    </th>    </tr>

<tr><th id="" class="table-checkbox">
									<input type="checkbox" class="parent"/>
								</th>
<th class="style">Member No.</th>
<th class="style">First Name</th>
<th class="style">Middle Name</th>
<th class="style">Last Name</th>
<th class="style">ID Number</th>
<th class="style">Mobile No.</th>
<th class="style">Status</th>
<th class="style">Date of Registration</th>
</tr>

</thead>';

    $statement = "`newmember`";
    $Rows = mysql_query("SELECT * FROM {$statement} order by primarykey asc");

    while ($Row = mysql_fetch_array($Rows)) {


        $mytable.=' <tr>
            <td id="">
									<input name=check[] type="checkbox" class="child" value="' . base64_decode($Row['membernumber']) . '"/>
								</td>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['firstname']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['middlename']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['lastname']))) . '</td>
<td class="style">' . base64_decode($Row['idnumber']) . '</td>
<td class="style">' . base64_decode($Row['mobileno']) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['status']))) . '</td>
<td class="style">' . base64_decode($Row['regdate']) . '</td>
</tr>';
    }
    $mytable.='</table></div>';
    echo $mytable;
}

function viewmembers() {
    $mytable = '
        <div class="portlet box green ">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i> <h3 align="center"> <b>All Members Reports </b> </h3>  </div>
                     <div class="actions">
                     <div class="noprint">
                        <div class="btn-group">
                           <a class="btn default" href="#" data-toggle="dropdown">
                           Columns
                           <i class="icon-angle-down"></i>
                           </a>
                           <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                              <label><input type="checkbox" checked data-column="0"> Title </label>
                              <label><input type="checkbox" checked data-column="1"> Category </label>
                              <label><input type="checkbox" checked data-column="2">Member No </label>
                              <label><input type="checkbox" checked data-column="3"> First Name </label>
                              <label><input type="checkbox" checked data-column="4"> Middle Name </label>
                              <label><input type="checkbox" checked data-column="5"> Last Name </label>
                              <label><input type="checkbox" checked data-column="6"> ID Number</label> 
                              <label><input type="checkbox" checked data-column="7"> Mobile No. </label>
                              <label><input type="checkbox" checked data-column="8"> Gender </label>
                              <label><input type="checkbox" checked data-column="9"> Status </label>
                              <label><input type="checkbox" checked data-column="10"> Date of Registration </label>
                              <label><input type="checkbox" checked data-column="11"> Agent </label>
                              <label><input type="checkbox" checked data-column="12"> CRO </label>
                            </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="portlet-body">
               <div id="mt">
 <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">

<thead  class="style">
<tr><th class="style">Title</th>
<th class="style">Category</th>
<th class="style">Member No.</th>
<th class="style">First Name</th>
<th class="style">Middle Name</th>
<th class="style">Last Name</th>
<th class="style">ID Number</th>
<th class="style">Mobile No.</th>
<th class="style">Gender</th>
<th class="style">Status</th>
<th class="style">Date of Registration</th>
<th class="style">Agent</th>
<th class="style">CRO</th>
</tr>

</thead>';

    //$statement = "`newmember`";
    $Rows = mysql_query("SELECT * FROM newmember order by primarykey asc");

    while ($Row = mysql_fetch_array($Rows)) {


        $mytable.=' <tr>
       <td class="style">' . getTitle(base64_decode($Row['title_id'])) . '</td>
<td class="style">' . getMemberCategory(base64_decode($Row['member_cat_id'])) . '</td>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['firstname']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['middlename']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['lastname']))) . '</td>
<td class="style">' . base64_decode($Row['idnumber']) . '</td>
<td class="style">' . base64_decode($Row['mobileno']) . '</td>
    <td class="style">' . base64_decode($Row['gender']) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['status']))) . '</td>
<td class="style">' . base64_decode($Row['regdate']) . '</td>
  <td class="style">' . getAgents(base64_decode($Row['recruitedby'])) . '</td>
    <td class="style">' . getCRO(base64_decode($Row['cro_id'])) . '</td>
</tr>';
    }
    $mytable.='</table></div></div></div>';
    echo $mytable;

    echo '<div class = "col-md-4"><button  class="btn green"  value = "Print this page" onClick="return printResults()">Print</button>
             </div>  ';
}

function viewgroups($name) {
    $sum = 0;

    $mytable = '<div id="mt">
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead  class="style">
<tr> <th colspan = "4"> <h3 align="center"><b>Contribution Groups Reports</b></h3>    </th> </tr>
<tr><th colspan = "4"> <h4 align="center"><b>' . groupname($name) . ' Group </h4> </th></tr>
<tr>
<th class="style">Member Number</th>
<th class="style">Member Name</th>
<th class="style">Date Joined</th>
<th class="style">Unsubscribe Member</th>

</tr>

</thead>';

//to make pagination
    $statement = "`groups`";
    $Rows = mysql_query("SELECT * FROM {$statement} where groupid='" . base64_encode($name) . "' order by id desc ");
    while ($Row = mysql_fetch_array($Rows)) {



        $mytable.=' <tr>
<td class="style">' . base64_decode($Row['memberno']) . '</td>
<td class="style">' . getMembername($Row['memberno']) . '</td>
<td class="style">' . base64_decode($Row['auditdate']) . '</td>     
<td><a href="viewgroups.php?groupdel=' . $Row['id'] . '" Onclick=" return Del();" class="btn default btn-xs red"><i class="icon-trash"></i> Unsubscribe</a></td>
  
</tr>';
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    }
    $mytable.='</table></div>
';
    echo $mytable;

    echo '<div class="two"><button  class="btn green"  value="Print this page" onClick="return printResults()">Print</button></div>';
}

function contributin($amout) {
    if (base64_decode($amout) == 0) {
        return 0;
    } else {
        return $amout;
    }
}

function accountsform() {
    echo '
<div class = "row">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "col-md-7" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Account Group</label>
<input   class="form-control input-medium" type = "text" name = "acname" autofocus required placeholder = "Enter Account Name" title = "Enter Account Name" />

<label>Select Account Type</label><br />
<select  class="form-control input-medium select2me"  input-medium" name ="actype" required data-placeholder="Select Account Type"  title = "Account Type">
<option>Profit & Loss</option>
<option>Balance Sheet</option>
</select><br />
<label>Status</label><br />
<select  class="form-control input-medium select2me"  name = "status" required  data-placeholder="Select Account status" title = "Select Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select><br />
<br><button  class="btn green"  name = "acsubmit">Save</button>
</form>
<form action = "" method = "GET" autocomplete = "off">
<button  class="btn green"  name = "accedit">Edit</button>
</form>
</div>
</div>
<div class = "col-md-6" style = "width: 50%" >';
    if (isset($_REQUEST['laonup'])) {
        $newuser = new User();
        $newuser->accountop($_SESSION['users'], $_REQUEST['min'], 'NULL', 'NULL', 'NULL');
    }
    $qry = mysql_query('select * from acset') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    echo '<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Min Balance</label>
<input class="form-control input-medium" type = "number" step="0.01" name = "min" value = "' . base64_decode($rslt['minimumacbl']) . '" placeholder = "Enter Minimum account balance" title = "Enter Minimum account balance" required/>
<br><button  class="btn green"  name = "laonup">Update Account</button>
</form>
</div>
</div>
</div>
</div></div>';
}

function glaccountsform() {
    echo '
<div class = "row">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "col-md-7" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>GL Account Code</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "gaccode" autofocus required placeholder = "Enter GL Account Code" title = "Enter GL Account Code" />
<label>Select GL Account Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "gacname" autofocus required placeholder = "Enter GL Account Name" title = "Enter GL Account Name" />
<label>Select Account Group</label><br />
<select name = "accgrp" class="form-control input-medium select2me" required  data-placeholder="Select Account Group"  title = "Select GL Account Name">
<option></option>';

    $row = mysql_query('SELECT * FROM accounts');
    while ($row3 = mysql_fetch_array($row)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select><br />
<label>Select Status</label><br />
<select name = "status" class="form-control input-medium select2me" required  data-placeholder="Select Status" title = "Select Status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select><br />
<br><button  class="btn green"  name = "gacsubmit">Save</button>
</form>
<form action = "" method = "GET" autocomplete = "off">
<button  class="btn green"  name = "gaccedit">Edit</button>
</form>
</div>
</div>
</div>
</div></div>';
}


function gl_bank_payment_ids(){
    echo '<div class="portlet-title">
                <div class="caption">
                        <i class="fa fa-reorder"></i>
                </div>
                <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                </div>
        </div>
        <div class="portlet-body">
                <ul class="nav nav-tabs">
                        <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                        GL Accounts
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                        Banks
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_3" data-toggle="tab">
                                        Payment Modes
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_4" data-toggle="tab">
                                        Loan Types
                                </a>
                        </li>

                </ul>
                <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_1_1">';
                            get_gl_ids();
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_2">';
                                bank_ids(); 
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_3">';
                            payment_ids();
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_4">';
                            get_loan_types();
                        echo '</div>
                </div>';
}

function get_loan_types(){
    echo '<table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th>Bank ID</th>
                        <th>Bank Name</th>
                    </tr>
                </thead>';

                $stmt = mysql_query('SELECT * FROM loansettings');

                while ($banks = mysql_fetch_array($stmt)) {
                    echo '<tr>
                        <td >'. ($banks['id']) .'</td>
                        <td >'. base64_decode($banks['lname']) .'</td>';
                    echo '</tr>';
                }

                echo '</table>';
}


function get_gl_ids(){
    echo '<table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>GL ID</th>
                                                            <th>GL Code</th>
                                                            <th>Account Name</th>                                                            
                                                            <th>Account Type</th>
                                                            
                                                        </tr>
                                                    </thead>';
                                                    
                                                    $glid = mysql_query("SELECT * FROM glaccounts");
                                                    while($row = mysql_fetch_array($glid))
                                                    {
                                                        
                                                        $id = $row['id'];
                                                        $accname = getglacc($id);
                                                        $glcode = base64_decode($row['accode']);
                                                        
                                                        //***Search account group****//
                                                        $accgroupid = mysql_query('select * from glaccounts where acname="' . base64_encode($accname) . '"');
                                                        while($row2 = mysql_fetch_array($accgroupid))
                                                        {
                                                            $acctypeid = $row2['accgroup'];
                                                            //** Get account group names **//
                                                            $accgroupname = mysql_query('select * from accounts where id="' . base64_decode($acctypeid) . '"');
                                                            $acctype = mysql_fetch_array($accgroupname);
                                                            
                                                        }
                                                        echo "<tr> 
                                                                <td>$id</td>
                                                                <td>$glcode</td>
                                                                <td>$accname</td> 
                                                                    <td>".base64_decode($acctype['acname'])."</td>
                                                                    </tr>
                                                                ";
                                                    }
                                            
                                            
                                           
                                                    echo '</table>';
}


function bank_ids() {
    echo '<table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                    <tr>
                        <th>Bank ID</th>
                        <th>Bank Name</th>
                    </tr>
                </thead>';

                $stmt = mysql_query('SELECT * FROM member_banks');

                while ($banks = mysql_fetch_array($stmt)) {
                    echo '<tr>
                        <td >'. ($banks['id']) .'</td>
                        <td >'. base64_decode($banks['bank_name']) .'</td>';
                    echo '</tr>';
                }

                echo '</table>';
}
    


function payment_ids(){
    echo '<table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>';

                $stmt = mysql_query('SELECT * FROM paymentmode');

                while ($pay = mysql_fetch_array($stmt)) {
                    echo '<tr>
                        <td >' . ($pay['id']) . '</td><td >' . base64_decode($pay['mode']) . '</td></tr>';                                                            
                }

                echo '</table>';
    }


function adminprofile($user) {
    $qry = mysql_query('select * from admin') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Username</label>
<input   class="form-control input-medium" type = "text" name = "uname" value = "' . base64_decode($rslt['uname']) . '" autofocus required placeholder = "Enter Username" title = "Enter Username"/>
<label>Password</label>
<input   class="form-control input-medium" type = "text" name = "password" value = "' . base64_decode($rslt['password']) . '" required placeholder = "Enter Account Name" title = "Enter Account Name"/>
<br><br><button  class="btn green"  name = "update">Update</button>
</form>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
</div> ';
}

function userprofile($user) {
    $qry = mysql_query('select * from users where id = "' . $user . '" and status = "' . base64_encode("Active") . '"') or die(mysql_error());
    $rslt = mysql_fetch_array($qry);
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Username</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "uname" value = "' . base64_decode($rslt['username']) . '" autofocus required placeholder = "Enter Username" title = "Enter Username" />
<label>Password</label>
<input class="form-control input-medium" type = "text" name = "password" value = "' . base64_decode($rslt['password']) . '" required placeholder = "Enter Account Name" title = "Enter Account Name" />
<br><br><button  class="btn green"  name = "update">Update</button>
</form>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
</div> ';
}

function assetsform() {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Asset Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "asname" autofocus required placeholder = "Enter Asset Name" title = "Enter Asset Name" />
<label>Account</label><br />
<select  class="form-control input-medium select2me"  name = "account" required title = "Select Account status"  data-placeholder= "Select Account status">
<option></option>';
    $me = 1;
    $query = mysql_query(" SELECT * FROM glaccounts  WHERE   	accgroup='" . base64_encode($me) . "'    ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . base64_decode($row['accode']) . '">' . (base64_decode($row['acname'])) . '</option>';
    }
    echo'</select><br />
<label>Asset Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "number" name = "asvalue" required placeholder = "Enter Asset Value" title = "Enter Asset Value" />

<label>Status</label><br />
<select  class="form-control input-medium select2me"  name = "status" required title = "Select Account status" data-placeholder= "Select Account status">
<option></option>
<option>Current</option>
<option>Fixed</option>
</select><br />
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<br><button  class="btn green"  name = "assave">Save</button>
</form>
<form action = "" method = "GET" autocomplete = "off">
<button  class="btn green"  name = "assedit">Edit</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

function viewfeedback() {

    echo '<div id="mt">
<table id="sample_2" class="table table-striped table-bordered table-hover">
<thead  class="style">
<tr><th colspan="5"><h3 align="center"><b> Feedback Reports   </b></h3></th></tr>
<tr><th >Member No.</th>
<th >Member Name</th>
<th class="style">Subject</th>
<th class="style">Body</th>
<th class="style">Date</th>
</tr>
</thead>';

    $Rows = mysql_query("SELECT * FROM communication order by primarykey desc ");
//$Rows = mysql_query('SELECT * FROM communication');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class="style">' . base64_decode($Row['memberno']) . '</td>
<td class="style">' . getMembername($Row['memberno']) . '</td>
<td class="style">' . base64_decode($Row['subject']) . '</td>
<td class="style">' . base64_decode($Row['body']) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>
</tr>';
    }
    echo '</table></div>';
}

function withdrawsearchresults($user, $mnumber, $fname, $mname, $lname, $idno, $state, $county, $mobile, $comments, $savings, $withdrawfee) {
    echo '<br/><br/><br/><div class="portlet-body form">
<form method = "post" action = "" class="form-horizontal" id="404" autocomplete = "off">

<div class="form-body">

<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<label >First Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "fname"  class="form-control input-medium" type = "text" name = "fname" value = "' . base64_decode($fname) . '" readonly placeholder = "Enter first Name" title = "Enter first Name" readonly />
</div>
<div class="col-md-3 col-md-offset-1">
<label >Middle Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "mname"  class="form-control input-medium" type = "text" name = "fname" value = "' . base64_decode($mname) . '" readonly placeholder = "Enter Middle Name" title = "Enter Middle Name" readonly />
</div>
<div class="col-md-3 col-md-offset-0">
<label >Last Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "lname"  class="form-control input-medium" type = "text" name = "fname" value = "' . base64_decode($lname) . '" readonly placeholder = "Enter last Name" title = "Enter last Name" readonly />
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-1">
<label >Cheque Number</label>
<input id= "cheque"  class="form-control input-medium" type = "text" name = "cheque" placeholder = "Enter Cheque Number" title = "Enter Cheque Number"/>
</div>
<div class="col-md-4 col-md-offset-0">
<label >Withdrawn Amount</label>
<input id= "amount"  class="form-control input-medium" type = "number" step="0.01" name = "amount" value="' . $savings . '" placeholder = "Enter Withdrawn Amount" title = "Enter Withdrawn Amount"/>
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-1">
<label >Withdraw Fees</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "fees" class="form-control input-medium" value="' . $withdrawfee . '" type = "number" step="0.01" name = "fees" placeholder = "Enter Withdraw Fees" title = "Enter Withdraw Fees" required />
</div>

<div class="col-md-4 col-md-offset-0">
<label >ID Number.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "idno"  class="form-control input-medium" type = "text" name = "idno" readonly value = "' . base64_decode($idno) . '" placeholder = "Enter Id No." title = "Enter Id No." pattern = "[0-9]{4,}"/>
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-1">
<label >County/State</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "town"  class="form-control input-medium" type = "text" name = "town" readonly value = "' . base64_decode($state) . '" placeholder = "Enter Town" title = "Enter Town"/>
</div>

<div class="col-md-4 col-md-offset-0">
<label >County</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "county"  class="form-control input-medium" type = "text" name = "county" readonly value = "' . base64_decode($county) . '" placeholder = "Enter County" title = "Enter County" />
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-1">
<label >Phone Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "mobile" class="form-control input-medium" type = "text" name = "mobile" readonly value = "' . base64_decode($mobile) . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number" />
</div>

<div class="col-md-4 col-md-offset-0">
<label >Approved By</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "approvedby" class="form-control input-medium" type = "text" name = "approvedby" placeholder = "Enter Approving Officer" title = "Enter Approving Officer" required />
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-1">
<label >Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "comments"  class="form-control input-medium" name = "comments"  placeholder = "Enter Comments" title = "Enter Comments">' . base64_decode($comments) . '</textarea>
</div>
</div>

<div class="form-actions">
<div class="col-md-4 col-md-offset-6">
<button  class="btn green"  name = "submit">Save</button>
</div>
</div>
</div>
</form></div>
';
}

function contributionreceipt($user, $ID, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $session, $date) {
    $mnameqry = mysql_query('select * from newmember where membernumber = "' . base64_encode($mno) . '"') or die(mysql_error());
    $incqry = mysql_query('select * from paymentin where session = "' . $session . '"') or die(mysql_error());
    $conqry = mysql_query('select * from membercontribution where primarykey = "' . $ID . '"') or die(mysql_error());

    $mnamerslt = mysql_fetch_array($mnameqry);

    $defaultSavingsAccBal = number_format(comsaving($mno) - paymentinadjust($mno), 2);
    $defaultSharesAccBal = number_format(compshare($mno), 2);
    //
    if ($date != 11) {
        $dub = "";
    } else {
        $dub = "Duplicate Receipt For Member Number $mno";
    }
    $id = "javascript:Print('stylized')";

    $receipt .='<div style="width:100%; margin:0 auto;>    
<body onload = "' . $id . '">
<div id = "stylized">
<table id="sample_2" aria-describedby = "sample_2_info" width = "100%" style="font-family: Lucida Sans Typewriter;color:black;">'
            . $dub .
            '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan="2"><center>
<div class="art-layout-cell" style="width: 80%" >
<img src="photos/' . logo() . '" width="70px" height="80px"/>
</div></center>
</td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan = "2"><center><b>' . compname() . '</b></center>
</td>
</tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center><b>' . address() . '  |  Mobile No. ' . mobile() . '</b></center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center><b>' . email() . '</b></center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>' . $ddate . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center> ' . getglacc($tname) . ' Contribution Receipt No.' . $payeeid . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">T. code:</td><td class="style">' . $tid . '</td></tr>
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">Transaction Date:</td><td class="style">' . $date . '</td></tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">M.No.:</td><td class="style">' . $mno . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">M.Name:</td><td class="style">' . getMembername(base64_encode($mno)) . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class="style">Transaction</th><th class="style">Amount</th></tr>';
    $total = 0;

    while ($row1 = mysql_fetch_array($incqry)) {

        if (base64_decode($row1['transname']) != '144') {
            $receipt .='<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">' . getglacc(base64_decode($row1['transname'])) . '</td><td class="style">' . getsymbol() . '.' . number_format(base64_decode($row1['amount']), 2) . '</td></tr>';
            //$total1 = amount($row1['amount']);
            $total +=amount($row1['amount']);
        }
    }

    while ($row = mysql_fetch_array($conqry)) {
        $total2 = amount($row['amount']);
        //$totals= $total2 - $total;
        //$total3 = $total1 + $total2;

        $paidAccount = getglacc(base64_decode($row['transaction']));

        $receipt .='<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">' . $paidAccount . ', date:' . base64_decode($row['datefrom']) . ' to ' . base64_decode($row['dateto']) . '</td><td class="style">' . getsymbol() . '.' . number_format(($total2), 2) . '</td></tr>';
        $total+=amount($row['amount']);
    }


    $receipt .='<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class="style">Total</th><td class="style">' . getsymbol() . '.' . number_format($total2, 2) . '</td></tr>
        
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px; color:red"><td><b>Account Balances:</b></td></tr>
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px; color:red">
    <td>' . getGlname(getdefaultsavingsaccount()) . '</td><td>' . $defaultSavingsAccBal . '</td>
    </tr>
    
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px; color:red">
    <td>' . getGlname(getdefaultsharesaccount()) . '</td><td>' . $defaultSharesAccBal . '</td>
     </tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td><center>You were served by:' . servedby($user) . '</center> </td><td><center>   Printed Date And Time ' . date("d-M-Y h:i:sa") . '</center></td></tr>
 
 <tr style="font-variant:small-caps;font-style:normal;color:black;"><td><center>' . get_receipt_footer() . '</center> </td></tr>   
</div></table>
</div><div class="col-md-offset-10"><br/><br/><input   class="btn btn green" type = "submit" name = "btnPrint" value = "print" asp:Button ID = "btnPrint" runat = "server" onclick = "' . $id . '"/>'
            . '<a button class="btn red" href="contribution.php">Back</a Button>'
            . '</div></body></div>';
    echo $receipt;
$state = base64_encode('Active');
 if (checksend_sms() == $state) {
  $mnd = mysql_query('select * from membercontribution where session = "' . $session . '"') or die(mysql_error());
    $mnr = mysql_fetch_array($mnd);
    $sms = 'Dear ' . getMembername($mnr['memberno']) . ', we have received ' . getsymbol() . ' ' . number_format($total, 2) . ' into  your ' . getglacc($tname) . ' Receipt No: ' . $payeeid . '. ' . compname() . ' Thank You.';
    $res = phonenumber(base64_decode($mnr['memberno']));
    echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . $res . "&mess=" . $sms . "', '_blank')
    </script>";

 }
    unset($_SESSION['session']);
    session_regenerate_id();
}

function adminloginform() {

    echo '
<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "loginform">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
';
    if (isset($_REQUEST['login'])) {
        $users = new Users();
        $users->login($_REQUEST['uname'], $_REQUEST['password']);
    }

    echo '
<form action = "" method = "post" autocomplete = "off">
<div class = "five">
<label><strong>User Name</strong><img src = "images/App-login-manager-icon.png" class = "icons"/></label>
<input  type = "text" style="width:250px; height:40px;" name = "uname" placeholder = "Enter your username" title = "Enter your username,it should be atleast 6 characters" required/>

</div>
<div class = "five">
<label><strong>Password</strong><img src = "images/passwordico.png" class = "icons"/></label>
<input style="width:250px; height:40px;" type = "password" name = "password" placeholder = "Enter your password" title = "Enter your password,it should be atleast 6 characters" required/>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<br /><br /><button name = "login">Log in</button>
</form>
<a href="reset_pass.php"><button name="reset_pass">Reset password</button></a>
</div>

</div>
</div>
</div>
</div>
</div>
';
}

function depreciation() {
    print'<form method = "post" action = "" name="dep" class="form-horizontal" autocomplete = "on" id="form1">
<div class="col-md-4">
<div class="two">

<label>Select Asset</label><br />
<select name = "asset" id="select2_sample4"  onchange = "showUser(this.value)"  value = "' . $_REQUEST['id'] . '" data-placeholder="Select Asset"  title=Select Asset"  class="input-medium form-control  select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  fixed_assets");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . ($row['id']) . '">' . base64_decode($row['asset_name']) . ' </option>';
    }
    echo'</select>
</div>

<div id="txtHint">
</div>
<div class = "two">
<br/>
<button  class="btn green"  class="btn green" name = "depreciation">Calculate</button>
</div>
</form>';
}


function loandetailsform(){
    echo '<div class="portlet-title">
                <div class="caption">
                        <i class="fa fa-reorder"></i>
                </div>
                <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                </div>
        </div>
        <div class="portlet-body">
                <ul class="nav nav-tabs">
                        <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                        Upload Loan Payment
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                        Upload Loan Interest
                                </a>
                        </li>

                </ul>
                <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_1_1">';
                            loanpaymentupload();
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_2">';
                                loaninterestupload();
                        echo '</div>
                        
                </div>';
}

function loanpaymentupload(){
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Payment CSV</label>  
      <input type="file" types="csv" placeholder="Upload Income CSV"  title="Upload Payment CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
     <div class="two">
                        <input type="submit" class="btn green" name="loanpayupload" value="Import" class="btn red">
                    
        </form>
    <a href="Loanpayment.csv" class="btn green" > Download Csv Template</a></div>';
}

function loaninterestupload(){
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Interest CSV</label>  
      <input type="file" types="csv" placeholder="Upload Income CSV"  title="Upload Interest CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
     <div class="two">
                        <input type="submit" class="btn green" name="loaninterestupload" value="Import" class="btn red">
                    
        </form>
    <a href="Loaninterest.csv" class="btn green" > Download Csv Template</a></div>';
}

function contributionform(){
    echo '<div class="portlet-title">
                <div class="caption">
                        <i class="fa fa-reorder"></i>
                </div>
                <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                </div>
        </div>
        <div class="portlet-body">
                <ul class="nav nav-tabs">
                        <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                        Input
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                        Import
                                </a>
                        </li>

                </ul>
                <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_1_1">';
                                contibution();
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_2">';
                                uploadcontribution(); 
                        echo '</div>

                </div>';
}
function contibution() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

    $one = mt_rand(10000, 99999);
    echo '<form method = "post" action = "" name="abc" class="form-horizontal" autocomplete = "on" id="form1">
<div class="col-md-4">
<div class="two">

<label>Select Member Number</label><br />
<select name = "mno" id="select2_sample4"  onchange = "showUser(this.value)"  value = "' . $_REQUEST['mno'] . '" data-placeholder="Select Member Number"  title=Select Member Number"  class="input-medium form-control  select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div id="txtHint">
</div>
<div class = "two">
<label>Receipt No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "paid"  class="form-control input-medium"  type = "text" name ="payeeid"  title = "Enter Receipt No" placeholder = "Enter Receipt No" value = "' . getreceipt() . $one . '" />
</div>
<div class = "two">
<label>Paying Person</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "payee"  class="form-control input-medium"  type = "text" name = "payee"  placeholder = "Enter Payee" title = "Enter Payee" value = "' . $_REQUEST['payee'] . '" />
</div>
<div class = "two">
<label>Date From</label>
<input   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  required name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" placeholder = "Enter Date e.g 01-May-2013"  type="text" name = "datefrom"  />
</div>
<div class = "two">
<label>Date To</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  required type="text" name = "dateto" value = "' . $_REQUEST['dateto'] . '" placeholder = "Enter Date e.g 01-May-2013 " title = "Enter Date e.g 01-May-2013"/>
</div>
</div>

<div class="col-md-4 ">

<div class="two">
<label>Select Bank Account</label><br />
<select class="form-control input-medium select2me" name = "bankname" required title = "Select Bank Account" data-placeholder="Select Bank Account">
<option></option>';
    $sth = mysql_query("SELECT * FROM addbank ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo '<option value="' . $row1['primarykey'] . '">' . base64_decode($row1['bankname']) . '</option>';
    }
    echo '</select>
</div>
<div class = "two">
<label>Select Payment Mode</label><br />
<select class="form-control input-medium select2me" name = "ptype" required data-placeholder="Select Payment Mode" title = "Select Payment Mode" onchange="showUsermc(this.value)">';
    echo '<option></option>';
    $stl = mysql_query("SELECT * FROM paymentmode   WHERE  status='" . base64_encode(Active) . "'  ");
    while ($st = mysql_fetch_array($stl)) {
        echo '<option value="' . $st['id'] . '">' . base64_decode($st['mode']) . '</option>';
    }

    echo '</select>
</div>

<div class = "two">
<label>Select Currency</label><br />
<select id="selectd" class="form-control input-medium select2me"  name = "one"  required title = "Select Currency" data-placeholder="Select Currency"  value = "' . $_REQUEST['curr'] . '" >
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select><br />
<a data-toggle="modal" data-target="#responsive76" href="setting_modal.php">Add Currency Rate</a>
</div>
<div class = "two">
<label>Amount</label>
<input id= "two"  step="0.01" class="form-control input-medium" type = "number" name = "two" min = "0" onClick="FormatAsCurrency(this.value)" required placeholder = "Enter Amount" title = "Enter Amount"  id="two" onkeyup="amultiply()" pattern="([0-9]*[.,]*)+"/>

</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input  class="form-control input-medium" step="0.01" type = "currency"  name = "amount" min = "0" value ="' . $_REQUEST['amount'] . '" required placeholder = "Enter Amount in US Dollars" title = "Enter Amount in US Dollars"  id="res" "/>
' . getsymbol() . ':<span id="formatted"></span>
</div>
</div>
<div class = "two">
<label>Date</label>
<input id = "date"   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  required name = "date" placeholder = "Enter Date e.g 13-Sep-2030 " title = "Enter Date e.g 13-Sep-2030 ">
</div>
<div class="two">
<input id="tid"  class="form-control input-medium" type="hidden" name="tid" value="mcr000' . $nextId . '" hidden required/>
</div>
<div class = "two">
<br><button  class="btn green"  class="btn green" name = "submit" value = "1">Add Transaction</button>

<button  class="btn green"  class="btn green" name = "submit" value = "2">Finish Transaction</button>
</div>
</form></div>';
}

function editcontribution($user, $id, $mno, $payeeid, $payee, $datefrom, $dateto, $amount, $date, $session, $bank, $paytype) {


    $qry = mysql_query('select * from memberaccs where mno = "' . base64_encode($mno) . '" AND  status="YWN0aXZ" ') or die(mysql_error());
    echo '<form method="POST" action = "" autocomplete = "off">
<div class = "col-md-4 col-md-offset-1" >
<input  class="form-control input-medium" type = "hidden" name = "id" value = "' . ($id) . '"/>
<div class="two">
<label>Select Member Number</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" data-placeholder="Select Member Number" title="Select Member Number"  class="form-control input-medium select2me">';
    $stmt = mysql_query("SELECT * FROM  newmember   WHERE  status='" . base64_encode('active') . "' AND membernumber = '" . base64_encode($mno) . "'  ");
    while ($rqq = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($rqq['membernumber']) . '">' . getMembername($rqq['membernumber']) . '-' . base64_decode($rqq['membernumber']) . ' </option>';
    }
    $stmt = mysql_query("SELECT * FROM  newmember   WHERE  status='" . base64_encode('active') . "' ");
    while ($rqq = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($rqq['membernumber']) . '">' . getMembername($rqq['membernumber']) . '-' . base64_decode($rqq['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
 
<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="mname"  class="form-control input-medium"   type = "text" name = "mname"  readonly required placeholder = "Enter Member Name" title = "Enter Member Name" value = "' . getMembername(base64_encode($mno)) . '"/>
</div>

</div>
<div class = "two">
<label>Receipt No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "payeeid" value = "' . ($payeeid) . '" title = "Enter Receipt No" placeholder = "Enter Receipt No" />
</div>
<div class = "two">
<label>Paying Person</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "payee" value = "' . ($payee) . '" placeholder = "Enter Payee" title = "Enter Payee" />
</div>
<div class = "two">
<label>Date From</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" name = "datefrom" value = "' . ($datefrom) . '" placeholder = "Enter Date e.g 1-May-2013 " title = "Enter Date e.g 1-May-2013 "/>
</div>
<div class = "two">
<label>Select Bank Account</label><br />
<select class="form-control input-medium select2me" name = "bankname" required title = "Select Bank" data-placeholder= "Select Bank">';
    $qy = mysql_query("SELECT * FROM addbank where primarykey='" . $bank . "' ");
    while ($r4 = mysql_fetch_array($qy)) {
        echo '<option value="' . $r4['primarykey'] . '">' . base64_decode($r4['bankname']) . '</option>';
    }
    $qy = mysql_query("SELECT * FROM addbank ");
    while ($r4 = mysql_fetch_array($qy)) {
        echo '<option value="' . $r4['primarykey'] . '">' . base64_decode($r4['bankname']) . '</option>';
    }
    echo '</select>
</div>

</div>
<div class = "col-md-offset-5" >
<div class = "two">
<label>Date To</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" name = "datett" value = "' . ($dateto) . '" placeholder = "Enter Date e.g 1-May-2013 " title = "Enter Date e.g 1-May-2013 ">
</div>

<div class = "two">
<label>Payment Type</label><br />
<select class="form-control input-medium select2me"  name = "ptype" required title = "Payment type"   data-placeholder="Payment type"  onchange="showUsermc(this.value)">';

    $query = mysql_query("SELECT * FROM paymentmode where id='" . base64_decode($paytype) . "' ");
    while ($roww = mysql_fetch_array($query)) {
        echo '<option value="' . $roww['id'] . '">' . base64_decode($roww['mode']) . '</option>';
    }
    $query = mysql_query("SELECT * FROM paymentmode  ");
    while ($roww = mysql_fetch_array($query)) {
        echo '<option value="' . $roww['id'] . '">' . base64_decode($roww['mode']) . '</option>';
    }
    echo '</select>
</div>

<div class = "two">
<label>Amount</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "number" step="0.01" name = "amount" required value = "' . ($amount) . '" placeholder = "Enter Amount" title = "Enter Amount" />
</div>

<div class = "two">
<label>Date</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type = "text" name = "date" required value = "' . ($date) . '" placeholder = "Enter Amount" title = "Enter Amount"/>
</div>

<input  class="form-control input-medium" type = "hidden" name = "session" required value = "' . ($session) . '" placeholder = "Enter Amount" title = "Enter Amount"/>

<div class = "two">
<br><button type="submit" class="btn green"  class="btn green" name = "btnupdate">Update</button>
</div>

</form>';
}

function psveff() {

    echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead  class="style">
<tr> <th colspan="3"><h3 align="center"><b>' . getGlname(getdefaultsavingsaccount()) . ' Balances</b></h3></th></tr><tr>
<th class="style">Member Number</th>
<th class="style">Member Name</th>
<th class="style">' . getGlname(getdefaultsavingsaccount()) . ' Balances</th>

</tr></thead>';
    $sum = 0;


    $Rows = mysql_query('select * from newmember  where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($Rows)) {
        echo '    <tr>
<td class="style">' . base64_decode($row['membernumber']) . '</td>
<td class="style">' . getMembername($row['membernumber']) . '</td>';
        echo ' <td class="style">' . getsymbol() . ' ' . number_format(shares(base64_decode($row['membernumber'])), 2) . '</td>';
        echo '</tr>';
        $sum+=shares(base64_decode($row['membernumber']));

        psvjuma(base64_decode($row['membernumber']));
    }
    echo '<tr><td colspan="1"></td><td class="style">TOTAL</td><td class="style">' . getsymbol() . ' ' . number_format($sum, 2) . '</td></tr></table></dic>';
    echo '<div class="col-md-4"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div>';

//psvsave($sum);
}

function contiedit($mno) {

    echo '
<div id="mt"><table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr>
<th colspan="8"><h3 align="center">Contribution For ' . $mno . ' ' . getMembername(base64_encode($mno)) . '  </h3></th>
</tr><tr><th>Receipt No.</th>
<th>Transaction</th>
<th>Date From</th>
<th>Date To</th>
<th>Amount</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>';
    $Rows = mysql_query("SELECT * FROM membercontribution  WHERE  memberno='" . base64_encode($mno) . "'   ");

    while ($Row = mysql_fetch_array($Rows)) {

        $dd = base64_decode($Row['date']);
        $qtime = strtotime($dd);
        $dd1 = date("Y-m-d", $qtime);

//date range difference
        $now = time(); // or your date as well
        $your_date = strtotime($dd1);
        $datediff = $now - $your_date;
        $editday = floor($datediff / (60 * 60 * 24));

        $person = "SELECT * FROM settings";
        $query = mysql_query($person);
        if (mysql_num_rows($query) == 1) {
            $row1 = mysql_fetch_array($query);
            $num = base64_decode($row1['days']);
        }



        echo' <tr>
<td>' . base64_decode($Row['payeeid']) . '</td>
<td>' . getglacc(base64_decode($Row['transaction'])) . '</td>
<td>' . base64_decode($Row['datefrom']) . '</td>
<td>' . base64_decode($Row['dateto']) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . base64_decode($Row['date']) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        if ($num > $editday) {

            echo '<td><form action="" method="POST"><input type="hidden" name="cid" value="' . $Row['primarykey'] . '" /> <button type="submit" name="btnedit" onClick="' . $confirmedit . '" ><img src = "images/edit.png"> </button></form></td>';
        } else {
            echo' <td class="style" style=" font-size:12px;color:red;">Edit period is over</td>';
        }
        if ($num > $editday) {
            echo'<td class="style"> <a onClick="' . $confirmdelete . '" href = "contributionedit.php?cdel=' . $Row['primarykey'] . '&amount=' . $Row['amount'] . '&date=' . $Row['date'] . '"><img src = "images/delete.png"></a></td></tr>';
        } else {
            echo' <td class="style" style=" font-size:12px;color:red;">Delete period is over</td>';
        }
    }
    echo '</table>';
}

function pettycash() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'paymentout'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

//$qry = mysql_query('select * from glaccounts where status = "' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "POST" action = "" autocomplete = "on" name="abc" id=form16>
<div class="col-md-4">
<div class = "two">
<label>Receiver Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="recvr"  class="form-control input-medium" type = "text" name = "recvr" value = "' . $_REQUEST['recvr'] . '" />
</div>

<div class = "two">
<label>ID/Phone Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "number" name = "recvrid" value = "' . $_REQUEST['recvrid'] . '" min = "0" required placeholder = "Enter ID or Phone Number" title = "Enter ID or Phone Number" />
</div>
<div class = "two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "apby" class="form-control input-medium" type = "text" name = "apby" value = "' . $_REQUEST['apby'] . '" placeholder = "Approved by" title = "Approved by" required />
</div>
<div class="two">
<label>Date</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  required required type="text" name="date" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>
<div class = "two">
<label>Reasons</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="reason" class="form-control input-medium" name = "reason" placeholder = "Enter reasons for this transaction" title = "Enter reasons fro this transaction">' . $_REQUEST['reason'] . '</textarea>
</div>
<div class = "two">
<label>Account Name</label>
<select id= "tname"  class="form-control input-medium" name = "tname" value = "' . $_REQUEST['tname'] . '" required title = "Account type">';
    $id = base64_encode(5);
    $qry = mysql_query("select * from glaccounts where accgroup='$id'") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class = "two">
<label>Select Bank Account</label>
<select class="form-control input-medium" name = "bankname" required title = "Payment type" >
<option></option>';
    $query = mysql_query("SELECT * FROM addbank ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['primarykey'] . '">' . base64_decode($row['bankname']) . '</option>';
    }
    echo '</select>
</div>
</div>
</div>
<div class="col-md-4" style=" margin-left:250px">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Payment Type</label>
<select class="form-control input-medium" name = "ptype" required title = "Payment type" onchange="showUsermc(this.value)">';
    echo '<option></option>';
    $query = mysql_query("SELECT * FROM paymentmode ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['mode']) . '</option>';
    }

    echo '</select>
</div>
<div class = "two">
<label>Cheque No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="cheque"  class="form-control input-medium" type = "text" name = "cheque" required placeholder = "Enter Cheque Number"  title = "Enter Cheque Number" />
</div>
<div class = "two">
<label>Select Currency</label>
<select id="one" class="form-control input-medium" name = "one" value = "' . $_REQUEST['curr'] . '" required title = "Select Currency">
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select>
<a data-toggle="modal" data-target="#responsive86" href="setting_modal.php">Add Currency Rate</a>
</div>
<div class = "two">
<label>Amount</label>
<input id="amount"  class="form-control input-medium" type = "number" name = "two" min = "0" value = "" required placeholder = "Enter Amount" title = "Enter Amount"   id="two" onkeyup="amultiply();"/>
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input  class="form-control input-medium" type = "number" name = "res" min = "0" value = "" required placeholder = "Enter Amount in ' . getsymbol() . '" title = "Enter Amount in ' . getsymbol() . '"  id="res"/>
</div>
</div>
<div class = "two">
<label>Comments</label>
<textarea class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . $nextId . '" />
<br><button   class="btn green" name = "submit" value = "1">Add Transaction</button>
<button  class="btn green"  name = "submit" value = "2">Finish Transaction</button>
</div>
</form>
<form method="post" action="">
<div class="two">
<button class="btn green" name="edit">Edit Transaction</button>
</div>
<div style="display: none;" id="responsive86" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>


</form>

</div
</div>
</div>
</div>

</div>';
}

function expensesform(){
    echo '<div class="portlet-title">
                <div class="caption">
                        <i class="fa fa-reorder"></i>
                </div>
                <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                </div>
        </div>
        <div class="portlet-body">
                <ul class="nav nav-tabs">
                        <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                        Input
                                </a>
                        </li>
                        <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                        Import
                                </a>
                        </li>

                </ul>
                <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_1_1">';
                                expenses();
                        echo '</div>
                        <div class="tab-pane fade" id="tab_1_2">';
                                uploadexpenses(); 
                        echo '</div>

                </div>';
}

function expenses() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'paymentout'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

//$qry = mysql_query('select * from glaccounts where status = "' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "post" action = "" autocomplete = "on" name="abc" id="form4">
<div class="col-md-4">
<div class = "two">
<label>Receiver Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="recvr" placeholder="Receiver Name" class="form-control input-medium" type = "text" name = "recvr" value = "' . $_REQUEST['recvr'] . '" />
</div>

<div class = "two">
<label>ID/Phone Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required   class="form-control input-medium" type = "number" name = "recvrid" value = "' . $_REQUEST['recvrid'] . '" min = "0" required placeholder = "Enter ID or Phone Number" title = "Enter ID or Phone Number" />
</div>
<div class = "two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="apby"  class="form-control input-medium" type = "text" name = "apby" value = "' . $_REQUEST['apby'] . '" placeholder = "Approved by" title = "Approved by" required />
</div>
<div class="two">
<label>Date</label>
<input  class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d"  required  type="text"  name="date" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>

<div class = "two">
<label>Reasons</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id= "reason" class="form-control input-medium" name = "reason" placeholder = "Enter reasons for this transaction" title = "Enter reasons for this transaction">' . $_REQUEST['reason'] . '</textarea>
</div>
<div class = "two">
<label>Select Account Name</label>
<select id="tname" class="form-control input-medium select2me" name = "tname" required title = "Select Account Name" data-placeholder="Select Account Name" >
    <option></option>';
    $id = base64_encode(5);
    $qry = mysql_query("select * from glaccounts where accgroup='$id'  AND   status='" . base64_encode('Active') . "' ") or die(mysql_error());

    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class = "two">
<label>Select Payment Type</label>
<select class="form-control input-medium select2me" name = "ptype" required title = "Select Payment Type" data-placeholder="Select Payment Type">
    <option></option>';
    $stl = mysql_query("SELECT * FROM paymentmode ");
    while ($r = mysql_fetch_array($stl)) {
        echo '<option value="' . $r['id'] . '">' . base64_decode($r['mode']) . '</option>';
    }

    echo '</select>
</div>
</div>
</div>
<div class="col-md-6" style=" margin-left:250px">
<div class = "art-layout-cell" style = "width: 50%" >
<label>Select Bank Account</label><br />
<select required class="form-control input-medium select2me" name = "bankname" required title = "Bank Name" title="Select Bank Account" data-placeholder= "Select Bank Account">
<option></option>';
    $ssth = mysql_query("SELECT * FROM addbank ");
    while ($ro1 = mysql_fetch_array($ssth)) {
        echo '<option value="' . $ro1['primarykey'] . '">' . base64_decode($ro1['bankname']) . '</option>';
    }
    echo '</select>
<div class = "two">
<label>Cheque/Voucher No.</label>
<input id="cheque" class="form-control input-medium" type = "text" name = "cheque" placeholder = "Enter Cheque Number" title = "Enter Cheque Number" />
</div>
<div class = "two">
<label>Select Currency</label><br />
<select id="one" class="form-control input-medium select2me" name = "one"  required title = "Select Currency" data-placeholder="Select Currency">
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select><br />
<a data-toggle="modal" data-target="#responsive6" href="setting_modal.php">Add Currency Rate</a>
</div>
<div class = "two">
<label>Amount</label>
<input  step="0.01" class="form-control input-medium" type = "currency" onClick="FormatAsCurrency(this.value)"name = "two" min = "0" value = "" required  placeholder = "Enter Amount" title = "Enter Amount"   id="two" onkeyup="amultiply();" />
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input id= "res"  step="0.01" readonly class="form-control input-medium" type = "number" name = "res" min = "0" value = "" required placeholder = "Enter Amount in US Dollars" title = "Enter Amount in US Dollars" />
' . getsymbol() . ':<span id="formatted"></span>
</div>
</div>
<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" id="coment" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . getreceipt() . $nextId . '" />
</div>
<div class = "two"><br/>
<button  class="btn green" name = "submit" value = "1">Add Transaction</button>
<button class="btn green"  name = "submit" value = "2">Finish Transaction</button>
</div>
<div style="display: none;" id="responsive6" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>
</form>



</div
</div>
</div>
</div>

</div>';
}

function sharemembertoself() {
    echo '<form method="post" action = "" autocomplete = "off">

<div class = "two">
<label>Member No.</label><br />

<select name = "mno" id=""  onClick="userAccounts(this.value);" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
        </div>
        
<div class = "two">
<label>Approved by</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "apby" placeholder = "Approved by" title = "Approved by" />
</div>


<div class = "two">
<label>From Account</label><br />
<select  class="form-control input-medium select2me"  data-placeholder="Select Account From" name = "facc" id="facc" required title = "Account Name">
<option></option>
</select>
        </div>
      
<div class="two">
<label>Date  </label>';
    $time = new DateTime('now');
    $newtime = $time->modify('-1')->format('d-m-Y');
    echo'<input type="text"  name="date" data-date="' . $newtime . '" data-date-end-date="' . $newtime . '" class="form-control input-medium  date-picker"  data-date-format="dd-M-yyyy"  placeholder="Enter Transaction Date"  title="Enter Transaction Date"   />
    
</div>


<div class = "two">
<label>To Account</label><br />
<select  class="form-control input-medium select2me"  data-placeholder="Select Account To" name = "tacc" id="tacc" required title = "Account Name">
<option></option>
</select>
</div>

<div class = "two">
<label>Amount</label>
<input pattern="([0-9]*[.,]*)+"  step="0.0001" class="form-control input-medium" type = "number" name = "amount" min = "0" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>

<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>



<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . gmdate("dmyhisG") . '" />
<br><br><button  class="btn green"  name = "self">Adjust Shares</button>
</div>
</form>';
}

function sharemembertoanother() {
    echo '<form method="post" action = "" autocomplete = "off">

<div class = "two">
<label>From Member No</label><br />
<select name = "from" id="select2_sample4" onchange = "fromMember(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stl = mysql_query("SELECT * FROM  newmember  ");
    while ($row4 = mysql_fetch_array($stl)) {
        echo '<option  value="' . base64_decode($row4['membernumber']) . '">' . getMembername($row4['membernumber']) . '-' . base64_decode($row4['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div class = "two">
<label>To Member No.</label><br />
<select name = "to" id="select2_sample4" onchange = "toMember(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row3 = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row3['membernumber']) . '">' . getMembername($row3['membernumber']) . '-' . base64_decode($row3['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div class = "two">
<label>Approved by</label>
<input  pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "apby" placeholder = "Approved by" />
</div>


<div class = "two">
<label>From Account</label><br />
<select  class="form-control input-medium select2me" data-placeholder= "Select To Account Name" name="facc" id= "facc3" required title = "Account Name">
<option></option>
</select>
        </div>
        
<div class = "two">
<label>To Account</label><br />
<select  class="form-control input-medium select2me"  data-placeholder= "Select From Account Name" name="tacc" id= "tacc3" required title = "Account Name">
<option></option>
</select>';
    echo '</div>

<div class = "two">
<label>Amount</label>
<input pattern="([0-9]*[.,]*)+"  class="form-control input-medium" type = "number" name = "amount" min = "0" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>
<div class="two">
<label>Date  </label>';
    $time = new DateTime('now');
    $newtime = $time->modify('-1')->format('d-m-Y');
    echo'<input type="text"  name="date" data-date="' . $newtime . '" data-date-end-date="' . $newtime . '" class="form-control input-medium  date-picker"  data-date-format="dd-M-yyyy"  placeholder="Enter Transaction Date"  title="Enter Transaction Date"   />
    
</div>

<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>

<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . gmdate("dmyhisG") . '" />
<br><br><button  class="btn green"  name = "another">Adjust Shares</button>
</div>
</form>';
}

function sharestosacco() {
    echo '
<form method="post" action = "" autocomplete = "off">

<div class = "two">
<label>Member No.</label><br />
<select name = "mno" id="select2_sample4" onchange = "toSacco(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row1 = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row1['membernumber']) . '">' . getMembername($row1['membernumber']) . '-' . base64_decode($row1['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div class = "two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "apby" placeholder = "Approved by" title = "Approved by" required />
</div>



<div class = "two">
<label>From Account</label><br />
<select  class="form-control input-medium select2me"  name = "facc" id="facc4" required title = "Select FromAccount Name" data-placeholder="Select FromAccount Name">
<option></option></select>';
    echo '</div>
        
<div class = "two">
<label>Select To Account</label><br />
<select  class="form-control input-medium select2me"  name = "tacc" required data-placeholder="Select To Account" title = "Account Name">
<option></option>';
    $id = base64_encode(4);
    $qry1 = mysql_query("select * from glaccounts where accgroup='$id' ");

    while ($row4 = mysql_fetch_array($qry1)) {
        echo '<option value="' . ($row4['id']) . '">' . base64_decode($row4['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class = "two">
<label>Amount</label>
<input   class="form-control input-medium" type = "number" name = "amount" min = "0" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>

<div class = "two">
<label>Date  </label>';
    $time = new DateTime('now');
    $newtime = $time->modify('-1')->format('d-m-Y');
    echo'<input type="text"  name="date" data-date="' . $newtime . '" data-date-end-date="' . $newtime . '" class="form-control input-medium  date-picker"  data-date-format="dd-M-yyyy"  placeholder="Enter Transaction Date"  title="Enter Transaction Date"   />
 </div>
 
 <div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>


<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . gmdate("dmyhisG") . '" hidden required/>
<br><br><button  class="btn green"  name = "sacco">Adjust Shares</button>
</div>
</form>';
}

function userregistration() {
    echo '
<div class = "col-md-4">
<form class="form-horizontal" method = "post" action = "" enctype = "multipart/form-data" autocomplete = "off">

<div class = "form-group">
<label>First Name</label>
<input   class="form-control input-medium" type = "text" name = "fname" value = "' . $_REQUEST['fname'] . '" autofocus required = "required" placeholder = "Enter First Name" title = "Enter First Name" />
</div>
<div class = "form-group">
<label>Middle Name</label>
<input   class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['mname'] . '" placeholder = "Enter Middle Name" title = "Enter Middle Name" />

</div>
<div class = "from-group">
<label>Last Name</label>
<input   class="form-control input-medium" type = "text" name = "lname" value = "' . $_REQUEST['lname'] . '" required title = "Enter Last Name" placeholder = "Enter Last Name" />
</div>
<div class = "form-group">
<label>ID No.</label>
<input   class="form-control input-medium" type = "text" name = "idno" value = "' . $_REQUEST['idno'] . '" placeholder = "Enter Id No." title = "Enter Id No." />
</div>
<div class = "form-group">
<label>Mobile</label>
<input   class="form-control input-medium" type = "text" name = "mobile" value = "' . $_REQUEST['mobile'] . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number" />
</div>
<div class = "form-group">
<label>Email Address</label>
<input   class="form-control input-medium" type = "email" name = "email" value = "' . $_REQUEST['email'] . '" placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
</div>
<div class="col-md-4 col-md-offset-2">
<div class = "form-group">
<label>Username.</label>
<input   class="form-control input-medium" type = "text" name = "uname" value = "' . $_REQUEST['uname'] . '" required placeholder = "Enter a Unique Username" title = "Enter a Unique Username"/>
</div>
<div class = "form-group">
<label>Password</label>
<input   class="form-control input-medium" id="password" type = "text" onkeyup="return passwordChanged();" name = "password" value = "' . $_REQUEST['password'] . '" placeholder = "Enter a Unique Password" title = "Enter a Unique Password"/>
 <span id="strength"></span>
 
</div>
<div class = "form-group">
<label>user Level</label>
<select  class="form-control input-medium"  name = "ulevel" title = "Select user group" required>
<option></option>';
    $qry = mysql_query('select * from usergroups where status = "' . base64_encode("Active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['user']) . '</option>';
    }
    echo '</select>
</div>
<div class = "form-group">
<label>Status</label>
<select  class="form-control input-medium"  name = "status" require title = "Select user status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
<div class = "form-group">
<label>Picture</label>
<input  type = "file" name = "image" title = "Choose image from folder"/>
</div>
<div class = "form-group">
<label>Comments</label>
<textarea  class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
<div class = "form-actions fluid">
<button type="submit"  class="btn green"  name = "submit">Save</button>
</form>
<form method="post" action = "">
<button  class="btn green pull-right"  name = "edit">Edit</button>
</form>
</div>

</div>
</div>
';
}

function editusers() {

    $Rows = mysql_query('select * from users order by id') or die(mysql_error());

    echo '<table aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" >
<tr>
<th class="style">First Name</th>
<th class="style">Last Name</th>
<th class="style">User-level</th>
<th class="style">Status</th>
<th class="style">Edit</th>
</tr>';

    while ($row = mysql_fetch_array($Rows)) {

        echo '<tr>
<td class="style">' . base64_decode($row['fname']) . '</td>
<td class="style">' . base64_decode($row['lname']) . '</td>
<td class="style">' . base64_decode(usergroupname(base64_decode($row['userlevel']))) . '</td>
<td class="style">' . base64_decode($row['status']) . '</td>
<td class="style"> <a href = "adminusers.php?aid=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>
</tr>';
    }

    echo '</table>';
}

function useredit($user, $id, $fname, $mname, $lname, $idno, $username, $password, $email, $mobile, $picture, $userlevel, $status, $comments) {
    echo '
<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "off">

<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<img src = "photos/' . $picture . '" width = "100px" height = "100px"/>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "col-md-10" >
<input type = "hidden"  name = "id" value = "' . $id . '"/>

<div class = "col-md-4">
<label>First Name</label>
<input   class="form-control input-medium" type = "text" name = "fname" value = "' . $fname . '" autofocus required = "required" placeholder = "Enter First Name" title = "Enter First Name" />
</div>
<div class = "col-md-4">
<label>Middle Name</label>
<input   class="form-control input-medium" type = "text" name = "mname" value = "' . $mname . '" placeholder = "Enter Middle Name" title = "Enter Middle Name" />

</div>
<div class = "col-md-4">
<label>Last Name</label>
<input   class="form-control input-medium" type = "text" name = "lname" value = "' . $lname . '" required title = "Enter Last Name" placeholder = "Enter Last Name"/>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "col-md-7">

<div class = "two">
<label>ID No.</label>
<input   class="form-control input-medium" type = "text" name = "idno" value = "' . $idno . '" placeholder = "Enter Id No." title = "Enter Id No." />
</div>
<div class = "two">
<label>Mobile</label>
<input   class="form-control input-medium" type = "text" name = "mobile" value = "' . $mobile . '"  placeholder = "Enter Mobile Number" title = "Enter Mobile Number"/>
</div>
<div class = "two">
<label>Email Address</label>
<input   class="form-control input-medium" type = "email" name = "email" value = "' . $email . '" placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
<div class = "two">
<label>Username.</label>
<input   class="form-control input-medium" type = "text" name = "username" value = "' . $username . '" required placeholder = "Enter Member No." title = "Enter Member No."/>
</div>
<div class = "two">
<label>Password</label>
<input   class="form-control input-medium" type = "text" name = "password" value = "' . $password . '" placeholder = "Enter Town" title = "Enter Town"/>
</div>

</div><div class = "col-md-5" >
<div class = "two">
<label>user Level</label>
<select  class="form-control input-medium"  name = "ulevel" title = "Select user group" required>
<option></option>';
    $qry = mysql_query('select * from usergroups where status = "' . base64_encode("Active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['user']) . '</option>';
    }
    echo '</select>
</div>
<div class = "two">
<label>Status</label>
<select  class="form-control input-medium"  name = "status" require title = "Select user status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
<div class = "two">
<label>Picture</label>
<input   class="form-control input-medium" type = "file" name = "image" title = "Choose image from folder"/>
</div>
<div class = "two">
<label>Comments</label>
<textarea  class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $comments . '</textarea>
</div>

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<br><br><button  class="btn green"  name = "use">Save</button>
</div>

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
</div>
</div>
</form>
';
}

function meexport($gname) {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "gname" value = "' . $gname . '" required/>

<div class="col-md-4"><button  class="btn green"  name = "mexport" value = "word">Export to word</button></div>
</div>
</form>';
}

function export() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "export" value = "excel">Export to excel</button></div>
</div>
</form>';
}

function exportstmt() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input  class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" />
<input  class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input  class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" />

<div class="col-md-4"><button  class="btn green"  class="btn green" name = "accstep" value = "word">Export to word</button></div>
</div>
</form>';
}

function exportactivemember() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "exportactivemem" value = "excelactivemem">Export to excel</button></div>
</div>
</form>';
}

function exportinactivemember() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "exportinactivemem" value = "excel">Export to excel</button></div>
</div>
</form>';
}

function exportwithdrawnmember() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "exportwithdrawnmem" value = "excel">Export to excel</button></div>
</div>
</form>';
}

function exportaccount() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "exportaccount" value = "word">Export to word</button></div>

</div>
</form>';
}

function loanreportexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . $_REQUEST['view'] . '" />

<div class="col-md-4"><button  class="btn green"  name = "loanexp" value = "word">Export to word</button></div>
</div>
</form>';
}

function guarantorsexpo() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . $_REQUEST['view'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "guarantorsexpo" value = "word">Export to word</button></div>
</div>
</form>';
}

function amotexpo() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . $_REQUEST['view'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "amortexpo" value = "word">Export to word</button></div>
</div>
</form>';
}

function guaranteedexpo() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">
<input   class="form-control input-medium" type = "hidden" name = "tid" value = "' . $_REQUEST['view'] . '" />

<div class="col-md-4"><button  class="btn green"  name = "guaranteedexpo" value = "word">Export to word</button></div>
</div>
</form>';
}

function vehicleexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "vexport" value = "word">Export to word</button></div>
</div>
</form>';
}

function vehicleexpor() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "cexport" value = "word">Export to word</button></div>
</div>
</form>';
}

function loansexport() {
    echo
    '<form method="post" action = "export.php" autocomplete = "off">
        <div class="col-md-4">
<button  class="btn green"  name = "lexport" value = "word">Export to word</button>
</div>
</form>';
}

function incomeexport() {
    echo '
<div class = "row">
<form method="post" action = "export.php" autocomplete = "off">
<div class="col-md-3"><button  class="btn green"  name = "iexport" value = "word">Export to word</button></div>


</form>
</div>
';
}

function expeexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-3"><button  class="btn green"  name = "eexport" value = "word">Export to Word</button></div>

</div>

</form>';
}

function feedexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<button  class="btn green"  name = "fexport" value = "word">Export to word</button>
</form>';
}

function bookcashexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "bookcashex" value = "word">Export to word</button></div>
</div>
</form>';
}

function trialexpo() {
    echo '<form method="post" action = "export.php" autocomplete = "off">


<div class="col-md-3"><button  class="btn green"  name = "trialexp" value = "word">Export to word</button></div>

</form>';
}

function balanceexpo() {
    echo '<form method="post" action = "export.php" autocomplete = "off">


<div class="col-md-3"><button  class="btn green"  name = "balanceexp" value = "word">Export to word</button></div>

</form>';
}

function inspectionexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "epexport" value = "word">Export to word</button></div>
</div>
</form>';
}

function bankingexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "bankingexp" value = "word">Export to word</button></div>
</div>
</form>';
}

function viewwith() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">
<br><br><div class="col-md-5"><button  class="btn green"  name = "viewwith" value = "word">Export to word</button></div>
</div>
</form>';
}

function auditexp() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "col-md-8">

<div class="col-md-4"><button  class="btn green"  name = "auditex" value = "word">Export to word</button></div>
</div>
</form>';
}

function accountstatementexp() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input  class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" />
<input  class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input  class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" />

<div class="col-md-4"><button  class="btn green"  class="btn green" name = "accstep" value = "word">Export to word</button></div>
</div>
</form>';
}

function exportsumstmt() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input  class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" />
<input  class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input  class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" />

<div class="col-md-4"><button  class="btn green"  class="btn green" name = "sumstmt" value = "word">Export to word</button></div>
</div>
</form>';
}

function generalstate() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input  class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" />
<input  class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input  class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" />

<div class="col-md-4"><button  class="btn green"  class="btn green" name = "jay" value = "word">Export to word</button></div>
</div>
</form>';
}

function expdiv() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "yfrom" value = "' . $_REQUEST['yfrom'] . '" />
<div class="col-md-4"><button  class="btn green"  name = "divrep" value = "word">Export to word</button></div>
</div>
</form>';
}

function expdaily() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">

<input   class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>



</form>';
}

function dynapet() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "dynap" value = "word">Export to word</button></div>
</div>
</form>';
}

function divexp() {
    echo '<form method = "post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" />

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "divexp" value = "word">Export to word</button></div>
</div>
</form>';
}

function expjournal() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" hidden/>
<input   class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" hidden/>

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "expjournal" value = "word">Export to word</button></div>
</div>
</form>';
}

function injournal() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden" name = "mno" value = "' . $_REQUEST['mno'] . '" hidden/>
<input   class="form-control input-medium" type = "hidden" name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" hidden/>

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "injournal" value = "word">Export to word</button></div>
</div>
</form>';
}

function pandlexp() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "two">
<input   class="form-control input-medium" type = "hidden"  name = "datefrom" value = "' . $_REQUEST['datefrom'] . '" hidden/>

<input   class="form-control input-medium" type = "hidden" name = "dateto" value = "' . $_REQUEST['dateto'] . '" hidden/>

<div class="col-md-4"><button  class="btn green"  name = "pandlexp" value = "word">Export to word</button></div>
</div>
</form>';
}

function viewvehicles() {

    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead>
<tr>
<th>Member No.</th>
<th>Member Name</th>
<th>Vehicle Reg No.</th>
<th>Fleet No.</th>
<th>Nick Name</th>
<th>Vehicle Type</th>
<th>Operation Route</th>
<th>Capacity</th>
</tr>

</thead><tbody>';

    $Rows = mysql_query("SELECT * FROM newvehicle order by primarykey desc ");
    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td>' . base64_decode($Row['memberno']) . '</td>
    <td>' . getMembername(($Row['memberno'])) . '</td>
<td>' . base64_decode($Row['vehicleregno']) . '</td>
<td>' . base64_decode($Row['fleet']) . '</td>
<td>' . base64_decode($Row['nickname']) . '</td>
<td>' . base64_decode($Row['vehicletype']) . '</td>
<td>' . base64_decode($Row['operationroute']) . '</td>
<td>' . base64_decode($Row['capacity']) . '</td>
</tr>';
    }
    echo '</tbody></table></div>';
}

function viewcontributions($mno) {
//sample_2_info
    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead>
<tr><th colspan="10"><h3 align="center"><b>View Contributions For ' . ($mno) . ' ' . getMembername(base64_encode($mno)) . '</b></h3></th></tr>
<tr><th>Receipt No</th><th>Payment Type</th><th>Payee</th><th>Transaction</th><th>Amount</th><th>From</th><th>To</th><th>Date</th>
</tr></thead><tbody> ';

//to make pagination

    $Rows = mysql_query("SELECT * FROM membercontribution   WHERE  memberno='" . base64_encode($mno) . "'   order by primarykey DESC ");

    while ($Row = mysql_fetch_array($Rows)) {

        if (base64_decode($Row['transaction']) == 'Fx' . getFixedDepoId()) {
            $transacti = getFixedDepoName(getFixedDepoId());
        } else {
            $transacti = getglacc(base64_decode($Row['transaction']));
        }
        echo'<tr>
<td>' . base64_decode($Row['payeeid']) . '</td>';
        if (is_numeric(base64_decode($Row['paymenttype']))) {
            echo'<td class="numeric">' . paytype(base64_decode($Row['paymenttype'])) . '</td>';
        } else {
            echo'<td class="style">' . base64_decode($Row['paymenttype']) . '</td>';
        }
        echo'<td>' . ucwords(strtolower(base64_decode($Row['payee']))) . '</td>
<td>' . $transacti . '</td>
<td> ' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . base64_decode($Row['datefrom']) . '</td>
<td>' . base64_decode($Row['dateto']) . '</td>
<td>' . base64_decode($Row['date']) . '</td>
</tr>';
    }
    echo '</tbody></table></div>';
}

function viewbalbf() {
    echo '<div id="mt">
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr><th colspan="6"><h3 align="center"><b> Balance b/f Reports  </b></h3></th></tr>
<tr><th>Member Name</th>
<th>Member No.</th>
<th>Shares B/f</th>
<th>Loan B/f</th>
<th>Comments</th>
<th>date</th>
</tr>

</thead>';

    $Rows = mysql_query("SELECT * FROM sharesbf order by id desc ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo' <tr>
<td>' . getMembername(($Row['memberno'])) . '</td>
<td>' . base64_decode($Row['memberno']) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['sharesbf']), 2) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['loanbf']), 2) . '</td>
<td>' . base64_decode($Row['comments']) . '</td>
<td>' . base64_decode($Row['date']) . '</td>
</tr>';
    }
    echo '</table></div>';
}

function viewloans() {
    echo '<div id="mt"><table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr> <th colspan="6"> <h3 align="center"> <b> Loans   </b></h3></th>   </tr>
<tr>
<th>Member Name</th>
<th>Member No.</th>
<th>Loan Type</th>
<th>Amount</th>
<th>First Repayment</th>
<th>Terms</th>
</tr>

</thead>';
//to make pagination
    $statement = "`loanapplication`";
    $Rows = mysql_query("SELECT * FROM loanapplication order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($lrstl['amount']), 2) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($lrstl['monthlypayment']), 2) . '</td>
<td>' . base64_decode($Row['installments']) . '</td>
</tr>';
        }
    }
    echo '</table></div>';
}

function loans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr> <th colspan="7"> <h3 align="center"> <b>Successful Loans  </b></h3></th>   </tr>
<tr>
<th>Member No.</th> <th>Member Name</th> <th>Loan</th> <th>Monthly Repayments</th> <th>Date</th> <th>Status</th> <th>Amount</th>
</tr></thead><tbody>';

    $Rows = mysql_query("SELECT * FROM loandisburse order by id desc");
    while ($Row = mysql_fetch_array($Rows)) {

        echo' <tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . (getMembername($Row['membernumber'])) . '</td>
<td>' . (loanname($Row['transid'])) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['monthlypayment']), 2) . '</td>
<td>' . (base64_decode($Row['date'])) . '</td>
<td>' . ucwords(strtolower(base64_decode($Row['status']))) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
</tr>';
        $hart+=base64_decode($Row['amount']);
    }

    echo '</tbody><tfoot><tr><td colspan = "5"></td><td>Total</td><td>' . getsymbol() . ' ' . number_format($hart, 2) . '</td></tr>';
    echo '</tfoot></table></div>';
}

function viewincome($mno) {
    $mytable = '<div id="mt">

<table  class="table table-striped  table-bordered table-hover sorting_asc_enabled"  id="sample_2">
<thead  class="style">
<tr><th colspan="9">  <h3 align="center">  <b> Income Reports</b></h3></th></tr>

<tr><th>Receipt Number</th>
<th>Payee</th>
<th>Payee ID</th>
<th>Transaction Name</th>
<th>Payment Type</th>
<th>Approved By</th>
<th>Amount</th>
<th>Date</th></tr>
</thead>'; //where paymentype!='" . base64_encode("adjustments") . "'
    $statement = "`paymentin`";
    $Rows = mysql_query("SELECT * FROM {$statement} order by primarykey asc ");

    while ($Row = mysql_fetch_array($Rows)) {


        $mytable.=' <tr >';
        if (is_numeric(base64_decode($Row['transid']))) {
            $mytable.='<td class="numeric">' . loanname(($Row['transid'])) . '</td>';
        } else {
            $mytable.='<td class="numeric">' . base64_decode($Row['transid']) . '</td>';
        }

        $mytable.='<td class="numeric">' . ucwords(strtolower(base64_decode($Row['paidby']))) . '</td>
<td class="numeric">' . base64_decode($Row['payeeid']) . '</td>
<td class="numeric">' . getGlname(base64_decode($Row['transname'])) . '</td>';
        if (is_numeric(base64_decode($Row['paymentype']))) {
            $mytable.='<td class="numeric">' . paytype(base64_decode($Row['paymentype'])) . '</td>';
        } else {
            $mytable.='<td class="numeric">' . base64_decode($Row['paymentype']) . '</td>';
        }
        $mytable.='<td class="numeric">' . ucwords(strtolower(base64_decode($Row['approvedby']))) . '</td>
<td class="numeric">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
        <td class="numeric">' . base64_decode($Row['date']) . '</td>
</tr>';
    }
    $mytable.= '</table></div>';
    echo $mytable;
}

function viewinsurance() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<thead class = "style">
<tr>
<th >TransactionName</th>
<th >Amount</th>
<th >Payment Type</th>
<th >Approved By</th>
<th >Status</th>
<th >Payee</th>
<th >Payee ID</th>
</tr>

</thead>';
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = (mysql_real_escape_string($page) * $limit) - $limit;
//to make pagination
    $statement = "`paymentin`";
    $Rows = mysql_query("SELECT * FROM insurancefees order by primarykey desc LIMIT {$startpoint} , {$limit}");

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td >' . base64_decode($Row['transname']) . '</td>
<td >' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td >' . base64_decode($Row['paymentype']) . '</td>
<td >' . base64_decode($Row['approvedby']) . '</td>
<td >' . base64_decode($Row['status']) . '</td>
<td >' . base64_decode($Row['paidby']) . '</td>
<td >' . base64_decode($Row['payeeid']) . '</td>
</tr>';
    }
    echo '</table>
';
}

function viewexpenses() {
    echo '<div id="mt">
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead class = "style">
<tr><th colspan="8">  <h3 align="center"><b>Expenses Reports </b></h3></th></tr>
<tr><th class = "style">TransactionName</th>
<th class = "style">Amount</th>
<th class = "style">Payment Type</th>
<th class = "style">Approved By</th>
<th class = "style">Status</th>
<th class = "style">Receiver</th>
<th class = "style">Reasons</th>
<th class = "style">Date</th>
</tr>

</thead>';

    $Rows = mysql_query("SELECT * FROM paymentout  order by primarykey desc ");

    while ($Row = mysql_fetch_array($Rows)) {

        echo' <tr>
<td>' . getGlname(base64_decode($Row['transname'])) . '</td>
<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>';
        if (is_numeric(base64_decode($Row['paymentype']))) {
            echo'<td class="numeric">' . paytype(base64_decode($Row['paymentype'])) . '</td>';
        } else {
            echo'<td>' . ucwords(strtolower(base64_decode($Row['paymentype']))) . '</td>';
        }
        echo'<td>' . ucwords(strtolower(base64_decode($Row['approvedby']))) . '</td>
<td>' . ucwords(strtolower(base64_decode($Row['status']))) . '</td>
<td>' . ucwords(strtolower(base64_decode($Row['receiver']))) . '</td>
<td>' . ucwords(strtolower(base64_decode($Row['reasons']))) . '</td>
<td>' . base64_decode($Row['date']) . '</td>
</tr>';
    }
    echo '</table></div>';
}

function viewinspection() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<thead class = "style">
<tr>
<th class = "style">Inspection Date</th>
<th class = "style">Vehicle Reg No.</th>
<th class = "style">Body Works</th>
<th class = "style">Tyres</th>
<th class = "style">Status</th>
<th class = "style">Findings</th>
<th class = "style">Recommendations</th>
<th class = "style">Comments</th>
</tr>

</thead>';

    $Rows = mysql_query("SELECT * FROM vehicleinspection order by primarykey desc ");
//$Rows = mysql_query('SELECT * FROM vehicleinspection');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['inspectiondate']) . '</td>
<td class = "style">' . base64_decode($Row['vehicleregno']) . '</td>
<td class = "style">' . base64_decode($Row['bodyworks']) . '</td>
<td class = "style">' . base64_decode($Row['tyres']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['findings']) . '</td>
<td class = "style">' . base64_decode($Row['recommendations']) . '</td>
<td class = "style">' . base64_decode($Row['comments']) . '</td>
</tr>';
    }
    echo '</table>';
}

function permissionform() {
    
}

function usergroupform() {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Group Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "ugroup" autofocus required placeholder = "Enter Group Name" title = "Enter Group Name"/>
<label>Status</label>
<select class = "form-control input-medium" name = "status" required title = "Enter Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
<label>Comments</label>
<textarea class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<br><br><button class = "btn green" name = "save">Save</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

//******************register periodicity of paymeny*******//
function periodicityform() {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Name of period</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "period" autofocus required placeholder = "Enter period Name" title = "Enter Period Name"/>
<label>Frequency within a year</label>
<input type="text" pattern="([0-9]*)+"class = "form-control input-medium" name = "freq" placeholder = "Enter days" title = "Enter number of days" required="true" />
<br><br><button class = "btn green" name = "save">Save</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

//************end of periodicty of payment form*********//

function balancebfform() {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">

<label>Search Member No. or Name</label><br />
<select name = "searchmno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control    ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>


<div id = "txtHint">

<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['mname'] . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>

</div>

<label>Shares BF</label>
<input class = "form-control input-medium" type = "number" name = "sharesbf" placeholder = "Enter Shares Brought Forward" title = "Enter Shares Brought Forward" min = "0"/>
<label>Loan BF</label>
<input class = "form-control input-medium" type = "number" name = "loan" placeholder = "Enter Loan Brought Forward" title = "Enter Loan Brought Forward" min = "0"/>
<label>Date  </label>
<input type="text" name="date" required  placeholder="Enter Date"  title="Enter Date"   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  />
<label>Comments</label>
<textarea class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<input class = "form-control input-medium" type = "hidden" name = "tid" value = "' . gmdate("dmyhisG") . '" hidden required/>
<br><br><button class = "btn green" name = "sharessub">Save</button>
</form>
<form action = "" method="post">
<button class = "btn green" name = "sharesedit">Edit</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

function editbalancebfform($user, $id, $mno, $balf, $loanf, $comm) {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">


<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "hidden" name = "id"  value = "' . ($id) . '" required/>

<label>Search Member No. or Name</label>
<select name = "searchmno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="form-control select2   input-medium">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    

<div id = "txtHint">

<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['mname'] . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>

</div>

<label>Shares BF</label>
<input class = "form-control input-medium" type = "number" name = "sharesbf" value = "' . ($balf) . '" placeholder = "Enter Shares Brought Forward" title = "Enter Shares Brought Forward" min = "0"/>
<label>Loan BF</label>
<input class = "form-control input-medium" type = "number" name = "loanbf" value = "' . ($loanf) . '" placeholder = "Enter Loan Brought Forward" title = "Enter Loan Brought Forward" min = "0"/>
<label>Date  </label>
<input type="text" name="date" required  placeholder="Enter Date"  title="Enter Date"   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  />
<label>Comments</label>
<textarea class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . ($comm) . '</textarea>
<br><br><button class = "btn green" name = "sace">Save</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

function editkinform($user, $id, $mno, $fname, $mname, $lname, $rel, $idno, $mobile, $img, $comm) {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">


<input type = "hidden" name = "nxid" hidden value = "' . ($id) . '" required/>

<label>Member Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "mno" value = "' . ($mno) . '" required/>

<label>First Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "fname" value = "' . (($fname)) . '" required/>

<label>Middle Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "mname" value = "' . (($mname)) . '" />

<label>Last Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "lname" value = "' . (($lname)) . '" />

<label>Relationship</label>
<input class = "form-control input-medium" type = "text" name = "relationship" value = "' . (($rel)) . '" required/>
<label>ID Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "number" name = "idno" value = "' . ($idno) . '" />

<label>Mobile Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "number" name = "mobile" value = "' . ($mobile) . '" />

<label>Attach Image/File</label>
<input class = "form-control input-medium" type = "file" name = "image" value = "' . ($img) . '" />

<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . ($comm) . '</textarea>
<br><br><button class = "btn green" name = "cbace">Save</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div>';
}

function sharesedit() {
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead class = "style">
<tr>
<th class = "style">Member No</th>
<th class = "style">Member Name</th>
<th class = "style">Shares B/f</th>
<th class = "style">Loan B/f</th>
<th class = "style">Comments</th>
<th class = "style">Date</th>
<th class = "style">Status</th>
<th class = "style">Edit</th>
<th class = "style">Delete</th>
</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM sharesbf');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['memberno']) . '</td>
<td class = "style">' . getMembername($Row['memberno']) . '</td>
<td class = "style">' . base64_decode($Row['sharesbf']) . '</td>
<td class = "style">' . base64_decode($Row['loanbf']) . '</td>
<td class = "style">' . base64_decode($Row['comments']) . '</td>
    <td class = "style">' . base64_decode($Row['date']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style"> <a onClick="' . $confirmedit . '" href = "balancebf.php?sid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
<td class = "style"> <a onClick="' . $confirmedit . '" href = "balancebf.php?sdel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td>
</tr>';
    }
    echo '</table>
';
}

function nextofkinedit() {
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="">
<thead>
<tr>
<th class = "style">Member No</th>
<th class = "style">Member Name</th>
<th class = "style">First Name</th>
<th class = "style">Middle Name</th>
<th class = "style">Last Name</th>
<th class = "style">Mobile</th>
<th class = "style">Relationship</th>
<th class = "style">ID Number</th>
<th class = "style">Percentage</th>
<th class = "style">Status</th>
<th class = "style">Comments</th>
<th class = "style">Edit</th>
<th class = "style">Drop</th>
</tr>

</thead><tbody>';
    $Rows = mysql_query('SELECT * FROM nextofkin');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['memberno']) . '</td>
<td class = "style">' . getMembername($Row['memberno']) . '</td>
<td class = "style">' . base64_decode($Row['fname']) . '</td>
<td class = "style">' . base64_decode($Row['mname']) . '</td>
<td class = "style">' . base64_decode($Row['lname']) . '</td>
    <td class = "style">' . base64_decode($Row['mobile']) . '</td>
<td class = "style">' . base64_decode($Row['relationship']) . '</td>
<td class = "style">' . base64_decode($Row['idno']) . '</td>
    <td class = "style">' . base64_decode($Row['percentage']) . '</td>
        <td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['comments']) . '</td>
<td class = "style"> <a href = "nextofkinedit.php?sid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
<td class = "style"> <a href = "nextofkinedit.php?vvdel=' . $Row['id'] . '" ><img src = "images/delete.png"></a></td>
</tr>';
    }
    echo '</tbody></table>
';
}

function liabilitiesform() {
    echo '
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<form action = "" method="post" autocomplete = "off">
<label>Capital & Liability Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "lname" autofocus required placeholder = "Enter Capital Or Liability Name" title = "Enter Capital Or  Liability Name" />
<label>Select Account</label><br />
<select  class="form-control input-medium Select2me"  name = "account" required data-placeholder="Select Account" title = "Select Account">
<option></option>';
    $me = 2;
    $query = mysql_query(" SELECT * FROM glaccounts  WHERE   	accgroup='" . base64_encode($me) . "'    ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . ($row['id']) . '">' . (base64_decode($row['acname'])) . '</option>';
    }
    echo'</select><br />
<label>Capital Or  Liability amount</label>
<input class = "form-control input-medium" type = "number" name = "lamount" required placeholder = "Enter Capital Or liability Amount" title = "Enter Libility Value" />

<label>Status</label>
<br />
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" data-placeholder="Select Account status" class = "form-control input-medium select2me" name = "status" required title = "Select Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select><br />
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<br><button class = "btn green" name = "liab">Save</button>
</form>
<form action = "" method="post" autocomplete = "off">
<button class = "btn green" name = "liabedit">Edit</button>
</form>
</div>
</div>
<!--<div class = "art-layout-cell" style = "width: 50%" >
</div>-->
</div>
</div></div>
</div>';
}

function expensejournal($user, $datefrom, $dateto) {
    echo '<div id="mt1">
 <table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="6"><h3 align="center"><b> Expenses Journal  </b></h3></th></tr>
<tr><th class = "style">Total</th><td class="numeric"><td class="numeric"></td></td><td class = "style"><center>' . getsymbol() . ' ' . number_format(expensejournaltotal($user, $datefrom, $dateto), 2) . '</center></td></tr>

<tr><th class = "style">Date</th><th class = "style">Transaction Details</th><th class = "style">Cheque No.</th><th class = "style">Amount</th><th class = "style">Tax</th><th class = "style">Expenses</th></tr>';
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        echo '<span class = "red">Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {
            $expqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($exprslt = mysql_fetch_array($expqry)) {
                $total+=amount($exprslt['amount']);

                echo '<tr>
<td class = "style">' . base64_decode($exprslt['date']) . '</td>
<td class = "style">' . base64_decode($exprslt['transname']) . ' paid in ' . base64_decode($exprslt['paymentype']) . ', Cheque No. ' . base64_decode($exprslt['chequeno']) . ', ' . base64_decode($exprslt['comments']) . '</td>
<td class = "style">' . base64_decode($exprslt['chequeno']) . '</td>
<td class = "style">' . getsymbol() . '.' . number_format(amount($exprslt['amount']), 2) . '</td>
<td class = "style">' . getsymbol() . ' 0.00</td>
<td class = "style">' . getGlname(base64_decode($exprslt['transname'])) . '</td>
</tr>';
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
        echo ' <tr>
<th colspan = "3">Total</th>
<td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td>
<td colspan = "2"></td></tr>';
        echo '</table></div>';
    }
}

function incomejournal($user, $datefrom, $dateto) {

    echo '<div id="mt2">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="6"><h3 align="center"><b> Income Journal  </b></h3></th></tr>
<tr><th class = "style">Total</th><td class="numeric"><td class="numeric"></td></td><td class = "style"><center>' . getsymbol() . ' ' . number_format(incomejournaltotal($user, $datefrom, $dateto), 2) . '</center></td></tr>
<tr><th class = "style">Date</th><th class = "style">Transaction Details</th><th class = "style">Amount</th><th class = "style">Tax</th><th class = "style">Revenue</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    $total = 0;
    if ($t < $s) {
        echo '<span class = "red">Sorry Please enter search dates correctly</span></br>';
    } else {
        while ($s <= $t) {
            $expqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '" and date!=""') or die(mysql_error());

            while ($exprslt = mysql_fetch_array($expqry)) {


                echo '<tr>
<td class = "style">' . base64_decode($exprslt['date']) . '</td>
<td class = "style">' . base64_decode($exprslt['transname']) . ', ' . base64_decode($exprslt['comments']) . '</td>
<td class = "style">' . getsymbol() . '.' . number_format(amount($exprslt['amount'], 2)) . '</td>
<td class = "style">' . getsymbol() . ' 0.00</td>
<td class = "style">' . getGlname(base64_decode($exprslt['transname'])) . '</td>
</tr>';

                $total+=amount($exprslt['amount']);
            }

            $s = $s + 86400;
        }

        echo ' <tr>
<th colspan = "2">Total</th>
<td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td>
<td colspan = "2"></td></tr>';
        echo '</table></div>';
    }
}

function dateform() {
    echo '
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "row">
<form action = "" method = "post" autocomplete = "off">

<div class = "col-md-5 ">

<div class="form-group">
<label class="control-label col-md-3">Date Range</label>
<div class="col-md-6">
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>

</div>
</div>
<div class="col-md-offset-2 col-md-4">
<br />
<button class = "btn green" name ="sdate">Generate</button>

</div>
</div></form>
</div>
</div>';
}

function profitandlosexpenseform($user, $datefrom, $dateto) {

    echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover">
<thead>
<tr><th colspan="5"><h3 align="center"><b> Profit And Loss Account  As At ' . $datefrom . '  To  ' . $dateto . ' </b></h3></th></tr>
<tr>
<th>Account Number</th><th> Account Name</th><th>Debit</th><th>Credit</th> 
</tr>
</thead>
<tbody>';

    $sth = mysql_query("SELECT * FROM  glaccounts WHERE  accgroup='" . base64_encode(4) . "'  or accgroup='" . base64_encode(5) . "' ");
    while ($row = mysql_fetch_array($sth)) {
        $income = incomeandexpenses($row['id'], base64_encode(4), $datefrom, $dateto);
        $expenses = incomeandexpenses($row['id'], base64_encode(5), $datefrom, $dateto);
        $b = (int) $income - (int) $expenses;
        if ($b != 0) {
            if (base64_decode($row['accgroup']) == 4) {

                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($income, 2) . '</td><td></td></tr>';
                $inc +=$income;
            } else {

                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($expenses, 2) . '</td></tr>';
                $exp +=$expenses;
            }
        }
    }


    $incom = 0 + $inc;
    $expens = 0 + $exp;

    if ($incom > $expens) {
        $bal = $incom - $expens;
        echo'<tr> <td><td>Net Profit</td><td><td>  <h5><b>' . getsymbol() . ' ' . number_format($bal, 2) . ' </b></h5> </td>   </tr>';

        echo'<tr><td colspan="2"><h5 align="right"><b> Total Amount </b></h5></td><td><h5><b>' . getsymbol() . ' ' . number_format($incom, 2) . ' </b></h5> </td> <td><h5><b>' . getsymbol() . ' ' . number_format($incom, 2) . ' </b></h5> </td>    </tr>';
    } else {
        $bal = $expens - $incom;
        echo'<tr> <td>1200<td>Net Loss</td><td>  <h5><b>' . getsymbol() . ' ' . number_format($bal, 2) . ' </b></h5> </td><td>   </tr>';

        echo'<tr><td colspan="2"><h5 align="right"><b> Total Amount </b></h5></td><td><h5><b>' . getsymbol() . ' ' . number_format($expens, 2) . ' </b></h5> </td> <td><h5><b>' . getsymbol() . ' ' . number_format($expens, 2) . ' </b></h5> </td>    </tr>';
    }
    echo'<tr><td colspan="4"><h5 align="right"><b>Printed On ' . date('d-M-Y') . ' </b></h5> </td>   </tr></tbody></table></div>';
}

function communication() {
    echo '
<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >

<form method="post" action = "" autocomplete = "off">
<div class = "two">
<label>Member Number</label>
<select name = "number" id="select2_sample4" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>

<label>Subject</label>
<input class = "form-control input-medium" type = "text" name = "subject" required placeholder = "Enter Subject" title = "Enter Subject"/>

<label>Message Body</label>
<textarea class = "form-control input-medium" name = "body" placeholder = "Enter Message Body" title = "Enter Message Body"></textarea>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<button class = "btn green" name = "submit">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function incomereceipt($user, $tid, $tname, $amount, $ptype, $apby, $payee, $payeeid, $comments, $session, $date) {
    $pt = mysql_query('SELECT * FROM paymentmode WHERE id = "' . $ptype . '"');
    $pay_t = mysql_fetch_array($pt);
    // $conqry = mysql_query('select * from membercontribution where session = "' . $session . '"') or die(mysql_error());
    $mnameqry = mysql_query('select * from newmember where membernumber = "' . base64_encode($payeeid) . '"') or die(mysql_error());
    $incqry = mysql_query('select * from paymentin where session = "' . $session . '"') or die(mysql_error());
    $mnamerslt = mysql_fetch_array($mnameqry);
    //get default savings and shares account balances
    $defaultSavingsAccBal = number_format(comsaving($payeeid) - paymentinadjust($mno), 2);
    $defaultSharesAccBal = number_format(compshare($payeeid), 2);


    if ($date == 11) {
        $dub = "Duplicate Receipt For Transaction " . getglacc($tname);
    }
    $id = "javascript:Print('stylized')";
    echo '<div style="width:100%; margin:0 auto;>
	<body onload = "' . $id . '"><div id = "stylized">
<table id="sample_2" aria-describedby = "sample_2_info" width = "100%" style="font-family: Lucida Sans Typewriter;color:black;">
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
' . $dub . '<td colspan = "2"><center>
<div class = "art-layout-cell" style = "width: 80%" >
<img src = "photos/' . logo() . '" width = "70px" height = "80px"/>
</div></center>
</td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan = "2"><center>' . compname() . '</center>
</td>
</tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>' . address() . '</center></td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>' . gmdate("d-m-y h:i:s G") . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>' . getglacc($tname) . ' Receipt Number ' . $tid . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">Payee: ' . $payee . '</td><td class = "style">P.ID/ Cheque No.: ' . $payeeid . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">Approved BY: ' . $apby . '</td><td class = "style">Payment Type: ' . base64_decode($pay_t['mode']) . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class = "style">Transaction</th><th class = "style">Amount</th></tr>';
    $total = 0;

    while ($row = mysql_fetch_array($conqry)) {
        echo '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">' . getglacc(base64_decode($row['transaction'])) . ', date:' . base64_decode($row['datefrom']) . ' to ' . base64_decode($row['dateto']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
        $total+=amount($row['amount']);
    }

    while ($row1 = mysql_fetch_array($incqry)) {
        echo '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">' . getglacc(base64_decode($row1['transname'])) . '</td><td class = "style">' . getsymbol() . ' ' . number_format(base64_decode($row1['amount']), 2) . '</td></tr>';
        $total+=amount($row1['amount']);
    }
    echo '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class = "style">Total</th><td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td></tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class = "style" colspan="2"><b>Account Balances:</b></th></tr>
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
    <th class = "style">' . getGlname(getdefaultsavingsaccount()) . '</th><th class = "style">' . $defaultSavingsAccBal . '</th>
    </tr>
    
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
    <th class = "style">' . getGlname(getdefaultsharesaccount()) . '</th><th class = "style">' . $defaultSharesAccBal . '</td>
     </tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>You were served by:' . servedby($user) . '</center></td></tr>
    <tr><td> <br/></td></tr>
  <tr><td> </br></td></tr>
 <tr style="font-variant:small-caps;font-style:normal;color:black;"><td><center>' . get_receipt_footer() . '</center> </td></tr>
</div></table>
</div><input class = "btn btn green" type = "submit" name = "btnPrint" value = "print" asp:Button ID = "btnPrint" runat = "server" onclick = "' . $id . '"/></body></div>';
    //insertReceipt($tid,"income",$date,$pdf);
    unset($_SESSION['session']);
    session_regenerate_id();
}

function expensereceipt($user, $tid, $tname, $amount, $ptype, $cheque, $apby, $recvr, $recvrid, $session, $date) {
    $total = 0;
    $id = "javascript:Print('stylized')";
    if ($date == 11) {
        $dub = "Duplicate Receipt For Transaction " . getglacc($tname);
    }
    echo '<div style="width:100%; margin:0 auto;>
	<body onload = "' . $id . '"><div id = "stylized">
<table id="sample_2" aria-describedby = "sample_2_info" width = "100%" style="font-family: Lucida Sans Typewriter;color:black;">
' . $dub . '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan = "3"><center>
<div class = "art-layout-cell" style = "width: 80%" >
<img src = "photos/' . logo() . '" width = "70px" height = "80px"/>
</div></center>
</td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan = "3"><center>' . compname() . '</center>
</td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "3"><center>' . address() . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "3"><center>Expense Receipt Number ' . $tid . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">Receiver: ' . $recvr . '</td><td colspan = "2" >ID/Phone: ' . $recvrid . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">Payment: ' . $ptype . '</td><td class = "style" colspan = "2">Approved by: ' . $apby . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class = "style">Transaction</th><th class = "style">Cheque</th><th class = "style">Amount</th></tr>';
    $qry = mysql_query('select * from paymentout where session = "' . $session . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class = "style">' . getglacc(base64_decode($row['transname'])) . '</td><td class = "style">' . base64_decode($row['chequeno']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
        $total+=base64_decode($row['amount']);
    }
    echo '
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th colspan = "2">Total</th><td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "3"><center>You were served by:' . servedby($user) . '</center></td></tr>
 <tr><td> <br/></td></tr>
  <tr><td> </br></td></tr>
 <tr style="font-variant:small-caps;font-style:normal;color:black;"><td><center>' . get_receipt_footer() . '</center> </td></tr>   
</div></table>
</div><input class = "btn btn green" type = "submit" name = "btnPrint" value = "print" asp:Button ID = "btnPrint" runat = "server" onclick = "' . $id . '"/></body></div>';
//insertReceipt($tid,"exp",$date,$pdf);
    unset($_SESSION['sess']);
    session_regenerate_id();
}

function getmembergroup() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Select Group Name</label><br />
<select class = "form-control input-medium select2me" name = "gname" required title = "Enter Group Name" data-placeholder="Select Group Name">
<option></option>';

    $hqry = mysql_query('select * from cgroup where status = "' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($hqry)) {
        echo '<option value = "' . $row['id'] . '">' . base64_decode($row['gname']) . '</option>';
    }

    echo '</select>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<br><br><br><br><button class = "btn green" class = "btn green" name = "gsubmit">Search</button>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
</form>
</div>
</div>
</div>
</div>';
}

function dailyform() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">
<div class="form-group">

<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
<!-- /input-group -->
<span class="help-block">
</span>
</div>
</div>
</div>
<div class = "col-md-3">

<button class = "btn green" name = "msubmit">Generate Statement</button>
</div>

</form>';
}

function monthlyform() {
    echo '
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<div class = "noprint">
<label>Month</label>
<select class = "form-control input-medium" name = "mfrom" title = "Select Month">
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>
</select>
<label>Year</label>
<select class = "form-control input-medium" name = "yfrom" title = "Select year">';
    for ($i = date("2000"); $i <= date("Y") + 2; $i++)
        if ($year == $i)
            echo "<option value='$i' selected>$i</option>";
        else
            echo "<option value='$i'>$i</option>";
    echo '</select>
</div>
</div>

<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<div class = "noprint">
<br><br><button class = "btn green" name = "msubmit">Generate Statement</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function yearlyform() {
    echo '
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<div class = "noprint">
<label>Select Year</label><br />
<select class = "form-control input-medium select2me" name = "yfrom" data-placeholder="Select Year" title = "Select year">
    <option></option>';
    for ($i = date("2000"); $i <= date("Y") + 2; $i++)
        if ($year == $i)
            echo "<option value='$i' selected>$i</option>";
        else
            echo "<option value='$i'>$i</option>";
    echo '</select>
</div>
</div>

<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<div class = "noprint">
<br><br><button class = "noprint btn green" name = "msubmit">Generate Statement</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function dailystatments($user, $datefrom, $dateto) {

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $acry = mysql_query('select * from glaccounts where accgroup = "' . base64_encode("2") . '" or accgroup = "' . base64_encode("3") . '"') or die(mysql_error());
            while ($row1 = mysql_fetch_array($acry)) {
                $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($row1['id']) . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($mqry)) {
                    $mtotal+=base64_decode($row['amount']);
                }
            }
            $inqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row3 = mysql_fetch_array($inqry)) {
                $intotal+=base64_decode($row3['amount']);
            }
            $exqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row2 = mysql_fetch_array($exqry)) {
                $extotal+=base64_decode($row2['amount']);
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }


    echo '<div id="mt"><table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "9" ><h3 align="center"><b>Daily Transactions</b></h3></th></tr>

<tr><th colspan="7" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan="7" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Contributions</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><td colspan="7" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Income</td><td class = "style">' . getsymbol() . '.' . number_format($intotal, 2) . '</td></tr>
<tr><td  colspan="7" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Expenses</td><td class = "style">' . getsymbol() . '.' . number_format($extotal, 2) . '</td></tr>

<tr><th class = "style">Receipt No</th><th class = "style">Member No</th><th class = "style">Payment Type</th><th class = "style">Payee</th><th class = "style">Transaction</th><th class = "style">From</th><th class = "style">To</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';


//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['payeeid']) . '</td><td class = "style">' . base64_decode($row['memberno']) . '</td><td class = "style">' . getpaytype(base64_decode($row['paymenttype'])) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td><td class = "style">' . getglacc(base64_decode($row['transaction'])) . '</td><td class = "style">' . base64_decode($row['datefrom']) . '</td><td class = "style">' . base64_decode($row['dateto']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $inqry1 = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row3 = mysql_fetch_array($inqry1)) {
                echo '<tr><td class = "style">' . base64_decode($row['transid']) . '</td><td class = "style">' . base64_decode($row3['payeeid']) . '</td><td class = "style">' . getpaytype(base64_decode($row3['paymentype'])) . '</td><td class = "style">' . base64_decode($row3['paidby']) . '</td><td class = "style">' . getglacc(base64_decode($row3['transname'])) . '</td><td class = "style">' . base64_decode($row3['date']) . '</td><td class = "style">' . base64_decode($row3['date']) . '</td><td class = "style">' . base64_decode($row3['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row3['amount']), 2) . '</td></tr>';
            }
            $exqry1 = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row21 = mysql_fetch_array($exqry1)) {
                echo '<tr><td class = "style">' . base64_decode($row21['receiverid']) . '</td> <td>' . base64_decode($row21['receiver']) . '</td>  	 		<td class = "style">' . getpaytype(base64_decode($row21['paymentype'])) . '</td><td class = "style">' . base64_decode($row21['approvedby']) . '</td><td class = "style">' . getglacc(base64_decode($row21['transname'])) . '</td><td class = "style">' . base64_decode($row21['date']) . '</td><td class = "style">' . base64_decode($row21['date']) . '</td><td class = "style">' . base64_decode($row21['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row21['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        $grand = $mtotal + $intotal + $stotal - $extotal;

        echo '<tr><td colspan = "7"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td></tr>';
    }

    echo '</table></div>';
    echo '<button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button>';
}

function dailyments($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

//utc of start and end dates
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $exqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row2 = mysql_fetch_array($exqry)) {
                $extotal+=base64_decode($row2['amount']);
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "3"><center>Expenses Statements</center></th></tr></table>
<table id="" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Expenses</td><td class = "style">' . getsymbol() . '.' . number_format($extotal, 2) . '</td></tr>
</table>
<form action = "" method="post" autocomplete = "off">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th class = "style">Expense Name</th><th class = "style">Receiver</th><th class = "style">Approved by</th><th class = "style">Payment Type</th><th class = "style">Purpose</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $exqry1 = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row21 = mysql_fetch_array($exqry1)) {
                echo '<tr><td class = "style">' . base64_decode($row21['transname']) . '</td><td class = "style">' . base64_decode($row21['receiver']) . '</td><td class = "style">' . base64_decode($row21['approvedby']) . '</td><td class = "style">' . base64_decode($row21['paymentype']) . '</td><td class = "style">' . base64_decode($row21['reasons']) . '</td><td class = "style">' . base64_decode($row21['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row21['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        $grand = $extotal;

        echo '<tr><td colspan = "5"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function dailystats($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $inqry = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row3 = mysql_fetch_array($inqry)) {
                $intotal+=base64_decode($row3['amount']);
            }

            $s = $s + 86400;
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "7"><center><h3><b>Income Statement</b></h3></center></th></tr>
<tr><th  colspan = "5" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan = "5" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Income</td><td class = "style">' . getsymbol() . '.' . number_format($intotal, 2) . '</td></tr>
<tr><th class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Transaction</th><th class = "style">Payment Type</th><th class = "style">Mode of Payment</th> <th>Date  </th>  <th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $inqry1 = mysql_query('select * from paymentin where paymentype!="' . base64_encode('adjustments') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row3 = mysql_fetch_array($inqry1)) {
                echo '<tr><td class = "style">' . base64_decode($row3['payeeid']) . '</td><td class = "style">' . base64_decode($row3['paidby']) . '</td><td class = "style">' . base64_decode($row3['transid']) . '</td><td class = "style">' . getglacc(base64_decode($row3['transname'])) . '</td><td class = "style">' . base64_decode($row3['paymentype']) . '</td><td class = "style">' . base64_decode($row3['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row3['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        $grand = $intotal;

        echo '<tr><td colspan = "5"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function daystatments($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $acry = mysql_query('select * from loansettings where status = "' . base64_encode("Active") . '"') or die(mysql_error());
            while ($row1 = mysql_fetch_array($acry)) {
                $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getglid(base64_decode($row1['lname']))) . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($mqry)) {
                    $mtotal +=base64_decode($row['amount']);
                }
            }
            $s = $s + 86400;
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt"><table id="" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable">
<tr><th colspan = "3"><h3 align="center"><b>Loan Repayment Statement</b></h3></th></tr></table>
<table id="" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >

<tr><th class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Loan Repayment</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
</table>


<form action = "" method="post" autocomplete = "off">

<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">Transaction</th><th class = "style">From</th><th class = "style">To</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    //utc of start and end dates
    $s = strtotime($datefrom);
    //$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $acry = mysql_query('select * from loansettings where status = "' . base64_encode("Active") . '"') or die(mysql_error());
            while ($rowc = mysql_fetch_array($acry)) {
                $xqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getglid(base64_decode($rowc['lname']))) . '"') or die(mysql_error());

                while ($row2 = mysql_fetch_array($xqry)) {
                    echo '<tr><td class = "style">' . base64_decode($row2['memberno']) . '</td><td class = "style">' . getMembername($row2['memberno']) . '</td><td class = "style">' . getpaytype(base64_decode($row2['paymenttype'])) . '</td><td class = "style">' . getglacc(base64_decode($row2['transaction'])) . '</td><td class = "style">' . base64_decode($row2['datefrom']) . '</td><td class = "style">' . base64_decode($row2['dateto']) . '</td><td class = "style">' . base64_decode($row2['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row2['amount']), 2) . '</td></tr>';
                }
            }
            $s = $s + 86400;


            $grand = $mtotal;
        }
        echo '<tr><td colspan = "6"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td></tr>';
    }
    echo '</table></div>
</div>
</div>';
    echo '<div class = "col-md-4"><div class = "noprint"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div></div>';
}

function offstatments($user, $mfrom, $yfrom) {

    $date = $mfrom . ' ' . $yfrom;

    $ary = mysql_query('select * from checkoff where date = "' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($ary)) {

        $grand+= base64_decode($row['contr']);
        $arand+= base64_decode($row['xmas']);
        $brand+= base64_decode($row['shares']);
        $crand+= base64_decode($row['entrance']);
        $mrand+= base64_decode($row['principle']);
        $yrand+= base64_decode($row['interest']);
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "col-md-10">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt"><table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "8"><h3 align="center"><b>Checkoff Statement</b></h3></th></tr>
<tr><th colspan = "6" class = "style">Month</th><th class = "style"></th><th class = "style">Year</th></tr>
<tr><td colspan = "1" class = "style"><center>' . $mfrom . '</center></td><th colspan = "2"  class = "style"><center>' . compname() . '</center></th><td colspan = "3" class = "style"><center>' . $yfrom . '</center></td></tr>
<tr><th class = "style">Member No</th><th class = "style">Member Name</th><th class = "style">Monthly Contribution</th><th class = "style">Xmas</th><th class = "style">Shares</th><th class = "style">Entrance Fees</th><th class = "style">Loan Amount</th><th class = "style">Interest Amount</th></tr>';


    $acry = mysql_query('select * from checkoff where date = "' . base64_encode($date) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($acry)) {
        echo '<tr><td class = "style">' . base64_decode($row2['mno']) . '</td><td class = "style">' . getMembername($row2['mno']) . '</td><td class = "style">' . number_format(base64_decode($row2['contr']), 2) . '</td><td class = "style">' . number_format(base64_decode($row2['xmas']), 2) . '</td><td class = "style">' . base64_decode($row2['shares']) . '</td><td class = "style">' . base64_decode($row2['entrance']) . '</td><td class = "style">' . base64_decode($row2['principle']) . '</td><td class = "style">' . base64_decode($row2['interest']) . '</td></tr>';
    }

    echo '<tr><td class = "style"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td><td class = "style">' . getsymbol() . '.' . number_format($arand, 2) . '</td><td class = "style">' . getsymbol() . '.' . number_format($brand, 2) . '</td><td class = "style">' . getsymbol() . '.' . number_format($crand, 2) . '</td><td class = "style">' . getsymbol() . '.' . number_format($mrand, 2) . '</td><td class = "style">' . getsymbol() . '.' . number_format($yrand, 2) . '</td></tr>';

    echo '</table></div>
</div>
</div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function diviport($user, $yfrom) {

    $date = $yfrom;

    $ary = mysql_query('select * from divimembers where year = "' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($ary)) {

        $grand+= base64_decode($row['dividend']);
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "3"><center>Dividend Report</center></th></tr>
<tr><th class = "style">Publish Date</th><th class = "style"></th><th class = "style">Year</th></tr>
<tr><td class = "style"><center>' . date('d-M-Y') . '</center></td><th class = "style"><center>' . compname() . '</center></th><td class = "style"><center>' . $date . '</center></td></tr>

<form action = "" method="post" autocomplete = "off">

<tr><th class = "style">Member No</th><th class = "style">Member Name</th><th class = "style">Dividend Amount</th></tr>';


    $acry = mysql_query('select * from divimembers where year = "' . base64_encode($date) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($acry)) {
        echo '<tr><td class = "style">' . base64_decode($row2['mno']) . '</td><td class = "style">' . getMembername($row2['mno']) . '</td><td class = "style">' . number_format(base64_decode($row2['dividend']), 2) . '</td></tr>';
    }

    echo '<tr><td class = "style"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($grand, 2) . '</td></tr>';

    echo '</table></div>
</div>
</div>';
    echo '<div class = "col-md-4"><div class="noprint"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div></div>';
}

function dstatements($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

//utc of start and end dates
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
//}

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "8"><center>' . getGlname(getdefaultsavingsaccount()) . ' Statements</center></th></tr>
<tr><th colspan = "6" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan = "6" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getGlname(getdefaultsavingsaccount()) . '</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>



<tr><th class = "style">Receipt No</th><th class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">From</th><th class = "style">To</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['payeeid']) . '</td><td class = "style">' . base64_decode($row['memberno']) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td><td class = "style">' . base64_decode($row['paymenttype']) . '</td><td class = "style">' . base64_decode($row['datefrom']) . '</td><td class = "style">' . base64_decode($row['dateto']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan = "6"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><div class = "noprint"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div></div>';
}

function ministatementform() {
    echo '<div class = "noprint">
<form action = "" method = "post" class="form-horizontal" autocomplete = "off">

<div class="two">
<label>Member Number.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "mno" required placeholder = "Enter Member Number" title = "Enter Member Number" onkeyup = "showUser(this.value)" />
</div>
<div id = "txtHint">
<div class="two">
<label>Member Name.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "mname" required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>
</div>

<div class = "two">
<label> Date Range</label>
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon"> to
</span><input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>

<div class="col-md-4"><br />
<button class = "btn green" class = "btn green" name = "msubmit">Generate Statement</button>
</div>
</div>
</form>';
}

function audtitrail() {
    echo '<div id="mt">
 <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
<thead><tr><th colspan="5"><h4 align="center"><b>  All Audit Reports  </b></h4></th></tr>
<tr><th class = "style">User</th><th class = "style">Activity</th><th class = "style">Date</th><th class = "style">Time</th></tr></thead><tbody>';

//to make pagination

    $qry = mysql_query("SELECT * FROM audit ORDER by id ") or die(mysql_error());
//$qry = mysql_query('select * from audit') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {

        $username = mysql_query('select * from users where id = "' . base64_decode($row['user']) . '"') or die(mysql_error());
        $userrslt = mysql_fetch_array($username);


        if (base64_decode($row['user']) == 'Admin') {

            $usern = 'Administrator';
        } else {

            $usern = base64_decode($userrslt['fname']) . ' ' . base64_decode($userrslt['mname']) . ' ' . base64_decode($userrslt['lname']);
        }

        echo '<tr><td class = "style">' . $usern . '</td><td class = "style">' . base64_decode($row['activity']) . '</td>
<td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . base64_decode($row['time']) . '</td></tr>';
    }

    echo '<tbody></table></div>';
}

function viewactivemembers() {
    $mytable = '
        <div class="portlet box green ">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i> <h3 align="center"> <b>Active Members </b> </h3>  </div>
                     <div class="actions">
                     <div class="noprint">
                        <div class="btn-group">
                           <a class="btn default" href="#" data-toggle="dropdown">
                           Columns
                           <i class="icon-angle-down"></i>
                           </a>
                           <div id="sample_1_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                              <label><input type="checkbox" checked data-column="0"> Title </label>
                              <label><input type="checkbox" checked data-column="1"> Category </label>
                              <label><input type="checkbox" checked data-column="2">Member No </label>
                              <label><input type="checkbox" checked data-column="3"> First Name </label>
                              <label><input type="checkbox" checked data-column="4"> Middle Name </label>
                              <label><input type="checkbox" checked data-column="5"> Last Name </label>
                              <label><input type="checkbox" checked data-column="6"> ID Number</label> 
                              <label><input type="checkbox" checked data-column="7"> Mobile No. </label>
                              <label><input type="checkbox" checked data-column="8"> Gender </label>
                              <label><input type="checkbox" checked data-column="10"> Date of Registration </label>
                              <label><input type="checkbox" checked data-column="11"> Agent </label>
                              <label><input type="checkbox" checked data-column="12"> CRO </label>
                            </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="portlet-body">
             
 <div class="table-scrollable" id="mt">
                                              <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">

<thead  class="style">
<tr><th class="style">Title</th>
<th class="style">Category</th>
<th class="style">Member No.</th>
<th class="style">First Name</th>
<th class="style">Middle Name</th>
<th class="style">Last Name</th>
<th class="style">ID Number</th>
<th class="style">Mobile No.</th>
<th class="style">Gender</th>
<th class="style">Date of Registration</th>
<th class="style">Agent</th>
<th class="style">CRO</th>
</tr>

</thead>';

    //$statement = "`newmember`";
    $Rows = mysql_query("SELECT * FROM newmember where status='" . base64_encode('active') . "' order by primarykey asc");

    while ($Row = mysql_fetch_array($Rows)) {


        $mytable.=' <tr>
       <td class="style">' . getTitle(base64_decode($Row['title_id'])) . '</td>
<td class="style">' . getMemberCategory(base64_decode($Row['member_cat_id'])) . '</td>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['firstname']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['middlename']))) . '</td>
<td class="style">' . ucwords(strtolower(base64_decode($Row['lastname']))) . '</td>
<td class="style">' . base64_decode($Row['idnumber']) . '</td>
<td class="style">' . base64_decode($Row['mobileno']) . '</td>
    <td class="style">' . base64_decode($Row['gender']) . '</td>
<td class="style">' . base64_decode($Row['regdate']) . '</td>
  <td class="style">' . getAgents(base64_decode($Row['recruitedby'])) . '</td>
    <td class="style">' . getCRO(base64_decode($Row['cro_id'])) . '</td>
</tr>';
    }
    $mytable.='</table></div></div></div>';
    echo $mytable;

    echo '<div class = "col-md-4"><button  class="btn green"  value = "Print this page" onClick="return printResults()">Print</button>
             </div>  ';
}

function viewsuspendedmember() {


    $mytable = '<div id="mt52">
<table id="testTable" class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" >
<thead class = "style">
<tr> <th colspan="9"><center>Suspended Members   </center>  </th>  </tr>
<tr>
<th class = "style">Member No.</th>
<th class = "style">First Name</th>
<th class = "style">Middle Name</th>
<th class = "style">Last Name</th>
<th class = "style">ID Number</th>
<th class = "style">Mobile No.</th>
<th class = "style">Status</th>
<th class = "style">Date of Registration</th>

</tr>

</thead>';


    $Rows = mysql_query("SELECT * FROM newmember where  status='" . base64_encode("suspend") . "'");

    while ($Row = mysql_fetch_array($Rows)) {
        $mytable.=' <tr>
<td class = "style">' . base64_decode($Row['membernumber']) . '</td>
<td class = "style">' . base64_decode($Row['firstname']) . '</td>
<td class = "style">' . base64_decode($Row['middlename']) . '</td>
<td class = "style">' . base64_decode($Row['lastname']) . '</td>
<td class = "style">' . base64_decode($Row['idnumber']) . '</td>
<td class = "style">' . base64_decode($Row['mobileno']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['regdate']) . '</td> 


</tr>';
    }

    $mytable.='</table></div>';
    echo $mytable;
    echo '<br /><div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults52()">Print</button></div>';
}

function viewwithdrawnmember() {

    $mytable = '<div id="mt42">
<table class="table table-striped table-bordered table-hover table-full-width dataTable" id="withdrawn" aria-describedby="sample_2_info" >
<thead class = "style">
<tr> <th colspan="9"><center>Withdrawn Members   </center>  </th>  </tr>
<tr>
<th class = "style">Member No.</th>
<th class = "style">First Name</th>
<th class = "style">Middle Name</th>
<th class = "style">Last Name</th>
<th class = "style">ID Number</th>
<th class = "style">Mobile No.</th>
<th class = "style">Status</th>
<th class = "style">Date of Registration</th></tr>
</thead>';


    $Rows = mysql_query("SELECT * FROM newmember  WHERE   status='" . base64_encode('WITHDRAWN') . "' ");

    while ($Row = mysql_fetch_array($Rows)) {
        $mytable.=' <tr>
<td class = "style">' . base64_decode($Row['membernumber']) . '</td>
<td class = "style">' . base64_decode($Row['firstname']) . '</td>
<td class = "style">' . base64_decode($Row['middlename']) . '</td>
<td class = "style">' . base64_decode($Row['lastname']) . '</td>
<td class = "style">' . base64_decode($Row['idnumber']) . '</td>
<td class = "style">' . base64_decode($Row['mobileno']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['regdate']) . '</td> 


</tr>';
    }

    $mytable.='</table></div>';
    echo $mytable;
    echo '<br /><div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults42()">Print</button></div>';
}

function viewdeceasedmember() {

    $mytable = '<div id="mt32">
<table id="testTable" class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info" >
<thead class = "style">
<tr> <th colspan="9"><center>Deceased Members   </center>  </th>  </tr>
<tr>
<th class = "style">Member No.</th>
<th class = "style">First Name</th>
<th class = "style">Middle Name</th>
<th class = "style">Last Name</th>
<th class = "style">ID Number</th>
<th class = "style">Mobile No.</th>
<th class = "style">Status</th>
<th class = "style">Date of Registration</th>

</tr>

</thead>';


    $Rows = mysql_query("SELECT * FROM newmember where  status='" . base64_encode('deceased') . "'");

    while ($Row = mysql_fetch_array($Rows)) {
        $mytable.=' <tr>
<td class = "style">' . base64_decode($eow['membernumber']) . '</td>
<td class = "style">' . base64_decode($Row['firstname']) . '</td>
<td class = "style">' . base64_decode($Row['middlename']) . '</td>
<td class = "style">' . base64_decode($Row['lastname']) . '</td>
<td class = "style">' . base64_decode($Row['idnumber']) . '</td>
<td class = "style">' . base64_decode($Row['mobileno']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['regdate']) . '</td> 


</tr>';
    }

    $mytable.='</table></div>';
    echo $mytable;
    echo '<br /><div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults32()">Print</button></div>';
}

function viewinactivemembers() {
    $mytable = '<div id="mt2">
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead class = "style">
<tr><th colspan="8"> <h3 align="center"> <b>Inactive Members </b></h3> </th>  </tr><tr>
<th class = "style">Member No.</th>
<th class = "style">First Name</th>
<th class = "style">Middle Name</th>
<th class = "style">Last Name</th>
<th class = "style">ID Number</th>
<th class = "style">Mobile No.</th>
<th class = "style">Date of Registration</th>
<th class = "style">Recent activity</th>
</tr>

</thead>';

    // $statement = "`membercontribution`";


    $q1 = mysql_query("SELECT * FROM newmember where status='" . base64_encode("active") . "'");
    while ($resl = mysql_fetch_array($q1)) {
        $mem1 = MemberCont_Recentlty($resl['membernumber']); //get members who have contributed last 30 days
        if ($resl['membernumber'] != '') {
            $memberNos .= $resl['membernumber'] . ','; //all members in the newmebers table
        }
        if ($mem1 != '') {
            $rmember.=$mem1 . ','; //all members who have recently contributed
        }
    }
    $newmembrNo = trim($memberNos, ',');
    $allmembers = explode(',', $newmembrNo); //greate an array of  all member numbres

    $rmember1 = trim($rmember, ',');
    $allmemrec = explode(',', $rmember1);
    $result = array_diff($allmembers, $allmemrec);
    foreach ($result as $domantMembers) {

        $Rows = mysql_query("SELECT * FROM newmember where membernumber = '" . $domantMembers . "' and status='" . base64_encode("active") . "'");

        while ($Row = mysql_fetch_array($Rows)) {
            // $dated="";
            $lastdate = base64_decode(getRecentDateCont($Row['membernumber']));

            if ($lastdate == "") {
                $dated = base64_decode($Row['regdate']);
            } else {
                $dated = base64_decode(getRecentDateCont($Row['membernumber']));
            }
            $mytable.=' <tr>
<td class = "style">' . base64_decode($Row['membernumber']) . '</td>
<td class = "style">' . ucwords(strtolower(base64_decode($Row['firstname']))) . '</td>
<td class = "style">' . ucwords(strtolower(base64_decode($Row['middlename']))) . '</td>
<td class = "style">' . ucwords(strtolower(base64_decode($Row['lastname']))) . '</td>
<td class = "style">' . base64_decode($Row['idnumber']) . '</td>
<td class = "style">' . base64_decode($Row['mobileno']) . '</td>
<td class = "style">' . base64_decode($Row['regdate']) . '</td> 
<td class = "style">' . $dated . '</td>

</tr>';
        }
    }
    $mytable.='</table></div>
';
    echo $mytable;
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults2()">Print</button></div>';
}

function withdrawstatements($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqry = mysql_query('select * from withdrawals where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }


            $s = $s + 86400;
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "5"><h3 align="center"><b>Daily Transactions</b></h3></th></tr>

<tr><th colspan = "2" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan = "2" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Member Withdrawals</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><th class = "style">Member No</th><th class = "style">Member Name</th><th class = "style">Date of Withdrawal</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from withdrawals where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['membernumber']) . '</td><td class = "style">' . getMembername($row['membernumber']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan = "2"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function bankstatements($user, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $nqry = mysql_query('select * from banking where mode = "' . base64_encode("deposit") . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($nqry)) {
                $ntotal +=base64_decode($row['amount']);
            }

            $mqry = mysql_query('select * from banking where mode = "' . base64_encode("withdraw") . '" and date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $ototal +=base64_decode($row['amount']);
            }

            $mtotal = $ntotal - $ototal;

            $s = $s + 86400;
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "7"><h3 align="center"><b>Banking Statements</b></h3></th></tr>
<tr><th colspan = "5" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan = "5" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Banking Statements</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><th  class = "style">Date</th><th class = "style">Bank Name</th><th class = "style">Account</th><th class = "style">Type</th><th class = "style">Approved by</th><th class = "style">Comments</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from banking where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getbankname(base64_decode($row['bankname'])) . '</td><td class = "style">' . base64_decode($row['accno']) . '</td><td class = "style">' . base64_decode($row['mode']) . '</td><td class = "style">' . getbankingofficer(base64_decode($row['approvedby'])) . '</td><td class = "style">' . base64_decode($row['comments']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan = "5"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><button class="btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function memberreg($user, $mno) {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>

<div class = "col-md-5" >
<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "off">
<input class = "form-control input-medium" type = "hidden" name = "mno" value = "' . $mno . '"/>
<div class = "two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "name" value = "' . getMembername(base64_encode($mno)) . '" autofocus required = "required" placeholder = "Enter Date of Birth" title = "Enter Date of Birth"/>
</div>
<div class = "two">
<label>Date of Birth</label>
<input class = "form-control input-medium" type = "text" name = "dob" value = "' . $_REQUEST['dob'] . '" autofocus required = "required" placeholder = "Enter Date of Birth" title = "Enter Date of Birth"/>
</div>

<div class = "two">
<label>District</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "dist" value = "' . $_REQUEST['dist'] . '" required = "required" placeholder = "Enter District" title = "Enter District" />

</div>
<div class = "two">
<label>Division</label>
<input class = "form-control input-medium" type = "text" name = "divi" value = "' . $_REQUEST['divi'] . '" required = "required" title = "Enter Division" placeholder = "Enter Division" />
</div>
</div>


<div class = "col-md-5" >
<div class = "two">
<label>Location</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "loc" value = "' . $_REQUEST['loc'] . '" placeholder = "Enter Location" title = "Enter Location" required = "required" />
</div>
<div class = "two">
<label>Sub-Location</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "sub" value = "' . $_REQUEST['sub'] . '" required = "required" placeholder = "Enter Sub-Location" title = "Enter Sub-Location"/>
</div>
<div class = "two">
<label>Postal Code</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "code" value = "' . $_REQUEST['code'] . '" required = "required" placeholder = "Enter Postal Code" title = "Enter Postal Code"/>
</div>

<div class = "two">
<label>Station</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "station" value = "' . $_REQUEST['station'] . '" required = "required" placeholder = "Enter Station of work" title = "Enter Station of work" />
</div>
<div class = "two">
<label>Staff No</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "staff" value = "' . $_REQUEST['staff'] . '" placeholder = "Enter Staff Number if not, Enter 0" title = "Enter Staff Number if not, Enter 0"/>
</div>
<div class = "two">
<label>Terms of Service</label>
<select class = "form-control input-medium" name = "terms" placeholder = "Select the terms of service" required = "required" title = "Select the terms of service">
<option>Non-staff</option>
<option>Permanent</option>
<option>Temporary</option>
<option>Intern</option>
</select>
</div>

</div>

<div class = "col-md-5" >
<div class = "two">
<label>Recruited by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "recruit" value = "' . $_REQUEST['recruit'] . '" required = "required" placeholder = "Enter Member Number of Recruiter" title = "Enter Member Number of Recruiter"/>
</div>
<div class = "two">
<label>Other Sacco</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "sacco" value = "' . $_REQUEST['sacco'] . '" required = "required" title = "Enter Current or Other sacco" placeholder = "Enter Current or Other sacco"/>
</div>
<div class = "two">
<label>Commitment Fee</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "number" step = "0.01" name = "fee" value = "' . $_REQUEST['fee'] . '" required = "required" placeholder = "Enter Daily Commitment Fee" title = "Enter Daily Commitment Fee"/>
</div>


<div class = "two">
<label>Nationality</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "nat" placeholder = "Enter Nationality" required = "required" title = "Enter Nationality" value = "' . $_REQUEST['nation'] . '">
</div>
<div class = "two">
<label>Date Employed</label>
<input class = "form-control input-medium" type = "text" name = "date" value = "' . $_REQUEST['date'] . '" required = "required" placeholder = "Enter date of registration" title = "Enter date of registration"/>
</div>
</div>

<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">

<button class = "btn green" class = "btn green" name = "add">Save</button>
</div>
</form>
</div>

</div>';
}

function crew() {
    echo '<div class="col-md-8">
<form method="post" action = "" autocomplete = "off">
<div class="col-md-4">
<div class = "two">
<label>Names</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "name" value = "' . $_REQUEST['name'] . '" autofocus required placeholder = "Name of the applicant" title = "Name of the applicant" />
</div>

<div class = "two">
<label>ID No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "number" name = "id" value = "' . $_REQUEST['id'] . '" min = "0" placeholder = "National ID Number/Passport" title = "Nationl ID Number/Passport" />
</div>
<div class = "two">
<label>Mobile</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium"type = "text" name = "mobile" value = "' . $_REQUEST['mobile'] . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number"/>
</div>
<div class = "two">

<label>Employment Date</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"type = "text" name = "date" placeholder = "Enter Date of Employment" title = "Enter Date of Employment" value = "' . $_REQUEST['date'] . '">
</div>


<div class = "two">
<label>Residence</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "text" name = "residence" value = "' . $_REQUEST['residence'] . '" autofocus required placeholder = "Enter current residence" title = "Enter current residence" />
</div>
</div>
<div class="col-md-offset-5">
<div class = "two">
<label>Occupation</label>
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" name = "job" required title = "Enter current occupation">
<option></option>
<option>Driver</option>
<option>Conductor</option>
</select> </div>
<div class = "two">
<label>Email</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type = "email" name = "email" value = "' . $_REQUEST['email'] . '" placeholder = "Enter a valid Email address" title = "Enter a valid Email address" required/>
</div>
<div class = "two">
<label>Status</label>
<select class = "form-control input-medium" name = "status" required title = "Enter current status">
<option></option>
<option>Active</option>
<option>Inactive</option>
</select>
</div>
<div class = "two">
<label>Picture</label>
<input class = "form-control input-medium" type = "file" name = "image"  placeholder = "Upload Picture" title = "Upload Picture"/>
</div>
<br />
<div class = "two">
<button class = "btn green" name = "submit">Save</button>
</div>
</form></div>';
}

function vehiclestatementform() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<div class = "noprint">
<label>Number Plate</label>
<input class = "form-control input-medium" type = "text" name = "regno" required placeholder = "Enter Number Plate" title = "Enter Number Plate"/>
</div>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "col-md-3 ">
<div class = "noprint">
<p>Date From</p>
<label>day</label>
<select class = "form-control input-medium" name = "dfrom" title = "Select Date">
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<label>Month</label>
<select class = "form-control input-medium" name = "mfrom" title = "Select Month">
<option>Jan</option>
<option>Feb</option>
<option>Mar</option>
<option>Apr</option>
<option>May</option>
<option>Jun</option>
<option>Jul</option>
<option>Aug</option>
<option>Sep</option>
<option>Oct</option>
<option>Nov</option>
<option>Dec</option>
</select>
<label>Year</label>
<select class = "form-control input-medium" name = "yfrom" title = "Select year">';
    for ($i = date("2000"); $i <= date("Y") + 2; $i++)
        if ($year == $i)
            echo "<option value='$i' selected>$i</option>";
        else
            echo "<option value='$i'>$i</option>";
    echo '</select>
</div>
</div>
<div class = "col-md-3 ">
<div class = "noprint">
<p>Date To</p>
<label>day</label>
<select class = "form-control input-medium" name = "dto" title = "Select Date">
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
<label>Month</label>
<select class = "form-control input-medium" name = "mto" title = "Select Month">
<option>Jan</option>
<option>Feb</option>
<option>Mar</option>
<option>Apr</option>
<option>May</option>
<option>Jun</option>
<option>Jul</option>
<option>Aug</option>
<option>Sep</option>
<option>Oct</option>
<option>Nov</option>
<option>Dec</option>
</select>
<label>Year</label>
<select class = "form-control input-medium" name = "yto" title = "Select year">';
    for ($i = date("2000"); $i <= date("Y") + 2; $i++)
        if ($year == $i)
            echo "<option value='$i' selected>$i</option>";
        else
            echo "<option value='$i'>$i</option>";
    echo '</select>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<div class = "noprint">
<button class = "btn green" name = "msubmit">Generate Statement</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function loansettings() {

    echo '<div class="col-md-4">
<form action = "" method="post" autocomplete = "off">
<label>Loan Name</label>
<input class = "form-control input-medium" type = "text" name = "lname" autofocus required placeholder = "Enter Loan Name" title = "Enter Loan Name"/>

<label>Loan Type</label>
<select class = "form-control input-medium" name = "ltype" required title = "Enter Account type">
<option></option>
<option>Short Term</option>
<option>Long Term</option>
</select>
<label>Status</label>
<select class = "form-control input-medium" name = "status" required title = "Enter Account status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
<label>Type of Rate</label>
<select class = "form-control input-medium" name = "ratetype" required title = "Enter Interest Rate Type">
<option></option>
<option value="1">Straight Line</option>
<option value="2">Reducing Balance</option>
<option value="3">Micro Finance</option>
<option value="4">MFI</option>
</select>
<label>Interest Rate %</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "rate" type = "number" step = "0.01" placeholder = "Enter Interest Rate" title = "Enter Interest Rate">
<label>Choose Interest Payment Mode</label><br />

<label>Flat Rate</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class="form-control input-medium" type="radio" value="normal" name="interest">  
<label>Time Based Rate</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class="form-control input-medium" type="radio" value="timed" name="interest">
  
<label>Loan Processing Fee %</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "proc" type = "number" step="0.01" placeholder = "Enter Loan Processing Fee" title = "Enter Loan Processing Fee">

<label>Max Number Of Gurantors</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "maxg" type = "number" step="0.01" placeholder = "Max No Of Gurantors" title = "Max No Of Gurantors">

<label>Duration Of Member Before Getting Loan</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "duration" type = "number" step="0.01" placeholder = "Duration Of Member Before Getting Loan" title = "Duration Of Member Before Getting Loan">

</div>
<div class="col-md-offset-6">
<label>Fines (In Installments) %</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "fyn" type = "number" step="0.01" placeholder = "Fines (In Installments) %" title = "Fines (In Installments) %">

<label>Max Saving For Borrowing Loan</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "maxloansave" type = "number" step="0.01" placeholder = "Max Loan As (as Factor of Saving)" title = "Max Loan As (as Factor of Saving)">

<div class="col-md-4">
<label>Choose Loan Insurance Fee</label>

<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class ="form-control" id="yes" name="ins" type="radio">
<label>Enter Insurance Rate %</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" type="number" step="0.01"  name="ins" id="jay" placeholder="Insurance Rate in %" >


<label>Insurance Formulae </label> 
  <input value="Formulae" class ="form-control" required id="no" type="radio" name="ins" >
  

<label>Minimum Amount</label>
<input class = "form-control input-medium" required name = "min" type = "number" step = "0.01" placeholder = "Enter Minimum Amount" title = "Enter Minimum Amount">

<label>Maximum Amount</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required class = "form-control input-medium" name = "max" type = "number" step = "0.01" placeholder = "Enter Maximum Amount" title = "Enter Maximum Amount">

<label>Comments</label>
<textarea class = "form-control input-medium" rquired name = "comments" type = "text" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
<div class="form-group">

<label>Legal Fees</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" required type="number" step="0.01" name="lfees"  class="form-control input-medium" placeholder="Legal Fees" title="Legal Fees" required>
</div>
<div class="row">
<div class="col-md-4">
<button class = "btn green" name = "losub">Save</button>
</form>
</div>
<div class="col-md-4">
<form action = "" method = "post" autocomplete = "off">
<button class = "btn green" name = "loedit">Edit</button>
</form>
</div>
</div>

</div>';
}

function editloans() {
    echo '
 <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
<thead class = "style">
<tr>
<th class = "style">Loan Name</th>
<th class = "style">Status</th>
<th class = "style">Loan Rate Type</th>
<th class = "style">Interest Rate Type</th>
<th class = "style">Interest Rate %</th>
<th class = "style">Loan Application Fee %</th>
<th class = "style">Loan Insurance Fee %</th>
<th class = "style">Max No Of Gurantors</th>
<th class = "style">Fines (per Installment) Fee %</th>
<th class = "style">Minimum Amount</th>
<th class = "style">Maximum Amount</th>

<th class="style">Max Saving For Borrowing Loan</th>
<th class = "style">Duration of new member before getting loan</th>
<th class = "style">Comments</th>
<th class = "style">Legal Fees</th>
<th class="style">Edit</th>
</tr>

</thead><tbody>';
    $Rows = mysql_query('SELECT * FROM loansettings');

    while ($Row = mysql_fetch_array($Rows)) {



        echo' <tr>
<td class = "style">' . base64_decode($Row['lname']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style">' . base64_decode($Row['interesttype']) . '</td>
<td class = "style">' . getratetype(base64_decode($Row['ratetype'])) . '</td>
<td class = "style">' . base64_decode($Row['rate']) . '%</td>
<td class = "style">' . base64_decode($Row['loanappfee']) . '%</td>
<td class = "style">' . base64_decode($Row['loaninsurance']) . '%</td>

<td class = "style">' . base64_decode($Row['maxgurantor']) . '</td>
<td class = "style">' . base64_decode($Row['fines']) . '%</td>

<td class = "style">' . getsymbol() . ' ' . number_format(base64_decode($Row['min']), 2) . '</td>
<td class = "style">' . getsymbol() . ' ' . number_format(base64_decode($Row['max']), 2) . '</td>

<td class = "style">' . base64_decode($Row['maxloansave']) . '</td>
<td class = "style">' . base64_decode($Row['duration']) . '</td>
<td class = "style">' . base64_decode($Row['comments']) . '</td>
 <td class = "style">' . base64_decode($Row['legalfees']) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo'<td class = "style"><form action="" method="post"><input type="hidden" name="lid" value="' . $Row['id'] . '" /> <button name="btnedit"  onClick="' . $confirmedit . '" ><img src = "images/edit.png"> </button></form></td>

</tbody></tr>';
    }
    echo '</table>';
}

function loanedit($id, $lname, $ltype, $status, $ratetype, $rate, $appfee, $insfee, $min, $max, $comments, $maxg, $fyn, $maxloansave, $duration, $legalfee) {
    if ($ratetype == 1) {
        $rtyped = "Straight Line";
    } else if ($ratetype == 2) {
        $rtyped = "Reducing Balance";
    } else if ($ratetype == 3) {
        $rtyped = "Reducing Balance";
    } else {
        $rtyped = "MFI";
    }
    echo '
<div class="col-md-4">
<form action = "" method="post" autocomplete = "off">
<label>Loan Name</label>
<input class = "form-control input-medium" type = "hidden" name = "lid" value = "' . $id . '" autofocus required placeholder = "Enter Loan Name" title = "Enter Loan Name" />
<input class = "form-control input-medium" required type = "text" name = "lname" value = "' . $lname . '" autofocus required placeholder = "Enter Loan Name" title = "Enter Loan Name" />

<label>Loan Type</label><br />
<select class = "form-control input-medium select2Me" required name = "ltype" required title = "Enter Account type">
<option value="' . $ltype . '">' . $ltype . '</option>
<option>Long Term</option>
<option>Short Term</option>
<option>Emergency</option>
</select>

<label>Status</label><br/>
<select class = "form-control input-medium select2Me" name = "status" required title = "Enter Account status">
<option value="' . $status . '">' . $status . '</option>
<option>Active</option>
<option>Suspended</option>
</select>

<label>Interest Rate Type</label>
<select class = "form-control input-medium select2Me" name = "ratetype" required title = "Enter Interest Rate Type">
<option value="' . $ratetype . '">' . $rtyped . '</option>
<option value="1">Straight Line</option>
<option value="2">Reducing Balance</option>
<option value="3">Micro Finance</option> 
<option value="4">MFI</option>
</select>
        
<label>Choose Interest Payment Mode</label><br />
<label>Flat Rate</label>
<input class="form-control input-medium" required type="radio" value="normal" name="interest">  
<label>Time Based Rate</label>
<input class="form-control input-medium" required type="radio" value = "' . $rate . '" name="interest">         

<label>Interest Rate %</label>
<input class = "form-control input-medium" required name = "rate" type = "number" step = "0.01" placeholder = "Enter Interest Rate" value = "' . $rate . '" title = "Enter Interest Rate">

<label>Loan Processing Fee %</label>
<input class = "form-control input-medium" required name = "proc" type = "number" step = "0.01" placeholder = "Enter Loan Processing Fee" value = "' . $appfee . '" title = "Enter Loan Processing Fee">

<label>Max Number Of Gurantors</label>
<input class = "form-control input-medium" required name = "maxg" type = "number" step="0.01" placeholder = "Max No Of Gurantors" value = "' . $maxg . '" title = "Max No Of Gurantors">

<label>Duration Of Member Before Getting Loan</label>
<input class = "form-control input-medium" rquired name = "duration" type = "number" step="0.01" placeholder = "Duration Of Member Before Getting Loan"  value = "' . $duration . '" title = "Duration Of Member Before Getting Loan">

</div>
<div class="col-md-offset-6">
<label>Fines (In Installments) %</label>
<input class = "form-control input-medium" name = "fyn" type = "number" step="0.01" placeholder = "Fines (In Installments) %" value = "' . $fyn . '" title = "Fines (In Installments) %">
<label>Max Loan As ( Factor of Saving)</label>
<input class = "form-control input-medium" required name = "maxloansave" type = "number" step="0.01" placeholder = "Max Loan As (as Factor of Saving)" value="' . $maxloansave . '" title = "Max Loan As (as Factor of Saving)">
<div class="col-md-4">
<label>Choose Loan Insurance Fee</label>
<br>
<input class ="form-control" required id="yes" type="radio" name="ins">
<label>Enter Insurance Rate %</label>
<input class = "form-control input-medium" type="number" step="0.01"  name="ins" id="jay" placeholder="Insurance Rate in %" >
<label>Insurance Fomular  </label>
  <input value="Formulae" required class ="form-control" id="no" type="radio" name="ins" >

<label>Minimum Amount</label>
<input class = "form-control input-medium" required name = "min" type = "text" value = "' . $min . '" placeholder = "Enter Minimum Amount" title = "Enter Minimum Amount">
<label>Maximum Amount</label>
<input class = "form-control input-medium" rquired name = "max" type = "text" value = "' . $max . '" placeholder = "Enter Maximum Amount" title = "Enter Maximum Amount">
<label>Comments</label>
<textarea class = "form-control input-medium"  required name = "comments" type = "text" placeholder = "Enter Comments" title = "Enter Comments">' . $comments . '</textarea>
<div class="form-group">
<label>Legal Fees</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="number" step="0.01" name="lfees" value = "' . $legalfee . '" class="form-control input-medium" placeholder="Legal Fees" title="Legal Fees" required>
</div>
<br><br><button class = "btn green" name = "ace">Update</button>
</form>
</div>';
}

function sharesport($user, $datefrom, $dateto) {
//$date = $day . '-' . $month . '-' . $year;
//$date=date("d-M-Y");
    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
//$acry = mysql_query('select * from accounts where acname = "' . base64_encode("Xmas Savings") . '"') or die(mysql_error());
//while ($row1 = mysql_fetch_array($acry)) {
            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getdefaultsharesaccount()) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
//}

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "5"><center>' . getGlname(getdefaultsharesaccount()) . ' Statements</center></th></tr>
<tr><th colspan = "3" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td colspan = "3" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getGlname(getdefaultsharesaccount()) . '</td><td class = "style">' . getsymbol() . ' ' . number_format($mtotal, 2) . '</td></tr>

</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

<tr><th class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode(getdefaultsharesaccount()) . '" order by memberno') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['memberno']) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td><td class = "style">' . getpaytype(base64_decode($row['paymenttype'])) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan = "3"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><div class = "noprint"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div></div>';
}

function benevstatements($user, $datefrom, $dateto) {
    echo '
<div id="mt"><table id = "sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "7"><center>' . getGlname(73) . ' Statements</center></th></tr>
    

<tr><td colspan = "5">' . $datefrom . ' to ' . $dateto . '</td><td>' . getGlname(73) . ' </td></tr>

<tr><th>Member No</th>  <th>Member Name</th><th>Payee</th>  <th>Payment Type</th>   <th>Date</th> <th>  Amount </th> </tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query(' select *  from membercontribution   where     date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode("73") . '"  ') or die(mysql_error()); //
            while ($row = mysql_fetch_array($mqry)) {
                echo ' <tr><td>' . base64_decode($row['memberno']) . ' </td><td>' . getMembername($row['memberno']) . ' </td><td>' . base64_decode($row['payee']) . ' </td><td>' . getpaytype(base64_decode($row['paymenttype'])) . ' </td><td>' . base64_decode($row['date']) . ' </td><td>' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . ' </td></tr>';

                $mtotal +=base64_decode($row['amount']);
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan="4"></td><td>TOTAL</td><td>' . getsymbol() . '.' . number_format($mtotal, 2) . ' </td></tr>';
    }

    echo '</table></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function cgroup() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Group Name.</label>
<input class = "form-control input-medium" type = "text" name = "gname" required title = "Enter Group Name" placeholder = "Enter Group Name">
</div>
<div class = "two">
<label>Status </label>
<select class = "form-control input-medium" name = "status" required placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
<div class = "two">
<label>Comment </label>
<input class = "form-control input-medium" type = "text" name = "comment" required placeholder = "Enter Comment " title = "Enter Comment "/>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">

<br><button class = "btn green" name = "create">Create Group</button>
</form>
<form action = "" method = "GET" autocomplete = "off">
<br><button class = "btn green" name = "gedit">Edit Group</button>
</form>
</div>
</div>
</div>
</div>
</div>';
}

function dynaform() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">
<div class = "form-group">



<label>Select Account</label><br/>

<select class = "form-control input-medium select2me" name = "acc" title = "Select Account" data-placeholder = "Select Account">
<option></option>
<option value="' . getdefaultsavingsaccount() . '">' . getGlname(getdefaultsavingsaccount()) . '</option>
<option value="' . getdefaultsharesaccount() . '">' . getGlname(getdefaultsharesaccount()) . '</option>
<option value="73">' . getGlname(73) . '</option>';
    echo '</select></div></div>

<div class = "form-group">
<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div></div>

<button class = "btn green" name = "msubmit">Generate Statement</button>
   </form>';
}

function dynaexep() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">

<div class="form-group">
<label class="label-control">Select Account Name</label><br />
<select id= "tname"  class="form-control input-medium select2me" name = "acc" value = "' . $_REQUEST['tname'] . '" required  data-placeholder="Select Account Name"  title = "Select Account Name"><option></option>';

    $id = base64_encode(5);
    $qry = mysql_query("select * from glaccounts where accgroup='$id'") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo ' <option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class="form-group">
<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
</div>
<br />

<button class = "btn green" name = "msubmit">Generate Statement</button>
</div>  </form>';
}

function dynapetty() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">


<div class="two">
<label>Account Name</label>
<select id= "tname"  class="form-control input-medium" name = "acc" value = "' . $_REQUEST['tname'] . '" required title = "Account type"><option></option>';

    $id = base64_encode(5);
    $qry = mysql_query("select * from glaccounts where accgroup='$id'") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo ' <option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
<div class="two">
<button class = "btn green" name = "msubmit">Generate Statement</button>
</div></div>   </form>';
}

function dynainco() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">

<div class="form-group">


<label class="label-control">Account Name</label><br />
<select  id="select2_sample4"  class="form-control input-medium"  name="acc" required title="Payment type">
<option></option>';
    $id = base64_encode(4);
    $qry = mysql_query("select * from glaccounts where accgroup='$id' ");
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select></div>
        
 <div class="form-group">       
<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
</div>
<br />
<button class = "btn green" name = "msubmit">Generate Statement</button>
</div>
</form>';
}

function dynacon() {
    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">


<div class="form-group">
<label class="form-label">Select  Account</label><br />

<select class = "form-control input-medium select2me" name = "acc" title = "Select Account" data-placeholder = "Select Account">
<option></option>';
    $qry = mysql_query("select * from  memberaccs GROUP BY glaccid ");
    while ($row = mysql_fetch_array($qry)) {
        //echo "ret".getglcombi(base64_decode($row['glaccid']));
        //if( getglcombi(base64_decode($row['glaccid'])=='4')  ){
        echo '<option value="' . (base64_decode($row['glaccid'])) . '">' . getglacc(base64_decode($row['glaccid'])) . '</option>';
        //}
    }
    echo '</select></div>
<div class="form-group">
<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
</div>
<br />

<button class = "btn green" name = "msubmit">Generate Statement</button>
</div></form>';
}

function dynaport($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }

            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }


            $s = $s + 86400;
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "11"><center>' . getglacc($acc) . ' Dynamic Statements</center></th></tr>
<tr><th colspan = "9" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td  colspan = "9" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getaccname($acc) . ' </td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>

<form action = "" method="post" autocomplete = "off">


<tr><th colspan = "5"  class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">From</th><th class = "style">To</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td colspan = "5" class = "style">' . base64_decode($row['memberno']) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td><td class = "style">' . base64_decode($row['paymenttype']) . '</td><td class = "style">' . base64_decode($row['datefrom']) . '</td><td class = "style">' . base64_decode($row['dateto']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td colspan = "5" class = "style">' . base64_decode($row['payeeid']) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td><td class = "style">' . base64_decode($row['paymentype']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $s = $s + 86400;
        }
        echo '<tr><td colspan = "9"  colspan = "5"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table></div>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><div class = "noprint"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div></div>';
}

function dynaexepee($user, $acc, $datefrom, $dateto) {
    $balBF = expenceBalanceBF($acc, $datefrom);
    $mtotal = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
//}

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<form action = "" method="post" autocomplete = "off">
<div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "8"><div class = "noprint"><center> Dynamic Exepenses Report For ' . getglacc($acc) . '</center></div></th></tr>
<tr><th colspan = "6" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td  colspan = "6" class = "style">Balance B/F To ' . $datefrom . '</td><td class = "style">Income For ' . getglacc($acc) . '</td><td class = "style">' . getsymbol() . '.' . number_format($balBF, 2) . '</td></tr>
<tr><td  colspan = "6" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getglacc($acc) . ' </td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><th colspan = "4"  class = "style">Recever Name</th><th class = "style">Transaction Id</th><th class = "style">Payment Type</th><th class = "style">Amount</th></tr>';


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td colspan = "4" class = "style">' . base64_decode($row['receiver']) . '</td><td class = "style">' . base64_decode($row['transid']) . '</td><td class = "style">' . getpaytype(base64_decode($row['paymentype'])) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td><td></td></tr>';
            }

            $s = $s + 86400;
        }
        $total = $balBF + $mtotal;
        echo '<tr><td colspan = "6"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td></tr>';
    }

    echo '</table></div>
</form></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function dynaccon($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }

            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }


            $s = $s + 86400;
        }
    }

    echo '<form action = "" method="post" autocomplete = "off"><div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "5"><center> Dynamic Contribution Report For ' . getglacc($acc) . '</center></th></tr>
<tr><th colspan = "3" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td  colspan = "3" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getglacc($acc) . ' </td><td class = "style"><b>' . getsymbol() . '.' . number_format($mtotal, 2) . '</b></td></tr>
<tr><th   class = "style">Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class = "style">' . base64_decode($row['memberno']) . '</td>  <td class = "style">' . base64_decode($row['payee']) . '</td>  <td class = "style">';
                if (is_numeric(base64_decode($row['paymenttype']))) {
                    echo getpaytype(base64_decode($row['paymenttype']));
                } else {
                    echo base64_decode($row['paymenttype']);
                }

                echo '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $mq = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mq)) {
                echo '<tr><td colspan = "3" class = "style">' . base64_decode($row['payeeid']) . '</td><td class = "style">' . base64_decode($row['payee']) . '</td>';

                if (is_numeric(base64_decode($row['paymentype']))) {

                    echo'<td class = "style">' . getpaytype(base64_decode($row['paymentype'])) . '</td>';
                } else {
                    echo' <td class = "style">' . base64_decode($row['paymentype']) . '</td>';
                }
                echo'<td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $s = $s + 86400;
        }
        echo '<tr><td   colspan = "3"></td><td class = "style">TOTAL</td><td class = "style"><b>' . getsymbol() . '.' . number_format($mtotal, 2) . '</b></td></tr>';
    }

    echo '</table>
</form></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function dynaincome($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $balBF = incomeBalanceBF($acc, $datefrom);

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400;
        }
    }

    echo '<div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "8"><center> Dynamic  Income Report For ' . getglacc($acc) . '</center></div></th></tr>
<tr><th colspan = "6" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td  colspan = "6" class = "style">Balance B/F To ' . $datefrom . '</td><td class = "style">Income For ' . getglacc($acc) . '</td><td class = "style">' . getsymbol() . '.' . number_format($balBF, 2) . '</td></tr>
<tr><td  colspan = "6" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">Income For ' . getglacc($acc) . '</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><th colspan = "4" >Member No</th><th class = "style">Payee</th><th class = "style">Payment Type</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td colspan = "4" class = "style">' . base64_decode($row['payeeid']) . '</td><td class = "style">' . getMembername(($row['payeeid'])) . '</td><td class = "style">' . getpaytype(base64_decode($row['paymentype'])) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
//}
            $s = $s + 86400;
        }
        $total = $balBF + $mtotal;
        echo '<tr><td colspan = "6"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($total, 2) . '</td></tr>';
    }

    echo '</table></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function dynapetti($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<form action = "" method="post" autocomplete = "off">
<div id="mt">
<table id="sample_2"  aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan = "11"><div class = "noprint"><center> Dynamic Petty Cash Report For ' . getglacc($acc) . '</center></div></th></tr>
<tr><th colspan = "9" class = "style">Date</th><th class = "style">Account</th><th class = "style">Total</th></tr>
<tr><td  colspan = "9" class = "style">' . $datefrom . ' to ' . $dateto . '</td><td class = "style">' . getglacc($acc) . ' </td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
<tr><th colspan = "5"  class = "style">Recever Name</th><th class = "style">Transaction Id</th><th class = "style">Payment Type</th><th class = "style">From</th><th class = "style">To</th><th class = "style">Date</th><th class = "style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $mqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . base64_encode($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td colspan = "5" class = "style">' . base64_decode($row['receiver']) . '</td><td class = "style">' . base64_decode($row['transid']) . '</td><td class = "style">' . base64_decode($row['paymentype']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . base64_decode($row['date']) . '</td><td class = "style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }

            $s = $s + 86400;
        }
        echo '<tr><td colspan = "9"  colspan = "5"></td><td class = "style">TOTAL</td><td class = "style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table>
</form></div>';
    echo '<div class = "col-md-4"><button class = "btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function dynatform() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout col-md-6">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<div class = "noprint">
<label>Member Number.</label>
<input class = "form-control input-medium" type = "text" name = "mno" required placeholder = "Enter Member Number" title = "Enter Member Number"/>
</div>
</div>

<div class = "two">
<div class = "noprint">
<label> Group Account</label>
<select class = "form-control input-medium" name = "acc" title = "Select Account" placeholder = "Select Account">';

    $qry = mysql_query('select * from accounts where comments = "' . base64_encode('groups') . '" and status = "' . base64_encode("Active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo ' < option value = "' . $row['id'] . '">' . base64_decode($row['acname']) . ' < /option>';
    }

    echo '</select><br><br>
</div>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-content-layout col-md-6">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "col-md-6">
<div class = "noprint">


<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "col-md-5">
<div class = "noprint">
<br><br><br><br><button class = "btn green" class = "btn green" name = "msubmit">Generate Statement</button><br><br>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function accsforms() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "email_statements.php" method = "post" class="form-horizontal" autocomplete = "off"> 

<div class = "form-body">



<div class = "two">
<label> Date Range</label>
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon"> to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>

<div class="col-md-4"> <br />
<button  class="btn green"  class="btn green" name="msubmit">Continue...</button><br><br>
</div>


</div>
</form>';
}

function accsform() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "post" class="form-horizontal" autocomplete = "off"> 

<div class = "form-body">
<div class = "form-group">



<div class="col-md-4">
<label>Select Member Number</label>  <br />
<select name = "mno"  onchange = "showUser(this.value)" value = "' . $_REQUEST['mno'] . '" data-placeholder="Select Member Number"  class="input-medium form-control select2me">
<option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
</div>
<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input id="mname"  class="form-control input-medium"   type = "text" name = "mname"  readonly required placeholder = "Enter Member Name" title = "Enter Member Name" value = "' . $_REQUEST['mname'] . '"/>
</div>
</div>

<div class = "two">
<label> Date Range</label>
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon"> to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>

<div class="col-md-4"> <br />
<button  class="btn green"  class="btn green" name="msubmit">Generate Statement</button><br><br>
</div>


</div>
</form>';
}

function editgroup() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Group Name</th>
<th class="style">Status</th>
<th class="style">Comments</th>
<th class="style">Edit</th>
<th class="style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM cgroup');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class="style">' . base64_decode($Row['gname']) . '</td>
<td class="style">' . base64_decode($Row['status']) . '</td>
<td class="style">' . base64_decode($Row['comment']) . '</td>
<td class="style"> <a href = "groups.php?gid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
                  
<td class="style"> <a href = "groups.php?gdel=' . $Row['id'] . '" Onclick=" return Del();"><img src = "images/delete.png"

></a></td>
</tr>';
    }
    echo '</table>
';
}

function groupedit($id, $gname, $status, $comm) {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Group Name.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type="text" name = "gname" value="' . $gname . '" required title = "Enter Group Name" placeholder = "Enter Group Name">
<input   class="form-control input-medium" type="hidden" name = "id" value="' . $id . '" required>
</div>
<div class = "two">
<label>Status </label>
<select  class="form-control input-medium"  name = "status" required placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
<div class = "two">
<label>Comment </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" value="' . $comm . '" name = "comment" required placeholder = "Enter Comment " title = "Enter Comment "/>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<br /><button  class="btn green"  name = "save">Save</button><br><br>
</div>
</div>
</div>
</div>
</div>';
}

function miniform() {

    echo '<form name="" method="post" action="">

<div class = "two">
<label>Member Number</label>

<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" style = "qcont:firstletter;" value = "' . $_REQUEST['mno'] . '" class="form-control select2  input-medium">
<option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input id="mname"  class="form-control input-medium"   type = "text" name = "mname"  readonly required placeholder = "Enter Member Name" title = "Enter Member Name" value = "' . $_REQUEST['mname'] . '"/>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "four">
<br><button  class="btn green"  class="btn green" name="msubmit">Generate Statement</button><br><br>
</div>
</div>
</div>

</form>';
}

function loanchecka() {
    echo '
<form method="post" name="">
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Date Applied</th>
<th class="style">Member Number</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Terms (Months)</th>
<th class="style">Amount</th>
<th class="style">Action</th>
</tr>

</thead>';
//to make pagination
    $Rows = mysql_query("SELECT * FROM loanapplication where status = '" . base64_encode('pending') . "' order by id desc");
    while ($Row = mysql_fetch_array($Rows)) {
        echo' <tr>
<td class="style">' . date('d-M-Y', base64_decode($Row['appdate'])) . '</td>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td class="style"><center>' . base64_decode($Row['installments']) . '</center></td>
<td class="style">' . getsymbol() . '.' . number_format(loanamt($Row['transactionid']), 2) . '</td>
<td class="style"><div class=""><br><br><button  class="btn green"  class="btn green" type="text" name="chek" value="' . ($Row['id']) . '"

>Update</button><br><br></div></td>
</tr>';
    }
    echo '</table>
</form>';
}

function updateloan($user, $id, $mno, $ltype, $insts, $amt, $tid, $mode, $gracep, $appdate) {
    echo '
<form action="" method="post" class="form-horizontal" autocomplete="off">

<div class="form-body">


<div class="form-group">
<input   class="form-control input-medium"  type="hidden"  value="' . $id . '" name="id"  />
<input   class="form-control input-medium" type="hidden"  value="' . $tid . '" name="tid" autofocus required />
<input   class="form-control input-medium" type="hidden"  value="' . $ltype . '" name="ltype" autofocus required />

<label>Member Number</label>
<input  class="form-control input-medium" type="text" value="' . $mno . '" name="mno" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />
</div>

<div class="form-group">
<label>Member Name</label>
<input  class="form-control input-medium" type="text" value="' . getMembername(base64_encode($mno)) . '" name="mname" readonly autofocus required placeholder="Enter Member Name" title="Enter Member Name" />
</div>

<div class="form-group">
<label>Loan Type</label>
<input  class="form-control input-medium" type="text" value="' . getloaname($ltype) . '" name="loan" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " />
</div>
<div class="form-group">
<label>Grace Period</label>
<input  class="form-control input-medium" type="number" value="' . $gracep . '" name="gperiod" autofocus required readonly placeholder="Enter Grace Period " title="Enter Grace Period " />
</div>
<div class="form-group">
<label>Payment Mode</label>
<input  class="form-control input-medium" type="text" value="' . $mode . '" name="mode" autofocus required readonly placeholder="Enter Payment Mode " title="Enter Payment Mode " />
</div>
<div class="form-group">
<label>Application Date</label>
<input  class="form-control input-medium" type="appdate" value="' . date('d-M-Y', $appdate) . '" name="appdate" autofocus required readonly placeholder="Enter Appication Date " title="Enter Appication Date  " />
</div>
<div class="form-group">
<label>Installments </label>
<input  class="form-control input-medium" type="text" value="' . $insts . '" name="years" autofocus required placeholder="Enter Number of Installments Type " title="Enter Number of Installments " />
</div>

<div class="form-group">
<label>Amount Approved</label>
<input  class="form-control input-medium" type="number" step="0.01" value="' . loanamout(base64_encode($tid)) . '" name="amount" autofocus required placeholder="Enter Approved Amount " title="Enter Approved Amount " />
</div>

<div class="form-group">
<br><button  class="btn green"  class="btn green" name="update">Approve</button><br>
<button  class="btn green"  class="green"  name="reject">Reject</button>
</div>

</div>
</form>';
}

function dends() {
    echo '
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="col-md-offset4" style="width: 50%" >

<form method="post" action="" autocomplete="off">
<div class="two">
<label>Select Year</label>
<input  class="form-control input-medium  date-picker" data-date-format="yyyy"  type="text" name="year" placeholder="Select Year" title="Select Year" required/>

<label>Amount</label>
<input   class="form-control input-medium"  type="number" step="0.01" name="amt" required placeholder="Enter Amount" title="Enter Amount"/>

<input class="form-control input-medium"  type="hidden" name="date" maxlength="11" value="' . date("d-M-Y") . '" placeholder="Enter Date of Banking" title="Enter Date of Banking" required/>

<label>Comments</label>
<textarea class="form-control input-medium"  type="text" name="comments" placeholder="Enter Comments" title="Enter Comments" /></textarea>

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<br><br><button  class="btn green"  class="btn green" name="submit">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function finalbk($user, $datefrom, $dateto) {

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $acry = mysql_query('select * from accounts where acname= "' . base64_encode("member deposits") . '"') or die(mysql_error());
            while ($row1 = mysql_fetch_array($acry)) {
                $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . ' " and transaction = "' . ($row1['acname']) . '"') or die(mysql_error());
                while ($row = mysql_fetch_array($mqry)) {
                    $mtotal +=base64_decode($row['amount']);
                }
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class="table-scrollable" >
<table id="sample_2" class="table table-striped table-bordered table-hover" >
<tr><th colspan = "3">Compulsory Savings Statements</th></tr></table>
<table id="sample_2" class="table table-striped table-bordered table-hover" >
<tr><th class="style">Date</th><th class="style">Account</th><th class="style">Total</th></tr>
<tr><td class="style">' . $datefrom . ' to ' . $dateto . '</td><td class="style">Compulsory Savings</td><td class="style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>
</table>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class="col-md-6" >
<div class = "art-content-layout-row">
<table id="sample_2" class="table table-striped table-bordered table-hover" >
<tr><th class="style">Member No</th><th class="style">Payee</th><th class="style">Payment Type</th><th class="style">From</th><th class="style">To</th><th class="style">Date</th><th class="style">Amount</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . ' " and transaction="' . base64_encode("member deposits") . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                echo '<tr><td class="style">' . base64_decode($row['memberno']) . '</td><td class="style">' . base64_decode($row['payee']) . '</td><td class="style">' . base64_decode($row['paymenttype']) . '</td><td class="style">' . base64_decode($row['datefrom']) . '</td><td class="style">' . base64_decode($row['dateto']) . '</td><td class="style">' . base64_decode($row['date']) . '</td><td class="style">' . getsymbol() . '.' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
            }
            $s = $s + 86400;
        }
        echo '<tr><td colspan = "5"></td><td class="style">TOTAL</td><td class="style">' . getsymbol() . '.' . number_format($mtotal, 2) . '</td></tr>';
    }

    echo '</table>
</div>
</div>
</div>
</form></div>';
    echo '<div class = "col-md-4"><button  class="btn green"  value = "Print this page" onclick = "print()">Print</button></div>';
}

function bankDebitBF($bnkid, $dateto) {
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $debit = 0;

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $query = mysql_query('select * from  paymentin where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . base64_encode($bnkid) . '"  ') or die(mysql_error());

            while ($Row = mysql_fetch_array($query)) {
                $amount1 +=base64_decode($Row['amount']);
            }

            $stl = mysql_query('select * from  membercontribution where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . base64_encode($bnkid) . '"  ') or die(mysql_error());

            while ($rw = mysql_fetch_array($stl)) {
                $amount2 +=base64_decode($rw['amount']);
            }

            $stll = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . base64_encode($bnkid) . '"   AND   mode="ZGVwb3NpdA=="') or die(mysql_error());

            while ($rw1 = mysql_fetch_array($stll)) {
                $amount3 +=base64_decode($rw1['amount']);
            }

            $s = $s + 86400; //increment date by 86400 seconds(1 day) 
        }
        $debit = $amount1 + $amount2 + $amount3;
    }

    return $debit;
}

function bankCreditBF($bnkid, $dateto) {
    $date2 = strtotime($dateto) - 86400;  //we deduct one day b4 the from you chosed for the date range

    $credit = 0;

    $datefrom = date('31-12-2010');  //start of calculation 

    $s = strtotime($datefrom);

    $t = $date2;
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $sth1 = mysql_query('select * from  loandisbursment where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . base64_encode($bnkid) . '"  ') or die(mysql_error());
            while ($RR = mysql_fetch_array($sth1)) {
                $amount1 +=base64_decode($RR['amount']);
            }

            $stmt = mysql_query('select * from   paymentout where date="' . base64_encode(date('d-M-Y', $s)) . '"  AND bnkid = "' . base64_encode($bnkid) . '"  ') or die(mysql_error());
            while ($Row1 = mysql_fetch_array($stmt)) {

                $amount2 +=base64_decode($Row1['amount']);
            }

            $st = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid = "' . base64_encode($bnkid) . '"   AND   mode="d2l0aGRyYXc="') or die(mysql_error());
            while ($R = mysql_fetch_array($st)) {
                $amount3 +=base64_decode($R['amount']);
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day) 
        }
        $credit = $amount1 + $amount2 + $amount3;
    }
    return $credit;
}

function bookcash($user, $datefrom, $dateto) {
    $s = strtotime($datefrom);

    $t = strtotime($dateto);

    $jan = mysql_query("SELECT *   FROM  addbank");
    $bnkRows = mysql_query("SELECT *   FROM  addbank");
    $bnkRowss = mysql_query("SELECT *   FROM  addbank");
    $rowcount = mysql_num_rows($jan);

    $rowcounts = $rowcount * 2 + 6;
    $count = $rowcounts + 4;
    $java = ($rowcounts / 2);

    echo'<div id="mt">
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled" id="sample_2" >
 
<tr> 
<th colspan="7"> <h3 align="center"><b> Cash Book From ' . $datefrom . ' To ' . $dateto . ' </b></h3></th></tr>
<tr>
<th colspan="' . $java . '"> Debit</th> </tr>
<tr><th>Date</th><th>Payee </th><th>Details</th>';

    while ($row = mysql_fetch_array($jan)) {
        echo'<th>' . base64_decode($row['bankname']) . '</th>';
    }


    echo'</tr>
        <tr><th>Balance Brought Forward As At ' . $datefrom . '   </th><th><th></th>';

    while ($roq = mysql_fetch_array($bnkRows)) {
        $bankDebitbf = bankDebitBF($roq['primarykey'], $datefrom);
        echo'<th>' . number_format($bankDebitbf, 2) . '</th>';
    }
    echo'</tr>
    <tbody>';

    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $query = mysql_query('select * from  paymentin where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"  ') or die(mysql_error());

            while ($Row = mysql_fetch_array($query)) {
                echo'<tr><td class="style">' . base64_decode($Row['date']) . '</td>'
                . '<td>' . ucwords(strtolower(base64_decode($Row['paidby']))) . '</td>
               <td class="style">' . getGlname(base64_decode($Row['transname'])) . '</td>';

                $noofloop = $rowcount - 1;
                for ($i = 0; $i <= $noofloop; $i++) {

                    $june = $i + 1;
                    $no = amountIs($Row['date'], $Row['bnkid']);
                    if ($june == $no) {
                        $amounted +=calcluteAmount($Row['date'], $Row['bnkid']);
                        $stacy = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount($Row['date'], $Row['bnkid']), 2) . '</td>';
                        echo ($stacy);
                        $totalm98 = calcluteAmount($Row['date'], $Row['bnkid']);
                    } else {
                        $tracy = '<td>' . null . '</td>';
                        echo $tracy;
                    }
                }
                echo'</tr>';
            }

            //membercontribution
            $stl = mysql_query('select * from  membercontribution where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"  ') or die(mysql_error());

            while ($rw = mysql_fetch_array($stl)) {
                echo'<tr><td class="style">' . base64_decode($rw['date']) . '</td>'
                . '<td>' . ucwords(strtolower(base64_decode($rw['payee']))) . '</td>
               <td class="style">' . getGlname(base64_decode($rw['transction'])) . '</td>';

                $noofloop = $rowcount - 1;
                for ($i = 0; $i <= $noofloop; $i++) {

                    $june = $i + 1;
                    $no = amountIs22($rw['date'], $rw['bnkid']);
                    if ($june == $no) {
                        $amounted +=calcluteAmount11($rw['date'], $rw['bnkid']);
                        $stacy11 = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount11($rw['date'], $rw['bnkid']), 2) . '</td>';
                        echo ($stacy11);
                        $totalm98 = calcluteAmount11($rw['date'], $rw['bnkid']);
                    } else {
                        $tracy11 = '<td>' . null . '</td>';
                        echo $tracy11;
                    }
                }
                echo'</tr>';
            }            //banking deposit

            $stll = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"   AND   mode="ZGVwb3NpdA=="') or die(mysql_error());

            while ($rw1 = mysql_fetch_array($stll)) {
                echo'<tr><td class="style">' . base64_decode($rw1['date']) . '</td>'
                . '<td>' . ucwords(strtolower(base64_decode($rw1['approvedby']))) . '</td>
               <td class="style">' . base64_decode($rw1['transid']) . '</td>';
                $noofloop = $rowcount - 1;
                for ($i = 0; $i <= $noofloop; $i++) {

                    $junes = $i + 1;
                    $nooo = amountIs34($rw1['date'], $rw1['bnkid']);

                    if ($junes == $nooo) {
                        $amounted +=calcluteAmount45($rw1['date'], $rw1['bnkid']);
                        $stacy12 = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount45($rw1['date'], $rw1['bnkid']), 2) . '</td>';
                        echo'<td>';
                        $stacy12;
                        echo'</td>';
                        $totalm98 = calcluteAmount45($rw1['date'], $rw1['bnkid']);
                    } else {
                        $tracy12 = '<td>' . null . '</td>';
                        echo $tracy12;
                    }
                }
                echo'</tr>';
            }
            $s = $s + 86400;
        }
    }
    echo'</tbody><tfoot><tr><th colspan="3">Totals</th>';
    $rr = 1;
    $mcc = $noofloop + 1;
    while ($rr <= $mcc) {
        $totalls = casbookDebit(base64_encode($rr), $datefrom, $dateto);
        $total_bdebt = $totalls + $bankDebitbf;

        echo'<th>' . getsymbol() . ' ' . number_format($total_bdebt, 2) . '</th>';

        $rr++;
    }
    echo '</tr></tfoot></table>

<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled" id="sample_2" >
 <tr>
<th colspan="' . $java . '"> Credit</th> </tr>
<tr><th>Date</th><th>Payee </th><th>Details</th>';
    $sstl = mysql_query("SELECT *   FROM  addbank");
    while ($sq = mysql_fetch_array($sstl)) {
        echo'<th>' . base64_decode($sq['bankname']) . '</th>';
    }

    echo'</tr><tr><th>Balance Brought Forward As At ' . $datefrom . '   </th><th><th></th>';

    while ($roqq = mysql_fetch_array($bnkRowss)) {
        $bankCreditBF = bankCreditBF($roqq['primarykey'], $datefrom);
        echo'<th>' . number_format($bankCreditBF, 2) . '</th>';
    }
    echo'</tr><tbody>';
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            //disbursement
            $sth1 = mysql_query('select * from  loandisbursment where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"  ') or die(mysql_error());
            while ($RR = mysql_fetch_array($sth1)) {
                echo'<tr><td class="style">' . base64_decode($RR['date']) . '</td><td>' . getMembername($RR['mno']) . '</td>
                  <td class="style">' . getGlname(base64_decode($RR['glid'])) . '</td>';

                for ($i = 0; $i <= $noofloop; $i++) {
                    $myjune = $i + 1;
                    $noo = amountIs10($RR['date'], $RR['bnkid']);
                    if ($myjune == $noo) {
                        $totalm4 = calcluteAmount10($RR['date'], $RR['bnkid']);
                        $ttotal2 += calcluteAmount10($RR['date'], $RR['bnkid']);
                        $ty = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount10($RR['date'], $RR['bnkid']), 2) . '</td>';
                        echo $ty;
                        $bankTotalAmount +=$ttotal2;
                    } else {
                        $vero = '<td>' . null . '</td>';
                        echo $vero;
                    }
                }
                print'</tr>';
            }


            //paymentout
            $stmt = mysql_query('select * from   paymentout where date="' . base64_encode(date('d-M-Y', $s)) . '"  AND bnkid != "' . null . '"  ') or die(mysql_error());
            while ($Row1 = mysql_fetch_array($stmt)) {
                echo'<tr><td class="style">' . base64_decode($Row1['date']) . '</td><td>' . ucwords(strtolower(base64_decode($Row1['receiver']))) . '</td>
                  <td class="style">' . getGlname(base64_decode($Row1['transname'])) . '</td>';

                for ($i = 0; $i <= $noofloop; $i++) {
                    $myjune = $i + 1;
                    $noo = amountIsf($Row1['date'], $Row1['bnkid']);
                    if ($myjune == $noo) {
                        $totalm4 = calcluteAmount2($Row1['date'], $Row1['bnkid']);
                        $ttotal2 += calcluteAmount2($Row1['date'], $Row1['bnkid']);
                        $ty = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount2($Row1['date'], $Row1['bnkid']), 2) . '</td>';
                        echo $ty;
                        $bankTotalAmount +=$ttotal2;
                    } else {
                        $vero = '<td>' . null . '</td>';
                        echo $vero;
                    }
                }
                print'</tr>';
            }
            //banking withdraw


            $st = mysql_query('select * from  banking where date="' . base64_encode(date('d-M-Y', $s)) . '"    AND bnkid != "' . null . '"   AND   mode="d2l0aGRyYXc="') or die(mysql_error());
            while ($R = mysql_fetch_array($st)) {
                echo'<tr><td class="style">' . base64_decode($R['date']) . '</td><td>' . ucwords(strtolower(base64_decode($R['approvedby']))) . '</td>
                  <td class="style">' . (base64_decode($R['transid'])) . '</td>';

                for ($i = 0; $i <= $noofloop; $i++) {
                    $myjune = $i + 1;
                    $noo = amountIs344($R['date'], $R['bnkid']);
                    if ($myjune == $noo) {
                        $totalm4 = calcluteAmount456($R['date'], $R['bnkid']);
                        $ttotal2 += calcluteAmount456($R['date'], $R['bnkid']);
                        $ty = '<td>' . getsymbol() . ' ' . number_format(calcluteAmount456($R['date'], $R['bnkid']), 2) . '</td>';
                        echo $ty;
                    } else {
                        $vero = '<td>' . null . '</td>';
                        echo $vero;
                    }
                }
                print'</tr>';
            }

            $s = $s + 86400;
        }
    }
    echo'</tbody><tfoot><tr><th colspan="3">Totals</th>';
    $r = 1;
    $mc = $noofloop + 1;
    while ($r <= $mc) {

        $totalls = casbookCredit(base64_encode($r), datefrom, $dateto);
        $credit_bal = $bankCreditBF + $totalls;
        echo'<th>' . getsymbol() . ' ' . number_format($credit_bal, 2) . '</th>';

        $r++;
    }

    echo '</tr></tfoot></table></div>';
}

function debtform() {
    echo '<form action = "" method = "post" autocomplete = "off">
<div class = "noprint">

<div class="two">
<p>Generate Statements From Any Account</p>
<label>Select Account</label>
<select  class="form-control input-medium"  name="acc" title="Select Account" placeholder="Select Account">';

    $qry = mysql_query('select * from accounts where actype="' . base64_encode('Capital') . '" and acname!="' . base64_encode('member deposits') . '" and acname!="' . base64_encode('Xmas Savings') . '" and acname!="' . base64_encode('shares') . '" and status = "' . base64_encode("Active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }

    echo '</select>
</div>

<div class="two">
<div class="col-md-6">Date Range
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
</div>


<button  class="btn green"  name = "msubmit">Generate Statement</button>

</div>

</form>';
}

function alloanscheck() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Member No</th>
<th class="style">Member Name</th>
<th class="style">Amount</th>
<th class="style">Loan ID</th>
<th class="style">Date</th>
<th class="style">Loantime</th>
<th class="style">ID</th>
<th class="style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM loans');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . base64_decode($Row['amount']) . '</td>
<td class="style">' . loanname($Row['transid']) . '</td>
<td class="style">' . base64_decode($Row['transid']) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>
<td class="style">' . base64_decode($Row['loantime']) . '</td>
<td class="style">' . ($Row['id']) . '</td>
</tr>';
    }
    echo '</table>';
}

function debtin() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'paymentin'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

    $qry = mysql_query('select * from accounts where actype="' . base64_encode("Income") . '" and acname="' . base64_encode("debtors") . '"  and status="' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<form method="post" action="" autocomplete="off">
<div class="two">
<label>Payee</label>
<input   class="form-control input-medium" type="text" name="payee" value="' . $_REQUEST['payee'] . '" autofocus required placeholder="Name of the paying person" title="Name of the paying person" />
</div>
<div class="two">
<label>Account Name</label>
<select  class="form-control input-medium"  name="tname" required title="Payment type">
';
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class="two">
<label>Payment Type</label>
<select  class="form-control input-medium"  name="ptype" required title="Payment type">
<option></option>
<option>Cash</option>
<option>Mobile Money</option>
<option>Bank Deposit</option>
<option>Cheque</option>
<option>Check-off</option>
<option>Others</option>
</select>
</div>
<div class="two">
<label>Comments</label>
<textarea  class="form-control input-medium" name="comments" placeholder="Enter Comments" title="Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
</div>
<div class="art-layout-cell" style="width: 50%" >

<div class="two">
<label>Cheque Number</label>
<input   class="form-control input-medium" type="text" step="0.01" name="chequeno" value="0" placeholder="Enter Cheque Number" title="Enter Cheque Number" />
</div>
<div class="two">
<label>Amount</label>
<input   class="form-control input-medium" type="number" step="0.01" name="amount" min="0" required placeholder="Enter Amount" title="Enter Amount" />
</div>
<div class="two">
<label>Date</label>
<input   class="form-control input-medium" type="text" value="' . date("d-M-Y") . '" name="date" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>
<div class="two">
<input   class="form-control input-medium" type="text" name="tid" value="deb000' . $nextId . '" hidden required/>
<br><br><button  class="btn green"  name="submit" value="1">Add Transaction</button>

<br><br><button  class="btn green"  name="submit" value="2">Finish Transaction</button>

</form>
<form method="post" action="">
<div class="two">
<br><br><button  class="btn green"  name="edit">Edit Transaction</button>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

</div>
</div>
</div>
</div>';
}

function editdebtors($user, $id, $payee, $pid, $apby, $comments, $amount, $date, $session) {
    $qry = mysql_query('select * from accounts where actype="' . base64_encode("Income") . '" and acname="' . base64_encode("debtors") . '"  and status="' . base64_encode("Active") . '"') or die(mysql_error());
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<form method="post" action="" autocomplete="off">

<input   class="form-control input-medium" type="hidden" name="id" value="' . $id . '">

<div class="two">
<label>Payee</label>
<input   class="form-control input-medium" type="text" name="payee" value="' . $payee . '" autofocus required placeholder="Name of the paying person" title="Name of the paying person" pattern="[a-zA-Z] {
4,
}"/>
</div>
<div class="two">
<label>Account Name</label>
<select  class="form-control input-medium"  name="tname" required title="Payment type">
';
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class="two">
<label>Payment Type</label>
<select  class="form-control input-medium"  name="ptype" required title="Payment type">
<option></option>
<option>Cash</option>
<option>Mobile Money</option>
<option>Bank Deposit</option>
<option>Cheque</option>
<option>Check-off</option>
<option>Others</option>
</select>
</div>

<div class="two">
<label>Comments</label>
<textarea  class="form-control input-medium"  name="comments" placeholder="Enter Comments" title="Enter Comments">' . $comments . '</textarea>
</div>
</div>
<div class="art-layout-cell" style="width: 50%" >

<div class="two">
<label>Cheque Number</label>
<input   class="form-control input-medium" type="text" step="0.01" name="chequeno" value="0" value="' . number_format($amount) . '" placeholder="Enter Cheque Number" title="Enter Cheque Number"/>
</div>

<div class="two">
<label>Amount</label>
<input   class="form-control input-medium" type="number" step="0.01" name="amount" min="0" value="' . number_format($amount) . '" required placeholder="Enter Amount" title="Enter Amount"/>
</div>

<div class="two">
<label>Date</label>
<input   class="form-control input-medium" type="text" name="date" value="' . ($date) . '" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>

<div class="two">
<input   class="form-control input-medium" type="text" name="tid" value="' . gmdate("dmyhisG") . '" hidden required/>

<input   class="form-control input-medium" type="hidden" name="session" required value="' . ($session) . '" placeholder="Enter Amount" title="Enter Amount"/>

<br><br><button  class="btn green"  name="ice">Save</button>

</form>

</div>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

</div>
</div>
</div>
</div>';
}

function debtoredit() {
    echo '
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr>
<th class="style">Payee</th>
<th class="style">Cheque Number</th>
<th class="style">Transaction</th>
<th class="style">Payment Type</th>
<th class="style">Amount</th>
<th class="style">Edit</th>
<th class="style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM paymentin where transname="' . base64_encode('debtors') . '"');

    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class="style">' . base64_decode($Row['paidby']) . '</td>
<td class="style">' . base64_decode($Row['payeeid']) . '</td>
<td class="style">' . base64_decode($Row['transname']) . '</td>
<td class="style">' . base64_decode($Row['paymentype']) . '</td>
<td class="style">' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td class="style"> <a href="debtin.php?iid = ' . $Row['primarykey'] . '"><img src="images/edit.png"> </a></td>
<td class="style"> <a href="debtin.php?idel = ' . $Row['primarykey'] . '"><img src="images/delete.png"

></a></td>
</tr>';
    }
    echo '</table>';
}

function withdrawmemberform() {

    echo '<form method="post" action = "" autocomplete = "off">
        
<div class = "two">
<label>Member No.</label><br />
<select name = "mno" id="select2_sample4" onchange = "userAccWithdrawal(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row22 = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row22['membernumber']) . '">' . getMembername($row22['membernumber']) . '-' . base64_decode($row22['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div class = "two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "text" name = "apby" placeholder = "Approved by" title = "Approved by"/>
</div>


<div class = "two">
<label>Withdraw From</label><br />
<select  class="form-control input-medium select2me"  name = "facc" id="facc2" required title = "Select Account Name" data-placeholder="Select Account Name">
<option></option>
  </select>
 </div>
        
<div class = "two">
<label>Amount</label>
<input  pattern="([0-9]*[.,]*)+" class="form-control input-medium" type = "number" name = "amount" min = "0" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>

<div class = "two">
<label>Comments</label>
<textarea  class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>

<div class = "two">
<label>Date  </label>';
    $time = new DateTime('now');
    $newtime = $time->modify('-1')->format('d-m-Y');
    echo '<input type="text"  name="date"  class="form-control  input-medium  date-picker" data-date="' . $newtime . '" data-date-end-date="' . $newtime . '" data-date-format="dd-M-yyyy"  placeholder="Enter Transaction Date"  title="Enter Transaction Date"   />
  </div>
  
<div class = "two">
<input   class="form-control input-medium" type="hidden"  name = "tid" value = "' . gmdate("dmyhisG") . '" />
<br><br><button  class="btn green"  name = "with">Withdraw Savings</button>
</div>
</form>';
}

function expensedit($user, $id, $payee, $pid, $apby, $date, $reason, $cheq, $amount, $comments, $tid, $bank, $ptype, $session) {


    echo '<div class="col-md-12"><div class="col-md-4 col-md-offset-1">
<form method = "post" action = "" autocomplete = "off" name="abc">

<input class="form-control input-medium" type="hidden" name="id" value="' . $id . '">
<div class = "two">
<label>Receiver Name</label>
<input  class="form-control input-medium" type = "text" name = "recvr" value = "' . $payee . '" readonly autofocus required placeholder = "Enter receiver name" title = "Enter receiver name" /><br/>
</div>

<div class = "two">
<label>ID/Phone Number</label>
<input class = "form-control input-medium" type = "number" name = "recvrid" value = "' . $pid . '" min = "0" required placeholder = "Enter ID or Phone Number" title = "Enter ID or Phone Number" />
</div>
<div class = "two">
<label>Approved by</label>
<input  class="form-control input-medium" type = "text" name = "apby" value = "' . $apby . '" placeholder = "Approved by" title = "Approved by" required />
</div>

<div class = "two">
<label>Date</label>
<input class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" data-date-end-date="+0d" type="text"  name="date" value="' . $date . '" required placeholder="Enter Date of Transaction" title="Enter Date of Transaction"/>
</div>
<div class = "two">
<label>Reasons</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "reason" placeholder = "Enter reasons for this transaction" title = "Enter reasons fro this transaction">' . $reason . '</textarea>
</div>
<div class = "two">
<label>Select Account Name</label><br />
<select class = "form-control input-medium select2me" name = "tname"  required title = "Select Account Name"  data-placeholder= "Select Account Name">
';
    $qry = mysql_query('select * from glaccounts where status = "' . base64_encode("Active") . '" and accgroup="' . base64_encode('5') . '" and id="' . $tid . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }
    $qry = mysql_query('select * from glaccounts where status = "' . base64_encode("Active") . '" and accgroup="' . base64_encode('5') . '" ') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>   
   <div class = "two">
<label>Select Bank Account</label><br/>
<select class="form-control input-medium select2me" name = "bankname" required data-placeholder="Select Bank Account" title = "Select Bank Account" >
';

    $q = mysql_query("SELECT * FROM addbank where primarykey='" . $bank . "' ");
    while ($rq = mysql_fetch_array($q)) {
        echo '<option value="' . $rq['primarykey'] . '">' . base64_decode($rq['bankname']) . '</option>';
    }
    $q = mysql_query("SELECT * FROM addbank ");
    while ($rq = mysql_fetch_array($q)) {
        echo '<option value="' . $rq['primarykey'] . '">' . base64_decode($rq['bankname']) . '</option>';
    }
    echo '</select>
</div></div>
<div class="col-md-offset-6">
<div class = "two">
 <label>Select Payment Type</label><br />
    <select class="form-control input-medium select2me" name = "ptype" required title = "Select Payment Type"  data-placeholder="Select Payment Type">';

    $sth = mysql_query("SELECT * FROM     paymentmode where id='" . $ptype . "'  ");
    while ($row2 = mysql_fetch_array($sth)) {
        echo '<option value="' . $row2['id'] . '">' . base64_decode($row2['mode']) . '</option>';
    }
    $sth = mysql_query("SELECT * FROM     paymentmode   ");
    while ($row2 = mysql_fetch_array($sth)) {
        echo '<option value="' . $row2['id'] . '">' . base64_decode($row2['mode']) . '</option>';
    }
    echo '</select>
</div>

<div class = "two">
<label>Cheque No.</label>
<input class = "form-control input-medium" type = "number" name = "cheque" required placeholder = "Enter Cheque Number" value = "' . $cheq . '" title = "Enter Cheque Number" pattern = "[0-9]"/>
</div>
<div class = "two">
<label>Select Currency</label><br />
<select id="one" class="form-control input-medium select2me" name = "one"  required title = "Select Currency" data-placeholder="Select Currency">
<option value="1">' . getsymbol() . '</option>
<option value="' . getaed() . '">AED</option>
<option value="' . getusd() . '">USD</option>
</select>
</div>
<div class = "two">
<label>Amount</label>
<input  class="form-control input-medium" type = "number" name = "two" step="0.0001" value="' . $amount . '" required placeholder = "Enter Amount title = "Enter Amount"  id = "two" onkeyup = "amultiply();" pattern="([0-9]*[.,]*)+"/>
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input class = "form-control input-medium" type = "number" name = "res" step="0.0001" value="' . $amount . '" required placeholder = "Enter Amount ' . getsymbol() . '" title = "Enter Amount in ' . getsymbol() . '" id = "res"/>
</div>
</div>

<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $comments . ' </textarea>
</div>

<input class = "form-control input-medium" type = "hidden" name = "tid" value = "' . $tid . '" hidden required/>
<input class = "form-control input-medium" type = "hidden" name = "session" required value = "' . ($session) . '" placeholder = "Enter Amount" title = "Enter Amount"/>
<div class = "two">
<br><button class = "btn green" class = "btn green" name = "btnupdate">Update</button>
</div>

</form></div>';
}

function pettyexpensedit($user, $id, $payee, $pid, $apby, $date, $reason, $cheq, $amount, $comments, $tid, $session) {

    $qry = mysql_query('           select * from glaccounts where status = "' . base64_encode("Active") . '"') or die(mysql_error());
    echo ' < div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "post" action = "" autocomplete = "off" name = "abc">

<input class = "form-control input-medium" type = "hidden" name = "id" value = "' . $id . '">
<div class = "col-md-4">
<div class = "two">
<label>Receiver Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control type = "text" name = "recvr" value = "' . $payee . '" autofocus required placeholder = "Enter receiver name" title = "Enter receiver name" />
</div>

<div class = "two">
<label>ID/Phone Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control type = "number" name = "recvrid" value = "' . $pid . '" min = "0" required placeholder = "Enter ID or Phone Number" title = "Enter ID or Phone Number" />
</div>
<div class = "two">
<label>Approved by</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control type = "text" name = "apby" value = "' . $apby . '" placeholder = "Approved by" title = "Approved by" required />
</div>

<div class = "two">
<label>Date</label>
<input class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" type="text" value = "' . $date . '" name = "date" required placeholder = "Enter Date of Transaction" title = "Enter Date of Transaction"/>
</div>
<div class = "two">
<label>Reasons</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control name = "reason" placeholder = "Enter reasons for this transaction" title = "Enter reasons fro this transaction">' . $reason . '</textarea>
</div>

</div>
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Account Name</label>
<select class = "form-control input-medium" name = "tname" value = "' . $_REQUEST['tname'] . '" required title = "Payment type">
<option></option>
';
    while ($row = mysql_fetch_array($qry)) {
        echo '<option>' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>
<div class = "two">
<label>Payment Type</label>
<select class = "form-control input-medium" name = "ptype" value = "" required title = "Payment type">
<option></option>
<option>Cash</option>
<option>Bank Deposit</option>
<option>Mobile Money</option>
<option>Cheque</option>
<option>Check-off</option>
<option>Others</option>
</select>
</div>
</div>
<div class = "col-md-4">
<div class = "two">
<label>Cheque No.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class = "form-control type = "number" name = "cheque" required placeholder = "Enter Cheque Number" value = "' . $cheq . '" title = "Enter Cheque Number" />
</div>
<div class = "two">
<label>Select Currency</label>
<select id = "one" class = "form-control input-medium" name = "one" value = "' . $_REQUEST['curr'] . '" required title = "Select Currency">
<option value = "1">' . getsymbol() . '</option>
<option value = "' . getaed() . '" > AED</option>
<option value = "' . getusd() . '" > USD</option>
</select>
</div>
<div class = "two">
<label>Amount</label>
<input class = "form-control input-medium" type = "number" name = "two" min = "0" value = "" required placeholder = "Enter Amount" title = "Enter Amount" pattern = "[0-9]{1,}" id = "two" onkeyup = "amultiply();"/>
</div>
<div id = "txtHint">
<div class = "two">
<label>Amount in ' . getsymbol() . '</label>
<input class = "form-control input-medium" type = "number" name = "res" min = "0" value = "" required placeholder = "Enter Amount in ' . getsymbol() . '" title = "Enter Amount in ' . getsymbol() . '" id = "res"/>
</div>
</div>

<div class = "two">
<label>Comments</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class = "form-control  name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $comments . '</textarea>
</div>

<input  class="form-control input-medium" type = "hidden" name = "tid" value = "' . $tid . '" hidden required/>
<input class = "form-control input-medium" type = "hidden" name = "session" required value = "' . ($session) . '" placeholder = "Enter Amount" title = "Enter Amount"/>
<div class = "two">
<br><br><button class = "btn green" class = "btn green" name = "edi">Edit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
</div>
</div>
</div>
</div>
</div>';
}

function expedit($datefrom, $dateto) {

    echo '<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
<tr><th>Date</th><th>Receiver</th><th>Approved By</th><th>Transaction</th><th>Payment Type</th><th>Amount</th>';
$write = check_write_permission();
if($write == 1){//if has write permission
    echo '<th>Edit</th><th>Delete</th>';
}
echo '</tr>

</thead>';

    $Rows = mysql_query('SELECT * FROM paymentout   ');

    while ($Row = mysql_fetch_array($Rows)) {


        $dd = base64_decode($Row['date']);
        $qtime = strtotime($dd);
        $dd1 = date("Y-m-d", $qtime);

//date range difference
        $now = time(); // or your date as well
        $your_date = strtotime($dd1);
        $datediff = $now - $your_date;
        $editday = floor($datediff / (60 * 60 * 24));

        $person = "SELECT * FROM settings";
        $query = mysql_query($person);
        if (mysql_num_rows($query) == 1) {
            $row1 = mysql_fetch_array($query);
            $num = base64_decode($row1['days']);
        }


        echo' <tr>
<td>' . base64_decode($Row['date']) . '</td>
<td>' . base64_decode($Row['receiver']) . '</td>
<td>' . base64_decode($Row['approvedby']) . '</td>
<td>' . getglacc(base64_decode($Row['transname'])) . '</td>';

        if (is_numeric(base64_decode($Row['paymentype']))) {
            echo'<td>' . paytype(base64_decode($Row['paymentype'])) . '</td>';
        } else {
            echo'<td>' . base64_decode($Row['paymentype']) . '</td>';
        }
        echo'<td>' . getsymbol() . ' ' . number_format(base64_decode($Row['amount']), 2) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        if ($num > $editday) {
            $write = check_write_permission();
            if($write == 1){//if has write permission
                echo '<td><form action="" method="POST"><input type="hidden" name="xid" value="' . $Row['primarykey'] . '" /> <button type="submit" name="btnedit" onClick="' . $confirmedit . '" ><img src = "images/edit.png"> </button></form></td>';
            }
        } else {
            echo'<td class = "style" style="font-size:11px; color:red;"> Edit period is over </td>';
        }

        if ($num > $editday) {
            $write = check_write_permission();
            if($write == 1){//if has write permission
                echo'<td> <a onClick="' . $confirmdelete . '"  href = "expensesedit.php?edel=' . $Row['primarykey'] . '&amount=' . $Row['amount'] . '&date=' . $Row['date'] . '"><img src = "images/delete.png"></a></td></tr>';
            }
        } else {
            echo'<td class = "style" style="font-size:11px; color:red;"> Delete period is over </td>';
        }
    }

    echo '</table>';
}

function pettyexpedit() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Date</th>
<th class = "style">Receiver</th>
<th class = "style">Approved By</th>
<th class = "style">Transaction</th>
<th class = "style">Payment Type</th>
<th class = "style">Amount</th>
<th class = "style">Edit</th>
<th class = "style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM paymentout');

    while ($Row = mysql_fetch_array($Rows)) {

        $dd = base64_decode($Row['date']);

        $qtime = strtotime($dd);
        $dd1 = date("Y-m-d", $qtime);

//date range difference
        $now = time(); // or your date as well
        $your_date = strtotime($dd1);
        $datediff = $now - $your_date;
        $editday = floor($datediff / (60 * 60 * 24));

        $person = "SELECT * FROM settings";
        $query = mysql_query($person);
        if (mysql_num_rows($query) == 1) {
            $row1 = mysql_fetch_array($query);
            $num = base64_decode($row1['days']);
        }

        echo' <tr>
<td class = "style">' . base64_decode($Row['date']) . '</td>
<td class = "style">' . base64_decode($Row['receiver']) . '</td>
<td class = "style">' . base64_decode($Row['approvedby']) . '</td>
<td class = "style">' . getglacc(base64_decode($Row['transname'])) . '</td>
<td class = "style">' . base64_decode($Row['paymentype']) . '</td>
<td class = "style">' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        if ($num > $editday) {

            echo '<td class = "style"> <a onClick="' . $confirmedit . '" href = "pettycash.php?xid = ' . $Row['primarykey'] . '"><img src = "images/edit.png"> </a></td>';
        } else {
            echo '<td class = "style" style="font-size:11px;color:red;"> Edit period is over </td>';
        }
        if ($num > $editday) {
            echo '<td class = "style"> <a onClick="' . $confirmdelete . '" href = "pettycash.php?edel = ' . $Row['primarykey'] . '&amount=' . $Row['amount'] . '&date=' . $Row['date'] . '"><img src = "images/delete.png"></a></td></tr>';
        } else {
            echo '<td class = "style" style="font-size:11px;color:red;"> Edit period is over </td>';
        }
    }
    echo '</table>';
}

function tbalbal($user, $datefrom, $dateto) {

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
</div>
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" >
<tr>
<tr><th colspan = "3">' . compname() . '</th></tr>
<tr><td colspan = "3">' . $datefrom . ' to ' . $dateto . '</td></tr>
</tr>
<tr><th colspan = "3">TRIAL BALANCE</th></tr>
<tr><tr><th class = "style">Account</th><th class = "style">Debit</th><th class = "style">Credit</th></tr>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {


            $qry = mysql_query('select * from membercontribution where transaction = "' . ("member deposits") . '" and date = "' . base64_encode(date("d-M-Y", $s)) . ' "') or die(mysql_errno());
            while ($row = mysql_fetch_array($qry)) {
                $sum+=base64_decode($row['amount']);
            }
            $qary = mysql_query('select * from sharesbf where status = "' . base64_encode("active") . '"') or die(mysql_error());
            while ($rslt = mysql_fetch_array($qary)) {
                $sam+=base64_decode($rslt['sharesbf']);
            }
            $accs+= $sum + $sam;
            $aqs = $sum + $sam;

            echo '<tr>
<td class = "style">Compulsory Savings</td>
<td class = "style">' . getsymbol() . '. 0.00</td><td class = "style">' . getsymbol() . '.' . number_format($aqs, 2) . '</td></tr>';

            $s = $s + 86400;
        }

        $subb = $sumba + $sumbc;

        $sumall = $sucx + $sumxy + $sucmz + $suyzz + $sumba + $sumbc;

        $sumbig = $sumall + $sum2a;

        echo '<tr><th class = "style">TOTAL</th><th class = "style">' . getsymbol() . '.' . number_format($ssp, 2) . '</th>
<th class = "style">' . getsymbol() . '.' . number_format($accs, 2) . '</th></tr>';
    }

    echo '</table></div></div>
</form></div>';
    echo '<div class = "col-md-4"><div class = "noprint"><br><br><button class = "btn green" value = "Print this page" onclick = "print()">Print</button></div></div>';
}

function thebaltrial($user, $datefrom, $dateto) {
    $mqry = mysql_query('select * from users where id = "' . ($user) . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {
//$datefrom = $dfrom . '-' . $mfrom . '-' . $yfrom;
//$dateto = $dto . '-' . $mto . '-' . $yto;
//start date 2001-02-23
        /* $sm = date("m", strtotime($mfrom));
          $sd = $dfrom;
          $sy = $yfrom;
          //
          //$tm = date("m", strtotime($mto));
          $tm = date("m", strtotime($mto));
          //$td = $dto;
          $td = $dto;
          //$ty = $yto;
          $ty = $yto;

          $stt = mktime(0, 0, 0, $tm, $dto, $yto);
          $ddto = date("d", $stt);
          $mmto = date("M", $stt);
          $yyto = date("Y", $stt);
         */
//utc of start and end dates
        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);
        if ($t < $s) {
            echo '<span class = "red">Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" ><tr>
<tr><th colspan = "4">' . compname() . '</th></tr>
<tr><th class = "style">Date Range</th><th class = "style">Member Number</th><th colspan = "2">Member Name</th></tr>
<tr><td class = "style"><center>' . $datefrom . ' to ' . $dateto . '</center></td><td class = "style"><center>' . $mno . '</center></td><td colspan = "2"><center>' . getMembername(base64_encode($mno)) . '</center></td></tr>

</tr>
<tr><th colspan = "4">ACCOUNT SUMMARY</th></tr>
<tr><th class = "style">Date</th><th class = "style">Transaction</th><th colspan = "2">Balances</th></th>';

            while ($s <= $t) {

                $zxxqry = mysql_query('select * from sharesbf where date = "' . base64_encode(date("d-M-Y", $s)) . ' "') or die(mysql_error());
                if (mysql_num_rows($zxxqry) >= 1) {
                    while ($vow = mysql_fetch_array($zxxqry)) {
                        $bals = $vow['sharesbf'];
                        $abb+=base64_decode($bals);
                    }
                }

                $qry = mysql_query('select * from membercontribution where transaction = "' . base64_encode('member savings') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . ' "') or die(mysql_error());
                if (mysql_num_rows($qry) >= 1) {
                    while ($vow = mysql_fetch_array($qry)) {
                        $balls = $vow['amount'];
                        $bbb+=base64_decode($balls);
                    }
                }

                $qury = mysql_query('select * from membercontribution where transaction = "' . base64_encode('member shares') . '" and date = "' . base64_encode(date("d-M-Y", $s)) . ' "') or die(mysql_error());
                if (mysql_num_rows($qury) >= 1) {
                    while ($vow = mysql_fetch_array($qury)) {
                        $banls = $vow['amount'];
                        $cbb+=base64_decode($banls);
                    }
                }

                $cry = mysql_query('select * from paymentin where transname = "' . base64_encode('penalties') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($cry)) {
                    $canls = ($row['amount']);
                    $ebb+=base64_decode($canls);
                }

                $cqy = mysql_query('select * from paymentin where transname = "' . base64_encode('loan interest') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($cqy)) {
                    $canls = ($row['amount']);
                    $fbb+=base64_decode($canls);
                }

                $cy = mysql_query('select * from paymentin where transname = "' . base64_encode('registration fees') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($cy)) {
                    $canls = ($row['amount']);
                    $gbb+=base64_decode($canls);
                }

                $ry = mysql_query('select * from paymentin where transname = "' . base64_encode('sale of loan form') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($ry)) {
                    $canls = ($row['amount']);
                    $hbb+=base64_decode($canls);
                }

                $qr = mysql_query('select * from paymentin where transname = "' . base64_encode('other incomes') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($qr)) {
                    $canls = ($row['amount']);
                    $ibb+=base64_decode($canls);
                }

                $cr = mysql_query('select * from paymentin where transname = "' . base64_encode('Withdrawal Fee') . '"') or die(mysql_errno());
                while ($row = mysql_fetch_array($cr)) {
                    $canls = ($row['amount']);
                    $jbb+=base64_decode($canls);
                }

                $s = $s + 86400; //increment date by 86400 seconds(1 day)

                $bal = $sin - $sumout;
            }

            echo '<tr><th class = "style">Member Savings</td><td class = "style"><center>' . getsymbol() . '.' . number_format($abb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($abb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Member Shares</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Management Fee</td><td class = "style"><center>' . getsymbol() . '.' . number_format($cbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($cbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Penalties</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Loan Interest</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Registration Fees</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Sale of Loan Form</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Other Incomes</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '<tr><th class = "style">Withdrawal Fee</td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td><td class = "style"><center>' . getsymbol() . '.' . number_format($bbb, 2) . '</center></td></tr>';
            echo '</table>';
        }
    } else {
        echo '<span class = "red">Sorry You Are Not Permitted to View This Page.</span></br>';
    }
    echo '<div class = "col-md-4"><div class = "noprint"><br><br><button class = "btn green" value = "Print this page" onclick = "print()">Print</button></div></div>';
}

function standingorders() {

    echo '
<iframe height="400" width="1100" seamless scrolling="yes" sandbox="allow-scripts" src="wawa.php?acc=1&unt=2&amount=3&checkbox=4">
</iframe>';
}

function loancc() {

    echo '<form name="" method="post" action="">
<div class = "two">
<label>Select Loan</label>
<select name="loant" title= "Select Loan to Pay" required>
<option></option>';

    $qry = mysql_query('select * from loansettings where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['lname']) . '</option>';
    }

    echo ' </select>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "four">
<button name="loan">Check List</button>
</div>
</div>
</div>
</div>
</form>';
}

function newdebtor() {
    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-8">
<div class="col-md-4">

<label>Debtor Name.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" class="form-control input-medium" name = "dname" required title = "Enter Debtor Name" placeholder = "Enter Debtor Name">

<label>Address</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" class="form-control input-medium" name = "address" required title = "Enter Debtor Address" placeholder = "Enter Debtor Address">

<label>Debtor Contacts.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="number" class="form-control input-medium" name = "dcont" required title = "Enter Debtor Contacts" placeholder = "Enter Debtor Contacts">

<label>Debtor Email.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="email" class="form-control input-medium" name = "demail" title = "Enter Debtor Email" placeholder = "Enter Debtor Email">

</div>
<div class="col-md-offset-8">

<label>Debtor KRA Pin.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" class="form-control input-medium" name = "kra" required title = "Enter Debtor KRA Pin" placeholder = "Enter Debtor KRA Pin">

<label>Payment Terms </label>
<select class="form-control input-medium" name = "terms" required placeholder = "Enter Payment Terms" title = "Enter Payment Terms "/>
<option>Due End Month</option>
<option>Due After 3 Months</option>
</select>

<label>Credit Status </label>
<select  name = "creditstatus" class="form-control input-medium" required placeholder = "Enter Credit Status" title = "Enter Credit Status "/>
<option>Good</option>
<option>In Liquidation</option>
<option>Watch</option>
</select><br />

<button class="btn green" name = "create">Add Debtor</button>

</form>
<form action = "" method = "GET" autocomplete = "off">';
    $write = check_write_permission();
    if($write == 1){//if has write perission(edit)
    echo '<button class="btn red" name = "gedit">Edit Debtors</button>';
    }
echo '</div>
</div>
</form>';
}

function debtorsedit($id, $dname, $address, $dcont, $demail, $kra, $terms, $creditstatus, $status) {
    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-8">
<div class="col-md-4">
<label>Debtor Name.</label>
<input type="text" class="form-control input-medium" name = "dname" value="' . $dname . '" required title = "Enter Debtor Name" placeholder = "Enter Debtor Name">
<input type="hidden" name = "id" value="' . $id . '" required>

<label>Debtor Address </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $address . '" name = "address" required placeholder = "Enter Debtor Address " title = "Enter Debtor Address "/>

<label>Debtor Contacts </label>
<input type = "text" class="form-control input-medium" value="' . $dcont . '" name = "dcont" required placeholder = "Enter Debtor Contacts " title = "Enter Debtor Contacts "/>

<label>Debtor Email </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $demail . '" name = "demail" placeholder = "Enter Debtor Email " title = "Enter Debtor Email "/>
</div>
<div class="col-md-offset-8">
<label>Debtor KRA Pin </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $kra . '" name = "kra" required placeholder = "Enter Debtor KRA Pin " title = "Enter Debtor KRA Pin "/>

<label>Payment Terms </label>
<select name = "terms" class="form-control input-medium" required placeholder = "Enter Payment Terms" title = "Enter Payment Terms "/>
<option>Due End Month</option>
<option>Due After 3 Months</option>
</select>

<label>Status </label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>

<label>Credit Status </label>
<select name = "creditstatus" class="form-control input-medium" required placeholder = "Enter Credit Status" title = "Enter Credit Status "/>
<option>Good</option>
<option>In Liquidation</option>
<option>Watch</option>
</select>

<br/>
<button class="btn green" name = "save">Edit Debtor</button>
</div></div>
</form>';
}

function newcreditor() {
    echo '<form method="post" action="" autocomplete="off" id="23">
<div class="col-md-8">
<div class="col-md-4">
<label>Creditor Name.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" name = "dname" id="dname" class="form-control input-medium" required title = "Enter Creditor Name" placeholder = "Enter Creditor Name">

<label>Address</label>
<input type="text" name = "address" id="address" class="form-control input-medium" required title = "Enter Creditor Address" placeholder = "Enter Creditor Address">

<label>Creditor Contacts.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="number" name = "dcont" id= "dcont" class="form-control input-medium" required title = "Enter Creditor Contacts" placeholder = "Enter Creditor Contacts">

</div>
<div class="col-md-offset-6">
<label>Creditor Email.</label>
<input type="email" name = "demail" id="email" class="form-control input-medium" title = "Enter Creditor Email" placeholder = "Enter Creditor Email">
<label>Creditor KRA Pin.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" name = "kra" id="kra" class="form-control input-medium" required title = "Enter Creditor KRA Pin" placeholder = "Enter Creditor KRA Pin">

<label>Payment Terms </label>
<select name = "terms" id="terms" class="form-control input-medium" required placeholder = "Enter Payment Terms" title = "Enter Payment Terms "/>
<option>Due End Month</option>
<option>Due After 3 Months</option>
</select>
<br />
<button class="btn green" name = "create">Add Creditor</button>

</form>
<form action = "" method = "GET" autocomplete = "off">';
    $write = check_write_permission();
    if($write == 1){
    echo '<button class="btn red" name = "gedit">Edit Creditors</button>';
    }
echo '</div></div>
</form>';
}

function editcreditors() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Creditor Name</th>
<th class = "style">Address</th>
<th class = "style">Contacts</th>
<th class = "style">Email</th>
<th class = "style">KRA Pin</th>
<th class = "style">Terms</th>
<th class = "style">Status</th>';
    $write = check_write_permission();
    if($write == 1){
    echo '<th class = "style">Edit</th>
    <th class = "style">Delete</th>';
    }
echo '</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM addcreditor');
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['dname']) . '</td>
<td class = "style">' . base64_decode($Row['address']) . '</td>
<td class = "style">' . base64_decode($Row['dcont']) . '</td>
<td class = "style">' . base64_decode($Row['demail']) . '</td>
<td class = "style">' . base64_decode($Row['kra']) . '</td>
<td class = "style">' . base64_decode($Row['terms']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>';
      if($write == 1){  
        echo '<td class = "style"> <a onClick="' . $confirmedit . '" href = "addcreditors.php?gid = ' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
        <td class = "style"> <a onClick="' . $confirmdelete . '" href = "addcreditors.php?credel = ' . $Row['id'] . '"><img src = "images/delete.png"></a></td>';
      }
echo '</tr>';
    }
    echo '</table>
';
}

function creditorsedit($id, $dname, $address, $dcont, $demail, $kra, $terms, $status) {
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

<form method="post" action="" autocomplete="off">
<div class="two">
<label>Creditor Name.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" class="form-control input-medium" name = "dname" value="' . $dname . '" required title = "Enter Creditor Name" placeholder = "Enter Creditor Name">
<input type="hidden" name = "id" value="' . $id . '" required>

<label>Creditor Address </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $address . '" name = "address" required placeholder = "Enter Creditor Address " title = "Enter Creditor Address "/>

<label>Creditor Contacts </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $dcont . '" name = "dcont" required placeholder = "Enter Creditor Contacts " title = "Enter Creditor Contacts "/>

<label>Creditor Email </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $demail . '" name = "demail" placeholder = "Enter Creditor Email " title = "Enter Creditor Email "/>

<label>Creditor KRA Pin </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $kra . '" name = "kra" required placeholder = "Enter Creditor KRA Pin " title = "Enter Creditor KRA Pin "/>

<label>Payment Terms </label>
<select name = "terms" class="form-control input-medium" required placeholder = "Enter Payment Terms" title = "Enter Payment Terms "/>
<option>Due End Month</option>
<option>Due After 3 Months</option>
</select>

<label>Status </label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<button class="btn green" name = "save">Edit Creditor</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function issueinvoice() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'issueinvoice'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

    echo '<form method="post" action="" autocomplete="off" id="mv1">
<div class="col-md-8">
<div class="col-md-4">
<label>Select Debtor</label>
<select name = "debtor" class="form-control input-medium" required title = "Select Debtor">
<option></option>';

    $Rows = mysql_query('SELECT * FROM addebtor');
    while ($row2 = mysql_fetch_array($Rows)) {
        echo '<option value="' . ($row2['id']) . '">' . base64_decode($row2['dname']) . '</option>';
    }
    echo '</select>';
    echo '<label>Date of Invoice.</label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  name = "dateinvoice" required title = "Enter Date of Invoice" placeholder = "Enter Date of Invoice">

<label>Select GL Account</label>
<select class="form-control input-medium" name = "glacc" required title = "Select GL Account">
<option></option>';

    $row4 = mysql_query('SELECT * FROM glaccounts');
    while ($row3 = mysql_fetch_array($row4)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['accode']) . ' - ' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select>';
    echo '<label>Amount</label>
<input class="form-control input-medium" type="number" name = "amount" required title = "Enter Amount" placeholder = "Enter Amount">
</div>
<div class="col-md-offset-6">
<label>Invoice Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type="text" name = "invono" title = "Enter Invoice Number" placeholder = "Enter Invoice Number" value="Inv00' . $nextId . '" >

<label>Due Date</label>
<input class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  name = "duedate" required title = "Enter Due Date" placeholder = "Enter Due Date">

<label>Status </label>
<select class="form-control input-medium" name = "status" required placeholder = "Enter Payment Status" title = "Enter Payment Status "/>
<option>Paid</option>
<option>Unpaid</option>
</select>

<label>Description</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" name = "description" required title = "Enter Description" placeholder = "Enter Description"></textarea>
<br />
<button class="btn green" name = "create">Issue Invoice</button>

</form>

<form action = "" method = "GET" autocomplete = "off">';
$write = check_write_permission();
if($write == 1){//if has the right to edit
    echo '<button class="btn red" name = "gedit">Edit Issued Invoices</button>';
}
echo '</div>
</form>';
}

function editissinvoice() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead>
<tr>
<th class = "style">Debtor Name</th>
<th class = "style">Invoiced Date</th>
<th class = "style">GL Account</th>
<th class = "style">Amount</th>
<th class = "style">Invoice Number</th>
<th class = "style">Due Date</th>
<th class = "style">Description</th>
<th class = "style">Status</th>';
    $write = check_write_permission();
    if($write == 1){//if has the right to edit or delete
    echo '<th class = "style">Edit</th>
    <th class = "style">Delete</th>';
    }
echo '</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM issueinvoice');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . getdebtor(base64_decode($Row['debtorid'])) . '</td>
<td class = "style">' . base64_decode($Row['invdate']) . '</td>
<td class = "style">' . getglacc(base64_decode($Row['glacc'])) . '</td>
<td class = "style">' . base64_decode($Row['amount']) . '</td>
<td class = "style">' . base64_decode($Row['invno']) . '</td>
<td class = "style">' . base64_decode($Row['duedate']) . '</td>
<td class = "style">' . base64_decode($Row['description']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>';
        if($write == 1){//if has the right to edit or delete
        echo '<td class = "style"> <a onClick="' . $confirmedit . '" href = "issueinvoice.php?gid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
        <td class = "style"> <a onClick="' . $confirmdelete . '" href = "issueinvoice.php?issdel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td>';
        }
echo '</tr>';
    }
    echo '</table>
';
}

function invoicedit($id, $dname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-4">
<div class="two">
<label>Debtor Name.</label>
<input type="text" class="form-control input-medium" name = "deb" readonly value="' . getdebtor($dname) . '" required title = "Enter Debtor Name" placeholder = "Enter Debtor Name">
<input type="hidden" name = "id" value="' . $id . '" required>
<input type="hidden" name = "debtor" value="' . $dname . '" required>
</div>

<div class = "two">
<label>Invoiced Date</label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . $date . '" name = "invdate" required placeholder = "Enter Invoiced Date" title = "Enter Invoiced Date"/>
</div>

<div class = "two">
<label>Select GL Account</label>
<select name = "glacc" class="form-control input-medium" required title = "Select GL Account">
<option></option>';

    $row = mysql_query('SELECT * FROM glaccounts');
    while ($row3 = mysql_fetch_array($row)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['accode']) . ' - ' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class = "two">
<label>Amount </label>
<input type = "text" class="form-control input-medium" value="' . $amt . '" name = "amount" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>
</div>
<div class="col-md-offset-6">
<div class = "two">
<label>Invoice Number</label>
<input type = "text" class="form-control input-medium" value="' . $invno . '" name = "invno" placeholder = "Enter Invoice Number " title = "Enter Invoice Number "/>
</div>

<div class = "two">
<label>Due Date </label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . $duedate . '" name = "duedate" required placeholder = "Enter Due Date " title = "Enter Due Date "/>
</div>

<div class = "two">
<label>Status</label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Payment Status" title = "Enter Payment Status "/>
<option>Paid</option>
<option>Unpaid</option>
</select>
</div>

<div class = "two">
<label>Description</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" name = "description" class="form-control input-medium" required title = "Enter Description" placeholder = "Enter Description">' . $desc . '</textarea>
</div>
</div>
<div class="col-md-offset-3">
<button class="btn green" name = "save">Edit Issued Invoice</button>
</div>
</form>';
}

function receiveinvoice() {

    $result = mysql_query("SHOW TABLE STATUS LIKE 'receiveinvoice'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];

    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-8">
<div class="col-md-4">
<div class="two">
<label>Select Creditor</label>
<select name = "creditor" class="form-control input-medium" required title = "Select Creditor">
<option></option>';

    $Rows = mysql_query('SELECT * FROM addcreditor');
    while ($row2 = mysql_fetch_array($Rows)) {
        echo '<option value="' . ($row2['id']) . '">' . base64_decode($row2['dname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class = "two">
<label>Date of Invoice.</label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" name = "dateinvoice" required title = "Enter Date of Invoice" placeholder = "Enter Date of Invoice">
</div>

<div class = "two">
<label>Select GL Account</label>
<select name = "glacc" class="form-control input-medium" required title = "Select GL Account">
<option></option>';

    $row4 = mysql_query('SELECT * FROM glaccounts');
    while ($row3 = mysql_fetch_array($row4)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['accode']) . ' - ' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class = "two">
<label>Amount</label>
<input type="number" class="form-control input-medium" name = "amount" required title = "Enter Amount" placeholder = "Enter Amount">
</div>


<div class = "two">
<label>Invoice Number</label>
<input type="text" class="form-control input-medium" name = "invono" title = "Enter Invoice Number" placeholder = "Enter Invoice Number" value="Inv00' . $nextId . '" >
</div>
</div>
<div class="col-md-offset-6">

<div class = "two">
<label>Due Date</label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" name = "duedate" required title = "Enter Due Date" placeholder = "Enter Due Date">
</div>

<div class = "two">
<label>Status </label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Payment Status" title = "Enter Payment Status "/>
<option>Paid</option>
<option>Unpaid</option>
</select>
</div>

<div class = "two">
<label>Description</label>
<textarea name = "description" class="form-control input-medium" required title = "Enter Description" placeholder = "Enter Description"></textarea>
</div>
<br/>
<button class="btn green" name = "create">Receive Invoice</button>
</form>

<form action = "" method = "post" autocomplete = "off">';
    $write = check_write_permission();
    if($write == 1){
    echo '<button class="btn red" name = "gedit">Edit Received Invoices</button>';
    }
echo '</div></div>
</form>';
}

function editrecinvoice() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Creditor Name</th>
<th class = "style">Invoiced Date</th>
<th class = "style">GL Account</th>
<th class = "style">Amount</th>
<th class = "style">Invoice Number</th>
<th class = "style">Due Date</th>
<th class = "style">Description</th>
<th class = "style">Status</th>';
    $write =check_write_permission();
    if($write == 1){
    echo '<th class = "style">Edit</th>
    <th class = "style">Delete</th>';
    }
echo '</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM receiveinvoice');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . getcreditor(base64_decode($Row['creditorid'])) . '</td>
<td class = "style">' . base64_decode($Row['invdate']) . '</td>
<td class = "style">' . getglacc(base64_decode($Row['glacc'])) . '</td>
<td class = "style">' . base64_decode($Row['amount']) . '</td>
<td class = "style">' . base64_decode($Row['invno']) . '</td>
<td class = "style">' . base64_decode($Row['duedate']) . '</td>
<td class = "style">' . base64_decode($Row['description']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>';
        if($write == 1){//if can edit or delete
echo '<td class = "style"> <a onClick="' . $confirmedit . '" href = "receiveinvoice.php?gid = ' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
<td class = "style"> <a onClick="' . $confirmdelete . '" href = "receiveinvoice.php?recel = ' . $Row['id'] . '"><img src = "images/delete.png"</a></td>';
        }
echo '</tr>';
    }
    echo '</table>
';
}

function rinvoicedit($id, $dname, $date, $glacc, $amt, $invno, $duedate, $desc, $status) {
    echo '<form method="post" action="" autocomplete="off">
<div class="col-md-8">
<div class="col-md-4">
<label>Creditor Name.</label>
<input type="text" class="form-control input-medium" name = "cred" readonly value="' . getcreditor($dname) . '" required title = "Enter Creditor Name" placeholder = "Enter Creditor Name">
<input type="hidden" name = "id" value="' . $id . '" required>
<input type="hidden" name = "creditor" value="' . $dname . '" required>
</div>

<div class = "two">
<label>Invoiced Date</label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . $date . '" name = "invdate" required placeholder = "Enter Invoiced Date" title = "Enter Invoiced Date"/>
</div>

<div class = "two">
<label>Select GL Account</label>
<select name = "glacc" class="form-control input-medium" required title = "Select GL Account">
<option></option>';

    $row = mysql_query('SELECT * FROM glaccounts');
    while ($row3 = mysql_fetch_array($row)) {
        echo '<option value="' . ($row3['id']) . '">' . base64_decode($row3['accode']) . ' - ' . base64_decode($row3['acname']) . '</option>';
    }
    echo '</select>';
    echo '</div>

<div class = "two">
<label>Amount </label>
<input type = "text" class="form-control input-medium" value="' . $amt . '" name = "amount" required placeholder = "Enter Amount" title = "Enter Amount"/>
</div>
</div>
<div class="col-md-offset-6">

<div class = "two">
<label>Invoice Number</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $invno . '" name = "invno" placeholder = "Enter Invoice Number " title = "Enter Invoice Number "/>
</div>

<div class = "two">
<label>Due Date </label>
<input type="text" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . $duedate . '" name = "duedate" required placeholder = "Enter Due Date " title = "Enter Due Date "/>
</div>

<div class = "two">
<label>Status</label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Payment Status" title = "Enter Payment Status "/>
<option>Paid</option>
<option>Unpaid</option>
</select>
</div>

<div class = "two">
<label>Description</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" name = "description" class="form-control input-medium" required title = "Enter Description" placeholder = "Enter Description">' . $desc . '</textarea>
</div>
<br />
<button class="btn green" name = "save">Edit Received Invoice</button>
</div></div></form>';
}

function invoicereceipt($user, $one, $dname, $date1, $glacc, $amt, $invno, $date2, $desc, $status) {
    $conqry = mysql_query('select * from issueinvoice where id = "' . $one . '"') or die(mysql_error());
    $mist = mysql_fetch_array($conqry);
    $id = "javascript:Print('stylized')";
    echo '<body onload = "' . $id . '"><div id = "stylized">
<table width = "100%">
<tr>
<td colspan="2"><center>
<div class="art-layout-cell" style="width: 100%" >
<img src="photos/' . logo() . '" width="200px" height="100px"/>
</div></center>
</td>
</tr>
<tr>
<td colspan = "2"><center>' . compname() . '</center>
</td>
</tr>

<tr><td colspan = "2"><center>' . address() . '</center></td>
<tr><td colspan = "2"><center>' . email() . '</center></td>
</tr>
<tr><td colspan = "2"><center>' . date("d-M-Y h:i:s") . '</center></td></tr>
<tr><td colspan = "2"><center> Debtors Invoice </center></td></tr>
<tr><td>Debtor:</td><td>' . getdebtor($dname) . '</td></tr>
<tr><td>Date of Invoice:</td><td>' . $date1 . '</td></tr>
<tr><td>GL Account:</td><td>' . getglacc($glacc) . '</td></tr>
<tr><td>Invoice Number :</td><td>' . ($invno) . '</td></tr>
<tr><td>Due Date :</td><td>' . ($date2) . '</td></tr>
<tr><th>Transaction</th><th>Amount</th></tr>';

    echo '<tr><td>' . ($desc) . '</td><td>Ksh.' . number_format($amt, 2) . '</td></tr>';

    echo '<tr><th>Total</th><td>Ksh.' . number_format($amt, 2) . '</td></tr>
<tr><td colspan = "2"><center>You were served by:' . servedby($user) . '</center></td></tr>
</div></table>
</div><input type = "submit" name = "btnPrint" value = "print" asp:Button ID = "btnPrint" runat = "server" onclick = "' . $id . '"/></body>';
    /* $mnd = mysql_query('select * from membercontribution where session = "' . $session . '"') or die(mysql_error());
      $mnr = mysql_fetch_array($mnd);
      $sms = 'Dear ' . getMembername($mnr['memberno']) . ', we have received your Ksh.' . number_format($total, 2) . ' . Western Shuttle Sacco Ltd. Thank You.';
      $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", phonenumber($mno), $sms);
      if ($ms) {
      echo '<span class = "green">Sms sent successfully</span></br>';
      } else {
      echo '<span class = "red">Sms sending failed</span></br>';
      }
     *
     */
    unset($_SESSION['session']);
    session_regenerate_id();
}

function editdebtor() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Debtor Name</th>
<th class = "style">Address</th>
<th class = "style">Contacts</th>
<th class = "style">Email</th>
<th class = "style">KRA Pin</th>
<th class = "style">Terms</th>
<th class = "style">Credit Status</th>
<th class = "style">Status</th>';
    $write = check_write_permission();
    if($write == 1){
    echo '<th class = "style">Edit</th>
        <th class = "style">Delete</th>';
    }
echo '</tr>

</thead>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $Rows = mysql_query('SELECT * FROM addebtor');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['dname']) . '</td>
<td class = "style">' . base64_decode($Row['address']) . '</td>
<td class = "style">' . base64_decode($Row['dcont']) . '</td>
<td class = "style">' . base64_decode($Row['demail']) . '</td>
<td class = "style">' . base64_decode($Row['kra']) . '</td>
<td class = "style">' . base64_decode($Row['terms']) . '</td>
<td class = "style">' . base64_decode($Row['creditstatus']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>';
        if($write == 1){
        echo '<td class = "style"> <a onClick="' . $confirmedit . '" href = "addebtors.php?gid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
        <td class = "style"> <a onClick="' . $confirmdelete . '" href = "addebtors.php?debdel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td>';
            }
echo '</tr>';
    }
    echo '</table>
';
}

function agedebtors($user, $datefrom, $dateto) {
//$date = $day . '-' . $month . '-' . $year;
//$date=date("d-M-Y");
    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto; */

//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
//$acry = mysql_query('select * from loansettings where status= "' . base64_encode("Active") . '"') or die(mysql_error());
//while ($row1 = mysql_fetch_array($acry)) {
            $mqry = mysql_query('select * from issueinvoice where duedate = "' . base64_encode(date("d-M-Y", $s)) . '" and status = "' . base64_encode('Unpaid') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
//}
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table border="2" id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th colspan = "3"><center>Debtors Report</center></th></tr>
<tr><th>Date</th><th>Account</th><th>Total</th></tr>
<tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>Debtors Report</td><td>' . getsymbol() . ' ' . number_format($mtotal, 2) . '</td></tr>
</table>

<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th>Invoice Number</th><th>Debtor Name</th><th>Date of Invoice</th><th>GL Account</th><th>Description</th><th>Due Date</th><th>Amount</th></tr>';
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto;
     */
//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        $sumbal = 0;
        while ($s <= $t) {
            $mqry = mysql_query('select * from issueinvoice where duedate = "' . base64_encode(date("d-M-Y", $s)) . '" and status = "' . base64_encode('Unpaid') . '"') or die(mysql_error());

            while ($row2 = mysql_fetch_array($mqry)) {
                $intv = filter_var(base64_decode($row2['invno']), FILTER_SANITIZE_NUMBER_INT); //remove the inv prefix
                $intv = ltrim($intv, 0); //remove the leading zeros from the invoice number.

                $pinv = mysql_query('select * from receivepayments where invoice="' . base64_encode($intv) . '" limit 1') or die(mysql_error());
                while ($p = mysql_fetch_array($pinv)) {
                    $paid = base64_decode($p['amount']);
                }
                $invamt = base64_decode($row2['amount']);
                $invbal = $invamt - $paid;
                $sumbal+=$invbal;
                echo '<tr><td>' . base64_decode($row2['invno']) . '</td><td>' . getdebtor(base64_decode($row2['debtorid'])) . '</td><td>' . base64_decode($row2['invdate']) . '</td><td>' . getglacc(base64_decode($row2['glacc'])) . '</td><td>' . base64_decode($row2['description']) . '</td><td>' . base64_decode($row2['duedate']) . '</td><td>Ksh.' . number_format(base64_decode($row2['amount']), 2) . '</td><td>KSh. ' . number_format($invbal, 2) . '</td></tr>';
            }
            $s = $s + 86400;


            $grand = $mtotal;
        }
        echo '<tr><td colspan = "5"></td><td>TOTAL</td><td>' . getsymbol() . ' ' . number_format($grand, 2) . '</td><td>' . getsymbol() . ' ' . number_format($sumbal, 2) . '</td></tr>';
    }
    echo '</table></div>
</div>
</div>';
    echo '<br/><div class = "two">Prepared By ........................................... &nbsp;&nbsp;&nbsp; </div><div class = "two"> Checked By ...........................................</div></br>';
    echo'<div class = "col-md-4">
<button class="btn green" value = "Print this page" onClick="return printResults()">Print</button></div>';
}

function agedcreditors($user, $datefrom, $dateto) {
//$date = $day . '-' . $month . '-' . $year;
//$date=date("d-M-Y");
    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto; */

//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
//echo date("d-M-Y", $s).'</br>';
//$acry = mysql_query('select * from loansettings where status= "' . base64_encode("Active") . '"') or die(mysql_error());
//while ($row1 = mysql_fetch_array($acry)) {
            $mqry = mysql_query('select * from receiveinvoice where duedate = "' . base64_encode(date("d-M-Y", $s)) . '" and status = "' . base64_encode('Unpaid') . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {
                $mtotal +=base64_decode($row['amount']);
            }
//}
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th colspan = "3"><center>Creditors Report</center></th></tr></table>
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th>Date</th><th>Account</th><th>Total</th></tr>
<tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>Creditors Report</td><td>' . getsymbol() . ' ' . number_format($mtotal, 2) . '</td></tr>
</table>

<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th>Invoice Number</th><th>Creditor Name</th><th>Date of Invoice</th><th>GL Account</th><th>Description</th><th>Due Date</th><th>Amount</th></tr>';
    /* $sm = date("m", strtotime($mfrom));
      $sd = $dfrom;
      $sy = $yfrom;
      //
      //$tm = date("m", strtotime($mto));
      $tm = date("m", strtotime($mto));
      //$td = $dto;
      $td = $dto;
      //$ty = $yto;
      $ty = $yto;
     */
//utc of start and end dates
    $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        $sumbal = 0;
        while ($s <= $t) {
            $mqry = mysql_query('select * from receiveinvoice where duedate = "' . base64_encode(date("d-M-Y", $s)) . '" and status = "' . base64_encode('Unpaid') . '"') or die(mysql_error());

            while ($row2 = mysql_fetch_array($mqry)) {
                $invc = filter_var(base64_decode($row2['invno']), FILTER_NUMBER_INT);
                $invc = ltrim($invc, 0);
                $paymts = mysql_query('select * from bpayments where receiveinv="' . base64_encode($invc) . '" limit 1') or die(mysql_error());
                while ($pd = mysql_fetch_array($paymts)) {
                    $pyad = base64_decode($pd['amount']);
                }
                $invamt = base64_decode($row2['amount']);
                $invbal = $invamt - $pyad;
                $sumbal+=$invbal;
                echo '<tr><td>' . base64_decode($row2['invno']) . '</td><td>' . getcreditor(base64_decode($row2['creditorid'])) . '</td><td>' . base64_decode($row2['invdate']) . '</td><td>' . getglacc(base64_decode($row2['glacc'])) . '</td><td>' . base64_decode($row2['description']) . '</td><td>' . base64_decode($row2['duedate']) . '</td><td>Ksh.' . number_format(base64_decode($row2['amount']), 2) . '</td><td>KSh. ' . number_format($invbal, 2) . '</td></tr>';
            }
            $s = $s + 86400;


            $grand = $mtotal;
        }
        echo '<tr><td colspan = "5"></td><td>TOTAL</td><td>' . getsymbol() . ' ' . number_format($grand, 2) . '</td><td>' . getsymbol() . ' ' . number_format($sumbal, 2) . '</td></tr>';
    }
    echo '</table></div>
</div>
</div>';
    echo '<br/><div class = "two">Prepared By ........................................... &nbsp;&nbsp;&nbsp; </div><div class = "two"> Checked By ...........................................</div><br>';

    echo '<div class="col-md-4"><button value = "Print this page" class="btn green" onClick="return printResults()">Print</button></div>';
}

function banknew() {
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

<form method="post" action="" autocomplete="off">
<div class="two">
<label>Bank Name</label>
<input type="text" class="form-control input-medium" name="name" placeholder="Enter Bank Name" title="Enter Bank Name" required/>

<label>Bank Branch</label>
<input type="text" class="form-control input-medium" name="branch" required placeholder="Bank Branch" title="Enter Bank Branch"/>

<label>Account No</label>
<input type="text" class="form-control input-medium" name="accno" required placeholder="Account Number" title="Enter Account Number"/>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<button class="btn green" name = "submit">Add</button>
</div>
</form>
<br/>
<form action = "" method = "GET" autocomplete = "off">
<div class="two">
<button class="btn red" name = "edit">Edit</button>
</div>
</form>

</div>
</div>
</div>
</div>';
}

function editbanknew($user, $id, $name, $branch, $accno) {

//$qry = mysql_query('select * from addbank where primarykey= "' . $id . '"') or die(mysql_error());

    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<form method="post" action="" autocomplete="off">
<div class="two">
<label>Bank Name</label>
<input type="hidden" name="id" value="' . $id . '">
<input type="text" class="form-control input-medium" name="bankname" value="' . $name . '" placeholder="Enter Bank Name" title="Enter Bank Name" required/>

<label>Bank Branch</label>
<input type="text" class="form-control input-medium" name="branch" value="' . $branch . '" required placeholder="Bank Branch" title="Enter Bank Branch"/>

<label>Account No</label>
<input type="text" class="form-control input-medium" name="accno" value="' . $accno . '" required placeholder="Account Number" title="Enter Account Number"/>

<label>Status</label>
<select name="status" class="form-control input-medium" required title="Enter Status">
<option>Active</option>
<option>Suspended</option>
</select>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<button class="btn green" name = "ice">Edit</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function bankform() {
    echo '<form action = "" method = "POST" class="form-horizontal" autocomplete = "off"> 
<div class="form-body">
<div class="form-group">
<label>Select Bank</label>
<select name="bname" class="form-control input-medium" required title="Select Bank">';
    echo '<option></option>';

    $chqry = mysql_query('select * from addbank  WHERE  status="QWN0aXZl" ') or die(mysql_error());
    while ($row = mysql_fetch_array($chqry)) {
        echo '<option value="' . ($row['primarykey']) . '">' . base64_decode($row['bankname']) . '</option>';
    }
    echo '
</select>
</div>
</div>

<div class="form-group">
<div class="col-md-6">Date Range

<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">

<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to
</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">

</div>
</div>
</div>

<button name = "msubmit" class="btn green">Generate Statement</button>
</div>
</form>';
}

function indbankstatements($user, $bnkid, $datefrom, $dateto) {

    $amount1 = 0;
    $amount2 = 0;
    $amount3 = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);


    echo '
        <div id="mt">
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<tr><th colspan = "6"> <h3 align="center"><b>Banking Statements for ' . getbankname($bnkid) . '</b></h3></th></tr>
<tr><th><th>Date</th> <th colspan="2">Account</th><th colspan="2">Amount </th></tr>
<tr><th></th><th>' . $datefrom . ' to ' . $dateto . '</th><th></th><th>Banking Statements</th><th>Money In </th><th>Money Out</th></tr>
<form action = "" method="post" autocomplete = "off">
<tr><th>Payee</th><th>Date</th><th>Transaction</th><th>Payment Type</th><th>Amount</th><th>Amount</th></tr>';

    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqryy = mysql_query('select * from  membercontribution  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '" ') or die(mysql_error());
            while ($row1 = mysql_fetch_array($mqryy)) {
                echo '<tr><td>' . getMembername($row1['memberno']) . '</td><td>' . base64_decode($row1['date']) . '</td><td>' . getGlname(base64_decode($row1['transaction'])) . '</td><td>' . getpaytype(base64_decode($row1['paymenttype'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row1['amount']), 2) . '</td><td></tr>';
                $amount1 +=base64_decode($row1['amount']);
            }

            $sth = mysql_query('select * from  paymentin  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '" ') or die(mysql_error());
            while ($row2 = mysql_fetch_array($sth)) {
                echo '<tr><td>' . getMembername($row2['payeeid']) . '</td><td>' . base64_decode($row2['date']) . '</td><td>' . getGlname(base64_decode($row2['transname'])) . '</td><td>' . getpaytype(base64_decode($row2['paymentype'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row2['amount']), 2) . '</td><td></tr>';
                $amount2 +=base64_decode($row2['amount']);
            }

            $stmt = mysql_query('select * from  paymentout  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND bnkid="' . base64_encode($bnkid) . '" ') or die(mysql_error());
            while ($row3 = mysql_fetch_array($stmt)) {
                echo '<tr><td>' . base64_decode($row3['receiver']) . '</td><td>' . base64_decode($row3['date']) . '</td><td>' . getGlname(base64_decode($row3['transname'])) . '</td> <td>' . getpaytype(base64_decode($row3['paymentype'])) . '</td> <td></td> <td>' . getsymbol() . ' ' . number_format(base64_decode($row3['amount']), 2) . '</td></tr>';
                $amount3 = base64_decode($row3['amount']);
            }

            $stl = mysql_query('select * from   banking  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND  	bnkid="' . base64_encode($bnkid) . '"  AND mode="d2l0aGRyYXc=" ') or die(mysql_error());
            while ($row4 = mysql_fetch_array($stl)) {  //withdraw
                echo '<tr><td>' . getbankinoff(base64_decode($row4['approvedby'])) . '</td><td>' . base64_decode($row4['date']) . '</td><td>' . getGlname(base64_decode($row4['accfrom'])) . '</td><td>' . (base64_decode($row4['ptype'])) . '</td><td><td>' . getsymbol() . ' ' . number_format(base64_decode($row4['amount']), 2) . '</td></tr>';
                $amount20 +=base64_decode($row4['amount']);
            }

            $stll = mysql_query('select * from   banking  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND  	bnkid="' . base64_encode($bnkid) . '"  AND mode="ZGVwb3NpdA==" ') or die(mysql_error());
            while ($row44 = mysql_fetch_array($stll)) {  //deposit
                echo '<tr><td>' . getbankinoff(base64_decode($row44['approvedby'])) . '</td><td>' . base64_decode($row44['date']) . '</td><td>' . getGlname(base64_decode($row44['accfrom'])) . '</td><td>' . (base64_decode($row44['ptype'])) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row44['amount']), 2) . '</td><td></tr>';
                $amount21 +=base64_decode($row44['amount']);
            }

            $sm = mysql_query('select * from    loandisbursment  WHERE   	date="' . base64_encode(date('d-M-Y', $s)) . '"   AND  	bnkid="' . base64_encode($bnkid) . '"  ') or die(mysql_error());
            while ($rowt = mysql_fetch_array($sm)) {  //deposit
                echo '<tr><td>' . getMembername($rowt['mno']) . '</td><td>' . base64_decode($rowt['date']) . '</td><td>' . base64_decode($rowt['comments']) . '</td><td>' . getpaytype(base64_decode($rowt['pid'])) . '</td><td><td>' . getsymbol() . ' ' . number_format(base64_decode($rowt['amount']), 2) . '</td></tr>';
                $amount56 +=base64_decode($rowt['amount']);
            }

            $s = $s + 86400;
        }$depo = ($amount1 + $amount2 + $amount21);
        $with = $amount3 + $amount20 + $amount56;
        $bnkbal = ( ( $depo ) - ($with));
        echo '<tr><td colspan = "3"></td><td>TOTAL</td><td>' . getsymbol() . ' ' . number_format($depo, 2) . '</td><td>' . getsymbol() . ' ' . number_format($with, 2) . '</td></tr>
        <tr><td colspan = "3"></td><td>TOTAL</td><td>' . getsymbol() . ' ' . number_format($bnkbal, 2) . '</td></tr>';
    }

    echo '</table></div>';
    echo '<div class="col-md-4"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div>';
}

function newbankedit() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Bank Name</th>
<th class = "style">Bank Branch</th>
<th class = "style">Account Number</th>
<th class = "style">Status</th>
<th class = "style">Edit</th>
<th class = "style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM addbank');
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    while ($Row = mysql_fetch_array($Rows)) {


        echo'	<tr>
<td class = "style">' . base64_decode($Row['bankname']) . '</td>
<td class = "style">' . base64_decode($Row['branch']) . '</td>
<td class = "style">' . base64_decode($Row['accno']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style"> <a onClick="' . $confirmedit . '" href="banknew.php?iid=' . $Row['primarykey'] . '"><img src="images/edit.png"> </a></td>
<td class = "style"><a onClick="' . $confirmdelete . '" href="banknew.php?bankdel=' . $Row['primarykey'] . '"><img src="images/delete.png"></a></td>
</tr>';
    }
    echo '</table>';
}

function bankpay() {
    echo '<div class="col-md-4">
    <form method="post" action="" autocomplete="off">

<label>Select Bank.</label>
<select name = "bankid" class="form-control input-medium"  title = "Select Bank Account">
<option></option>';

    $insert = mysql_query('select * from addbank where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($insert)) {
        echo '<option value="' . $row["primarykey"] . '">' . base64_decode($row["bankname"]) . '</option>';
    }
    echo '</select>
<label>Select GL Account</label>
<select name = "glcode" class="form-control input-medium" required title = "Enter GL Account code">';

    $insert2 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($insert2)) {

        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['accode']) . ' - ' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select>

<label>Select Creditor.</label>
<select name = "creditor" class="form-control input-medium" onchange="showUser(this.value)" required title = "select creditor">
<option></option>';


    $qry = mysql_query('select * from addcreditor ') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {

        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['dname']) . '</option>';
    }
    echo '</select>

<div id="txtHint"></div>

<label>Check/Voucher No</label>
<input type = "text" class="form-control input-medium" name = "check" autofocus required placeholder = "Enter Check/Voucher Number" title = "Enter Check/Voucher Number" />

<label>Description</label>
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" name = "descrr" autofocus required placeholder = "Enter Description" title = "Enter Description" /></textarea>
</div>
<div class="col-md-offset-5">
<label>Creditor KRA Pin.</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" name = "kra" class="form-control input-medium" required title = "Enter Creditor KRA Pin" placeholder = "Enter Creditor KRA Pin">

<label>Amount </label>
<input type = "text"  class="form-control input-medium" name = "amount" autofocus required placeholder = "Enter Amount" title = "Enter Amount" />

<label>Date </label>
<input type="text" class="form-control input-medium date-picker" placeholder="Enter Date" title="Enter Date"  data-date-format="dd-M-yyyy"   required name = "date"   title = "Enter Date" />

<label>Paymode </label>
<select class="form-control input-medium" name = "ptype"  class="chosen" required title = "Enter Payment Type">
<option></option>
<option>Cash</option>
<option>Cheque</option>
<option>Mobile Money</option>
</select>


<input type="hidden" name="transid" value="00098' . gmdate(mydG) . '">
<br/>
<button class="btn green" name = "acsubmit"> Save</button>

</form>
<br/>
<form action = "" method = "GET" autocomplete = "off">
<div class="two">';
    $write = check_write_permission();
    if($write == 1){
    echo '<button class="btn red" name = "gedit">Edit </button>';
    }
echo '</div>
</form>

</div>';
}

function editbankpay() {
    echo '
<table id="sample_2" aria-describedby = "sample_2_info" class = "table table-striped table-bordered table-hover table-full-width dataTable" id = "sample_2" >
<thead class = "style">
<tr>
<th class = "style">Creditor Name</th>
<th class = "style">Address</th>
<th class = "style">Contacts</th>
<th class = "style">Email</th>
<th class = "style">KRA Pin</th>
<th class = "style">Terms</th>
<th class = "style">Status</th>
<th class = "style">Edit</th>
<th class = "style">Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM addcreditor');

    while ($Row = mysql_fetch_array($Rows)) {


        echo' <tr>
<td class = "style">' . base64_decode($Row['dname']) . '</td>
<td class = "style">' . base64_decode($Row['address']) . '</td>
<td class = "style">' . base64_decode($Row['dcont']) . '</td>
<td class = "style">' . base64_decode($Row['demail']) . '</td>
<td class = "style">' . base64_decode($Row['kra']) . '</td>
<td class = "style">' . base64_decode($Row['terms']) . '</td>
<td class = "style">' . base64_decode($Row['status']) . '</td>
<td class = "style"> <a href = "addcreditors.php?gid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td>
<td class = "style"> <a href = "addcreditors.php?credel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td>
</tr>';
    }
    echo '</table>
';
}

function bankpayedit($id, $dname, $address, $dcont, $demail, $kra, $terms, $status) {
    echo '<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 100%" >

</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >

<form method="post" action="" autocomplete="off">
<div class="two">
<label>Creditor Name.</label>
<input type="text" class="form-control input-medium" name = "dname" value="' . $dname . '" required title = "Enter Creditor Name" placeholder = "Enter Creditor Name">
<input type="hidden" name = "id" value="' . $id . '" required>

<label>Creditor Address </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $address . '" name = "address" required placeholder = "Enter Creditor Address " title = "Enter Creditor Address "/>

<label>Creditor Contacts </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $dcont . '" name = "dcont" required placeholder = "Enter Creditor Contacts " title = "Enter Creditor Contacts "/>

<label>Creditor Email </label>
<input type = "text" class="form-control input-medium" value="' . $demail . '" name = "demail" placeholder = "Enter Creditor Email " title = "Enter Creditor Email "/>

<label>Creditor KRA Pin </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" value="' . $kra . '" name = "kra" required placeholder = "Enter Creditor KRA Pin " title = "Enter Creditor KRA Pin "/>

<label>Payment Terms </label>
<select pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" name = "terms" class="form-control input-medium" required placeholder = "Enter Payment Terms" title = "Enter Payment Terms "/>
<option>Due End Month</option>
<option>Due After 3 Months</option>
</select>

<label>Status </label>
<select name = "status" class="form-control input-medium" required placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
</div>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">
<button class="btn green" name = "save">Edit Creditor</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}

function viewaccounts() {

    $qry = mysql_query(" SELECT * FROM memberaccs ORDER BY id") or die(mysql_error());


    echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
<tr><th colspan="5"><h3 align="center"><b> All Members Accounts   </b></h3></th></tr>
<tr><th>Member Number</th>
<th>Member Name</th>
<th>Account Name</th>
<th>Account Number</th>';
    $write = check_write_permission();
    if($write == 1){//if has write (delete) permission
    echo '<th>Delete</th>';
    }
echo '</tr>
</thead>
<tbody>';

    while ($row = mysql_fetch_array($qry)) {

        echo'<tr>
<td>' . base64_decode($row["mno"]) . '</td>
<td>' . getMembername($row["mno"]) . '</td>
<td>' . getglacc(base64_decode($row["glaccid"])) . '</td>
<td>' . base64_decode($row["accno"]) . '</td>';

        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        if($write == 1){
        echo'<td> <a onClick="' . $confirmdelete . '" href = "viewAcount.php?accddel=' . $row['id'] . '"><img src = "images/delete.png"></a></td>';
        }
        echo' </tr>';
    }

    echo'</tbody></table></div>';
}

function interbank() {

    echo '<form action="" method="post" class="form-horizontal" id="form23">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Select From Account</label>
<div class="col-md-4">
<select type="text" id="accnofrom" name="accnofrom" class="form-control" placeholder="Select from account number">
<option></option>';

    $qy = mysql_query("SELECT * FROM  addbank");

    while ($rw = mysql_fetch_array($qy)) {
        echo '<option value="' . $rw['bankname'] . '">' . base64_decode($rw['bankname']) . '</option>';
    }

    echo'</select>
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label ">Select To Account</label>
<div class="col-md-4">
<select type="text" id="accnoto" name="accto" class="form-control" placeholder="Select To Account Number">
<option></option>';

    $quy = mysql_query("SELECT * FROM  addbank");

    while ($row1 = mysql_fetch_array($quy)) {
        echo '<option value="' . $row1['bankname'] . '">' . base64_decode($row1['bankname']) . '</option>';
    }

    echo'</select></div> </div>

<div class="form-group">
<label class="col-md-3 control-label ">Select Banking Officer</label>
<div class="col-md-4">
<a data-toggle="modal" data-target="#responsive6" href="transfer_officermodal.php">Add Banking Officer</a>
<select type="text" id="trasoff" name="trasoff" class="form-control" placeholder="Select Banking Officer">
<option></option>';
    $sth = mysql_query("SELECT * FROM  bankingofficer");
    while ($r = mysql_fetch_array($sth)) {
        echo '<option value="' . $r['id'] . '">' . base64_decode($r['officer']) . '</option>';
    }
    echo'</select></div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Select Approving Authority</label>
<div class="col-md-4">
<a data-toggle="modal" data-target="#responsive70" href="approvalauthority.php">Add Approval Authority</a>
<select type="text" id="appauth" name="appauth" class="form-control" placeholder="Select Approving Authority">
<option></option>';
    $query = mysql_query("SELECT * FROM approvalauthority");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['authority']) . '</option>';
    }
    echo'</select></div> </div>
<div class="form-group">

<label class="col-md-3 control-label ">Select Transfer Purpose</label>
<div class="col-md-4">
<a data-toggle="modal" data-target="#responsive77" href="addpurposmodal.php">Add Transfer Purpose</a>
<select type="text" id="purp" name="purp" class="form-control" placeholder="Select Transfer Purpose">
<option></option>';
    $qy1 = mysql_query("SELECT * FROM trasferpurpose");
    while ($roow = mysql_fetch_array($qy1)) {
        echo '<option value="' . $roow['id'] . '">' . base64_decode($roow['purpose']) . '</option>';
    }
    echo'</select></div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Select Date & Time</label>
<div class="col-md-4">
<input type="text" placeholder = "Enter Date e.g 2013-May-01 " title = "Enter Date e.g 2013-May-01 " id="dnt" name="dnt" class="form-control input-large date-picker"  data-date-format="dd-M-yyyy"  required required>
</div> </div>

<div class="form-group">
<label class="col-md-3 control-label ">Select Mode Of Payment</label>
<div class="col-md-4">
<select type="text" id="modep" name="modep" class="form-control" placeholder="Select Mode Of Payment">
<option></option>';

    $qury = mysql_query("SELECT * FROM paymentmode");
    while ($row6 = mysql_fetch_array($qury)) {
        echo '<option value="' . $row6['id'] . '">' . base64_decode($row6['mode']) . '</option>';
    }

    echo'</select></div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Input Slip code/ Check no</label>
<div class="col-md-4">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" id="slipco" name="slipco" class="form-control" placeholder="Input Slip code/ Check no">
</div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Input Amount</label>
<div class="col-md-4">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" id="amount" name="amount" class="form-control" placeholder="Input Amount">


</div> </div>
<div style="display: none;" id="responsive70" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
</button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>
<div style="display: none;" id="responsive77" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
</button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>
<div style="display: none;" id="responsive6" class="modal fade" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
</button>
<h4 class="modal-title">Responsive &amp; Scrollable</h4>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn default">Close</button>
<button type="button" class="btn green">Save changes</button>
</div>
</div>
</div>
</div>
<div class="col-md-offset-2 col-md-6">
<button type="submit" id="submit22" name="submit56" class="btn green">Transfer </button>
<a href="viewtransfer.php" button   class="btn green">View Transfers </a button>
<a href="index.php" button  class="btn green"> Cancel Button</a button>
</div>
</form>';
}

function viewtransfer() {

    $qry = mysql_query(" SELECT * FROM interbank ORDER BY id");
    echo '<div id="mt"><table class="table table-striped table-hover table-bordered" id="sample_editable_1"><thead>
<tr> <th colspan="9"> <h3 align="center"><b>InterBanking Transfer  </b></h3> </th> </tr>
<tr><th>Account From</th><th>Account To</th><th>Transfer Officer</th><th>Approved By</th><th>Purpose</th><th>Date</th><th>Payment Mode</th><th>Slip Code</th><th>Amount</tr></thead><tbody>';
    while ($row = mysql_fetch_array($qry)) {

        echo'<tr><td>' . base64_decode($row['account_from']) . '</td><td>' . base64_decode($row['account_to']) . '</td><td>' . getbankinoff(base64_decode($row['transfer_officer']))
        . '</td><td>' . getappby(base64_decode($row['approved_by'])) . '</td><td>' . getpp(base64_decode($row['purpose'])) . '</td><td>' . base64_decode($row['date'])
        . '</td><td>' . getmode(base64_decode($row['payment_mode'])) . '</td><td>' . base64_decode($row['slip_code']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td></tr>';
    }
    echo'</tbody></table></div><div class="col-md-4"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div>';
}

function othrsrc() {

    echo' <form action="" method="post" class="form-horizontal">
<div class="form-body">
<div class="form-group">

<div class="form-group">
<label class="col-md-3 control-label ">Select Cash From Other Source</label>
<div class="col-md-4">
<select type="text" id="othrsour" name="othrsour" class="form-control" placeholder="Select Other Source">
<option></option>';

    $query = mysql_query("SELECT * FROM addebtor");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['dname']) . '</option>';
    }


    echo'</select>
</div> </div>
<div class="form-group">
<label class="col-md-3 control-label "> Select Invoice No</label>
<div class="col-md-4">
<select type="text" id="invoiceno" name="invoiceno" class="form-control" placeholder="Select Invoice No">
<option></option>';

    $query = mysql_query("SELECT * FROM issueinvoice");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['invno']) . '</option>';
    }
    echo '</select></div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Select Account</label>
<div class="col-md-4">
<select type="text" id="account" name="account" class="form-control" placeholder="Select Account">
<option></option>';

    $query = mysql_query("SELECT * FROM glaccounts");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }
    echo '</select></div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Transfer Purpose</label>
<div class="col-md-4">
<input type="text" id="purp" name="purp" class="form-control" placeholder="Transfer Purpose">
</div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Date </label>
<div class="col-md-4">
<input type="text" id="dte" name="dte" class="form-control" placeholder="Insert Date ">


</div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Payee </label>
<div class="col-md-4">
<input type="text" id="payee" name="payee" class="form-control" placeholder="Insert payee ">


</div> </div>

<div class="form-group">
<label class="col-md-3 control-label ">Mode Of Payment</label>
<div class="col-md-4">
<select type="text" id="modep" name="modep" class="form-control" placeholder="Mode Of Payment">
<option></option>';
    $query = mysql_query("SELECT * FROM paymentmode");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['mode']) . '</option>';
    }


    echo'</select></div> </div>

<div class="form-group">
<label class="col-md-3 control-label ">Receipt No</label>
<div class="col-md-4">
<input type="text" id="receno" name="receno" class="form-control" placeholder="Receipt No">
</div> </div>
<div class="form-group">
<label class="col-md-3 control-label ">Input Amount</label>
<div class="col-md-4">
<input type="text" id="value3" name="amount" class="valuee form-control"  placeholder="Input Amount">


</div> </div>
<div class="form-actions fluid">
<div class="col-md-offset-3 col-md-9">
<button type="submit" id="submit102" name="submity" class="btn green">Update</button>

</div>
</div>
</div>
</div>
</form>';
}

function paymode() {
    echo '<form method="post" class="form-horizontal" action="" id="form47">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Enter Mode Of Payment</label>
<div class="col-md-4">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" title="Enter Mode Of Payment" placeholder="Enter Mode Of Payment" required class="form-control input-inline input-medium" size="50" name="mode">
</div>
</div>
<div class="form-group">
<label class="col-md-3   control-label">Select Status</label>
<div class="col-md-4">
<select required title="Select Status" data-placeholder="Select Status" title="Select Status" class="form-control input-inline input-medium" name="status">
<option></option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
</div>
</div>
<div class="col-md-4 col-md-offset-3">
<div class="form-actions fluid">
<div class="col-md-offset-3 col-md-6">
<input type="submit" class="btn btn-success" name="submit202" value="Submit">
</div> </div>
</div>
</div>
</form>
<form action="" method="post">
<input type="submit" name="edit" value="Edit Payment Mode" class="btn green"/>
</form>';
}

function viewuploads() {

    echo'<form action="" method="post" name="myforms" enctype = "multipart/form-data" class="form-horizontal" autocomplete = "on">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Member Number</label>
<div class="col-md-4">
<input id="mno" class="form-control input-medium" type = "text" name = "mno"  required placeholder = "Enter Member Number" title = "Enter Member Number"  autofocus onkeyup = "showUsersa(this.value)"/>
</div>
</div></form>


<div id="txttHintt">

</div>';
}

function viewexport() {
    echo '<form method="post" action = "export.php" autocomplete = "off">
<div class = "row">

<div class="col-md-4"><button  class="btn green"  name = "expmember" value = "word">Export to word</button></div>
</div>
</form>';
}

function sidemenunew($user) {
    include 'sess.php';
    include 'get_url.php';
    include 'config2.php';
    echo '<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <li class="classic-menu-dropdown active">
            <a href="index.php">
                Dashboard
                <span class="selected">
                </span>
            </a>
        </li>
        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Statements<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;" >
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu" >

                                <li>
                                    <a href="accountstatement.php">
                                        <i class="fa fa-angle-right"></i> Contributions
                                    </a>
                                </li>
                                <li>
                                    <a href="account.php">
                                        <i class="fa fa-angle-right"></i> Mini Statements
                                    </a>
                                </li>

                                <li>
                                    <a href="accsa.php">
                                        <i class="fa fa-angle-right"></i> Summarized Statements
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">


                                <li>
                                    <a href="personalloanreports.php">
                                        <i class="fa fa-angle-right"></i> Loan Statement
                                    </a>
                                </li>
                                <li>
                                    <a href="dynainco.php">
                                        <i class="fa fa-angle-right"></i> Dynamic Contributions
                                    </a>
                                </li>
                                <li>
                                    <a href="email_statements.php">
                                        <i class="fa fa-angle-right"></i> Email Statements
                                    </a>
                                </li>


                            </ul>

                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Contributions <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content ">
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="col-md-4 mega-menu-submenu">

                                    <li>
                                        <a href="contribution.php">
                                            <i class="fa fa-angle-right"></i> Contribution
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contributionedit.php">
                                            <i class="fa fa-angle-right"></i> Contribution Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="viewcontributions.php">
                                            <i class="fa fa-angle-right"></i> View Contributions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="viewgroups.php">
                                            <i class="fa fa-angle-right"></i> Group Members
                                        </a>
                                    </li>

                                </ul>
                                <ul class="col-md-4 mega-menu-submenu">
                                    <li>
                                        <a href="contributionreprint.php">
                                            <i class="fa fa-angle-right"></i> Contribution Reprint Receipt
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dynamic_contribution.php">
                                            <i class="fa fa-angle-right"></i> Dynamic Payment
                                        </a>
                                    </li>									

                                </ul>

                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </li>
        
        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Vehicle <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content ">
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="col-md-4 mega-menu-submenu">

                                    <li>
                                        <a href="vehicleregistration.php">
                                            <i class="fa fa-angle-right"></i> Register Vehicle
                                        </a>
                                    </li>
                                    <li>
                                        <a href="crew.php">
                                            <i class="fa fa-angle-right"></i> Register Crew
                                        </a>
                                    </li>
                                    <li>
                                        <a href="vehicleinspection.php">
                                            <i class="fa fa-angle-right"></i> Vehicle Inspection
                                        </a>
                                    </li>
                                    <li>
                                        <a href="personalvehicle.php">
                                            <i class="fa fa-angle-right"></i> Search Vehicle
                                        </a>
                                    </li>

                                </ul>
                                <ul class="col-md-4 mega-menu-submenu">
                                    <li>
                                        <a href="personvehreg.php">
                                            <i class="fa fa-angle-right"></i> Search Vehicle By Reg Number
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Viewvehicles.php">
                                            <i class="fa fa-angle-right"></i> View All Vehicles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="viewinspection.php">
                                            <i class="fa fa-angle-right"></i> View All Inspection Reports
                                        </a>
                                    </li>
                                    <li>
                                        <a href="viewcrew.php">
                                            <i class="fa fa-angle-right"></i> View Crew
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </li>
        

        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Vehicle Account <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content ">
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="col-md-4 mega-menu-submenu">

                                    <li>
                                        <a href="createInvoiceAcc.php">
                                            <i class="fa fa-angle-right"></i> Create Invoice Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoiceVehicle.php">
                                            <i class="fa fa-angle-right"></i> Invoice Vehicle
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoiceVhPayment.php">
                                            <i class="fa fa-angle-right"></i> Invoice Vehicle Payment
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoiceVhPaymentEdit.php">
                                            <i class="fa fa-angle-right"></i> Edit Invoice Vehicle Payment
                                        </a>
                                    </li>

                                </ul>
                                <ul class="col-md-4 mega-menu-submenu">
                                    <li>
                                        <a href="invoiceVehicleStatement.php">
                                            <i class="fa fa-angle-right"></i> Invoice Vehicle Statement
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoicedVehicleReport.php">
                                            <i class="fa fa-angle-right"></i> Invoiced Vehicle Report
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </li>



        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Income<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="income.php">
                                        <i class="fa fa-angle-right"></i> Income
                                    </a>
                                </li>
                                <li>
                                    <a href="incomeedit.php">
                                        <i class="fa fa-angle-right"></i> Income Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="viewincome.php">
                                        <i class="fa fa-angle-right"></i>View Incomes
                                    </a>
                                </li>
                                <li>
                                    <a href="viewincomepiechart.php">
                                        <i class="fa fa-angle-right"></i>Income Pie Chart
                                    </a>
                                </li>									
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="incomereprint.php">
                                        <i class="fa fa-angle-right"></i>Income Reprint Receipt
                                    </a>
                                </li>
                            </ul>



                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Expenses<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="expenses.php">
                                        <i class="fa fa-angle-right"></i> Expenses
                                    </a>
                                </li>
                                <li>
                                    <a href="expensesedit.php">
                                        <i class="fa fa-angle-right"></i> Expenses Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="viewexpenses.php">
                                        <i class="fa fa-angle-right"></i>View Expenses
                                    </a>
                                </li>
                                <li>
                                    <a href="expensesreprint.php">
                                        <i class="fa fa-angle-right"></i>Expenses Reprint Receipt
                                    </a>
                                </li>

                            </ul>


                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Loans<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="personalloan.php">
                                        <i class="fa fa-angle-right"></i>Loan Applications
                                    </a>
                                </li>
                                <li>
                                    <a href="viewloans.php">
                                        <i class="fa fa-angle-right"></i> View Loans
                                    </a>
                                </li>
                                <li>
                                    <a href="loans.php">
                                        <i class="fa fa-angle-right"></i> Successful Loans
                                    </a>
                                </li>
                                <li>
                                    <a href="loanApproval.php">
                                        <i class="fa fa-angle-right"></i> Loan Approvals
                                    </a>
                                </li>
                                <li>
                                    <a href="loanreps.php">
                                        <i class="fa fa-angle-right"></i> Dynamic Summary Report
                                    </a>
                                </li>
                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="loandel.php">
                                        <i class="fa fa-angle-right"></i>Loan Reversal
                                    </a>

                                </li>
                                <li>
                                <a href="collateral.php">
                                    <i class="fa fa-angle-right"></i> Add Collateral
                                </a>
                                </li>
                                <li>
                                    <a href="loandisbursment.php">
                                        <i class="fa fa-angle-right"></i>Loan Disbursment
                                    </a>
                                </li>
                                <li>
                                    <a href="extracash.php">
                                        <i class="fa fa-angle-right"></i>Extra Fee
                                    </a>
                                </li>
                                <li>
                                    <a href="InterestRepay.php">
                                        <i class="fa fa-angle-right"></i>Upload Loan Interest
                                    </a>
                                </li>
                                <li>
                                    <a href="loandetailsupload.php">
                                        <i class="fa fa-angle-right"></i>Upload Loan Payment
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="inrefreeze.php">
                                        <i class="fa fa-angle-right"> </i>Loan Interest Waive/Freeze
                                    </a> 
                                </li>
                                <li>
                                    <a href="clearloanrepo.php">
                                        <i class="fa fa-angle-right"> </i>Loan Repossession
                                    </a> 
                                </li>
                                <li>
                                    <a href="viewfines.php">
                                        <i class="fa fa-angle-right"> </i>Clear Repossessed Loan
                                    </a> 
                                </li>
                                <li>
                                    <a href="loanwriteoff.php">
                                        <i class="fa fa-angle-right"> </i>Loan Write-offs
                                    </a> 
                                </li>
                                <li>
                                    <a href="rejectedLoan.php">
                                        <i class="fa fa-angle-right"> </i>Rejected loans
                                    </a> 
                                </li>
                                <li>
                                    <a href="loanunderpayment.php">
                                        <i class="fa fa-angle-right"> </i>Aging Report
                                    </a> 
                                </li>										
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="viewcollateral.php">
                                        <i class="fa fa-angle-right"> </i>View Collateral
                                    </a> 
                                </li>
                                <li>
                                    <a href="viewfines.php">
                                        <i class="fa fa-angle-right"> </i>View Fines
                                    </a> 
                                </li>
                                <li>
                                    <a href="viewloanbargraph.php">
                                        <i class="fa fa-angle-right"> </i>View Loan Bargraph
                                    </a> 
                                </li>
                                <li>
                                    <a href="loanStatement.php">
                                        <i class="fa fa-angle-right"> </i>Loan Statement
                                    </a> 
                                </li>										
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="activeLoan.php">
                                       <i class="fa fa-angle-right"> </i>Active Loans
                                    </a> 
                                </li>
                                <li>
                                    <a href="completedLoan.php">
                                        <i class="fa fa-angle-right"> </i>Completed Loans
                                    </a> 
                                </li>
                                <li>
                                    <a href="loandisbusmentrpt.php">
                                        <i class="fa fa-angle-right"> </i>Loan Disbursement Report
                                    </a> 
                                </li>										
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="viewwriteoff.php">
                                        <i class="fa fa-angle-right"> </i>View All Loan Write-offs
                                    </a> 
                                </li>
                                <li>
                                    <a href="viewinterestwaive.php">
                                        <i class="fa fa-angle-right"> </i>View Loan Interests Waived
                                    </a> 
                                </li>
                                <li>
                                    <a href="viewinterestfreeze.php">
                                        <i class="fa fa-angle-right"> </i>View Loan Interests Freezed
                                    </a> 
                                </li>
                                <li>
                                    <a href="pasocharge.php">
                                        <i class="fa fa-angle-right"> </i>Manual Interest Charge
                                    </a> 
                                </li>						
                            </ul>


                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Registration<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="memberregistration.php">
                                        <i class="fa fa-angle-right"></i>Member Registration
                                    </a>
                                </li>
                                <li>
                                    <a href="viewmembers.php">
                                        <i class="fa fa-angle-right"></i> View Members
                                    </a>
                                </li>
                                <li>
                                    <a href="membercontributiongroup.php">
                                        <i class="fa fa-angle-right"></i> Contribution Groups
                                    </a>
                                </li>
                                <li>
                                    <a href="personalinformation.php">
                                        <i class="fa fa-angle-right"></i> Personal Information
                                    </a>
                                </li>

                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="viewAcount.php">
                                        <i class="fa fa-angle-right"></i> View Accounts
                                    </a>
                                </li>
                                <li>
                                    <a href="viewuploads.php">
                                        <i class="fa fa-angle-right"></i> View Uploads
                                    </a>
                                </li>
                                <li>
                                    <a href="groups.php">
                                        <i class="fa fa-angle-right"></i>Create Groups
                                    </a>
                                </li>
                                <li>
                                    <a href="yeff.php">
                                        <i class="fa fa-angle-right"></i>View All Next of Kin
                                    </a>
                                </li>										
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="yeff2.php">
                                        <i class="fa fa-angle-right"></i> View Individual Next of Kin
                                    </a>
                                </li>
                                <li>
                                    <a href="bank_details.php">
                                        <i class="fa fa-angle-right"></i> Add banks
                                    </a>
                                </li>
                                <li>
                                    <a href="registerAgents.php">
                                        <i class="fa fa-angle-right"></i>Register Agents
                                    </a>
                                </li>										
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Finance<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="accountsettings.php">
                                        <i class="fa fa-angle-right"></i>Account Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="balancebf.php">
                                        <i class="fa fa-angle-right"></i> Balance B/f
                                    </a>
                                </li>
                                <li>
                                    <a href="bookcash.php">
                                        <i class="fa fa-angle-right"></i> Cashbook
                                    </a>
                                </li>
                                <li>
                                    <a href="journals.php">
                                        <i class="fa fa-angle-right"></i> Journals
                                    </a>
                                </li>
                                <li>
                                    <a href="fixed_assets.php">
                                        <i class="fa fa-angle-right"></i> Fixed Assets
                                    </a>
                                </li>
                                <li>
                                    <a href="calc_depreciation.php">
                                        <i class="fa fa-angle-right"></i> Calculate Depreciation
                                    </a>
                                </li>

                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="addebtors.php">
                                        <i class="fa fa-angle-right"></i> Add Debtors
                                    </a>
                                </li>
                                <li>
                                    <a href="addcreditors.php">
                                        <i class="fa fa-angle-right"></i> Add Creditors
                                    </a>
                                </li>
                                <li>
                                    <a href="issueinvoice.php">
                                        <i class="fa fa-angle-right"></i> Issue Invoice
                                    </a>
                                </li>
                                <li>
                                    <a href="receiveinvoice.php">
                                        <i class="fa fa-angle-right"></i> Receive Invoice
                                    </a>
                                </li>


                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="profitandloss.php">
                                        <i class="fa fa-angle-right"></i> Profit and Loss
                                    </a>
                                </li>
                                <li>
                                    <a href="ledger.php">
                                        <i class="fa fa-angle-right"></i> General Ledger
                                    </a>
                                </li>
                                <li>
                                    <a href="trialbalance.php">
                                        <i class="fa fa-angle-right"></i> Trial Balance
                                    </a>
                                </li>
                                <li>
                                    <a href="balancesheet.php">
                                        <i class="fa fa-angle-right"></i> Balance Sheet
                                    </a>
                                </li>	
                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="divids.php">
                                        <i class="fa fa-angle-right"></i> Annual Dividends
                                    </a>
                                </li>
                                <li>
                                    <a href="bankpot.php">
                                        <i class="fa fa-angle-right"></i> Banking Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="indbankpot.php">
                                        <i class="fa fa-angle-right"></i> Individual Banking Report
                                    </a>
                                </li>
                                <li>
                                    <a href="banking.php">
                                        <i class="fa fa-angle-right"></i> Banking
                                    </a>
                                </li>	
                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="bankpay.php">
                                        <i class="fa fa-angle-right"></i> Bank Payments
                                    </a>
                                </li>
                                <li>
                                    <a href="viewbanking.php">
                                        <i class="fa fa-angle-right"></i> Banking Reconciliation
                                    </a>
                                </li>
                                <li>
                                    <a href="interbanktransfer.php">
                                        <i class="fa fa-angle-right"></i> Inter-Bank Transfers
                                    </a>
                                </li>
                                <li>
                                    <a href="viewbankingreport.php">
                                        <i class="fa fa-angle-right"></i> Banking Officer Report
                                    </a>
                                </li>
                                <li>
                                    <a href="fixed_deposit_interest.php">
                                        <i class="fa fa-angle-right"></i> Accrue Fixed Deposit
                                    </a>
                                </li>	
                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="budget.php">
                                        <i class="fa fa-angle-right"></i>Budgeting
                                    </a>
                                </li>
                                <li>
                                    <a href="banreconcile.php">
                                        <i class="fa fa-angle-right"></i>View Bank Reconciliation
                                    </a>
                                </li>
                                <li>
                                    <a href="accrued_interest.php">
                                        <i class="fa fa-angle-right"></i>Accrued Interest
                                    </a>
                                </li>

                            </ul>	

                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Others<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="sharesmanagement.php">
                                        <i class="fa fa-angle-right"></i> Share managements
                                    </a>
                                </li>
                                <li>
                                    <a href="viewfeedback.php">
                                        <i class="fa fa-angle-right"></i> Feedback
                                    </a>
                                </li>
                                <li>
                                    <a href="withdrawal.php">
                                        <i class="fa fa-angle-right"></i>Withdrawals
                                    </a>
                                </li>


                                <li>
                                    <a href="communication.php">
                                        <i class="fa fa-angle-right"></i>Responses
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="viewbalancebf.php">
                                        <i class="fa fa-angle-right"></i>View Balances B/f
                                    </a>
                                </li>


                                <li>
                                    <a href="withdrawalsview.php">
                                        <i class="fa fa-angle-right"></i>View Withdrawals
                                    </a>
                                </li>
                                <li>
                                    <a href="checkoff.php">
                                        <i class="fa fa-angle-right"></i>Check Off
                                    </a>
                                </li>
                                <li>
                                    <a href="check_off.php">
                                        <i class="fa fa-angle-right"></i>Check Off Report
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="loancheckoff.php">
                                        <i class="fa fa-angle-right"></i>Finish Check Off
                                    </a>
                                </li>
                                <li>
                                    <a href="uploadCheckOff.php">
                                        <i class="fa fa-angle-right"></i>Upload Check Off
                                    </a>
                                </li>
                                <li>
                                    <a href="editcheckoff.php">
                                        <i class="fa fa-angle-right"></i>Edit Check Off
                                    </a>
                                </li>
                                <li>
                                    <a href="gl_ids.php">
                                        <i class="fa fa-angle-right"></i>GL Account IDs
                                    </a>
                                </li>
                            </ul>

                           

                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Messenger<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;" >
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu" >

                                <li>
                                    <a href="create_address_book.php">
                                        <i class="fa fa-angle-right"></i> Create Address Book
                                    </a>
                                </li>
                                <li>
                                    <a href="sendMessageBook.php">
                                        <i class="fa fa-angle-right"></i> Send Message From Address Book
                                    </a>
                                </li>

                                <li>
                                    <a href="manage_address_books.php">
                                        <i class="fa fa-angle-right"></i> Manage Address Book
                                    </a>
                                </li>
                                <li>
                                    <a href="from_defaulters.php">
                                        <i class="fa fa-angle-right"></i> Create Address Book From Defaulters
                                    </a>
                                </li>
                            </ul>									

                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li class="mega-menu-dropdown mega-menu-full">
            <a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
                Reports<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" style="background-color:#6BAA27; color:#272822; margin-left:70px;">
                <li>
                    <!-- Content container to add padding -->
                    <div class="mega-menu-content">
                        <div class="row">
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="loanrep.php">
                                        <i class="fa fa-angle-right"></i>Summary Report
                                    </a>
                                </li>
                                <li>
                                    <a href="leff.php">
                                        <i class="fa fa-angle-right"></i> Loan Balances
                                    </a>
                                </li>
                                <li>
                                    <a href="deff.php">
                                        <i class="fa fa-angle-right"></i> Deposit Balances
                                    </a>
                                </li>
                                <li>
                                    <a href="viewbudget.php">
                                        <i class="fa fa-angle-right"></i> View Budget
                                    </a>
                                </li>

                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="statsdaily.php">
                                        <i class="fa fa-angle-right"></i> Income Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="expport.php">
                                        <i class="fa fa-angle-right"></i> Expenses Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="withreport.php">
                                        <i class="fa fa-angle-right"></i> Withdrawal Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="fixed_deposit_report.php">
                                        <i class="fa fa-angle-right"></i> Fixed Deposit Report
                                    </a>
                                </li>


                            </ul>

                            <ul class="col-md-4 mega-menu-submenu">

                                <li>
                                    <a href="issuedloan.php">
                                        <i class="fa fa-angle-right"></i> Issued Loans
                                    </a>
                                </li>
                                <li>
                                    <a href="dailport.php">
                                        <i class="fa fa-angle-right"></i> Contribution Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="psveff.php">
                                        <i class="fa fa-angle-right"></i> Compulsory Share Balances
                                    </a>
                                </li>
                                <li>
                                    <a href="cogroup.php">
                                        <i class="fa fa-angle-right"></i> Dyanmic Statements
                                    </a>
                                </li>
                                <li>
                                    <a href="term_deposit_interest.php">
                                        <i class="fa fa-angle-right"></i> Accrued Interest
                                    </a>
                                </li>
                            </ul>				


                            <ul class="col-md-4 mega-menu-submenu">
                                <li>
                                    <a href="loandefaulters.php">
                                        <i class="fa fa-angle-right"></i> Loan Defaulters
                                    </a>
                                </li>
                                <li>
                                    <a href="issueport.php">
                                        <i class="fa fa-angle-right"></i> Debtors Report
                                    </a>
                                </li>
                                <li>
                                    <a href="receiveport.php">
                                        <i class="fa fa-angle-right"></i> Creditors Report
                                    </a>
                                </li>
                                <li>
                                    <a href="divreport.php">
                                        <i class="fa fa-angle-right"></i> Dividends Report
                                    </a>
                                </li>
                                <li>
                                    <a href="benev.php">
                                        <i class="fa fa-angle-right"></i> Benevolent Transactions
                                    </a>
                                </li>
                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">


                                <li>  <a href="dynacontr.php">
                                        <i class="fa fa-angle-right"></i> Dyanmic Contributions
                                    </a>
                                </li>
                                <li>  <a href="dynaexp.php">
                                        <i class="fa fa-angle-right"></i> Dynamic Expenses
                                    </a>
                                </li>
                                <li>  <a href="budgetreport.php">
                                        <i class="fa fa-angle-right"></i> Budget Report
                                    </a>
                                </li>
                                
                                <li>  <a href="dmyreports">
                                        <i class="fa fa-angle-right"></i> Report Generator
                                    </a>
                                </li>

                            </ul>
                            <ul class="col-md-4 mega-menu-submenu">


                                <li>  <a href="loanrep.php">
                                        <i class="fa fa-angle-right"></i> Summary Report
                                    </a>
                                </li>
                                <li>  <a href="leff.php">
                                        <i class="fa fa-angle-right"></i> Loan Balances
                                    </a>
                                </li>
                                <li>  <a href="deff.php">
                                        <i class="fa fa-angle-right"></i> Deposit Balances
                                    </a>
                                </li>
                                
                                <li>  <a href="viewbudget.php">
                                        <i class="fa fa-angle-right"></i> View Budget
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </li>
            </ul>
        </li>


        <li>
            <a href="logout">
                Logout(' . servedby($_SESSION['users']) . ')
            </a>
        </li>

    </ul>

</div>';
}

function mobilemenu() {

    echo '<div class="page-container">
	<!-- BEGIN HORIZONTAL MENU PAGE SIDEBAR1 -->
	<div class="page-sidebar navbar-collapse collapse">
		<!--BEGIN: SIDEBAR MENU FOR DESKTOP-->
		
		<!--END: SIDEBAR MENU FOR DESKTOP-->
		<!--BEGIN: HORIZONTAL AND SIDEBAR MENU FOR MOBILE & TABLETS-->
		<ul class="page-sidebar-menu visible-sm visible-xs" data-auto-scroll="true" data-slide-speed="200" >
			<li>
				<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			
				<!-- END RESPONSIVE QUICK SEARCH FORM -->
			</li>
			<li class="active">
				<a href="index.php">
					Statements
					<span class="selected">
					</span>
					<span class="arrow open">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li class="active">
						
						<ul class="sub-menu">
							
							<li class="active">
								<a href="accountstatement.php">
									Contributions
								</a>
							</li>
							
							<li>
								<a href="account.php">
									Mini-statements
								</a>
							</li>
							
							<li>
								<a href="loandel.php">
									Loan Reversal
								</a>
							</li>
							
							<li>
								<a href="dynaind.php">
									 Dynamic Contributions
								</a>
							</li>
							<li>
								<a href="accsa.php">
									Summarized Statements
								</a>
							</li>
							<li>
								<a href="debtors.php">
									 Debtors Acc Statements
								</a>
                                                                <a href="generalstatement.php">
                                                                General Statement
                                                                </a>
							</li>
							
							
							
						</ul>
					</li>
				
					
				
				
				</ul>
			</li>
			<li>
				<a href="#">
					Contributions
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="contribution.php">
						Contribution
							
						</a>
						
					</li>
					<li>
						<a href="viewcontributions.php">
							View Contribution
							
						</a>
						
					</li>
					<li>
						<a href="personalcontributiions.php">
							 Personal Contribution
							
						</a>
						
					</li>
						<li>
						<a href="viewgroups.php">
							Contribution Groups
							
						</a>
						
					</li>
				</ul>
			</li>
			
			<li>
				<a href="#">
					Income
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="income.php">
							Income
							
						</a>
						
					</li>
                                        <li><a href="viewincome.php">View Income</a></li>
				</ul>
			</li>
			
			<li>
				<a href="#">
					Expenses
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu"style="background-color:#82BA00;">
					<li>
						<a href="expenses.php">
							Expenses
							
						</a>
						
					</li>
					<li>
						<a href="pettycash.php">
							Petty  Cash Expenses
							
						</a>
						
					</li>
                                        <li><a href="viewexpenses.php">View Expenses </a></li>
				</ul>
			</li>
			
			<li>
				<a href="#">
					Loans
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00; color="red">
					<li>
						<a href="personalloan.php">
							 Loan Applications
							
						</a>
						
					</li>
					<li>
						<a href="viewloans.php">
							 View Loans
							
						</a>
						
					</li>
					<li>
						<a href="loans.php">
							Successful Loans
						</a>
						
					</li>
					<li>
						<a href="loanApproval.php">
							Loan Approvals
						</a>
						
					</li>
                                        
                                     <li><a href="loandel.php">Loan Reversal</a></li>
                                       <li>    <a href="collateral.php">Add Collateral</a></li>
                                 <li>  <a href="viewcollateral.php">View Collateral</a></li>
                                  <li>    <a href="loandisbursment.php">Loan Disbursment</a></li>

                                        <li>  <a href="viewfines.php">View Fines</a></li>


				</ul>
			</li>
				
				<li>
				<a href="#">
					Registration
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="memberregistration.php">
							 Member registration
							
						</a>
						
					</li>
					<li>
						<a href="viewmembers.php">
							 View members
							
						</a>
						
					</li>
					<li>
						<a href="membercontributiongroup.php">
							 Contribution Groups
							
						</a>
						
					</li>
					<li>
						<a href="personalinformation.php">
							 Personal information
							
						</a>
						
					</li>
					<li>
						<a href="viewAcount.php">
							 View Accounts
							
						</a>
						
					</li>
					<li>
						<a href="viewuploads.php">
							 View Uploads
							
						</a>
						
					</li>
				</ul>
			</li>
			
			<li>
				<a href="#">
					 Finance
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="accountsettings.php">
							Account settings
							
						</a>
						
					</li>
					<li>
						<a href="balancebf.php">
							 Balance b/f
							
						</a>
					
					</li>
					<li>
						<a href="bookcash.php">
							Cashbook
							
						</a>
						
					</li>
					<li>
						<a href="journals.php">
							 Journals
							
						</a>
					
					</li>
					<li>
						<a href="addebtors.php">
							 Add Debtors
							
						</a>
					
					</li>
					<li>
						<a href="addcreditors.php">
							 Add Creditors
							
						</a>
					
					</li>
					<li>
						<a href="issueinvoice.php">
							 Issue Invoice
							
						</a>
					
					</li>
					<li>
						<a href="receiveinvoice.php">
							Receive Invoice
							
						</a>
					
					</li>
					<li>
						<a href="profitandloss.php">
							Profit and Loss
							
						</a>
					
					</li>
					<li>
						<a href="ledger.php">
							General Ledger
							
						</a>
					
					</li>
					<li>
						<a href="trialbalance.php">
							 Trial Balance
							
						</a>
					
					</li>
					<li>
						<a href="balancesheet.php">
							 Balance Sheet
							
						</a>
					
					</li>
					<li>
						<a href="divids.php">
							Annual Dividends
							
						</a>
					
					</li>
					<li>
						<a href="bankpot.php">
							 Banking Transactions
							
						</a>
					
					</li>
					<li>
						<a href="indbankpot.php">
							Individual Banking Report
							
						</a>
					
					</li>
					<li>
						<a href="banknew.php">
							 Add Bank Account
							
						</a>
					
					</li>
					<li>
						<a href="banking.php">
							 Banking
							
						</a>
					
					</li>
					<li>
						<a href="bankpay.php">
							 Bank Payments
							
						</a>
					
					</li>
					<li>
						<a href="viewbanking.php">
							 Banking
							
						</a>
					
					</li>
					<li>
						<a href="interbanktransfer.php">
							Inter Bank Transfer
							
						</a>
					
					</li>
                                        <li><a href="viewbankingreport.php">Banking Officer Report </a>
                                        </li>
				</ul>
			</li>
			<li>
				<a>
					Others
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="sharesmanagement.php">
							 Share managements
						</a>
					</li>
					<li>
						<a href="viewfeedback.php">
							Feedback
						</a>
					</li>
					<li>
						<a href="withdrawal.php">
							 Withdrawals
						</a>
					</li>
					<li>
						<a href="groups.php">
							 Create Groups
						</a>
					</li>
					<li>
						<a href="communication.php">
							 Responses
						</a>
					</li>
					<li>
						<a href="viewincome.php">
							View Incomes
							
						</a>
						
					</li>
					<li>
						<a href="viewexpenses.php">
							View expenses
							
						</a>
						
					</li>
					<li>
						<a href="viewbalancebf.php">
							View balances b/f
							
						</a>
						
					</li>
					<li>
						<a href="yeff.php">
							Next of kin
							
						</a>
						
					</li>
					<li>
						<a href="withdrawalsview.php">
							View Withdrawals
							
						</a>
						
					</li>
					<li>
						<a href="paymode.php">
							Payment mode
							
						</a>
						
					</li>
				</ul>
			</li>
			
					<li>
				<a>
					Reports
					<span class="arrow">
					</span>
				</a>
				<ul class="sub-menu" style="background-color:#82BA00;">
					<li>
						<a href="loanrep.php">
							 Summary Report
						</a>
					</li>
					<li>
						<a href="leff.php">
							Loan Balances
						</a>
					</li>
					<li>
						<a href="checkoff.php">
							 CheckOff Setup
						</a>
					</li>
					<li>
						<a href="offcheck.php">
							Checkoff Statement
						</a>
					</li>
					<li>
						<a href="deff.php">
                            Deposits Balances
						</a>
					</li>
					<li>
						<a href="avail.php">
							Member balances
							
						</a>
						
					</li>
						<li>
						<a href="daypot.php">
                         Loan Transactions
						</a>
					</li>
						<li>
						<a href="dailyreport.php">
                            Daily Transactions
						</a>
					</li>
						<li>
						<a href="bleff.php">
                            Available Balances
						</a>
					</li>
						<li>
						<a href="statsdaily.php">
                            Income Transactions
						</a>
					</li>
						<li>
						<a href="expport.php">
                           Expenses Transactions
						</a>
					</li>
						<li>
						<a href="withreport.php">
                          Withdrawal Transactions
						</a>
					</li>
						<li>
						<a href="dailport.php">
                           Contribution Transactions
						</a>
					</li>
						<li>
<a href="psveff.php">
Compulsory Shares Balances
</a>
</li>
<li>
<a href="cogroup.php">Dynamic Statements</a>
</li>
						<li>
						<a href="cogroup.php">
                           Dynamic Statements
						</a>
					</li>
						<li>
						<a href="issueport.php">
                            Debtors Reports
						</a>
					</li>
						<li>
						<a href="receiveport.php">
                            Creditors Reports
						</a>
					</li>
						<li>
						<a href="divreport.php">
                            Dividends Reports
						</a>
					</li>
						<li>
						<a href="benev.php">
                            ' . getGlname(73) . ' Transactions
						</a>
					</li>
				</ul>
			</li>
			
			
							<li>
				<a href="logout.php">
					Logout
					
				</a>
			
			</li>
			
		</ul>
		<!--END: HORIZONTAL AND SIDEBAR MENU FOR MOBILE & TABLETS-->
	</div>
	<!-- END BEGIN HORIZONTAL MENU PAGE SIDEBAR -->
	<!-- BEGIN CONTENT -->
	
	</div>';
}

//this is the sms sending function
function sms1($amm, $phone, $sms) {
    include 'config.php';
    /*
      $stmt = $dbh->prepare("SELECT * FROM sms");
      $stmt->execute();
      $get_id=$stmt->fetch();
     */
    $query = mysql_query("SELECT * FROM sms");
    $get_id = $row['get_id'];
    $id = $get_id['id'];
    $ch = curl_init();                    // initiate curl
    $url = "localhost/smsAPI/test.php"; // where you want to post data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
    curl_setopt($ch, CURLOPT_POSTFIELDS, "contacts=$phone&message=$sms&amm=1&id=$id"); // define what you  want to post
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
    $output = curl_exec($ch); // execute

    curl_close($ch); // close curl handle

    var_dump($output); // show output
}

function bankdefaultform() {

    echo'<form action="" class="form-horizontal" method="post" id="savemi">

<div class="form-body">
<div class="form-group">
<label class="col-md-4 col-md-offset-1 control-label">Account Name</label>
<div class="col-md-4">
<select id="days" type="text"  name="days"  class="form-control input-medium" placeholder="Default Account" required>
<option>
</option>';

    $query = mysql_query("SELECT * FROM   addbank");

    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['bankname']) . '</option>';
    }

    echo'</select>
</div></div>


<div class="col-md-4 col-md-offset-4">
<div class="form-actions fluid">
<div class="col-md-offset-3 col-md-4">
<input type="submit" class="btn green" name="submitmi" value="submit"  >
</div></div></div>

</div>
</form>';
}

function collateral() {

    echo '
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form method = "post" class="form-horizontal" action = "" enctype = "multipart/form-data" autocomplete = "off">
<div class = "art-content-layout-row">

<div class = "col-md-4" >

<div class = "one"><br />
<label>Search Member No. or Name</label>
<select name = "searchmno" id="select2_sample4" onchange = "showUser(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>

<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['mname'] . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>
</div>

<div class = "two">
<label>Description</label>
<textarea  class="form-control input-medium"  name = "descr" placeholder = "Enter Description" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
<div class = "two">
<label>Identity Number </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "idno" required placeholder = "Enter Identity Number " title = "Enter Identity Number "/>
</div>
</div>
<div class = "col-md-offset-6" >
<div class = "two">
<label>Value of Collateral </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "number" name = "value" required placeholder = "Enter Value of Collateral" title = "Enter Value of Collateral"/>
</div>
<div class = "two">

<label>Status </label><br />
<select class="form-control input-medium select2me" name = "status" required data-placeholder = "Select Status" title = "Select Status "/>
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
</div>

<div class = "two">
<label>Comment </label>
<textarea  class="form-control input-medium"  name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>
<div class = "two">
<label>Upload Scanned Document </label>
<input class="form-control input-medium" type = "file" name = "image" placeholder = "Upload Scanned Document" title = "Upload Scanned Document"/>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">

<button class="btn green" name = "create">Add Collateral</button>
</form>';
    $write = check_write_permission();
    if($write == 1){//if has write permission-edit or delete
    echo '<form action = "" method = "GET" autocomplete = "off">
    <button class="btn green" name = "gedit">Edit Collateral</button>
    </form>';
    }
echo '</div>
</div>
</div>
</div>
</div>';
}

function collateraledit($id, $mno, $descr, $idno, $value, $status, $comment, $image) {
    echo '
<div class="col-md-12">
<div class="col-md-4">
<img src="collateral/' . ($image) . '" width="150px" height="150px"/>


<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "off">


<input type="hidden"  name = "id" value="' . $id . '" required>

<div class = "one">
<label>Search Member No. or Name</label>
<select name = "searchmno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="form-control select2   input-medium">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>


<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-medium" name = "mname" required value = "' . getMembername(base64_encode($mno)) . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>
</div>
<div class = "two">
<label>Description</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" name = "descr" class="form-control input-medium" required value = "' . $descr . '" required title = "Enter Description" placeholder = "Enter Description">
</div>
</div>
<div class="col-md-offset-6">

<div class = "two">
<label>Identity Number </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" name = "idno" class="form-control input-medium" required value = "' . $idno . '" required placeholder = "Enter Identity Number " title = "Enter Identity Number "/>
</div>

<div class = "two">
<label>Value of Collateral </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" name = "value" class="form-control input-medium" required value = "' . $value . '" required placeholder = "Enter Value of Collateral" title = "Enter Value of Collateral"/>
</div>

<div class = "two">
<label>Status </label>
<select name = "status" required class="form-control input-medium" placeholder = "Enter Status" title = "Enter Status "/>
<option>Active</option>
<option>Suspended</option>
</select>
</div>

<div class = "two">
<label>Comment </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" name = "comment" class="form-control input-medium" value = "' . $comment . '" required placeholder = "Enter Comment " title = "Enter Comment "/>
</div>

<div class = "two">
<label>Upload Scanned Document </label>
<input type = "file" class="form-control input-medium" name = "image"  placeholder = "Upload Scanned Document" title = "Upload Scanned Document"/>
</div>

<br />
<button class="btn green" name = "save">Save</button>
</div>
</form></div>';
}

function editcollateral() {
    echo '
<table class="table table-striped table-bordered table-hover table-full-width">
<thead>
<tr>
<th>Member Number</th>
<th>Member Name</th>
<th>Description</th>
<th>Identification</th>
<th>Value</th>
<th>Status</th>
<th>Comment</th>
<th>Image</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM collateral');

    while ($Row = mysql_fetch_array($Rows)) {

//date range difference
        $now = time(); // or your date as well
        $your_date = strtotime($dd1);
        $datediff = $now - $your_date;
        $editday = floor($datediff / (60 * 60 * 24));

        $person = "SELECT * FROM settings";
        $query = mysql_query($person);
        if (mysql_num_rows($query) == 1) {
            $row1 = mysql_fetch_array($query);
            $num = base64_decode($row1['days']);
        }

        echo' <tr>
<td>' . base64_decode($Row['mno']) . '</td>
<td>' . getMembername($Row['mno']) . '</td>
<td>' . base64_decode($Row['name']) . '</td>
<td>' . base64_decode($Row['idno']) . '</td>
<td>' . base64_decode($Row['value']) . '</td>
<td>' . base64_decode($Row['status']) . '</td>
<td>' . base64_decode($Row['comment']) . '</td>

<td><img width="80" height="80" src="collateral/' . base64_decode($Row['image']) . '"></td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        /* if ($num > $editday) { */
        echo '<td> <a onClick="' . $confirmedit . '" href = "collateral.php?gid=' . $Row['id'] . '"><img src = "images/edit.png" > </a></td>';
        /* } else {/*
          echo' <td class="style" style=" font-size:12px;color:red;">Edit period is over</td>';
          /*}
          if ($num > $editday) { */
        echo'<td> <a onClick="' . $confirmdelete . '" href = "collateral.php?coldel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td>';
        /* } else {
          echo' <td class="style" style=" font-size:12px;color:red;">Delete period is over</td>';
          } */
    }
    echo '</table>';
}

function viewcollatel() {

    echo'<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
<thead><tr><th>Image</th><th>name</th><th>Member Name</th><th>Member No</th><th>Idno</th><th>Value</th><th>Comment</th></tr></thead><tbody>';
    $query = mysql_query("SELECT *FROM  collateral  ");
    while ($row = mysql_fetch_array($query)) {
        echo'<tr><td><img src="collateral/' . base64_decode($row['image']) . '"alt="no image" width="150" height="100"></td>
<td>' . base64_decode($row['name']) . '</td>  <td>' . getMembername(($row['mno'])) . '</td><td>' . (base64_decode($row['mno'])) . '</td><td>' . base64_decode($row['idno']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['value']), 2) . '</td><td>' . ucwords(strtolower(base64_decode($row['comment']))) . '</td></tr>';
    }
    echo'</tbody></table>';
}

function thedit() {

    echo '<form name="" method="post" action="">
<div class = "two">
<label>Select Date</label>
<select class="input-medium form-control" name="date">
<option>January ' . date('Y') . '</option>
<option>February ' . date('Y') . '</option>
<option>March ' . date('Y') . '</option>
<option>April ' . date('Y') . '</option>
<option>May ' . date('Y') . '</option>
<option>June ' . date('Y') . '</option>
<option>July ' . date('Y') . '</option>
<option>August ' . date('Y') . '</option>
<option>September ' . date('Y') . '</option>
<option>October ' . date('Y') . '</option>
<option>November ' . date('Y') . '</option>
<option>December ' . date('Y') . '</option>
</select>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "four"><br/>
<button class="btn green" name="log">Check</button>
</div>
</div>
</div>
</div>
</form>';
}

function intstatments($user, $mfrom, $yfrom) {

    $date = $mfrom . ' ' . $yfrom;

    $ary = mysql_query('select * from checkoffull where date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($ary)) {

        $grand+= base64_decode($row['contr']);
        $arand+= base64_decode($row['xmas']);
        $brand+= base64_decode($row['shares']);
        $crand+= base64_decode($row['entrance']);
        $mrand+= base64_decode($row['loan1']);
        $m1rand+= base64_decode($row['loan2']);
        $m2rand+= base64_decode($row['loan3']);
        $m3rand+= base64_decode($row['loan4']);
        $m4rand+= base64_decode($row['loan5']);
        $m5rand+= base64_decode($row['loan6']);
        $m6rand+= base64_decode($row['loan7']);
        $m7rand+= base64_decode($row['loan8']);
        $m8rand+= base64_decode($row['loan9']);
        $m9rand+= base64_decode($row['loan10']);
        $m10rand+= base64_decode($row['loan11']);
        $m11rand+= base64_decode($row['loan12']);
        $m12rand+= base64_decode($row['loan13']);
        $m13rand+= base64_decode($row['loan14']);
        $m14rand+= base64_decode($row['interest']);
        $totall = $grand + $arand + $brand + $crand + $mrand + $m1rand + $m2rand + $m3rand + $m4rand + $m5rand + $m6rand + $m7rand + $m8rand + $m9rand + $m10rand + $m11rand + $m12rand + $m13rand + $m14rand;
    }

    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><thead><th colspan = "3">Checkoff Statement</th></thead></tr></table>
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th>Month</th><th></th><th>Year</th></tr>
<tr><td><center>' . $mfrom . '</center></td><th><center>' . compname() . '</center></th><td><center>' . $yfrom . '</center></td></tr>
</table>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

</div>
</div>
<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method="post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th>Member No</th><th>Member Name</th><th>Monthly Contribution</th><th>Shares</th><th>Xmas</th><th>Entrance Fees</th><th>Normal Loan</th><th>Normal Loan 2</th>
<th>Refinancing Loan</th><th>Refinancing Loan 2</th><th>Emergency Loan</th><th>Emergency Loan 2</th><th>School Fees Loan</th><th>School Fees Loan 2</th><th>School Fees Topup Loan</th>
<th>School Fees Topup Loan 2</th><th>Domestic Loan</th><th>Domestic Loan 2</th><th>Rescue/Mega Rider Loan</th><th>Funeral Rider Loan</th><th>Total Interest</th><th>Total Amount</th></tr>';


    $acry = mysql_query('select * from checkoffull where date="' . base64_encode($date) . '"') or die(mysql_error());
    while ($row2 = mysql_fetch_array($acry)) {

        $yote = base64_decode($row2['contr']) + base64_decode($row2['xmas']) + base64_decode($row2['shares']) + base64_decode($row2['entrance']) + base64_decode($row2['loan1']) + base64_decode($row2['loan2']) + base64_decode($row2['loan3']) + base64_decode($row2['loan4']) + base64_decode($row2['loan5']) + base64_decode($row2['loan6']) + base64_decode($row2['loan7']) + base64_decode($row2['loan8']) + base64_decode($row2['interest']);

        echo '<tr><td>' . base64_decode($row2['mno']) . '</td><td>' . getMembername($row2['mno']) . '</td><td>' . number_format(base64_decode($row2['contr']), 2) . '</td><td>' . number_format(base64_decode($row2['shares']), 2) . '</td><td>' . number_format(base64_decode($row2['xmas']), 2) . '</td><td>' . number_format(base64_decode($row2['entrance']), 2) . '</td><td>' . number_format(base64_decode($row2['loan1']), 2) . '</td><td>' . number_format(base64_decode($row2['loan2']), 2) . '</td>
<td>' . number_format(base64_decode($row2['loan3']), 2) . '</td><td>' . number_format(base64_decode($row2['loan4']), 2) . '</td><td>' . number_format(base64_decode($row2['loan5']), 2) . '</td><td>' . number_format(base64_decode($row2['loan6']), 2) . '</td><td>' . number_format(base64_decode($row2['loan7']), 2) . '</td><td>' . number_format(base64_decode($row2['loan8']), 2) . '</td>
<td>' . number_format(base64_decode($row2['loan9']), 2) . '</td><td>' . number_format(base64_decode($row2['loan10']), 2) . '</td><td>' . number_format(base64_decode($row2['loan11']), 2) . '</td><td>' . number_format(base64_decode($row2['loan12']), 2) . '</td><td>' . number_format(base64_decode($row2['loan13']), 2) . '</td><td>' . number_format(base64_decode($row2['loan14']), 2) . '</td><td>' . number_format(base64_decode($row2['interest']), 2) . '</td><td>' . number_format($yote, 2) . '</td></tr>';
    }

    echo '<tr><td></td><td>TOTAL</td><td>Ksh.' . number_format($grand, 2) . '</td><td>Ksh.' . number_format($brand, 2) . '</td><td>Ksh.' . number_format($arand, 2) . '</td><td>Ksh.' . number_format($crand, 2) . '</td><td>Ksh.' . number_format($mrand, 2) . '</td>
<td>Ksh.' . number_format($m1rand, 2) . '</td><td>Ksh.' . number_format($m2rand, 2) . '</td><td>Ksh.' . number_format($m3rand, 2) . '</td><td>Ksh.' . number_format($m4rand, 2) . '</td><td>Ksh.' . number_format($m5rand, 2) . '</td><td>Ksh.' . number_format($m6rand, 2) . '</td>
<td>Ksh.' . number_format($m7rand, 2) . '</td><td>Ksh.' . number_format($m8rand, 2) . '</td><td>Ksh.' . number_format($m9rand, 2) . '</td><td>Ksh.' . number_format($m10rand, 2) . '</td><td>Ksh.' . number_format($m11rand, 2) . '</td><td>Ksh.' . number_format($m12rand, 2) . '</td>
<td>Ksh.' . number_format($m13rand, 2) . '</td><td>Ksh.' . number_format($m14rand, 2) . '</td><td>Ksh.' . number_format($totall, 2) . '</td></tr>';

    echo '</table>
</div>
</div>';
    echo '<div class = "two"><div class = "noprint"><button value = "Print this page" onclick = "print()">Print</button></div></div>';
}

function assets() {

    echo '<div class="inner_content">
<div class="report-widgets hidden-480 hidden-768">
<div class="row-fluid">	<div class="form-control">
<a href="assetcat.php"  class="more">Asset Categories<i class="icon-arrow-right"></i></a>
</div><div class="form-control">
<a href="assetloc.php"  class="more">Asset Locations<i class="icon-arrow-right"></i></a>
</div>
<div class="form-control">
<a href="assetnew.php"  class="more">Add an Asset<i class="icon-arrow-right"></i></a>
</div><div class="form-control">
<a href="assetreg.php"  class="more">Asset Register<i class="icon-arrow-right"></i></a>
</div><div class="form-control">
<a href="assetass.php" class="more">Assign Asset<i class="icon-arrow-right"></i></a>
</div></div></div></div>';
}

function assetcat() {
    echo '<form action = "" method = "get" autocomplete = "off">
<div class="form_row">
<label class="field_name align_right">Category Code</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "ccode" autofocus required placeholder = "Enter Category Code" title = "Enter Category Code" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Category Description</label>
<div class="field">
<input type = "text" class="form-control input-inline input-medium" name = "cdesc" autofocus required placeholder = "Enter Category Description" title = "Enter Category Description" />
</div></div><div class="form_row">
<label pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="field_name align_right">Fixed Asset Cost GL Code</label>
<div class="field">
<select name = "faglcode" class="form-control input-inline input-medium" required title = "Enter Fixed Asset Cost GL Code">
<option></option>';
    $insert = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($insert)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
    }
    echo '</select>
</div></div>
<div class="form_row">
<label class="field_name align_right">Profit and Loss Depreciation GL Code</label>
<div class="field">
<select name = "pldepcode" class="form-control input-inline input-medium" required title = "Profit and Loss Depreciation GL Code">
<option></option>';
    $ins = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Profit & Loss') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins)) {
        $insert3 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert3)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Profit or Loss on Disposal GL Code</label>
<div class="field">
<select name = "pldiscode" class="form-control input-inline input-medium" required title = "Profit or Loss on Disposal GL Code">
<option></option>';
    $ins2 = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Profit & Loss') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins2)) {
        $insert4 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert4)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Balance Sheet Accumulated Depreciation GL Code</label>
<div class="field">
<select name = "bscode" class="form-control input-inline input-medium" required title = "Balance Sheet Accumulated Depreciation GL Code">
<option></option>';
    $ins3 = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Balance Sheet') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins3)) {
        $insert5 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert5)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div><div class="form_row">
<div class="field">
<button class="btn btn-success" name = "acsubmit">Save</button>
</div>
</div>
</form>
<br/>
<div class="form_row">
<div class="field"><form>
<button class="btn red" name = "accedit">Edit</button></form></div></div>';
}

function editassetcats() {

    echo '<table class="table table-striped table-bordered table-hover datatable" width="100%">
<thead>
<tr>
<th>Category Code</th>
<th>Category Description</th>
<th>Fixed Asset Cost GL Code</th>
<th>Profit and Loss Depreciation GL Code</th>
<th>Profit and Loss Depreciation GL Code</th>
<th>Balance Sheet Accumulated Depreciation GL Code</th> 
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM fixedassetscategory');

    while ($row = mysql_fetch_object($Rows)) {


        echo "<tbody>";
        echo"<tr>";

        echo"<td>" . base64_decode($row->catcode) . "</td>";
        echo"<td>" . base64_decode($row->catdesc) . "</td>";
        echo "<td>" . getGlcode(base64_decode($row->facglcode)) . "</td>";
        echo "<td>" . getGlcode(base64_decode($row->pldeglcode)) . "</td>";
        echo "<td>" . getGlcode(base64_decode($row->pldiglcode)) . "</td>";
        echo "<td>" . getGlcode(base64_decode($row->bsdglcode)) . "</td>";

        echo"<td><a class=\"btn dark_green\" href=\"assetcat.php?acid=$row->id\">Edit</a></td><td>  <a class=\"btn red\" href=\"javascript:delacc('$row->id,$row->catcode');\">Delete</td>
</tr>";
    }
    echo '</table>';
}

function assetcatedit($user, $id, $ccode, $cname, $fagl, $pldep, $pldis, $bsdep) {
    echo '<form action = "" method = "get" autocomplete = "off">
<div class="form_row">
<input name="id" value="' . $id . '" type="hidden">
<label class="field_name align_right">Category Code</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "ccode" value="' . $ccode . '" autofocus required placeholder = "Enter Category Code" title = "Enter Category Code" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Category Description</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "cdesc" value="' . $cname . '" autofocus required placeholder = "Enter Category Description" title = "Enter Category Description" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Fixed Asset Cost GL Code</label>
<div class="field">
<select name = "faglcode" class="form-control input-inline input-medium" required title = "Enter Fixed Asset Cost GL Code">
<option></option>';
    $insert = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($insert)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
    }
    echo '</select>
</div></div>
<div class="form_row">
<label class="field_name align_right">Profit and Loss Depreciation GL Code</label>
<div class="field">
<select name = "pldepcode" class="form-control input-inline input-medium" required title = "Profit and Loss Depreciation GL Code">
<option></option>';
    $ins = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Profit & Loss') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins)) {
        $insert3 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert3)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Profit or Loss on Disposal GL Code</label>
<div class="field">
<select name = "pldiscode" class="form-control input-inline input-medium" required title = "Profit or Loss on Disposal GL Code">
<option></option>';
    $ins2 = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Profit & Loss') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins2)) {
        $insert4 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert4)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Balance Sheet Accumulated Depreciation GL Code</label>
<div class="field">
<select name = "bscode" class="form-control input-inline input-medium" required title = "Balance Sheet Accumulated Depreciation GL Code">
<option></option>';
    $ins3 = mysql_query('select * from accounts where status="' . base64_encode('Active') . '" and actype="' . base64_encode('Balance Sheet') . '"') or die(mysql_error());
    while ($low = mysql_fetch_array($ins3)) {
        $insert5 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" and accgroup="' . base64_encode($low['id']) . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($insert5)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '-' . base64_decode($row['accode']) . '</option>';
        }
    }
    echo '</select>
</div></div>

<div class="form_row">
<div class="field">
<button class="btn btn-success" name = "ace">Update</button>
</div>
</div>
</form>';
}

function assetnewform() {
    echo '<form action = "" method = "get" autocomplete = "off">
<div class="col-md-6">
<div class="form_row">
<label class="field_name align_right">Asset Description (Short)</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "sasset" autofocus required placeholder = "Enter Asset Description (Short)" title = "Enter Asset Description (Short)" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Asset Description (Long)</label>
<div class="field">
<textarea pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "lasset" autofocus required placeholder = "Enter Asset Description (Long)" title = "Enter Asset Description (Long)" />
</textarea></div></div>

<div class="form_row">
<label class="field_name align_right">Asset Value</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "number" class="form-control input-inline input-medium" name = "asvalue" autofocus required placeholder = "Enter Asset Value" title = "Enter Asset Value" />
</div></div>


<label class="field_name align_right">Asset Category</label>

<select class="form-control  input-medium" name = "assetcat" class="form-control input-inline input-medium" required title = "Select Asset Category">
<option></option>';

    $insert = mysql_query('select * from fixedassetscategory') or die(mysql_error());
    while ($row = mysql_fetch_array($insert)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['catdesc']) . '</option>';
    }
    echo '</select>


<div class="form_row">
<label class="field_name align_right">Asset Location</label>
<div class="field">
<select name = "assetloc" class="form-control input-inline input-medium" required title = "Select Asset Location">
<option></option>';
    $insert2 = mysql_query('select * from fixedassetslocation') or die(mysql_error());
    while ($row = mysql_fetch_array($insert2)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['lname']) . '</option>';
    }
    echo '</select>
</div></div>
<div class="form_row">
<label class="field_name align_right">Bar Code</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "barcode" autofocus required placeholder = "Enter Bar Code" title = "Enter Bar Code" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Serial Number</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "serialno" autofocus required placeholder = "Enter Serial Number" title = "Enter Serial Number" />
</div></div>

<label class="field_name align_right">Depreciation Type</label>

<select class="form-control  input-medium" name = "deptype"  class="chosen" required title = "Select Depreciation Type">
<option></option>
<option>Straight Line</option>
<option>Diminishing Value</option>
</select>


<div class="form_row">
<label class="field_name align_right">Depreciation Rate (%)</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "deprate" autofocus required placeholder = "Enter Depreciation Rate" title = "Enter Dereciation Rate" />
</div></div>

<div class="form_row">
<div class="field">
<button class="btn btn-success" name = "acsubmit">Save</button>
</div>
</div>
</div>
</form>
<br/>
<div class="form_row">
<div class="field">
<form>
&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn red" name = "accedit">Edit</button>
</form></div>
</div>';
}

function editassetnew() {

    echo '<table class="table table-striped table-bordered table-hover datatable" width="100%">
<thead>
<tr>
<th>Assets Desc (Short)</th>
<th>Assets Desc (Long)</th>
<th>Assets Value</th>
<th>Assets Category</th>
<th>Assets Location</th>
<th>Barcode</th>
<th>Serial Number</th>
<th>Depreciation Type</th>
<th>Depreciation Rate (%)</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM fixedassets');

    while ($row = mysql_fetch_object($Rows)) {


        echo "<tbody>";
        echo"<tr>";

        echo"<td>" . base64_decode($row->sassets) . "</td>";
        echo"<td>" . base64_decode($row->lassets) . "</td>";
        echo"<td>Kshs." . number_format(base64_decode($row->asvalue), 2) . "</td>";
        echo "<td>" . getAssetcat(base64_decode($row->assetscat)) . "</td>";
        echo "<td>" . getAssetloc(base64_decode($row->assetsloc)) . "</td>";
        echo"<td>" . base64_decode($row->barcode) . "</td>";
        echo"<td>" . base64_decode($row->serialno) . "</td>";
        echo "<td>" . (base64_decode($row->deptype)) . "</td>";
        echo "<td>" . base64_decode($row->deprate) . "%</td>";

        echo"<td><a class=\"btn dark_green\" href=\"assetnew.php?acid=$row->id\">Edit</a></td><td>  <a class=\"btn red\" href=\"javascript:delacc('$row->id,$row->acname');\">Delete</td>
</tr>";
    }
    echo '</table>';
}

function assetnewedit($user, $id, $sasset, $lasset, $asvalue, $assetcat, $assetloc, $barcode, $serial, $deptype, $deprate) {
    echo '<form action = "" method = "get" autocomplete = "off">
<div class="form_row">
<input name="id" value="' . $id . '" type="hidden">

<div class="form_row">
<label class="field_name align_right">Asset Description (Short)</label>
<div class="field">
<input type = "text" class="form-control input-inline input-medium" name = "sasset" value="' . $sasset . '" autofocus required placeholder = "Enter Asset Description (Short)" title = "Enter Asset Description (Short)" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Asset Description (Long)</label>
<div class="field">
<textarea type = "text" class="form-control input-inline input-medium" name = "lasset" autofocus required placeholder = "Enter Asset Description (Long) " title = "Enter Asset Description (Long)" />
' . $lasset . '</textarea></div></div>

<div class="form_row">
<label class="field_name align_right">Asset Value</label>
<div class="field">
<input type = "text" class="form-control input-inline input-medium" name = "asvalue" value="' . $asvalue . '" autofocus required placeholder = "Enter Asset Value" title = "Enter Asset Value" />
</div></div>

<div class="form_row">
<label class="field_name align_right">Asset Category</label>
<div class="field">
<select name = "assetcat" class="form-control input-inline input-medium" required title = "Select Asset Category">
<option></option>';
    $insert = mysql_query('select * from fixedassetscategory') or die(mysql_error());
    while ($row = mysql_fetch_array($insert)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['catdesc']) . '</option>';
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Asset Location</label>
<div class="field">
<select name = "assetloc" class="form-control input-inline input-medium" required title = "Select Asset Location">
<option></option>';
    $insert2 = mysql_query('select * from fixedassetslocation') or die(mysql_error());
    while ($row = mysql_fetch_array($insert2)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['lname']) . '</option>';
    }
    echo '</select>
</div></div>

<div class="form_row">
<label class="field_name align_right">Bar Code</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "barcode" value="' . $barcode . '" autofocus required placeholder = "Enter Bar Code" title = "Enter Bar Code" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Serial Number</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "text" class="form-control input-inline input-medium" name = "serialno" value="' . $serial . '" autofocus required placeholder = "Enter Serial Number" title = "Enter Serial Number" />
</div></div>
<div class="form_row">
<label class="field_name align_right">Depreciation Type</label>
<div class="field">
<div class="form-control">
<select name = "deptype" class="chosen" required title = "Select Depreciation Type">
<option></option>
<option>Straight Line</option>
<option>Diminishing Value</option>
</select>
</div></div></div>

<div class="form_row">
<label class="field_name align_right">Depreciation Rate (%)</label>
<div class="field">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type = "number" class="form-control input-inline input-medium" name = "deprate" value="' . $deprate . '" autofocus required placeholder = "Enter Depreciation Rate" title = "Enter Dereciation Rate" />
</div></div>
<div class="form_row">
<div class="field">
<button class="btn btn-success" name = "ace">Update</button>
</div>
</div>
</form>';
}

function loandisbursment() {

    echo '<form action="" class="form-horizontal"id="tform" method="post">
        <div class="form-body">
<div class="col-md-4">
<div class="form-group">
<label>Select Member Number</label><br />
<select name = "mno" data-placeholder="Select Member Number" onChange="loanDis(this.value);" class="input-medium form-control select2me">    
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  WHERE  status='" . base64_encode(active) . "'");
    while ($row = mysql_fetch_array($stmt)) {
        $memno = ($row['membernumber']);
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select></div>
        <div class="form-group">
<label>Member Name</label>
<input name=name" data-placeholder="Member Name" readonly title="Member Name" class="form-control input-medium"  name="memberName" id="Name"/>
    </div>
<div class="form-group">
        <label>Select Loan Name</label><br />
        <select class="form-control input-medium select2me" id="loan" name ="tname" required data-placeholder="Select Loan Name" title = "Select Loan Name"><option></option>';
   
    echo'</select></div>

  
            <div class="form-group">
<label>Date Of  Disbursement</label>';


    print'<input type="text" id="END_DATE" placeholder = "Enter Date Of  Disbursement" data-date= data-date-start-date= title = "Enter Date Of  Disbursement" id="dnt" name="date" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  required />
</div>
<div class="form-group">
<label>Select Sacco Bank Account From</label><br />
<select  name="bnkid" type="text" class="form-control input-medium select2me"   title="Select Account" data-placeholder="Select Account">
<option></option>';
    $sth = mysql_query("SELECT * FROM addbank");
    while ($row1 = mysql_fetch_array($sth)) {
        echo '<option value="' . $row1['primarykey'] . '"  >' . base64_decode($row1['bankname']) . '</option>';
    }
    echo'</select>
  </div>
</div>
<div class="col-md-offset-2 col-md-4">


<label>Select Individual  To</label>
<div class="form-group radio-list">

  <label>Individual Bank A/C To</label> 
                                                                <!---choose bank acount  ---->
                                                                <input required class="form-control input-medium" value="1"  id="no" type="radio" name="bnkAccfrom" >
   <br />
   <select type="text" name="indbank" class="form-control input-medium select2me" id="indBank" ></select>
    <label>Individual Internal A/C </label> 
                                                                <!--- choose individual account acount  ---->
                                                                <input required class="form-control input-medium" value="2"  id="yes" type="radio" name="bnkAccfrom" >
   <br /> 
   <select type="text" name="indbank" class="form-control input-medium select2me" id="indAcc" >
  <option></option> ';
    $stll = mysql_query("SELECT *  FROM memberaccs WHERE mno= '" . $memno . "' AND  status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($stll)) {
        ECHO'<option value="' . base64_decode($row['glaccid']) . '">' . getGlname(base64_decode($row['glaccid'])) . ' </option> ';
    }
    echo'</select>
</div>



  <div class = "form-group">
<label>Payment Type</label><br />
<select class="form-control input-medium select2me" name = "ptype"  data-placeholder="Payment Type" required title = "Payment type" onchange="showUsermc(this.value)">';
    echo '<option></option>';
    $query = mysql_query("SELECT * FROM paymentmode ");
    while ($row99 = mysql_fetch_array($query)) {
        echo '<option value="' . $row99['id'] . '">' . base64_decode($row99['mode']) . '</option>';
    }

    echo '</select>
</div>
<div class="form-group">

<label>Ref. No.</label>
<input name="ref" required type="text"  placeholder="Enter Ref No." title="Enter Ref No." class="form-control required input-medium" />
</div>
  <div class="form-group">
<label>Comments</label>
<input name="comment" required type="text" pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  placeholder = "Enter Comments" title = "Enter Comments" />
</div>

<div class="form-group">

<label>Amount</label>
<input name="amount" required type="number" id=amounta"  placeholder="Enter Amount" title="Enter Amount" class="form-control input-medium" />
</div>


<input type="submit" name="dis" value="Submit" class="btn green">
</div>

</div></form> ';
}

function viewdisba() {

    echo '<table id="sample_2" class="table table-striped table-bordered table-hover">

<thead>
<tr><th>Member Number   </th><th>Memberame  </th><th> Loan Type  </th><th>Disbursment   </th><th>Payment Mode   </th><th>Mode Pay   </th><th>comments   </th></tr></thead><tbody>';
    $qry = mysql_query("  SELECT *  FROM    loandisbursment  ");
    while ($row = mysql_fetch_array($qry)) {
        echo'<tr><td>' . base64_decode($row['mno']) . '</td><td>' . getMembername(($row['mno'])) . '</td><td>' . base64_decode($row['loantype']) . '</td><td>' . base64_decode($row['datedisb']) . '</td><td>' . base64_decode($row['paymode']) . '</td><td>' . base64_decode($row['accno']) . '</td><td>' . base64_decode($row['comments']) . '</td></tr>';
    }
    echo'</tbody></table>';
}

function viewloanrep() {

    echo'<form action="" method="post" name="myforms" enctype = "multipart/form-data" class="form-horizontal" autocomplete = "on">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Member Number</label>
<div class="col-md-4">
<select name = "mno" id="select2_sample4" onchange = "showUsersa(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
</div></div></form>


<div id="txttHintt">

</div>';
}

function personalloanguranteed($tid) {

    echo'<div id="mt1"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample">
   <thead><tr><th colspan="6"><h3 align="center"> <b>Personal Loan Gurantor Information </b> </h3>             </th></tr>
   <tr><th> Member Name	</th><th>  Gurantor Name</th><th> 	Amount 	</th><th>  Date 	</th><th>	Comment 	</th><th>	Status </th></tr></thead><tbody>';
    $stmt = mysql_query(" SELECT * FROM  guarantors   WHERE 	transactionid='" . (($tid)) . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getMembername($row['memberno']) . '</td><td>' . getMembername($row['guarantorno']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['sharesoffered']), 2) . '</td><td>' . base64_decode($row['date']) . '</td><td>' . ucwords(strtolower(base64_decode($row['comment']))) . '</td><td>' . ucwords(strtolower(base64_decode($row['status']))) . '</td></tr>';
    }
    echo'</tbody></table> </div> <input type="button" class="btn green" onClick="return printResultsd()" value="print">';
}

function membersguranteed($tid) {

    echo'<div id="mt2"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sampl">
   <thead><tr><th colspan="6"><h3 align="center"> <b>' . getMembername(getmno($tid)) . ' Members You Have Guranteed  </b> </h3>             </th></tr>
   <tr><th> Member Name	</th><th>  Gurantor Name</th><th> 	Amount 	</th><th>  Date 	</th><th>	Comment 	</th><th>	Status </th></tr></thead><tbody>';
    $stmt = mysql_query(" SELECT * FROM  guarantors   WHERE  guarantorno='" . (getmno($tid)) . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getMembername($row['memberno']) . '</td><td>' . getMembername($row['guarantorno']) . '</td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['sharesoffered']), 2) . '</td><td>' . base64_decode($row['date']) . '</td><td>' . ucwords(strtolower(base64_decode($row['comment']))) . '</td><td>' . ucwords(strtolower(base64_decode($row['status']))) . '</td></tr>';
    }
    echo'</tbody></table></div><input type="button" class="btn green" onClick="return printResultsdd()" value="print">';
}

function viewmemberloan() {

    echo'<form action="" method="post" name="myforms" enctype = "multipart/form-data" class="form-horizontal" autocomplete = "on">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Member Number</label>
<div class="col-md-4">
<select name = "mno" id="select2_sample4" onchange = "viewmemberloan(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
</div></div></form>


<div id="viewmemberloan">

</div>';
}

function memberLoanStatements($q) {

    $query = mysql_query("SELECT * FROM loans WHERE membernumber ='$q'") or die(mysql_error());

    if ($query < 1) {
        $alertyes = '<script type="text/javascript">alert("You Do Not Have Loan!");</script>';
        echo $alertyes;
    } else {
        echo '<div id="mt"> <table  class="table table-striped table-bordered table-hover table-full-width" >
<thead><tr> <th colspan="7"><h3 align="center"><b> Loans </b>  </h3></th> </tr>
<tr><th>Member No</th><th>Member Name</th><th>Loan Type</th><th>Amount</th><th>Date of Application</th>
<th>Status</th><th>Select</th> </tr></thead>';

        while ($row = mysql_fetch_array($query)) {

            echo'<tbody><tr><td>' . base64_decode($row['membernumber']) . ' </td><td>' . getmembername($row['membernumber']) . ' </td>
<td>' . loanname($row['transid']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td>
<td>' . (base64_decode($row['date'])) . '</td><td>' . ucwords(strtolower(base64_decode($row['status']))) . '</td>
<td>  <form action="" method="POST"><input type="hidden" name="tid" value="' . $row['transid'] . '" /><button type="submit" name="btntid" class="btn green" > View Loan Details</button>  </form></td></tr>';
        }
        echo'</tbody></table></div>';
    }
}

function repaydetails($user, $id) {

    $query = mysql_query(" SELECT * FROM loanapplication WHERE id ='$id'") or die(mysql_error());

//membernumber 	loantype 	purpose 	installments 	date 	appdate 	gperiod 	tperiod
    echo'<table  class="table table-striped table-bordered table-hover table-full-width" >
<thead  class="style">
<tr><th class="style">Member No</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th><th class="style">Purpose</th>
<th class="style">Payment Mode</th><th class="style">Application Date</th>
<th class="style">Grace Period (in Days)</th>
<th class="style">No. Instalments</th>
</tr> </thead>';

    while ($row = mysql_fetch_array($query)) {

        echo'<tbody>
<a class="btn green" button href="personalloan.php">Back</a button>
<tr><td>' . base64_decode($row['membernumber']) . '</td>
<td>' . getmembername($row['membernumber']) . '</td>
<td>' . getloaname(base64_decode($row['loantype'])) . '</td>
<td>' . base64_decode($row['purpose']) . '</td>
<td>' . base64_decode($row['paymode']) . '</td>
<td>' . base64_decode($row['appdate']) . '</td>
<td>' . base64_decode($row['gperiod']) . '</td>
<td>' . base64_decode($row['installments']) . '</td></tr>';
        $mnno = base64_decode($row['membernumber']);
        $loanid = $row['id'];
    }

    echo'</tbody></table>';

    $qry = mysql_query(" SELECT * FROM loanrepaydates WHERE mno='$mnno' AND loanid='$loanid'") or die(mysql_error());

    echo'<table class="table table-striped table-bordered table-hover table-full-width">
<thead>
<tr>
<th>Member Number</th>
<th>Loan Id</th>
<th>Dates </th>
<th>Payno</th>
<th>Start Bal</th>
<th>Interest Payment</th>
<th>Principal Payment</th>
<th>End Bal</th>
<th>Cumulative Interest</th>
<th>Cumulative Payment</th>
</tr>
</thead></tbody>';

    while ($row1 = mysql_fetch_array($qry)) {

        echo '<tr><td>' . $row1['mno'] . '</td><td>' . $row1['loanid'] . '<td>' . $row1['dates'] . '</td><td>' . $row1['payno'] . '</td><td>' . $row1['start_bal'] . '</td><td>' . $row1['interest_payment'] . '</td><td>' . $row1['principal_payment'] . '</td><td>' . $row1['end_bal'] . '</td><td>' . $row1['cumulative_interest'] . '</td><td>' . $row1['cumulative_payment'] . '</td></tr>';
    }

    echo '</tbody></table>';
}

function loanrepay($q) {

    $query = mysql_query("SELECT * FROM loanapplication WHERE membernumber ='$q'  AND  status='" . base64_encode('pending') . "'  ") or die(mysql_error());
    echo '<table  class="table table-striped table-bordered table-hover table-full-width" >
<thead  class="style">
<tr><th class="style">Member No</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Date of Application</th>
<th class="style">Select</th> </tr></thead>';

    while ($row = mysql_fetch_array($query)) {

        echo'<tbody>
<tr><td>' . base64_decode($row['membernumber']) . ' </td>
<td>' . getmembername($row['membernumber']) . ' </td>
<td>' . getloaname(base64_decode($row['loantype'])) . ' </td>
<td>' . date('d-M-Y', (base64_decode($row['appdate']))) . '</td>
<td><a button href="repay.php?id=' . $row['id'] . '">View Repayment</a button> </td></tr>';
    }
    echo'</tbody></table>';
}

function memberloans($q) {

    $query = mysql_query("SELECT * FROM loans WHERE membernumber ='$q'") or die(mysql_error());

    if ($query < 1) {
        $alertyes = '<script type="text/javascript">alert("You Do Not Have Loan!");</script>';
        echo $alertyes;
    } else {
        echo '<div id="mt"> <table  class="table table-striped table-bordered table-hover table-full-width" >
<thead><tr> <th colspan="7"><h3 align="center"><b> Loans </b>  </h3></th> </tr>
<tr><th>Member No</th><th>Member Name</th><th>Loan Type</th><th>Amount</th><th>Date of Application</th>
<th>Status</th><th>Select</th> </tr></thead>';

        while ($row = mysql_fetch_array($query)) {

            echo'<tbody><tr><td>' . base64_decode($row['membernumber']) . ' </td><td>' . getmembername($row['membernumber']) . ' </td>
<td>' . loanname($row['transid']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td>
<td>' . (base64_decode($row['date'])) . '</td><td>' . ucwords(strtolower(base64_decode($row['status']))) . '</td>
  <td><a button href="personalloanreports.php?tid=' . $row['transid'] . '"> View Loan Details</a button>  </td></tr>';
        }
        echo'</tbody></table></div>';
    }
}

function deincome($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from paymentin where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . ($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400;
        }

        return $mtotal;
    }
}

function diexpense($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;
    $intotal = 0;
    $extotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from paymentout where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transname = "' . ($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['amount']);
            }

            $s = $s + 86400;
        }

        return $mtotal;
    }
}

function loanminiform() {

    echo '<form name="" method="get" action="">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Select Member</label>
<select  class="form-control input-large" name="mno" title= "Select Member to Produce Mini-Statement" required>
<option></option>';

    $qry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . base64_decode($row['membernumber']) . '">' . base64_decode($row['membernumber']) . ' - ' . getMembername($row['membernumber']) . ' </option>';
    }

    echo ' </select>
</div>
<div class="col-md-4">
<button class="btn green" name="msubmit">Generate Statement</button>
</div>
</div>
</form>';
}

function baltbal($user, $datefrom, $dateto) {
    $incomed = 0;
    echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover">
<thead>
<tr> <th colspan="4"><h3 align="center"><b> Trial Balance  As At ' . $datefrom . '  To  ' . $dateto . ' </b></h3> </th></tr>
<tr>
<th>Account Number</th><th> Account Name</th> <th> Debit </th> <th> Credit </th> </tr>
</thead>
<tbody>';
    $stl = mysql_query("SELECT * FROM  addbank where status='QWN0aXZl'");
    while ($rq = mysql_fetch_array($stl)) {

        $bnk = bankAmount($rq['primarykey'], $datefrom, $dateto);


        if ($bnk != null) {
            $bnkDEB += $bnk;

            echo'<tr><td>' . getloanglacc(base64_decode($rq['bankname'])) . '</td><td>' . base64_decode($rq['bankname']) . '</td><td>' . getsymbol() . ' ' . number_format($bnk, 2) . '</td><td></td></tr>';
        }
    }

    $sthw = mysql_query("SELECT * FROM  loansettings where status='" . base64_encode('Active') . "'");
    while ($rzow = mysql_fetch_array($sthw)) {

        $asets = loansbal($rzow['id'], $datefrom, $dateto);
        $totalasets +=$asets;
        if ($asets != null) {

            echo'<tr><td>' . getloanglacc(base64_decode($rzow['lname'])) . '</td><td>' . base64_decode($rzow['lname']) . '</td><td>' . getsymbol() . ' ' . number_format($asets, 2) . '</td><td></td></tr>';
        }
    }


    $sth = mysql_query("SELECT * FROM  glaccounts  ");
    while ($row = mysql_fetch_array($sth)) {

        if (base64_decode($row['accgroup']) == 1) {

            $company_Assets = company_Assets($row['id']);

            if ($company_Assets != null) {

                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td>  <td>' . getsymbol() . ' ' . number_format($company_Assets, 2) . '</td><td></td> </tr>';

                $company_ass +=$company_Assets;
            }///assets depreciation
            $dreciation_Assets = dreciation_Assets($row['id']);
            if ($dreciation_Assets != null) {
                $dreciationAssets +=$dreciation_Assets;
                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>Depreciation For ' . base64_decode($row['acname']) . '</td> <td></td><td>' . getsymbol() . ' ' . number_format($dreciation_Assets, 2) . '</td> </tr>';
            }
        } else if (base64_decode($row['accgroup']) == 2) {
            $bankAmountFromm = bankAmountFrom($row['id']);
            if ($bankAmountFromm != null) {
                $bankAmountFrom +=$bankAmountFromm;

                echo'<tr><td>' . ($row['id']) . '</td><td>' . base64_decode($row['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($bankAmountFromm, 2) . '</td></tr>';
            }
            $lia = company_Liabilities($row['id'], $datefrom, $dateto);
            if ($lia != null) {
                $liab +=$lia;

                echo'<tr><td>' . ($row['id']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($lia, 2) . '</td></tr>';
            }
            $liabilities = calLiaAsetShare($row['id'], $row['accgroup'], $datefrom, $dateto);
            if ($liabilities != null) {
                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($liabilities, 2) . '</td></tr>';
                $liabilitiesd +=$liabilities;
            }
        } else if (base64_decode($row['accgroup']) == 3) {
            $shares = calShare($row['id'], $row['accgroup'], $datefrom, $dateto);
            if ($shares != null) {
                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($shares, 2) . '</td></tr>';
                $sharesd +=$shares;
            }
        } else if (base64_decode($row['accgroup']) == 4) {
            $income = trialIncome($row['id'], $row['accgroup'], $datefrom, $dateto);

            if ($income != null) {
                $incomed +=$income;
                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td></td><td>' . getsymbol() . ' ' . number_format($income, 2) . '</td></tr>';
            }
        } else {
            $expenses = incomeandexpenses($row['id'], $row['accgroup'], $datefrom, $dateto);
            if ($expenses != null) {
                echo'<tr><td>' . base64_decode($row['accode']) . '</td><td>' . base64_decode($row['acname']) . '</td><td>' . getsymbol() . ' ' . number_format($expenses, 2) . '</td><td></tr>';
                $exp +=$expenses;
            }
        }
    }


    $credit = $liabilitiesd + $sharesd + $incomed + $dreciationAssets + $thecontr + $bankAmountFrom + $liab;
    $debit = $totalasets + $bnkDEB + $exp + $company_ass; //+ $exp + $bankAmount + $bankAmountFrom ;

    echo'<tr><td colspan="2"><h5 align="right"><b> Total Amount </b></h5></td><td><h5><b>' . getsymbol() . ' ' . number_format($debit, 2) . ' </b></h5> </td> <td><h5><b>' . getsymbol() . ' ' . number_format($credit, 2) . ' </b></h5>   </tr>';

    echo'<tr><td colspan="4"><h5 align="right"><b>Printed On ' . date('d-M-Y') . ' </b></h5> </td>   </tr></tbody></table></div>';
}

function balin($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction= "' . ($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['amount']);
            }
            $s = $s + 86400;
        }
        return $mtotal;
    }
}

function balout($user, $acc, $datefrom, $dateto) {

    $mtotal = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {

            $mqry = mysql_query('select * from membercontribution where date = "' . base64_encode(date("d-M-Y", $s)) . '" and transaction= "' . ($acc) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['amount']);
            }
            $s = $s + 86400;
        }
        return $mtotal;
    }
}

function deasset($user, $datefrom, $dateto) {

    $mtotal = 0;


    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from assets where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['asvalue']);
            }

            $s = $s + 86400;
        }

        return $mtotal;
    }
}

function deliabs($user, $datefrom, $dateto) {

    $mtotal = 0;

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $mqry = mysql_query('select * from liabilities where date = "' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
            while ($row = mysql_fetch_array($mqry)) {

                $mtotal +=base64_decode($row['lamount']);
            }

            $s = $s + 86400;
        }

        return $mtotal;
    }
}

function viewfines() {

    echo'<form action="" method="post" name="myforms" enctype = "multipart/form-data" class="form-horizontal" autocomplete = "on">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Member Number</label>
<div class="col-md-4">
<select name = "mno" id="select2_sample4" onchange = "showUsersa(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
</div></form>


<div id="txttHintt">

</div>';
}

function viewbankingreport($user, $officer, $datefrom, $dateto) {

//

    echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover">
<tr><th colspan="7"><h3 align="center"><b>  ' . $officer . ' Banking Report  </b></h3></th></tr>
<tr><th>Bank Name </th><th>Branch </th> <th> Account Number</th> <th>Amount</th> <th> Banking Officer </th><th>Comments </th> <th> Date</th> </tr>';
//$balbf ='00.00';

    echo '<tr> <th>' . $datefrom . '</th> <th colspan="5">' . $officer . '</th> <th>' . $dateto . '</th></tr>';

    $query = mysql_query('select * from   banking where  approvedby="' . base64_encode($officer) . '" AND   date  BETWEEN "' . base64_encode($dateto) . '" AND "' . base64_encode($datefrom) . '" ') or die(mysql_error());

    while ($Row = mysql_fetch_array($query)) {
        echo'<tr><td class="style">' . base64_decode($Row['bankname']) . '</td>
<td class="style">' . base64_decode($Row['branch']) . '</td>
<td class="style">' . base64_decode($Row['accno']) . '</td>
<td class="style">' . base64_decode($Row['amount']) . '</td>
<td class="style">' . base64_decode($Row['approvedby']) . '</td>
<td class="style">' . base64_decode($Row['comments']) . '</td>
<td class="style">' . base64_decode($Row['date']) . '</td>';
    }
    echo'</tr></tbody></table></div>';
}

function dateformacc() {
    echo '<div class = "art-layout-cell" style = "width: 100%" >
<div class = "row">
<form action = "" method = "post" class="form-horizontal" autocomplete = "off">

<div class = "col-md-5 ">
<div class = "noprint">
<div class="form-group">
<label class="control-label col-md-3">Date Range</label>
<div class="col-md-6">
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
<!-- /input-group -->
<span class="help-block">
</span>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3">Select Bank Officer</label>
<div class="col-md-7">
<select type="text" id="accnofrom" name="acc" class="form-control" title="Select  Bank officer " placeholder="Select  Bank officer ">
<option></option>';

    $query = mysql_query("SELECT * FROM  bankingofficer");

    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . base64_decode($row['officer']) . '">' . base64_decode($row['officer']) . '</option>';
    }
    echo'</select>
</div>
</div>
<div class="col-md-offset-2 col-md-4">
<br><button class = "btn green" name = "sdate">Submit</button>
</div>
</div>
</div>
</form>
</div>
</div>';
}

function viewaudittrailreport() {

    echo '<div class = "art-layout-cell" style = "width: 100%" >
<div class = "row">
<form action = "" method = "post" class="form-horizontal" autocomplete = "off">

<div class = "col-md-5 ">
<div class = "noprint">
<div class="form-group">
<label class="control-label col-md-4">Date Range</label>
<div class="col-md-6">
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
<!-- /input-group -->
<span class="help-block">
</span>
</div></div>
<div class="form-group">
<label class="control-label col-md-4">Select User</label>
<div class="col-md-6">
<select type="text" required Title="Member Number" class="form-control">
<option></option>';
    $query = mysql_query("SELECT * FROM     audit      ");
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['user']) . '</option>';
    }
    echo'</select>
</div></div>
<div class="col-md-offset-4 col-md-4">
<br><button class="btn green" name="audittrail">Submit</button>
</div>
</div>
</div>';
}

function audittrailreport($datefrom, $dateto, $user) {


    $query = mysql_query("SELECT  * FROM     audit  WHERE  user='$user' AND date BETWEEN  '$datefrom' AND  '$dateto'  ");
    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead><tr><th>ID</th><th> User  </th><th>Activity   </th><th> Date  </th><th>  Time</th></tr></thead><tbody>';
    while ($row = mysql_fetch_array($query)) {
        echo'<tr><td>' . ($row['id']) . '</td><td>' . base64_decode($row['user']) . '</td><td> ' . base64_decode($row['activity']) . ' </td><td> ' . base64_decode($row['date']) . '  </td><td>  ' . base64_decode($row['time']) . '</td></tr>';
    }

    echo'</tbody></table>';
}

function currencysettings() {
    echo' <form action="" id="currency" class="form-horizontal" method="post"> 
  <div class="form-body">
  
  <div class="col-md-12">
 
<div class="col-md-4">
<div class="form-group">
 <label>Currency Name </label>
<input type="text" name="currencyname" required title="Currency Name" placeholder="Currency Name" id="currency" class="form-control input-medium">
</div>

  <div class="form-group">
 <label >Currency Code </label>
<input type="text" name="code" required title="Currency Code" placeholder="Currency Code" id="code" class="form-control input-medium">
</div>

</div>

<div class="col-md-offset-6">
<div class="form-group">
<label >Currency Symbol </label>
<input type="text" name="symbol" required title="Currency Symbol" placeholder="Currency Symbol" id="symbol" class="form-control input-medium">

<br />
<input type="submit" value="Add Currency" class="btn green" name="addcurrency">
<br />
<a href="viewcurrency.php" class="btn green" >View Currencies</a button>
</div>
</div>
</div>
</form>';
}

function viewcurrencies() {

    echo '<table id="testTable" class="table table-striped table-bordered table-hover">
<tr><th>Currency Name </th><th>Currency Code</th> <th> Symbol</th><th> Edit</th><th> Delete</th> </tr>';

    $query = mysql_query('select * from   currency ') or die(mysql_error());

    while ($Row = mysql_fetch_array($query)) {
        echo'<tr><td class="style">' . ucwords(strtolower(base64_decode($Row['name']))) . '</td>
<td class="style">' . base64_decode($Row['currencycode']) . '</td>
<td class="style">' . base64_decode($Row['symbol']) . '</td>
<td class = "style"> <a href = "edditcurrency.php?vid=' . $Row['id'] . '"><img src = "images/edit.png"> </a></td> 
<td class = "style"> <a href = "currencysettings.php?currencydel=' . $Row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }
    echo'</tbody></table>';
}

function editcurreny($id) {
    $query = mysql_query('select * from   currency  WHERE  id="' . $id . '" ') or die(mysql_error());

    while ($Row = mysql_fetch_array($query)) {
        echo' <form action="" id="currency" class="form-horizontal" method="post"> 
  <div class="form-body">
  
  <div class="col-md-12">
 
<div class="col-md-4">
<div class="form-group">
 <label>Currency Name </label>
 <input type="hidden"  name="id"  Value="' . $id . '" />
<input type="text"  name="currencyname" value="' . base64_decode($Row['name']) . '" required title="Currency Name" placeholder="Currency Name" id="currency" class="form-control input-medium">
</div>

  <div class="form-group">
 <label >Currency Code </label>
<input type="text" name="code" value="' . base64_decode($Row['currencycode']) . '" required title="Currency Code" placeholder="Currency Code" id="code" class="form-control input-medium">
</div>

</div>
 	
<div class="col-md-offset-6">
<div class="form-group">
<label >Currency Symbol </label>
<input type="text" name="symbol" value="' . base64_decode($Row['symbol']) . '" required title="Currency Symbol" placeholder="Currency Symbol" id="symbol" class="form-control input-medium">

<br />
<input type="submit" value="Update Currency" class="btn green" name="updatecurrency">

</div>
</div>
</div>
</form>';
    }
}

function adminmobilemenu() {
    echo '<div class="page-container">
    <!-- BEGIN HORIZONTAL MENU PAGE SIDEBAR1 -->
    <div class="page-sidebar navbar-collapse collapse">
    <!--BEGIN: SIDEBAR MENU FOR DESKTOP-->
    <!--END: SIDEBAR MENU FOR DESKTOP-->
    <!--BEGIN: HORIZONTAL AND SIDEBAR MENU FOR MOBILE & TABLETS-->
    <ul class="page-sidebar-menu visible-sm visible-xs" data-auto-scroll="true" data-slide-speed="200" >
    <li>
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    </li> 
    <li class="active">
    <a href="index.php">Index
    <span class="selected">
    </span>
    <span class="arrow open">
    </span>
    </a>
    <ul class="sub-menu" style="background-color:#82BA00;">
    <li class="active">   
    <a href="adminpermissions.php">Permissions</a></li>
    <li><a href="settings.php">Settings</a> </li>
    <li> <a href="saccodetails.php">Sacco Details</a> </li>';
}

function viewaudittrailuserreport() {

    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">
<div class="form-body">
<div class = "noprint">
<div class="form-group">
<label class="control-label col-md-4">Date Range</label>
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4"> Select User  </label>
<div class="col-md-3">

<select type="text" id="user" name="user" class="form-control" title="Select  User " placeholder="Select  User">
<option></option>';

    $query = mysql_query("SELECT * FROM  users");

    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . ($row['id']) . '">' . (base64_decode($row['username'])) . '</option>';
    }
    echo'</select>
        </div></div>
        
<div class="col-md-offset-4 col-md-4">
<br><button class="btn green" name="audittrail">Submit</button>
</div>
</div>
</div></form>';
}

function viewaudittrailmnoreport() {

    echo '<form action = "" method = "post" class="form-horizontal" autocomplete = "off">

<div class = "form-body">
<div class = "noprint">

<div class="form-group">
<label class="control-label col-md-4">Date Range</label>

<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Member Number</label>
<div class="col-md-3">
<select type="text" id="mno" name="mno" class="form-control" title="Select  Member " placeholder="Select  Member ">
<option></option>';

    $query = mysql_query("SELECT * FROM   newmember  ORDER BY primarykey");

    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . ($row['mno']) . '">' . base64_decode($row['membernumber']) . ' ' . base64_decode($row['firstname']) . ' ' . base64_decode($row['middlename']) . ' ' . base64_decode($row['lastname']) . '</optionoption>';
    }
    echo'</select>
</div>
</div>

<div class="col-md-offset-4 col-md-4">
<br><button class="btn green" name="bbdc">Submit</button>
</div>
</div>
</div>';
}

function viewaudittraildatereport() {

    echo '<div class = "art-layout-cell" style = "width: 100%" >
<div class = "row">
<form action = "" method = "post" class="form-horizontal" autocomplete = "off">

<div class = "col-md-5 ">
<div class = "noprint">
<div class="form-group">
<label class="control-label col-md-4">Date Range</label>
<div class="col-md-6">
<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">
</div>

</div></div>

<div class="col-md-offset-4 col-md-4">
<br><button class="btn green" name="audittrail">Submit</button>
</div>
</div>
</div></form>';
}

function audittraildatereport($datefrom, $dateto) {
    $s = strtotime($datefrom);
    $t = strtotime($dateto);
    echo '<div id="mt"><table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr><th colspan="5"><h4 align="center"><b> Audit Date Reports  </b></h4></th></tr>
<tr><th> User  </th><th> Member  </th><th>Activity   </th><th> Date  </th><th>  Time</th></tr></thead><tbody>';
    if ($t < $s) {
        
    } else {

        while ($s <= $t) {
            $query = mysql_query("SELECT  * FROM     audit  WHERE  date = '" . base64_encode(date("d-M-Y", $s)) . "' ");

            while ($row = mysql_fetch_array($query)) {
                echo'<tr><td>' . getusername(base64_decode($row['user'])) . '</td><td>' . getMembername(($row['mno'])) . '</td><td> ' . base64_decode($row['activity']) . ' </td><td> ' . base64_decode($row['date']) . '  </td><td>  ' . base64_decode($row['time']) . '</td></tr>';
            }
            $s = $s + 86400;
        }
    }
    echo'</tbody></table></div>';
}

function audittrailuserreport($datefrom, $dateto, $user) {
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        echo '<div id="mt"><table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr><th colspan="5"><h4 align="center"><b> Audit Date Trail User Reports  </b></h4></th></tr>
<tr><th> User  </th><th> Member  </th><th>Activity   </th><th> Date  </th><th>  Time</th></tr></thead><tbody>';
        while ($s <= $t) {
            $query = mysql_query("SELECT  * FROM     audit  WHERE user='" . base64_encode(($user)) . "' AND  date = '" . base64_encode(date("d-M-Y", $s)) . "'   ");

            while ($row = mysql_fetch_array($query)) {
                echo'<tr><td>' . getusername(base64_decode($row['user'])) . '</td><td>' . getMembername(($row['mno'])) . '</td><td> ' . base64_decode($row['activity']) . ' </td><td> ' . base64_decode($row['date']) . '  </td><td>  ' . base64_decode($row['time']) . '</td></tr>';
            }

            $s = $s + 86400;
        }
        echo'</tbody></table></div>';
    }
}

function audittrailmnoreport($datefrom, $dateto, $mno) {
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        echo '<div id="mt"><table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead><tr><th colspan="5"><h4 align="center"><b> Audit Date Trail Member Reports  </b></h4></th></tr>
<tr><th> User  </th><th> Member  </th><th>Activity   </th><th> Date  </th><th>  Time</th></tr></thead><tbody>';
        while ($s <= $t) {

            $query = mysql_query("SELECT  * FROM     audit  WHERE  mno='" . ($mno) . "' AND  date = '" . base64_encode(date("d-M-Y", $s)) . "'  ");

            while ($row = mysql_fetch_array($query)) {
                echo'<tr><td>' . getusername(base64_decode($row['user'])) . '</td><td>' . getMembername(($row['mno'])) . '</td><td> ' . base64_decode($row['activity']) . ' </td><td> ' . base64_decode($row['date']) . '  </td><td>  ' . base64_decode($row['time']) . '</td></tr>';
            }
            $s = $s + 86400;
        }

        echo'</tbody></table></div>';
    }
}

function budgettingform() {

    echo'<form action="" method="POST" autocomplete="off" id="frm1">
    <div class="form-body">
      <table id="sample_2"  class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="2">Check All <input type = "checkbox"  name = "che" value = "check all" title = "Select All Account" onclick="checkedAll(frm1);"/>
<h3 align="center"><b>Select Account To Budget</b></h3>    </th>  </tr> 

<tr><th>Account</th> <th>Action  </th>  </tr>';
    $income = 4;
    $exp = 5;

    $query = mysql_query("SELECT * FROM  glaccounts   WHERE  	accgroup='" . base64_encode($income) . "' OR  accgroup='" . base64_encode($exp) . "'   GROUP BY id ");
    while ($row = mysql_fetch_array($query)) {
        echo '<tr><td><input type="hidden"  name="accountid[]" value="' . $row['id'] . '">' . base64_decode($row['acname']) . ' </td>
      
<td><div class="two"><input type = "checkbox" class="checkall" name = "check[]" value = "' . ($row['id']) . '" title = "Select Account"/></div></td></tr>';
    }
    echo'</table><button class="btn green" name="finito">Next</button></div>
   
    </form>';
}

function budgettingreport($user, $datefrom, $dateto) {

    echo'<div id="mt"><table id="sample_2"  class="table table-striped table-bordered table-hover table-full-width dataTable" >
<tr><th colspan="6">  <center> Budget Report for ' . $datefrom . '  To ' . $dateto . ' </center>   </th></tr>   
<tr><th>Account</th> <th> Date From</th><th> Date To</th><th>Budget Amount</th><th>Actual Amount</th><th>Bal Amount</th>  </tr>';
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $sth = mysql_query("SELECT * FROM budget  WHERE  datefrom='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($row = mysql_fetch_array($sth)) {
                echo'<tr> <td>' . getGlname(base64_decode($row['account'])) . '</td><td>' . base64_decode($row['datefrom']) . '</td><td>' . base64_decode($row['dateto']) . '</td><td>' . getsymbol() . ' ' . number_format((base64_decode($row['amount'])), 2) . '</td>';
                $bal = base64_decode($row['amount']) - calculatetotalamount(getaccode(base64_decode($row['account'])), $row['account']);

                echo'<td>' . getsymbol() . ' ' . calculatetotalamount(getaccode(base64_decode($row['account'])), $row['account']) . ' </td><td>' . getsymbol() . ' ' . number_format(($bal), 2) . '</td>           
  </tr>';
            }
            $s = $s + 86400;
        }
    }
    echo'</table></div>';
}

function loanrep($mno) {

    $stmt = mysql_query("SELECT * FROM  loanrepaydates   WHERE mno='$mno'  ");
    if (mysql_num_rows($sth) >= 1) {
        echo'<table id="testTable" class="table table-bordered table-striped table-condensed flip-content">
       <thead><tr><th colspan="12"><h3 align="center"><b> Loan Repayment Date </b></h3>  </th>  </tr>
       <tr><th> Member Name</th>  <th>Loan Name </th><th>Transaction Id</th>  <th>No of Payment</th><th>Start Bal</th> <th>Interest Payment  </th> <th>Principal Payment </th><th>  End Bal    </th>   <th> Cumulative Interest </th>  <th> Cumulative Payment </th><th> Status </th></tr></thead><tbody>';

        while ($row = mysql_fetch_array($stmt)) {

            echo'<tr><td>' . base64_decode($row['mno']) . '</td> <td><b>' . loannym(base64_decode($row['loanid'])) . '</b></td>  <td>' . base64_decode($row['tid']) . '</td>   <td>' . base64_decode($row['payno']) . '</td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['start_bal']), 2) . '</td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['interest_payment']), 2) . '</td>    <td>' . getsymbol() . ' ' . number_format(base64_decode($row['principal_payment']), 2) . '</td> <td>' . getsymbol() . ' ' . number_format(base64_decode($row['end_bal']), 2) . '</td>	<td>' . getsymbol() . ' ' . number_format(base64_decode($row['cumulative_interest']), 2) . '</td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['cumulative_payment']), 2) . '</td> <td>' . base64_decode($row['status']) . '</td></tr>';
        }
        echo'</tbody></table>';
    } else {
        echo '<span class="red" >You have not applied loan </span></br>';
    }
}

function paymentdetails($mno) {
    $stmt = mysql_query("SELECT * FROM  loanpayment   WHERE mno='$mno'  ");
    if (mysql_num_rows($sth) >= 1) {
        echo'<table id="testTable" class="table table-bordered table-striped table-condensed flip-content">
       <thead><tr><th colspan="12"><h3 align="center"><b> Loan Repayment Details  </b></h3> </th>  </tr>
       <tr><th> Member Name</th>  <th>Payee </th><th>Transaction Id</th>  <th>Payee Id</th><th>Amount</th> <th> Date </th></tr></thead><tbody>';

        while ($row = mysql_fetch_array($stmt)) {

            echo'<tr><td>' . getMembername(base64_decode($row['mno'])) . '</td> <td>' . (base64_decode($row['payee'])) . '</td>  <td>' . (base64_decode($row['transid'])) . '</td>   <td>' . base64_decode($row['payeeid']) . '</td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td> <td>' . base64_decode($row['date']) . '</td></tr>';
        }
        echo'</tbody></table><div class="col-md-4"><button class="btn green">Print</button> </div><div class="col-md-4"><button class="btn green">Export To Excel</button> </div><div class="col-md-4"><button class="btn green">Export To Word</button></div>';
    } else {
        echo '<span class="red" >You have not paid loan </span></br>';
    }
}

function totalamountreconciled($q) {

    echo'<label class="label-control">Total Amount For Last Reconciled </label>
<input name="totalreconciled" type="number" required step="0.001"';
    $stmt = mysql_query(" SELECT * FROM     reconcile   WHERE  bankname='$q'   ORDER BY id DESC	  ");

    while ($row = mysql_fetch_array($stmt)) {

        echo' value="' . base64_decode($row['bal']) . ' "';
    }
    echo'readonly class="input-medium form-control" Title="Total Amount For Last Reconciled"   placeholder="Total Amount For Last Reconciled">';
}

function editbudget($id) {
    $query = mysql_query("SELECT * FROM  budget   WHERE  id='$id' ");
    while ($row = mysql_fetch_array($query)) {
        echo'<form action="" method="post" class="form-horizontal" id="fq11"> 
 <div class="form-body col-md-offset-4">   
<div class="form-group">
<label>Account  </label>
<input type="hidden" name="id" value="' . $row['id'] . '">
    
<input type="text" readonly name="account" placeholder="Select Account" title=" Select Account" class="form-control input-medium" value="' . getGlname(base64_decode($row['account'])) . '" >
    <label>Date From  </label>
<input type="text" name="datefrom"  placeholder="Select Date From" title="Select Date From" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . (base64_decode($row['datefrom'])) . '">
    <label>Date To  </label>
<input type="text" name="dateto" placeholder="Select Date To" title="Select Date To" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" value="' . (base64_decode($row['dateto'])) . '">
    <label>Amount  </label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" name="amount" step="0.001"  placeholder="Enter Amount" title="Enter Amount" class="form-control input-medium" value="' . (base64_decode($row['amount'])) . '">
    <br />
 <button type="submit" class="btn green" name="updatebudget">Update Budget   </button>
</div>
</div>
</div>
 </form>';
    }
}

function viewBudget() {
    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
        
<thead><tr><th colspan="6">  <center> View  Budget </center>   </th></tr>   
<tr><th>Account</th> <th> Date From</th><th> Date To</th><th>Budget Amount</th>';
    $write = check_write_permission();
    if($write == 1){//has right to edit or delete
    echo '<th>Edit</th><th>Delete</th>  ';
    }
    echo '</tr>';

    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $sth = mysql_query("SELECT * FROM budget ");
    while ($row = mysql_fetch_array($sth)) {

        echo'</thead><tbody> <tr><td>' . getGlname(base64_decode($row['account'])) . '</td><td>' . base64_decode($row['datefrom']) . '</td><td>' . base64_decode($row['dateto']) . '</td><td>' . getsymbol() . ' ' . number_format((base64_decode($row['amount'])), 2) . '</td>';
      if($write == 1){
        echo '<td><a onClick="' . $confirmedit . '" href="viewbudget.php?budid=' . $row['id'] . '"><img src="images/edit.png"> </a></td>

        <td><a onClick="' . $confirmdelete . '" href="viewbudget.php?buddel=' . $row['id'] . '"><img src="images/delete.png"></a></td></tr>';
      }
    }
    echo'</tbody></table></div>';
}

function membersharebalances($datefrom, $dateto) {
    echo '<div id="mt"><table aria-describedby="sample_2_info" id="sample_2" class="table table-striped table-bordered table-hover table-full-width dataTable">
   <thead> <tr><th colspan="3"><h3 align="center"><b><b> ' . getGlname(getdefaultsavingsaccount()) . ' Balances As At ' . $datefrom . ' To ' . $dateto . '  </b></h3></th></tr>
   <tr><th>Member Number</th><th>Member Name</th><th>Actual Balance</th></thead></tr>';
    $sum = 0;

    $Rows = mysql_query('select * from newmember  where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($Rows)) {
        echo '    <tr>
                                                    <td>' . base64_decode($row['membernumber']) . '</td>
                                                    <td>' . getMembername($row['membernumber']) . '</td>';
        echo ' <td>KES.' . sumtotalforamember(base64_decode($row['membernumber']), $datefrom, $dateto) . '</td>';
        echo '</tr>';
        $psum+=sumtotalforamember(base64_decode($row['membernumber']), $datefrom, $dateto);
        $sum+=sumbalforamember(base64_decode($row['membernumber']), $datefrom, $dateto);

        juma(base64_decode($row['membernumber']));
    }
    echo '<tr><td colspan="1"></td><td>TOTAL</td><td>KES.' . number_format($psum, 2) . '</td></tr></table><div>';
    echo '<div class="col-md-4"><button  class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';

    save($sum, $psum);
}

function loanarmotization($tid) {

    $qry = mysql_query(" SELECT * FROM    loanrepaydates WHERE tid='$tid'   ");
    echo'<div id="mt"><table id="testTable" class="table  table-striped table-bordered table-hover table-full-width">
    <thead>  <tr> <th colspan="3"><h3 align="center"><b> ' . ucwords(strtolower(getMembername(getmno($tid)))) . ' </b></th> <th colspan="5"><h3 align="center"><b>Amortization Table For ' . ucwords(strtolower(loannym(loantype(base64_decode($tid))))) . '</b></h3></th></tr>
    <tr> <th>Dates Of Payments </th> <th>NO Of Payments</th> <th>Start Bal</th> <th>Interest Payment</th> <th>Principal Payment</th> <th>End Bal</th> <th>Cumulative Interest</th> <th>Cumulative  Payment</th>  </tr></thead><tbody>';
    while ($row1 = mysql_fetch_array($qry)) {
        echo'<tr><td>' . date('d-M-Y', ($row1['dates'])) . '</td><td>' . base64_decode($row1['payno']) . '</td><td>' . number_format(base64_decode($row1['start_bal']), 2) . '</td><td>' . number_format(base64_decode($row1['interest_payment']), 2) . '</td><td>' . number_format(base64_decode($row1['principal_payment']), 2) . '</td><td>' . number_format(base64_decode($row1['end_bal']), 2) . '</td><td>' . number_format(base64_decode($row1['cumulative_interest']), 2) . '</td> <td>' . number_format(base64_decode($row1['cumulative_payment']), 2) . '</td>  </tr>';
    }
    echo'</tbody></table></div> <button  class="btn green" value="Print this page" onClick="return printResults()">Print</button>';
}

function underpayment() {

    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
    <thead><tr><th> Member Number</th><th> Member Name</th><th>Loan Name</th><th>Bal Amount</th><th> Month</th><th> Date</th></tr></thead><tbody>';
    $query = mysql_query("SELECT * FROM  loans    WHERE  status='" . base64_encode(active) . "' ");


    while ($row = mysql_fetch_array($query)) {
        $arr = 'Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec';
        $months = explode(',', $arr);
        foreach ($months as $month) {
            if (strtotime(date('d-M-Y')) > strtotime('31-' . $month . date('Y'))) {
                $bal = ammountsupposedtubpaid($row['transid'], $month) - amountpaidtudate($row['transid'], $month);
                if ((ammountsupposedtubpaid($row['transid'], $month) ) > (amountpaidtudate($row['transid'], $month))) {
                    echo'<tr><td>' . base64_decode($row['membernumber']) . '</td> <td>' . getMembername(getmno($row['transid'])) . '</td><td>' . loanname($row['transid']) . '</td><td>' . number_format($bal, 2) . '</td> <td>' . $month . '</td><td>' . date('d-M-Y') . '</td></tr>';
                }
            }
        }
    }


    echo'</tbody></table></div>';
}

function loandefaulters($q) {

    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
    <thead><tr><th>Phone No</th><th> Member Number</th><th> Member Name</th><th>Loan Name</th><th>Disbursed Amount</th><th>Bal Amount</th><th>Expected Payment Date</th></tr></thead><tbody>';
    $query = mysql_query("SELECT * FROM  loans    WHERE  status='YWN0aXZl' ");
    while ($row = mysql_fetch_array($query)) {
        $lastDatePayment = lastDateOfPayment($row['transid']);  // getloangl(getloaname($loanid));

        $date = strtotime(date('d-M-Y'));
        $rem = fullremainingloanreport($row['transid']);
        if (($date > $lastDatePayment) AND ( base64_decode($row['amount']) != 0) AND ( loanname($row['transid']) != null) AND ( $rem < 1)) {



            $mno = getMobileNo($row['membernumber']);
            echo'<tr><td>';
            if ($q == 3) {
                echo'<input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . base64_decode($mno['mobileno']) . '" checked="true">';
                echo ' ' . base64_decode($mno['mobileno']) . '</td><td>' . base64_decode($row['membernumber']) . '</td> <td>' . getMembername(getmno($row['transid'])) . '</td><td>' . loanname($row['transid']) . '</td><td>' . getSymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td><td>' . getSymbol() . ' ' . number_format(($rem), 2) . '</td> <td>' . date('d-M-Y', $lastDatePayment) . '</td></tr>';
            } elseif (strlen($q) > 1) {
                if ($rem > $q) {
                    echo'<input name="chkbx[]" id="chkbx" class="chkbx" type="checkbox" value="' . base64_decode($mno['mobileno']) . '" checked="true">';
                    echo ' ' . base64_decode($mno['mobileno']) . '</td><td>' . base64_decode($row['membernumber']) . '</td> <td>' . getMembername(getmno($row['transid'])) . '</td><td>' . loanname($row['transid']) . '</td><td>' . getSymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td><td>' . getSymbol() . ' ' . number_format(($rem), 2) . '</td> <td>' . date('d-M-Y', $lastDatePayment) . '</td></tr>';
                }
            } else {
                echo ' ' . base64_decode($mno['mobileno']) . '</td><td>' . base64_decode($row['membernumber']) . '</td> <td>' . getMembername(getmno($row['transid'])) . '</td><td>' . loanname($row['transid']) . '</td><td>' . getSymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td><td>' . getSymbol() . ' ' . number_format(($rem), 2) . '</td> <td>' . date('d-M-Y', $lastDatePayment) . '</td></tr>';
            }
        }
    }

    echo'</tbody></table></div>';
}

function getMobileNo($mno) {

    if (isset($mno)) {
        $sql = mysql_query('SELECT * FROM newmember WHERE membernumber = "' . $mno . '"') or die(mysql_error());

        if (mysql_num_rows($sql) == 0) {
            return "";
        } else {
            $Row = mysql_fetch_array($sql);

            return $Row;
        }
    }
}

function loansfees($mno, $tid) {
    echo'<div class="col-md-12">
<div class="col-md-4">  
 Loan Application Fees Form
<form action="" method="post">
<br />
<input type="hidden" class="form-control input-medium" value="' . $tid . '" input-medium" name="tid" >
<input type="text" pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium"  placeholder="Member Number"  readonly value="' . $mno . '"  name="mno" >
    <br />
<input type="currency" onkeyup="FormatAsCurrencys(this.value)" placeholder="Amount" class="form-control input-medium" name="amount" required >
' . getsymbol() . ':<span id="format"></span>
<br />
<input type="submit" class="btn green" value="AddApplication Fees" name="appfee">
</form>
</div>
<div class="col-md-4">  Loan Legal Fees Form

<form action="" method="post">

<input type="hidden" class="form-control input-medium" value="' . $tid . '" input-medium" name="tid" >
<br />
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" class="form-control input-medium" value="' . $mno . '" placeholder="Member Number" readonly input-medium" name="mno" >
<br />
<input type="currency" onkeyup="FormatAsCurrencies(this.value)" class="form-control input-medium" placeholder="Amount" name="amount" required>
' . getsymbol() . ':<span id="formatt"></span>
<br />
<input type="submit" class="btn green" value="AddLegal Fees" name="legalfee">
</form>
</div>

 </div>';
}

function usergroupEdit() {
    echo'<table id="sample_2" class="table table-striped table-bordered table-hover">
      <tr><th>User  </th><th> Status  </th><th> Comment  </th><th> Date  </th><th> Edit  </th><th> Delete  </th></tr>
    </thead><tbody>';
    $stmt = mysql_query("SELECT * FROM  usergroups");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<tr><td>' . ((base64_decode($row['user']))) . '</td><td>' . base64_decode($row['status']) . '</td><td>' . base64_decode($row['comments']) . '</td>  <td>' . base64_decode($row['date']) . '</td>';

        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo '<td class="style"> <a onClick="' . $confirmedit . '" href = "admingroupsedit.php?adme=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        echo'<td class="style"> <a onClick="' . $confirmdelete . '" href = "admingroupsedit.php?admd=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }

    echo'</tbody></table>';
}

function view_fixedasset() {
    print'<table class="table table-striped  table-bordered table-hover sorting_asc_enabled"  id="sample_1">
    <thead>
      <tr>
         <th> NO </th>
         <th> Asset Name  </th>
         <th> Purchase Date </th>
         <th> Asset value </th>
         <th> Salvage Value </th>
         <th> Useful Life </th>
         <th> Depreciation Rate  </th>
         <th> Asset tag  </th>
         <th> Registration date  </th>';
         $write = check_write_permission();
         if($write == 1){
         echo '<th> Edit </th>
         <th> Dispose </th>';
         }
      echo '</tr>
    </thead>
    <tbody>';

    $status = base64_encode('Active');
    $stmt = mysql_query("SELECT * FROM  fixed_assets WHERE status='" . $status . "' ");
    while ($row = mysql_fetch_array($stmt)) {
        $date = (base64_decode($row['reg_date']));
        $ndate = date('d-M-Y', $date);
        echo'<tr>'
        . '<td>' . (($row['id'])) . '</td>'
        . '<td>' . base64_decode($row['asset_name']) . '</td>'
        . '<th>' . base64_decode($row['purchase_date']) . '</td>'
        . '<td>' . base64_decode($row['asset_value']) . '</td> '
        . '<td>' . base64_decode($row['salvage_value']) . '</td> '
        . '<td>' . base64_decode($row['useful_life']) . ' years' . '</td> '
        . '<td>' . base64_decode($row['dep_rate']) . '%' . '</td> '
        . '<td>' . base64_decode($row['asset_tag']) . '</td> '
        . ' <td>' . $ndate . '</td>';

        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdispose = "return confirm('Are you sure you want to dispose this Asset?');";
        if($write == 1){//if has write permission(edit or dispose)
        echo '<td>
              <a onClick="' . $confirmedit . '" href = "fixed_assetedit.php?editasset=' . $row['id'] . '"><img src = "                  images/edit.png">
              </a>
              </td>';
        echo '<td>
         <a onClick="' . $confirmdispose . '" class="delete" href = "fixed_assetedit.php?dispose=' . $row['id'] . '">
         <button class="btn btn red"><i class="fa fa-scissors"></i> Dispose</button>
         </a>
        </td>';
        }
        '</td></tr>';
    }

    '</tbody></table></div> ';
}

function receipt_footeredit() {
    echo'<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
      <tr><th>NO  </th><th> message  </th><th> status  </th><th> Date  </th><th> Edit  </th><th> Action  </th></tr>
    </thead><tbody>';
    $stmt = mysql_query("SELECT * FROM  receipt_footer");
    while ($row = mysql_fetch_array($stmt)) {
        $date = (base64_decode($row['audit_date']));
        $ndate = date('d-M-Y', $date);
        echo'<tr><td>' . (($row['id'])) . '</td><td>' . base64_decode($row['message']) . '</td><td>' . base64_decode($row['status']) . '</td>  <td>' . $ndate . '</td>';

        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdel = "return confirm('Are you sure you want to deactivate this message?');";
        $confirmactivate = "return confirm('Are you sure you want to activate this message?');";
        echo '<td class="style"> <a onClick="' . $confirmedit . '" href = "edit_receipt_footer.php?editfooter=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';
        if (base64_decode($row['status']) == 'Active') {
            echo '<td>
									<a onClick="' . $confirmdel . '" class="delete" href = "edit_receipt_footer.php?deactivate=' . $row['id'] . '">
										 Deactivate
									</a>
                                                                </td>';
        } else {
            echo '<td>
									<a onClick="' . $confirmactivate . '" class="activate" href = "edit_receipt_footer.php?activate=' . $row['id'] . '">
									Activate
									</a>
                                                                </td>';
        }
        '</td></tr>';
    }

    echo'</tbody></table>';
}

//***************function to edit periodicity details*****************//


function periodicEdit() {
    echo'<table id="sample_2" class="table table-striped table-bordered table-hover">
      <tr>
      <th>Name of period  </th>
      <th> Number of days </th>
      <th> Edit  </th>
      <th> Delete  </th>
      </tr>
    </thead><tbody>';
    $fetchdat = mysql_query("SELECT * FROM  periodictyrecord");
    while ($rowdat = mysql_fetch_array($fetchdat)) {

        echo'<tr><td>' . ((base64_decode($rowdat['periodname']))) . '</td><td>' . base64_decode($rowdat['numberdays']) . '</td>';

        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo '<td class="style"> <a onClick="' . $confirmedit . '" href = "Editperiodicitypay.php?pedit=' . $rowdat['id'] . '"><img src = "images/edit.png"> </a></td>';
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        echo'<td class="style"> <a onClick="' . $confirmdelete . '" href = "Editperiodicitypay.php?pdel=' . $rowdat['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }

    echo'</tbody></table>';
}

//**************end of function************************************///
//************fetch periodic details to edit**********//

function edditedperiodEdit($id) {
    $stmt = mysql_query("SELECT * FROM  periodictyrecord  WHERE   id='$id'");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<form action="" class="form-horizontal" method="post">     
   <div class="form-body">
   
<div class="col-md-4">  
<div class="form-group">
   <label class="form-label">Period name  </label>
   <input type="text" name="period" value="' . base64_decode($row['periodname']) . '" class="form-control input-medium" placeholder="Enter period name" title=" Enter period name">
</div>

<div class="form-group">
   <label class="form-label">Number of days </label>
   <input type="text" name="freq" value="' . base64_decode($row['numberdays']) . '" class="form-control input-medium" placeholder="Enter number of days" title=" Enter number of days">
</div>
</div>

<input type="submit" value="Update details" name="periodupdate" class="btn green">
</div>
</div>


</div>
 </form>';
    }
}

//**************end of function*******************///

function editreceipt_footer($id) {
    $stmt = mysql_query("SELECT * FROM  receipt_footer  WHERE   id='$id'");
    while ($row = mysql_fetch_array($stmt)) {

        echo' <form class="form-horizontal" method="POST">
                          
                           <div class="form-group">
                              <label class="control-label col-md-3">Receipt footer<span class="required">*</span></label>
                              <div class="col-md-9">
                                 <textarea class="wysihtml5 form-control" rows="6" name="receipt" data-error-container="#editor1_error">' . base64_decode($row['message']) . '</textarea>
                                 <div id="editor1_error"></div>
                              </div>
                           </div>
                          
                           <div class="form-actions fluid">
                              <div class="col-md-offset-3 col-md-9">
                                 <button type="submit" name="update" class="btn green">Submit</button>
                                 <button type="button" class="btn red">Cancel</button>                              
                              </div>
                           </div>
                        </form>';
    }
}

function fixed_asset() {
    print'<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "POST">
<div class="col-md-4">
<div class = "two">
<label>Asset Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  placeholder="Asset Name" class="form-control input-medium" type = "text" name = "asset_name" required="true" />
</div>
<div class = "two">
<label>GL Account</label>
<select  class="form-control input-medium select2me" name = "asset_glaccount" required title = "GL Account" data-placeholder="Gl Account" >
    <option></option>';
    $accGroup = "1";
    $qry = mysql_query("select * from glaccounts WHERE status='" . base64_encode('Active') . "' AND accgroup='" . base64_encode($accGroup) . "'    ") or die(mysql_error());

    while ($row = mysql_fetch_array($qry)) {
        echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
    }

    print'</select>
</div>
<div class = "two"> 
<label>Purchase Date</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  placeholder="Purchase Date" data-date-format="dd-M-yyyy" class="form-control input-medium date-picker" type = "text" name = "date" required="true" />
</div>
<div class = "two">
<label>Asset Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"   class="form-control input-medium" type = "number" name = "asset_value"  placeholder = "Asset value" title = "Asset Value" required="true" />
</div>
<div class = "two">
<label>Salvage Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  placeholder="Salvage Value" class="form-control input-medium" type = "number" name = "salvage" required="true" />
</div>
<div class = "two">
<label>Useful Life</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  placeholder="Useful life" class="form-control input-medium" type = "number" name = "life" required="true" />
</div>

</div>
</div>
<div class="col-md-6" style=" margin-left:250px">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Depreciation type</label>
<select  class="form-control input-medium select2me" name = "depreciation_type" required title = "Depreciation type" data-placeholder="Depreciation type" >
    <option></option>
    <option value="straight">Straight line</option>
    <option value="reducing">Reducing </option>
</select>
</div>
<div class = "two">
<label>Depreciation Rate</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  class="form-control input-medium" type = "number" name = "dep_rate"  placeholder = "Dereciation Rate" title = "Depreciation rate" required="true" />
</div>
<div class = "two">
<label>Depreciation period</label>
<select  class="form-control input-medium select2me" name = "depreciation_period" required title = "Depreciation period" data-placeholder="Depreciation period" >
    <option></option>
    <option value="annual">annually</option>
</select>
</div>
<div class = "two">
<label>Asset Tag Code</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  placeholder="Asset Tag Code" class="form-control input-medium" type = "text" name = "asset_code" required="true" />
</div>
<div class = "two">
<label>Depreciation GL Account</label>
<select  class="form-control input-medium select2me" name = "dep_glaccount" required title = "Depreciation GL Account" data-placeholder="Depreciation Gl Account" >
    <option></option>';

    $dep = mysql_query("select * from glaccounts WHERE status='" . base64_encode('Active') . "' ") or die(mysql_error());

    while ($rowdep = mysql_fetch_array($dep)) {
        echo '<option value="' . ($rowdep['id']) . '">' . base64_decode($rowdep['acname']) . '</option>';
    }

    print'</select>
</div>
<div class = "form actions fluid"><br/>
    <button class="btn green"  name = "save_asset">Save</button>';
    $write = check_write_permission();
    if($write == 1){
    echo '<a href="fixed_assetedit.php" <button class="btn red"  name = "edit">Edit</button></a>';
    }
echo '</div>
</form>



</div
</div>
</div>
</div>

</div>
                              
                                           
                                        </div>';
}

function edit_fixedasset($id) {
    $stmt = mysql_query("SELECT * FROM  fixed_assets  WHERE   id='$id'");
    while ($rows = mysql_fetch_array($stmt)) {
        echo'<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "POST">
<div class="col-md-4">
<div class = "two">
<label>Asset Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"  value ="' . base64_decode($rows['asset_name']) . '"id="asset" placeholder="Asset Name" class="form-control input-medium" type = "text" name = "asset_name" required="true" />
</div>
<div class = "two">
<label>GL Account</label>
<select  class="form-control input-medium select2me" name = "asset_glaccount" required title = "GL Account" data-placeholder="Gl Account" >
    <option value="' . base64_decode($rows['glaccount']) . '"> ' . getGlname(base64_decode($rows['glaccount'])) . '</option>';

        $qry = mysql_query("select * from glaccounts WHERE status='" . base64_encode('Active') . "' ") or die(mysql_error());

        while ($row = mysql_fetch_array($qry)) {
            echo '<option value="' . ($row['id']) . '">' . base64_decode($row['acname']) . '</option>';
        }

        print'</select>
</div>
<div class = "two">
<label>Purchase Date</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" value ="' . base64_decode($rows['purchase_date']) . '"  class="form-control input-medium datepicker" type = "text" name = "date"  placeholder = "Purchase date" title = "Purchase date" required="true" />
</div>
<div class = "two">
<label>Asset Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" value ="' . base64_decode($rows['asset_value']) . '"  class="form-control input-medium" type = "number" min="0"name = "asset_value"  placeholder = "Asset value" title = "Asset Value" required="true" />
</div>
<div class = "two">
<label>Salvage Value</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" value ="' . base64_decode($rows['salvage_value']) . '"  class="form-control input-medium" type = "number" min="0" name = "salvage"  placeholder = "Salvage value" title = "Salvage Value" required="true" />
</div>
<div class = "two">
<label>Useful Life</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" value ="' . base64_decode($rows['useful_life']) . '"  class="form-control input-medium" type = "number" min="0" name = "life"  placeholder = "Useful life" title = "Useful life" required="true" />
</div>

</div>
</div>
<div class="col-md-6" style=" margin-left:250px">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Depreciation type</label>
<select  class="form-control input-medium select2me" name = "depreciation_type" required title = "Depreciation type" data-placeholder="Depreciation type" >
    <option value="' . base64_decode($rows['dep_type']) . '">' . base64_decode($rows['dep_type']) . '</option>
    <option value="straight">Straight line</option>
    <option value="reducing">Reducing </option>
</select>
</div>
<div class = "two">
<label>Depreciation Rate</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" value ="' . base64_decode($rows['dep_rate']) . '" class="form-control input-medium" type = "number" name = "dep_rate"  placeholder = "Dereciation Rate" title = "Depreciation rate" required="true" />
</div>
<div class = "two">
<label>Depreciation period</label>
<select  class="form-control input-medium select2me" name = "depreciation_period" required title = "Depreciation period" data-placeholder="Depreciation period" >
    <option value="' . base64_decode($rows['dep_period']) . '">' . base64_decode($rows['dep_period']) . '</option>
    <option value="annual">annually</option>
</select>
</div>
<div class = "two">
<label>Asset Tag Code</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}"value ="' . base64_decode($rows['asset_tag']) . '"  placeholder="Asset Tag Code" class="form-control input-medium" type = "text" name = "asset_code" required="true" />
</div>
<div class = "two">
<label>Depreciation GL Account</label>
<select  class="form-control input-medium select2me" name = "dep_glaccount" required title = "Depreciation GL Account" data-placeholder="Depreciation Gl Account" >
    <option value ="' . base64_decode($rows['dep_glaccount']) . '">' . getGlname(base64_decode($rows['dep_glaccount'])) . '</option>';

        $dep = mysql_query("select * from glaccounts WHERE status='" . base64_encode('Active') . "' ") or die(mysql_error());

        while ($rowdep = mysql_fetch_array($dep)) {
            echo '<option value="' . ($rowdep['id']) . '">' . base64_decode($rowdep['acname']) . '</option>';
        }

        print'</select>
</div>
<div class = "form actions fluid"><br/>
    <button class="btn green"  name = "update_asset">Save</button>
</div>
</form>



</div
</div>
</div>
</div>';
    }
}

function edditedGroupEdit($id) {
    $stmt = mysql_query("SELECT * FROM  usergroups  WHERE   id='$id'");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<form action="" class="form-horizontal" method="post">     
   <div class="form-body">
   
<div class="col-md-4">  
<div class="form-group">
   <label class="form-label">User  </label>
   <input type="text" name="user" value="' . base64_decode($row['user']) . '" class="form-control input-medium" placeholder="Enter User" title=" Enter User">
</div>

<div class="form-group">
   <label class="form-label"> Status </label>
   <select class = "form-control input-medium" value ="' . base64_decode($row['status']) . '"name = "status" required title = "Select Group status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
   <label class="form-label"> Comment </label>
   <input type="text" name="comment" value="' . base64_decode($row['comments']) . '" class="form-control input-medium" placeholder="Enter Comment" title=" Enter Comment">
</div>

<div class="form-group">
   <label class="form-label"> Date </label>
   <input type="text" name="date" value="' . base64_decode($row['date']) . '" placeholder="Enter Date" class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy" title=" Enter Date">
</div>
<div class="col-md-4">
<input type="submit" value="Update Group" name="userupdate" class="btn green">
</div>
</div>


</div>
 </form>';
    }
}

function permissionformEdit() {
    echo'<table id="sample_2" class="table table-striped table-bordered table-hover">
      <tr><th>User  </th><th> Status  </th><th> Date  </th><th> Edit  </th><th> Delete  </th></tr>
    </thead><tbody>';
    //		
    $stmt = mysql_query("SELECT * FROM  groupperm");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<tr><td>' . base64_decode(userGroupName($row['groupid'])) . '</td><td>' . base64_decode($row['status']) . '</td><td>' . base64_decode($row['permission']) . '</td> ';

        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo '<td class="style"> <a onClick="' . $confirmedit . '" href = "adminpermissionsedit.php?adppe=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        echo'<td class="style"> <a onClick="' . $confirmdelete . '" href = "adminpermissionsedit.php?adppd=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }

    echo'</tbody></table>';
}

function edditedPemissionEdit($id) {
    $stmt = mysql_query("SELECT * FROM  groupperm  WHERE   id='$id'");
    while ($row = mysql_fetch_array($stmt)) {

        echo'<form action="" class="form-horizontal" method="post">     
   <div class="form-body">
   
<div class="col-md-4">  
<div class="form-group">
   <label>User Group</label>
<input type="text" class= "form-control input-medium"  value="' . admingroup_name($row['groupid']) . '" name ="grp" title = "user group" required>

</div>

<div class="form-group">
   <label class="form-label">Permission </label>
   <input type="text" name="perm" value="' . base64_decode($row['permission']) . '" class="form-control input-medium" placeholder="Enter permission" title=" Enter Status">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
   <label class="form-label">Status </label>
   <select class = "form-control input-medium" name = "status" required title = "Select status">
<option></option>
<option>Active</option>
<option>Suspended</option>
</select>
</div>


<div class="col-md-4">
<input type="submit" value="Update Permission" name="perumpdate" class="btn green">
</div>
</div>


</div>
 </form>';
    }
}

function generalstatemntreport($user, $mno, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);

        $t = strtotime($dateto);

        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<div id="my_table"><div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
 <tr><th colspan="5"><center>Member Account Statements</center></th></tr>               
<tr><th colspan="5"><center>' . compname() . '</center></th></tr>
                   <tr><th>Date Range</th><th colspan="2">Member Number</th><th colspan="2">Member Name</th></tr>
        <tr><td>' . $datefrom . ' to ' . $dateto . '</td><td>' . $mno . '</td><td></td><td>' . getMembername(base64_encode($mno)) . '</td><td></td></tr>

</tr>
        <tr><th colspan="5"><center>' . getglacc(getdefaultsharesaccount()) . ' STATEMENT</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money in</th><th>Money out</th><th>Balance</th></tr>';

            while ($s <= $t) {

                $q1ry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode(getdefaultsharesaccount()) . '"') or die(mysql_error());
                if (mysql_num_rows($q1ry) >= 1) {
                    while ($rowq = mysql_fetch_array($q1ry)) {
                        $suin = $rowq['amount'];
                        $asa+=base64_decode($suin);

                        echo '<tr><td><center>' . base64_decode($rowq['date']) . '</center></td><td>' . getglacc(base64_decode($rowq['transaction'])) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($suin), 2) . '</td><td>' . getsymbol() . '.0.00</td><td><center>' . getsymbol() . '.' . number_format(($asa), 2) . '</center></td></tr>';
                    }
                }

                $sumout = $asaa;
                $sin = $asa;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }

            $bal = $sin - $sumout;

            $newbal = $bal;

            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sin, 2) . '</td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td><td><b><center>' . getsymbol() . '.' . number_format($newbal, 2) . '</center></b></td></tr>';

            echo '</table>';
        }

        loaninterestgen($user, $mno, $tid, $datefrom, $dateto);

        ministatementagen2($user, $mno, $tid, $datefrom, $dateto);


        $one = mysql_query('select * from loansettings where status="' . base64_encode('Active') . '"') or die(mysql_error());
        while ($ttt = mysql_fetch_array($one)) {
            loanpaytsgen($user, $ttt['id'], $mno, $tid, $datefrom, $dateto);
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
    echo '<div class="col-md-4"><button class="btn green"value="Print this page" onClick="return printResults()" >Print</button></div>';
}

function loanpaytsgen($user, $lid, $mno, $tid, $datefrom, $dateto) {

    $mqry = mysql_query('select * from loanapplication where loantype="' . base64_encode($lid) . '" and membernumber="' . base64_encode($mno) . '"') or die(mysql_error());

    if (mysql_num_rows($mqry) >= 1) {


        echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
        <thead>
        <tr><th colspan="6"><center>' . getloaname($lid) . ' Statements</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Reference Number</th><th>Money in</th><th>Money out</th><th>Balance</th></tr>';

        while ($ans = mysql_fetch_array($mqry)) {

            $loantid = $ans['transactionid'];

            thefinalone($user, $loantid, $mno, $lid, $datefrom, $dateto);
        }
        echo '</table>';
    }
}

function thefinalone($user, $loantid, $mno, $lid, $datefrom, $dateto) {

    $s = strtotime($datefrom);
    $t = strtotime($dateto);

    if ($t < $s) {
        echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
    } else {

        while ($s <= $t) {

            $qry1 = mysql_query('select * from loans where membernumber="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transid="' . $loantid . '"') or die(mysql_error());
//if (mysql_num_rows($qry1) >= 1) {
            while ($row = mysql_fetch_array($qry1)) {

                if (loanwriteoffcheck($row['transid']) == "true") {

                    $errormsg = '<span class="red">LOAN WRITTEN OFF!</span>';
                }

                $loanz = $row['transid'];

                $sum1 = base64_decode($row['amount']);
                $abc+=($sum1);

                echo '<tr><td><center>' . getappdate($loanz) . '</center></td><td>Loan Issued</td><td>' . getrefno(($loanz)) . '</td><td>' . getsymbol() . '0</td><td>' . getsymbol() . '' . number_format(($sum1)) . '</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';

                $qry5 = mysql_query('select * from extracash where membernumber="' . base64_encode($mno) . '" and transactionid="' . $loanz . '"') or die(mysql_error());
                if (mysql_num_rows($qry5) >= 1) {
                    while ($rowx = mysql_fetch_array($qry5)) {
                        $sum1x = base64_decode($rowx['amount']);
                        $mnoo+=($sum1x);

                        echo '<tr><td><center>' . base64_decode($rowx['auditdate']) . '</center></td><td>' . getglacc(base64_decode($rowx['efee'])) . '</td><td></td><td>' . getsymbol() . '0</td><td>' . getsymbol() . '' . number_format(($sum1x)) . '</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';
                    }
                }

                if (loanratetype($lid) != '2') {

                    $sumaas = totalloaninterests($loanz);
                    $assum+=$sumaas;
                    if ($sumaas > 0) {
                        echo '<tr><td><center>' . getappdate($loanz) . '</center></td><td>Interest Charged on Loan</td><td></td><td>' . getsymbol() . '0</td><td>' . getsymbol() . '' . number_format($sumaas) . '</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum) - ($def + $ghi + $mtoo))) . '</center></b></td></tr>';
                    }
                }

                $qry2 = mysql_query('select * from loanpayment where mno="' . base64_encode($mno) . '" and transid="' . $loanz . '"') or die(mysql_error());
                if (mysql_num_rows($qry2) >= 1) {

                    while ($row = mysql_fetch_array($qry2)) {
                        $sum2 = $row['amount'];
                        $def+=base64_decode($sum2);

                        echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>Loan Repayment</td><td>' . (base64_decode($row['reference_number'])) . '</td><td>' . getsymbol() . '' . number_format(base64_decode($sum2)) . '</td><td>' . getsymbol() . '0</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';
                    }
                }

                if (loanratetype($lid) == '2') {
                    $qry5 = mysql_query('select * from chargedinterest where membernumber="' . base64_encode($mno) . '" and transid="' . $loanz . '"') or die(mysql_error());
                    while ($row523 = mysql_fetch_array($qry5)) {

                        $sumaas = base64_decode($row523['amount']);
                        $assum+=$sumaas;

                        if ($sumaas > 0) {
                            echo '<tr><td><center>' . base64_decode($row523['date']) . '</center></td><td>' . getglacc('125') . ' Charged on Loan</td><td></td><td>' . getsymbol() . '0</td><td>' . getsymbol() . '' . number_format($sumaas) . '</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';
                        }
                    }
                }

                $qry4 = mysql_query('select * from paymentin where payeeid="' . base64_encode($mno) . '" and transid="' . $loanz . '"') or die(mysql_error());
                while ($row23 = mysql_fetch_array($qry4)) {

                    $sum4 = $row23['amount'];
                    $ghi+=base64_decode($sum4);

                    echo '<tr><td><center>' . base64_decode($row23['date']) . '</center></td><td>' . getglacc(base64_decode($row23['transname'])) . '</td><td>' . (base64_decode($row23['comments'])) . '</td><td>' . getsymbol() . '' . number_format(base64_decode($sum4)) . '</td><td>' . getsymbol() . '0</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';
                }
            }
            /*
              $adaqry = mysql_query('select * from memberdeductions where memberno="' . base64_encode($mno) . '" and paymenttype="' . base64_encode(getglid(getloaname($lid))) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transid="' . $loanz . '"') or die(mysql_error());
              while ($roaw2 = mysql_fetch_array($adaqry)) {

              $mto = $roaw2['amount'];
              $mtoo+=base64_decode($mto);

              echo '<tr><td><center>' . base64_decode($roaw2['date']) . '</center></td><td>' . getglacc(base64_decode($roaw2['transaction'])) . ' - (Offset)</td><td>' . getglacc(base64_decode($roaw2['transaction'])) . ' - (Offset)</td><td>' . getsymbol() . '0</td><td>' . getsymbol() . '' . number_format(base64_decode($mto)) . '</td><td><b><center>' . getsymbol() . '' . number_format((($abc + $jkl + $mnoo + $assum + $cum + $mtoo) - ($def + $ghi))) . '</center></b></td></tr>';
              }
             * 
             */

            $sumout1 = $abc + $mnoo + $assum + $cum + $mtoo;
            $sin1 = $def + $ghi;

            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }

        $bal1 = $sumout1 - $sin1;
        $newbal1 = $bal1;
        echo '<tr><th>Total</th><td>' . $errormsg . '</td><td>' . $errormsg . '</td><td>' . getsymbol() . '' . number_format($sin1) . '</td><td>' . getsymbol() . '' . number_format($sumout1) . '</td><td><b><center>' . getsymbol() . '' . number_format($newbal1) . '</center></b></td></tr>';
    }
}

function newinterest($tid) {
    $qry = mysql_query('select * from loanintrests where transid="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        $one+=base64_decode($rslt['interest']);
    }
    return round($one);
}

function getappdate($tid) {

    $query = mysql_query(" SELECT * FROM loanapplication WHERE transactionid ='$tid'   ");
    while ($row = mysql_fetch_array($query)) {

        return base64_decode($row['appdate']);
    }
}

function newinterestdate($tid) {
    $qry = mysql_query('select * from loanintrests where transid="' . $tid . '"') or die(mysql_error());
    while ($rslt = mysql_fetch_array($qry)) {
        $one = base64_decode($rslt['date']);
    }
    return ($one);
}

function ministatementagen2($user, $mno, $tid, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);

        $balbf = bbf3($user, $mno, $datefrom);
        $old = $datefrom;
        $two = date("d-M-Y", strtotime($old));
        $newmonth = date("d-M-Y", strtotime("$two -1 day"));

        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
        <tr><th colspan="5"><center>' . getglacc(getdefaultsavingsaccount()) . ' STATEMENT</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money in</th><th>Money out</th><th>Balance</th></tr>           
        <tr><th>' . $newmonth . '</th><td>Balance BF</td><td></td><td></td><td><center>' . getsymbol() . '.' . number_format($balbf, 2) . '</center></td></tr>';

            $qryz = mysql_query('select * from sharesbf where memberno="' . base64_encode($mno) . '"') or die(mysql_error());
            if (mysql_num_rows($qryz) >= 1) {
                while ($rowz = mysql_fetch_array($qryz)) {
                    $sumina = $rowz['sharesbf'];
                    $sssa+=base64_decode($sumina);

                    echo '<tr><td><center>' . base64_decode($rowz['date']) . '</center></td><td>Starting Balance</td><td>' . getsymbol() . '.' . number_format(base64_decode($sumina), 2) . '</td><td>' . getsymbol() . '.0.00</td><td><b><center>' . getsymbol() . '.' . number_format(($sss - $mmm + $scs + $mtoo + $sssa), 2) . '</center></b></td></tr>';
                }
            }

            while ($s <= $t) {

                $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
                if (mysql_num_rows($qry) >= 1) {
                    while ($row = mysql_fetch_array($qry)) {
                        $sumin = $row['amount'];
                        $sss+=base64_decode($sumin);

                        echo '<tr><td><center>' . base64_decode($row['date']) . '</center></td><td>' . getglacc(base64_decode($row['transaction'])) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($sumin), 2) . '</td><td>' . getsymbol() . '.0.00</td><td><b><center>' . getsymbol() . '.' . number_format(($sss - $mmm + $scs + $mtoo + $sssa), 2) . '</center></b></td></tr>';
                    }
                }

                $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
                while ($row2 = mysql_fetch_array($adqry)) {

                    $adj = $row2['amount'];
                    $adjj+=base64_decode($adj);

                    echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td>';
                    if (is_numeric((base64_decode($row2['transname'])))) {
                        echo'<td>' . getGlname(base64_decode($row2['transname'])) . '</td>';
                    } else {
                        echo'<td>' . base64_decode($row2['transname']) . '</td>';
                    }
                    echo'<td>' . getsymbol() . '.0.00</td><td>' . getsymbol() . '.' . number_format(base64_decode($adj), 2) . '</td>
                    <td><b><center>' . getsymbol() . '.' . number_format(($sss - $adjj + $scs + $mtoo + $sssa), 2) . '</center></b></td></tr>';
                }

//$sin = $bbb + $sss + $loaa;
                $sin = $sss + $sssa;
                $sumout = $loss + $lopp + $stoo + $adjj + $finee;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }

            $bal = $sin - $sumout;
            $newbal = $bal + $balbf;

            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sin, 2) . '</td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td><td><b><center>' . getsymbol() . '.' . number_format($newbal, 2) . '</center></b></td></tr>';

            echo '</table>';
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
}

function loaninterestgen($user, $mno, $tid, $datefrom, $dateto) {
    $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
    if (mysql_num_rows($mqry) == 1) {

        $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
        $t = strtotime($dateto);

        if ($t < $s) {
            echo '<span class="red" >Sorry Please enter search dates correctly</span></br>';
        } else {


            echo '<div id="mt"><table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead>
        <tr><th colspan="5"><center>Member Income to Sacco Statements</center></th></tr>
        <tr><th>Date</th><th>Transaction</th><th>Money in</th><th>Money out</th><th>Balance</th></tr>';

            while ($s <= $t) {

                $adqry = mysql_query('select * from paymentin where payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transname!="' . base64_encode("125") . '" and transname!="' . base64_encode("68") . '" and transname!="' . base64_encode("122") . '" and transname!="' . base64_encode("123") . '"') or die(mysql_error());
                while ($row2 = mysql_fetch_array($adqry)) {

                    $adj = $row2['amount'];
                    $adjj+=base64_decode($adj);

                    echo '<tr><td><center>' . base64_decode($row2['date']) . '</center></td><td>' . getglacc(base64_decode($row2['transname'])) . '</td><td>' . getsymbol() . '.' . number_format(base64_decode($adj), 2) . '</td><td>' . getsymbol() . '.0.00</td><td><b><center>' . getsymbol() . '.' . number_format(($adjj), 2) . '</center></b></td></tr>';
                }

                $sumout = $none;
                $sin = $adjj;

                $s = $s + 86400; //increment date by 86400 seconds(1 day)
            }

            $bal = $sin - $sumout;
            $newbal = $bal;

            echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sin, 2) . '</td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td><td><b><center>' . getsymbol() . '.' . number_format($newbal, 2) . '</center></b></td></tr>';

            echo '</table>';
        }
    } else {
        echo '<span class="red" >Sorry Member not found</span></br>';
    }
}

function bbf3($user, $mno, $from) {

//date("m", strtotime($mfrom));
    $two = date("d-M-Y", strtotime($from));

    $dateto = date("d-M-Y", strtotime("$two -1 day"));

    $mfrom = 1;
    $dfrom = 1;
    $yfrom = 2015;

    $sm = date("m", strtotime($mfrom));
    $sd = $dfrom;
    $sy = $yfrom;

    $s = mktime(0, 0, 0, $sm, $sd, $sy);

    $t = strtotime($dateto);
//$e=mktime(0,0,0,$em, $ed, $ey);
//$t = strtotime($dateto);

    while ($s <= $t) {

        $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
        if (mysql_num_rows($qry) >= 1) {
            while ($row = mysql_fetch_array($qry)) {
                $sumin = $row['amount'];
                $sss+=base64_decode($sumin);
            }
        }


        $sqry = mysql_query('select * from membercontribution where memberno="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and paymenttype="' . base64_encode(getdefaultsharesaccount()) . '" and transaction!="' . base64_encode(getdefaultsavingsaccount()) . '"') or die(mysql_error());
        if (mysql_num_rows($sqry) >= 1) {
            while ($rows = mysql_fetch_array($sqry)) {
                $chumin = $rows['amount'];
                $scs+=base64_decode($chumin);
            }
        }


        $stadqry = mysql_query('select * from paymentin where paymentype="' . base64_encode(getdefaultsharesaccount()) . '" and payeeid="' . base64_encode($mno) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '"') or die(mysql_error());
        while ($row49 = mysql_fetch_array($stadqry)) {

            $mto = $row49['amount'];
            $mtoo+=base64_decode($mto);
        }

        $sumout = $mtoo + $scs;
        $sin = $sss;

        $s = $s + 86400; //increment date by 86400 seconds(1 day) 

        $balance = $sin - $sumout;
    }
    return $balance;
}

function calLiaAsetShare($id, $accgroup, $datefrom, $dateto) {
    $rowamount = 0;
    $debit = 0;
    $credit = 0;
    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        // 
    } else {
        while ($s <= $t) {
            $stmt = mysql_query("SELECT * FROM  membercontribution     WHERE  transaction='" . base64_encode($id) . "'  AND   paymenttype !='" . base64_encode(adjustments) . "'  AND	date='" . base64_encode(date('d-M-Y', $s)) . "'   ");


            while ($row11 = mysql_fetch_array($stmt)) {
                $rowamount += base64_decode($row11['amount']);
            }
            $sth = mysql_query("SELECT *FROM  banking    WHERE   bnkid='" . base64_encode($id) . "'  AND mode='ZGVwb3NpdA=='   AND   date='" . base64_encode(date('d-M-Y', $s)) . "'  ");
            while ($row = mysql_fetch_array($sth)) {
                $debit +=base64_decode($row['amount']);
            }

            $stl = mysql_query("SELECT *FROM  banking    WHERE bnkid='" . base64_encode($id) . "' AND mode='d2l0aGRyYXc='  AND   date='" . base64_encode(date('d-M-Y', $s)) . "' ");
            while ($row1 = mysql_fetch_array($stl)) {
                $credit +=base64_decode($row1['amount']);
            }

            $s = $s + 86400;
            $bal = $debit - $credit;
            $total = $rowamount + $bal;
        }
    } return $total;
}

function loansreass() {
    $mqry = mysql_query('select * from newmember where status="' . base64_encode('active') . '"') or die(mysql_error());
    while ($ger = mysql_fetch_array($mqry)) {

        $qry = mysql_query('select * from loanapplication where membernumber="' . ($ger['membernumber']) . '" and status="' . base64_encode('pending') . '"') or die(mysql_error());
        while ($row = mysql_fetch_array($qry)) {
            $rowamount +=fullremainingloan($row['transactionid']);
        }
    }
}

function issuedloan($user, $datefrom, $dateto) {
    $totalamount = 0;
    echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover">
<thead><tr><th colspan="6"><h3 align="center"><b> Issued Loan From ' . $datefrom . '  To  ' . $dateto . ' </b></h3></th></tr>
<tr><th>Member Number</th><th> Member Name</th><th> Loan Name</th><th>Date</th><th>Installments</th><th>Amount</th> </tr></thead><tbody>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);
    if ($t < $s) {
        
    } else {
        while ($s <= $t) {
            $stmt = mysql_query("SELECT * FROM   loanapplication   WHERE    appdate= '" . base64_encode($s) . "'   ");

            while ($row = mysql_fetch_array($stmt)) {

                echo'<tr><td>' . base64_decode($row['membernumber']) . '</td><td>' . getMembername($row['membernumber']) . '</td><td>' . loannym(base64_decode($row['loantype'])) . '</td><td>' . date('d-M-Y', base64_decode($row['appdate'])) . '</td><td>' . base64_decode($row['installments']) . '</td><td>' . getsymbol() . ' ' . number_format(getloanamount($row['transactionid']), 2) . '</td></tr>';
                $totalamount += getloanamount($row['transactionid']);
            }
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
    }



    echo'<tr><td colspan="5" align="right">Total</td><td>' . getsymbol() . ' ' . number_format($totalamount, 2) . '</td></tr>
 </tbody></table>';
}

function extracostloans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b> Select Loan to Add Extra Cash </b></h3></th>   </tr>
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Loan Amount</th>
<th class="style"><center>Action</center></th>';
    $write = check_write_permission();
    if($write == 1){//if has write permission-delete
echo '<th class="style"><center>Action</center></th>';
    }
echo '</tr>

</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Add Extra Cash to this Loan?');";
    $confirmedit2 = "return confirm('Are you sure you want to Edit Extra Cash to this Loan?');";

    $Rows = mysql_query("SELECT * FROM loanapplication order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(base64_decode($lrstl['amount'])) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="extracash.php?lid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '"><img src="images/dollars.png">Select </a></td>';
    if($write == 1){//if has write permission-delete
    echo '<td class="style"> <a onClick="' . $confirmedit2 . '" href="extracashedit.php?elid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '"><img src="images/edit.png">Edit </a></td>';
    }
echo '</tr>';
        }
    }
    echo '</table></div>';
}

function loanApproval() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="7"> <h3 align="center"> <b>Pending Loans </b></h3></th>   </tr>
<tr>
<th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th><th>Date of Application</th>';
$write = check_write_permission();
if($write == 1){//if has write permission
    echo '<th>Approve</th> <th>Reject</th>';
}
echo '</tr>
</thead>';


    $confirmedit = "return confirm('Are you sure you want to Approve this Loan?');";
    $confir = "return confirm('Are you sure you want to Reject this Loan?');";
    $status = "inactive";    //
    $Rows = mysql_query("SELECT * FROM  loanapplication  WHERE   status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transactionid'])) . '</td>
<td>' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
     
<td>' . date('d-M-Y', base64_decode($Row['appdate'])) . '</td> ';
 $write = check_write_permission();
 if($write == 1){//if has write permission
echo '<td><form action="" method="post" ><input type="hidden" name="lonId" value="' . $Row['id'] . '" /> <button class="btn green" onClick="' . $confirmedit . '" name="loanapp" >Approve </button></form>
   </td>
   <td><form action="#basic" method="POST" ><input type="hidden" name="loanid" value="' . $Row['id'] . '" />
     <input type="submit" class="btn red " onClick="' . $confir . '" name="btnrejed" value="' . "Reject" . '" >   
        
</form></td>';
 }
echo '</tr>';
    }
    echo '</table></div>';

    echo'<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
         <a class="btn default" data-toggle="modal" href="#basic"></a>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Loan Rejection</h4>
										</div>
                                                                                <form action="" method="POST" >
										<div class="modal-body">';

    if (isset($_POST['btnrejed'])) {



        echo'<input type="hidden" name="rejectid" value="' . $id . '" />';
    }
    echo' <h4>Enter Comment</h4>
														<p>
															<input type="text" name="comment" required  class="col-md-12 form-control" placeHolder="Enter Comment on  loan rejection" />
														</p>   
				</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="btnreject" class="btn blue">Submit</button>
										</div>
                                                                                </form>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>';
}

function rejectedloans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b>Rejected Loans</b></h3></th>   </tr>
<tr>
<th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th> <th> Date </th> </tr>
</thead>';


    $status = "rejected";    //
    $Rows = mysql_query("SELECT * FROM  loanapplication    WHERE    status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transid'])) . '</td>
<td>' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . base64_decode($Row['date']) . '</td> 
</tr>';
    }
    echo '</table></div>';
}

function completedloans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b>Completed Loans</b></h3></th>   </tr>
<tr>
<th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th> <th> Date </th> </tr>
</thead>';


    $status = "completed";    //
    $Rows = mysql_query("SELECT * FROM  loans    WHERE    status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transid'])) . '</td>
<td>' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . (base64_decode($Row['date'])) . '</td> 
</tr>';
    }
    echo '</table></div>';
}

function activeLoans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
 <tr><th colspan="5"> <h3 align="center"> ' . compname() . '</h3></th></tr>
<tr> <th colspan="6"><b><center>Active Loans</center></b></th>   </tr>
<tr>
<th>Member No.</th>   <th>Member Name</th> <th>Loan Type</th> <th> Amount</th> <th> Date </th> </tr>
</thead>';


    $status = "active";    //
    $Rows = mysql_query("SELECT * FROM  loans    WHERE    status='" . base64_encode($status) . "'   ");
    while ($Row = mysql_fetch_array($Rows)) {
        echo'<tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . loanname(($Row['transid'])) . '</td>
<td>' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>
<td>' . base64_decode($Row['date']) . '</td> 
</tr>';
    }
    echo '</table></div>';
}

function form() {
    echo'<form action="" name="jf44" class="" method="post" >
        <div class="form-body"> 
        <div class="form-group">
        <div class="col-md-4">
<label>Select Member Number</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" style = "qcont:firstletter;" value = "' . $_REQUEST['mno'] . '" data-placeholder="SelectMember Number"  class="input-medium form-control select2me">
<option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "' ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    <div id="txtHint">
    </div>
    <br />
    <input type="submit" name="request" value="Generate" class="btn green">
</div>
   </div>
    </div>
    </form>';
}

function reprint() {

    echo'<form action="" class="form-horizontal" method="post" action="" >
  <div class="form-body">    
 <div class="col-md-4">
<label>Member Number</label>
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" style = "qcont:firstletter;"  class="form-control  input-medium">
<option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>

<div id = "txtHint">

<label>Member Name</label>
<input id="mname"  class="form-control input-medium"   type = "text" name = "mname"  readonly required placeholder = "Enter Member Name" title = "Enter Member Name" value = "' . $_REQUEST['mname'] . '"/>

</div>

<label class="label-control">Select Receipt Account</label>
<select type="text" name="acc" class="form-control input-medium" placeholder="Enter Receipt Number" title="Enter Receipt Number"/>
<option></option>
<option value="exp">Expenses</option>
<option value="income">Income</option>
<option value="contr">Contribution</option>
</select>
<label class="label-control">Date OF Birth</label>
<input   class="form-control input-medium date-picker"  data-date-format="dd-M-yyyy"  type="text" name = "date"  title = "Enter Date of Transaction" placeholder = "Enter Date of Transaction"/>
<br />
<input type="submit" name="viewre" value="Receipt" class="btn green" />
</div>
</form>';
}

function transview($acc, $date, $mno) {
    $sth = mysql_query("SELECT * FROM  membercontribution   WHERE date='" . base64_encode($date) . "' AND 	memberno='" . base64_encode($mno) . "' ");
    $stmt = mysql_query("SELECT * FROM  paymentin    WHERE date='" . base64_encode($date) . "'  AND payeeid='" . base64_encode($mno) . "' ");
    $query = mysql_query("SELECT * FROM    paymentout  WHERE date='" . base64_encode($date) . "' AND memberno='" . base64_encode($mno) . "'  ");

    if ((mysql_num_rows($sth) == 0) AND ( mysql_num_rows($query) == 0) AND ( mysql_num_rows($stmt) == 0)) {
        $alert = '<script type="text/javascript">alert("No transaction found for ");</script>';
        echo $alert;
    } else {
        echo'<table class="table table-striped table-hover table-bordered">
         <thead><tr><th align="center" colspan="3"> ' . getMembername(base64_encode($mno)) . ' Transaction Done On ' . $date . '  </th>   </tr>
       <thead><th>Transaction Name  </th><th>transaction </th> <th>Action</th> </thead><tbody>';

        if ($acc == "contr") {

            while ($row = mysql_fetch_array($sth)) {
                echo'<tr><td>' . getMembername($mno) . '</td><td>' . getGlname(base64_decode($row['transaction'])) . '</td> <td><a href="reprint.php?' . $row['primarykey'] . '>Select</a></td></tr>';
            }
        } else if ($acc == "income") {

            while ($row1 = mysql_fetch_array($stmt)) {
                echo'<tr><td>' . getMembername($mno) . '</td><td>' . getGlname(base64_decode($row['transaction'])) . '</td>  <td><a href="reprint.php?' . $row['primarykey'] . '>Select</a></td></tr>';
            }
        } else {

            while ($row2 = mysql_fetch_array($query)) {
                echo'<tr><td>' . getMembername($mno) . '</td><td>' . getGlname(base64_decode($row['transaction'])) . '</td>  <td><a href="reprint.php?' . $row['primarykey'] . '>Select</a></td></tr>';
            }
        }

        echo'</tbody></table>';
    }
}

function reprintReceipt($receiptid, $acc) {


    $sth = mysql_query("SELECT * FROM  receipt  WHERE receiptid='$receiptid'   AND src='$acc'  ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<img width="250" height="350" src="' . $row['receipt'] . '">';
    }
}

function printcontr($user, $id, $date) {
    $Rows = mysql_query("SELECT * FROM membercontribution  WHERE primarykey='$id'  ");

    while ($Row = mysql_fetch_array($Rows)) {
        contributionreceipt($user, $id, base64_decode($Row['memberno']), base64_decode($Row['vehicleregno']), base64_decode($Row['transid']), base64_decode($Row['payeeid']), base64_decode($Row['payee']), base64_decode($Row['transaction']), base64_decode($Row['paymenttype']), base64_decode($Row['amount']), base64_decode($Row['datefrom']), base64_decode($Row['dateto']), ($Row['session']), $date);
    }
}

function incomereprintreceipt() {
    echo '
<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"  id="sample_2">
<thead  class="style">
<tr>
<th class="style">Date</th>
<th class="style">Receipt Number</th>
<th class="style">Paid By</th>
<th class="style">Payee ID</th>

<th class="style">Transaction</th>

<th class="style">Amount</th>
<th class="style">Select</th>

</tr>

</thead>';
    $Rows = mysql_query('SELECT * FROM paymentin where paymentype!="' . base64_encode('adjustments') . '"');

    while ($Row = mysql_fetch_array($Rows)) {

        echo'	<tr>
<td class="style">' . base64_decode($Row['date']) . '</td>
<td class="style">' . base64_decode($Row['transid']) . '</td>
<td class="style">' . base64_decode($Row['paidby']) . '</td>
<td class="style">' . base64_decode($Row['payeeid']) . '</td>

<td class="style">' . getglacc(base64_decode($Row['transname'])) . '</td>

<td class="style">' . getsymbol() . '.' . number_format(base64_decode($Row['amount']), 2) . '</td>';
        $print = "return confirm('Are you sure you want to select this?');";

        echo'<td class="style"> <a onClick="' . $print . '" href="incomereprint.php?print=' . $Row['primarykey'] . '"> Select</a></td>';
    }
    echo '</table>';
}

function printinc($user, $id, $date) {
    $Row = mysql_query("SELECT * FROM paymentin  WHERE primarykey='$id'  ");

    while ($Rows = mysql_fetch_array($Row)) {
        incomereceipt($user, base64_decode($Rows['transid']), base64_decode($Rows['transname']), base64_decode($Rows['amount']), base64_decode($Rows['paymentype']), base64_decode($Rows['approvedby']), base64_decode($Rows['paidby']), base64_decode($Rows['payeeid']), base64_decode($Rows['comments']), $Rows['session'], $date);
    }
}

function printexpe($user, $id, $date) {
    $Row = mysql_query("SELECT * FROM paymentout  WHERE primarykey='$id'  ");

    while ($Rows = mysql_fetch_array($Row)) {
        expensereceipt($user, base64_decode($Rows['transid']), base64_decode($Rows['transname']), base64_decode($Rows['amount']), base64_decode($Rows['paymentype']), base64_decode($Rows['chequeno']), base64_decode($Rows['approvedby']), base64_decode($Rows['receiver']), base64_decode($Rows['receiverid']), $Rows['session'], $date);
    }
}

function memberCheckOffReport($mnth, $org) {
    echo'<table  id="tableToExcel" class="table table-striped table-hover table-bordered"><thead>
        <thead><th>Payroll No/Mno</th> <th>Fname</th> <th>Mname</th> <th>Lname</th> <th>IDNO</th> <th>Amount</th>  </thead><tbody>';
    $stmt = mysql_query("SELECT * FROM   check_off WHERE   org='$mnth'  AND mnth='$org' ");
    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . $row['mno'] . '</td> <td></td>  <td></td>  <td></td><td></td>   </tr>';
    }
    echo'</tbody></table>';
}

function checkOffReport($mnth, $org) {
    //echo $mnth,$org;
    echo'<form action="" class="form-horizontal"  method="post" role="form">
       
<div class="form-body">
<div class="row"> 
            <div class="col-md-2">
    <label class="control-label"> Choose Month </label></div>
    <div class="col-md-3">
    <select type="text" data-placeholder="Choose Month" title="Choose Month" class="form-control input-medium select2me" name="mnth" >
    <option>  </option>';
    $stmt = mysql_query("SELECT * FROM   check_off GROUP BY mnth  ORDER BY id ");
    while ($row1 = mysql_fetch_array($stmt)) {
        echo'<option value="' . base64_decode($row1['mnth']) . '">' . base64_decode($row1['mnth']) . '</option>';
    }
    echo'</select>
    </div>
    <div class="col-md-2">
<label class="control-label ">Select Organisation</label>
</div><div class="col-md-3">

<select type="text" name="org"  data-placeholder="Select Organisation" title="Select Organisation"  class="input-medium form-control select2me">
<option>   </option>';
    $sth = mysql_query("SELECT * FROM   check_off     GROUP BY org ORDER BY  	id ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<option value="' . base64_decode($row['org']) . '">' . getOrg(base64_decode($row['org'])) . '</option>';
    }
    echo'</select>

</div>
<div class=" col-md-2">
<input type="submit" class="btn green" value="Select" name="search" />
    </div></div></div>
       </form>';
    $toto = 0;
    // <tr><th><img width="200" height="150" src="photos/'.logo(). '"></th><th>'.  '</th></tr>
    echo'<div id="mt"><table  id="tableToExcel" class="table table-striped table-hover table-bordered"><thead>
       <tr><th style="align:center;" colspan="5">Organisation: ' . getOrg($org) . '</th></tr>
        <tr><th>Member Name</th>  <th>Month  </th><th>Transaction</th><th>Date Of Transaction</th><th> Amount</th></tr>
  
        </thead><tbody>';

    $result = mysql_query("SELECT * FROM check_off   WHERE amount!='" . base64_encode("0") . "'  AND  mnth='" . base64_encode($mnth) . "'  AND  org='" . base64_encode($org) . "' ");

    while ($row = mysql_fetch_array($result)) {
        $toto += base64_decode($row['amount']);
        echo '<tr>
<td>' . getMembername(($row['mno'])) . '</td><td>' . base64_decode($row['mnth']) . ' </td><td>';
        if (strlen(base64_decode($row['tid'])) < 5) {

            echo getGlname(base64_decode($row['tid']));
        } else {
            echo getloaname(loantype(base64_decode($row['tid'])));
        }
        echo '</td><td>' . base64_decode($row['date']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td></tr>';
    }

    echo'<tr><th style="align:right;" colspan="4">Total</th><th>' . getsymbol() . ' ' . number_format($toto, 2) . '</th></tr></tbody>
       </table></div>';
}

function editCheckOffReport($mnth, $org) {

    echo'<table  class="table table-striped table-hover table-bordered"><thead>
       
        <tr><th>Member Name</th>  <th>Month  </th><th> Transaction </th><th>Date Of Transaction</th><th> Amount</th>';
        $write = check_write_permission();
        if($write == 1){
        echo '<th>Edit</th>';
        }
        echo '</tr>
  
        </thead><tbody>';
    $con = "return confirm('Are you sure you want to Edit?');";
    $result = mysql_query("SELECT * FROM check_off   WHERE amount!='" . base64_encode("0") . "'  AND  mnth='" . base64_encode($mnth) . "'  AND  org='" . base64_encode($org) . "'  ");

    while ($row = mysql_fetch_array($result)) {

        echo '<tr>
<td>' . getMembername(($row['mno'])) . '</td><td>' . base64_decode($row['mnth']) . ' </td><td>';

        if ((strlen($row['tid'])) > "5") {

            echo loanname(($row['tid']));
        } else {
            echo getGlname(base64_decode($row['tid']));
        }
        echo '</td><td>' . base64_decode($row['date']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td>';
            if($write == 1){
                echo '<td><form action="" method="post"><input type="hidden" name="che" value="' . $row['id'] . '" /> <button type="submit" name="btnchek" onClick="' . $con . '" ><img src = "images/edit.png"> </button></form></td></tr>';
            }
    
            }

    echo'</tbody></table>';
}

function loanCheckOff() {
    echo'<form action="" class="form-horizontal"  method="post"><table class="table table-striped table-hover table-bordered"><thead>
        <tr><th>Member Name</th><th>Organisation</th>  <th>Check Off Month  </th><th> Amount</th> <th>Date Of Transaction</th><th>Transaction</th></tr>
        
        </thead><tbody>';

    $result = mysql_query("SELECT * FROM check_off   WHERE amount!='" . base64_encode('0') . "' AND status='" . base64_encode('update') . "'  ");

    while ($row = mysql_fetch_array($result)) {

        if (strlen(base64_decode($row['tid'])) > 5) {
            $sth = mysql_query("SELECT * FROM   loanapplication   WHERE   transactionid='" . ($row['tid']) . "'   AND status='" . base64_encode('active') . "'");
            while ($row2 = mysql_fetch_array($sth)) {
                $tname = getloangl(getloaname(base64_decode($row2['loantype'])));
                echo '<tr><td><input name="tname[]" type="hidden" value="' . ($tname) . '" ><input type="hidden" name="mno[]" value="' . base64_decode($row['mno']) . '" ><input type="hidden" name="amount[]" value="' . base64_decode($row['amount']) . '" ><input type="hidden" name="tid[]" value="' . base64_decode($row['tid']) . '" ><input name="date[]" type="hidden" value="' . base64_decode($row['date']) . '" >' . getMembername(($row['mno'])) . '</td><td>' . getOrg(base64_decode($row['org'])) . ' </td><td>' . base64_decode($row['mnth']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td><td>' . base64_decode($row['date']) . ' </td><td>' . loannym(loantype(base64_decode($row['tid']))) . ' </td></tr>';
            }
        } else {

            echo '<tr><td><input name="tname[]" type="hidden" value="' . base64_decode($row['tid']) . '" ><input type="hidden" name="mno[]" value="' . base64_decode($row['mno']) . '" ><input type="hidden" name="amount[]" value="' . base64_decode($row['amount']) . '" ><input type="hidden" name="tid[]" value="' . base64_decode($row['tid']) . '" ><input name="date[]" type="hidden" value="' . base64_decode($row['date']) . '" >' . getMembername(($row['mno'])) . '</td><td>' . getOrg(base64_decode($row['org'])) . ' </td><td>' . base64_decode($row['mnth']) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td><td>' . base64_decode($row['date']) . ' </td><td>' . getGlname(base64_decode($row['tid'])) . ' </td></tr>';
        }
    }

    echo'</tbody></table> <button type="submit" name="transfer" value="3" class="btn green" >Post</button></form>';
}

function check() {
    echo'<form action="" class="form-horizontal"  method="post">
        <div class="form-body">
    <div class="form-group">
    <label class="control-label col-md-3"> Choose Month </label>
    <select type="text" data-placeholder="Choose Month" title="Choose Month" class="form-control input-medium select2me" name="mnth" >
    <option>  </option>';
    $stmt = mysql_query("SELECT * FROM   check_off GROUP BY mnth  ORDER BY id ");
    while ($row1 = mysql_fetch_array($stmt)) {
        echo'<option value="' . base64_decode($row1['mnth']) . '">' . base64_decode($row1['mnth']) . '</option>';
    }
    echo'</select>
    </div>
    <div class="form-group">
<label class="control-label col-md-3">Select Organisation</label>


<select type="text" name="org"  data-placeholder="Select Organisation" title="Select Organisation"  class="input-medium form-control select2me">
<option>   </option>';
    $sth = mysql_query("SELECT * FROM   check_off     GROUP BY org ORDER BY  	id ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<option value="' . base64_decode($row['org']) . '">' . getOrg(base64_decode($row['org'])) . '</option>';
    }
    echo'</select>

</div>
<div class="col-md-offset-3 col-md-3">
<input type="submit" class="btn green" value="Select" name="search" />
    </div></div>
       </form>';
}

function updateCheckOff($id) {

    $sth = mysql_query("SELECT * FROM check_off  WHERE id='$id'");
    while ($row = mysql_fetch_array($sth)) {
        if (strlen(base64_decode($row['tid'])) > 5) {
            $tid = loannym(loantype(base64_decode($row['tid'])));
        } else {
            $tid = getGlname(base64_decode($row['tid']));
        }
        echo'<form action ="" name="" method="post" class="form-horizontal">
<div class="form-body">
<div class="form-group">
<input type="hidden" class="form-control input-medium"  name="id" value="' . $id . '" />
<label class="control-label">Member Name</label>
<input type="text" class="form-control input-medium" readonly  value="' . getMembername($row['mno']) . '" />
</div>
<div class="form-group">
<label class="control-label">Transaction</label>
    <input class="form-control input-medium" readonly placeholder="Select Transaction"  title="Select Transaction"  value="' . $tid . '" />
</div>
<div class="form-group">
<label class="control-label">Organisation</label>
    <input class="form-control input-medium" readonly placeholder="Select Organisation"  title="Select Organisation"  value="' . getOrg(base64_decode($row['org'])) . '" />
</div>
<div class="form-group">
<label class="control-label">Check Of Month</label>
   <input  class="form-control input-medium date-picker"  data-date-format="M-yyyy" value="' . base64_decode($row['mnth']) . '"  type="text"  name="mnth" required placeholder="select Check Off Month" title="select Check Off Month"/>
</div>
<div class="form-group">
<label class="control-label">Amount</label>
    <input class="form-control input-medium"  name="amount" placeholder="Select Amount"  title="Select Amount" value="' . base64_decode($row['amount']) . '" />
</div>

<input type="submit" class="btn green" name="insert" value="update" />
</div></form>';
    }
}

function loanPortfolio() {
    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
          <thead><tr><th colspan="11"><h3 align="center"><b>  Loan Portfolio Report</b></h3></th>   </tr>
          <tr><th>Member Number</th><th>Member Name</th><th>Loan Type</th><th>Loan Amount  </th><th>Disbursed Amount  </th><th>Disbursed Date  </th><th> Date Of First Repayment </th><th> First Repayment Amount</th><th>  Amount Paid</th><th>  Loan Balance</th><th>  status</th></tr>
        
        </thead><tbody>';
    $sth = mysql_query("SELECT * FROM   loandisbursment");

    while ($row = mysql_fetch_array($sth)) {
        $tid = loantid(base64_decode($row['mno']), getloanid(getglacc(base64_decode($row['glid']))));
        $bal = getLoanAmountB($tid) - toAmountP($tid);
        echo'<tr><td>' . base64_decode($row['mno']) . '</td><td>' . getMembername($row['mno']) . '</td> <td>' . getGlname(base64_decode($row['glid'])) . '</td>  <td>' . getsymbol() . ' ' . number_format(getLoanAmountB($tid), 2) . ' </td><td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . '</td><td>' . base64_decode($row['date']) . '</td> <td>' . date('d-M-Y', dateOfRP($tid)) . '</td> <td>' . getsymbol() . ' ' . number_format(firstAmountP($tid), 2) . '</td><td>' . getsymbol() . ' ' . (number_format(toAmountP($tid), 2)) . '</td><td>' . getsymbol() . ' ' . (number_format($bal, 2)) . '</td><td>' . getStatus($tid) . '</td></tr>';
    }


    echo'</tbody></table></div>';
}

function transfeeProcssingFees() {
    ?><form action="" class="form-horizontal" method="post">
        <input type="button" class="btn green" onclick="addInput()" name="addd" value="Add input field" />
        <input type="button" class="btn red" onclick="removeLastField()" name="rem" value="Remove input field" /> 
        <div class="form-body">


            <div class="form-body">
                <label>Default Charge account</label><br/>
                <select name="charge_acc" class="form-control input-medium select2me" title="Select default account" >
                    <option></option>
                    <?php
                    $actfee = mysql_query('select * from glaccounts where accgroup="' . base64_encode('4') . '" and status="' . base64_encode('Active') . '"') or die(mysql_error());
                    while ($rowfee = mysql_fetch_array($actfee)) {
                        echo '<option value=' . $rowfee['id'] . '>' . base64_decode($rowfee['acname']) . '</option>';
                    }
                    ?>
                </select></div>

            <div id="withd">
            </div>    

            <input type="submit" value="submit" name="process" class="btn green" class="btn green">

        </div>   
    </form>
    <?php
}

function loanProcssingFees() {
    ?><form action="" class="form-horizontal" method="post">
        <div class="form-body">
            <input type="button" class="btn green" onclick="addInput()" name="addd" value="Add input field" />
            <input type="button" class="btn red" onclick="removeLastField()" name="rem" value="Remove input field" /> 


            <div class="form-group">

                <label>Select Loan</label>
                <select name="lname" data-placeholder="Select Loan"  required title="Select Loan" class="form-control input-medium select2me">
                    <option>  </option>';
                    <?php
                    $sth = mysql_query("SELECT * FROM  loansettings");
                    while ($row = mysql_fetch_array($sth)) {
                        echo'<option value="' . $row['id'] . '">' . base64_decode($row['lname']) . '</option>';
                    }
                    ?>
                    echo'</select></div>
            <div id="text">


            </div>



            <input type="submit" value="submit" name="me" class="btn green" class="btn green">

        </div>
    </div>
    </form>
    <?php
}

function uploadcontribution() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Contribution CSV</label>  
      <input type="file" types="csv" placeholder="Upload Income CSV"  title="Upload Income CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
     <div class="two">
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="Contribution.csv" class="btn green" > Download Csv Template</a></div>';
}

function uploadCheckOff() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Check Off CSV</label>   <input type="file" types="csv" placeholder="UUpload Check Off CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="Template.csv" class="btn green" > Download Csv Template</a>';
}

function uploadLoanRepay() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Loan Repayment CSV</label>   <input type="file" types="csv" placeholder="UUpload Check Off CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="loanRepay.csv" class="btn green" > Download Csv Template</a>';
}

function uploadIntrest() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Loan Repayment CSV</label>   <input type="file" types="csv" placeholder="UUpload Check Off CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="interestRepay.csv" class="btn green" > Download Csv Template</a>';
}

function uploadexpenses() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Expenses CSV</label>   <input type="file" types="csv" placeholder="Upload Expenses CSV"  title="Upload Expenses CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="Expenses.csv" class="btn green" > Download Csv Template</a>';
}

function uploadincome() {
    echo'<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
      <label class="label-control"> Upload Income CSV</label>   <input type="file" types="csv" placeholder="Upload Income CSV"  title="Upload Income CSV" name="csv" id="csv" class="form-control input-medium"  ">
      <br/>
                        <input type="submit" class="btn green" name="importcsv" value="Import" class="btn red">
                    
        </form>
    <a href="Income.csv" class="btn green" > Download Csv Template</a>';
}

function createInvoiceAccount() {
    echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body">
        
        <div class="form-group">
        <label class="control-label">Select Gl Account  </label>
        <select  class="input-medium form-control" required name="glacc" placeholder="Select Gl Account" title="Select Gl Account" >
        <option> </option>';
    $sth = mysql_query("SELECT * FROM glaccounts    WHERE   accgroup='" . base64_encode(2) . "'");
    while ($row = mysql_fetch_array($sth)) {
        echo' <option value="' . $row['id'] . '">' . base64_decode($row['acname']) . ' </option>';
    }
    echo'</select>
</div>

<div class="form-group">
<label class="label-control"> Name </label>
<input type="text" class="form-control input-medium" required placeholder="Enter Package Name"   title="Enter Package Name" name="acc" >
  </div>
 
<div class="form-group">  
<label class="label-control">Amount </label>
<input type="number" class="form-control input-medium" required  placeholder="Enter Amount"   title="Enter Amount" name="amount" >
  </div>
  
<input type="submit" name="create" value="Create Account" class="btn green">

</div></form><form action="" method="post"><button  class="btn green" name="edit">Edit</button></form>';
}

function invoiceVehicle() {
    echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body">
         <div class="form-group">
         
        <label class="control-label">Select Account  </label>
        <select  class="input-medium form-control" name="acc" placeholder="Select Account" title="Select Account" >
        <option> </option>';
    $stmt = mysql_query("SELECT * FROM  vehicleaccount  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo' <option value="' . $row['id'] . '">' . base64_decode($row['account']) . ' </option>';
    }
    echo'</select>
</div>

        <div class="form-group">
        <label class="control-label">Select Vehicle  </label>
        <select  class="input-medium form-control" name="vid" placeholder="Select Vehicle" title="Select Vehicle" >
        <option> </option>';
    $sth = mysql_query("SELECT * FROM    newvehicle    ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo' <option value="' . ($row1['primarykey']) . '">' . (base64_decode($row1['vehicleregno'])) . ' ' . (getMembername($row1['memberno'])) . '</option>';
    }
    echo'</select>
</div>
 <div class="form-group">
 <label class="control-label">Date  </label>
 <input type="text" name="date" placeholder="Enter Date"  title="Enter Date"  class="date-picker input-medium form-control" data-date-format="dd-M-yyyy" >
 </div>
 
<input type="submit" name="invoice" value="Create Account" class="btn green">
</div></form><form method="post" action="" ><input name="edit" value="Edit"  class="btn green"type="submit"></form>';
}

function invoiceVehicleStatement($acc, $vid) {
    echo'<div id="mt"><table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead>
<tr><th>Date  </th><th>Payee</th><th>Vehicle Owner </th><th>Vehicle Name </th><th>Detail  </th><th>Money In  </th><th>Money Out   </th>  </tr>
<thead><tbody>';
    $sth = mysql_query("SELECT *FROM     vehicleinvoicepayment     WHERE  acc='$acc' AND  vid='$vid'   "); //AND  	status='YWN0aXZl'
    $stmt = mysql_query("SELECT *FROM    vehicleinvoice      WHERE  acc='$acc' AND  vid='$vid'  ");  //  WHERE date='".base64_encode(date('d-M-Y',$s))."'

    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . base64_decode($row['date']) . ' </td><td></td><td>' . getMembername(vehicleOwner(base64_decode($row['vid']))) . ' </td> <td>' . vehicleName(base64_decode($row['vid'])) . ' </td> <td>' . getInvoAcc(base64_decode($row['acc'])) . ' </td>  <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td><td></td></tr>';
        $moneyin += base64_decode($row['amount']);
    }
    while ($row1 = mysql_fetch_array($sth)) {
        echo'<tr><td>' . base64_decode($row1['date']) . ' </td><td>' . base64_decode($row1['payee']) . '</td><td>' . getMembername(vehicleOwner(base64_decode($row1['vid']))) . ' </td> <td>' . vehicleName(base64_decode($row1['vid'])) . ' </td> <td>' . getInvoAcc(base64_decode($row1['acc'])) . ' </td> <td></td> <td>' . getsymbol() . ' ' . number_format(base64_decode($row1['amount']), 2) . ' </td></tr>';
        $amount +=base64_decode($row1['amount']);
    }
    $bal = $moneyin - $amount;
    echo'<tr><td></td><td></td><td></td><td></td><td></td><td>Total</td><td>' . number_format($amount, 2) . '</td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td>Bal</td><td>' . number_format($bal, 2) . '</td></tr>
</tbody>
</table></div>';
}

function viewTransactionToedit() {
    echo'<table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead><tr></tr>
<tr><th>Account Name  </th><th>Transname </th><th>Ammount</th><th>Edit  </th><th>Delete  </th>  </tr>
<thead><tbody>';
    // 		account 	amount
    $stmt = mysql_query("SELECT *FROM     vehicleaccount        ");  //  WHERE date='".base64_encode(date('d-M-Y',$s))."'

    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getGlname(base64_decode($row['glacc'])) . ' </td><td>' . (base64_decode($row['account'])) . ' </td>    <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";

        echo '<td> <a onClick="' . $confirmedit . '"  href = "createInvoiceAcc.php?vaid=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';

        echo'<td> <a onClick="' . $confirmdelete . '"  href = "createInvoiceAcc.php?vadel=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }
    echo'</tbody>
</table>';
}

function vehiclePaymentInvoice() {
    echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body">
        <div class="form-group">
 <label class="control-label">Payee Name </label>
 <input type="text" name="payee" placeholder="Enter Payee Name"  title="Enter Payee Name"  class="input-medium form-control" required >
 </div>
         <div class="form-group">
        <label class="control-label">Select Account  </label>
        <select  class="input-medium form-control" name="acc" required placeholder="Select Account" title="Select Account" >
        <option> </option>';
    $stmt = mysql_query("SELECT * FROM  vehicleaccount  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo' <option value="' . $row['id'] . '">' . base64_decode($row['account']) . ' </option>';
    }
    echo'</select>
</div>

        <div class="form-group">
        <label class="control-label">Select Vehicle  </label>
        <select  class="input-medium form-control" required name="vid" placeholder="Select Vehicle" title="Select Vehicle" >
        <option> </option>'; //WHERE status='" . base64_encode('active') . "'
    $sth = mysql_query("SELECT * FROM   vehicleinvoice      GROUP BY vid ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo' <option value="' . base64_decode($row1['vid']) . '">' . strtoupper(vehicleName(base64_decode($row1['vid']))) . ' </option>';
    }
    echo'</select>
</div>

<div class="form-group">
 <label class="control-label">Date  </label>
 <input type="text" name="date" placeholder="Enter Date" required  title="Enter Date"  class="date-picker input-medium form-control" data-date-format="dd-M-yyyy" >
 </div>
 <div class="form-group">
 <label class="control-label">Amount  </label>
 <input type="number" name="amount" placeholder="Enter Amount"  title="Enter Amount"  class="input-medium form-control" required >
 </div>

  
<input type="submit" name="payinvoice" value="Pay Invoice" class="btn green">
</div></form>';
}

function selectInvoice() {
    echo'<form method="post"  action=""   class="form-horizontal"  >
        <div class="form-body"> 
             <div class="form-group">
        <label class="control-label">Select Account  </label>
        <select  class="input-medium form-control" name="acc" required placeholder="Select Account" title="Select Account" >
        <option> </option>';
    $stmt = mysql_query("SELECT * FROM   vehicleinvoice  GROUP BY acc");
    while ($row = mysql_fetch_array($stmt)) {
        echo' <option value="' . ($row['acc']) . '">' . getInvoAcc(base64_decode($row['acc'])) . ' </option>';
    }
    echo'</select>
</div>        <div class="form-group">
        <label class="control-label">Select Vehicle  </label>
        <select  class="input-medium form-control" required name="vid" placeholder="Select Vehicle" title="Select Vehicle" >
        <option> </option>';
    $sth = mysql_query("SELECT * FROM  vehicleinvoice  GROUP BY vid   ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo' <option value="' . ($row1['vid']) . '">' . vehicleName(base64_decode($row1['vid'])) . ' </option>';
    }
    echo'</select>
</div>
<input type="submit" class="btn green" name="generate" value="generate">
</div></form>';
}

function editVehiclePayment() {
    echo'<table id="sample_2" aria-describedby="sample_1_info" class="table table-striped table-bordered table-hover dataTable" >
<thead><tr></tr>
<tr><th>Account  </th><th>Vehicle Owner </th><th>Payee</th><th>Vehicle Name </th><th>Amount </th><th>Date  </th> <th>Edit</th><th>Delete  </th> </tr>
<thead><tbody>';
    // 	acc 	mno 	payee 	vid 	amount 	date
    $stmt = mysql_query("SELECT *FROM    vehicleinvoicepayment        ");  //  WHERE date='".base64_encode(date('d-M-Y',$s))."'

    while ($row = mysql_fetch_array($stmt)) {
        echo'<tr><td>' . getInvoAcc(base64_decode($row['acc'])) . ' </td><td>' . getMembername(($row['mno'])) . ' </td> <td>' . (base64_decode($row['payee'])) . ' </td><td>' . vehicleName(base64_decode($row['vid'])) . ' </td>   <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td><td>' . base64_decode($row['date']) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";

        echo '<td> <a onClick="' . $confirmedit . '"  href = "invoiceVhPaymentEdit.php?invid=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';

        echo'<td> <a onClick="' . $confirmdelete . '"  href = "invoiceVhPaymentEdit.php?invdel=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
    }
    echo'</tbody>
</table>';
}

function applyAdvanxTax() {
    echo'<form action="" method="post">
    <div class="form-body">
    <div class="form-group">
<label>Search Member No. or Name</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>


<div class="form-group" id = "txtHint">

<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['mname'] . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>

<div class="form-group">
<label>Amount</label>
<input type="number"  step="0.001" name="" class="form-control  input-medium" placeholder="Enter Amount"   title="Enter Amount"/ >
</div>

<input type="submit" name="apply"  value="Apply Loan"   class="btn green" />';
}

function loanInsurance() {
    echo'<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled" >
<thead>
<tr><th>Member Number </th><th>Member Name </th><th>Loan Name</th><th>Date </th><th>Amount </th></tr></thead><tbody>';

    $stmt = mysql_query("SELECT *FROM    loaninsurance    ");

    while ($row = mysql_fetch_array($stmt)) {
        if (loanname(($row['tid'])) != null) {
            echo'<tr><td>' . (base64_decode($row['mno'])) . ' </td><td>' . getMembername(($row['mno'])) . ' </td> <td>' . loanname(($row['tid'])) . ' </td><td>' . base64_decode($row['date']) . '</td>  <td>' . getsymbol() . ' ' . number_format(base64_decode($row['amount']), 2) . ' </td></tr>';
            $total+=base64_decode($row['amount']);
        }
    }
    echo'<tr><td colspan="3"></td><td>Total</td><td>' . getsymbol() . ' ' . number_format($total, 2) . '</td></tr>';
    echo'</tbody>
</table>';
}

function receipt($user, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $session, $date) {
    //receipt($this->_user, base64_decode($mno), vehicleName(base64_decode($vid)), '$tid', base64_decode($mno), getMembername($mno), base64_decode($acc), 'cash', base64_decode($amount), base64_decode($date), base64_decode($date), $_SESSION['session'], base64_decode($date));
    $id = "javascript:Print('stylized')";

    $receipt .='<div style="width:100%; margin:0 auto;>    
<body onload = "' . $id . '">
<div id = "stylized">
<table id="sample_2" aria-describedby = "sample_2_info" width = "100%" style="font-family: Lucida Sans Typewriter;color:black;">'
            . $dub .
            '<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan="2"><center>
<div class="art-layout-cell" style="width: 80%" >
<img src="photos/' . logo() . '" width="70px" height="80px"/>
</div></center>
</td>
</tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;">
<td colspan = "2"><center><b>' . compname() . '</b></center>
</td>
</tr>

<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center><b>' . address() . '  |  Mobile No. ' . mobile() . '</b></center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center><b>' . email() . '</b></center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center>' . $date . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td colspan = "2"><center> ' . $tname . ' Contribution Receipt No.' . $payeeid . '</center></td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">T. code:</td><td class="style">' . $tid . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">Payee:</td><td class="style">' . $payee . '</td></tr>
    <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">Vehicle Reg No:</td><td class="style">' . $vreg . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">M.No.:</td><td class="style">' . $mno . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td class="style">M.Name:</td><td class="style">' . $payee . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class="style">Transaction</th><th class="style">Amount</th></tr>';


    $receipt .='<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><th class="style">Total</th><td class="style">' . getsymbol() . '.' . number_format($amount, 2) . '</td></tr>
<tr style="font-variant:small-caps;font-style:normal;color:black;font-size:12px;"><td><center>You were served by:' . servedby($user) . '</center> </td><td><center>   Printed Date And Time ' . date("d-M-Y h:i:sa") . '</center></td></tr>
</div></table>
</div><input   class="form-control input-medium" type = "submit" name = "btnPrint" value = "print" asp:Button ID = "btnPrint" runat = "server" onclick = "' . $id . '"/></body></div>';
    echo $receipt;

    $mnd = mysql_query('select * from membercontribution where session = "' . $session . '"') or die(mysql_error());
    $mnr = mysql_fetch_array($mnd);
    $sms = 'Dear ' . getMembername($mnr['memberno']) . ', we have received ' . getsymbol() . ' ' . number_format($amount, 2) . ' into  your ' . getglacc($tname) . ' RecNo: ' . $tid . '. ' . compname() . ' Thank You.';
    $ms = SendSMS("127.0.0.1", "8800", "esacco", "esacco", phonenumber($mno), $sms);
    if ($ms) {
        echo '<span class = "green">Sms sent successfully</span></br>';
    } else {
        echo '<span class = "red">Sms sending failed</span></br>';
    }

    unset($_SESSION['session']);
    session_regenerate_id();
    echo'<a button class="btn green" href="contribution.php">Back</a Button>';
}

function editPaymentMode() {
    echo'<table id="sample_2"  class="table table-striped table-bordered table-hover sorting_asc_disabled" >
<thead>
<tr><th>Mode </th><th>Status </th><th>Edit</th><th>Delete</th></tr></thead><tbody>';
//mode 	status
    $stmt = mysql_query("SELECT *FROM   paymentmode   ");

    while ($row = mysql_fetch_array($stmt)) {
        $dd = base64_decode($row['date']);
        $qtime = strtotime($dd);
        $dd1 = date("Y-m-d", $qtime);

//date range difference
        $now = time(); // or your date as well
        $your_date = strtotime($dd1);
        $datediff = $now - $your_date;
        $editday = floor($datediff / (60 * 60 * 24));

        $person = "SELECT * FROM settings";
        $query = mysql_query($person);
        if (mysql_num_rows($query) == 1) {
            $row1 = mysql_fetch_array($query);
            $num = base64_decode($row1['days']);
        }

        echo'<tr><td>' . (base64_decode($row['mode'])) . ' </td><td>' . base64_decode($row['status']) . '</td>';
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        $confirmdelete = "return confirm('Are you sure you want to Delete?');";
        if ($num > $editday) {

            echo '<td> <a onClick="' . $confirmedit . '"  href = "paymode.php?modid=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>';
        } else {
            echo'<td class = "style" style="font-size:11px; color:red;"> Edit period is over </td>';
        }

        if ($num > $editday) {
            echo'<td> <a onClick="' . $confirmdelete . '"  href = "paymode.php?model=' . $row['id'] . '"><img src = "images/delete.png"></a></td></tr>';
        } else {
            echo'<td class = "style" style="font-size:11px; color:red;"> Delete period is over </td></tr>';
        }
    }

    echo'</tbody>
</table>';
}

function editpaymode($id) {
    $sth = mysql_query("SELECT *  FROM   paymentmode      WHERE  id='$id'");
    while ($row = mysql_fetch_assoc($sth)) {
        echo'<form method="post" class="form-horizontal" action="" id="form47">
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Enter Mode Of Payment</label>
<div class="col-md-4">
<input type="hidden"  value="' . $id . '"  name="id">
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" type="text" value="' . base64_decode($row['mode']) . '" title="Enter Mode Of Payment" placeholder="Enter Mode Of Payment" required class="form-control input-inline input-medium" size="50" name="mode">
</div>
</div>
<div class="form-group">
<label class="col-md-3   control-label">Select Status</label>
<div class="col-md-4">
<select required title="Select Status" placeholder="Select Status" title="Select Status" class="form-control input-inline input-medium" name="status">
<option></option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
</div>
</div>
<div class="col-md-4 col-md-offset-3">

<div class="col-md-offset-3 col-md-6">
<input type="submit" class="btn btn-success" name="update" value="Update">
</div> </div>

</div>
</form> ';
    }
}

function editOrganisation() {
    echo '<table id="sample_2" aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead> <th>Organisation</th><th>Status</th><th>Edit</th><th>Delete</th>  </thead><tbody>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";
    $confirmdelete = "return confirm('Are you sure you want to Delete?');";
    $sth = mysql_query("SELECT *  FROM   organisation    ");
    while ($row = mysql_fetch_assoc($sth)) {
        echo'<td>' . base64_decode($row['organisation']) . '</td>' .
        '<td>' . base64_decode($row['status']) . '</td>
   <td> <a onClick="' . $confirmedit . '" href = "addorg.php?orged=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>
<td> <a onClick="' . $confirmdelete . '" href = "addorg.php?orgdel=' . $row['id'] . '" ><img src = "images/delete.png"></a></td>
</tr>';
    }
    echo'</tbody></table>';
}

function addOrganisationForm($edit) {
    $sth = mysql_query("SELECT *  FROM   organisation WHERE  id='" . $edit . "'    ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<form action="" method="post" class="form-horizontal" >
        <div class="form-body">
        <div class="form-group">
        <label>Organisation Name</label>
        <input type="hidden" name="id"  value="' . $edit . '" class="input-medium  form-control" />
    <input type="text" name="org"  value="' . base64_decode($row['organisation']) . '" class="input-medium  form-control" />
        </div>
         <div class="form-group">
        <label>Select Status</label> 
    <select type="text" name="status" data-placeholder="Select Status"  value="' . base64_decode($row['status']) . '" class="input-medium  form-control select2me" />
        <option></option>
       <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        </select>
        </div>
    <input type="submit"  name="update" value="Update" class="btn green">
    </div>
     </form>';
    }
}

function addOrg() {
    echo'<form action="" method="post" class="form-horizontal" >
       <div class="form-body">
        <div class="form-group">
       
        <label>Organisation Name</label>
    <input type="text" name="org" required placeholder="Enter Organisation Name"  title="Enter Organisation Name" class="input-medium form-control" />
    </div>
   
    
        <div class="form-group">
         <label>Status</label><br />
    <select type="text" name="status" title="Select Status" data-placeholder="Select Status"  class="input-medium form-control select2me" />
        <option></option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        </select>
        </div>
    <input type="submit"  name="addorg" value="Add Organisation" class="btn green">
  </div>
     </form><form>
     <input type="submit" name="edit" value="Edit" class="btn green">
     </form>';
}

function editPage() {
    $stl = mysql_query("SELECT * FROM  pages");

    echo'<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
<thead><tr><th>Page URL</th><th>Name</th><th>Menu</th><th>Edit</th></tr></thead><tbody>';
    $confirmedit = "return confirm('Are you sure you want to edit?');";

    while ($pages = mysql_fetch_assoc($stl)) {
        echo '<tr><td>' . base64_decode($pages['url']) . '</td>
        <td>' . base64_decode($pages['name']) . '</td><td>' . base64_decode($pages['menu']) . '</td>
     <td> <a onClick="' . $confirmedit . '" href="pages.php?edid=' . $pages['id'] . '"><img src = "images/edit.png"></a></td></tr>';
    }
    echo'</tbody></table>';
}

function editPageForm($id) {

    $stl = mysql_query("SELECT * FROM  pages   WHERE id='$id' ");
    while ($row = mysql_fetch_assoc($stl)) {
        echo'<form action="" method="post" class="form-horizontal" >
       <div class="form-body">
        <div class="form-group">
       
        <label>Page Url</label>
        <input type="hidden" name="id"  value="' . ($id) . '" class="input-medium form-control" />
    <input type="text" name="url"  value="' . base64_decode($row['url']) . '" class="input-medium form-control" />
    </div></div>
    <div class="form-group">
       
        <label>Page Url</label>
    <input type="text" name="name"  value="' . base64_decode($row['name']) . '" class="input-medium form-control" />
    </div>
    <div class="form-group">
       
        <label>Page Url</label>
    <input type="text" name="menu"  value="' . base64_decode($row['menu']) . '" class="input-medium form-control" />
    </div>
    <div class="form-group">
    <select type="text" name="status"  value="' . base64_decode($row['status']) . '" class="input-medium form-control" />
        <option></option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
                 </select>
                 </div>
                    <input type="submit" name="update"  value="Update Page"  class="btn green" /></div></form>';
    }
}

function getMnth() {

    $stl = mysql_query("SELECT * FROM  audit    WHERE   date='" . $date . "'   ");
    while ($row = mysql_fetch_array($stl)) {
        
    }
}

function createAddressBook() {
    echo'<form action="" method="post">
<table class="table table-striped table-hover table-bordered">
 <tr><td></td><td><input type="submit" class="btn green" name="addBook" value="Save"></td></tr>
 <tr><td><select name="source" onchange="showUser(this.value)" class="form-control"><option>Select Source</option>
 <option value="1">Loans</option>
 <option value="2">Guarantors</option>
 <option value="3">loan Defaulters</option>
<option value="4">Guarantors Of Defaulters</option>
<option value="5">All Members</option>
</select></td><td>
<input type="text" name="name" size="20" class="form-control" autofocus="true" placeholder="Enter adressbooks name">
</td></tr></table>
<div id="txtHint" style="height: 340px; overflow-y: scroll;" class="portlet-body form">
<table class="table table-striped table-hover table-bordered contact">
 <tr><th style="border: none;">Add Contact</th>
<th></th><th></th></tr><tr><th style="with:5px">Phone Number</th><th>Members Name</th>
<th>Members Number</th></tr></table></div></form> ';
}

function getAddressFromDefaulters() {
    echo'<div class="form-body">
 <form method="post" action="">
<div class="form-body">
<div class="form-group">
<table class="table table-bordered" style="border: none;">
<tr><td style="border-right: none">
<input type="text" style="width:200px" onkeyup="showHint(this.value)" class="form-control" placeholder="Defaulted Amount">
</td><td style="border-left: none; border-right: none">
<input type="text" name="name" style="width:250px" placeholder="Address book name" class="form-control"></td>
<td style="border-left: none"> 
 <input style="float: right" type="submit" class="btn green" name="save" value="Save">
</td></tr>
</table>
<div id="txtHint" style="height: 300px; overflow-y: scroll;" class="portlet-body form">
<table class="table table-striped table-hover table-bordered contact">
<tr><th style="border: none;">Add Contact</th>
<th style="border: none"></th>
<th style="border: none;">
</th></tr><tr>
<th style="with:5px">Phone Number</th><th>Members Name</th><th>Members Number</th></tr></table> 
</div> <!-- END FORM-->
</div>
</div>
</form>
<!-- END EXTRAS PORTLET-->
</div>';
}

function member_category() {
    echo'<form action="" method="post" class="form-horizontal" >
       <div class="form-body">
        <div class="form-group">
       
        <label>Prefix</label>
    <input type="text" name="prefix" required placeholder="Enter prefix"  title="Enter Prefix" class="input-medium form-control" />
  
    <label>Category Name</label>
    <input type="text" name="category" required placeholder="Enter Category Name"  title="Enter Category Name" class="input-medium form-control" />
    </div>
      </div>
     <input type="submit" name="btnadd" value="Add" class="btn green">
     </form>';
}

function member_title() {
    echo'<form action="" method="post" class="form-horizontal" >
       <div class="form-body">
        <div class="form-group">
       
        <label>Title</label>
    <input type="text" name="title" required placeholder="Enter title"  title="Enter tile" class="input-medium form-control" />
  
      </div>
     <input type="submit" name="btnadd" value="Add" class="btn green">
     </form>';
}

function bank_detail() {
    echo'<div class="row">
       <div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Add Banks
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Bank Name</label>
										<input type="text" class="input-medium form-control" name="bank_name" placeholder="Enter bank name">
										
									</div>
									
								</div>
								<div class="form-actions">
									<button type="submit" name="btnaddbank" class="btn green">Submit</button>
								</div>
							</form>
						</div>
					</div>
              
</div>
<div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Banks
							</div>
							
						</div>
						<div class="portlet-body form">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									Id
								</th>
								<th>
									 Name
								</th>';
                                                            $write = check_write_permission();
                                                            //echo $level;
                                                            if($write == 1){//display IFF the logged in user has write permission
								echo '<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>';
                                                            }
							echo '</tr>
							</thead>
							<tbody>';


    $stmt = mysql_query('SELECT * FROM member_banks');

    while ($banks = mysql_fetch_array($stmt)) {
        echo '<tr>
								<td >'
        . ($banks['id']) .
        '</td>
								<td >'
        . base64_decode($banks['bank_name']) .
        '</td>';
                                                                $write = check_write_permission();
                                                                if($write == 1){//display only if the user has write permissions on this page
                                                                echo '<td><form acton="" method="POST">
                                                                <input type="hidden" name="ID" value="' . $banks['id'] . '" />
                                                <input type="hidden" name="bnkname" value="' . base64_decode($banks['bank_name']) . '" />
			<input type="submit" class="btn green" name="btneditbank" value="' . Edit . '" />
                                                                            </form></td>';
                                                                }
                                                                if($write == 1){//display only if the user has write permissions on this page
                                                                    echo '<td><form acton="" method="POST">
                                                                <input type="hidden" name="theId" value="' . $banks['id'] . '" />
                                                
			<input type="submit" class="btn red" name="btndeletebank" value="' . Delete . '" />
                                                                            </form></td>';
                                                                }
								echo '</tr>';
    }

    echo'</tbody>
							</table>		


						</div>
					</div>
              
</div>
    </div>';
}

function bankBraches() {
    echo'<div class="row">
       <div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Bank Branches
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="" method="POST">
								<div class="form-body">
                                             <div class="form-group">
                                             <label>Bank Name  </label><br />
<select id= "bankID"  class="form-control input-medium select2me" type = "text"  name = "bankID"  title = "Enter bank name" data-placeholder = "Enter bank name"/>
<option></option>';
    $qrybn = mysql_query("SELECT  *  FROM  member_banks  where status='" . base64_encode('active') . "'");
    while ($rowbn = mysql_fetch_array($qrybn)) {
        echo'<option value="' . $rowbn['id'] . '">' . base64_decode($rowbn['bank_name']) . '</option>';
    }
    echo'</select>
                                             
</div>                   
									<div class="form-group">
										<label>Branch Name</label>
										<input type="text" name="branch" required placeholder="Enter branch"  title="Enter branch" class="input-medium form-control" />
										
									</div>
									
								</div>
								<div class="form-actions">
									<button type="submit" name="btnaddbranch" class="btn green">Submit</button>
								</div>
							</form>
						</div>
					</div>
              
</div>
<div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Bank Branches
							</div>
							
						</div>
						<div class="portlet-body form">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									Id
								</th>
								<th>
									Bank Name
								</th>
                                                               <th>
									Branch Name
								</th>';
                                                                $write = check_write_permission();
                                                                if($write == 1){
								echo '<th>
									 Edit
								</th>
								<th>
									 delete
								</th>';
                                                                }
							echo '</tr>
							</thead>
							<tbody>';


    $stmtbr = mysql_query('SELECT * FROM memberbank_branches where status="' . base64_encode('active') . '"');

    while ($brnch = mysql_fetch_array($stmtbr)) {
        echo '<tr>
								<td >'
        . ($brnch['id']) .
        '</td>
                                                                    <td >'
        . getMemberBankName(base64_decode($brnch['bank_id'])) .
        '</td>
								<td >'
        . base64_decode($brnch['branch_name']) .
        '</td>';
								if($write == 1){
								echo '<td>
                                                                    <form acton="" method="POST">
                                                                <input type="hidden" name="ID" value="' . $brnch['id'] . '" />
                                                                    <input type="hidden" name="bankid" value="' . base64_decode($brnch['bank_id']) . '" />
                                                <input type="hidden" name="brachname" value="' . base64_decode($brnch['branch_name']) . '" />
			<input type="submit" class="btn green" name="btneditbranch" value="' . Edit . '" />
                                                                            </form>
								</td>
								<td>
                                                                <form acton="" method="POST">
                                                                <input type="hidden" name="theId" value="' . $brnch['id'] . '" />
                                                                   
			<input type="submit" class="btn red" name="btndeletebranch" value="' . Delete . '" />
                                                                            </form>
								</td>';
                                                                }
                                                            echo '</tr>';
    }

    echo'</tbody>
							</table>		


						</div>
					</div>
              
</div>
    </div>';
}

function editBankBranches($ID, $bnkid, $braname) {

    echo'<div class="row">
       <div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Edit Branches
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="" method="POST">
								<div class="form-body">
                                             <div class="form-group">
                                             <label>Bank Name  </label><br />
<select id= "bankID"  class="form-control input-medium select2me" type = "text"  name = "bankID"  title = "Enter bank name" data-placeholder = "Enter bank name"/>';
    $qrybn = mysql_query("SELECT  *  FROM  member_banks  where id='" . $bnkid . "' and status='" . base64_encode('active') . "'");
    while ($rowbn = mysql_fetch_array($qrybn)) {
        echo'<option value="' . $rowbn['id'] . '">' . base64_decode($rowbn['bank_name']) . '</option>';
    }
    $qrybn1 = mysql_query("SELECT  *  FROM  member_banks  where status='" . base64_encode('active') . "'");
    while ($rowbn1 = mysql_fetch_array($qrybn1)) {
        echo'<option value="' . $rowbn1['id'] . '">' . base64_decode($rowbn1['bank_name']) . '</option>';
    }
    echo'</select>
                                             
</div>                   
									<div class="form-group">
										<label>Branch Name</label>
                                                                                <input type="hidden" name="theid" value="' . $ID . '" />
										<input type="text" name="branch" value="' . $braname . '" required placeholder="Enter branch"  title="Enter branch" class="input-medium form-control" />
										
									</div>
									
								</div>
								<div class="form-actions">
									<button type="submit" name="btnupdatebranch" class="btn green">Update</button>
								</div>
							</form>
						</div>
					</div>
              
</div>
<div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Edit BAnks
							</div>
							
						</div>
						<div class="portlet-body form">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									Id
								</th>
								<th>
									Bank Name
								</th>
                                                               <th>
									Branch Name
								</th>
								<th>
									 Edit
								</th>
								<th>
                                                                Delete
                                                                </th>
							</tr>
							</thead>
							<tbody>';


    $stmtbr = mysql_query('SELECT * FROM memberbank_branches where status="' . base64_encode('active') . '"');

    while ($brnch = mysql_fetch_array($stmtbr)) {
        echo '<tr>
								<td >'
        . ($brnch['id']) .
        '</td>
                                                                    <td >'
        . getMemberBankName(base64_decode($brnch['bank_id'])) .
        '</td>
								<td >'
        . base64_decode($brnch['branch_name']) .
        '</td>
								
								<td>
                                                                <form acton="" method="POST">
                                                                <input type="hidden" name="ID" value="' . $brnch['id'] . '" />
                                                                    <inpu type="hidden" name="bankid" value="' . $brnch['bank_id'] . '" />
                                                <input type="hidden" name="brachname" value="' . base64_decode($brnch['bank_name']) . '" />
			<input type="submit" class="btn green" name="btneditbranch" value="' . Edit . '" />
                                                                            </form>
								</td>
								<td>
                                                                <form acton="" method="POST">
                                                                <input type="hidden" name="theId" value="' . $brnch['id'] . '" />
                                                                   
			<input type="submit" class="btn red" name="btndeletebranch" value="' . Delete . '" />
                                                                            </form>
								</td>
                                                            </tr>';
    }

    echo'</tbody>
							</table>		


						</div>
					</div>
              
</div>
    </div>';
}

function editMemberBanks($id, $bnkname) {
    echo'<div class="row">
       <div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Update Banks
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Bank Name</label>
                                                                                <input type="hidden" name="theid" value="' . $id . '" />
										<input type="text" class="input-medium form-control" value="' . $bnkname . '" name="bank_name" placeholder="Enter bank name">
										
									</div>
									
								</div>
								<div class="form-actions">
									<button type="submit" name="btnupdatebank" class="btn green">Update</button>
								</div>
							</form>
						</div>
					</div>
              
</div>
<div class="col-md-6 ">
<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Edit BAnks
							</div>
							
						</div>
						<div class="portlet-body form">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									Id
								</th>
								<th>
									 Name
								</th>
                                                               
								<th>
									 Edit
								</th>
								<th>Delete</th>
							</tr>
							</thead>
							<tbody>';


    $stmt = mysql_query('SELECT * FROM member_banks');

    while ($banks = mysql_fetch_array($stmt)) {
        echo '<tr>
								<td >'
        . ($banks['id']) .
        '</td>
								<td >'
        . base64_decode($banks['bank_name']) .
        '</td>
								
								<td>
                                                                <form acton="" method="POST">
                                                                <input type="hidden" name="ID" value="' . $banks['id'] . '" />
                                                <input type="hidden" name="bnkname" value="' . base64_decode($banks['bank_name']) . '" />
			<input type="submit" class="btn green" name="btneditbank" value="' . Edit . '" />
                                                                            </form>
								</td>
								<td>
                                                                <form acton="" method="POST">
                                                                <input type="hidden" name="theId" value="' . $banks['id'] . '" />
                                                
			<input type="submit" class="btn red" name="btndeletebank" value="' . Delete . '" />
                                                                            </form>
								</td>
                                                            </tr>';
    }

    echo'</tbody>
							</table>		


						</div>
					</div>
              
</div>
    </div>';
}

function reg_fee($datefrom, $dateto) {
    $totalamount = 0;
    echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover">
<thead><tr><th colspan="6"><h3 align="center"><b> Registration Fee Report  From ' . $datefrom . '  To  ' . $dateto . ' </b></h3></th></tr>
<tr><th>Member Number</th><th> Member Name</th><th> Amount</th><th>Date</th> </tr></thead><tbody>';

    $s = strtotime($datefrom);

    $t = strtotime($dateto);


    $stmt = mysql_query("SELECT * FROM  paymentin   WHERE    date  BETWEEN '" . base64_encode($s) . "'     AND   '" . base64_encode($t) . "' and transname='" . base64_encode('68') . "'  ");

    while ($row = mysql_fetch_array($stmt)) {

        echo'<tr><td>' . base64_decode($row['payeeid']) . '</td><td>' . getMembername($row['payeeid']) . '</td><td>' . (base64_decode($row['amount'])) . '</td><td>' . date('d-M-Y', base64_decode($row['date'])) . '</td></tr>';
        $totalamount += base64_decode($row['amount']);
    }
    echo'<tr><td colspan="2" align="right">Total</td><td>' . getsymbol() . ' ' . number_format($totalamount, 2) . '</td></tr>
 </tbody></table>';
}

function registerAgents() {
    echo'<form action=""  name=""  method="post">
    <div class="form-body">
   <div class="form-group"> 
    <label>Fname</label>
    <input name="fname" required placeholder="Enter First Name" title="Enter First Name" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Mname</label>
    <input name="mname"  placeholder="Enter Middle Name" title="Enter Middle Name" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Lname</label>
    <input name="lname" required placeholder="Enter Last Name" title="Enter Last Name" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>ID Number</label>
    <input name="idno" required placeholder="Enter ID Number " title="Enter ID Number" class="form-control  input-medium">
    </div>
         
<div class="form-group">
    <label>Email</label>
    <input name="email" required placeholder="Enter Email " title="Enter Email"  class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Contact</label>
    <input name="contact" required placeholder="Enter Contact " title="Enter Contact"  class="form-control  input-medium">
    </div>

<input name="RegisterAgents"  value="Register Agents" type="submit" class="btn green">
</div>
    </form>';
    $write = check_write_permission();
    if($write == 1){//if has write (edit) permission
        echo '<a href="registerAgents.php?edit" class="btn green"/>Edit Agents</a>';
    }
}

function editAgents() {
    echo'<table class="table table-striped table-hover table-bordered">
     <thead><tr> <th>F Name</th><th>M Name</th><th>L Name</th><th>IDNO</th> <th>Email</th><th>Contact</th><td>Edit</td></tr></thead><tbody>';
    $con = "return confirm('Are you sure you want to Edit?');";
    $sth = mysql_query("SELECT * FROM  registeragents");
    while ($row = mysql_fetch_array($sth)) {
        echo'<tr><td>' . base64_decode($row['fname']) . '</td><td>' . base64_decode($row['mname']) . '</td><td>' . base64_decode($row['lname']) . '</td><td>' . base64_decode($row['idno']) . '</td><td>' . base64_decode($row['email']) . '</td><td>' . base64_decode($row['contact']) . '</td> <td> <a onClick="' . $con . '"  href = "registerAgents.php?edi=' . $row['id'] . '"><img src = "images/edit.png"> </a></td>  </tr>';
    }
    echo'</tbody><table>';
}

function editAgentsForm($id) {
    $sth = mysql_query("SELECT  *  FROM   registeragents  WHERE  id='$id'  ");

    while ($row = mysql_fetch_array($sth)) {


        echo'<form action=""  name=""  method="post">
        <input type="hidden" name="id" required  value="' . $id . '" class="form-control  input-medium">
    
    <div class="form-body">
   <div class="form-group"> 
    <label>Fname</label>
    <input name="fname" required placeholder="Enter First Name" title="Enter First Name" value="' . base64_decode($row['fname']) . '" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Mname</label>
    <input name="mname"  placeholder="Enter Middle Name" title="Enter Middle Name" value="' . base64_decode($row['mname']) . '" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Lname</label>
    <input name="lname" required placeholder="Enter Last Name" title="Enter Last Name" value="' . base64_decode($row['lname']) . '" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>ID Number</label>
    <input name="idno" required placeholder="Enter ID Number " title="Enter ID Number" value="' . base64_decode($row['idno']) . '" class="form-control  input-medium">
    </div>
         
<div class="form-group">
    <label>Email</label>
    <input name="email" required placeholder="Enter Email " title="Enter Email" value="' . base64_decode($row['email']) . '" class="form-control  input-medium">
    </div>
    
<div class="form-group">
    <label>Contact</label>
    <input name="contact" required placeholder="Enter Contact " title="Enter Contact" value="' . base64_decode($row['contact']) . '" class="form-control  input-medium">
    </div>

<input name="Update"  value="Update Agents" type="submit" class="btn green">
</div>
    </form>';
    }
}

function referralPayment() {

    echo'<form action=""  name=""  method="post">
       
    <div class="form-body">
   <div class="form-group"> 
    <label>Fname</label>
    <input name="fname" required placeholder="Enter First Name" title="Enter First Name"  class="form-control  input-medium">
    </div>
    <div class="form-group"> 
    <label>Amount</label>
    <input name="fname" required placeholder="Enter Amount" title="Enter Amount"  class="form-control  input-medium">
    </div>

    <input type="submit" name="referral" class="btn green" value="Referral Payment "> 
    </div>';
}

//****************interest accrual reports ******************
function montlyaccruedsaving() {
    echo '
         <form class="form-inline" action = "" method = "post" >
        <div class="form-group">
<label >Select Account</label>
<select name="account_gl" class="form-control input-medium select2me" required title="Select accrual period" ><option></option>';

    $qryu = mysql_query("select * from interest_saving_setting ");
    while ($rowin = mysql_fetch_array($qryu)) {
        echo '<option value="' . base64_decode($rowin['default_accrued_account']) . '">' . getGlname(base64_decode($rowin['default_accrued_account'])) . '</option>';
    }
    echo' </select>
				
										
									</div>
<div class="form-group">
         <label> Date Range </label>
         </div>
								<div class="form-group">
										
									<div class="input-group input-large date-picker input-daterange"  data-date="10-Nov-2012" data-date-format="dd-M-yyyy">
<input type="text" required Title="Enter Date From" placeholder="Enter Date From" class="form-control" name="datefrom">
<span class="input-group-addon">to

</span><input type="text" required placeholder="Enter Date To" Title="Enter Date To" class="form-control" name="dateto">

</div>
								</div>
								<div class="form-group">
								
								<button class = "btn green" name ="btnpreview">Generate</button>
                                                                </div>
							</form>';
    if (isset($_POST['btnpreview'])) {
        echo '<div id="mt"><table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
   <thead> <tr><th colspan="3"><h3 align="center"><b><b> ' . $_POST['datefrom'] . ' To ' . $_POST['dateto'] . ' ' . getGlname($_POST['account_gl']) . '  </b></h3></th></tr>
   <tr><th>Member Number</th><th>Member Name</th><th> Interest</th></thead></tr>';

        $sum = 0;
        $inter = 0;
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];
        $start = new DateTime($datefrom);
        $end = new DateTime($dateto);
        $end->modify('+1 day');
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($start, $interval, $end);
        $con_gld = base64_encode($_POST['account_gl']);

        $myacs = mysql_query("select * from memberaccs where glaccid='" . getSavGlAccount($con_gld) . "' AND status='" . base64_encode('active') . "' ");
        while ($rowx = mysql_fetch_array($myacs)) {

            echo '    <tr>
                                                    <td>' . base64_decode($rowx['mno']) . '</td>
                                                    <td>' . getMembername($rowx['mno']) . '</td>';
            echo ' <td>KES.' . $accumeInte = GainedInterest($rowx['mno'], $daterange, $con_gld) . '</td>';
            echo '</tr>';

            $sum = $sum + $accumeInte;
        }


        echo '<tr><td colspan="1"></td><td>TOTAL</td><td>KES.' . number_format($sum, 2) . '</td></tr></table><div>';
        echo '<div class="col-md-4"><button  class="btn green"value="Print this page" onClick="return printResults()">Print</button></div>';
    }
}

function loanStatement($tid) {

    $no = 1;
    $det = mysql_query('select * from loanpayment where transid="' . $tid . '"  ') or die(mysql_error());

    while ($row = mysql_fetch_array($det)) {

        $loanAmount = totalloantakens($tid);

        $intPaiddd = $intPaiddd + intrestpaid($row['transid'], ($row['date']));
        $instalments = getPaymentInstal($tid);
        $mntlypayments = getMontlypayments($tid);
        $strtdate = getLoanStartdate($tid);
    }
    echo'<div id="table">
    <div class="col-mod-12">
       <h4 align="left"><b>' . getMembername(getmno($tid)) . '</b></h4>
    </div>';
    echo '<div class="row">
				<div class="col-md-6" >
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet">
						
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									
									<th colspan="2">
								Loan Summary	
									</th>
									
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
									Loan amount
									</td>
									<td>' . getsymbol() . ' ' . number_format($loanAmount, 2) . '</td>
									
								</tr>
								<tr>
									<td>
									Annual interest rate
									</td>
									<td>
                                                                        ' . getloanRate(loanname($tid)) . ' ' . "%" . '
										
									</td>
									
								</tr>
								
								<tr>
									<td>
									Start date of loan
									</td>
									<td>
									' . $strtdate . '	
									</td>
									
								</tr>
								
								
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
				<div class="col-md-6">
					<!-- BEGIN BORDERED TABLE PORTLET-->
					
						
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th colspan="2">
									Loan Summary	
									</th>
									
									
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										Schedule payment
									</td>
									<td>
									' . getsymbol() . ' ' . number_format($mntlypayments, 2) . '	
									</td>
								</tr><tr>
								<td >
									Schedule Number of payments
									</td>
									<td>
									' . $instalments . '	
									</td>
								</tr>
								<tr>
								<td >
									Total Interest
									</td>
									<td>
									' . getsymbol() . ' ' . number_format($intPaiddd, 2) . '	
									</td>
								</tr>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
				</div>
			</div>';

    echo'<table  class="table table-striped  table-bordered table-hover sorting_asc_disabled"><thead>
        
       


<tr><th>Pmt No.</th> <th>  Date</th>  <th> Beginning Bal</th> <th>Total Payment   </th> <th>Pricipal </th><th>Interest</th><th>Ending Bal </th><th> Cumulative Interest </th>           </tr></thead>';
    $stml = mysql_query('select * from loanpayment where transid="' . $tid . '"  ') or die(mysql_error());
    while ($row = mysql_fetch_array($stml)) {
        $loanType = (loantyper(base64_decode($tid)));
        
      $intPaid = intrestpaid($row['transid'], ($row['date']));
   
        if ($no == 1) {
            $cum = $intPaid;
        } else {
            $cum = $cum + $intPaid;
        }


        if ($loanType == "4") {

            /// loan with no interest

            $loanAmount = principalamount($tid) + $intPaiddd;
        } else {
            $loanAmount = totalloantakens($tid);
        }


        $totalAmoutPaid = totalAmoutPaid($row['transid'], $row['date']);




        if ($no == 1) {
            $newBeg = $loanAmount;
            $end = $newBeg - $totalAmoutPaid;
        } else {
            $newBeg = $end;
            $end = $newBeg - $totalAmoutPaid;
        }

        echo '<tr>   <td>' . $no . '</td>  <td>' . base64_decode($row['date']) . '</td>  
            
             <td>' . getsymbol() . ' ' . number_format($newBeg, 2) . '</td>
                 
<td>' . getsymbol() . ' ' . number_format($totalAmoutPaid, 2) . '</td>
                 
<td>' . getsymbol() . ' ' . number_format(round(base64_decode($row['amount'])), 2) . '</td>
            
                
           <td>' . getsymbol() . ' ' . number_format((round($intPaid)), 2) . '</td>
                     
             <td>' . getsymbol() . ' ' . number_format($end, 2) . '</td>
                 
                <td>' . getsymbol() . ' ' . number_format($cum, 2) . '</td> </tr>';


        $no++;
    }


    echo'</tbody></table>';
}

function extracostloansedit($user, $lid, $tid) {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b> Select Extra Cash To Edit </b></h3></th>   </tr>
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Extra Fee Type</th>
<th class="style"> Amount</th>
<th class="style">Action</th>';
$write = check_write_permission();
if($write == 1){//if has write permission-delete
    echo '<th class="style">Action</th>';
}
echo '</tr>
</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Edit This Extra Cash to this Loan?');";
    $confirmedit2 = "return confirm('Are you sure you want to Delete This Extra Cash to this Loan?');";

    $Rows = mysql_query("SELECT * FROM extracash where transactionid='" . $tid . "'");
    while ($Row = mysql_fetch_array($Rows)) {

        echo'
<tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getglacc(base64_decode($Row['efee'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(base64_decode($Row['amount'])) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="extracashedit.php?eelid=' . $Row['id'] . '"><img src="images/edit.png">Edit </a></td>';
        if($write == 1){//if has write permission-delete
echo '<td class="style"> <a onClick="' . $confirmedit2 . '" href="extracashedit.php?deelid=' . $Row['id'] . '"><img src="images/delete.png">Delete </a></td>';
    }
echo '</tr>';
    }
    echo '</table></div>';
}

function repoloans() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="6"> <h3 align="center"> <b> Select Loan to Clear Repossession </b></h3></th>   </tr>
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Loan Balance</th>
<th class="style">Action</th>
</tr>

</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Clear the Loan That Has Been Repossessed?');";

    $Rows = mysql_query("SELECT * FROM loanrepo where status='" . base64_encode('active') . "' order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(fullremainingloanreport($Row['transactionid'])) . '</td>
<td class="style"> <a onClick="' . $confirmedit . '" href="clearloanrepo.php?lid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '"><img src="images/dollars.png">Select </a></td>
</tr>';
        }
    }
    echo '</table></div>';
}

function interestform() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="7"> <h3 align="center"> <b> Select Loan to Waive or Freeze Interest </b></h3></th>   </tr>
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Loan Amount</th>
<th class="style">Total Interest</th>
<th class="style">Waive</th>
<th class="style">Freeze</th>
</tr>

</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Waive Interest to this Loan?');";
    $confirmedit2 = "return confirm('Are you sure you want to Freeze Interest to this Loan?');";
    $confirmedit3 = "return confirm('Are you sure you want to Un-Waive Interest to this Loan?');";
    $confirmedit4 = "return confirm('Are you sure you want to Un-Freeze Interest to this Loan?');";

    $Rows = mysql_query("SELECT * FROM loanapplication order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(base64_decode($lrstl['amount'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(totalloanint($Row['transactionid'])) . '</td>';

            if (interestwaivecheck($Row['transactionid']) == "true") {

                echo '<td class="style"> <a onClick="' . $confirmedit3 . '" href="interfreeze.php?uwid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/delete.png">Un-Waive Interest </a></td>';
            } else {

                echo '<td class="style"> <a onClick="' . $confirmedit . '" href="interfreeze.php?wid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/cash_register.png">Waive Interest </a></td>';
            }

            if (interestfreezecheck($Row['transactionid']) == "true") {

                echo '<td class="style"> <a onClick="' . $confirmedit2 . '" href="interfreeze.php?fid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/dollars.png">Freeze Interest </a></td>';
            } else {

                echo '<td class="style"> <a onClick="' . $confirmedit4 . '" href="interfreeze.php?ufid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/delete.png">Un-Freeze Interest </a></td>';
            }

            echo '</tr>';
        }
    }
    echo '</table></div>';
}

function writeform() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead  class="style">
<tr> <th colspan="7"> <h3 align="center"> <b> Select Loan to Write-Off </b></h3></th>   </tr>
<tr>
<th class="style">Member No.</th>
<th class="style">Member Name</th>
<th class="style">Loan Type</th>
<th class="style">Loan Amount</th>
<th class="style">Write-Off</th>
</tr>
</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Write-Off this Loan?');";
    $confirmedit1 = "return confirm('Are you sure you want to Cancel This Loan Write-Off?');";

    $Rows = mysql_query("SELECT * FROM loanapplication where status!='" . base64_encode('completed') . "' order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td class="style">' . base64_decode($Row['membernumber']) . '</td>
<td class="style">' . getMembername($Row['membernumber']) . '</td>
<td class="style">' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td class="style">' . getsymbol() . '' . number_format(base64_decode($lrstl['amount'])) . '</td>';

            if (loanwoffcheck($Row['transactionid']) == "true") {

                echo '<td class="style"> <a onClick="' . $confirmedit . '" href="loanwriteoff.php?wrid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/cash_register.png"> Write-Off Loan </a></td>';
            } else {

                echo '<td class="style"> <a onClick="' . $confirmedit1 . '" href="loanwriteoff.php?rwid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/delete.png"> Cancel Loan Write-Off </a></td>';
            }

            echo '</tr>';
        }
    }
    echo '</table></div>';
}

function loanrepoform() {
    echo '<div id="mt">
<table id="sample_2"  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
<thead>
<tr> <th colspan="6"> <h3 align="center"> <b> Select Loan to Repossess </b></h3></th>   </tr>
<tr><th>Member No.</th>  <th>Member Name</th>  <th>Loan Type</th>
<th>Loan Amount</th>   <th>Total Interest</th>   <th>Repossess</th></tr>

</thead>';
//to make pagination
    $confirmedit = "return confirm('Are you sure you want to Repossess this Loan?');";
    $confirmedit4 = "alert('Loan has already been Repossessed');";

    $Rows = mysql_query("SELECT * FROM loanapplication where status='" . base64_encode('active') . "' order by id ASC");
    while ($Row = mysql_fetch_array($Rows)) {
        $lqry = mysql_query('select * from loans where membernumber = "' . $Row['membernumber'] . '" and transid="' . $Row['transactionid'] . '"') or die(mysql_error());
        while ($lrstl = mysql_fetch_array($lqry)) {
            echo' <tr>
<td>' . base64_decode($Row['membernumber']) . '</td>
<td>' . getMembername($Row['membernumber']) . '</td>
<td>' . getloaname(base64_decode($Row['loantype'])) . '</td>
<td>' . getsymbol() . '' . number_format(base64_decode($lrstl['amount'])) . '</td>
<td>' . getsymbol() . '' . number_format(totalloanint($Row['transactionid'])) . '</td>';

            if (loanrepocheck($Row['transactionid']) == "true") {

                echo '<td> <a onClick="' . $confirmedit . '" href="loanrepo.php?fid=' . $Row['id'] . '&tid=' . $Row['transactionid'] . '&mno=' . $Row['membernumber'] . '"><img src="images/dollars.png"> Repossess Loan </a></td>';
            } else {

                echo '<td> <a onClick="' . $confirmedit4 . '"><img src="images/delete.png">Loan Repossessed </a></td>';
            }

            echo '</tr>';
        }
    }
    echo '</table></div>';
}

function extracashform($user, $id, $tid) {

    $sql = mysql_query('SELECT * FROM loanapplication WHERE id="' . $id . '"') or die(mysql_error());

    $rows = mysql_fetch_array($sql);

    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input   class="form-control input-medium"  type="hidden"  value="' . $id . '" name="id"  />
<input   class="form-control input-medium" type="hidden"  value="' . $tid . '" name="tid" autofocus required />
<input  class="form-control input-medium" type="hidden" value="' . getloanid(loanname($tid)) . '" name="loant" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " />

<label>Member Number</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($rows['membernumber']) . '" name="mno" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Member Name</label>
<input  class="form-control input-medium" type="text" value="' . getMembername($rows['membernumber']) . '" name="mname" readonly autofocus required placeholder="Enter Member Name" title="Enter Member Name" pattern="[a-zA-Z] {
3,
}"/>

<label>Transaction ID</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($tid) . '" name="tidd" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Loan Type</label>
<input  class="form-control input-medium" type="text" value="' . loanname($tid) . '" name="loan" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " />

<label>Select Fee to Add</label>
<select class="form-control input-medium" type="text" name="fee" autofocus required placeholder="Select Fee Type " title="Select Fee Type " />
<option value="68">Recovery Fee</option>
<option value="144">Extra Fee</option>
<option value="122">Processing Fee</option>
</select>    

<label>Amount</label>
<input  class="form-control input-medium" type="number" step="0.01" value="" name="amount" autofocus required placeholder="Enter Extra Fee Amount " title="Enter Extra Fee Amount " />

<br><br><button  class="btn green"  class="btn green" name="submit">Submit</button><br><br>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

function editextracashform($user, $id) {

    $sql = mysql_query('SELECT * FROM extracash WHERE id="' . $id . '"') or die(mysql_error());

    $rows = mysql_fetch_array($sql);

    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input class="form-control input-medium"  type="hidden"  value="' . $id . '" name="id"  />
<input class="form-control input-medium"  type="hidden"  value="' . base64_decode($rows['efee']) . '" name="efee"  />
<input class="form-control input-medium"  type="hidden"  value="' . ($rows['membernumber']) . '" name="mno"  />

<label>Member Number</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($rows['membernumber']) . '" name="mnoo" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Member Name</label>
<input  class="form-control input-medium" type="text" value="' . getMembername($rows['membernumber']) . '" name="mname" readonly autofocus required placeholder="Enter Member Name" title="Enter Member Name" pattern="[a-zA-Z] {
3,
}"/>

<label>Transaction ID</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($rows['transactionid']) . '" name="tid" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Loan Type</label>
<input  class="form-control input-medium" type="text" value="' . getglacc(base64_decode($rows['efee'])) . '" name="loan" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " />  

<label>Amount</label>
<input  class="form-control input-medium" type="number" step="0.01" value="' . base64_decode($rows['amount']) . '" name="amount" autofocus required placeholder="Enter Extra Fee Amount " title="Enter Extra Fee Amount " />

<br><br><button  class="btn green"  class="btn green" name="editsubmit">Submit</button><br><br>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

function clearloanrepoform($user, $id, $tid) {

    $sql = mysql_query('SELECT * FROM loanrepo WHERE id="' . $id . '"') or die(mysql_error());

    $rows = mysql_fetch_array($sql);

    echo '
<form action="" method="post" autocomplete="off">
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell" style="width: 50%" >
<div class="two">

<input   class="form-control input-medium"  type="hidden"  value="' . $id . '" name="id"  />
<input   class="form-control input-medium" type="hidden"  value="' . $tid . '" name="tid" autofocus required />
<input  class="form-control input-medium" type="hidden" value="' . getloanid(loanname($tid)) . '" name="loant" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " />

<label>Member Number</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($rows['membernumber']) . '" name="mno" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Member Name</label>
<input  class="form-control input-medium" type="text" value="' . getMembername($rows['membernumber']) . '" name="mname" readonly autofocus required placeholder="Enter Member Name" title="Enter Member Name" pattern="[a-zA-Z] {
3,
}"/>

<label>Transaction ID</label>
<input  class="form-control input-medium" type="text" value="' . base64_decode($tid) . '" name="tidd" autofocus required readonly placeholder="Enter Member Number " title="Enter Member Number " />

<label>Loan Type</label>
<input  class="form-control input-medium" type="text" value="' . loanname($tid) . '" name="loan" autofocus required readonly placeholder="Enter Loan Type " title="Enter Loan Type " /> 

<label>Amount</label>
<input  class="form-control input-medium" type="number" step="0.01" value="' . fullremainingloanreport($tid) . '" name="amount" autofocus required placeholder="Enter Extra Fee Amount " title="Enter Extra Fee Amount " />

<br><br><button  class="btn green"  class="btn green" name="submit">Submit</button><br><br>
</div>
</div>
<!--<div class="art-layout-cell" style="width: 50%" >
</div>-->
</div>
</div>
</form>';
}

//*****************fixed deposit settings form *************************
function fixed_depo_settings() {


    echo'

<div class="col-md-4 col-md-offset-1">
<form action="" method="post">
<div class="form-group">
<label>Account Name</label>
<input  type="text" name="actname"  class="form-control input-medium" placeholder="Enter Account Name" title="Account tile" required/>
</div>

<div class="form-group">
<label>Account Opening Fee</label>
<input  type="number" step="0.01" name="regfee"  class="form-control input-medium" placeholder="Account Opening fee" title="Account Opening fee" required/>
</div>

<div class="form-group">
<label>Account Closing Fee</label>
<input type="number" step="0.01" name="closefee"  class="form-control input-medium" placeholder="Account Closing fee" title="Account Closing fee" required>
</div>
<div class="form-group">
<label>Account Management Fee</label>
<input type="number" step="0.01" name="managefee"  class="form-control input-medium" placeholder="Enter Management Fee" title="Management Fee" required>
</div>
<div class="form-group">
<label>Management Fee Frequency</label><br/>
<select name="freq_manage" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';

    $qper = mysql_query("select * from periodictyrecord ");
    while ($rpe = mysql_fetch_array($qper)) {
        echo '<option value="' . $rpe['id'] . '">' . base64_decode($rpe['periodname']) . '</option>';
    }
    echo' </select></div>
          
          <div class="form-group">
<label>Management Fee Account</label><br/>
<select name="manageGl" class="form-control input-medium select2me" required title="Select management gl Account" >';

    $glqry1 = mysql_query('select * from glaccounts where accgroup="' . base64_encode('4') . '" AND  status="' . base64_encode('Active') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
<div class="form-group">
<label>Interest Rate % yearly</label>
<input type="number" step="0.01" name="interestRate"  class="form-control input-medium" placeholder="Enter Interest Rate" title="Interest Rate" required>
</div>
<div class="form-group">
<label>Penalty Rate % yearly</label>
<input type="number" step="0.01" name="penalty"  class="form-control input-medium" placeholder="Enter Penalty rate" title="Penalty rate" required>
</div>
</div>

<div class="col-md-4 col-md-offset-1">
 <div class="form-group">
<label>Account opening Fee GLAccount</label><br/>
<select name="accountfeeGl" class="form-control input-medium select2me" required title="Select account fee gl Account" >';

    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('4') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
    <div class="form-group">
<label >Default Accrued interest Account</label> <br />
										
<select name="interestGl" class="form-control input-medium select2me" required title="Select interest gl Account" >';

    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
		
<div class="form-group">
<label >Default member interest Account</label><br />
<select name="postglaccount" class="form-control input-medium select2me" required title="Select interest gl Account" >';

    $glqry1q = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1q = mysql_fetch_array($glqry1q)) {
        echo '<option value="' . $rowql1q['id'] . '">' . base64_decode($rowql1q['acname']) . '</option>';
    }
    echo' </select></div>

<div class="form-group">
<label>Minimun Account balance</label>
<input type="number" step="0.01" name="minbalance"  class="form-control input-medium" placeholder="Enter Minimum amount balance" title="minimum balance" required>
</div>
<div class="form-group">
<label>Maximum Account Balance</label>
<input type="number" step="0.01" name="maxbalance"  class="form-control input-medium" placeholder="Enter Maximum Account balance" title="Max balance" required>
</div>

<div class="form-group">
<label>Accrual Frequency </label><br/>
<select name="fre_accrual" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';

    $qperw = mysql_query("select * from periodictyrecord ");
    while ($rped = mysql_fetch_array($qperw)) {
        echo '<option value="' . $rped['id'] . '">' . base64_decode($rped['periodname']) . '</option>';
    }
    echo' </select>
       </div>
<div class="form-group">
<label>Posting Frequency</label><br/>
<select name="fre_posting" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';

    $qpers = mysql_query("select * from periodictyrecord ");
    while ($rpes = mysql_fetch_array($qpers)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    echo' </select></div></div>
  
<div class="form-actions">
        <div class="row">
                <div class="col-md-1 col-md-offset-2">
		<button type="submit" name="btnadd" class="btn green">Submit</button></form>
	</div>
		<div class="col-md-2">
	<form action="" method="post">	<button type="submit" name="btnview" class="btn green">Edit</button></form>
            </div>
	</div> </div> ';
}

//***************function to edit fixed deposit details*****************//
function ViewFixed_setting() {


    echo'<div class="table-scrollable" id="nt"><table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
      <tr>
      <th>Account Name  </th> <th> Opening Fee </th>
       <th> opening Fee GLAccount  </th>
      <th> Closing Fee </th>
      <th> Management Fee</th>   <th>Management Fee Frequency</th>  <th>Management Fee GlAccount</th>
         <th>Interest Rate % yearly</th> <th>Penalty Rate % yearly</th>  <th>Accrued interest GlAccount</th>  <th>Interest Posting GlAccount</th>   <th>Minimun balance</th> <th>Maximum Balance</th> <th>Accrual Frequency</th> <th>Posting Frequency </th> <th>Edit </th>
         
      </tr>
    </thead><tbody>';
    $sql = mysql_query("SELECT * FROM fixed_deposit_setting ") or die(mysql_error());
    while ($row = mysql_fetch_array($sql)) {
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo'<tr><td>' . base64_decode($row['account_name']) . '</td><td>' . getsymbol() . ' ' . base64_decode($row['entry_fee']) . '</td><td>' . getGlname(base64_decode($row['accountfee_gl_id'])) . '</td><td>' . getsymbol() . ' ' . base64_decode($row['closing_fee']) . '</td><td>' . getsymbol() . ' ' . base64_decode($row['management_fee']) . '</td><td>' . getPeridocity(base64_decode($row['Frequecny_management_fee'])) . '</td><td>' . getGlname(base64_decode($row['management_fee_glacc'])) . '</td><td>' . base64_decode($row['interest_rate']) . '</td><td>' . base64_decode($row['penalty_rate']) . '</td><td>' . getGlname(base64_decode($row['interest_glacc'])) . '</td><td>' . getGlname(base64_decode($row['interest_postaccount'])) . '</td><td>' . getsymbol() . ' ' . base64_decode($row['min_account_balance']) . '</td><td>' . getsymbol() . ' ' . base64_decode($row['max_account_balance']) . '</td><td>' . getPeridocity(base64_decode($row['frequency_accrual'])) . '</td><td>' . getPeridocity(base64_decode($row['frequency_posting'])) . '</td><td class="style"><form action="" method="post"><input type="hidden" name="ID" value="' . $row['id'] . '" /> <button type="submit" name="btneidt" onClick="' . $confirmedit . '" class="btn green" ><i class="fa fa-edit">Edit</i> </button></form></td></tr>';
    }

    echo'</tbody></table></div>';
}

//accounting closing fee form
function account_close($amount) {

    echo '<form class="form-horizontal" action="" method="POST" role="form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Enter Amount</label>
										<div class="col-md-4">
											<input type="text" name="amount" class="form-control" value="' . $amount . '" placeholder="Enter amount">
											
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" name="btnadd" class="btn green">Submit</button>
										<button type="submit" name="btnedit" class="btn green">Edit</button>
									</div>
								</div>
							</form>
					';
}

//interest on saving settings
function interst_save() {
    $sqlsave = mysql_query("SELECT * FROM interest_saving_setting where id='1'") or die(mysql_error());

    echo '<form class="form-horizontal"  action="" method="POST" role="form">
        
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Account Name</label>
<div class="col-md-4">
<input type="text" name="saving_acc" required class="form-control input-medium" value="" placeholder="Account name">
    </div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Accrual Period</label>
										<div class="col-md-4">
											
										<select name="accrue_period" class="form-control input-medium select2me" required title="Select accrual period" ><option></option>';

    $qpers1 = mysql_query("select * from periodictyrecord ");
    while ($rpes1 = mysql_fetch_array($qpers1)) {
        echo '<option value="' . $rpes1['id'] . '">' . base64_decode($rpes1['periodname']) . '</option>';
    }
    echo' </select>
				
										</div>
									</div>
								</div>
                                                                
                                                                <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Posting period</label>
										<div class="col-md-4">
											<select name="post_period" class="form-control input-medium select2me" required title="Select posting period" ><option></option>';

    $qpers = mysql_query("select * from periodictyrecord ");
    while ($rpes = mysql_fetch_array($qpers)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>
                                                                <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Interest Rate (%  on savings)(p.a)</label>
										<div class="col-md-4">
																			<input type="text" name="interest_rate" required class="form-control input-medium" value="' . $intrate . '" placeholder="Interest Rate">
										</div>
									</div>
								</div>
                                                                 <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Default Accrued interest Account</label>
										<div class="col-md-4">
											<select name="interestGl" class="form-control input-medium select2me" required title="Select interest gl Account" ><option></option>';

    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>
<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Default member interest Account</label>
										<div class="col-md-4">
											<select name="interestmember" class="form-control input-medium select2me" required title="Select interest gl Account" ><option></option>';

    $glqry1q = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1q = mysql_fetch_array($glqry1q)) {
        echo '<option value="' . $rowql1q['id'] . '">' . base64_decode($rowql1q['acname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>                                                                

	<div class="form-actions">
        <div class="row">
                <div class="col-md-1 col-md-offset-3">
		<button type="submit" name="btnsubmit" class="btn green">Submit</button></form>
	</div>
		<div class="col-md-2">
	<form action"" method="post">	<button type="submit"  name="btnview"  class="btn green">Eidt</button></form>
            </div>
	</div> </div>';
}

//******************************* view interest settings ***********************
function viewInterest_setting() {
    echo'<div class="table-scrollable" id="nt"><table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
      <tr>
      <th>Account Name  </th> <th> Accrual Period </th>
       <th> Posting period </th>
      <th> Interest Rate (% on savings)(p.a) </th>
      <th> Accrued interest GlAccount</th>   <th>Interest Posting Account</th> <th>Edit </th>
         
      </tr>
    </thead><tbody>';
    $sql = mysql_query("SELECT * FROM interest_saving_setting ") or die(mysql_error());
    while ($row = mysql_fetch_array($sql)) {
        $confirmedit = "return confirm('Are you sure you want to edit?');";
        echo'<tr><td>' . getGlname(base64_decode($row['gl_account'])) . '</td><td>' . getPeridocity(base64_decode($row['accrual_period'])) . '</td><td>' . getPeridocity(base64_decode($row['posting_period'])) . '</td><td>' . base64_decode($row['interest_rate']) . '</td><td>' . getGlname(base64_decode($row['default_accrued_account'])) . '</td> <td>' . getGlname(base64_decode($row['default_expense_account'])) . '</td>            <td class="style"><form action="" method="post"><input type="hidden" name="IDs" value="' . $row['id'] . '" /> <button type="submit" name="btneidt" onClick="' . $confirmedit . '" class="btn green" ><i class="fa fa-edit">Edit</i> </button></form></td></tr>';
    }

    echo'</tbody></table></div>';
}

//*************function to edit interest settings.
function editInterest_setting($Id) {
    $sqlsave = mysql_query("SELECT * FROM interest_saving_setting where id='$Id' ") or die(mysql_error());
    while ($rowsave = mysql_fetch_array($sqlsave)) {
        $acc_name = base64_decode($rowsave['gl_account']);
        $acrudper = base64_decode($rowsave['accrual_period']);
        $posting = base64_decode($rowsave['posting_period']);
        $intrate = base64_decode($rowsave['interest_rate']);
        $intaccount = base64_decode($rowsave['default_accrued_account']);
        $postglaccount = base64_decode($rowsave['default_expense_account']);
    }
    echo '<form class="form-horizontal"  action="" method="POST" role="form">
        
<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Account Name</label>
<div class="col-md-4">
<input type="hidden" name="IDS" value="' . $Id . '" />
<input type="hidden" name="gLID" value="' . $acc_name . '" />
<input type="text" name="saving_acc" value="' . getGlname($acc_name) . '" required class="form-control input-medium" value="" placeholder="Account name">
    </div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Accrual Period</label>
										<div class="col-md-4">
											
										<select name="accrue_period" class="form-control input-medium select2me" required title="Select accrual period" >';
    $qpers1x = mysql_query("select * from periodictyrecord where id='$acrudper' ");
    while ($rpes1x = mysql_fetch_array($qpers1x)) {
        echo '<option value="' . $rpes1x['id'] . '">' . base64_decode($rpes1x['periodname']) . '</option>';
    }
    $qpers1 = mysql_query("select * from periodictyrecord ");
    while ($rpes1 = mysql_fetch_array($qpers1)) {
        echo '<option value="' . $rpes1['id'] . '">' . base64_decode($rpes1['periodname']) . '</option>';
    }
    echo' </select>
				
										</div>
									</div>
								</div>
                                                                
                                                                <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Posting period</label>
										<div class="col-md-4">
											<select name="post_period" class="form-control input-medium select2me" required title="Select posting period" >';
    $qpers2 = mysql_query("select * from periodictyrecord where id='" . $posting . "'");
    while ($rpes = mysql_fetch_array($qpers2)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    $qpers = mysql_query("select * from periodictyrecord ");
    while ($rpes = mysql_fetch_array($qpers)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>
                                                                <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Interest Rate (%  on savings)(p.a)</label>
										<div class="col-md-4">
																			<input type="text" name="interest_rate" required class="form-control input-medium" value="' . $intrate . '" placeholder="Interest Rate">
										</div>
									</div>
								</div>
                                                                 <div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Default Accrued interest Account</label>
										<div class="col-md-4">
											<select name="interestGl" class="form-control input-medium select2me" required title="Select interest gl Account" >';
    $glqry = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $intaccount . '" AND accgroup="' . base64_encode('2') . '"');
    while ($rowql = mysql_fetch_array($glqry)) {
        echo '<option value="' . $rowql['id'] . '">' . base64_decode($rowql['acname']) . '</option>';
    }
    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>
<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Default member interest Account</label>
										<div class="col-md-4">
											<select name="interestmember" class="form-control input-medium select2me" required title="Select interest gl Account" >';
    $glqa = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $postglaccount . '" AND accgroup="' . base64_encode('2') . '"');
    while ($rowqla = mysql_fetch_array($glqa)) {
        echo '<option value="' . $rowqla['id'] . '">' . base64_decode($rowqla['acname']) . '</option>';
    }
    $glqry1q = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1q = mysql_fetch_array($glqry1q)) {
        echo '<option value="' . $rowql1q['id'] . '">' . base64_decode($rowql1q['acname']) . '</option>';
    }
    echo' </select>
											
										</div>
									</div>
								</div>                                                                

	<div class="form-actions">
        <div class="row">
                <div class="col-md-1 col-md-offset-3">
		<button type="submit" name="btnUpdate" class="btn green">Update</button></form>
	</div>
		<div class="col-md-2">
	<form action"" method="post">	<button type="submit"  name="btnview"  class="btn green">Back</button></form>
            </div>
	</div> </div>';
}

///**********************edit fixed deposit settings 
function editFixedSettings($ID) {

    $sql = mysql_query("SELECT * FROM fixed_deposit_setting where id='$ID' ") or die(mysql_error());

    while ($row = mysql_fetch_array($sql)) {
        $account_name = base64_decode($row['account_name']);
        $gl_Id = base64_decode($row['gl_account']);
        $entry_fee = base64_decode($row['entry_fee']);
        $closing_fee = base64_decode($row['closing_fee']);
        $management_fee = base64_decode($row['management_fee']);
        $Frequecny_management_fee = base64_decode($row['Frequecny_management_fee']);
        $management_fee_glacc = base64_decode($row['management_fee_glacc']);
        $interest_rate = base64_decode($row['interest_rate']);
        $accountfee_gl_id = base64_decode($row['accountfee_gl_id']);
        $interest_glacc = base64_decode($row['interest_glacc']);
        $min_account_balance = base64_decode($row['min_account_balance']);
        $max_account_balance = base64_decode($row['max_account_balance']);
        $penalty_rate = base64_decode($row['penalty_rate']);
        $frequency_accrual = base64_decode($row['frequency_accrual']);
        $frequency_posting = base64_decode($row['frequency_posting']);
        $postglaccount = base64_decode($row['interest_postaccount']);
    }
    echo'

<div class="col-md-4 col-md-offset-1">
<form action="" method="post">
<div class="form-group">
<label>Account Name</label>
<input type="hidden" name="IDS" value="' . $ID . '" />
   <input type="hidden" name="GL_ID" value="' . $gl_Id . '" />
<input  type="text" name="actname" value="' . $account_name . '" class="form-control input-medium" placeholder="Enter Account Name" title="Account tile" required/>
</div>

<div class="form-group">
<label>Account Opening Fee</label>
<input  type="number" step="0.01" name="regfee" value="' . $entry_fee . '" class="form-control input-medium" placeholder="Account Opening fee" title="Account Opening fee" required/>
</div>

<div class="form-group">
<label>Account Closing Fee</label>
<input type="number" step="0.01" name="closefee" value="' . $closing_fee . '" class="form-control input-medium" placeholder="Account Closing fee" title="Account Closing fee" required>
</div>
<div class="form-group">
<label>Account Management Fee</label>
<input type="number" step="0.01" name="managefee" value="' . $management_fee . '" class="form-control input-medium" placeholder="Enter Management Fee" title="Management Fee" required>
</div>
<div class="form-group">
<label>Management Fee Frequency</label><br/>
<select name="freq_manage" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';
    $qper = mysql_query("select * from periodictyrecord where id='" . $Frequecny_management_fee . "' ");
    while ($rpe = mysql_fetch_array($qper)) {
        echo '<option value="' . $rpe['id'] . '">' . base64_decode($rpe['periodname']) . '</option>';
    }
    $qper = mysql_query("select * from periodictyrecord ");
    while ($rpe = mysql_fetch_array($qper)) {
        echo '<option value="' . $rpe['id'] . '">' . base64_decode($rpe['periodname']) . '</option>';
    }
    echo' </select></div>
          
          <div class="form-group">
<label>Management Fee Account</label><br/>
<select name="manageGl" class="form-control input-medium select2me" required title="Select management gl Account" >';
    $glqry = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $management_fee_glacc . '" AND accgroup="' . base64_encode('4') . '"');
    while ($rowql = mysql_fetch_array($glqry)) {
        echo '<option value="' . $rowql['id'] . '">' . base64_decode($rowql['acname']) . '</option>';
    }
    $glqry1 = mysql_query('select * from glaccounts where accgroup="' . base64_encode('4') . '" AND  status="' . base64_encode('Active') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
<div class="form-group">
<label>Interest Rate % yearly</label>
<input type="number" step="0.01" name="interestRate" value="' . $interest_rate . '" class="form-control input-medium" placeholder="Enter Interest Rate" title="Interest Rate" required>
</div>
<div class="form-group">
<label>Penalty Rate % yearly</label>
<input type="number" step="0.01" name="penalty" value="' . $penalty_rate . '" class="form-control input-medium" placeholder="Enter Penalty rate" title="Penalty rate" required>
</div>
</div>

<div class="col-md-4 col-md-offset-1">
 <div class="form-group">
<label>Account opening Fee GLAccount</label><br/>
<select name="accountfeeGl" class="form-control input-medium select2me" required title="Select account fee gl Account" >';
    $glqry = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $accountfee_gl_id . '" AND accgroup="' . base64_encode('4') . '" ');
    while ($rowql = mysql_fetch_array($glqry)) {
        echo '<option value="' . $rowql['id'] . '">' . base64_decode($rowql['acname']) . '</option>';
    }
    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('4') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
    <div class="form-group">
<label >Default Accrued interest Account</label> <br />
										
<select name="interestGl" class="form-control input-medium select2me" required title="Select interest gl Account" >';
    $glqry = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $interest_glacc . '" AND accgroup="' . base64_encode('2') . '"');
    while ($rowql = mysql_fetch_array($glqry)) {
        echo '<option value="' . $rowql['id'] . '">' . base64_decode($rowql['acname']) . '</option>';
    }
    $glqry1 = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1 = mysql_fetch_array($glqry1)) {
        echo '<option value="' . $rowql1['id'] . '">' . base64_decode($rowql1['acname']) . '</option>';
    }
    echo' </select></div>
		
<div class="form-group">
<label >Default member interest Account</label><br />
<select name="postglaccount" class="form-control input-medium select2me" required title="Select interest gl Account" >';
    $glqa = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND  id="' . $postglaccount . '" AND accgroup="' . base64_encode('2') . '"');
    while ($rowqla = mysql_fetch_array($glqa)) {
        echo '<option value="' . $rowqla['id'] . '">' . base64_decode($rowqla['acname']) . '</option>';
    }
    $glqry1q = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '" AND accgroup="' . base64_encode('2') . '" ');
    while ($rowql1q = mysql_fetch_array($glqry1q)) {
        echo '<option value="' . $rowql1q['id'] . '">' . base64_decode($rowql1q['acname']) . '</option>';
    }
    echo' </select></div>

<div class="form-group">
<label>Minimun Account balance</label>
<input type="number" step="0.01" name="minbalance" value="' . $min_account_balance . '" class="form-control input-medium" placeholder="Enter Minimum amount balance" title="minimum balance" required>
</div>
<div class="form-group">
<label>Maximum Account Balance</label>
<input type="number" step="0.01" name="maxbalance" value="' . $max_account_balance . '" class="form-control input-medium" placeholder="Enter Maximum Account balance" title="Max balance" required>
</div>

<div class="form-group">
<label>Accrual Frequency </label><br/>
<select name="fre_accrual" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';
    $qperw = mysql_query("select * from periodictyrecord where id='" . $frequency_accrual . "' ");
    while ($rped = mysql_fetch_array($qperw)) {
        echo '<option value="' . $rped['id'] . '">' . base64_decode($rped['periodname']) . '</option>';
    }
    $qperw = mysql_query("select * from periodictyrecord ");
    while ($rped = mysql_fetch_array($qperw)) {
        echo '<option value="' . $rped['id'] . '">' . base64_decode($rped['periodname']) . '</option>';
    }
    echo' </select>
       </div>
<div class="form-group">
<label>Posting Frequency</label><br/>
<select name="fre_posting" class="form-control input-medium select2me" required title="Select Frequency Accrual" >';
    $qpers = mysql_query("select * from periodictyrecord where id='" . $frequency_posting . "'");
    while ($rpes = mysql_fetch_array($qpers)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    $qpers = mysql_query("select * from periodictyrecord ");
    while ($rpes = mysql_fetch_array($qpers)) {
        echo '<option value="' . $rpes['id'] . '">' . base64_decode($rpes['periodname']) . '</option>';
    }
    echo' </select></div></div>
  
<div class="form-actions">
        <div class="row">
                <div class="col-md-1 col-md-offset-2">
		<button type="submit" name="btnUpdate" class="btn green">Update</button></form>
	</div>
		<div class="col-md-2">
	<form action="" method="post">	<button type="submit" name="btnview" class="btn green">Back</button></form>
            </div>
	</div> </div> ';
}

//edit loan range
function editProcessingfee() {
    echo' 
      <div class="row">
      <form action="" class="form-horizontal" method="post">
	<div class="col-md-4">
 <label>Select Loan</label>
                <select name="lname" title="Select Loan" required title="Select Loan" class="form-control input-medium select2me">
                    <option>  </option>';

    $sth = mysql_query("SELECT * FROM  loansettings");
    while ($row = mysql_fetch_array($sth)) {
        echo'<option value="' . $row['id'] . '">' . base64_decode($row['lname']) . '</option>';
    }

    echo'</select>
</div><div class="col-md-2">
 <input type="submit" value="Select" name="btnprev" class="btn green" class="btn green"> 
</div>
 </form>									
</div> ';
    echo '<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
							<th>
									Id
								</th>
								 
								<th>
									Amount From
								</th>

								<th>
									Amount to
								</th>
                                    <th>
									 Processing fee
								</th>
								
								<th>
									 Edit
								</th>
								
							</tr>
							</thead>
							<tbody>';
    if (isset($_POST['btnprev'])) {
        $loan = base64_encode($_POST['lname']);
        $qryrg = mysql_query('SELECT * FROM loanprocessingfees where loanid="' . $loan . '"');
        while ($range = mysql_fetch_array($qryrg)) {
            echo '<tr>
							<td >'
            . ($range['id']) .
            '</td>
								<td >'
            . base64_decode($range['amountfrom']) .
            '</td>
								<td >'
            . base64_decode($range['amountto']) .
            '</td>
								<td >'
            . base64_decode($range['amount']) .
            '</td>
								<td>
									<a class="edit" href="javascript:;">
										 Edit
									</a>
								</td>
								
                                                            </tr>';
        }
    }
    echo '</tbody>
							</table>';
}

function withdrawFeeSetting() {
    ?><form action="" class="form-horizontal" method="post">
        <input type="button" class="btn green" onclick="addInput()" name="addd" value="Add input field" />
        <input type="button" class="btn red" onclick="removeLastField()" name="rem" value="Remove input field" /> 
        <div class="form-body">
            <div class="col-md-4">

                <label>Select Account</label><br/>
                <select name="lname" title="Select Loan" required title="Select Loan" class="form-control input-medium select2me">
                    <option>  </option>';
                    <?php
                    $glacc = mysql_query('select * from glaccounts where  status="' . base64_encode('Active') . '"') or die(mysql_error());
                    while ($glrow = mysql_fetch_array($glacc)) {
                        echo '<option value=' . $glrow['id'] . '>' . base64_decode($glrow['acname']) . '</option>';
                    }
                    ?>
                    echo'</select></div>
            <div class="col-md-4">

                <label>Charge Account</label><br/>
                <select name="glaccount" title="Select Loan" required title="Select Loan" class="form-control input-medium select2me">
                    <option>  </option>';
                    <?php
                    $withfee = mysql_query('select * from glaccounts where accgroup="' . base64_encode('4') . '" and status="' . base64_encode('Active') . '"') or die(mysql_error());
                    while ($withrow = mysql_fetch_array($withfee)) {
                        echo '<option value=' . $withrow['id'] . '>' . base64_decode($withrow['acname']) . '</option>';
                    }
                    ?>
                    echo'</select></div>

            <div id="text">

            </div>


            <input type="submit" value="submit" name="btnreg" class="btn green" class="btn green">

        </div>
    </form>
    <?php
}

//edit withdraw fee range
function editWithdrawfee() {
    echo' 
      <div class="row">
      <form action="" class="form-horizontal" method="post">
	<div class="col-md-4">
 <label>Select Account</label><br />
                <select name="lname" title="Select Loan" required title="Select Loan" class="form-control input-medium select2me">
                    <option>  </option>';

    $sth = mysql_query("SELECT DISTINCT glaccount FROM  withdrawalfee ");
    while ($row = mysql_fetch_array($sth)) {
        echo'<option value="' . base64_decode($row['glaccount']) . '">' . getGlname(base64_decode($row['glaccount'])) . '</option>';
    }

    echo'</select>
</div><div class="col-md-2">
 <input type="submit" value="Select" name="btnprev" class="btn green" class="btn green"> 
</div>
 </form>									
</div> <br/>';
    echo '<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
							<th>
									Id
								</th>
								 
								<th>
									Amount From
								</th>

								<th>
									Amount to
								</th>
                                    <th>
									 Withdraw fee
								</th>
								
								<th>
									 Edit
								</th>
								
							</tr>
							</thead>
							<tbody>';
    if (isset($_POST['btnprev'])) {
        $glId = base64_encode($_POST['lname']);
        $qryrg = mysql_query('SELECT * FROM withdrawalfee where glaccount="' . $glId . '"');
        while ($range = mysql_fetch_array($qryrg)) {
            echo '<tr>
							<td >'
            . ($range['id']) .
            '</td>
								<td >'
            . base64_decode($range['amountfrom']) .
            '</td>
								<td >'
            . base64_decode($range['amount_to']) .
            '</td>
								<td >'
            . base64_decode($range['amount']) .
            '</td>
								<td>
									<a class="edit" href="javascript:;">
										 Edit
									</a>
								</td>
								
                                                            </tr>';
        }
    }
    echo '</tbody>
							</table>';
}

//edit transfer fee range
function editTransferfee() {

    echo '<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
							<th>
									Id
								</th>
								 
								<th>
									Account From
								</th>

								<th>
									Account to
								</th>
                                    <th>
									 Charge
								</th>
								
								<th>
									 Edit
								</th>
								<th>
									 Edit
								</th>
							</tr>
							</thead>
							<tbody>';

    $qryrg = mysql_query('SELECT * FROM fee_transfer_setting ');
    while ($range = mysql_fetch_array($qryrg)) {
        echo '<tr>
							<td >'
        . ($range['id']) .
        '</td>
								<td >'
        . getGlname(base64_decode($range['account_from'])) .
        '</td>
								<td >'
        . getGlname(base64_decode($range['account_to'])) .
        '</td>
								<td >'
        . base64_decode($range['amount_charged']) .
        '</td>
								<td>
									<a class="edit" href="javascript:;">
										 Edit
									</a>
								</td>
                                                                <td>
									<a class="delete" href="javascript:;">
										 Delete
									</a>
								</td>
								
                                                            </tr>';
    }

    echo '</tbody>
							</table>';
}

function dailycont() {
    $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];
    echo '<form action="" method="POST" autocomplete="off" class="form-horizontal" id="frm1">
    <div class="form-body">

    <div class = "form-group">
<label>Search Member No. or Name</label><br />
<select name = "searchmno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me  ">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember where status='" . base64_encode('active') . "'  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>
    <div id="txtHint">
    
</div>
   <div class = "form-group">
<label>Select Date</label>
<input   class="input-medium form-control date-picker"  data-date-format="dd-M-yyyy"   required type="text" name="date" maxlength="11" value="' . date("d-M-Y") . '" placeholder="Enter Date of Banking" title="Enter Date of Banking" required/>
</div>


<div class="form-group">
<label>Enter Receipt Number</label>
<input class="form-control input-medium" title="Enter Receipt Number" placeholder="Enter Receipt Number" type="text" value="' . $nextId . '" name="receipt">
</div>
<div class="form-group">
<label>Payment Type</label><br/>
<select class="form-control input-medium select2me" name = "ptype" required title = "Payment type" onchange="showUsermc(this.value)">';
    echo '<option></option>';
    $stl = mysql_query("SELECT * FROM paymentmode   WHERE  status='" . base64_encode(Active) . "'  ");
    while ($st = mysql_fetch_array($stl)) {
        echo '<option value="' . $st['id'] . '">' . base64_decode($st['mode']) . '</option>';
    }

    echo '</select>
</div>
<div class="form-group">
<label>Select Bank Account</label><br/>
<select class="form-control input-medium select2me" name = "bankname" required title="Select Bank Account"  placeholder="Select Bank Account">
<option></option>';
    $sth = mysql_query("SELECT * FROM addbank ");
    while ($row1 = mysql_fetch_array($sth)) {
        echo '<option value="' . $row1['primarykey'] . '">' . base64_decode($row1['bankname']) . '</option>';
    }
    echo '</select>
</div>
                                                    
                                                   
<input type = "text" name ="tid" value = "' . gmdate("dmyhisG") . '" hidden required/>
<div class = "art-content-layout">
    <div class = "art-content-layout-row">
        <div class = "art-layout-cell" style = "width: 100%" >
            <div class = "four">
                <button class="btn green" name="submit1">Proceed</button>
            </div>
        </div>
    </div>
</div>
</form>';
}
