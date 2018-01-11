<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model
{                    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getSettingInfo()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $query = $this->db->get();
       
        return $query->result();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editSetting($settingInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_setting', $settingInfo);
        
        return TRUE;
    }

}

  