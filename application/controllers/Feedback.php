<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller {
    private $tbl_testimonials = 'tbl_testimonials';

    function index(){
        $data['title'] = 'Clients Testimony';
        $data['minimized'] = false;

        $this->load->view('backend/content/client_testimony', $data);
    }

    function detail(){
        $testimony = $this->data_model->get_table_data_where($this->tbl_testimonials, array('id' => $this->input->get('id')))->row();
        if(!$testimony)
            redirect('feedback', 'refresh');

        $data['title'] = $testimony->name;
        $data['minimized'] = false;
        $data['testimony'] = $testimony;

        $this->load->view('backend/content/client_testimony_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $testimonies = $this->data_model->get_table_data($this->tbl_testimonials);

        $response = array(
            'success' => true,
            'testimonies' => array(
            )
        );

        foreach ($testimonies->result() as $data) {
            $image_url = base_url('uploads/testimonials').'/'.$data->link;

            array_push($response['testimonies'], array(
                'id' => $data->id,
                'name' => $data->name,
                'message' => $data->message,
                'link' => '<img class="c-avatar-img" src="'.$image_url.'" alt="'.$data->name.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/testimonials';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'message' => $this->input->post('message'),
            'link' => ''
        );

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];
            }
        }

        if($this->data_model->insert_table_data($this->tbl_testimonials, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'testimony added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding testimony. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/testimonials';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'message' => $this->input->post('message')
        );

        $condition = array('id' => $this->input->post('id'));
        $slide = $this->data_model->get_table_data_where($this->tbl_testimonials, $condition)->row();
        $current_link = $slide->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/testimonials/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('testimony_link');
        }

        if($this->data_model->save_table_data($this->tbl_testimonials, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'testimony updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving testimony. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $slide = $this->data_model->get_table_data_where($this->tbl_testimonials, $condition)->row();
        $link = $slide->link;

        if($this->data_model->delete_table_data($this->tbl_testimonials, $condition)){
            unlink('./uploads/testimonials/'.$link);
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
