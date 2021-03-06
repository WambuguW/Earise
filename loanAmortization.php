<?php
class amort {

    var $amount;      //amount of the loan
    var $rate;        //percentage rate of the loan
    var $years;        //number of years of the loan
    var $npmts;        //number of payments of the loan
    var $mrate;        //monthly interest rate
    var $tpmnt;        //total amount paid on the loan
    var $tint;         //total interest paid on the loan
    var $pmnt;         //monthly payment of the loan

//amort is the constructor and sets up the variable values
//using the three values passed to it.

    function amort($amount = 0, $rate = 0, $years = 0) {
        $this->amount = $amount; //amount of the loan
        $this->rate = $rate; //yearly interest rate in percent
        $this->years = $years; //length of loan in years
        $this->npmts = $years; //number of payments (12 per year)
        $this->mrate = $rate / 1200; //monthly interest rate		

        if ($amount * $rate * $years > 0) {
////loan reference number--->$_SESSION['ltid']
            
            //loantype->reducing or straight line or mictofinance
            if (loantyper($_SESSION['ltid']) == '2') {

                $this->pmnt = $amount * ($this->mrate / (1 - pow(1 + $this->mrate, -$this->npmts))); //monthly payment
                $this->tpmnt = $this->pmnt * $this->npmts; //total amount paid at end of loan
                $this->tint = $this->tpmnt - $amount; //total amount of interest paid at end of loan
            } else {

                $this->tpmnt = $this->amount + ($this->amount * $this->mrate * $this->years); //total amount paid at end of loan
                $this->pmnt = ($this->tpmnt) / $this->npmts; //monthly payment
                $this->tint = $this->amount * $this->mrate * $this->years; //total amount of interest paid at end of loan
            }
        }  else {
            $this->pmnt = 0;
            $this->npmts = 0;
            $this->mrate = 0;
            $this->tpmnt = 0;
            $this->tint = 0;
        }
    }

//returns the monthly payment in dolars (two decimal places)
    function payment() {
        return sprintf("%01.2f", $this->pmnt);
    }

//returns the total amount paid at the end of the loan in dolars
    function totpayment() {
        return sprintf("%01.2f", $this->tpmnt);
    }

//returns the total interest paid at the end of the loan in dolars
    function totinterest() {
        return sprintf("%01.2f", $this->tint);
    }

//displays the form to enter amount, rate and length of loan in years
    function showForm() {


       /* if (isset($_POST['process']) && !isset($_SESSION['ltid'])) {
            echo '<span class="red">Please apply for a loan first</span></br>';
        }*/
        if (isset($_POST['process']) && isset($_SESSION['ltid'])) {
            $gqry = mysql_query('select * from guarantors where memberno="' . base64_encode($_SESSION['lmid']) . '" and status="' . base64_encode("granted") . '"') or die(mysql_error());
            // if (mysql_num_rows($gqry) >= 1) { 
            $newuser = new User();


            $gdqry = mysql_query('select * from loanapplication where transactionid="' . base64_encode($_SESSION['ltid']) . '"') or die(mysql_error());
            $gdrslt = mysql_fetch_array($gdqry);
            //disbusment date
            $date = strtotime($_SESSION['disburseDate']);
            
            //borrow the amount function
            $newuser->borrowedloan($_SESSION['users'], $_SESSION['ltid'], $_SESSION['amount'], $this->pmnt, $this->tint, $this->npmts, date('d-M-Y',$date));
           
            $loanid = (base64_decode($gdrslt['loantype']));
           

            for ($i = 0; $i < count($_POST['date']); $i++) {
                $date = $_POST['date'][$i];
                $payno = $_POST['payno'] [$i];
                $start_bal = $_POST ['start_bal'] [$i];
                $interest_payment = $_POST['interest_payment'][$i];
                $principal_payment = $_POST['principal_payment'] [$i];
                $end_bal = $_POST ['end_bal'] [$i];
                $cumulative_interest = $_POST ['cumulative_interest'][$i];
                $cumulative_payment = $_POST ['cumulative_payment'][$i];

                $newuser->addloanrep($_SESSION['users'], base64_encode($_SESSION['lmid']), base64_encode($loanid), base64_encode($_SESSION['ltid']), strtotime($date), base64_encode($payno), base64_encode($start_bal), base64_encode($interest_payment), base64_encode($principal_payment), base64_encode($end_bal), base64_encode($cumulative_interest), base64_encode($cumulative_payment));
            }
            //}
        }
        print "<h1 align='center'>Amortization Schedule</h1>";
        print "<p align='center'> </p>";
        print "<form action='$PHP_SELF' method='POST' name='amort'>";
        print '<table id="testTable" class="table table-striped table-bordered table-hover">';
        print "<tr><td width='33%' align='center' height='35'>";
        print "<dl><dt>Amount of Loan</dt><dt>(in " . getsymbol() . ", no commas)</dt>";
        print "<dt><input type='text' name='amount'  value='" . $_SESSION['amount'] . "' align='top' maxlength='6' size='20'>";
        print "</dt></dl></td>";
        print "<td width='33%' height='35' align='center'>";
        print "<dl><dt>Annual Interest Rate</dt><dt>(in percent)</dt>";
        print "<dt><input type='text' name='rate'  value='" . (loanrate($_SESSION['ltype']) ) . "' align='top' maxlength='5' size='20'>";
        print "</dt></dl></td>";
        print "<td width='34%' height='35' align='center'>";
        print "<dl><dt>Length of Loan</dt><dt>(in months)</dt>";
        print "<dt><input type='text' name='years' value='" . nmonths($_SESSION['users'], $_SESSION['ltid'], $_SESSION['lmid']) . "' align='top' maxlength='2' size='20'>";
        print "</dt></dl></td></tr></table>";
    }

//if $show is false:
//     displays:
//               monthly payment
//               number of payments in the loan
//               total paid at end of loan
//               total interest paid at end of loan
//if $show is true:
//    displays: everything for false case plus the amortization table

