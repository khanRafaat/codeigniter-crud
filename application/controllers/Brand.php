<?php

class Brand extends CI_Controller
{

    function index()
    {
        $this->load->model('Brand_model');
        $brands = $this->Brand_model->getData();
        $data['brands'] = $brands;
        $this->load->view('brand/index', $data);
    }
    function create()
    {
        $this->load->model('Brand_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'is_unique[brand.name]');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            $this->session->set_flashdata('error', 'Wrong input');
            redirect(base_url() . 'index.php/brand/index');
        } else {
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['entry_date'] = date('Y-m-d h:i:s');
            $this->Brand_model->create($formArray);
            $this->session->set_flashdata('success', 'Brand has been added successfully');
            redirect(base_url() . 'index.php/brand/index');
        }
    }


    function edit($id)
    {
        $this->load->model('Brand_model');
        $brand = $this->Brand_model->getBrand($id);
        $data = array();
        $data['brand'] = $brand;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Brand Name Required');
            $this->load->view('brand/edit', $data);
        } else {

            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $this->Brand_model->brandUpdate($id, $formArray);
            $this->session->set_flashdata('success', 'Brand has been Updated successfully');
            redirect(base_url() . 'index.php/brand/index');
        }
    }

    function delete($id)
    {
        $this->load->model('Brand_model');
        $brand = $this->Brand_model->deleteBrand($id);

         $this->session->set_flashdata('success', 'Brand has been Deleted successfully');
         redirect(base_url() . 'index.php/brand/index');
    }
}
