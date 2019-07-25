<?php
	
	
	class MY_Model extends CI_Model
	{
		public $table;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get($where = array(), $select = "*"){
			if (is_numeric($where)) $where = array('id'=>intval($where));
			return $this->db->select($select)->where($where)->get($this->table)->row();
		}
		
		public function get_all($start = 0, $where = array(), $select = '*'){
			if (is_numeric($where)) $where = array('id'=>intval($where));
			return $this->db->select($select)->where($where)->limit($this->config->item('per_page'), $start)->order_by("id", "desc")->get($this->table)->result();
		}
		
		public function all_list($where = array(), $select = '*'){
			if (is_numeric($where)) $where = array('id'=>intval($where));
			return $this->db->select($select)->where($where)->get($this->table)->result();
		}
		
		public function get_count($where = array()){
			return $this->db->where($where)->select('id')->get($this->table)->num_rows();
		}
		
		public function delete($where = array()){
			if (is_numeric($where)) $where = array('id'=>intval($where));
			return $this->db->where($where)->delete($this->table);
		}
		
		public function delete_by_id($id)
		{
			return $this->db->where('id', $id)->delete($this->table);
		}
		
		public function insert($data = array()){
			$this->db->set($data);
			$this->db->insert($this->table);
			return $this->db->insert_id();
		}
		
		public function update($data = array(), $where = array()){
			if (is_numeric($where)) $where = array('id' => intval($where));
			return $this->db->where($where)->update($this->table, $data);
		}
	}
