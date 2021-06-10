<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {
    private $tbl_faq = 'tbl_faq';

    function index(){
        $data['title'] = 'FAQs';
        $data['minimized'] = false;

        $this->load->view('backend/content/faq', $data);
    }

    function detail(){
        $faq = $this->data_model->get_table_data_where($this->tbl_faq, array('id' => $this->input->get('id')))->row();
        if(!$faq)
            redirect('faq', 'refresh');

        $data['title'] = $faq->title;
        $data['minimized'] = false;
        $data['faq'] = $faq;

        $this->load->view('backend/content/faq_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $faqs = $this->data_model->get_table_data($this->tbl_faq);

        $response = array(
            'success' => true,
            'faqs' => array(
            )
        );

        foreach ($faqs->result() as $data) {
            array_push($response['faqs'], array(
                'id' => $data->id,
                'title' => $data->title,
                'message' => $data->message
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message')
        );

        if($this->data_model->insert_table_data($this->tbl_faq, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'faq added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding faq. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message')
        );

        $condition = array('id' => $this->input->post('id'));

        if($this->data_model->save_table_data($this->tbl_faq, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'faq updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving faq. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        if($this->data_model->delete_table_data($this->tbl_faq, $condition)){
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
