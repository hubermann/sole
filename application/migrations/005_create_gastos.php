<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Gastos extends CI_Migration
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
					"categoria_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"importe"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"detalle"    		=>        array(
                    "type"                =>        "TEXT",

                ),
	
					"fecha"    		=>        array(
                    "type"                =>        "DATETIME",

                ),
	
					"created_at"    		=>        array(
                    "type"                =>        "DATETIME",
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('gastos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('gastos');
 
    }
}
?>