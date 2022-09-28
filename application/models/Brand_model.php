<?php
class Brand_model extends CI_Model{

    function create($formArray )
    {
        $this->db->insert('brand',$formArray);
    }

    function getData(){

        $this->db->order_by("entry_date", "DESC");
        return $brands = $this->db->get('brand')->result_array();
    }

    function getBrand($id){

        $this->db->where('id',$id);

       return $brand = $this->db->get('brand')->row_array();
    }

    function brandUpdate($id,$formArray){
        $this->db->where('id',$id);

        $this->db->update('brand',$formArray);

    }

    function deleteBrand($id){
        $this->db->where('id', $id);
        $this->db->delete('brand');
    }

}
