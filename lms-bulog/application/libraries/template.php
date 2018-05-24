<?php
class Template{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}
	function display($template, $data=null)
	{
		$data['_head']=$this->_ci->load->view('main/head',$data, true);
		$data['_section1']=$this->_ci->load->view('main/section1',$data, true);
		$data['_section2']=$this->_ci->load->view('main/section2',$data, true);
		$data['_section3']=$this->_ci->load->view('main/section3',$data, true);
		$data['_section4']=$this->_ci->load->view('main/section4',$data, true);
		$data['_section5']=$this->_ci->load->view('main/section5',$data, true);
		$data['_foot']=$this->_ci->load->view('main/foot',$data, true);
		$this->_ci->load->view('main/index.php',$data);
	}
}