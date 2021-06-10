<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller {
    private $tbl_media = 'tbl_media';

    function index(){
        $data['title'] = 'Videos';
        $data['minimized'] = false;

        $this->load->view('backend/content/video', $data);
    }

    function detail(){
        $video = $this->data_model->get_table_data_where($this->tbl_media, array('id' => $this->input->get('id')))->row();
        if(!$video)
            redirect('video', 'refresh');

        $data['title'] = $video->title;
        $data['minimized'] = false;
        $data['video'] = $video;

        $this->load->view('backend/content/video_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $videos = $this->data_model->get_table_data($this->tbl_media);

        $response = array(
            'success' => true,
            'videos' => array(
            )
        );

        foreach ($videos->result() as $data) {
            $frame_src = '<iframe width="460" height="215" src="'.$data->link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            array_push($response['videos'], array(
                'id' => $data->id,
                'title' => $data->title,
                'link' => $frame_src
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link')
        );

        if($this->data_model->insert_table_data($this->tbl_media, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'media added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding media. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $data = array(
            'title' => $this->input->post('title'),
            'link' => $this->input->post('link')
        );

        $condition = array('id' => $this->input->post('id'));

        if($this->data_model->save_table_data($this->tbl_media, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'media updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving media. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        if($this->data_model->delete_table_data($this->tbl_media, $condition)){
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
