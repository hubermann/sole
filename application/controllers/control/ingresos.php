<?php 

class ingresos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('ingreso');
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
		$total_pages = ceil($this->ingreso->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/ingresos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'ingresos';
	$data['menu'] = 'control/ingresos/menu_ingreso';
	$data['content'] = 'control/ingresos/all';
	$data['query'] = $this->ingreso->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'ingreso';
$data['content'] = 'control/ingresos/detail';
$data['menu'] = 'control/ingresos/menu_ingreso';
$data['query'] = $this->ingreso->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo ingreso';
$data['content'] = 'control/ingresos/new_ingreso';
$data['menu'] = 'control/ingresos/menu_ingreso';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('pedido_id', 'Pedido_id', 'required');

$this->form_validation->set_rules('monto', 'Monto', 'required');

$this->form_validation->set_rules('porcentaje', 'Porcentaje', 'required');

$this->form_validation->set_rules('tipo', 'Tipo', 'required');

$this->form_validation->set_rules('banco', 'Banco', 'required');

$this->form_validation->set_rules('numero_cheque', 'Numero_cheque', 'required');

$this->form_validation->set_rules('vencimiento', 'Vencimiento', 'required');

$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('observaciones', 'Observaciones', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo ingresos';
		$data['content'] = 'control/ingresos/new_ingreso';
		$data['menu'] = 'control/ingresos/menu_ingreso';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newingreso = array( 'pedido_id' => $this->input->post('pedido_id'), 
 'monto' => $this->input->post('monto'), 
 'porcentaje' => $this->input->post('porcentaje'), 
 'tipo' => $this->input->post('tipo'), 
 'banco' => $this->input->post('banco'), 
 'numero_cheque' => $this->input->post('numero_cheque'), 
 'vencimiento' => $this->input->post('vencimiento'), 
 'fecha' => $this->input->post('fecha'), 
 'created_at' => $this->input->post('created_at'), 
 'observaciones' => $this->input->post('observaciones'), 
);
		#save
		$this->ingreso->add_record($newingreso);
		$this->session->set_flashdata('success', 'ingreso creado. <a href="ingresos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/ingresos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar ingreso';	
	$data['content'] = 'control/ingresos/edit_ingreso';
	$data['menu'] = 'control/ingresos/menu_ingreso';
	$data['query'] = $this->ingreso->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('pedido_id', 'Pedido_id', 'required');

$this->form_validation->set_rules('monto', 'Monto', 'required');

$this->form_validation->set_rules('porcentaje', 'Porcentaje', 'required');

$this->form_validation->set_rules('tipo', 'Tipo', 'required');

$this->form_validation->set_rules('banco', 'Banco', 'required');

$this->form_validation->set_rules('numero_cheque', 'Numero_cheque', 'required');

$this->form_validation->set_rules('vencimiento', 'Vencimiento', 'required');

$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('observaciones', 'Observaciones', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo ingreso';
		$data['content'] = 'control/ingresos/edit_ingreso';
		$data['menu'] = 'control/ingresos/menu_ingreso';
		$data['query'] = $this->ingreso->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedingreso = array(  
'pedido_id' => $this->input->post('pedido_id'),

'monto' => $this->input->post('monto'),

'porcentaje' => $this->input->post('porcentaje'),

'tipo' => $this->input->post('tipo'),

'banco' => $this->input->post('banco'),

'numero_cheque' => $this->input->post('numero_cheque'),

'vencimiento' => $this->input->post('vencimiento'),

'fecha' => $this->input->post('fecha'),

'created_at' => $this->input->post('created_at'),

'observaciones' => $this->input->post('observaciones'),
);
		#save
		$this->session->set_flashdata('success', 'ingreso Actualizado!');
		$this->ingreso->update_record($id, $editedingreso);
		if($this->input->post('id')!=""){
			redirect('control/ingresos', 'refresh');
		}else{
			redirect('control/ingresos', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/ingresos/comfirm_delete';
	$data['title'] = 'Eliminar ingreso';
	$data['menu'] = 'control/ingresos/menu_ingreso';
	$data['query'] = $data['query'] = $this->ingreso->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/ingresos/comfirm_delete';
		$data['title'] = 'Eliminar ingreso';
		$data['menu'] = 'control/ingresos/menu_ingreso';
		$data['query'] = $this->ingreso->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'ingreso eliminado!');

		$prod = $this->ingreso->get_record($this->input->post('id'));
			$path = 'images-ingresos/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->ingreso->delete_record();
		redirect('control/ingresos', 'refresh');
		

	}
}


} //end class

?>