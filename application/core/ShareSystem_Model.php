<?php

class ShareSystem_Model extends CI_Model {

    public $tableName = '';
    public $tableId = '';
    protected $CI;
    protected $modelName = null;

    public function __construct() {
        parent::__construct();
        $this->CI = &get_instance();
    }

    public function callModel($name) {
        $this->modelName = end(explode('/', $name));
        $this->CI->load->model($name);
        return $this->CI->{$this->modelName};
    }

    public function getModel() {
        return $this->CI->{$this->modelName};
    }

    public function table($name = '') {
        if (!$name) {
            $name = $this->tableName;
        }
        return $this->db->from($name);
    }

    public function countAll($condition = array()) {
        if ($condition) {
            return $this->db->where($condition)->count_all($this->tableName);
        } else {
            return $this->db->count_all($this->tableName);
        }
    }

    public function getOne($condition) {
        return $this->table()->where($condition)->get()->first_row();
    }

    public function getOneById($id) {
        return $this->table()->where([$this->tableId => $id])->get()->first_row();
    }

    public function getList($condition = array(), $order = '', $page = 0, $limit = 100) {
        if (!$order) {
            $order = $this->tableId . ' DESC';
        }
        $query = $this->table()->limit($limit, $page)->order_by($order)->where($condition)->get();
        return $query->result_array();
    }

    public function getListWhereIn($condition, $order = '', $page = 0, $limit = 100) {
        if (!$order) {
            $order = $this->tableId . ' DESC';
        }
        $query = $this->table()->limit($limit, $page)->order_by($order)->where_in($condition)->get();
        return $query->result_array();
    }

    public function addData($insert) {
        $this->db->insert($this->tableName, $insert);
        return $this->db->insert_id();
    }

    public function replaceData($insert) {
        $result = $this->db->replace($this->tableName, $insert);
        return $result;
    }

    public function updateById($data, $id) {
        if (empty($data))
            return;
        $result = $this->db->where(array($this->tableId => $id))->update($this->tableName, $data);
        return $result;
    }

    public function updateByWhere($data, $condition) {
        if (empty($data))
            return;
        $result = $this->db->where($condition)->update($this->tableName, $data);
        return $result;
    }

    public function deleteById($id) {
        $result = $this->db->where(array($this->tableId => $id))->delete($this->tableName);
        return $result;
    }

    public function deleteByWhere($condition) {
        $result = $this->db->where($condition)->delete($this->tableName);
        return $result;
    }

    public function getNum($value, $field) {
        $query = $this->db->query('SELECT * FROM cl_' . $this->tableName . " where " . $field . ' = ' . $value);
        $num = $query->num_rows();

        return $num;
    }

}
