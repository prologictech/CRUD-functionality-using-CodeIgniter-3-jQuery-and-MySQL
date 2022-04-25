<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        //Calling CodeIgniter default constructor 
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('registration_model');
    }
    // index function to view page
    public function index()
    {
        $this->load->view('registartion_form');
    }

    /*function for show records on web browser*/
    function view()
    {
        $this->load->view('show');
    }
    // insert form data with proper validation
    public function insert_form()
    {
        $data = array();
        $this->form_validation->set_rules('firstname', 'firstname', 'required');
        $this->form_validation->set_rules('lastname', 'lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required');
        $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        // check for validation is true or false
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registartion_form');
        } else {
            $data['first_name'] = $this->input->post('firstname', true);
            $data['last_name'] = $this->input->post('lastname', true);
            $data['email'] = $this->input->post('email', true);
            $data['gender'] = $this->input->post('gender', true);
            $data['phone_no'] = $this->input->post('phonenumber', true);
            $data['user_dob'] = $this->input->post('dateofbirth', true);
            $data['city'] = $this->input->post('city', true);
            $data['country'] = $this->input->post('country', true);
            $query = $this->registration_model->insert($data);  // load model function
            // if data  is inserted then show message 
            if ($query) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Registration successfully.</div>');
                $this->load->view('registartion_form');
            }
            //if data in not inserted then show message
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Registration not successfully </div>');
                $this->load->view('registartion_form');
            }
        }
    }

    //function for show the details for update in a form  view
    public function update_view($id = null)
    {
        $data['id'] = $this->uri->segment(3);
        $users = $this->registration_model->update_view($id);
        $data['users'] = $users;
        $this->load->view('update', $data);
    }


    /*update function to update the details of the user*/
    function update_data($id = null)
    {
        $id = $this->input->post('id', TRUE);
        $this->form_validation->set_rules('fname', 'firstname', 'required');
        $this->form_validation->set_rules('lname', 'lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('phone_no', 'phonenumber', 'required');
        $this->form_validation->set_rules('dob', 'dateofbirth', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        //if data is not validate
        if ($this->form_validation->run() == FALSE) {
            $users = $this->registration_model->update_view($id);
            $data['users'] = $users;
            $data['id'] = $id;
            $this->load->view('update', $data);
        }
        //if data is validate
        else {
            $id = $this->input->post('id', TRUE);
            $data = array(
                'first_name' => $this->input->post('fname', TRUE),
                'last_name' => $this->input->post('lname', TRUE),
                'phone_no' => $this->input->post('phone_no', TRUE),
                'email' => $this->input->post('email', TRUE),
                'user_dob' => $this->input->post('dob', TRUE),
                'gender' => $this->input->post('gender', TRUE),
                'city' => $this->input->post('city', TRUE),
                'country' => $this->input->post('country', TRUE),
            );
            //send data to the model to the update
            $result = $this->registration_model->update_id($id, $data);
            //if data updated successfully
            if ($result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Data updated successfully.</div>');
                redirect('Registration/view');
            }
            //if data not updated successfully
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Data not updated successfully.</div>');
                redirect('Registration/view');
            }
        }
    }

    /* Delete function for delete records through browser with the help of button */
    function delete_data()
    {

        $id = $this->uri->segment(3);
        $delete_query = $this->registration_model->delete_record($id);
        //if data delete successfully then print success message
        if ($delete_query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Data deleted successfully.</div>');
            redirect('Registration/view');
        }
        //if data not delete successfully then print error message
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"> Data not delete successfully.</div>');
            redirect('Registration/view');
        }
    }

    //function to show the details of the user with the help of database
    function details_list()
    {
        $postData = $this->input->post();
        $data = $this->registration_model->get_records($postData);
        echo json_encode($data);
    }
}
