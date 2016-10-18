<?php

function memberregistration() {
    $result = mysql_query("SHOW TABLE STATUS LIKE 'newmember'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];
   

    echo '<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<form method = "post" action = "" id="nax" enctype = "multipart/form-data" autocomplete = "on">

<div class = "one">
<label>Member Category &nbsp;<a class="btn default" data-toggle="modal" href="#membercategory">
										 Add Category
									</a></label>
<select id= "member_cate"  class="form-control input-medium select2me" type = "text" onchange = "showMemberCater(this.value)" name = "member_cate"  title = "Enter memeber category" data-placeholder = "Enter memeber category"/>
<option></option>';
   $qrya=mysql_query("SELECT  *  FROM  member_category  where status='".base64_encode('active')."'") ;
   while ($rowq = mysql_fetch_array($qrya)) {
     echo'<option value="'.$rowq['id'].'">'.base64_decode($rowq['category_name']).'</option>' ; 
   }
echo'</select>
</div>
<div class = "one">

<label>Title &nbsp;<a class="btn default" data-toggle="modal" href="#memberTitle">
										 Add Titles
									</a></label><br />
<select class="form-control input-medium select2me" type="text" name="title"  placeholder="Select title" title="Select title"/>
<option></option>';
    $queryq = mysql_query("SELECT * FROM  memebr_title where status='".  base64_encode('active')."'");
    while ($rowe = mysql_fetch_array($queryq)) {
        echo '<option value="' . $rowe['id'] . '">' . base64_decode($rowe['title']) . '</option>';
    }
echo'</select>
</div>

<div class = "one">
<label>First Name</label><span class="red">  required * </span>
<input  id="fname" class="form-control input-medium" type= "text" required name = "fname"  value = "' . $_REQUEST['fname'] . '"  placeholder = "Enter First Name"  pattern="[a-zA-Z]{2,20}" title="please enter a valid first name"/>
</div>

<div class = "one">
<label>Middle Name</label>
<input id= "mname"  class="form-control input-medium" type = "text"  name = "mname" value = "' . $_REQUEST['mname'] . '" placeholder = "Enter Middle Name" title = "please enter a valid middle name" pattern="[a-zA-Z]{0,20}"/>

</div>
<div class = "one">
<label>Last Name</label><span class="red">  required * </span>
<input id= "lname"   class="form-control input-medium" type = "text" required name = "lname" value = "' . $_REQUEST['lname'] . '" title = "please enter a valid last name" placeholder = "Enter Last Name" pattern="[a-zA-Z]{1,20}"/>
</div>
<div class = "one">
<label>Date OF Birth</label><span class="red">  required * </span>';
$time = new DateTime('now');
$newtime = $time->modify('-18 years')->format('d-m-Y');
echo '<div class="input-group input-medium date date-picker" data-date="'.$newtime.'" data-date-format="dd-mm-yyyy" data-date-end-date="'.$newtime.'" data-date-viewmode="years">
															<input name="dob" type="text" class="form-control" readonly>
															<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														</div>
</div>                     
<div class = "one">
<label>Gender</label><span class="red">  required * </span>
<select id= "gender" class="form-control input-medium select2me" type = "text" required name = "gender" title = "Select Gender" data-placeholder = "Select Gender"/>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select>
</div>
<div class = "one">
<label>Business / Organisation Name</label><span class="red">  required * </span>
<select id= "org_name"  class="form-control input-medium select2me" type = "text" name = "org_name" required  title = "Enter Business / Organisation Name" data-placeholder = "Enter Business / Organisation Name"/>
<option></option>';
   $stl=mysql_query("SELECT  *  FROM  organisation   WHERE  status='".base64_encode(active)."'  ") ;
   while ($row1 = mysql_fetch_array($stl)) {
     echo'<option value="'.$row1['id'].'">'.base64_decode($row1['organisation']).'</option>' ; 
   }
echo'</select>
</div>

<div class = "two">
<label>Passport No. / ID No.</label><span class="red">  required * </span>
<input id= "idno"  class="form-control input-medium" type = "text" required name = "idno"  placeholder = "Enter Id No. or Passport No" title = "Enter Id No. or Passport No"/>
</div>
<div class = "two">
<label>Estate Where You Live</label>
<input id= "residence"  class="form-control input-medium" type = "text" name = "residence" placeholder = "Enter Residence" title = "Enter Residence"/>
</div>
<div class = "two">
<label>Floor</label>
<input i class="form-control input-medium" type = "text" name = "floor"  placeholder = "Enter Floor" title = "Enter Floor"/>
</div>
<div class = "two">
<label>Customer Relationship Officer</label><span class="red">  required * </span>
<select  class="form-control input-medium select2me" type = "text" name = "cro" required  title = "Enter Customer Relationship Officer" data-placeholder = "Enter Customer Relationship Officer"/>
<option></option>';
   $sth=mysql_query("SELECT  *  FROM  users   WHERE  status='".base64_encode(Active)."'  ") ;
   while ($row1 = mysql_fetch_array($sth)) {
     echo'<option value="'.$row1['id'].'">'.base64_decode($row1['fname'])." ".base64_decode($row1['mname'])." ".base64_decode($row1['lname']).'</option>' ; 
   }
echo'</select>
</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "one">
<label>Postal Address</label>
<input id= "post_address"  class="form-control input-medium" type = "text" name = "post_address"  title = "Enter Postal Address" placeholder = "Enter Postal Address"/>
</div>
<div class = "two">
<label>Member No.</label><span class="red">  required * </span>
<input id= "mno"  class="form-control input-medium" type = "text" name = "mno" required value = "000' . $nextId . '" required placeholder = "Enter Member No." title = "Enter Member No."/>
</div>


<div class = "two">
<label>Country</label>';

include 'select.php';
echo $country;
echo '</div>
</div>

<div class = "two">
<label>Region</label>

<input id= "region"  class="form-control input-medium" type = "text" name = "region"  placeholder = "Enter Region" title = "Enter Region" pattern = "[a-zA-Z ]+"/>
</div>

<div class = "two">
<label>County or State</label>
<input id= "county"  class="form-control input-medium" type = "text" name = "county"  placeholder = "Enter County" title = "Enter County" pattern = "[a-zA-Z ]+"/>
</div>
<div class = "two">
<label>Constituency</label>
<input id= "constituency"  class="form-control input-medium" type = "text" name = "constituency" placeholder = "Enter Constituency" title = "Enter Constituency" pattern = "[a-zA-Z ]+"/>
</div>
<div class = "two">
<label>Mobile Number</label><span class="red">  required * </span>
<input id= "mobile"  class="form-control input-medium" type = "text" name="mobile"  placeholder = "Enter Phone Number" title = "Enter Phone Number"/>';

//include 'demo.html';
echo '</div>
    <div class = "two">
<label>Office Cell</label>
<input id= "office_cell"  class="form-control input-medium" type = "text" name = "office_cell"  placeholder = "Office cell number." title = "Office cell number"/>
</div>
<div class = "two">
<label>Office Landline</label>
<input id= "office_landline"  class="form-control input-medium" type = "text" name = "office_landline"  placeholder = "Enter Office Landline." title = "Enter Office Landline."/>
</div>
<div class = "two">
<label>Pin</label>
<input id= "krapin"  class="form-control input-medium" type = "text" name = "krapin" value = "' . $_REQUEST['pin'] . '" placeholder = "Enter Tax Pin No." title = "Enter Tax Pin No." pattern="[A-Z]+[0-9]+[A-Z]"/>
</div>
<div class = "one">
<label>Building Name</label>
<input id= "buildingname" class="form-control input-medium" type = "text" name = "buildingname"  title = "Enter Building Name" placeholder = "Enter Building Name"/>
</div>
<div class = "one">
<label>Introduced By</label>
<select id= "introduce_by" class="form-control input-medium select2me"   onchange = "showIntroduced(this.value)"   type = "text" name = "introduce_by"  title = "Select Who Introduced You" data-placeholder = "Select Who Introduced You"/>
<option></option>
<option value="1">CRO</option>
<option value="2">Agents</option>
<option value="3">Member</option>
</select>
</div>
<div id="introduced">
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "one">
<label>Frequency Of Payment</label><span class="red">  required * </span>
<select id= "freq_payment" class="form-control input-medium select2me" type = "text" name = "freq_payment" required  title = "Frequency Of Payment" data-placeholder = "Frequency Of Payment"/>
  <option></option>';
   $fget=mysql_query("SELECT  *  FROM  periodictyrecord ORDER BY numberdays DESC  ") ;
   while ($rowf = mysql_fetch_array($fget)) {
     echo'<option>'.base64_decode($rowf['periodname']).'</option>' ; 
   }
print'
</select>
</div>
<div class = "two">
<label>Your Occupation</label>
<input id= "occupation"  class="form-control input-medium" type = "text" name = "occupation"  title = "Enter Occupation" placeholder = "Enter Occupation"/>
</div>
<div class = "two">
<label>Personal Email Address</label><span class="red">  required * </span>
<input  id= "personalemail" class="form-control input-medium" type = "text" name = "personalemail" required  placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
<div class = "two">
<label>Office Email Address</label><span class="red">  required * </span>
<input  id= "office_email" class="form-control input-medium" type = "text" name = "office_email" required  placeholder = "Enter Email Address" title = "Enter Email Address"/>
</div>
</div>
<div class = "art-layout-cell" style = "width: 50%" >

<div class = "two">
<label>Comments</label>
<textarea id= "comments" class="form-control input-medium" name = "comments" placeholder = "Enter Comments" title = "Enter Comments"></textarea>
</div>
<div class = "two">
<label>Registration Date</label><span class="red">  required * </span>
<input id="regdate" class="form-control input-medium date-picker" required  data-date-format="dd-M-yyyy" type="text" name = "regdate"  placeholder = "Enter date of registration" title = "Enter date of registration"/>
</div>
<div class = "one">
<label>Expected Periodical Savings</label>
<input id="period_saving" class="form-control input-medium" type = "text" required name = "period_saving"  title = "Periodical Savings Amount" placeholder = "Periodical Savings Amount"/>
</div>
<div class = "two">
<label>Photo</label><span class="red">  required * </span>
<input id="pic"  class="form-control input-medium" type = "file" name = "image" title = "Choose passport photo from folder" accept="image/*"/>
</div>
<div class = "two">
<br/><br/><button  class="btn green"  name = "submit">Save</button>
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
////////////member category modal
echo '<div id="membercategory" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">

											<h4 class="modal-title">Member Category </h4>
										</div>
                                       <form method="POST" action="memberregistration.php">
										<div class="modal-body">
											<div class="scroller" style="height:150px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="col-md-6">
														<h4>Category Prefix</h4>
														<p>
															<input type="text" name="prefix" required class="col-md-12 form-control" placeholder="Enter Category Prefix">
														</p><p>
													
														<h4>Category Name</h4>
														<p>
															<input type="text" name="cat_name" required class="col-md-12 form-control" placeholder="Enter Category name">
														</p><p>
													</div>

												</div>
											</div>
										</div>
										<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" name="btnmembercat" class="btn green">Submit</button>
										<button type="button" data-dismiss="modal" class="btn default">Close</button>
									</div></form>
								</div>
								</div>
							</div>
							</div>';
////////////member titles modal
echo '<div id="memberTitle" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">

											<h4 class="modal-title">Add Titles </h4>
										</div>
                                       <form method="POST" action="memberregistration.php">
										<div class="modal-body">
											<div class="scroller" style="height:80px" data-always-visible="1" data-rail-visible1="1">
												<div class="row">
													<div class="col-md-6">
														
													
														<h4>Title Name</h4>
														<p>
															<input type="text" name="title_name" required class="col-md-12 form-control" placeholder="Enter Category name">
														</p><p>
													</div>

												</div>
											</div>
										</div>
										<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" name="btnaddtitles" class="btn green">Submit</button>
										<button type="button" data-dismiss="modal" class="btn default">Close</button>
									</div></form>
								</div>
								</div>
							</div>
							</div>';
}



function nextofkin() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">

<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "on">

<div class = "one"><br />
<label>Member No</label>
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)"  class="input-medium form-control select2me" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name" >
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


