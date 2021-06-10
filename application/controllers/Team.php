<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {
    private $tbl_team = 'tbl_team';

    function index(){
        $data['title'] = 'Team Members';
        $data['minimized'] = false;

        $this->load->view('backend/content/team', $data);
    }

    function detail(){
        $member = $this->data_model->get_table_data_where($this->tbl_team, array('id' => $this->input->get('id')))->row();
        if(!$member)
            redirect('team', 'refresh');

        $data['title'] = $member->name;
        $data['minimized'] = false;
        $data['member'] = $member;

        $this->load->view('backend/content/team_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $teams = $this->data_model->get_table_data($this->tbl_team);

        $response = array(
            'success' => true,
            'teams' => array(
            )
        );

        foreach ($teams->result() as $data) {
            $image_url = base_url('uploads/team').'/'.$data->photo;

            array_push($response['teams'], array(
                'id' => $data->id,
                'name' => $data->name,
                'title' => $data->title,
                'photo' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->name.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/team';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'photo' => ''
        );

        $upload_errors = '';

        if(!empty($_FILES['photo']['name'])){
            if(!$this->upload->do_upload('photo')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['photo'] = $upload_data['file_name'];
            }
        }

        if($this->data_model->insert_table_data($this->tbl_team, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'team member added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding team member. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/team';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title')
        );

        $condition = array('id' => $this->input->post('id'));
        $team = $this->data_model->get_table_data_where($this->tbl_team, $condition)->row();
        $current_link = $team->photo;

        $upload_errors = '';

        if(!empty($_FILES['photo']['name'])){
            if(!$this->upload->do_upload('photo')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['photo'] = $upload_data['file_name'];

                unlink('./uploads/team/'.$current_link);
            }
        }
        else{
            $data['photo'] = $this->input->post('team_photo');
        }

        if($this->data_model->save_table_data($this->tbl_team, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'team member updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving team member. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $team = $this->data_model->get_table_data_where($this->tbl_team, $condition)->row();
        $photo = $team->photo;

        if($this->data_model->delete_table_data($this->tbl_team, $condition)){
            unlink('./uploads/team/'.$photo);
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
