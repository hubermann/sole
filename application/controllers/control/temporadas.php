<?php 

class temporadas extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('temporada');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}

	if( ! ini_get('date.timezone') ){
	    date_default_timezone_set('GMT');
	    setlocale(LC_ALL,"es_ES");
	    setlocale(LC_TIME, 'es_AR');
	}

	$this->data['thumbnail_sizes'] = array(); //thumbnails sizes 

}

public function index(){
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->temporada->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/temporadas/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'temporadas';
	$data['menu'] = 'control/temporadas/menu_temporada';
	$data['content'] = 'control/temporadas/all';
	$data['query'] = $this->temporada->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'temporada';
$data['content'] = 'control/temporadas/detail';
$data['menu'] = 'control/temporadas/menu_temporada';
$data['query'] = $this->temporada->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo temporada';
$data['content'] = 'control/temporadas/new_temporada';
$data['menu'] = 'control/temporadas/menu_temporada';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo temporadas';
		$data['content'] = 'control/temporadas/new_temporada';
		$data['menu'] = 'control/temporadas/menu_temporada';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newtemporada = array( 'nombre' => $this->input->post('nombre'), 
);
		#save
		$this->temporada->add_record($newtemporada);
		$this->session->set_flashdata('success', 'Temporada creada.');
		redirect('control/temporadas', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar temporada';	
	$data['content'] = 'control/temporadas/edit_temporada';
	$data['menu'] = 'control/temporadas/menu_temporada';
	$data['query'] = $this->temporada->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('nombre', 'Nombre', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo temporada';
		$data['content'] = 'control/temporadas/edit_temporada';
		$data['menu'] = 'control/temporadas/menu_temporada';
		$data['query'] = $this->temporada->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedtemporada = array(  
		'nombre' => $this->input->post('nombre'),
		);
		#save
		$this->session->set_flashdata('success', 'temporada Actualizado!');
		$this->temporada->update_record($id, $editedtemporada);
		if($this->input->post('id')!=""){
			redirect('control/temporadas', 'refresh');
		}else{
			redirect('control/temporadas', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/temporadas/comfirm_delete';
	$data['title'] = 'Eliminar temporada';
	$data['menu'] = 'control/temporadas/menu_temporada';
	$data['query'] = $data['query'] = $this->temporada->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);


}

//delete
public function delete(){

	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('comfirm', 'comfirm', 'required');
	$this->form_validation->set_message('required','Por favor, confirme para eliminar.');


	if ($this->form_validation->run() === FALSE){
		#validation failed
		$this->load->helper('form');

		$data['content'] = 'control/temporadas/comfirm_delete';
		$data['title'] = 'Eliminar temporada';
		$data['menu'] = 'control/temporadas/menu_temporada';
		$data['query'] = $this->temporada->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'temporada eliminado!');

		$prod = $this->temporada->get_record($this->input->post('id'));
			$path = 'images-temporadas/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->temporada->delete_record();
		redirect('control/temporadas', 'refresh');
		

	}
}


} //end class

?>