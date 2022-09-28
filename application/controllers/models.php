<?php

class Models extends CI_Controller
{

    function index()
    {

        $this->load->model('Models_model');
        $models = $this->Models_model->getData();
        $brands = $this->Models_model->getbrandList();
        $data['models'] = $models;
        $data['brands'] = $brands;
        $this->load->view('model/index', $data);
    }
    function create()
    {
        $this->load->model('Models_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('brand', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Model Name Required');
            redirect(base_url() . 'index.php/models/index');
        } else {
            $formArray = array();
            $formArray['mname'] = $this->input->post('name');
            $formArray['brand_id'] = $this->input->post('brand');
            $formArray['entry_date'] = date('Y-m-d h:i:s');
            $this->Models_model->create($formArray);
            $this->session->set_flashdata('success', 'Model has been added successfully');
            redirect(base_url() . 'index.php/models/index');
        }
    }
    function edit($id)
    {


        $this->load->model('Models_model');
        $models = $this->Models_model->getmodels($id);
        $brands = $this->Models_model->getbrandList();
        $data = array();
        $data['model'] = $models;
        $data['brands'] = $brands;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Models Name Required');
            $this->load->view('model/edit', $data);
        } else {

            $formArray = array();
            $formArray['mname'] = $this->input->post('name');
            $formArray['brand_id'] = $this->input->post('brand');
            $this->Models_model->modelUpdate($id, $formArray);
            $this->session->set_flashdata('success', 'Model has been Updated successfully');
            redirect(base_url() . 'index.php/models/index');
        }
    }

    function delete($id)
    {
        $this->load->model('Models_model');
        $brand = $this->Models_model->deleteModel($id);

        $this->session->set_flashdata('success', 'Model has been Deleted successfully');
        redirect(base_url() . 'index.php/models/index');
    }
}
