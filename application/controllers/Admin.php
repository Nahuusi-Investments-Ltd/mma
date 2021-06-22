<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    function index(){
        $data['title'] = 'Categories';
        $data['minimized'] = false;

        $this->load->view('backend/content/category', $data);
    }

    function password(){
        $data['title'] = 'Change Password';
        $data['minimized'] = false;

        $this->load->view('backend/content/password', $data);
    }

    function change_password(){
        $password = $this->input->post('password');
        $data = array(
            'password' => $password
        );

        if($this->data_model->save_table_data('tbl_user', $data, array('id' => $this->session->user->id))){
            $subject = 'Password Changed';
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
                    'message' => $this->email->printDebugger(['headers'])
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
