<?php 

class pedidos_items extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('pedidos_item');
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
		$total_pages = ceil($this->pedidos_item->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/pedidos_items/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'pedidos_items';
	$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
	$data['content'] = 'control/pedidos_items/all';
	$data['query'] = $this->pedidos_item->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'pedidos_item';
$data['content'] = 'control/pedidos_items/detail';
$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
$data['query'] = $this->pedidos_item->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo pedidos_item';
$data['content'] = 'control/pedidos_items/new_pedidos_item';
$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('pedido_id', 'Pedido_id', 'required');

$this->form_validation->set_rules('codigo', 'Codigo', 'required');

$this->form_validation->set_rules('cantidad', 'Cantidad', 'required');

$this->form_validation->set_rules('valor_unitario', 'Valor_unitario', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo pedidos_items';
		$data['content'] = 'control/pedidos_items/new_pedidos_item';
		$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newpedidos_item = array( 'pedido_id' => $this->input->post('pedido_id'), 
 'codigo' => $this->input->post('codigo'), 
 'cantidad' => $this->input->post('cantidad'), 
 'valor_unitario' => $this->input->post('valor_unitario'), 
);
		#save
		$this->pedidos_item->add_record($newpedidos_item);
		$this->session->set_flashdata('success', 'pedidos_item creado. <a href="pedidos_items/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/pedidos_items', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar pedidos_item';	
	$data['content'] = 'control/pedidos_items/edit_pedidos_item';
	$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
	$data['query'] = $this->pedidos_item->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('pedido_id', 'Pedido_id', 'required');

$this->form_validation->set_rules('codigo', 'Codigo', 'required');

$this->form_validation->set_rules('cantidad', 'Cantidad', 'required');

$this->form_validation->set_rules('valor_unitario', 'Valor_unitario', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo pedidos_item';
		$data['content'] = 'control/pedidos_items/edit_pedidos_item';
		$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
		$data['query'] = $this->pedidos_item->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedpedidos_item = array(  
'pedido_id' => $this->input->post('pedido_id'),

'codigo' => $this->input->post('codigo'),

'cantidad' => $this->input->post('cantidad'),

'valor_unitario' => $this->input->post('valor_unitario'),
);
		#save
		$this->session->set_flashdata('success', 'pedidos_item Actualizado!');
		$this->pedidos_item->update_record($id, $editedpedidos_item);
		if($this->input->post('id')!=""){
			redirect('control/pedidos_items', 'refresh');
		}else{
			redirect('control/pedidos_items', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/pedidos_items/comfirm_delete';
	$data['title'] = 'Eliminar pedidos_item';
	$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
	$data['query'] = $data['query'] = $this->pedidos_item->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/pedidos_items/comfirm_delete';
		$data['title'] = 'Eliminar pedidos_item';
		$data['menu'] = 'control/pedidos_items/menu_pedidos_item';
		$data['query'] = $this->pedidos_item->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'pedidos_item eliminado!');

		$prod = $this->pedidos_item->get_record($this->input->post('id'));
			$path = 'images-pedidos_items/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->pedidos_item->delete_record();
		redirect('control/pedidos_items', 'refresh');
		

	}
}


} //end class

?>