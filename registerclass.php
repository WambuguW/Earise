<?php

class Registermember {

    private $_fname, $_lname, $_mname, $_idno, $_mno, $_mobile, $_pin, $_email, $_user;

///($user, $fname, $mname, $lname, $dob, $gender, $pcode, $mop, $intro, $nitro, $bname, $bloc, $nameb, $ccmf, $idno, $mnumber, $distr, $divi, $mobile, $pin, $residence, $occupation, $email, $comments, $dates, $photo)
    public function addmember($users, $member_cate, $title, $fname, $mname, $lname, $dob, $gender, $org_name, $idno, $residence, $floor, $cro, $post_address, $mnumber, $country, $region, $county, $constituency, $mobile, $office_cell, $office_landline, $krapin, $buildingname, $introduce_by, $nitro, $freq_payment, $occupation, $personalemail, $office_email, $comments, $regdate, $period_saving, $photo) {
        $date = date("d-M-Y", strtotime($dates));
        //$mnumber = $member_cate . $mnumber;
        $this->_mno = $mnumber;
        $this->_fname = $fname;
        $this->_mname = $mname;
        $this->_lname = $lname;
        $this->_mobile = $mobile;
        $this->_pin = $krapin;
        $this->_idno = $idno;
        $this->_email = $personalemail;
        if (namevalidation($this->_fname)) {

            $chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($this->_mno) . '"') or die(mysql_error());
            if (mysql_num_rows($chqry) >= 1) {
                $chrslt = mysql_fetch_array($chqry);

                if ($chrslt['membernumber'] == base64_encode($mnumber)) {
                    echo '<span class="red" >A member with a similar registration number exists</span></br>';
                }
            } else {
                mysql_query('begin');
                $mqry = mysql_query('insert into newmember(photo,firstname,middlename,lastname,dob,gender,recruitedby,idnumber,membernumber,county,mobileno,pinnumber,residence,email,comments,status,regdate,member_cat_id,title_id,floor,org_name,cro_id,country,building_name,frequency_payment,occupation,periodical_saving,region,post_address,post_code,constituency,office_cell,office_landline,office_mail ) values("' . base64_encode($photo) . '","' . base64_encode($this->_fname) . '","' . base64_encode($this->_mname) . '","' . base64_encode($this->_lname) . '","' . base64_encode(date('d-M-Y', strtotime($dob))) . '","' . base64_encode($gender) . '","' . base64_encode($introduce_by) . '","' . base64_encode($this->_idno) . '","' . base64_encode($this->_mno) . '","' . base64_encode($county) . '","' . base64_encode($mobile) . '","' . base64_encode($this->_pin) . '","' . base64_encode($residence) . '","' . base64_encode($this->_email) . '","' . base64_encode($comments) . '", "' . base64_encode('active') . '","' . base64_encode(date('d-M-Y', strtotime($regdate))) . '","' . base64_encode($member_cate) . '","' . base64_encode($title) . '", "' . base64_encode($floor) . '","' . base64_encode($org_name) . '","' . base64_encode($cro) . '","' . base64_encode($country) . '","' . base64_encode($buildingname) . '","' . base64_encode($freq_payment) . '","' . base64_encode($occupation) . '","' . base64_encode($period_saving) . '","' . base64_encode($region) . '","' . base64_encode($post_address) . '","","' . base64_encode($constituency) . '","' . base64_encode($office_cell) . '","' . base64_encode($office_landline) . '","' . base64_encode($office_email) . '")') or die(mysql_error());
                if ($mqry) {
                    mysql_query('commit');
                    $_SESSION['nmno'] = $idno;

                    echo '<span class="green" >Member registration was successful.<br/> Please Fill in the following relevant data.</span></br>';
                } else {
                    mysql_query('rollback');
                    echo '<span class="red" >Member registration failed</span></br>';
                }
            }
        } else {
            $chqry = mysql_query('select * from newmember where membernumber="' . base64_encode($this->_mno) . '"') or die(mysql_error());
            if (mysql_num_rows($chqry) >= 1) {
                $chrslt = mysql_fetch_array($chqry);
                if ($chrslt['membernumber'] == base64_encode($mnumber)) {
                    echo '<span class="red" >A member with a similar registration number exists</span></br>';
                }
            } else {
                mysql_query('begin');
                $mqry = mysql_query('insert into newmember(photo,firstname,middlename,lastname,dob,gender,recruitedby,idnumber,membernumber,county,mobileno,pinnumber,residence,email,comments,status,regdate,member_cat_id,title_id,floor,org_name,cro_id,country,building_name,frequency_payment,occupation,periodical_saving,region,post_address,post_code,constituency,office_cell,office_landline,office_mail ) values("' . base64_encode($photo) . '","' . base64_encode($this->_fname) . '","' . base64_encode($this->_mname) . '","' . base64_encode($this->_lname) . '","' . base64_encode(date('d-M-Y', strtotime($dob))) . '","' . base64_encode($gender) . '","' . base64_encode($introduce_by) . '","' . base64_encode($this->_idno) . '","' . base64_encode($this->_mno) . '","' . base64_encode($county) . '","' . base64_encode($mobile) . '","' . base64_encode($this->_pin) . '","' . base64_encode($residence) . '","' . base64_encode($this->_email) . '","' . base64_encode($comments) . '", "' . base64_encode('active') . '","' . base64_encode(date('d-M-Y', strtotime($regdate))) . '","' . base64_encode($member_cate) . '","' . base64_encode($title) . '", "' . base64_encode($floor) . '","' . base64_encode($org_name) . '","' . base64_encode($cro) . '","' . base64_encode($country) . '","' . base64_encode($buildingname) . '","' . base64_encode($freq_payment) . '","' . base64_encode($occupation) . '","' . base64_encode($period_saving) . '","' . base64_encode($region) . '","' . base64_encode($post_address) . '","","' . base64_encode($constituency) . '","' . base64_encode($office_cell) . '","' . base64_encode($office_landline) . '","' . base64_encode($office_email) . '")') or die(mysql_error());
                if ($mqry) {

                    mysql_query('commit');
                    $_SESSION['nmno'] = $idno;
                    $users = new Users();
                    $activity = "Added new member  " . $fname . ' ' . $mname . ' ' . $lname;
                    $users->audittrail($_SESSION['users'], $activity, $user);
                    echo '<span class="green" >Member registration was successful.<br/> Please Fill in the following relevant data.</span></br>';
                } else {
                    mysql_query('rollback');
                    echo '<span class="red" >Member registration failed</span></br>';
                }
            }
        }
    }

    public function editmember($users, $ID, $title, $mnumber, $fname, $mname, $lname, $regdate, $dob, $gender, $idno, $mobile, $krapin, $email, $postaldress, $country, $county, $residence, $buildingname, $occupation, $org, $bus_location, $period_save, $freq_payment, $introduced_by, $comment, $status, $member_cate, $cro, $photo) {


        $id = $_REQUEST['$ID'];
        if (namevalidation($fname)) {
//if (phonevalidation($mobile)) {
//if (floatvalidation($idno)) {
            if ($email != "") {
//if (namevalidation($email)) {
                mysql_query('begin');
                if (floatvalidate($photo)) {   // 
                    $chqry = mysql_query('select * from newmember where  idnumber="' . base64_encode($idno) . '" AND  membernumber!="' . base64_encode($mnumber) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) > 1) {
                        echo '<span class="red">Sorry the ID entered is existent</span></br>';
                    } else {

                        $mqry = "UPDATE newmember SET photo='" . base64_encode($photo) . "',firstname='" . base64_encode($fname) . "',middlename='" . base64_encode($mname) . "',lastname='" . base64_encode($lname) . "',dob='" . base64_encode(date('d-M-Y', strtotime($dob))) . "',gender='" . base64_encode($gender) . "',recruitedby='" . base64_encode($introduced_by) . "',idnumber='" . base64_encode($idno) . "',membernumber='" . base64_encode($mnumber) . "',county='" . base64_encode($country) . "',mobileno='" . base64_encode($mobile) . "',pinnumber='" . base64_encode($krapin) . "',residence='" . base64_encode($residence) . "',comments='" . base64_encode($comment) . "',status='" . base64_encode($status) . "',regdate='" . base64_encode($regdate) . "',member_cat_id='" . base64_encode($member_cate) . "',title_id='" . base64_encode($title) . "',org_name='" . base64_encode($org) . "',cro_id='" . base64_encode($cro) . "',country='" . base64_encode($country) . "',building_name='" . base64_encode($buildingname) . "',frequency_payment='" . base64_encode($freq_payment) . "',occupation='" . base64_encode($occupation) . "',periodical_saving='" . base64_encode($period_save) . "',post_address='" . base64_encode($postaldress) . "',business_location='" . base64_encode($bus_location) . "'  WHERE primarykey='" . $ID . "'";

                        $result = mysql_query($mqry);
                        mysql_query($result);

                        if ($mqry) {
                            mysql_query('commit');
                            $users = new Users();
                            $activity = "Edited member " . getMembername($mnumber) . ' details';
                            $users->audittrail($_SESSION['users'], $activity, $user);
                            $alert = '<script type="text/javascript">alert("<span class="green">Member Editing successful</span> ");
 document.location.href="personalinformation.php";
  </script>';
                            echo $alert;
                        } else {
                            mysql_query('rollback');
                            echo '<span class="red">Member Editing failed</span></br>';
                        }
                    }
                } else {
                    $delqry = mysql_query('select * from newmember where primarykey="' . $id . '"') or die(mysql_error());
                    if (mysql_num_rows($delqry) == 1) {

                        $derslt = mysql_fetch_array($delqry);
                        unlink("photos/" . base64_decode($derslt['photo']));
                    }
                    $chqry = mysql_query('select * from newmember where idnumber="' . base64_encode($idno) . '" and membernumber!="' . base64_encode($mnumber) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) > 1) {
                        echo '<span class="red">Sorry the ID entered is existent</span></br>';
                    } else {
                        $mqry = "UPDATE newmember SET photo='" . base64_encode($photo) . "',firstname='" . base64_encode($fname) . "',middlename='" . base64_encode($mname) . "',lastname='" . base64_encode($lname) . "',dob='" . base64_encode(date('d-M-Y', strtotime($dob))) . "',gender='" . base64_encode($gender) . "',recruitedby='" . base64_encode($introduced_by) . "',idnumber='" . base64_encode($idno) . "',membernumber='" . base64_encode($mnumber) . "',county='" . base64_encode($country) . "',mobileno='" . base64_encode($mobile) . "',pinnumber='" . base64_encode($krapin) . "',residence='" . base64_encode($residence) . "',comments='" . base64_encode($comment) . "',status='" . base64_encode($status) . "',regdate='" . base64_encode($regdate) . "',member_cat_id='" . base64_encode($member_cate) . "',title_id='" . base64_encode($title) . "',org_name='" . base64_encode($org) . "',cro_id='" . base64_encode($cro) . "',country='" . base64_encode($country) . "',building_name='" . base64_encode($buildingname) . "',frequency_payment='" . base64_encode($freq_payment) . "',occupation='" . base64_encode($occupation) . "',periodical_saving='" . base64_encode($period_save) . "',post_address='" . base64_encode($postaldress) . "',business_location='" . base64_encode($bus_location) . "'  WHERE primarykey='" . $ID . "'";

                        $result = mysql_query($mqry);
                        mysql_query($result);

                        if ($mqry) {
                            mysql_query('commit');
                            $users = new Users();
                            $activity = "Edited member " . ($mnumber);
                            $users->audittrail($user, $activity);
                            $alert = '<script type="text/javascript">alert("<span class="green">Member Editing successful</span> ");
 document.location.href="personalinformation.php";
  </script>';
                            echo $alert;
                        } else {
                            mysql_query('rollback');
                            echo '<span class="red">Member Editing failed</span></br>';
                        }
                    }
                }
            } else {
                mysql_query('begin');
                if (floatvalidate($photo)) {
                    $chqry = mysql_query('select * from newmember where idnumber="' . base64_encode($idno) . '" and membernumber!="' . base64_encode($mnumber) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) > 1) {
                        echo '<span class="red">Sorry the ID entered is existent</span></br>';
                    } else {
                        $mqry = "UPDATE newmember SET photo='" . base64_encode($photo) . "',firstname='" . base64_encode($fname) . "',middlename='" . base64_encode($mname) . "',lastname='" . base64_encode($lname) . "',dob='" . base64_encode(date('d-M-Y', strtotime($dob))) . "',gender='" . base64_encode($gender) . "',recruitedby='" . base64_encode($introduced_by) . "',idnumber='" . base64_encode($idno) . "',membernumber='" . base64_encode($mnumber) . "',county='" . base64_encode($country) . "',mobileno='" . base64_encode($mobile) . "',pinnumber='" . base64_encode($krapin) . "',residence='" . base64_encode($residence) . "',comments='" . base64_encode($comment) . "',status='" . base64_encode($status) . "',regdate='" . base64_encode($regdate) . "',member_cat_id='" . base64_encode($member_cate) . "',title_id='" . base64_encode($title) . "',org_name='" . base64_encode($org) . "',cro_id='" . base64_encode($cro) . "',country='" . base64_encode($country) . "',building_name='" . base64_encode($buildingname) . "',frequency_payment='" . base64_encode($freq_payment) . "',occupation='" . base64_encode($occupation) . "',periodical_saving='" . base64_encode($period_save) . "',post_address='" . base64_encode($postaldress) . "',business_location='" . base64_encode($bus_location) . "'  WHERE primarykey='" . $ID . "'";

                        $result = mysql_query($mqry);
                        mysql_query($result);

                        if ($mqry) {
                            mysql_query('commit');
                            $users = new Users();
                            $activity = "Edited member " . $mnumber;
                            $users->audittrail($user, $activity);
                            $alert = '<script type="text/javascript">alert("<span class="green">Member Editing successful</span> ");
 document.location.href="personalinformation.php";
  </script>';
                            echo $alert;
                        } else {
                            mysql_query('rollback');
                            echo '<span class="red">Member Editing failed</span></br>';
                        }
                    }
                } else {
                    $delqry = mysql_query('select * from newmember where primarykey="' . $id . '"') or die(mysql_error());
                    if (mysql_num_rows($delqry) >= 1) {

                        $derslt = mysql_fetch_array($delqry);
                        unlink("photos/" . base64_decode($derslt['photo']));
                    }
                    $chqry = mysql_query('select * from newmember where idnumber="' . base64_encode($idno) . '" and membernumber!="' . base64_encode($mnumber) . '"') or die(mysql_error());
                    if (mysql_num_rows($chqry) > 1) {
                        echo '<span class="red">Sorry the ID entered is existent</span></br>';
                    } else {
                        $mqry = "UPDATE newmember SET photo='" . base64_encode($photo) . "',firstname='" . base64_encode($fname) . "',middlename='" . base64_encode($mname) . "',lastname='" . base64_encode($lname) . "',dob='" . base64_encode(date('d-M-Y', strtotime($dob))) . "',gender='" . base64_encode($gender) . "',recruitedby='" . base64_encode($introduced_by) . "',idnumber='" . base64_encode($idno) . "',membernumber='" . base64_encode($mnumber) . "',county='" . base64_encode($country) . "',mobileno='" . base64_encode($mobile) . "',pinnumber='" . base64_encode($krapin) . "',residence='" . base64_encode($residence) . "',comments='" . base64_encode($comment) . "',status='" . base64_encode($status) . "',regdate='" . base64_encode($regdate) . "',member_cat_id='" . base64_encode($member_cate) . "',title_id='" . base64_encode($title) . "',org_name='" . base64_encode($org) . "',cro_id='" . base64_encode($cro) . "',country='" . base64_encode($country) . "',building_name='" . base64_encode($buildingname) . "',frequency_payment='" . base64_encode($freq_payment) . "',occupation='" . base64_encode($occupation) . "',periodical_saving='" . base64_encode($period_save) . "',post_address='" . base64_encode($postaldress) . "',business_location='" . base64_encode($bus_location) . "'  WHERE primarykey='" . $ID . "'";
                        $result = mysql_query($mqry);
                        mysql_query($result);

                        if ($mqry) {
                            mysql_query('commit');
                            $users = new Users();
                            $activity = "Edited member " . $mnumber;
                            $users->audittrail($user, $activity);
                            $alert = '<script type="text/javascript">alert("<span class="green">Member Editing successful</span> ");
 document.location.href="personalinformation.php";
  </script>';
                            echo $alert;
                        } else {
                            mysql_query('rollback');
                            echo '<span class="red">Member Editing failed</span></br>';
                        }
                    }
                }
            }
        } else {
            echo '<span class="red">Sorry First Name is not a valid name</span></br>';
        }
    }

    public function editkin($nxid, $mid, $fname, $mname, $lname, $rela, $idno, $mobile, $pic, $comments) {
        $qry = mysql_query('select * from newmember where membernumber="' . base64_encode($mid) . '"') or die(mysql_error());
        $row = mysql_fetch_array($qry);
        if (mysql_num_rows($qry) == 1) {

            $adqry = mysql_query('update nextofkin set memberno="' . ($row['membernumber']) . '",
                  fname="' . base64_encode($fname) . '", mname="' . base64_encode($mname) . '", lname="' . base64_encode($lname) . '",
                  relationship="' . base64_encode($rela) . '", idno="' . base64_encode($idno) . '", mobile="' . base64_encode($mobile) . '", pic="' . base64_encode($pic) . '",
                  comments="' . base64_encode($comments) . '" where id="' . $nxid . '"') or die(mysql_error());
            if ($adqry) {

                echo '<span class="green" >Next of kin Edited successfully</span></br>';
            } else {
                echo '<span class="red" >Sorry next of kin failed to Edit</span></br>';
            }
        } else {
            echo '<span class="red" >Please register a Member first</span></br>';
        }
    }

    public function infomember($user, $mno, $dob, $dist, $divi, $loc, $sub, $code, $station, $staff, $terms, $recruit, $sacco, $fee, $nation, $dates) {
        $date = date("d-M-Y", strtotime($dates));
        if (namevalidation($dist)) {
            if (namevalidation($sub)) {
                if (namevalidation($terms)) {
                    if (floatvalidation($fee)) {
                        if ($mno != "") {
                            if (namevalidation($divi)) {
                                mysql_query('begin');
                                $mqry = mysql_query('update newmember set dob="' . base64_encode($dob) . '", district="' . base64_encode($dist) . '", division="' . base64_encode($divi) . '", location="' . base64_encode($loc) . '", sublocation="' . base64_encode($sub) . '",
                    pcode="' . base64_encode($code) . '", staffno="' . base64_encode($staff) . '", station="' . base64_encode($station) . '", terms="' . base64_encode($terms) . '", recruitedby="' . base64_encode($recruit) . '",
                        cursacco="' . base64_encode($sacco) . '", commfee="' . base64_encode($fee) . '", nation="' . base64_encode($nation) . '",
                            regfeedate="' . base64_encode($date) . '" where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
                                if ($mqry) {
                                    mysql_query('commit');
                                    $_SESSION['nmno'] = $idno;

                                    echo '<span class="green" >Member registration is now complete</span></br>';
                                } else {
                                    mysql_query('rollback');
                                    echo '<span class="red" >Member registration failed to complete</span></br>';
                                }
                            } else {
                                echo '<span class="red" >Sorry the Division entered is not valid</span></br>';
                            }
                        } else {
                            echo '<span class="red" >The Member number does not exist</span>';
                        }
                    } else {
                        echo '<span class="red" >Sorry the Committment fee entered is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry the Terms of service entered is not valid</span></br>';
                }
            } else {
                echo '<span class="red" >Sorry the Sub-location entered is not a valid name</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry the District entered is not a valid name</span></br>';
        }
    }

    public function addkin($user, $mid, $fname, $mname, $lname, $rela, $perc, $idno, $mobile, $pic, $comments, $dob) {
        $qry = mysql_query('select * from newmember where membernumber="' . base64_encode($mid) . '"') or die(mysql_error());
        $row = mysql_fetch_array($qry);
        if (mysql_num_rows($qry) == 1) {
            $chkin = mysql_query('select * from nextofkin where fname="' . base64_encode($fname) . '" and lname="' . base64_encode($lname) . '" and memberno="' . base64_encode($mid) . '"') or die(mysql_error());
            if (mysql_num_rows($chkin) >= 1) {
                echo '<span class="red" >Sorry ' . $fname . '  ' . $lname . ' has already been added</span></br>';
            } else {
                if (namevalidation($fname)) {
                    if (namevalidation($lname)) {
                        if (namevalidation($rela)) {


                            $adqry = mysql_query('insert into nextofkin values("","' . ($row['membernumber']) . '",
                  "' . base64_encode($fname) . '","' . base64_encode($mname) . '","' . base64_encode($lname) . '",
                  "' . base64_encode($rela) . '","' . base64_encode($perc) . '","' . base64_encode($idno) . '" ,"' . base64_encode($dob) . '","' . base64_encode($mobile) . '","' . base64_encode($pic) . '",
                  "' . base64_encode($comments) . '", "' . base64_encode('active') . '")') or die(mysql_error());
                            if ($adqry) {

                                echo '<div style="color: green">Next of kin successfully registered</div>';
                                echo $alert;

                                echo '<span   class="green" ></span></br>';
                            } else {
                                echo '<span class="red" >Sorry next of kin failed to save</span></br>';
                            }
                        } else {
                            echo '<span class="red" >Sorry Relationship is not valid</span></br>';
                        }
                    } else {
                        echo '<span class="red" >Sorry Last Name is not valid</span></br>';
                    }
                } else {
                    echo '<span class="red" >Sorry First Name is not valid</span></br>';
                }
            }
        } else {
            echo '<span class="red" >Please register a Member first</span></br>';
        }
    }

    public function upload($user, $mno, $photos, $pass, $othr1, $othr2) {

        $query = mysql_query("INSERT INTO  uploads (mno,signature,passport,file1,file2 )  VALUES ('$mno','$photos','$pass','$othr1','$othr2')  ");
        if ($query) {
            $users = new Users();
            $activity = "data uploded  ";
            $users->audittrail($user, $activity);
            echo '<span class="green"> transcations successful </span></br>';
        }
    }

    public function membergroup($user, $mno, $gname) {
        $chemeqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($chemeqry) == 1) {
            $checkqry = mysql_query('select * from groups where memberno="' . base64_encode($mno) . '" and groupid="' . base64_encode($gname) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
            if (mysql_num_rows($checkqry) == 1) {
                echo '<span class="red" >Sorry ' . getMembername($mno) . ' is already regeistered to ' . groupname($gname) . '</span></br>';
            } else {
                $adqqry = mysql_query('insert into groups values("","' . base64_encode($gname) . '","' . base64_encode($mno) . '","' . base64_encode("active") . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
                if ($adqqry) {

                    $getgrpname = groupname($gname);
                    $getgrpgl = getglid($getgrpname);
                    $user = new User;
                    $user->memberaccounts($user, $mno, $getgrpgl);
                    $users = new Users();
                    $activity = "Added member  " . getMembername(base64_encode($mno)) . ' to group ' . groupname($gname);
                    $users->audittrail($user, $activity, $user);
                    echo '<span class="green" >' . getMembername(base64_encode($mno)) . ' has been registered to ' . groupname($gname) . ' Group successfully</span></br>';
                } else {
                    echo '<span class="red" >' . getMembername($mno) . ' registration to ' . groupname($gname) . ' failed</span></br>';
                }
            }
        } else {
            echo '<span class="red" >Sorry member number not found</span></br>';
        }
    }

    public function memberaccounts($user, $mno, $gname) {

        //$one = mt_rand(1000, 9999);

        $two = getglcode($gname) . '' . $mno;
        $chemeqry = mysql_query('select * from newmember where membernumber="' . base64_encode($mno) . '"') or die(mysql_error());
        if (mysql_num_rows($chemeqry) == 1) {
            //if both gl and fixed deposit account are present
            if ($gname != "") {
                $checkqry = mysql_query('select * from memberaccs where mno="' . base64_encode($mno) . '" and glaccid="' . base64_encode($gname) . '" ') or die(mysql_error());
                //check if member has the gl account selected
                if (mysql_num_rows($checkqry) >= 1) {
                    echo '<span class="red" >' . getMembername(base64_encode($mno)) . ' already has an ' . getglacc($gname) . ' Account.</span></br>';
                } else {
                    $adqqry = mysql_query('insert into memberaccs values("","' . base64_encode($mno) . '","' . base64_encode($two) . '","' . base64_encode($gname) . '","' . base64_encode("active") . '", "' . base64_encode($user) . '", "' . base64_encode(date('d-M-Y')) . '")') or die(mysql_error());
                    if ($adqqry) {
                        echo '<span class="green" > Accounts successfully created for ' . getMembername(base64_encode($mno)) . '</span></br>';
                        ////sms
                        $sms = 'Dear ' . getMembername($chemeqry['membernumber']) . ',your account is now created ' . getglacc($gname) . ' Account';
                        $res = phonenumber(base64_decode($chemeqry['membernumber']));
                        echo "<script type=\"text/javascript\">
        window.open('http://sms.truehost.org/sms/send_sms.php?res=" . $res . "&mess=" . $sms . "', '_blank')
    </script>";


                        /////sms     
                    }
                }
            } else {
                echo '<span class="red" >No Account Selected.Please Select and try Again</span></br>';
            }
        } else {
            echo '<span class="red" >Sorry member number not found</span></br>';
        }
    }

    public function addbankdetails($mno, $bankname, $branch, $account_type, $accountno) {
        $chemeqry = mysql_query('select * from bank_details where member_number="' . base64_encode($mno) . '" and account_number="' . base64_encode($accountno) . '" and bank_id="' . base64_encode($bankname) . '" and branch_id="' . base64_encode($branch) . '" ') or die(mysql_error());
        if (mysql_num_rows($chemeqry) >= 1) {
            $alertr = '<script type="text/javascript">alert("Account number  Already Exist!");</script>';
            echo $alertr;
        } else {
            $adqqry = mysql_query('insert into bank_details (bank_id,branch_id,member_number,account_number,account_type,status)values("' . base64_encode($bankname) . '","' . base64_encode($branch) . '","' . base64_encode($mno) . '","' . base64_encode($accountno) . '","' . base64_encode($account_type) . '","' . base64_encode('active') . '")') or die(mysql_error());
            if ($adqqry) {

                $alertr = '<script type="text/javascript">alert("User Account Created succeesfuly");</script>';
                echo $alertr;
            } else {
                $alertr = '<script type="text/javascript">alert("User account Failed");</script>';
                echo $alertr;
            }
        }
    }

    //add member category
    public function AddMemberCategory($user, $prefix, $cat_name) {
        $catqry = mysql_query('select * from member_category where prefix="' . base64_encode($prefix) . '" and category_name="' . base64_encode($cat_name) . '"') or die(mysql_error());
        if (mysql_num_rows($catqry) >= 1) {
            $alertr = '<script type="text/javascript">alert("Categoty Already Exist!");</script>';
            echo $alertr;
        } else {
            $addcat = mysql_query('INSERT INTO member_category (prefix,category_name,status)VALUES("' . base64_encode($prefix) . '","' . base64_encode($cat_name) . '","' . base64_encode('active') . '")') or die(mysql_error());
            if ($addcat) {
                $users = new Users();
                $activity = "Added member category  " . $cat_name;
                $users->audittrail($user, $activity, $user);
                $alertr = '<script type="text/javascript">alert("Created succeessfuly");</script>';
                echo $alertr;
            } else {
                $alertr = '<script type="text/javascript">alert("Creating Failed");</script>';
                echo $alertr;
            }
        }
    }

    //add titles
    public function AddMemberTitles($user, $title) {
        $tiltqry = mysql_query('select * from memebr_title where title="' . base64_encode($title) . '" and status="' . base64_encode('active') . '"') or die(mysql_error());
        if (mysql_num_rows($tiltqry) >= 1) {
            $alertr = '<script type="text/javascript">alert("Title Already Exist!");</script>';
            echo $alertr;
        } else {
            $addtil = mysql_query('INSERT INTO memebr_title (title,status)VALUES("' . base64_encode($title) . '","' . base64_encode('active') . '")') or die(mysql_error());
            if ($addtil) {
                $users = new Users();
                $activity = "Added member title  " . $title;
                $users->audittrail($user, $activity, $user);
                $alertr = '<script type="text/javascript">alert("Title Added succeessfuly");</script>';
                echo $alertr;
            } else {
                $alertr = '<script type="text/javascript">alert("Creating Failed");</script>';
                echo $alertr;
            }
        }
    }

    public function addMemberbank($bankname) {
        $qrybnk = mysql_query('select * from member_banks where bank_name="' . ($bankname) . '" and status="' . base64_encode('active') . '" ') or die(mysql_error());
        if (mysql_num_rows($qrybnk) >= 1) {
            $alertr = '<script type="text/javascript">alert("Bank  Already Exist!");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $addbnk = mysql_query('insert into member_banks (bank_name,status)values("' . ($bankname) . '","' . base64_encode('active') . '")') or die(mysql_error());
            if ($addbnk) {

                $alertr = '<script type="text/javascript">alert("Bank Added succeesfuly");document.location.href="bank_details.php";</script>';
                echo $alertr;
            } else {
                $alertr = '<script type="text/javascript">alert("Bank Failed");document.location.href="bank_details.php";</script>';
                echo $alertr;
            }
        }
    }

    public function addMemberbankBranch($bnkid, $bankname) {
        $qrybranc = mysql_query('select * from memberbank_branches where bank_id="' . $bnkid . '" and branch_name="' . ($bankname) . '" and status="' . base64_encode('active') . '" ') or die(mysql_error());
        if (mysql_num_rows($qrybranc) >= 1) {
            $alertr = '<script type="text/javascript">alert("Branch  Already Exist!");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $addbnk = mysql_query('insert into memberbank_branches ( bank_id,branch_name,status)values("' . $bnkid . '","' . ($bankname) . '","' . base64_encode('active') . '")') or die(mysql_error());
            if ($addbnk) {

                $alertr = '<script type="text/javascript">alert("Branch Added succeesfuly");document.location.href="bank_details.php";</script>';
                echo $alertr;
            } else {
                $alertr = '<script type="text/javascript">alert("Bank Failed");document.location.href="bank_details.php";</script>';
                echo $alertr;
            }
        }
    }

    public function updateMemberbank($bnkId, $bkkname) {

        $addbnkv = mysql_query('update  member_banks set bank_name="' . $bkkname . '" where id="' . $bnkId . '"') or die(mysql_error());
        if ($addbnkv) {

            $alertr = '<script type="text/javascript">alert("Bank Updated succeesfuly");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $alertr = '<script type="text/javascript">alert("Error. Failed to add");document.location.href="bank_details.php";</script>';
            echo $alertr;
        }
    }

    public function deleteMemberbank($bnkId) {

        $addbnk = mysql_query('update  member_banks set status="' . base64_encode('deleted') . '" where id="' . $bnkId . '"') or die(mysql_error());
        if ($addbrnk) {

            $alertr = '<script type="text/javascript">alert("Bank deleted succeesfuly");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $alertr = '<script type="text/javascript">alert("Error. Failed to delet");document.location.href="bank_details.php";</script>';
            echo $alertr;
        }
    }

    public function updatebankBranch($id, $bnkId, $brankname) {

        $addbrnk = mysql_query('update memberbank_branches set bank_id="' . $bnkId . '",branch_name="' . $brankname . '" WHERE id="' . $id . '"') or die(mysql_error());
        if ($addbrnk) {

            $alertr = '<script type="text/javascript">alert("Branch Update succeesfuly");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $alertr = '<script type="text/javascript">alert("Error. Failed to update");document.location.href="bank_details.php";</script>';
            echo $alertr;
        }
    }

    public function deletebankBranch($id) {

        $addbrnk = mysql_query('update memberbank_branches set status="' . base64_encode('deleted') . '" WHERE id="' . $id . '"') or die(mysql_error());
        if ($addbrnk) {

            $alertr = '<script type="text/javascript">alert("Branch deleted succeesfuly");document.location.href="bank_details.php";</script>';
            echo $alertr;
        } else {
            $alertr = '<script type="text/javascript">alert("Error. Failed to delete");document.location.href="bank_details.php";</script>';
            echo $alertr;
        }
    }

}

?>