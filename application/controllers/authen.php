<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class authen extends CI_Controller {


	   public function __construct()
   {
      parent::__construct();   
      $this->load->model('mdl_authen');
	  $this->load->library('Template_authen');
	  $this->load->library('session');
      date_default_timezone_set('Asia/Bangkok');
     
}


	public function index()
	{
		 if($this->session->userdata('id_memp')==""){
		$this->load->library('template_authen');
		$this->data['tempheader']=$this->template_authen->getHeader();
		$this->data['tempfooter']=$this->template_authen->getFooter();
		$this->load->view('login',$this->data);
		 }else{
		 	redirect('ctl_home/');
		 }
		

	}
	public function checkLogin()
	{

		$rs=$this->mdl_authen->checkdatalogin($_POST['username'], md5($_POST['passwd']));
		
		if ($rs==true) {
			// echo"true";
			$result = $this->mdl_authen->getdatauser($_POST['username']);
			
			 $this->loginSession = array(
				"id_memp"    => $result->memp_id,
				"memp_code"  => $result->code_memp,
				"email"   	 => $result->email,
				"memp_name"  => $result->name_memp,
				"id_mpos"  	 => $result->id_mpos,
				"mpos_name"  => $result->mpos_name,

			); 
			$this->session->set_userdata($this->loginSession);  
		// print_r($this->loginSession);
				echo "<meta charset='UTF-8'>
          <SCRIPT LANGUAGE='JavaScript'>
            window.location.href='".site_url("ctl_home")."';
          </SCRIPT>";
		}else {
		echo "<meta charset='UTF-8'>
          <SCRIPT LANGUAGE='JavaScript'>
            window.alert('ฮ่ามึงเอ้ย')
            window.location.href='".site_url("authen")."';
          </SCRIPT>";
		}
	}

	public function logout()
	{
		if ( $this->session->userdata("id_memp") != null )
	    {
			$this->session->unset_userdata("id_memp");
			$this->session->unset_userdata("memp_code");
			$this->session->unset_userdata("email");
			$this->session->unset_userdata("memp_name");
			$this->session->unset_userdata("id_mpos");
			$this->session->unset_userdata("mpst_name");
			$this->session->unset_userdata("mpos_name");
			
			echo "<meta charset='UTF-8'>
          <SCRIPT LANGUAGE='JavaScript'>
            window.alert('สิไปไส')
            window.location.href='".site_url("authen")."';
          </SCRIPT>";
	    }else {
	    	redirect('authen/');
	    }
	}
} ?>

