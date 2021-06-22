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

    function forgot(){
        $this->load->view('backend/auth/forgot');
    }

    function logout(){
        session_destroy();
        redirect('admin', 'refresh');
    }

    function reset(){
        header('Content-type: application/json');

        $condition = array(
            'email' => $this->input->post('email')
        );

        $user = $this->data_model->get_table_data_where('tbl_user', $condition)->row();
        if(!$user){
            http_response_code(404);

            die(json_encode(array(
                'success' => false,
                'message' => 'No such email exists.'
            )));
        }
        else{
            $password = $this->data_model->get_password();
            $data = array(
                'password' => sha1($password)
            );
            $condition = array(
                'id' => $user->id
            );

            if($this->data_model->save_table_data('tbl_user', $data, $condition)){
                $subject = "Change Password";
                $message = "You have successfully changed your password to: $password\n\n Login link: ".site_url();

                $config['smtp_host'] = $_ENV['SMTP_HOST'];
                $config['smtp_port'] = $_ENV['SMTP_PORT'];
                $config['smtp_user'] = $_ENV['SMTP_USER'];
                $config['smtp_pass'] = $_ENV['SMTP_PASSWORD'];
                $config['protocol'] = $_ENV['SMTP_PROTOCOL'];
                $config['smtp_crypto'] = $_ENV['SMTP_CRYPTO'];
                $config['mailtype'] = $_ENV['SMTP_TYPE'];
                $config['wordWrap'] = true;

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($_ENV['SMTP_USER'], $_ENV['SITE_TITLE']);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->to($_ENV['ADMIN_EMAIL']);

                if($this->email->send()){
                    http_response_code(204);

                    die(json_encode(array(
                        'success' => true,
                        'message' => 'password changed.'
                    )));
                }
                else{
                    http_response_code(400);

                    die(json_encode(array(
                        'success' => false,
                        'message' => $this->email->print_debugger()
                    )));
                }
            }
            else{
                http_response_code(400);

                die(json_encode(array(
                    'success' => false,
                    'message' => 'Unable to change password.'
                )));
            }
        }
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