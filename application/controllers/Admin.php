<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    function index(){
        $data['title'] = 'Categories';
        $data['minimized'] = false;

        $this->load->view('backend/content/category', $data);
    }
}
