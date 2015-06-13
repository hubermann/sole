<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Agendados extends CI_Migration
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
                    "categoria_id"            =>        array(
                    "type"                =>        "INT",
                    "constraint"            =>        1,
                ),
					"nombre"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
					"apellido"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
					"razon_social"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"direccion"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        180,
                ),
	
					"telefono"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"movil"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"email"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"email2"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"cuit"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"observaciones"    		=>        array(
                    "type"                =>        "TEXT",
                ),
                    "created_at"         =>        array(
                    "type"                =>        "DATETIME",
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('agendados');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('agendados');
 
    }
}
?>