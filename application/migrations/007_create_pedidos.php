<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Pedidos extends CI_Migration
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
					"cliente_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"created_at"    		=>        array(
                    "type"                =>        "DATETIME",

                ),
	
					"fecha"    		=>        array(
                    "type"                =>        "DATETIME",

                ),
	
					"status"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"observaciones"    		=>        array(
                    "type"                =>        "TEXT",

                ),
	
					"monto_total"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
                    "pagado"           =>        array(
                    "type"                =>        "INT",
                    "constraint"            =>        1,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('pedidos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('pedidos');
 
    }
}
?>