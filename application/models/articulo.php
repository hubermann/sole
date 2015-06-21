<?php  

class Articulo extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$query = $this->db->select('*')->from('articulos')
        ->order_by('id','ASC')
        ->limit($num, $start)
       	->get();
       	return $query->result();
	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('articulos');

		return $c->row(); 
	}

	public function get_by_codigo($id){
		$this->db->where('codigo' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('articulos');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('articulos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('articulos', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('articulos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('articulos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('articulos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('articulos');

					return $c->row('nombre'); 
				}
		
		*/

}

?>