<?php


/**
 * Description of OracleDatabase
 *
 * @author satria.persada
 */
class OracleDb
{
    private $instance;
    private $sql;

    public function __construct()
    {

        $this->instance = oci_connect(DB_USERNAME, DB_PASSWORD, DB_TNS);

        if (!$this->instance) {

            echo "Failed to connect to database: ";
            exit;
        }
    }

    public function query($sql)
    {
        $result = array();
        $this->sql = $sql;
        $parser = oci_parse($this->instance, $this->sql);
        oci_execute($parser);
        while ($row = oci_fetch_object($parser)) {
            array_push($result, $row);
        }
        return $result;

    }

    public function getAll($tableName)
    {

        $this->sql = "SELECT*FROM " . $tableName;
        return $this->execute();
    }

    public function getWhere($tableName, $where = array())
    {

        $this->sql = "SELECT*FROM " . $tableName;


        if (is_array($where)) {

            $this->sql .= " WHERE ";
            $i = 0;
            foreach ($where as $key => $value) {
                $i++;
                $this->sql .= $key . "='" . $value . "' ";

                if ($i < count($where)) $this->sql .= " AND ";
            }

        }

        return $this->execute();
    }


    public function delete($tableName, $where = array())
    {

        $this->sql = "DELETE FROM " . $tableName;


        if (is_array($where)) {

            $this->sql .= " WHERE ";
            $i = 0;
            foreach ($where as $key => $value) {
                $i++;
                $this->sql .= $key . "='" . $value . "' ";

                if ($i < count($where)) $this->sql .= " AND ";
            }

        }

        return $this->execute();
    }

    public function insert($tableName, $params = array())
    {

        $this->sql = "INSERT INTO " . $tableName . "(";

        $total = count($params);
        $i = 0;

        foreach ($params as $key => $value) {
            $i++;

            $this->sql = $this->sql . $key;

            if ($i < $total) {
                $this->sql = $this->sql . ',';
            }
        }

        $this->sql = $this->sql . ") VALUES(";

        $i = 0;
        foreach ($params as $key => $value) {
            $i++;

            $this->sql = $this->sql . "'" . $value . "'";

            if ($i < $total) {
                $this->sql = $this->sql . ',';
            }
        }
        $this->sql = $this->sql . ")";
        //var_dump($this->sql);die();
        return $this->execute();

    }

    public function update($tableName, $data = array(), $where = array())
    {

        $this->sql = "UPDATE " . $tableName . " SET ";

        $total = count($data);
        $i = 0;

        foreach ($data as $key => $value) {
            $i++;

            $this->sql = $this->sql . $key . " = '" . $value . "'";

            if ($i < $total) {
                $this->sql = $this->sql . ',';
            }
        }

        if (is_array($where) && count($where) > 0) {

            $this->sql .= " WHERE ";
            $i = 0;
            foreach ($where as $key => $value) {
                $i++;
                $this->sql .= $key . "='" . $value . "' ";

                if ($i < count($where)) $this->sql .= " AND ";
            }

        }

        return $this->execute();

    }

    public function bindParams($values)
    {
        if (is_array($values)) {
            foreach ($values as $v) {
                $this->replaceParam($v);
            }
        } else {
            $this->replaceParam($values);
        }
    }

    public function execute()
    {

        $query = oci_parse($this->instance, $this->sql);
        if (!oci_execute($query)) {
            var_dump(oci_error($query));
            die();
        }
        return new ResultSet($query);

    }

    private function replaceParam($v)
    {
        for ($i = 0; $i < strlen($this->sql); $i++) {
            if ($this->sql[$i] == '?') {
                $this->sql = substr_replace($this->sql, mysql_escape_string($v), $i, 1);//oci_bind_by_name
                break;
            }
        }
    }

    public function callProcedure($procedure, $input_in = array(), $output_out = array())
    {
        $result = array();
        $input = ':' . implode(', :', array_keys($input_in));
        $output = ':' . implode(', :', array_keys($output_out));
        $sql = "BEGIN $procedure ($input,$output) ; END;";
        $parser = oci_parse($this->instance, $sql);

        foreach ($input_in as $key => $val) {
            oci_bind_by_name($parser, $key, $input_in[$key]);
        }
        foreach ($output_out as $key => $val) {
            oci_bind_by_name($parser, $key, $output_out[$key], 100);
        }
        oci_execute($parser, OCI_DEFAULT);

        foreach ($output_out as $key => $val) {

            $result[$key] = $output_out[$key];
        }
        oci_free_statement($parser);
        return $result;
    }

}