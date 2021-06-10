<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller {
    private $tbl_blog = 'tbl_blog';

    function index(){
        $data['title'] = 'Blogs';
        $data['minimized'] = false;

        $this->load->view('backend/content/blog', $data);
    }

    function detail(){
        $blog = $this->data_model->get_table_data_where($this->tbl_blog, array('id' => $this->input->get('id')))->row();
        if(!$blog)
            redirect('blog', 'refresh');

        $data['title'] = $blog->title;
        $data['minimized'] = false;
        $data['blog'] = $blog;

        $this->load->view('backend/content/blog_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $blogs = $this->data_model->get_table_data($this->tbl_blog);

        $response = array(
            'success' => true,
            'blogs' => array(
            )
        );

        foreach ($blogs->result() as $data) {
            $image_url = base_url('uploads/blog').'/'.$data->link;

            array_push($response['blogs'], array(
                'id' => $data->id,
                'title' => $data->title,
                'message' => $data->message,
                'number_of_views' => $data->number_of_views,
                'link' => '<img class="img-thumbnail" src="'.$image_url.'" alt="'.$data->title.'">'
            ));
        }
        
        die(json_encode($response));
    }

    function add(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/blog';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message'),
            'number_of_views' => $this->input->post('number_of_views'),
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

        if($this->data_model->insert_table_data($this->tbl_blog, $data)){
            http_response_code(201);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'blog added successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while adding blog. try again later.'
            )));
        }
    }

    function save(){
        header('Content-type: application/json');

        $config['upload_path'] = './uploads/blog';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message'),
            'number_of_views' => $this->input->post('number_of_views'),
        );

        $condition = array('id' => $this->input->post('id'));
        $blog = $this->data_model->get_table_data_where($this->tbl_blog, $condition)->row();
        $current_link = $blog->link;

        $upload_errors = '';

        if(!empty($_FILES['link']['name'])){
            if(!$this->upload->do_upload('link')){
                $upload_errors = $this->upload->display_errors();
            }
            else{
                $upload_data  = $this->upload->data();
                $data['link'] = $upload_data['file_name'];

                unlink('./uploads/blog/'.$current_link);
            }
        }
        else{
            $data['link'] = $this->input->post('blog_link');
        }

        if($this->data_model->save_table_data($this->tbl_blog, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'blog updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving blog. try again later.'
            )));
        }
    }

    function delete(){
        header('Content-type: application/json');

        $condition = array(
            'id' => $this->input->get('id')
        );

        $blog = $this->data_model->get_table_data_where($this->tbl_blog, $condition)->row();
        $link = $blog->link;

        if($this->data_model->delete_table_data($this->tbl_blog, $condition)){
            unlink('./uploads/blog/'.$link);
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
