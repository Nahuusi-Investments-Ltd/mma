<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct(){
        parent::__construct();
        
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

    function index(){
		$this->load->view('backend/auth/login');
    }

    function logout(){
        session_destroy();
        redirect('admin', 'refresh');
    }

    function process_login(){
        header('Content-type: application/json');

        $condition = array(
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password'))
        );

        $user = $this->data_model->get_table_data_where('tbl_user', $condition)->row();

        if(!$user){
            http_response_code(404);

            die(json_encode(array(
                'success' => false,
                'message' => 'wrong email or password used.'
            )));
        }
        else{
            http_response_code(200);

            $this->session->set_userdata(array(
                'mma_logged_in' => true,
                'user' => $user
            ));

            die(json_encode(array(
                'success' => true,
                'message' => 'wrong email or password used.'
            )));
        }
    }
}
?>