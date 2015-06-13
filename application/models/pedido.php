<?php  

class Pedido extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('pedidos')->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('pedidos');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('pedidos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('pedidos', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('pedidos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('pedidos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('pedidos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('pedidos');

					return $c->row('nombre'); 
				}
		
		*/

}

?>