 <?php
    class Crud extends CI_Controller{
    
        public function __construct(){
            //call CodeIgniter's default Constructor
            parent::__construct();
            //load database libray manually
            $this->load->database();
            //load Model
            $this->load->model('Crud_model');
        }
        
        public function displaydata(){
            $result['data']=$this->Crud_model->display_records();
            $this->load->view('listar',$result);
        }
        
        public function deletedata(){
            $id=$this->input->get('id');
            $this->Crud_model->deletarAluno($id);
            echo "Date deleted successfully !";
            echo "<script>			
                    alert('OK.');
                    location.href='http://localhost/aula/codeigniter/';		
                </script>";
        }
        
        public function dispdata(){
			$result['data']=$this->Crud_model->display_records();
			$this->load->view('display_records',$result);
		}
		
		public function updatedata(){
			$id=$this->input->get('id');
			$result['data']=$this->Crud_model->displayrecordsById($id);
			$this->load->view('update_records',$result);	
			if($this->input->post('update')){
				$first_name=$this->input->post('first_name');
				$last_name=$this->input->post('last_name');
				$email=$this->input->post('email');
				$this->Crud_model->update_records($first_name,$last_name,$email,$id);
				echo "Date updated successfully !";
			}
		}
    }
?> 