<?php 
class user_model extends CI_Model {

    function create($formArray){
        $this->db->insert('users',$formArray); // INSERT in user table.
    }

    function all(){
        return $users = $this->db->get('users')->result_array(); // SELECT * FROM users
    }

    function getUser($userId){
        $this->db->where('user_id',$userId);
        return $user = $this->db->get('users')->row_array(); // SELECT * FROM users WHERE user_id=?
    }

    function updateUser($userID, $formArray){
        $this->db->where('user_id',$userID);
        $this->db->update('users',$formArray);  // UPDATE users SET name= ?, email=? WHERE user_id=?
    }

    function deleteUser($userID){
        $this->db->where('user_id',$userID);
        $this->db->delete('users'); // DELETE FROM users WHERE user_id=?
    }
}

?>