<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Articulos extends CI_Migration
{
    public function up()
    {
        //TABLA 
        $this->dbforge->add_field(
            array(
                "id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11,
                    "unsigned"            =>        TRUE,
                    "auto_increment"    =>        TRUE,
 
                ),
					"codigo"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
					"temporada_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"tela"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"valor_unitario"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"status"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"descripcion"    		=>        array(
                    "type"                =>        "TEXT",

                ),
	
					"observaciones"    		=>        array(
                    "type"                =>        "TEXT",

                ),
	
					"filename"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        250,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('articulos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('articulos');
 
    }
}
?>