<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {
    private $tbl_schedule = 'tbl_schedule';

    function index(){
        $data['title'] = 'Schedule';
        $data['minimized'] = false;

        $this->load->view('backend/content/schedule', $data);
    }

    function detail(){
        $schedule = $this->data_model->get_table_data_where($this->tbl_schedule, array('id' => $this->input->get('id')))->row();
        if(!$schedule)
            redirect('schedule', 'refresh');

        $data['title'] = 'Schedule';
        $data['minimized'] = false;
        $data['schedule'] = $schedule;

        $this->load->view('backend/content/schedule_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $schedules = $this->data_model->get_table_data($this->tbl_schedule);

        $response = array(
            'success' => true,
            'schedules' => array(
            )
        );

        foreach ($schedules->result() as $data) {
            $image_url = base_url('uploads/schedule').'/'.$data->link;

            array_push($response['schedules'], array(
                'id' => $data->id,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="Schedule Image">'
            ));
        }
        
        die(json_encode($response));
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/schedule';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'link' => $this->input->post('schedule_link')
        );

        $condition = array('id' => $this->input->post('id'));
        $schedule = $this->data_model->get_table_data_where($this->tbl_schedule, $condition)->row();
        $current_link = $schedule->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/schedule/'.$current_link);
            }
        }

        if($this->data_model->save_table_data($this->tbl_schedule, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'schedule updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving schedule. try again later.'
            )));
        }
    }
}
