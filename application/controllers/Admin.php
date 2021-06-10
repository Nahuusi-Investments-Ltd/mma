<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    function index(){
        $data['title'] = 'Categories';
        $data['minimized'] = false;

        $this->load->view('backend/content/category', $data);
    }

    function test_email(){
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
        $this->email->subject('Test email');
        $this->email->message('Message');
        $this->email->to('simeon.obwogo79@gmail.com');

        if($this->email->send())
            echo 'sent';
        else
            print_r($email->printDebugger(['headers']));
    }
}
