<?php

/*
 * countsalary.php
 * Satria Persada <triasada@yahoo.com> 
 * 4:28:23 PM
 * office 
 */

require '../config.php';
require '../libs/Database.php';


$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
$query = "Select id  from employee";
$data = $db->select($query);
//$period = date("Y-m", strtotime("+1 month"));
$period = date("Y-m");
foreach ($data as $value) {
    $q2 = "select * from empsalary where id = $value[id]";
    $d2 = $db->select($q2);
    $total = 0;
    if (count($d2) > 0) {
        $basic = $d2[0]['basic'];
        $transport = $d2[0]['transport'];
        $header = array(
            'empid' => $value[id],
            'periode' => $period
        );
        $q3 = "select * from salaryHeader where empid = $value[id] and periode= '" . $period . "'";
        $d3 = $db->select($q3);
        if (count($d3) === 0) {
            $db->insert("salaryHeader", $header);
            $idheader = $db->insertedId();
            $db->insert("salaryDetail", array(
                'headerid' => $idheader,
                'item' => 'Basic ',
                'transaction' => 'KREDIT',
                'amount' => $basic,
            ));
            $total = $basic + $transport;
            $db->insert("salaryDetail", array(
                'headerid' => $idheader,
                'item' => 'Transport ',
                'transaction' => 'KREDIT',
                'amount' => $transport,
            ));
            $q4 = "select * from liability";
            $d4 = $db->select($q4);
            foreach ($d4 as $value) {
                $trans = ($value['paidby'] == 0) ? 'KREDIT' : 'DEBIT';
                $db->insert("salaryDetail", array(
                    'headerid' => $idheader,
                    'item' => $value['code'],
                    'transaction' => $trans,
                    'amount' => round(($value['amount']*$basic)/100),
                ));
                if ($trans=='KREDIT'){
                    $total = $total + round(($value['amount']*$basic)/100);
                }else{
                    $total = $total - round(($value['amount']*$basic)/100);
                }
                
            }
//            var_dump($total);
            $queryt="UPDATE salaryHeader SET total = $total WHERE id = $idheader";
                $db->select($queryt);
        }
    }
}
//var_dump($data);