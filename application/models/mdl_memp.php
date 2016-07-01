<?php  
class mdl_memp extends CI_Model
   {
	public function __construct()
      {
		parent::__construct();
		//$this->load->database("thainology");
      }

      public function doCheckValidUserLogin($username, $userpassword)
      { 
         $sql=" 
		SELECT memp_id
		   FROM memp 
			WHERE email='" . $this->db->escape_str(trim($username)) . "' AND userpassword= '" . MD5($userpassword)."' AND status > 0 ";
         $result=$this->db->query($sql);
         if($result->num_rows() == 1)
         {
            return true;
         }
         else
         {
            return false;
         }
      }

      public function showname(){
        $sql = "
   SELECT memp_id, firstname_th, lastname_th, email
       FROM memp 
      WHERE firstname_th "  ;
  // echo $sql;
     $query = $this->db->query($sql);
     return $query->row(); 

      }



      public function getMempID($username)
      {
         $memp_id = 0;
         $sql = "
            SELECT memp_id
               FROM memp
               WHERE email = '" . $username . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $memp_id = $row->memp_id;
         }
         else
         {
            $memp_id = 0;
         }
         return $memp_id;
      }
       public function getMempCode($id)
      {
         $memp_id = 0;
         $sql = "
            SELECT code_memp
               FROM memp
               WHERE memp_id = '" . $id . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $code_memp = $row->code_memp;
         }
         else
         {
            $code_memp = 0;
         }
         return $code_memp;
      }

 public function getDataUser($memp_id){
	  $sql = "
	  SELECT
			a.memp_id,
			a.code_memp,
			CONCAT(a.firstname_th,' ',a.lastname_th) AS name_th,
			CONCAT(a.firstname_en,' ',a.lastname_en) AS name_en,
			b.name_th AS mpos_name,
			c.name_th AS memp_cat_name,
			a.id_mpos,
			a.id_memp_cat,
			a.birthdate,
			a.email,
			a.userpassword,
			a.status,
			a.img_name,
			a.mobile,
			a.firstname_th,
			a.lastname_th,
			a.firstname_en,
			a.lastname_en
		FROM
		memp a
		LEFT JOIN mpos b ON a.id_mpos=b.id_mpos
		LEFT JOIN memp_cat c ON a.id_memp_cat=c.id_memp_cat
	    WHERE a.memp_id='$memp_id' " ;
//   echo $sql;
     $query = $this->db->query($sql);
 		 return $query->row(); 
	  }

   }
