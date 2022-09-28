<?php
class Models_model extends CI_Model
{
    function create($formArray )
    {
        $this->db->insert('models',$formArray);
    }

 
    function getbrandList(){

        $this->db->order_by("entry_date", "DESC");
        return $brands = $this->db->get('brand')->result_array();
    }
    
    function getmodels($id){

        $this->db->where('id',$id);

       return $brand = $this->db->get('models')->row_array();
    }
    
    function getData(){
        $this->db->select('models.id, models.mname,brand.name,models.entry_date');
        $this->db->from('models');
        $this->db->join('brand', 'brand.id = models.brand_id');
        return $models = $this->db->get()->result_array();
    }

    function modelUpdate($id,$formArray){
        $this->db->where('id',$id);

        $this->db->update('models',$formArray);

    }
    
    function deleteModel($id){
        $this->db->where('id', $id);
        $this->db->delete('models');
    }

}