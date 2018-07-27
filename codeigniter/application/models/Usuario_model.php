<?php

class Usuario_model extends CI_Model {

    public $idUsuario;
    public $usuario;
    public $senha;
    public $status;

    public function __construct() {
        parent::__construct();
    }

    public function inserir() {
        return $this->db->insert('usuarios', $this);
    }
    
    public function get_usuario(){
		$this->db->select("*, if(status = 1, 'Ativo', 'Não') as status");
		$this->db->from("usuarios");

		$query = $this->db->get();
        return $query->result();
    }
    
    function deletarUsuario($idUsuario){
            //$this->db->query("delete from cadastro where id='".$id
            
            $this->db->where('idUsuario', $idUsuario);
            $this->db->delete('usuarios');
    }
        
    function editarUsuario($idUsuario){   
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios', $this);
    } 
    
    function editarSaldo($idUsuario, $saldo){
        $this->db->set('saldo', $saldo);
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios');
    }
	
	function editarSaldoLogado($idLogado, $saldoLogado){
        $this->db->set('saldo', $saldoLogado);
        $this->db->where('idUsuario', $idLogado);
        $this->db->update('usuarios');
    }
        
    public function login_user($usuario,$senha){
 
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario',$usuario);
        $this->db->where('senha',$senha);
        $this->db->where('status',1);

        if($query=$this->db->get()){
            return $query->row_array();
        }else{
          return false;
        } 
    }
    
    public function get($idUsuario = null){
		
		if ($idUsuario) {
			$this->db->where('idUsuario', $idUsuario);
		}
		$this->db->order_by("idUsuario", 'desc');
		return $this->db->get('usuarios');
    }
}
