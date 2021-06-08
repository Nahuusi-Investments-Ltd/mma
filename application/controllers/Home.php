<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function index(){
		$data['title'] = $_ENV['SITE_TITLE'];
		$data['slides'] = $this->data_model->get_table_data('tbl_slides');
		$data['categories'] = $this->data_model->get_table_data('tbl_category');
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$this->load->view('frontend/content/home', $data);
	}

	function about(){
		$data['title'] = 'About 374 MMA';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$this->load->view('frontend/content/about', $data);
	}

	function team(){
		$data['title'] = '374 MMA Team';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$data['team_members'] = $this->data_model->get_table_data('tbl_team');
		$this->load->view('frontend/content/team', $data);
	}

	function partners(){
		$data['title'] = '374 MMA Partners';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$data['partners'] = $this->data_model->get_table_data('tbl_partner');
		$this->load->view('frontend/content/partner', $data);
	}

	function classes(){
		$data['title'] = '374 MMA Classes';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$data['classes'] = $this->data_model->get_table_data('tbl_classes');
		$this->load->view('frontend/content/class', $data);
	}

	function faq(){
		$data['title'] = 'FAQ at 374 MMA';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$data['faqs'] = $this->data_model->get_table_data('tbl_faq');
		$this->load->view('frontend/content/faq', $data);
	}

	function schedule(){
		$data['title'] = '374 MMA Schedule';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonials'] = $this->data_model->get_table_data('tbl_testimonials');
		$this->load->view('frontend/content/schedule', $data);
	}

	function photo(){
		$data['title'] = '374 MMA Photos';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['media'] = $this->data_model->get_table_data('tbl_media');
		$this->load->view('frontend/content/photo', $data);
	}

	function video(){
		$data['title'] = '374 MMA Videos';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['media'] = $this->data_model->get_table_data('tbl_media');
		$this->load->view('frontend/content/video', $data);
	}

	function blog(){
		$data['title'] = '374 MMA Blog';
		$data['blogs'] = $this->data_model->get_table_data('tbl_blog');
		$this->load->view('frontend/content/blog', $data);
	}

	function blog_detail($id){
		$blog_detail = $this->data_model->get_table_data_where('tbl_blog', array('id' => $id))->row();
		if(!$blog_detail)
			redirect('blog', 'refresh');

		$data['title'] = $blog_detail->title;
		$data['blog'] = $blog_detail;
		$this->load->view('frontend/content/blog_detail', $data);
	}

	function testimonials(){
		$data['title'] = '374 MMA Testimonials';
		$data['training_reasons'] = $this->data_model->get_table_data('tbl_train_reasons');
		$data['testimonies'] = $this->data_model->get_table_data('tbl_testimony');
		$this->load->view('frontend/content/testimonials', $data);
	}

	function contact(){
		$data['title'] = 'Contact 374 MMA';
		$this->load->view('frontend/content/contact', $data);
	}

	function enroll(){
		$data['title'] = 'Enroll Today at 374 MMA';
		$this->load->view('frontend/content/enroll', $data);
	}

	function standard(){
		$data['title'] = '374 MMA Standards';
		$this->load->view('frontend/content/standard', $data);
	}

	function privacy(){
		$data['title'] = 'Privacy Policy at 374 MMA';
		$this->load->view('frontend/content/privacy', $data);
	}

	function newsletter_subscription(){
		header('Content-type: application/json');

		if($this->input->server('REQUEST_METHOD') != 'POST')
			die(json_encode(array(
				'success' => false,
				'message' => 'access not allowed'
			)));

		$data = array(
			'email' => $this->input->post('email_newsletter')
		);

		
		if($this->data_model->insert_table_date('tbl_subscriptions', $data))
			die(json_encode(array(
				'success' => true,
				'message' => 'Thank you '.$this->input->post('email_newsletter').', your subscription has been submitted.'
			)));
		else
			die(json_encode(array(
				'success' => false,
				'message' => 'Something went wrong while trying to submit your subscription. Please try again later.'
			)));
	}
}
