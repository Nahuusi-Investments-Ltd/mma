<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimony extends MY_Controller {
    private $tbl_testimony = 'tbl_testimony';

    function index(){
        $data['title'] = 'Testimonials';
        $data['minimized'] = false;

        $this->load->view('backend/content/testimony', $data);
    }

    function detail(){
        $testimony = $this->data_model->get_table_data_where($this->tbl_testimony, array('id' => $this->input->get('id')))->row();
        if(!$testimony)
            redirect('testimony', 'refresh');

        $data['title'] = $testimony->name;
        $data['minimized'] = false;
        $data['testimony'] = $testimony;

        $this->load->view('backend/content/testimony_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $testimonies = $this->data_model->get_table_data($this->tbl_testimony);

        $response = array(
            'success' => true,
            'testimonies' => array(
            )
        );

        foreach ($testimonies->result() as $data) {
            $image_url = base_url('uploads/testimony').'/'.$data->link;

            $testimony_exceprt = $data->message;
            if(strlen($data->message) > 250)
                $testimony_exceprt = substr($data->message, 0, 250).'[...]';

            array_push($response['testimonies'], array(
                'id' => $data->id,
                'name' => $data->name,
                'message' => $testimony_exceprt,
                'rating' => $data->rating,
                'testimony_type' => $data->testimony_type,
                'columns' => $data->columns,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->name.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/testimony';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'message' => $this->input->post('message'),
            'rating' => $this->input->post('rating'),
            'testimony_type' => $this->input->post('testimony_type'),
            'columns' => $this->input->post('columns'),
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

        if($this->data_model->insert_table_data($this->tbl_testimony, $data)){
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

        $config['upload_path'] = './uploads/testimony';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'name' => $this->input->post('name'),
            'message' => $this->input->post('message'),
            'rating' => $this->input->post('rating'),
            'testimony_type' => $this->input->post('testimony_type'),
            'columns' => $this->input->post('columns')
        );

        $condition = array('id' => $this->input->post('id'));
        $testimony = $this->data_model->get_table_data_where($this->tbl_testimony, $condition)->row();
        $current_link = $testimony->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/testimony/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('testimony_link');
        }

        if($this->data_model->save_table_data($this->tbl_testimony, $data, $condition)){
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

        $testimony = $this->data_model->get_table_data_where($this->tbl_testimony, $condition)->row();
        $link = $testimony->link;

        if($this->data_model->delete_table_data($this->tbl_testimony, $condition)){
            unlink('./uploads/testimony/'.$link);
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
