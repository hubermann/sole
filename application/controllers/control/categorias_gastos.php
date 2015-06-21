<?php 

class categorias_gastos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('categorias_gasto');
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
		$total_pages = ceil($this->categorias_gasto->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/categorias_gastos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'Categorias de gastos';
	$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
	$data['content'] = 'control/categorias_gastos/all';
	$data['query'] = $this->categorias_gasto->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'Categorias gastos';
$data['content'] = 'control/categorias_gastos/detail';
$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
$data['query'] = $this->categorias_gasto->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nueva categoria de gastos';
$data['content'] = 'control/categorias_gastos/new_categorias_gasto';
$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nueva categorias de gastos';
		$data['content'] = 'control/categorias_gastos/new_categorias_gasto';
		$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newcategorias_gasto = array( 'nombre' => $this->input->post('nombre'), );
		#save
		$this->categorias_gasto->add_record($newcategorias_gasto);
		$this->session->set_flashdata('success', 'categorias_gasto creado. <a href="categorias_gastos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/categorias_gastos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar categorias de gastos';	
	$data['content'] = 'control/categorias_gastos/edit_categorias_gasto';
	$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
	$data['query'] = $this->categorias_gasto->get_record($this->uri->segment(4));
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

		$data['title'] = 'Nuevo categorias_gasto';
		$data['content'] = 'control/categorias_gastos/edit_categorias_gasto';
		$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
		$data['query'] = $this->categorias_gasto->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedcategorias_gasto = array(  
		'nombre' => $this->input->post('nombre'),
		);
		#save
		$this->session->set_flashdata('success', 'Categoria Actualizada!');
		$this->categorias_gasto->update_record($id, $editedcategorias_gasto);
		if($this->input->post('id')!=""){
			redirect('control/categorias_gastos', 'refresh');
		}else{
			redirect('control/categorias_gastos', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/categorias_gastos/comfirm_delete';
	$data['title'] = 'Eliminar categoria';
	$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
	$data['query'] = $data['query'] = $this->categorias_gasto->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/categorias_gastos/comfirm_delete';
		$data['title'] = 'Eliminar categoria de gastos';
		$data['menu'] = 'control/categorias_gastos/menu_categorias_gasto';
		$data['query'] = $this->categorias_gasto->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'categoria eliminada!');

		$prod = $this->categorias_gasto->get_record($this->input->post('id'));
			
		

		$this->categorias_gasto->delete_record();
		redirect('control/categorias_gastos', 'refresh');
		

	}
}


} //end class

?>