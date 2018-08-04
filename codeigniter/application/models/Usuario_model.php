<?php

class Usuario_model extends CI_Model {

    public $id;
    public $user;
    public $senha;
    public $status;
    public $dataativacao;
    public $datainativacao;

    public function __construct() {
        parent::__construct();
    }

    public function inserir($usuario,$senha,$status,$dataativacao,$novaData) {
        //var_dump($dados);
        //exit;
        //foreach ($dados as $key => $value) {
        //   echo $value;
           //echo $key->$value;
        //}
        
       // exit;
        $sql= "INSERT INTO usuarios(user, senha, status, dataativacao, datainativacao) "
                . "VALUES ('$usuario','$senha',$status,'$dataativacao','$novaData')";
        
       $retorno = $this->db->query($sql);
        
       // $this->db->insert('usuarios', $dados);
    }
    
    public function get_usuario(){
		$this->db->select("*,DATE_FORMAT(dataativacao,'%d/%m/%Y %H:%i:%s') AS dataativacao, if(status = 1, 'Ativo', 'Não') as status");
		//log_message("abc", $this->db->select("*, DATE_FORMAT(dataativacao,'%d/%m/%Y %H:%i:%s') AS dataativacao, if(status = 1, 'Ativo', 'Não') as status"));
                $this->db->from("usuarios");

		$query = $this->db->get();
        return $query->result();
    }
    
    function deletarUsuario($idUsuario){
            //$this->db->query("delete from cadastro where id='".$id
            
            $this->db->where('idUsuario', $idUsuario);
            $this->db->delete('usuarios');
    }
        
    function editarUsuario($id){   
        $this->db->where('id', $id);
        $this->db->update('usuarios', $this);
    } 
    
    function editarSaldo($idUsuario, $saldo){
        $this->db->set('saldo', $saldo);
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios');
    }
	
	function editarSaldoLogado($idLogado, $saldoLogado){
        $this->db->set('saldo', $saldoLogado);
        $this->db->where('id', $idLogado);
        $this->db->update('usuarios');
    }
        
    public function login_user($usuario,$senha){
 
        $this->db->select('*');
        $this->db->from('usuarios');        
        $this->db->where('user',$usuario);
        $this->db->where('senha',$senha);
        $this->db->where('datainativacao > now()');
        $this->db->where('status',1);

        if($query=$this->db->get()){
            return $query->row_array();
        }else{
          return false;
        } 
    }
    
    public function get($id = null){
		
		if ($id) {
                    
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('usuarios');
    }
}
