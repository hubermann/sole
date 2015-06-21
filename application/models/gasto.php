<?php  

class Gasto extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$query = $this->db->select('*')->from('gastos')
        ->order_by('id','ASC')
        ->limit($num, $start)
       	->get();
       	return $query->result();

	}


	public function gastos_mes_actual(){
		$inicio_de_mes = date("Y-m-01");
		$ahora = date('Y-m-d');

	
		$query = $this->db->select("*, SUM(importe) as total")
		
		->group_by('categoria_id')
		->where('fecha BETWEEN "'. $inicio_de_mes. '" and "'. $ahora.'"')
		->get('gastos');
       	return $query->result();

	}


	




	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('gastos');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('gastos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('gastos', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('gastos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('gastos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('gastos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('gastos');

					return $c->row('nombre'); 
				}
		
		*/

}

?>