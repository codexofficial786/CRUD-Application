<?php

class User extends CI_Controller
{

    function index()
    {
        $this->load->model('user_model');
        $users = $this->user_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list', $data);
    }
    function create()
    {
        $this->load->model('user_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('create');
        } else {
            // save record to database
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->user_model->create($formArray);
            $this->session->set_flashdata('success', 'Data inserted successfully!');
            redirect(base_url('index.php/user/index'));
        }
    }

    function edit($userId)
    {
        $this->load->model('user_model');
        $user = $this->user_model->getUser($userId);
        $data = array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('edit', $data);
        } else {
            // Update record in database
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->user_model->updateUser($userId, $formArray);
            $this->session->set_flashdata('success', 'Record updated successfully!');
            redirect(base_url('index.php/user/index'));
        }
    }

    function delete($userID)
    {
        $this->load->model('user_model');
        $user = $this->user_model->getUser($userID);
        if (empty($userID)) {
            $this->session->set_flashdata('falure', 'Record not found in database');
            redirect(base_url('index.php/user/index'));
        }
        $this->user_model->deleteUser($userID);
        $this->session->set_flashdata('success', 'Record deleted successfully!');
        redirect(base_url('index.php/user/index'));

    }

}
?>