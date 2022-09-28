<?php
class Item_model extends CI_Model
{
    function create($formArray )
    {
        $this->db->insert('items',$formArray);
    }

    function getbrandList(){

        $this->db->order_by("entry_date", "DESC");
        return $brands = $this->db->get('brand')->result_array();
    }
    function getModelList(){
        $this->db->order_by("entry_date", "DESC");
        return $brands = $this->db->get('models')->result_array();
    }

    function getitem($id){

        $this->db->where('id',$id);

       return $item = $this->db->get('items')->row_array();
    }

    function getData(){
        $this->db->select('items.id, items.iname, models.mname, brand.name, items.entry_date');
        $this->db->from('items');
        $this->db->join('brand', 'brand.id = items.brand_id');
        $this->db->join('models', 'models.id = items.model_id');
        return $models = $this->db->get()->result_array();
    }

    function itemUpdate($id,$formArray){
        $this->db->where('id',$id);

        $this->db->update('items',$formArray);

    }

    function deleteItem($id){
        $this->db->where('id', $id);
        $this->db->delete('items');
    }

}