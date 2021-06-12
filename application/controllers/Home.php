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

	function team_member(){
		$member = $this->data_model->get_table_data_where('tbl_team', array('id' => $this->input->get('id')))->row();
		if(!$member)
			redirect('team', 'refresh');

		$data['title'] = $member->name;
		$data['member'] = $member;
		$this->load->view('frontend/content/team_detail', $data);
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
		$data['media'] = $this->data_model->get_table_data('tbl_photo');
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

		
		if($this->data_model->insert_table_data('tbl_subscriptions', $data))
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

	function contact_user(){
		header('Content-type: application/json');

		$name = $this->input->post('fullname');
		$email = $this->input->post('email_contact');
		$telephone = $this->input->post('phone_contact');
		$topic = $this->input->post('plan');
		$message = $this->input->post('message_contact');

		$subject = '374MMA New Contact Request';
		$message = 'Name: '.$name."\n\nEmail: ".$email."\n\nTelephone Number: ".$telephone."\n\nTopic of Contact: ".$topic."\n\Message: ".$message."\n\n";

		$config['smtp_host'] = $_ENV['SMTP_HOST'];
        $config['smtp_port'] = $_ENV['SMTP_PORT'];
        $config['smtp_user'] = $_ENV['SMTP_USER'];
        $config['smtp_pass'] = $_ENV['SMTP_PASSWORD'];
        $config['protocol'] = $_ENV['SMTP_PROTOCOL'];
        $config['smtp_crypto'] = $_ENV['SMTP_CRYPTO'];
        $config['mailtype'] = $_ENV['SMTP_TYPE'];
        $config['wordWrap'] = true;

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($_ENV['SMTP_USER'], $_ENV['SITE_TITLE']);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->to($_ENV['SMTP_USER']);

        if($this->email->send())
        	die(json_encode(array(
        		'success' => true,
        		'message' => 'contact request received'
        	)));
        else
        	die(json_encode(array(
        		'success' => false,
        		'message' => $this->email->printDebugger(['headers'])
        	)));
	}

	function enroll_user(){
		header('Content-type: application/json');

		$name = $this->input->post('firstname_booking').' '.$this->input->post('lastname_booking');
		$email = $this->input->post('email_booking');
		$telephone = $this->input->post('telephone_booking');
		$adult_classes = implode(',', $this->input->post('adult_classes'));
		$youth_classes = implode(',', $this->input->post('youth_classes'));
		$kids_classes = implode(',', $this->input->post('kids_classes'));
		$newsletter = $this->input->post('newsletter');

		$subject = '374MMA New Enrollment';
		$message = 'Name: '.$name."\n\nEmail: ".$email."\n\nTelephone Number: ".$telephone."\n\nAdult Classes: ".$adult_classes."\n\nYouth Classes: ".$youth_classes."\n\nKids Classes: ".$kids_classes."\n\nReceive Newsletter Updates: ".$newsletter."\n\n";

		if($newsletter == 'Yes')
			$this->data_model->insert_table_data('tbl_subscriptions', array('email' => $email));

		$config['smtp_host'] = $_ENV['SMTP_HOST'];
        $config['smtp_port'] = $_ENV['SMTP_PORT'];
        $config['smtp_user'] = $_ENV['SMTP_USER'];
        $config['smtp_pass'] = $_ENV['SMTP_PASSWORD'];
        $config['protocol'] = $_ENV['SMTP_PROTOCOL'];
        $config['smtp_crypto'] = $_ENV['SMTP_CRYPTO'];
        $config['mailtype'] = $_ENV['SMTP_TYPE'];
        $config['wordWrap'] = true;

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($_ENV['SMTP_USER'], $_ENV['SITE_TITLE']);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->to($_ENV['SMTP_USER']);

        if($this->email->send())
        	die(json_encode(array(
        		'success' => true,
        		'message' => 'enrollment received'
        	)));
        else
        	die(json_encode(array(
        		'success' => false,
        		'message' => $this->email->printDebugger(['headers'])
        	)));
	}
}
