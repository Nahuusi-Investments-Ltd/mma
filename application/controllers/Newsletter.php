<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller {
    private $tbl_subscriptions = 'tbl_subscriptions';

    function index(){
        $data['title'] = 'Newsletter Subscriptions';
        $data['minimized'] = false;

        $this->load->view('backend/content/newsletter', $data);
    }

    function list(){
        header('Content-type: application/json');
        $subscriptions = $this->data_model->get_table_data($this->tbl_subscriptions);

        $response = array(
            'success' => true,
            'subscriptions' => array(
            )
        );

        foreach ($subscriptions->result() as $data) {
            array_push($response['subscriptions'], array(
                'id' => $data->id,
                'date' => date('d/m/Y', strtotime($data->date_created)),
                'email' => $data->email
            ));
        }
        
        die(json_encode($response));
    }
}
