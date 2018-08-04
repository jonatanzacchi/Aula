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
	   
        $id = $this->input->post("id");
        
        date_default_timezone_set('America/Sao_Paulo');
        $dataativacao = date('Y/m/d H:i:s', time());
        if(empty($id)){
           
            $usuario = $this->input->post('usuario');
            $senha = md5($this->input->post('senha'));
            $status = 1;
            $datainativacao = $this->input->post('datainativacao');
            
            

       $novaData = date('Y-m-d H:i:s', strtotime($datainativacao));
           
            $dados = array(
                "id" => $id,
                "user" => $usuario,
                "senha" => $senha,
                "status" => $status,
                "dataativacao" => $dataativacao,
                "datainativacao" => $datainativacao
            );
            

            $this->Usuario_model->inserir($usuario,$senha,$status,$dataativacao, $novaData);

            //$this->load->view('pessoa');

            echo "<script>      
                        alert('Salvo com Sucesso.');
                        location.href='http://localhost/aula/Aula/codeigniter/usuario';   
                    </script>";
        }else{
            $this->Usuario_model->id = $this->input->post('id');
            $this->Usuario_model->user = $this->input->post('usuario');
            $this->Usuario_model->senha = $this->input->post('senha');
            $this->Usuario_model->status = $this->input->post('status');
            $this->Usuario_model->dataativacao = $this->input->post('dataativacao');
            $this->Usuario_model->datainativacao = $this->input->post('datainativacao');

            $this->Usuario_model->editarUsuario($id);
            echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/usuario';   
                </script>";
       }
	}

    public function editarSenha() {

		$id = $this->input->post("id");
       
        $this->Usuario_model->id = $this->input->post('id');
        $this->Usuario_model->user = $this->input->post('usuario');
        $this->Usuario_model->senha = md5($this->input->post('senha'));
        $this->Usuario_model->status = $this->input->post('status');
        
        $this->Usuario_model->editarUsuario($id);
        echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/usuario';   
                </script>";
       
	}

    public function deleteUsuario(){
		$id=$this->input->get('id');
		$this->Usuario_model->deletarUsuario($id);
		echo "Date deleted successfully !";
		echo "<script>      
				alert('Usuário deletado com sucesso.');
				location.href='http://localhost/aula/codeigniter/usuario';   
			</script>";
	}
             
	public function edit($id = null){		
		if ($id) {			
			$cadastros = $this->Usuario_model->get($id);
			$data['listaUsuario'] = $this->Usuario_model->get_usuario();        
			if ($cadastros->num_rows() > 0 ) {
				$data['titulo'] = 'Edição de Registro';
				$data['id'] = $cadastros->row()->id;
				$data['usuario'] = $cadastros->row()->user;
				$data['senha'] = $cadastros->row()->senha;
				$data['status'] = $cadastros->row()->status;
                                $data['dataativacao'] = $cadastros->row()->dataativacao;
                                $data['datainativacao'] = $cadastros->row()->datainativacao;
				
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
        
        public function saldo($id = null){		
            if ($id) {			
                $cadastros = $this->Usuario_model->get($id);
                $data['listaUsuario'] = $this->Usuario_model->get_usuario();        
                if ($cadastros->num_rows() > 0 ) {
                        $data['titulo'] = 'Edição de Registro';
                        $data['id'] = $cadastros->row()->id;
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
            $id = $this->input->post("id");
            $saldo = $this->input->post("saldo");
            $this->Usuario_model->id = $this->input->post('id');
            $this->Usuario_model->usuario = $this->input->post('usuario');
            $this->Usuario_model->saldo = $this->input->post('saldo');
			
			//Altera Saldo Logado
			$idLogado = $this->input->post("idLogado");
			$saldoLogado = $this->input->post("saldoLogado");			
            
            $this->Usuario_model->editarSaldo($id, $saldo);
			$this->Usuario_model->editarSaldoLogado($idLogado, $saldoLogado);
            echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/farina/aula/codeigniter/usuario';   
                </script>";
        }
}