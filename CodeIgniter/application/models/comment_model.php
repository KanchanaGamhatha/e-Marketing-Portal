<?php

class comment_model extends CI_Model {

    function getAdvertisementID($adID) {
        $this->db->select('advertisement_id as advertisement_id')->from('Advertisement')->where('advertisement_id', $adID);
        $query = $this->db->get();
        return $query->row();
    }

    function getUsername($email) {
        $this->db->select('name as name')->from('registered_user')->where('email', $email);
        //$query = $this->db->query("SELECT name as name FROM registered_user WHERE email='.$email.' ");
        $query = $this->db->get();
        return $query->row();
    }

    function getComment($adID) {
        $this->db->select()->from('comment')->order_by('comment_Id', 'desc')->where('advertisement_id', $adID);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getUserID($email) {
        $this->db->select('user_id as user_id')->from('registered_user')->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    public function insertComment($userID, $name) {
        //get data from form fields
        $new_comment = array(
            'user_id' => $userID,
            'name' => $name,
            'comment' => $this->input->post('comment'),
            'advertisement_id' => $this->input->post('advertisement_id'),
            'date' => date('Y-m-d H:i:s')
        );
        //insert comment to the comment table
        $insert = $this->db->insert('comment', $new_comment);
        return $insert;
    }

    public function deleteComment($commentID,$AdId,$userId){
         $this->db->where('comment_Id',$commentID);
        $this->db->where('advertisement_id',$AdId);
        $this->db->where('user_id',$userId);
        $this->db->delete('comment');
       
    }
    
}
