<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct( ){
        //parent::__construct( ); 
        //$this->load->library('session');
        
        //call CodeIgniter's default Constructor
		parent::__construct();
		$this->load->library('session');
		//load database libray manually
		$this->load->database();
		//load Model
		$this->load->model('Usuario_model');
    }

	public function index(){
		//$this->load->view('pessoa');
		
		//Executa o método get_produtos
		$data['listaUsuario'] = $this->Usuario_model->get_usuario();
		$data['titulo'] = "Usuários";            

		$data['pagina']='usuario';
		$this->load->view('principal', $data);             
	}
	
	public function alterarSenha(){
		//$this->load->view('pessoa');
            
		//Executa o método get_produtos
		$data['listaUsuario'] = $this->Usuario_model->get_usuario();
		$data['titulo'] = "Alterar Senha";

		$data['pagina']='alterarSenha';
		$this->load->view('principal', $data);             
	}
       
        
	public function novo(){
	   
   $idUsuario = $this->input->post("idUsuario");
	//$uf = $this->input->post("uf");
	//$nomeEstado = $this->input->post("nomeEstado");
	
	//echo "ID:" . $idEstado;
	//$dados = array();
       
		if(empty($idUsuario)){
            $dados = array();
            $this->Usuario_model->usuario = $this->input->post('usuario');
            $this->Usuario_model->senha = md5($this->input->post('senha'));
            $this->Usuario_model->status = $this->input->post('status');
            $this->Usuario_model->saldo = $this->input->post('saldo');

            $this->Usuario_model->inserir();

            //$this->load->view('pessoa');

            echo "<script>      
                        alert('Salvo com Sucesso.');
                        location.href='http://localhost/aula/codeigniter/usuario';   
                    </script>";
		}else{
			$this->Usuario_model->idUsuario = $this->input->post('idUsuario');
			$this->Usuario_model->usuario = $this->input->post('usuario');
			$this->Usuario_model->senha = $this->input->post('senha');
			$this->Usuario_model->status = $this->input->post('status');
			
			$this->Usuario_model->editarUsuario($idUsuario);
			echo "<script>      
						alert('Editado com Sucesso.');
						location.href='http://localhost/aula/codeigniter/usuario';   
					</script>";
       }
	}

    public function editarSenha() {

		$idUsuario = $this->input->post("idUsuario");
       
        $this->Usuario_model->idUsuario = $this->input->post('idUsuario');
        $this->Usuario_model->usuario = $this->input->post('usuario');
        $this->Usuario_model->senha = md5($this->input->post('senha'));
        $this->Usuario_model->status = $this->input->post('status');
        
        $this->Usuario_model->editarUsuario($idUsuario);
        echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/usuario';   
                </script>";
       
	}

    public function deleteUsuario(){
		$idUsuario=$this->input->get('idUsuario');
		$this->Usuario_model->deletarUsuario($idUsuario);
		echo "Date deleted successfully !";
		echo "<script>      
				alert('Usuário deletado com sucesso.');
				location.href='http://localhost/aula/codeigniter/usuario';   
			</script>";
	}
             
	public function edit($idUsuario = null){		
		if ($idUsuario) {			
			$cadastros = $this->Usuario_model->get($idUsuario);
			$data['listaUsuario'] = $this->Usuario_model->get_usuario();        
			if ($cadastros->num_rows() > 0 ) {
				$data['titulo'] = 'Edição de Registro';
				$data['idUsuario'] = $cadastros->row()->idUsuario;
				$data['usuario'] = $cadastros->row()->usuario;
				$data['senha'] = $cadastros->row()->senha;
				$data['status'] = $cadastros->row()->status;
				
				$data['titulo'] = "Usuários";
				$data['pagina']='usuario';
				$this->load->view('principal', $data);
				//$this->load->view('usuario', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}			
		}	
	}
        
        public function saldo($idUsuario = null){		
            if ($idUsuario) {			
                $cadastros = $this->Usuario_model->get($idUsuario);
                $data['listaUsuario'] = $this->Usuario_model->get_usuario();        
                if ($cadastros->num_rows() > 0 ) {
                        $data['titulo'] = 'Edição de Registro';
                        $data['idUsuario'] = $cadastros->row()->idUsuario;
                        $data['usuario'] = $cadastros->row()->usuario;
                        $data['senha'] = $cadastros->row()->senha;
                        $data['senha'] = $cadastros->row()->senha;
                        $data['saldo'] = $cadastros->row()->saldo;


                        $data['titulo'] = "Saldo";
                        $data['pagina']='editarUsuario';
                        $this->load->view('principal', $data);
                        //$this->load->view('usuario', $variaveis);
                } else {
                        $variaveis['mensagem'] = "Registro não encontrado." ;
                        $this->load->view('errors/html/v_erro', $variaveis);
                }			
            }	
	}      
                
        public function atualizarSaldo(){
			//Altera Saldo Usuário
            $idUsuario = $this->input->post("idUsuario");
            $saldo = $this->input->post("saldo");
            $this->Usuario_model->idUsuario = $this->input->post('idUsuario');
            $this->Usuario_model->usuario = $this->input->post('usuario');
            $this->Usuario_model->saldo = $this->input->post('saldo');
			
			//Altera Saldo Logado
			$idLogado = $this->input->post("idLogado");
			$saldoLogado = $this->input->post("saldoLogado");			
            
            $this->Usuario_model->editarSaldo($idUsuario, $saldo);
			$this->Usuario_model->editarSaldoLogado($idLogado, $saldoLogado);
            echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/farina/aula/codeigniter/usuario';   
                </script>";
        }
}