<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    function __construct(){
        parent::__construct();
        
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

    function index(){
        $data['title'] = 'Categories';
        $data['minimized'] = false;

        $this->load->view('backend/content/category', $data);
    }

    function category_detail(){
        $category = $this->data_model->get_table_data_where('tbl_category', array('id' => $this->input->get('id')))->row();
        if(!$category)
            redirect('admin', 'refresh');

        $data['title'] = $category->title;
        $data['minimized'] = false;
        $data['category'] = $category;

        $this->load->view('backend/content/category_detail', $data);
    }

    function get_categories(){
        header('Content-type: application/json');
        $categories = $this->data_model->get_table_data('tbl_category');

        $response = array(
            'success' => true,
            'categories' => array(
            )
        );

        foreach ($categories->result() as $data) {
            $image_url = base_url('uploads/category').'/'.$data->link;

            array_push($response['categories'], array(
                'id' => $data->id,
                'title' => $data->title,
                'description' => $data->description,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->title.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add_category(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/category';
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

        if($this->data_model->insert_table_data('tbl_category', $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'category added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding category. try again later.'
            )));
        }
    }

    function save_category(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/category';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );

        $condition = array('id' => $this->input->post('id'));
        $category = $this->data_model->get_table_data_where('tbl_category', $condition)->row();
        $current_link = $category->link;

        $category_image_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $category_image_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/category/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('category_link');
        }

        if($this->data_model->save_table_data('tbl_category', $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'category updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving category. try again later.'
            )));
        }
    }

    function delete_category(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $category = $this->data_model->get_table_data_where('tbl_category', $condition)->row();
        $link = $category->link;

        if($this->data_model->delete_table_data('tbl_category', $condition)){
            unlink('./uploads/category/'.$link);
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
