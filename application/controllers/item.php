<?php

class Item extends CI_Controller
{
    function index()
    {

        $this->load->model('Item_model');
        $items = $this->Item_model->getData();
        $brands = $this->Item_model->getbrandList();
        $models = $this->Item_model->getModelList();
        $data['brands'] = $brands;
        $data['models'] = $models;
        $data['items'] = $items;
        $this->load->view('item/index', $data);
    }

    function create()
    {
        $this->load->model('Item_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('brand', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Item Name Required');
            redirect(base_url() . 'index.php/item/index');
        } else {
            $formArray = array();
            $formArray['iname'] = $this->input->post('name');
            $formArray['brand_id'] = $this->input->post('brand');
            $formArray['model_id'] = $this->input->post('model');
            $formArray['entry_date'] = date('Y-m-d h:i:s');
            $this->Item_model->create($formArray);
            $this->session->set_flashdata('success', 'Item has been added successfully');
            redirect(base_url() . 'index.php/item/index');
        }
    }

    function edit($id)
    {

        $this->load->model('Item_model');
        $brands = $this->Item_model->getbrandList();
        $models = $this->Item_model->getModelList();
        $item = $this->Item_model->getitem($id);
        $data = array();
        $data['models'] = $models;
        $data['brands'] = $brands;
        $data['items'] = $item;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Item Name Required');
            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";

            $this->load->view('item/edit', $data);
        } else {

            $formArray = array();
            $formArray['iname'] = $this->input->post('name');
            $formArray['brand_id'] = $this->input->post('brand');
            $formArray['model_id'] = $this->input->post('model');
            $this->Item_model->itemUpdate($id, $formArray);
            $this->session->set_flashdata('success', 'Item has been Updated successfully');
            redirect(base_url() . 'index.php/item/index');
        }
    }


    function delete($id)
    {
        $this->load->model('Item_model');
        $brand = $this->Item_model->deleteItem($id);

        $this->session->set_flashdata('success', 'Item has been Deleted successfully');
        redirect(base_url() . 'index.php/item/index');
    }
}
