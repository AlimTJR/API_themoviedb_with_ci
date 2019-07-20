<?php 
class Panggildb extends CI_Model {
public function movie()
{
$movie = $this->db->query('select * FROM movie');
return $movie;
	}
function input_data($data,$table){
		$this->db->insert($table,$data);
	}
function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>