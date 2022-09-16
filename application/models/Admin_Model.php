<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

    function getEditRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

  
}
