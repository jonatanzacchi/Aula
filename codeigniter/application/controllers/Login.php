<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){ 
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Usuario_model');
        $this->load->library('session'); 
    }

    public function index() {
        
        $this->load->view('login');
    }

    public function recebe_dados(){
         
          $usuario = $this->input->post("usuario");
          $senha = $this->input->post("senha");
          
           echo "Usuário: " . $usuario . "<br>".
		"Senha: " . $senha . "<br>";
    }
    
    public function logar(){
		
        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");

        //Código sha1  da senha 123456 7c4a8d09ca3762af61e59520943dc26494f8941b
        //O usuário no exemplo aqui será usuario@email.com.br
        //Mas em um projeto real, você trará isto do banco de dados.

        //Se o usuário e senha combinarem, então basta eu redirecionar para a url base, pois agora o usuário irá passa
        //pela verificação que checa se ele está logado.
        if ($usuario == "123" && $senha == '123' ) {
                $this->session->set_userdata("logado", 1);
                redirect(base_url().'usuario');
        } else {
                //caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
                $dados['erro'] = "Usuário/Senha incorretos";
                $this->load->view("login", $dados);
        }
    }
       
    public function logout(){
            $this->session->unset_userdata("logado");
			$this->session->sess_destroy();
            redirect(base_url().'login');
    }
 
    function logarUsuario(){
        $user_login=array(

        'usuario'=>$this->input->post('usuario'),
        'senha'=>md5($this->input->post('senha'))

        );

        $data=$this->Usuario_model->login_user($user_login['usuario'],$user_login['senha']);
        if($data){
            $this->session->set_userdata('id',$data['id']);
            $this->session->set_userdata('user',$data['usuario']);
            $this->session->set_userdata('senha',$data['senha']);
            // $this->load->view('usuario.php');
            redirect($this->index().'usuario'); 
        }else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            //$this->load->view("login.php");
            redirect($this->index().'login'); 
        }
    }
}