<div class = "one">
<label>First Name</label>
<input   class="form-control input-medium" type = "text" name = "fname" value = "" required = "required" placeholder = "Enter First Name" title = "Enter First Name" pattern = "[a-zA-Z]+"/>
</div>
<div class = "one">
<label>Middle Name</label>
<input   class="form-control input-medium" type = "text" name = "mname" value = "" placeholder = "Enter Middle Name" title = "Enter Middle Name" pattern = "[a-zA-Z]+"/>

</div>
<div class = "one">
<label>Last Name</label>
<input   class="form-control input-medium" type = "text" name = "lname" value = "" required title = "Enter Last Name" placeholder = "Enter Last Name" pattern = "[a-zA-Z]+"/>
</div>

</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >



<div class = "two">
<label>Select Relationship.</label>
<select class="form-control input-medium select2me" data-placeholder="Select Relationship" title="Select Relationship" name="rela">
<option value=""></option>';
$Rows = mysql_query('SELECT * FROM nextofkin');
    while ($Row = mysql_fetch_array($Rows)) {
    echo '<option>'. base64_decode($Row['relationship']) .'</option>';
}
echo '</select>
</div>
<div class = "two">
<label>Relationship.</label>
<input   class="form-control input-medium" type = "text" name = "relationship" value = "' . $_REQUEST['relationship'] . '" placeholder = "Enter Relationship." title = "Create Relationship."/>
</div>
<div class = "two">
<label>Percentage</label>
<input   class="form-control input-medium" type = "number" name = "percentage" value = "' . $_REQUEST['percentage'] . '" required placeholder = "Enter Percentage." title = "Enter Percentage."/>
</div>
<div class = "two">
<label>Date of Birth</label>
<input class="form-control input-medium date-picker" size="16" type="text" value="'. $_REQUEST['dob'] .'" name="dob"/>
</div>
<div class = "two">
<label>ID No.</label>
<input   class="form-control input-medium" type = "text" name = "idno" value = "" placeholder = "Enter Id No." title = "Enter Id No." pattern = "[0-9]{4,}"/>
</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >


