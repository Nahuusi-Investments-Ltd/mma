<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends MY_Controller {
    private $tbl_standards = 'tbl_standards';

    function index(){
        $data['title'] = 'Our Standards';
        $data['minimized'] = false;

        $this->load->view('backend/content/standard', $data);
    }

    function detail(){
        $standard = $this->data_model->get_table_data_where($this->tbl_standards, array('id' => $this->input->get('id')))->row();
        if(!$standard)
            redirect('standard', 'refresh');

        $data['title'] = $standard->title;
        $data['minimized'] = false;
        $data['standard'] = $standard;

        $this->load->view('backend/content/standard_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $standards = $this->data_model->get_table_data($this->tbl_standards);

        $response = array(
            'success' => true,
            'standards' => array(
            )
        );

        foreach ($standards->result() as $data) {
            $standard_exceprt = $data->message;
            if(strlen($data->message) > 250)
                $standard_exceprt = substr($data->message, 0, 250).'[...]';

            array_push($response['standards'], array(
                'id' => $data->id,
                'title' => $data->title,
                'message' => $standard_exceprt
            ));
        }
        
        die(json_encode($response));
    }

    function save(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message')
        );

        $condition = array(
            'id' => $this->input->post('id')
        );

        if($this->data_model->save_table_data($this->tbl_standards, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'standard updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving standard. try again later.'
            )));
        }
    }
}
