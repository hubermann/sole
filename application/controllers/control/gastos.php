<?php 

class gastos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('gasto');
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
	$this->output->enable_profiler(TRUE); 
}

public function index(){
	//Pagination
	$per_page = 100;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->gasto->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/gastos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'Gastos';
	$data['menu'] = 'control/gastos/menu_gasto';
	$data['content'] = 'control/gastos/all';
	$data['query'] = $this->gasto->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'Gasto';
$data['content'] = 'control/gastos/detail';
$data['menu'] = 'control/gastos/menu_gasto';
$data['query'] = $this->gasto->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo gasto';
$data['content'] = 'control/gastos/new_gasto';
$data['menu'] = 'control/gastos/menu_gasto';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');

$this->form_validation->set_rules('importe', 'Importe', 'required|integer');

$this->form_validation->set_rules('fecha', 'Fecha', 'required');

$this->form_validation->set_message('required','El campo %s es requerido.');

$this->form_validation->set_message('integer','El campo %s debe ser un numero entero.');
	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo gastos';
		$data['content'] = 'control/gastos/new_gasto';
		$data['menu'] = 'control/gastos/menu_gasto';
		$this->load->view('control/control_layout', $data);

	}else{
	
		$ahora = date("Y-m-d H:i:s");
		list($mes,$dia,$anio) = explode('-', $this->input->post('fecha'));
		$fecha_bd = "$anio-$mes-$dia";
		$newgasto = array( 'categoria_id' => $this->input->post('categoria_id'), 
		 'importe' => $this->input->post('importe'), 
		 'detalle' => $this->input->post('detalle'), 
		 'fecha' => $fecha_bd, 
		 'created_at' => $ahora, 
		);
		#save
		$this->gasto->add_record($newgasto);
		$this->session->set_flashdata('success', 'gasto creado. <a href="gastos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/gastos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar gasto';	
	$data['content'] = 'control/gastos/edit_gasto';
	$data['menu'] = 'control/gastos/menu_gasto';
	$data['query'] = $this->gasto->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
	$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');
	$this->form_validation->set_rules('importe', 'Importe', 'required|integer');
	$this->form_validation->set_rules('fecha', 'Fecha', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');
	$this->form_validation->set_message('integer','El campo %s debe ser un numero entero.');
	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo gasto';
		$data['content'] = 'control/gastos/edit_gasto';
		$data['menu'] = 'control/gastos/menu_gasto';
		$data['query'] = $this->gasto->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');


		$ahora = date("Y-m-d H:i:s");
		list($mes,$dia,$anio) = explode('-', $this->input->post('fecha'));
		$fecha_bd = "$anio-$mes-$dia";

		$editedgasto = array(  
		'categoria_id' => $this->input->post('categoria_id'),

		'importe' => $this->input->post('importe'),

		'detalle' => $this->input->post('detalle'),

		'fecha' => $fecha_bd,

		);
		#save
		$this->session->set_flashdata('success', 'Gasto Actualizado!');
		$this->gasto->update_record($id, $editedgasto);
		if($this->input->post('id')!=""){
			redirect('control/gastos', 'refresh');
		}else{
			redirect('control/gastos', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/gastos/comfirm_delete';
	$data['title'] = 'Eliminar gasto';
	$data['menu'] = 'control/gastos/menu_gasto';
	$data['query'] = $data['query'] = $this->gasto->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/gastos/comfirm_delete';
		$data['title'] = 'Eliminar gasto';
		$data['menu'] = 'control/gastos/menu_gasto';
		$data['query'] = $this->gasto->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'gasto eliminado!');

		$prod = $this->gasto->get_record($this->input->post('id'));
			$path = 'images-gastos/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->gasto->delete_record();
		redirect('control/gastos', 'refresh');
		

	}
}


} //end class

?>