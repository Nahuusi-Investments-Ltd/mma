<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends MY_Controller {
    private $tbl_slides = 'tbl_slides';

    function index(){
        $data['title'] = 'Sliders';
        $data['minimized'] = false;

        $this->load->view('backend/content/slide', $data);
    }

    function detail(){
        $slide = $this->data_model->get_table_data_where($this->tbl_slides, array('id' => $this->input->get('id')))->row();
        if(!$slide)
            redirect('slide', 'refresh');

        $data['title'] = $slide->title;
        $data['minimized'] = false;
        $data['slide'] = $slide;

        $this->load->view('backend/content/slide_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $slides = $this->data_model->get_table_data($this->tbl_slides);

        $response = array(
            'success' => true,
            'slides' => array(
            )
        );

        foreach ($slides->result() as $data) {
            $image_url = base_url('uploads/slides').'/'.$data->link;

            array_push($response['slides'], array(
                'id' => $data->id,
                'title' => $data->title,
                'description' => $data->description,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->title.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/slides';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'link' => ''
        );

        $category_image_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $category_image_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];
            }
        }

        if($this->data_model->insert_table_data($this->tbl_slides, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'slide added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding slide. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/slides';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

        $condition = array('id' => $this->input->post('id'));
        $slide = $this->data_model->get_table_data_where($this->tbl_slides, $condition)->row();
        $current_link = $slide->link;

        $slide_image_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $slide_image_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/slides/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('slide_link');
        }

        if($this->data_model->save_table_data($this->tbl_slides, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'slide updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving slide. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $slide = $this->data_model->get_table_data_where($this->tbl_slides, $condition)->row();
        $link = $slide->link;

        if($this->data_model->delete_table_data($this->tbl_slides, $condition)){
            unlink('./uploads/slides/'.$link);
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
