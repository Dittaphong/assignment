<?php 
class mdl_authen extends CI_Model
   {
	public function __construct()
      {
		parent::__construct();
		//$this->load->database("thainology");
      }

      public function checkdatalogin($username, $userpassword)
      { 
         $sql=" 
		SELECT memp_id
		   FROM memp 
			WHERE email='" .trim($username). "' AND userpassword= '" .$userpassword."' AND status > 0 ";
  
          $result=$this->db->query($sql);
         if($result->num_rows() > 0)
         {
            return true;
         }
         else
         {
            return false;
         }
      }

 public function getdatauser($username){
	  $sql = "
	  SELECT
			a.memp_id ,
			a.code_memp,
			CONCAT(a.firstname_th,' ',a.lastname_th) AS name_memp,
			b.name_th AS mpos_name,
			c.name_th AS memp_cat_name,
			a.id_mpos,
			a.id_memp_cat,
			a.birthdate,
			a.email,
			a.userpassword,
			a.status,
			a.img_name,
			a.mobile
		FROM
		memp a
		LEFT JOIN mpos b ON a.id_mpos=b.id_mpos
		LEFT JOIN memp_cat c ON a.id_memp_cat=c.id_memp_cat
	    WHERE a.email='$username' " ;
   // echo "<pre>".$sql; 
         $query = $this->db->query($sql);
 		 return $query->row(); 
	  }

   }
?>