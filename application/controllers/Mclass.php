<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclass extends MY_Controller {
    private $tbl_classes = 'tbl_classes';

    function index(){
        $data['title'] = 'Classes';
        $data['minimized'] = false;

        $this->load->view('backend/content/class', $data);
    }

    function detail(){
        $class = $this->data_model->get_table_data_where($this->tbl_classes, array('id' => $this->input->get('id')))->row();
        if(!$class)
            redirect('class', 'refresh');

        $data['title'] = $class->title;
        $data['minimized'] = false;
        $data['class'] = $class;

        $this->load->view('backend/content/class_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $records = $this->data_model->get_table_data($this->tbl_classes);

        $response = array(
            'success' => true,
            'records' => array(
            )
        );

        foreach ($records->result() as $data) {
            $image_url = base_url('uploads/class').'/'.$data->link;

            array_push($response['records'], array(
                'id' => $data->id,
                'title' => $data->title,
                'sub_title' => $data->sub_title,
                'tag' => $data->tag,
                'content' => $data->content,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->title.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/class';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'sub_title' => $this->input->post('sub_title'),
            'tag' => $this->input->post('tag'),
            'content' => $this->input->post('content'),
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

        if($this->data_model->insert_table_data($this->tbl_classes, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'class added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding class. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/class';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'sub_title' => $this->input->post('sub_title'),
            'tag' => $this->input->post('tag'),
            'content' => $this->input->post('content')
        );

        $condition = array('id' => $this->input->post('id'));
        $class = $this->data_model->get_table_data_where($this->tbl_classes, $condition)->row();
        $current_link = $class->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/class/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('class_link');
        }

        if($this->data_model->save_table_data($this->tbl_classes, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'class updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving class. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $slide = $this->data_model->get_table_data_where($this->tbl_classes, $condition)->row();
        $link = $slide->link;

        if($this->data_model->delete_table_data($this->tbl_classes, $condition)){
            unlink('./uploads/class/'.$link);
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
