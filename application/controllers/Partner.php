<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends MY_Controller {
    private $tbl_partner = 'tbl_partner';

    function index(){
        $data['title'] = 'Partners';
        $data['minimized'] = false;

        $this->load->view('backend/content/partner', $data);
    }

    function detail(){
        $partner = $this->data_model->get_table_data_where($this->tbl_partner, array('id' => $this->input->get('id')))->row();
        if(!$partner)
            redirect('partner', 'refresh');

        $data['title'] = $partner->name;
        $data['minimized'] = false;
        $data['partner'] = $partner;

        $this->load->view('backend/content/partner_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $partners = $this->data_model->get_table_data($this->tbl_partner);

        $response = array(
            'success' => true,
            'partners' => array(
            )
        );

        foreach ($partners->result() as $data) {
            $image_url = base_url('uploads/partner').'/'.$data->link;

            array_push($response['partners'], array(
                'id' => $data->id,
                'name' => $data->name,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->name.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/partner';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
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

        if($this->data_model->insert_table_data($this->tbl_partner, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'partner added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding partner. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/partner';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name')
        );

        $condition = array('id' => $this->input->post('id'));
        $partner = $this->data_model->get_table_data_where($this->tbl_partner, $condition)->row();
        $current_link = $partner->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/partner/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('team_photo');
        }

        if($this->data_model->save_table_data($this->tbl_partner, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'partner updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving partner. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $partner = $this->data_model->get_table_data_where($this->tbl_partner, $condition)->row();
        $link = $partner->link;

        if($this->data_model->delete_table_data($this->tbl_partner, $condition)){
            unlink('./uploads/partner/'.$link);
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
