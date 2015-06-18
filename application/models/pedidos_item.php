<?php  

class Pedidos_item extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$query = $this->db->select('*')->from('pedidos_items')
        ->order_by('id','ASC')
        ->limit($num, $start)
       	->get();
       	return $query->result();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('pedidos_items');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('pedidos_items');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('pedidos_items', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('pedidos_items', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('pedidos_items');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('pedidos_items_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('pedidos_items');

					return $c->row('nombre'); 
				}
		
		*/

}

?>