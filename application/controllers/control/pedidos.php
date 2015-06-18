<?php 

class pedidos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('pedido');
	$this->load->model('temporada');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}
$this->output->enable_profiler(TRUE); 


	$this->data['thumbnail_sizes'] = array(); //thumbnails sizes 

}

public function index(){
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->pedido->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/pedidos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'pedidos';
	$data['menu'] = 'control/pedidos/menu_pedido';
	$data['content'] = 'control/pedidos/all';
	$data['query'] = $this->pedido->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$data['title'] = 'pedido';
	$data['content'] = 'control/pedidos/detail';
	$data['menu'] = 'control/pedidos/menu_pedido';
	$data['query'] = $this->pedido->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->load->helper('form');
	$data['title'] = 'Nuevo pedido';
	$data['content'] = 'control/pedidos/new_pedido';
	$data['menu'] = 'control/pedidos/menu_pedido';

	$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('cliente_id', 'Cliente_id', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('status', 'status', 'required');



$this->form_validation->set_rules('monto_total', 'Monto_total', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo pedidos';
		$data['content'] = 'control/pedidos/new_pedido';
		$data['menu'] = 'control/pedidos/menu_pedido';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newpedido = array( 'cliente_id' => $this->input->post('cliente_id'), 
 'created_at' => $this->input->post('created_at'), 
 'fecha' => $this->input->post('fecha'), 
 'status' => $this->input->post('status'), 
 'observaciones' => $this->input->post('observaciones'), 
 'monto_total' => $this->input->post('monto_total'), 
);
		#save
		$this->pedido->add_record($newpedido);
		$this->session->set_flashdata('success', 'pedido creado. <a href="pedidos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/pedidos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar pedido';	
	$data['content'] = 'control/pedidos/edit_pedido';
	$data['menu'] = 'control/pedidos/menu_pedido';
	$data['query'] = $this->pedido->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('cliente_id', 'Cliente_id', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_rules('status', 'status', 'required');



$this->form_validation->set_rules('monto_total', 'Monto_total', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo pedido';
		$data['content'] = 'control/pedidos/edit_pedido';
		$data['menu'] = 'control/pedidos/menu_pedido';
		$data['query'] = $this->pedido->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedpedido = array(  
'cliente_id' => $this->input->post('cliente_id'),

'created_at' => $this->input->post('created_at'),

'fecha' => $this->input->post('fecha'),

'status' => $this->input->post('status'),

'observaciones' => $this->input->post('observaciones'),

'monto_total' => $this->input->post('monto_total'),
);
		#save
		$this->session->set_flashdata('success', 'pedido Actualizado!');
		$this->pedido->update_record($id, $editedpedido);
		if($this->input->post('id')!=""){
			redirect('control/pedidos', 'refresh');
		}else{
			redirect('control/pedidos', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/pedidos/comfirm_delete';
	$data['title'] = 'Eliminar pedido';
	$data['menu'] = 'control/pedidos/menu_pedido';
	$data['query'] = $data['query'] = $this->pedido->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/pedidos/comfirm_delete';
		$data['title'] = 'Eliminar pedido';
		$data['menu'] = 'control/pedidos/menu_pedido';
		$data['query'] = $this->pedido->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'pedido eliminado!');

		$prod = $this->pedido->get_record($this->input->post('id'));
			$path = 'images-pedidos/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->pedido->delete_record();
		redirect('control/pedidos', 'refresh');
		

	}
}


} //end class

?>