<div class = "two">
<label>Mobile</label>
<input   class="form-control input-medium" required type = "text" name = "mobile" value = "" placeholder = "Enter Mobile Number" title = "Enter Mobile Number"/>
</div>
</div><div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Picture</label>
<input   class="form-control input-medium"  type = "file" name = "image" title = "Choose image from folder" accept="image/*"/>
</div>
<div class = "two">
<label>Comments</label>
<textarea  class="form-control input-medium"  name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . $_REQUEST['comments'] . '</textarea>
</div>

</div>
</div>
<div class = "two">

<br><br><button  class="btn green"  name = "nsubmit">Save</button>
</div>

</form>
<form action="" method="post">
<div class = "two">
<br><br><button  class="btn green"  name = "edit">Edit</button>
</div>
</form>

</div>
</div>';
}

function bankDetails() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "post" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "one">
<label>Member No</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)"  class="input-medium form-control select2me" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name" >
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>
    
<div class = "two">
<label>Bank Name.</label><br />
<select name = "bankname" id="select2_sample4" required data-placeholder = "bank Name" title = "Bank name"  class="input-medium form-control select2me">
    <option></option>';
    $stmta = mysql_query("SELECT * FROM  member_banks where status='".  base64_encode('active')."'  ");
    while ($row = mysql_fetch_array($stmta)) {
        echo '<option  value="' . ($row['id']) . '">' . base64_decode($row['bank_name']). ' </option>';
    }
    echo'</select>