    function  showTable() {

        print '<table id="testTable" class="table table-striped table-bordered table-hover">' . "<tr><td width='25%' align='center'><dt>Total Payments</dt>";
        print "<dt>";
        print '' . getsymbol() . " " . round($this->tpmnt) . ".00";
        print "</dt></td>";
        print "<td width='25%' align='center'><dt>Total Interest</dt>";
        print "<dt>";
        print '' . getsymbol() . " " . round($this->tint) . ".00";
        print "</dt></td>";
        /* print "</tr></table>";
          print "<table border='1' width='100%'>";
          print "<tr>";
          print "<td width='33%' align='center'><dt>Monthly Interest Rate</dt>";
          print "<dt>";
          print sprintf("$%01.2f",$this->mrate*100);
          print "</dt></td>"; */

        print "<td width='25%' align='center'><dt>Number of Monthly Payments</dt>";
        print "<dt>";
        print $this->npmts;
        print "</dt></td>";

        print "<td width='25%' align='center'><dt>Monthly Payment</dt>";
        print "<dt>";
        print '' . getsymbol() . " " . round($this->pmnt) . ".00";
        print "</dt>";
        print "</td></tr>";


        $installment = $_SESSION['norep'];
        $appdate = strtotime($_SESSION['disburseDate']);
        $gracep = $_SESSION['gperiod'];
        $paymode = $_SESSION['mode'];


        $interval = $installment - 1;
        $datelast = $interval . $paymode;
        $datem = +"1" . $paymode;
        $stdate = $appdate + $gracep * 1 * 24 * 60 * 60;
        $startdate = strtotime(date('d-M-Y', $stdate));
        $enddate = strtotime($datelast, $startdate);




        //if ($show) {
        print "</table><table  class='tables' border='1' width='100%'><tr>";
        while ($startdate <= $enddate) {
            echo '<td><input type="hidden" name="date[]" value="' . date("d-M-Y", $startdate) . '">' . date("d-M-Y", $startdate) . '&nbsp;</td>';
            $startdate = strtotime($datem, $startdate);
        }
        print "</tr></table><table class='tables' border='1' width='100%'><tr>";
        print "<th width='7%' align='center'>Payment Number</th>";
        print "<th width='10%' align='center'>Beginning Balance</th>";
        print "<th width='10%' align='center'>Interest Payment</th>";
        print "<th width='14%' align='center'>Principal Payment</th>";
        print "<th width='14%' align='center'>Ending Balance</th>";
        print "<th width='14%' align='center'>Cumulative Interest</th>";

        print "<th width='14%' align='center'>Installment Payment</th>";
        print "<th width='14%' align='center'>Cumulative Payments</th>";


        print "</tr>";


        $ebal = $this->amount;
        $ppmnt = $ebal / $this->npmts;
        $ccint = 0.0;
        $cpmnt = 0.0;



        for ($pnum = 1; $pnum <= $this->npmts; $pnum++) {

            print '<input type="hidden" name="payno[]" value="' . $pnum . '">' . "<tr><td width='14%' align='center'>$pnum</td>";
            $bbal = $ebal;
            print '<input type="hidden" name="start_bal[]" value="' . $bbal . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($bbal), 2) . "</td>";

            if (loantyper($_SESSION['ltid']) == '2') {

                if ($this->mrate == 0) {

                    $ipmnt = 0; //$bbal * $this->mrate;
                    print'<input type="hidden" name="interest_payment[]" value="' . $ipmnt . '">' . "<td width='7%' align='right'>" . getsymbol() . " " . number_format(round($ipmnt), 2) . "</td>";
                    print '<input type="hidden" name="principal_payment[]" value="' . $ppmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ppmnt), 2) . "</td>";
                    $ebal = $bbal - $ppmnt;
                    print '<input type="hidden" name="end_bal[]" value="' . $ebal . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ebal), 2) . "</td>";
                    $ccint = 0; //$ccint + $ipmnt;
                    print '<input type="hidden" name="cumulative_interest[]" value="' . $ccint . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ccint), 2) . "</td>";
                    $cpmnt = $cpmnt + $this->pmnt;
                    print '<input type="hidden" name="cumulative_payment[]" value="' . $cpmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($cpmnt), 2) . "</td>";
                } else {



                    $ipmnt = $bbal * $this->mrate;
                    print'<input type="hidden" name="interest_payment[]" value="' . $ipmnt . '">' . "<td width='7%' align='right'>" . getsymbol() . " " . number_format(round($ipmnt), 2) . "</td>";
                    print '<input type="hidden" name="principal_payment[]" value="' . $ppmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ppmnt), 2) . "</td>";
                    $ebal = $bbal - $ppmnt;
                    print '<input type="hidden" name="end_bal[]" value="' . $ebal . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ebal), 2) . "</td>";
                    $ccint = $ccint + $ipmnt;
                    print '<input type="hidden" name="cumulative_interest[]" value="' . $ccint . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ccint), 2) . "</td>";

