<?php

/*
  This File is written at eWITSCO LLC.
 *   Author: Faraz Shaikh

 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class qurbani extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_qurbanis($fields)
    {
        
        if(isset($fields['cols']))
        {
            $this->db->select($fields['cols']);
            
        }
        if(isset($fields['where_and']))
        {
            $this->db->where($fields['where_and']);   
        }
       elseif(isset($fields['where_or']))//else if to make sure both where_and & where_or are not initialized at the same time
        {
            $this->db->or_where($fields['where_or']);   
        }
        if(isset($fields['order_by']))
        {
            $this->db->order_by(key($fields['order_by']),$fields['order_by'][key($fields['order_by'])]); 
            
        }
        
         if(isset($fields['lim']))
        {
            $this->db->limit($fields['lim']['max'],$fields['lim']['min']);
        }
        
        $query = $this->db->get("qurbani13");
        return $query->result();
        
        
    }
    
    
    function insert_supplier($data)
    {      
     $this->db->insert("supplier", $data);   
          
    }
    
    function update_supplier($SupplierKey,$data)
    {
        $this->db->where("SupplierKey", $SupplierKey);
        $this->db->update("supplier", $data); 
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
        
        
    }   
    
        function del_supplier($AttributeKey)
    {
        //$this->db->where("AttributeKey", $AttributeKey);
      //  $this->update_attribute($AttributeKey,array('Deleted' => '1', 'DeletedDate' => date(DATEFORMAT)));
       
        
    }  
    
    function insert_qurbanis_batch($datas)
    {
        $this->db->insert_batch('qurbani13', $datas);
    }
     function get_count()
    {
        
        return  $this->db->count_all('supplier');
    }


}
?>