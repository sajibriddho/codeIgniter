<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class T_test extends CI_Model
{

	public function basic_structured()
	{
		$table = '';
		$data = '';
		$index = '';
		$this->db->join('table_name', 'table_name.id = parent_table_name.id');
		$this->db->where($index, $data);
		$query = $this->db->get($table);
		return $query;
	}
}
