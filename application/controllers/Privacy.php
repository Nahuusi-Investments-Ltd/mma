<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends MY_Controller {
    private $tbl_privacy_policy = 'tbl_privacy_policy';

    function index(){
        $data['title'] = 'Privacy Policy';
        $data['minimized'] = false;

        $this->load->view('backend/content/privacy', $data);
    }

    function detail(){
        $privacy = $this->data_model->get_table_data_where($this->tbl_privacy_policy, array('id' => $this->input->get('id')))->row();
        if(!$privacy)
            redirect('privacy', 'refresh');

        $data['title'] = 'Privacy Policy';
        $data['minimized'] = false;
        $data['privacy'] = $privacy;

        $this->load->view('backend/content/privacy_detail', $data);
    }

    function list(){
        header('Content-type: application/json');
        $privacies = $this->data_model->get_table_data($this->tbl_privacy_policy);

        $response = array(
            'success' => true,
            'privacies' => array(
            )
        );

        foreach ($privacies->result() as $data) {
            $privacy_exceprt = $data->policy;
            if(strlen($data->policy) > 250)
                $privacy_exceprt = substr($data->policy, 0, 250).'[...]';

            array_push($response['privacies'], array(
                'id' => $data->id,
                'policy' => $privacy_exceprt,
            ));
        }
        
        die(json_encode($response));
    }

    function save(){
        header('Content-type: application/json');

        $data = array(
            'policy' => $this->input->post('policy')
        );

        $condition = array(
            'id' => $this->input->post('id')
        );

        if($this->data_model->save_table_data($this->tbl_privacy_policy, $data, $condition)){
            http_response_code(204);

            die(json_encode(array(
                'sucess' => true,
                'message' => 'policy updated successfully.'
            )));
        }
        else{
            http_response_code(400);

            die(json_encode(array(
                'sucess' => false,
                'message' => 'something went wrong while saving policy. try again later.'
            )));
        }
    }
}
