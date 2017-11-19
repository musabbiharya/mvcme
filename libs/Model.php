<?php

class Model {

    protected $table;
    protected $parent = null;
    protected $joiner;
    protected $joincolumn;
    protected $order;
    protected $order_sort;

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->log = new Logging();
        $this->log->lfile('/Users/satria/Sites/tasklist/log/logfile_' . date('dMY') . '.txt');
    }

    public function edit($data) {
        $where = "id = $data[id] ";
        unset($data['id']);
        return ($this->db->update($this->table, $data, $where));
    }

    public function add($data) {

        return ($this->db->insert($this->table, $data));
    }

    public function del($data) {
        $where = "id = $data";
        return ($this->db->delete($this->table, $where));
    }

    public function get($id) {
        $customQuery = "";
        if (isset($id)) {
            $customQuery = " where $this->table.id = $id";
        }
        $queryJoin = "";
        $columnJoin = "";
        $columnOder = "";
        if ($this->parent !== NULL) {
            foreach ($this->joincolumn as $key => $value) {
                $columnJoin .= ",$this->parent.$value as $key";
            }

            $queryJoin = "join $this->parent  on $this->joiner ";
        }
        if ($this->order !== NULL){
            $columnOder = "order by $this->table.$this->order $this->order_sort";
        }
        $query = "select $this->table.* $columnJoin from $this->table  $queryJoin " . $customQuery ." ".$columnOder;
        return $this->db->select($query);
    }

}