</div>
<div class = "two">
<label>Branch.</label><br />
<select name = "branch" id="select2_sample4" required data-placeholder = "bank Name" title = "Bank name"  class="input-medium form-control select2me">
    <option></option>';
    $stmta = mysql_query("SELECT * FROM  memberbank_branches where status='".  base64_encode('active')."'  ");
    while ($row = mysql_fetch_array($stmta)) {
        echo '<option  value="' . ($row['id']) . '">' . base64_decode($row['branch_name']). ' </option>';
    }
    echo'</select>
</div>
<div class = "two">
<label>Account Type.</label><br />
<select name = "account_type" id="select2_sample4" required data-placeholder = "account type" title = "account type"  class="input-medium form-control select2me">
    <option></option>
     <option value="Adult">Adult</option>
      <option value="Minor">Minor</option>
      </select>
</div>

<div class = "two">
<label>Account Number.</label><br/>
<input type="number" class="form-control input-medium" name="accountno" required dataplaceholder="Enter account number" />
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

<br><br><button  class="btn green"  name = "btnsubmit">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}


function memgroup() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "get" autocomplete = "off">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Member Number.</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
<div class = "two">
<label>Group Name.</label><br />
<select  class="form-control input-medium select2me"  name = "gname" required data-placeholder="Select  Group Name" title = "Select  Group Name">
<option></option>';

    $hqry = mysql_query('select * from cgroup where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($hqry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['gname']) . '</option>';
    }

    echo '</select>
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

<br><br><button  class="btn green"  name = "mesubmit">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>';
}


