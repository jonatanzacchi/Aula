<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {
    
    public function __construct( ){        
            parent::__construct();
            $this->load->library('session');           

    }

    public function index(){
        $data['pagina']='footer';
        $this->load->view('principal', $data);
    }
}
