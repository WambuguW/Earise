<?php

include './classes.php';
include 'pdf.php';
$user = $_SESSION['users'];
$statement = $_POST['statement'];
$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];
if ($statement == '1') {
    //$col1 = 'Date Range';
    $col2 = 'Member Number';
    $col3 = 'Member Name';
    $col4 = 'Date';
    $col5 = 'Transaction';
    $col6 = 'Money in';
    $col7 = 'Money out';
    $company = compname();
    $nn = 0;
    $header = $col2 . ',' . $col3 . ',' . $col4 . ',' . $col5 . ',' . $col6 . ',' . $col7;
    foreach ($_POST['check'] as $check) {
        $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($check) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
        if (mysql_num_rows($mqry) == 1) {

            $s = strtotime($datefrom);
            $t = strtotime($dateto);
            if ($t < $s) {
                
            } else {

                $dt1 = date('d-m-Y', strtotime($datefrom)) . ' to ' . date('d-m-Y', strtotime($dateto));
                $dt2 = $check;
                $dt3 = getMembername(base64_encode($check));
                while ($s <= $t) {

                    $qry = mysql_query('select * from membercontribution where memberno="' . base64_encode($check) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode('69') . '"') or die(mysql_error());
                    if (mysql_num_rows($qry) >= 1) {
                        while ($row = mysql_fetch_array($qry)) {
                            $sumin = $row['amount'];
                            $sss+=base64_decode($sumin);
                            $dt4 = base64_decode($row['date']);
                            $dt5 = getglacc(base64_decode($row['transaction']));
                            if (base64_decode($row['paymenttype']) == 'adjustments') {
                                $dt6 = getsymbol() . '.0.00';
                                $dt7 = getsymbol() . '.' . (base64_decode($sumin));
                                $out += (int)(base64_decode($sumin));
                            } else {
                                $dt6 = getsymbol() . '.' . (base64_decode($sumin));
                                $dt7 = getsymbol() . '.0.00';
                                $in += (int)(base64_decode($sumin));
                            }

                            $data .= $dt2 . ';' . $dt3 . ';' . $dt4 . ';' . $dt5 . ';' . $dt6 . ';' . $dt7 . "\n";
                        }
                    }



                    $adqry = mysql_query('select * from paymentin where  paymentype="' . base64_encode("adjustments") . '" and payeeid="' . base64_encode($check) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transname="' . base64_encode('98') . '"') or die(mysql_error());
                    while ($row2 = mysql_fetch_array($adqry)) {

                        $adj = $row2['amount'];
                        $adjj+=base64_decode($adj);
                        $dt4_1 = base64_decode($row2['date']);
                        if (is_numeric((base64_decode($row2['transname'])))) {
                            $dt5_1 = getGlname(base64_decode($row2['transname']));
                        } else {
                            $dt5_1 = base64_decode($row2['transname']);
                        }
                        $dt6_1 = getsymbol() . '.' . number_format(base64_decode($adj), 2);
                        $dt7_1 = getsymbol() . '.0.00';
                        $data .= $dt1 . ';' . $dt2 . ';' . $dt3 . ';' . $dt4 . $dt4_1 . ';' . $dt5 . $dt5_1 . ';' . $dt6 . $dt6_1 . ';' . $dt7 . $dt7_1 . "\n";
                    }





                    $sumout = $loss + $lopp + $stoo + $adjj + $finee;
                    $sin = $bbb + $sss + $loaa;

                    $s = $s + 86400; //increment date by 86400 seconds(1 day)

                    $bal = $sin - $sumout;
                }


//<tr><th>Net Balance</th><td></td><td colspan="2"><center>' . getsymbol() . '.' . number_format(netstatementbl($user, $mno, $dfrom, $mfrom, $yfrom, $dto, $mto, $yto), 2) . '</center></td></tr>
            }
        }

        if ($data != '') {
            $bals = $in-$out;
            $date = time();
            $path = 'files/';
            $data .= ';;;Total;' . $in . ';' . $out."\n";
            $data .= ';;;Balance;' . $bals;
            file_put_contents($path . $check . '_' . $date . $nn . '_' . 'savings' . "_export.csv", $data);
            $docs .= $path . $check . '_' . $date . $nn . '_' . 'savings' . "_export.csv" . ',';
        }

        //
        $nn++;
        $data = '';
        //
    }
    $doc = rtrim($docs, ',');
    //echo $data;
    get_pdf_details($doc, $header, $table, $company);
}


if ($statement == '3') {
    $col1 = 'Member No.';
    $col2 = 'Member Name';
    $col3 = 'Loan Type';
    $col4 = 'Amount';
    $col5 = 'Date of Application';
    $col6 = 'Status';
    $header = $col1 . ',' . $col2 . ',' . $col3 . ',' . $col4 . ',' . $col5 . ',' . $col6;
    foreach ($_POST['check'] as $check) {
        $mem = base64_encode($check);
        $query = mysql_query("SELECT * FROM loans WHERE membernumber ='$mem'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $dt1 = base64_decode($row['membernumber']);
            $dt2 = getmembername($row['membernumber']);
            $dt3 = loanname($row['transid']);
            $dt4 = getsymbol() . ' ' . (base64_decode($row['amount']));
            $dt5 = ((base64_decode($row['date'])));
            $dt6 = ucwords(strtolower(base64_decode($row['status'])));

            $data .= $dt1 . ';' . $dt2 . ';' . $dt3 . ';' . $dt4 . ';' . $dt5 . ';' . $dt6 . "\n";
            $dets = getMem(base64_encode($check));
            $det .= base64_decode($dets['firstname']) . ',';
        }
        $table = 'loanreport';
        // add time to fileName
        $date = time();
        $path = 'files/';
        if ($data != '') {
            file_put_contents($path . $check . '_' . $date . $nn . '_' . $table . "_export.csv", $data);
            $docs .= $path . $check . '_' . $date . $nn . '_' . $table . "_export.csv" . ',';
        }

        //
        $nn++;
        $data = '';
    }
    $doc = rtrim($docs, ',');
    get_pdf_details($doc, $header, $table, $company);
}
if ($statement == '2') {
    $col1 = 'Date Range';
    $col2 = 'Member Number';
    $col3 = 'Member Name';
    $col4 = 'Date';
    $col5 = 'Transaction';
    $col6 = 'Money in';
    $col7 = 'Money out';
    $company = compname();
    $nn = 0;
    $header = $col1 . ',' . $col2 . ',' . $col3 . ',' . $col4 . ',' . $col5 . ',' . $col6 . ',' . $col7;
    foreach ($_POST['check'] as $check) {
        while ($s <= $t) {

            $q1ry = mysql_query('select * from membercontribution where memberno="' . base64_encode($check) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transaction="' . base64_encode(getdefaultsharesaccount()) . '"') or die(mysql_error());
            if (mysql_num_rows($q1ry) >= 1) {
                while ($rowq = mysql_fetch_array($q1ry)) {
                    $suin = $rowq['amount'];
                    $asa+=base64_decode($suin);
                    $dt1 = date('d-m-Y', strtotime($datefrom)) . ' to ' . date('d-m-Y', strtotime($dateto));
                    $dt2 = $check;
                    $dt3 = getMembername(base64_encode($check));
                    $dt4 = base64_decode($rowq['date']);
                    $dt5 = getglacc(base64_decode($rowq['transaction']));
                    $dt6 = getsymbol() . '.' . (base64_decode($suin));
                    $dt7 = getsymbol() . '.0.00';
                    $dt8 = getsymbol() . '.' . (($asa));
                }
            }

            $sumout = $asaa;
            $sin = $asa;
            $s = $s + 86400; //increment date by 86400 seconds(1 day)
        }
        $data .= $dt1 . ';' . $dt2 . ';' . $dt3 . ';' . $dt4 . ';' . $dt5 . ';' . $dt6 . ';' . "\n";
        if ($data != '') {
            $table = getglacc(getdefaultsharesaccount());
            $date = time();
            $path = 'files/';
            $data .= ';;;;Total;' . $in . ';' . $out;
            file_put_contents($path . $check . '_' . $date . $nn . '_' . $table . "_export.csv", $data);
            $docs .= $path . $check . '_' . $date . $nn . '_' . $table . "_export.csv" . ',';
        }
        //
        $nn++;
        $data = '';
    }
    $doc = rtrim($docs, ',');
    get_pdf_details($doc, $header, $table, $company);
}
if ($statement == '4') {
    $col1 = 'Date Range';
    $col2 = 'Member Number';
    $col3 = 'Member Name';
    $col4 = 'Date';
    $col5 = 'Transaction';
    $col6 = 'Money in';
    $col7 = 'Money out';
    $company = compname();
    $nn = 0;
    $header = $col1 . ',' . $col2 . ',' . $col3 . ',' . $col4 . ',' . $col5 . ',' . $col6 . ',' . $col7;
    foreach ($_POST['check'] as $check) {
        $mqry = mysql_query('select * from newmember where membernumber="' . base64_encode($check) . '" and status="' . base64_encode("active") . '"') or die(mysql_error());
        if (mysql_num_rows($mqry) == 1) {

            $s = strtotime($datefrom);
//$e=mktime(0,0,0,$em, $ed, $ey);
            $t = strtotime($dateto);

            if ($t < $s) {
                
            } else {

                while ($s <= $t) {

                    $adqry = mysql_query('select * from paymentin where payeeid="' . base64_encode($check) . '" and date="' . base64_encode(date("d-M-Y", $s)) . '" and transname!="' . base64_encode("125") . '" and transname!="' . base64_encode("68") . '" and transname!="' . base64_encode("122") . '" and transname!="' . base64_encode("123") . '"') or die(mysql_error());
                    while ($row2 = mysql_fetch_array($adqry)) {

                        $adj = $row2['amount'];
                        $adjj+=base64_decode($adj);
                        $dt1 = date('d-m-Y', strtotime($datefrom)) . ' to ' . date('d-m-Y', strtotime($dateto));
                        $dt2 = $check;
                        $dt3 = getMembername(base64_encode($check));
                        $dt4 = base64_decode($row2['date']);
                        $dt5 = getglacc(base64_decode($row2['transname']));
                        $dt6 = getsymbol() . '.' . (base64_decode($adj));
                        $dt7 = getsymbol() . '.0.00';
                    }

                    $sumout = $none;
                    $sin = $adjj;

                    $s = $s + 86400; //increment date by 86400 seconds(1 day)
                }

                $bal = $sin - $sumout;
                $newbal = $bal;

                //echo '<tr><th>Total</th><td></td><td>' . getsymbol() . '.' . number_format($sin, 2) . '</td><td>' . getsymbol() . '.' . number_format($sumout, 2) . '</td><td><b><center>' . getsymbol() . '.' . number_format($newbal, 2) . '</center></b></td></tr>';

                echo '</table>';
            }
        } else {
            
        }
    $data .= $dt1 . ';' . $dt2 . ';' . $dt3 . ';' . $dt4 . ';' . $dt5 . ';' . $dt6 . ';' . "\n";
        if ($data != '') {
            $table = 'member income to sacco';
            $date = time();
            $path = 'files/';
            $data .= ';;;;Total;' . $in . ';' . $out;
            file_put_contents($path . $check . '_' . $date . $nn . '_' . $table . "_export.csv", $data);
            $docs .= $path . $check . '_' . $date . $nn . '_' . $table . "_export.csv" . ',';
        }
        //
        $nn++;
        $data = '';
    }
    $doc = rtrim($docs, ',');
    get_pdf_details($doc, $header, $table, $company);
}   