//total pricpal plus intrest
                    $ttotal = $ipmnt + $ppmnt;
                    print "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ttotal), 2) . "</td>";

                    $cpmnt = $cpmnt + $this->pmnt;
                    print '<input type="hidden" name="cumulative_payment[]" value="' . $cpmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($cpmnt), 2) . "</td>";
                }
            } else {
                if ($this->mrate == 0) {

                    $ipmnt = 0; //($this->amount * $this->mrate);
                    print'<input type="hidden" name="interest_payment[]" value="' . $ipmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ipmnt), 2) . "</td>";
                    print '<input type="hidden" name="principal_payment[]" value="' . $ppmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ppmnt), 2) . "</td>";
                    $ebal = $bbal - $ppmnt;
                    print '<input type="hidden" name="end_bal[]" value="' . $ebal . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ebal), 2) . "</td>";
                    $ccint = $ccint + $ipmnt;
                    print '<input type="hidden" name="cumulative_interest[]" value="' . $ccint . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ccint), 2) . "</td>";
                    $cpmnt = $cpmnt + $this->pmnt;
                    print '<input type="hidden" name="cumulative_payment[]" value="' . $cpmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($cpmnt), 2) . "</td>";
                } else {

                    $ipmnt = ($this->amount * $this->mrate);
                    print'<input type="hidden" name="interest_payment[]" value="' . $ipmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ipmnt), 2) . "</td>";
                    print '<input type="hidden" name="principal_payment[]" value="' . $ppmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ppmnt), 2) . "</td>";
                    $ebal = $bbal - $ppmnt;
                    print '<input type="hidden" name="end_bal[]" value="' . $ebal . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ebal), 2) . "</td>";
                    $ccint = $ccint + $ipmnt;
                    print '<input type="hidden" name="cumulative_interest[]" value="' . $ccint . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ccint), 2) . "</td>";
                    //pricipal plus intrest
                    $ttotal = $ipmnt + $ppmnt;
                    print "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($ttotal), 2) . "</td>";

                    $cpmnt = $cpmnt + $this->pmnt;
                    print '<input type="hidden" name="cumulative_payment[]" value="' . $cpmnt . '">' . "<td width='14%' align='right'>" . getsymbol() . " " . number_format(round($cpmnt), 2) . "</td>";
                }
            }

            echo '</tr>';
        }
        // } 
        print "</table>";
        echo '<div class = "col-md-4"><button  class="btn green"  value = "Print this page" onclick = "print()">Print</button></div>';
    }

}

//End of amort class


