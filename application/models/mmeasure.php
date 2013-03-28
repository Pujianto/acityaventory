<?php
class MMeasure extends CI_Model
{
    function __construct ()
    {
        parent::__construct();
        
    }
    
    function form(){

    $data['measure_name'] = array('name'=>'measure_name','size'=>'30', 'maxlength'=>'30', 'id'=>'measure_name');
	$data['desc']       = array('name'=>'desc','cols'=>'25', 'rows'=>'5','id'=>'desc','value'=>'');
	return $data;
  }
  
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('measures');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
    
        return $query->result();
    }
    
    function save(){
        $name = $this->input->post('measure_name');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
        $this->db->insert('measures',$data);
    }
  
    function update(){
        $id   = $this->input->post('id');
        $name = $this->input->post('measure_name');
        $desc = $this->input->post('desc');
        $data = array(
          'name'=>$name,
          'desc'=>$desc
        );
    $this->db->where('id',$id);
    $this->db->update('measures',$data);    
    }
    
    function getList(){
        $result = array();
        $this->db->select('*');
        $this->db->from('measures');
        $this->db->order_by('name','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Select Measures-';
            $result[$row->id]= $row->name;
        }
        
        return $result;
    }
}
