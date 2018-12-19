<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Attreport_Model extends Model {

    protected $table = 'emp_report_att';
    protected $order = 'id';
    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    
    public function getPeriod($param) {
        $query = "select $this->table.*,employee.fullName, employee.id from $this->table join employee on $this->table.empid = employee.id where $this->table.periode = '$param'"; 
        $this->log->lwrite($query);
        return $this->db->select($query);
        
    }
    
    public function getDetail($id,$period) {
        $pr= explode("-", $period);
        $thn = intval($pr[0]);
        $bln = intval($pr[1]);
//        $query = "Select a._date ,b.* from attendanceDate a left join emp_attendance b on a._date=b.dateAtt  where b.empid =$id and b.status ='Approved' and  a._date between '".$thn."-".($bln-1)."-22' and '".$period."-21'  order by a._date asc";
        $query = "Select a.*,b.*,l.keterangan  from attendanceDate a left join (select * from emp_attendance where empid ='$id' and dateAtt between '".$thn."-".($bln-1)."-22' and '".$period."-21' ) b on a._date=b.dateAtt left join liburNasional l on a._date=l.libur where a._date between '".$thn."-".($bln-1)."-22' and '".$period."-21' order by a._date asc";
//        return $query;
        return $this->db->select($query);
        
    }
   
    public function getWorkdays($period){
        $buffer = explode("-", $period);
        $start_date = $buffer[0]."-".($buffer[1]-1)."-22";
        $end_date = $buffer[0]."-".$buffer[1]."-21";
        $query="SELECT NETWORKDAYS('$start_date', '$end_date') as jumlah";
        return $this->db->select($query);
    }

}
