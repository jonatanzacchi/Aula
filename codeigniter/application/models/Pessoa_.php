<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

  public function __construct(){
            //call CodeIgniter's default Constructor
            parent::__construct();
            //load database libray manually
            $this->load->database();
            //load Model
            $this->load->model('Post_model');
        }
    
	public function index()
	{
            

            //Executa o método get_produtos
            $dados['lista'] = $this->Post_model->get_alunos();
 
            //Carrega a View
            $this->load->view('pessoa', $dados);
           
	}
          
        
	
	public function save_userinput()
        {
      //code goes here
      // for example: getting the post values of the form:
      $nome = $this->input->post("nome");
      // or just the username:
      $dt_nasc = $this->input->post("dt_nasc");
	  $documento = $this->input->post("documento");
	  $fone = $this->input->post("fone");
	  $endereco = $this->input->post("endereco");
	  $pais = $this->input->post("pais");
	  $cidade = $this->input->post("cidade");
	  $uf = $this->input->post("uf");
	  $email = $this->input->post("email");
	  

      // then do whatever you want with it :)
	echo "Nome: " . $nome . "<br>".
		"Data de Nascimento: " . $dt_nasc . "<br>" .
		"Documento: " . $documento . "<br>" .
		"Data de Nascimento: " . $dt_nasc . "<br>" .
		"Fone: " . $fone . "<br>" .
		"Endereço: " . $endereco . "<br>" .
		"País: " . $pais . "<br>" .
		"Cidade: " . $cidade . "<br>" .
		"UF: " . $uf . "<br>" .
		"E-Mail: " . $email;
    }
    
    public function salvar(){
        $dados = array();
        $this->Post_model->nome = $this->input->post('nome');
        $this->Post_model->documento = $this->input->post('documento');
        $this->Post_model->endereco = $this->input->post('endereco');
        $this->Post_model->pais = $this->input->post('pais');
        $this->Post_model->cidade = $this->input->post('cidade');
        $this->Post_model->uf = $this->input->post('uf');
        $this->Post_model->email = $this->input->post('email');
        $this->Post_model->fone = $this->input->post('fone');
        $this->Post_model->numero = $this->input->post('numero');
        $this->Post_model->data_nasc = $this->input->post('dt_nasc');
        
        
        $this->Post_model->inserir();
        
        $this->load->view('pessoa');
    }

    public function deletedata(){
            $id=$this->input->get('id');
            $this->Post_model->deletarAluno($id);
            echo "Date deleted successfully !";
            echo "<script>      
                    alert('OK.');
                    location.href='http://localhost/aula/codeigniter/';   
                </script>";
        }
        
        public function dispdata()
        {
            $result['data']=$this->Post_model->display_records();
            $this->load->view('update_dados',$result);
        }
        public function updatedata()
        {
            $id=$this->input->get('id');
            $result['data']=$this->Post_model->displayrecordsById($id);
            $this->load->view('update_dados',$result);  
            if($this->input->post('update'))
        {
            $nome=$this->input->post('nome');
            $documento=$this->input->post('documento');
            $email=$this->input->post('email');
            $this->Post_model->update_records($nome,$documento,$email,$id);
            echo "Date updated successfully !";
           }
        }
}