function memberacct() {
    echo '<div class = "art-postcontent art-postcontent-0 clearfix">
<div class = "art-content-layout">
<form action = "" method = "POST" autocomplete = "on">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Member Number</label><br />
<select name = "mno" id="select2_sample4" onchange = "showUsers(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
<div id = "txtHintt">
<div class = "two">
<label>Member Name</label>
<input   class="form-control input-medium" type = "text" name = "mname" value = "' . $_REQUEST['fname'] . ' ' . $_REQUEST['mname'] . ' ' . $_REQUEST['lname'] . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>
</div>
<div class = "two">
<label>Select GL Account Name.</label><br />
<select  class="form-control input-medium select2me"  name = "gname"  data-placeholder="Select GL Account Name" title = "Select GL Account Name">
<option></option>';

    $hqry = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($hqry)) {
        echo '<option value="' . $row['id'] . '">' . base64_decode($row['acname']) . '</option>';
    }

    echo '</select>
</div>

</div>

</div>
</div>


<br><button  class="btn green"  name = "mebmit">Save</button></form>

</div>
</div>';
}



function uploads() {



    echo'<form action="" method="post" name="myforms" enctype = "multipart/form-data" class="form-horizontal" autocomplete = "on">
	<div class="form-body">
<div class="form-group">
<label class="col-md-3 control-label">Member Number</label>
<div class="col-md-4">
<select name = "mno" id="select2_sample4" onchange = "showUsers(this.value)" required data-placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2me">
    <option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember  ");
    while ($row = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row['membernumber']) . '">' . getMembername($row['membernumber']) . '-' . base64_decode($row['membernumber']) . ' </option>';
    }
    echo'</select>
</div>
</div>
<div class="form-group">
<div id = "txtHintt">
<div id = "form-group">
<label class="col-md-3 control-label">Member Name</label>
<input id="mname"  class="form-control input-medium"   type = "text" name = "mname"  readonly required placeholder = "Enter Member Name" title = "Enter Member Name" value = "' . $_REQUEST['mname'] . '"/>
</div>
</div>
 <div class="form-group">
<label class="col-md-3 control-label">SIGNATURE</label>
<div class="col-md-4">
<input type="file" id="usd" name="image" class="form-control" placeholder="Cropped Specimen Of Signature" accept="image/*">
</div>
</div>

 <div class="form-group">
<label class="col-md-3 control-label">Scanned Id/Passport</label>
<div class="col-md-4">
<input type="file" id="usd" name="image2" class="form-control" placeholder="Scanned Id Or Passport" accept="image/*">
</div>
</div>
 <div class="form-group">
<label class="col-md-3 control-label">Other</label>
<div class="col-md-4">
<input type="file" id="usd" name="image3" class="form-control" placeholder="other files" accept="image/*">
</div>
</div>
 <div class="form-group">
<label class="col-md-3 control-label">Other</label>
<div class="col-md-4">
<input type="file" id="usd" name="image4" class="form-control" placeholder="other files" accept="image/*">
</div>
</div>
<div class="col-md-4 col-md-offset-3">
<div class="form-actions fluid">
<div class="col-md-offset-3 col-md-6">
<button type="submit" id="submit22" name="submit78" class="btn green">Submit</button>
</div>
</div>
</div>
</form>';
}


