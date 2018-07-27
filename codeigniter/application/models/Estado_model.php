<?php

class Estado_model extends CI_Model {

    public $idEstado;
    public $uf;
    public $nomeEstado;   

    public function __construct() {
        parent::__construct();
    }

    public function inserir() {
        return $this->db->insert('estados', $this);
    }
    
    public function get_estados(){
		$this->db->select("*");
		$this->db->from("estados");

		$query = $this->db->get();
        return $query->result();
    }
    
    function deletarEstado($idEstado){
            //$this->db->query("delete from cadastro where id='".$id
            
            $this->db->where('idEstado', $idEstado);
            $this->db->delete('estados');
        }
        
    function editarEstado($idEstado){
   
        $this->db->where('idEstado', $idEstado);
        $this->db->update('estados', $this);

        // Produces:
        // UPDATE mytable
        // SET title = '{$title}', name = '{$name}', date = '{$date}'
        // WHERE id = $id
    }
	
	public function get($idEstado = null){
		
		if ($idEstado) {
			$this->db->where('idEstado', $idEstado);
		}
		$this->db->order_by("idEstado", 'desc');
		return $this->db->get('estados');
    }
}
