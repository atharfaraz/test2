<?php
/*
  This File is written at eWITSCO LLC.
 *   Author: Faraz Shaikh
 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class voluntere extends CI_Controller
{
    public $errormsg;
    public $splparam;
    public $field;
    public $pageTitle;
    public $data;
    function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		
                $this->load->model("qurbani");
              $this->data=array();
                 $this->errormsg="";
                $this->splparam="";
                $this->field=array();
                $this->pageTitle="Qurbani 2013";
	}
    public function index()
    {
    $place = $this->input->post('place'); 
    $this->pageTitle=$place ." List";
    $qstr=array('QurbaniLocation'=>$place);
    $this->field['cols']= "" ;
    $this->data['title']=$this->pageTitle;
    $this->field['where_and']=$qstr;
    $result=$this->qurbani->get_qurbanis($this->field);
    $this->data['result']=$result;
    $this->load->view('voluntere_view',$this->data);
    }


    function search_shares()
    {
           $phone = $this->input->post('phone'); 
          
            $qstr=array('Phone'=>$phone);
             
            
            if(sizeof($result)<1)
            { 
                $this->data['errormsg']="Your name / number is not registered yet!";
            }
             
            $this->splparam='*';
            $this->index();
                 
    }
}
?>