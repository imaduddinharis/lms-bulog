<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author NVM Team Creative
 */
class Admin extends CI_Controller {

    var $assets;
    var $API="";
    
	public function __construct()

	{
		parent::__construct();
        
        //{{host}}
        $this->API="https://api-bulog.sobatteknologi.xyz/";
        
        /*- load library -*/
//		$this->load->library('template');
        $this->load->library('session');
        $this->load->library('curl');
        
        /*- load helper -*/
		$this->load->helper('form');
        $this->load->helper('url');
        
        /*- load template assets -*/
		$this->assets     = base_url().'assets/';        
	}
	public function index()
	{
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Dashboard';
        
        /*- define data throw -*/
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('template/container',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
}
