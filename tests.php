<?php

function contribute_to_loan($user, $mno, $vreg, $payeeid, $payee, $tname, $ptype, $amount, $dfrom, $dto, $dates, $session, $tid, $submit, $bnkid){
    $acnaqr = mysql_query('select * from loansettings where lname="' . base64_encode(getglacc($tname)) . '" and status="' . base64_encode("Active") . '"') or die(mysql_error());
    while ($lrslt = mysql_fetch_array($acnaqr)) {

        /* $sth=mysql_query("SELECT * FROM  loanapplication where membernumber='" . base64_encode($mno) . "' AND loantype='".$lrslt['id']."'  AND status='".  base64_encode('pending')."'  ");
          if(mysql_num_rows($sth >=1 )){ */
        if ($lrslt['ratetype'] == base64_encode('1')) {

            $loanamt = loanamt(loantid($mno, getloanid(getglacc($tname))));
        } else {

            $loanamt = principlepaid(loantid($mno, getloanid(getglacc($tname))));
        }
        //check if loan is time based 
        $loanintrest = loaninterestratetype($lrslt['id']);
        if (($loanintrest) == ('timed')) {
            $rate = (loanrate($lrslt['id']) / 100) / 12;
            $intrest = ceil($rate * $loanamt);
            $ttid = loantid($mno, getloanid(getglacc($tname)));
            // function to return x value where x is no of days
            //between today and date ought to have been paid
            $dateoughttopay = datetopay($ttid);
            $paiddate = strtotime($date);  // the day member come to pay the loan

            if ($paiddate == $dateoughttopay) {

                $intrst = ($intrest);
            } else if ($paiddate > $dateoughttopay) {

                $days = (($dateoughttopay - $paiddate) / 86400);   //dividing with 86400 to convert to days                                                                    
                $intrst = ceil($intrest + ($days / 30) * $intrest);
            } else {

                $days = (($paiddate - $dateoughttopay) / 86400);   //dividing with 86400 to convert to days                                                                    
                $intrst = ceil($intrest + ($days / 30) * $intrest);
            }

            //dont use time baesd transaction
        } else {
            $rate = (loanrate($lrslt['id']) / 100) / 12;
            $intrstx = $rate * $loanamt;
            $intrst = ceil($intrstx);
        }

        if ($paiddate > $dateoughttopay) {

            $rate2 = (loanfinerate($lrslt['id']) / 100) / 12;
            $fine = $rate2 * $loanamt;
            $newfine = floor($fine);
            $newuser = new User();
            $newuser->addextracash($user, $mno, loantid($mno, getloanid(getglacc($tname))), loanid(loantid($mno, getloanid(getglacc($tname)))), '144', $newfine);
        }


        $extrafee = getextrafee(loantid($mno, getloanid(getglacc($tname))));
        $addextrafeepaid = addextrafeepaid(loantid($mno, getloanid(getglacc($tname))));

        if ($lrslt['ratetype'] == base64_encode('2')) {

            addchargedinterest(loantid($mno, getloanid(getglacc($tname))), $intrst, $mno, $date);


            if ($extrafee > $addextrafeepaid) {

                $newextrabal = $extrafee - $addextrafeepaid;

                if ($amount < $newextrabal) {

                    if ($amount > 0) {
                        mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }
                } else {

                    $newamount2 = $amount - $newextrabal;

                    if ($newextrabal > 0) {
                        mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newextrabal)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }

                    if ($newamount2 > $intrst) {

                        $newamt = $newamount2 - $intrst;

                        if ($newamt >= 0) {

                            mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamt)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                        }

                        if ($newamount2 >= 0) {

                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                            $prim_Kye = mysql_insert_id();
                        }

                        if ($intrst >= 0) {
                            mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($intrst)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '", "","' . $session . '")') or die(mysql_error());
                        }
                    } else {

                        if ($newamount2 >= 0) {
                            mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newamount2)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                        }

                        if ($newamount2 >= 0) {

                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                            $prim_Kye = mysql_insert_id();
                        }
                    }
                }
            } elseif ($amount > $intrst) {

                $newamt = $amount - $intrst;

                if ($newamt >= 0) {

                    mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamt)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                }

                if ($amount >= 0) {

                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                    $prim_Kye = mysql_insert_id();
                }

                if ($intrst >= 0) {
                    mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($intrst)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '", "","' . $session . '")') or die(mysql_error());
                }
            } else {

                if ($amount >= 0) {
                    mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                }

                if ($amount >= 0) {

                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                    $prim_Kye = mysql_insert_id();
                }
            }
        } elseif ($lrslt['ratetype'] == base64_encode('4')) {

            $tid = loantid($mno, getloanid(getglacc($tname)));
            $loanAmount = principalamount($tid); //applied amount
            $loanAmountPaid = loanRepaymentPrincipal($tid); ////loan balance
            $amountPaidBal = $loanAmount - $loanAmountPaid;
            $totalIntCharged = totalloanint($tid);
            $dateOfDisbusment = dateOfDbrs($tid);
            $getGracePeriod = getGracePeriod($tid);
            $fDate = strtotime($dateOfDisbusment) + ($getGracePeriod * 86400);
            $date = strtotime($date);

            $firstDayOfPayment = date('d-M-Y', ($fDate));
            $date2pay = strtotime($firstDayOfPayment);
            $day = '86400';

            $rate = (loanrate($lrslt['id']) / 100) / 12;


            if ($date < $date2pay) {
                $days = ( $date2pay - $date) / $day;
                $weeks = floor($days / 7);

                if ($weeks >= 4) {
                    $intrestAmt = 1 * (5 / 100);
                    $int = $amountPaidBal * $intrestAmt;
                } else {

                    $intrestAmt = $weeks * (5 / 100);
                    $newInt = $amountPaidBal * $intrestAmt;

                    $int = $totalIntCharged - $newInt;     /////interst charged
                }
            } else {
                $days = ( $date - $date2pay) / $day;

                if ($days == 0) {

                    $intrestAmt = 4 * (5 / 100);
                } else {
                   $weeks = floor($days / 7);


                    $intrestAmt = $weeks * (5 / 100);
                }
                  $int = $amountPaidBal * $intrestAmt;
            }

           $totalLoanBal = $amountPaidBal + $int;

            //////////changes of payments////////////

            if ($amount >= $totalLoanBal) {

                $newAmount = $totalLoanBal - $int;
                //memeber conteribution
                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($totalLoanBal) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                $prim_Kye = mysql_insert_id();
                //loan repayment
                mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newAmount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                //intrest
                mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($int)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
            } else {

                $newAmount = $amount - $int;



                //memeber conteribution
                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                $prim_Kye = mysql_insert_id();
                //loan repayment
                mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newAmount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                //intrest
                mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($int)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
            }
        } else {

            $totaloaninterest = getinterest(loantid($mno, getloanid(getglacc($tname))));
            $interstpaid = addinterestpaid(loantid($mno, getloanid(getglacc($tname))));
            $bal = $totaloaninterest - $interstpaid;

            //extra fee code starts here
            if ($extrafee > $addextrafeepaid) {

                $newextrabal = $extrafee - $addextrafeepaid;

                if ($amount < $newextrabal) {

                    if ($amount > 0) {
                        mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }
                } else {

                    $newamount2 = $amount - $newextrabal;

                    if ($newextrabal > 0) {
                        mysql_query('insert into paymentin values("' . base64_encode('144') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newextrabal)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }

                    if ($totaloaninterest > $interstpaid) {

                        $newinterest = $totaloaninterest - $interstpaid;

                        if ($newamount2 < $newinterest) {

                            if ($newamount2 > 0) {
                                mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newamount2)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                            }

                            if ($newamount2 >= 0) {

                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                $prim_Kye = mysql_insert_id();
                            }
                        } else {

                            $principle = $newamount2 - $newinterest;

                            if ($principle > 0) {
                                mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($principle)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                            }

                            if ($newinterest > 0) {
                                mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newinterest)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                            }

                            if ($newamount2 > 0) {
                                $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                                $prim_Kye = mysql_insert_id();
                            }
                        }
//end of interest
                    } else {


                        if ($newamount2 > 0) {
                            mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($newamount2)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                        }

                        if ($newamount2 > 0) {
                            $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($newamount2) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                            $prim_Kye = mysql_insert_id();
                        }
                    }
                }
            } elseif ($totaloaninterest > $interstpaid) {


                $newinterest = $totaloaninterest - $interstpaid;

                if ($amount < $newinterest) {

                    if ($amount > 0) {

                        mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($amount)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }

                    if ($amount >= 0) {

                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                        $prim_Kye = mysql_insert_id();
                    }
                } else {

                    $principle = $amount - $newinterest;

                    if ($principle > 0) {
                        mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($principle)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                    }

                    if ($newinterest > 0) {
                        mysql_query('insert into paymentin values("' . base64_encode('125') . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode(round($newinterest)) . '"
,"' . base64_encode($ptype) . '","' . base64_encode('sacco officials') . '","' . base64_encode('active') . '","' . base64_encode(getMembername(base64_encode($mno))) . '",
"' . base64_encode($mno) . '","' . base64_encode($vreg) . '","' . base64_encode($date) . '", "' . base64_encode($bnkid) . '","","' . $session . '")') or die(mysql_error());
                    }

                    if ($amount > 0) {
                        $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                        $prim_Kye = mysql_insert_id();
                    }
                }
//end of interest
            } else {


                if ($amount > 0) {
                    mysql_query('insert into loanpayment values("","' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($mno) . '","' . base64_encode(round($amount)) . '","' . $session . '","' . base64_encode($date) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                }

                if ($amount > 0) {
                    $cmqry = mysql_query('insert into membercontribution values("' . base64_encode($ptype) . '","' . base64_encode($this->_mno) . '",
"' . base64_encode($payee) . '","' . base64_encode($payeeid) . '","' . base64_encode($tname) . '","' . base64_encode($amount) . '",
"' . base64_encode($vreg) . '","' . base64_encode($dfrom) . '","' . base64_encode($dto) . '","' . base64_encode($date) . '","","' . $session . '", "' . loantid($mno, getloanid(getglacc($tname))) . '","' . base64_encode($bnkid) . '")') or die(mysql_error());
                    $prim_Kye = mysql_insert_id();
                }
            }
        }

        if ($cmqry) {
            $users = new Users();
            $activity = "Added contribution amount " . ($amount) . 'for' . base64_encode($mno);
            $users->audittrail($user, $activity, $mno);
            $alert = '<script type="text/javascript">alert("contribution added successfully!");</script>';
            echo $alert;

            loanupdate($mno, loantid($mno, getloanid(getglacc($tname))), $tname);
        }
    }

    if ($submit == "2") {
        contributionreceipt($this->_user, $prim_Kye, $mno, $vreg, $tid, $payeeid, $payee, $tname, $ptype, $newamt, $dfrom, $dto, $_SESSION['session'], $date);
    }
}                                                                