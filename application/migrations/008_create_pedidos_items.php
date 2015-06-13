<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Pedidos_items extends CI_Migration
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
	
					"codigo"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"cantidad"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"valor_unitario"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('pedidos_items');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('pedidos_items');
 
    }
}
?>