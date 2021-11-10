<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Heart extends CI_Model
{

	public function set_data($table, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table, $data);
		$returnValue = $this->db->insert_id();
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			$errorStore = array(
				'error' => json_encode($error),
				'data' => json_encode($data),
				'time' => get_current_time(),
				'tablename' => json_encode($table),
			);
			$this->Heart->set_data('errorlog', $errorStore);
			return FALSE;
		} else {
			return $returnValue;
		}
	}


	public function get_data_multi_conditional($table, $data)
	{
		$this->db->where($data);
		$query = $this->db->get($table);
		return $query;
	}
	public function get_data_multi_conditional_row_information($table, $data)
	{
		$this->db->where($data);
		$query = $this->db->get($table);
		return $query->row();
	}

	public function get_data_single_conditional($table, $index, $data)
	{
		$this->db->where($index, $data);
		$query = $this->db->get($table);
		return $query;
	}


	public function get_single_row_information($table, $index, $data)
	{
		$this->db->where($index, $data);
		$query = $this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}


	function delete_data($table, $index, $data)
	{
		$this->db->where($index, $data);
		$this->db->delete($table);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function update_data($table, $index, $identifier, $data)
	{
		$this->db->where($index, $identifier);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function pegination_count($table, $index, $identifier)
	{
		$this->db->where($index, $identifier);
		$query = $this->db->get($table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function count_data($table, $index, $data)
	{
		$this->db->where($index, $data);
		$this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}



	public function sql_excute($sql)
	{
		$query = $this->db->query($sql);
		return $query;
	}
}