function kinForm($id){
    $sth=mysql_query("SELECT  *  FROM  nextofkin WHERE   id='$id' ");
   // echo $id;
    while ($row=  mysql_fetch_assoc($sth)){
  echo '<div class = "art-postcontent art-postcontent-0 clearfix">

<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >
<form method = "post" action = "" enctype = "multipart/form-data" autocomplete = "on">
<input type="hidden"  name="id"  value="'.$id.'" >
<div class = "one"><br />
<label>Member No. or Name</label>
<select name = "mno" id="select2_sample4" onchange = "showUser(this.value)" required placeholder = "Search Member No. or Name" title = "Search Member No. or Name"  class="input-medium form-control select2  "><option></option>';
    $stmt = mysql_query("SELECT * FROM  newmember     ");
    while ($row4 = mysql_fetch_array($stmt)) {
        echo '<option  value="' . base64_decode($row4['membernumber']) . '">' . getMembername($row4['membernumber']) . '-' . base64_decode($row4['membernumber']) . ' </option>';
    }
    echo'</select>
    </div>

<div id = "txtHint">
<div class = "two">
<label>Member Name</label>
<input pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+{50}" class="form-control input-medium" type = "text" name = "mname" value = "' . base64_decode($row['']) . '" readonly required placeholder = "Enter Member Name" title = "Enter Member Name"/>
</div>
</div>

<div class = "one">
<label>First Name</label>
<input   class="form-control input-medium" type = "text" name = "fname" value = "' . base64_decode($row['fname']) . '" required = "required" placeholder = "Enter First Name" title = "Enter First Name" pattern = "[a-zA-Z]+"/>
</div>
<div class = "one">
<label>Middle Name</label>
<input   class="form-control input-medium" type = "text" name = "mname" value = "' . base64_decode($row['mname']) . '" placeholder = "Enter Middle Name" title = "Enter Middle Name" pattern = "[a-zA-Z]+"/>

</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >


<div class = "one">
<label>Last Name</label>
<input   class="form-control input-medium" type = "text" name = "lname" value = "' . base64_decode($row['lname']) . '" required title = "Enter Last Name" placeholder = "Enter Last Name" pattern = "[a-zA-Z]+"/>
</div>
<div class = "two">
<label>Relationship.</label>
<select class="form-control input-medium" name="rela">';
$Rows = mysql_query('SELECT * FROM nextofkin');
    while ($Row = mysql_fetch_array($Rows)) {
    echo '<option>'. base64_decode($Row['relationship']) .'</option>';
}
echo '</select>
</div>
<div class = "two">
<label>Relationship.</label>
<input   class="form-control input-medium" type = "text" name = "relationship"  placeholder = "Enter Relationship." title = "Enter Relationship."/>
</div>
<div class = "two">
<label>Percentage</label>
<input   class="form-control input-medium" type = "number" name = "percentage" value = "' . base64_decode($row['percentage']) . '" required placeholder = "Enter Percentage." title = "Enter Percentage."/>
</div>
<div class = "two">
<label>Date of Birth</label>
<input class="form-control input-medium date-picker" data-date-format="dd-M-yyyy" size="16" type="text" value="'. base64_decode($row['dob']) .'" name="dob"/>
</div>
<div class = "two">
<label>ID No.</label>
<input   class="form-control input-medium" required type = "text" name = "idno" value = "' . base64_decode($row['idno']) . '" placeholder = "Enter Id No." title = "Enter Id No." />
</div>
</div>
</div>
</div>
<div class = "art-content-layout col-md-3">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 50%" >


<div class = "two">
<label>Mobile</label>
<input   class="form-control input-medium" required type = "text" name = "mobile" value = "' . base64_decode($row['mobile']) . '" placeholder = "Enter Mobile Number" title = "Enter Mobile Number"/>
</div>
</div><div class = "art-layout-cell" style = "width: 50%" >
<div class = "two">
<label>Picture</label>
<input   class="form-control input-medium"  type = "file" name = "image" title = "Choose image from folder"/>
</div>
<div class = "two">
<label>Comments</label>
<textarea  class="form-control input-medium"  name = "comments" placeholder = "Enter Comments" title = "Enter Comments">' . base64_decode($row['comments']) . '</textarea>
</div>

</div>
</div>
</div>




<br><button  class="btn green"  name = "update">Save</button>
</div>

</form>'; 
    }
}
 function  updateKin($mid, $fname, $mname, $lname, $perc, $rela, $dob, $idno, $mobile, $pic, $comments,$id) {
     
    $stl=mysql_query ("UPDATE  nextofkin SET  memberno='".  base64_encode($mid)."', fname='".  base64_encode($fname)."', mname='".  base64_encode($mname)."',lname='".  base64_encode($lname)."', dob = '".  base64_encode($dob)."', percentage = '".  base64_encode($perc)."', relationship='".  base64_encode($rela)."', idno='".  base64_encode($idno)."', mobile='".  base64_encode($mobile)."', pic='".  base64_encode($pic)."', comments='".  base64_encode($comments)."'  WHERE  id='$id'  ");
 if($stl){
     header('location: memberregistration.php');
    $alert = '<script type="text/javascript">alert("'.  getMembername(base64_encode($mid)).' Update was Successful!");
    document.location.href = "memberregistration.php";</script>';
    echo $alert;
 }else{
     $al = '<script type="text/javascript">alert("'.  getMembername(base64_encode($mid)).' Update Failled!");</script>'; 
    echo $al;
 }
    
 }