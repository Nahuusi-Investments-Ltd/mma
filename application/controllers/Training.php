<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends MY_Controller {
    private $tbl_train_reasons = 'tbl_train_reasons';

    function index(){
        $data['title'] = 'Reasons To Train With Us';
        $data['minimized'] = false;

        $this->load->view('backend/content/training_reasons', $data);
    }

    function detail(){
        $training_reason = $this->data_model->get_table_data_where($this->tbl_train_reasons, array('id' => $this->input->get('id')))->row();
        if(!$training_reason)
            redirect('training', 'refresh');

        $data['title'] = $training_reason->title;
        $data['minimized'] = false;
        $data['training_reason'] = $training_reason;

        $this->load->view('backend/content/training_reason_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $training_reasons = $this->data_model->get_table_data($this->tbl_train_reasons);

        $response = array(
            'success' => true,
            'training_reasons' => array(
            )
        );

        foreach ($training_reasons->result() as $data) {
            array_push($response['training_reasons'], array(
                'id' => $data->id,
                'title' => $data->title,
                'description' => $data->description
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

        if($this->data_model->insert_table_data($this->tbl_train_reasons, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'training reason added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding training reason. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

        $condition = array('id' => $this->input->post('id'));

        if($this->data_model->save_table_data($this->tbl_train_reasons, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'training reason updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving training reason. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        if($this->data_model->delete_table_data($this->tbl_train_reasons, $condition)){
            http_response_code(204);
            die(json_encode(array(
                'success' => true,
                'message' => 'delete successfully.'
            )));
        }
        else{
            http_response_code(400);
            die(json_encode(array(
                'success' => false,
                'message' => 'unable to delete. try again later.'
            )));
        }
    }
}
