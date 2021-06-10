<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends MY_Controller {
    private $tbl_photo = 'tbl_photo';

    function index(){
        $data['title'] = 'Photos';
        $data['minimized'] = false;

        $this->load->view('backend/content/photo', $data);
    }

    function detail(){
        $photo = $this->data_model->get_table_data_where($this->tbl_photo, array('id' => $this->input->get('id')))->row();
        if(!$photo)
            redirect('photo', 'refresh');

        $data['title'] = $photo->title;
        $data['minimized'] = false;
        $data['photo'] = $photo;

        $this->load->view('backend/content/photo_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $photos = $this->data_model->get_table_data($this->tbl_photo);

        $response = array(
            'success' => true,
            'photos' => array(
            )
        );

        foreach ($photos->result() as $data) {
            $photo_url = base_url('uploads/photo').'/'.$data->link;

            array_push($response['photos'], array(
                'id' => $data->id,
                'title' => $data->title,
                'link' => '<img class="img-thumbnail" src="'.$photo_url.'" alt="'.$data->title.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/photo';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
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

        if($this->data_model->insert_table_data($this->tbl_photo, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'photo added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding photo. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/photo';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title')
        );

        $condition = array('id' => $this->input->post('id'));
        $photo = $this->data_model->get_table_data_where($this->tbl_photo, $condition)->row();
        $current_link = $photo->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/photo/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('photo_link');
        }

        if($this->data_model->save_table_data($this->tbl_photo, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'photo updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving photo. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $photo = $this->data_model->get_table_data_where($this->tbl_photo, $condition)->row();
        $link = $photo->link;

        if($this->data_model->delete_table_data($this->tbl_photo, $condition)){
            unlink('./uploads/photo/'.$link);
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
