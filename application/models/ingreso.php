<?php  

class Ingreso extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('ingresos')->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('ingresos');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('ingresos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('ingresos', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('ingresos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('ingresos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('ingresos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('ingresos');

					return $c->row('nombre'); 
				}
		
		*/

}

?>