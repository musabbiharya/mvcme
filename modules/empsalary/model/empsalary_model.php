<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Empsalary_Model extends Model {

    protected $table = 'salaryHeader';
    protected $order = 'id';
    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    
    public function getPeriod($param) {
        $query = "select $this->table.*,employee.fullName from $this->table join employee on $this->table.empid = employee.id where $this->table.periode = '$param'"; 
        return $this->db->select($query);
        
    }
    
    public function getDetail($id) {
        $query = "Select * from salaryDetail where headerid = $id order by id asc, item desc";
        return $this->db->select($query);
        
    }
    public function generatesalary($startdate,$enddate,$period){
        $query = "Select id  from employee";
$data = $this->db->select($query);
//$period = date("Y-m", strtotime("+1 month"));
//$period = date("Y-m");
foreach ($data as $value) {
    $q2 = "select * from emp_salary where id = $value[id]";
    $d2 = $this->db->select($q2);
    $total = 0;
    if (count($d2) > 0) {
        $basic = $d2[0]['basic'];
        $transport = $d2[0]['transport'];
        $header = array(
            'empid' => $value[id],
            'periode' => $period
        );
        $q3 = "select * from salaryHeader where empid = $value[id] and periode= '" . $period . "'";
        $d3 = $this->db->select($q3);
        if (count($d3) === 0) {
            $this->db->insert("salaryHeader", $header);
            $idheader = $this->db->insertedId();
            $this->db->insert("salaryDetail", array(
                'headerid' => $idheader,
                'item' => 'Basic ',
                'transaction' => 'KREDIT',
                'amount' => $basic,
            ));
            $total = $basic + $transport;
            $this->db->insert("salaryDetail", array(
                'headerid' => $idheader,
                'item' => 'Transport ',
                'transaction' => 'KREDIT',
                'amount' => $transport,
            ));
            $q4 = "select * from liability";
            $d4 = $this->db->select($q4);
            foreach ($d4 as $value) {
                $trans = ($value['paidby'] == 0) ? 'KREDIT' : 'DEBIT';
                $this->db->insert("salaryDetail", array(
                    'headerid' => $idheader,
                    'item' => $value['description'],
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
                $this->db->select($queryt);
        }
    }
}
        $querypot="call potongan('$period', '$startdate', '$enddate')";
                $this->db->select($querypot);
    }
    
    public function emptyer($period) {
        $queryset = "SET SQL_SAFE_UPDATES = 0";
        $this->db->select($queryset);
        $query1 ="Delete from salaryDetail where headerid in(select id from salaryHeader where periode = '$period')";
        $this->db->select($query1);
        $query2 ="delete from  salaryHeader where periode = '$period'";
        $this->db->select($query2);
        $query3 ="delete from  emp_report_att where periode = '$period'";
        $this->db->select($query3);
        $queryset2 = "SET SQL_SAFE_UPDATES = 1";
        $this->db->select($queryset2);
        
        
    }
   

}
