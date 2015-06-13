<?php 

class articulos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('articulo');
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
		$total_pages = ceil($this->articulo->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/articulos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'articulos';
	$data['menu'] = 'control/articulos/menu_articulo';
	$data['content'] = 'control/articulos/all';
	$data['query'] = $this->articulo->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'articulo';
$data['content'] = 'control/articulos/detail';
$data['menu'] = 'control/articulos/menu_articulo';
$data['query'] = $this->articulo->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo articulo';
$data['content'] = 'control/articulos/new_articulo';
$data['menu'] = 'control/articulos/menu_articulo';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('codigo', 'Codigo', 'required');

$this->form_validation->set_rules('temporada_id', 'Temporada_id', 'required');

$this->form_validation->set_rules('tela', 'Tela', 'required');

$this->form_validation->set_rules('valor_unitario', 'Valor_unitario', 'required');

$this->form_validation->set_rules('status', 'Status', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

$this->form_validation->set_rules('observaciones', 'Observaciones', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo articulos';
		$data['content'] = 'control/articulos/new_articulo';
		$data['menu'] = 'control/articulos/menu_articulo';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		
		$file  = $this->upload_file();
		if($_FILES['filename']['size'] > 0){
			if ( $file['status'] == 0 ){
				$this->session->set_flashdata('error', $file['msg']);
			}
		}else{
			$file['filename'] = '';
		}
		$newarticulo = array( 'codigo' => $this->input->post('codigo'), 
 'temporada_id' => $this->input->post('temporada_id'), 
 'tela' => $this->input->post('tela'), 
 'valor_unitario' => $this->input->post('valor_unitario'), 
 'status' => $this->input->post('status'), 
 'descripcion' => $this->input->post('descripcion'), 
 'observaciones' => $this->input->post('observaciones'), 
'filename' => $file['filename'], 
);
		#save
		$this->articulo->add_record($newarticulo);
		$this->session->set_flashdata('success', 'articulo creado. <a href="articulos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/articulos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar articulo';	
	$data['content'] = 'control/articulos/edit_articulo';
	$data['menu'] = 'control/articulos/menu_articulo';
	$data['query'] = $this->articulo->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('codigo', 'Codigo', 'required');

$this->form_validation->set_rules('temporada_id', 'Temporada_id', 'required');

$this->form_validation->set_rules('tela', 'Tela', 'required');

$this->form_validation->set_rules('valor_unitario', 'Valor_unitario', 'required');

$this->form_validation->set_rules('status', 'Status', 'required');

$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

$this->form_validation->set_rules('observaciones', 'Observaciones', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo articulo';
		$data['content'] = 'control/articulos/edit_articulo';
		$data['menu'] = 'control/articulos/menu_articulo';
		$data['query'] = $this->articulo->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		if($_FILES['filename']['size'] > 0){
		
			$file  = $this->upload_file();
		
			if ( $file['status'] != 0 )
				{
				//guardo
				$articulo = $this->articulo->get_record($this->input->post('id'));
					 $path = 'images-articulos/'.$articulo->filename;
					 if(is_link($path)){
						unlink($path);
					 }
				
				
				$data = array('filename' => $file['filename']);
				$this->articulo->update_record($this->input->post('id'), $data);
				}
		
		
}		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedarticulo = array(  
'codigo' => $this->input->post('codigo'),

'temporada_id' => $this->input->post('temporada_id'),

'tela' => $this->input->post('tela'),

'valor_unitario' => $this->input->post('valor_unitario'),

'status' => $this->input->post('status'),

'descripcion' => $this->input->post('descripcion'),

'observaciones' => $this->input->post('observaciones'),
);
		#save
		$this->session->set_flashdata('success', 'articulo Actualizado!');
		$this->articulo->update_record($id, $editedarticulo);
		if($this->input->post('id')!=""){
			redirect('control/articulos', 'refresh');
		}else{
			redirect('control/articulos', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/articulos/comfirm_delete';
	$data['title'] = 'Eliminar articulo';
	$data['menu'] = 'control/articulos/menu_articulo';
	$data['query'] = $data['query'] = $this->articulo->get_record($this->uri->segment(4));
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

		$data['content'] = 'control/articulos/comfirm_delete';
		$data['title'] = 'Eliminar articulo';
		$data['menu'] = 'control/articulos/menu_articulo';
		$data['query'] = $this->articulo->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'articulo eliminado!');

		$prod = $this->articulo->get_record($this->input->post('id'));
			$path = 'images-articulos/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->articulo->delete_record();
		redirect('control/articulos', 'refresh');
		

	}
}

public function upload_file(){

	//1 = OK - 0 = Failure
	$file = array('status' => '', 'filename' => '', 'msg' => '' );


	//check ext.
	$file_extensions_allowed = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
	$exts_humano = array('gif', 'png', 'jpeg', 'jpg');
	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['filename']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);

		$file['msg'] .="<p>".$_FILES['filename']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";

	}else{
		include(APPPATH.'libraries/class.upload.php');
		$yukle = new upload;
		$yukle->set_max_size(1900000);
		$yukle->set_directory('./images-articulos');
		$yukle->set_tmp_name($_FILES['filename']['tmp_name']);
		$yukle->set_file_size($_FILES['filename']['size']);
		$yukle->set_file_type($_FILES['filename']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['filename']['name']);
		$imagname=''.$random.'_'.$name_whitout_whitespaces;
		#$thumbname='tn_'.$imagname;
		$yukle->set_file_name($imagname);


		$yukle->start_copy();


		if($yukle->is_ok()){
			
			if(count($this->data['thumbnail_sizes'])){
	    		foreach ($this->data['thumbnail_sizes'] as $thumb_size) {
	    			//create thumbnail
					$yukle->resize(1000,0);
					$yukle->set_thumbnail_name('tn_'.$thumb_size.'_'.$imagname);
					$result_thumb = $yukle->create_thumbnail();
					$yukle->set_thumbnail_size($thumb_size, 0);
	    		}
	    	}

			//UPLOAD ok
			$file['filename'] = $imagname;
			$file['status'] = 1;
		}
		else{
			$file['status'] = 0 ;
			$file['msg'] = 'Error al subir archivo';
		}

		//clean
		$yukle->set_tmp_name('');
		$yukle->set_file_size('');
		$yukle->set_file_type('');
		$imagname='';
	}//fin if(extencion)	


	return $file;
}


} //end class

?>