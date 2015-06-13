<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Ingresos extends CI_Migration
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
					"pedido_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"monto"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"porcentaje"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"tipo"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"banco"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        120,
                ),
	
					"numero_cheque"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"vencimiento"    		=>        array(
                    "type"                =>        "DATETIME",

                ),
	
					"fecha"    		=>        array(
                    "type"                =>        "DATETIME",
                ),
	
					"created_at"    		=>        array(
                    "type"                =>        "DATETIME",
                ),
	
					"observaciones"    		=>        array(
                    "type"                =>        "TEXT",
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('ingresos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('ingresos');
 
    }
}
?>