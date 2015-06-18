<?php 

class agendados extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('agendado');
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
	$per_page = 40;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->agendado->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/agendados/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'agendados';
	$data['menu'] = 'control/agendados/menu_agendado';
	$data['content'] = 'control/agendados/all';
	$data['query'] = $this->agendado->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'agendado';
$data['content'] = 'control/agendados/detail';
$data['menu'] = 'control/agendados/menu_agendado';
$data['query'] = $this->agendado->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo agendado';
$data['content'] = 'control/agendados/new_agendado';
$data['menu'] = 'control/agendados/menu_agendado';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('apellido', 'Apellido', 'required');


$this->form_validation->set_message('required','El campo %s es requerido.');
	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo agendados';
		$data['content'] = 'control/agendados/new_agendado';
		$data['menu'] = 'control/agendados/menu_agendado';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newagendado = array( 
			'categoria_id' => $this->input->post('categoria_id'),
			'nombre' => $this->input->post('nombre'), 
 'apellido' => $this->input->post('apellido'), 
 'razon_social' => $this->input->post('razon_social'), 
 'direccion' => $this->input->post('direccion'), 
 'telefono' => $this->input->post('telefono'), 
 'movil' => $this->input->post('movil'), 
 'email' => $this->input->post('email'), 
 'email2' => $this->input->post('email2'), 
 'cuit' => $this->input->post('cuit'), 
 'observaciones' => $this->input->post('observaciones'), 
);
		#save
		$this->agendado->add_record($newagendado);
		$this->session->set_flashdata('success', 'agendado creado. <a href="agendados/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/agendados', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar agendado';	
	$data['content'] = 'control/agendados/edit_agendado';
	$data['menu'] = 'control/agendados/menu_agendado';
	$data['query'] = $this->agendado->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('apellido', 'Apellido', 'required');

$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo agendado';
		$data['content'] = 'control/agendados/edit_agendado';
		$data['menu'] = 'control/agendados/menu_agendado';
		$data['query'] = $this->agendado->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}
		$ahora = 
		$editedagendado = array(  
		'categoria_id' => $this->input->post('categoria_id'),
		'nombre' => $this->input->post('nombre'),
		'apellido' => $this->input->post('apellido'),
		'razon_social' => $this->input->post('razon_social'),
		'direccion' => $this->input->post('direccion'),
		'telefono' => $this->input->post('telefono'),
		'movil' => $this->input->post('movil'),
		'email' => $this->input->post('email'),
		'email2' => $this->input->post('email2'),
		'cuit' => $this->input->post('cuit'),
		'observaciones' => $this->input->post('observaciones'),
		);
		#save
		$this->session->set_flashdata('success', 'agendado Actualizado!');
		$this->agendado->update_record($id, $editedagendado);
		if($this->input->post('id')!=""){
			redirect('control/agendados', 'refresh');
		}else{
			redirect('control/agendados', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/agendados/comfirm_delete';
	$data['title'] = 'Eliminar agendado';
	$data['menu'] = 'control/agendados/menu_agendado';
	$data['query'] = $data['query'] = $this->agendado->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/agendados/comfirm_delete';
		$data['title'] = 'Eliminar agendado';
		$data['menu'] = 'control/agendados/menu_agendado';
		$data['query'] = $this->agendado->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'agendado eliminado!');

		$prod = $this->agendado->get_record($this->input->post('id'));
			$path = 'images-agendados/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->agendado->delete_record();
		redirect('control/agendados', 'refresh');
		

	}
}


} //end class

?>