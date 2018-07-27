<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado extends CI_Controller {

    public function __construct( )
    {
        //parent::__construct( ); 
        //$this->load->library('session');
        
        //call CodeIgniter's default Constructor
            parent::__construct();
            $this->load->library('session');
            //load database libray manually
            $this->load->database();
            //load Model
            $this->load->model('Estado_model');
    }

	public function index()
	{
		//$this->load->view('pessoa');
            
            //Executa o método get_produtos
            $data['listaEstado'] = $this->Estado_model->get_estados();
            $data['titulo'] = "Estados";
 
            $data['pagina']='estado';
            $this->load->view('principal', $data);
             
	}
       
        
        public function editar() {
           
       $idEstado = $this->input->post("idEstado");
        //$uf = $this->input->post("uf");
        //$nomeEstado = $this->input->post("nomeEstado");
        
        //echo "ID:" . $idEstado;
        //$dados = array();
       
       if(empty($idEstado)){
            $dados = array();
            $this->Estado_model->uf = $this->input->post('uf');
            $this->Estado_model->nomeEstado = $this->input->post('nomeEstado');        

            $this->Estado_model->inserir();

            //$this->load->view('pessoa');

            echo "<script>      
                        alert('Salvo com Sucesso.');
                        location.href='http://localhost/aula/codeigniter/estado';   
                    </script>";
       }else{
           
       
        $this->Estado_model->idEstado = $this->input->post('idEstado');
        $this->Estado_model->uf = $this->input->post('uf');
        $this->Estado_model->nomeEstado = $this->input->post('nomeEstado');
        
        $this->Estado_model->editarEstado($idEstado);
        echo "<script>      
                    alert('Editado com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/estado';   
                </script>";
       }
}
    
    public function salvar(){
        $dados = array();
        $this->Estado_model->uf = $this->input->post('uf');
        $this->Estado_model->nomeEstado = $this->input->post('nomeEstado');        
        
        $this->Estado_model->inserir();
        
        //$this->load->view('pessoa');
        
        echo "<script>      
                    alert('Salvo com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/estado';   
                </script>";
    }

    public function deleteEstado(){
            $idEstado=$this->input->get('idEstado');
            $this->Estado_model->deletarEstado($idEstado);
            echo "Date deleted successfully !";
            echo "<script>      
                    alert('Estado Deletado com Sucesso.');
                    location.href='http://localhost/aula/codeigniter/estado';   
                </script>";
        }
		
	public function edit($idEstado = null){		
		if ($idEstado) {			
			$cadastros = $this->Estado_model->get($idEstado);
			$data['listaEstado'] = $this->Estado_model->get_estados();        
			if ($cadastros->num_rows() > 0 ) {
				$data['titulo'] = 'Edição de Registro';
				$data['idEstado'] = $cadastros->row()->idEstado;
				$data['uf'] = $cadastros->row()->uf;
				$data['nomeEstado'] = $cadastros->row()->nomeEstado;
				
				$data['titulo'] = "Estados";
				$data['pagina']='estado';
				$this->load->view('principal', $data);
				//$this->load->view('usuario', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}			
		}
	
	}
}
