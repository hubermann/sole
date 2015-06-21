<?php  

class Agendado extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
        $query = $this->db->select('*')->from('agendados')
        ->order_by('id','ASC')
        ->limit($num, $start)
       	->get();
       	return $query->result();
	}

	public function get_records_menu(){
        $query = $this->db->select('*')->from('agendados')
        ->order_by('nombre','ASC')
       	->get();
       	return $query->result();
	}



	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('agendados');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('agendados');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('agendados', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('agendados', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('agendados');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('agendados_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('agendados');

					return $c->row('nombre'); 
				}
		
		*/

}

?>