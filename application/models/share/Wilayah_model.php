<?php
class Wilayah_model extends CI_Model
{	
	function provinsi()
	{
    $query = "SELECT * FROM provinces ORDER BY name ASC";
		$res =$this->db->query($query);
		return $res;
	}

	function kota($data)
	{
    $query = "SELECT * FROM regencies WHERE province_id = $data ORDER BY name ASC";
		$res =$this->db->query($query)->result();
		return $res;
	}

	function kec($data)
	{
    $query = "SELECT * FROM districts WHERE regency_id = $data ORDER BY name ASC";
		$res =$this->db->query($query)->result();
		return $res;
	}

	function get_provinsi($data)
	{
    // $query = "SELECT company.address, provinces.name, provinces.id FROM company INNER JOIN provinces ON LEFT(company.address, 2) = provinces.id
		// WHERE company.id_account = $data";

		// $res = $this->db->query($query)->row_array();

		// return $res;

		$this->db->trans_start();

		$query = $this->db->get_where('company', ['id_account' => $data])->row_array();
		if($query) {
			$result = $this->db->get_where('provinces', ['id' => $query['address']])->row_array();

			$this->db->trans_complete();
			return $result;
		} else {
			$this->db->trans_complete();
		}
	}
}