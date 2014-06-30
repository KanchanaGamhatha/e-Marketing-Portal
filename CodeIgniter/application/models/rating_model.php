<?php
/* 
 * Rating_model class which extends from CI_Model
 */
class rating_model extends CI_Model {
    
     /*
     * Getting the current rating value of the seller from the seller id
     */
    function getCurrentRating($user_id)
    {
        $this->db->select()->from('ratings')->where('seller_Id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Getting the user id of the seller from the Advertisement ID
     */
    function getUserID($adID)
    {
        $this->db->select('user_id as user_id')->from('Advertisement')->where('advertisement_id', $adID);
        $query = $this->db->get();
        return $query->row();
    }
    
    /*
     * Getting the user id of the user, who rated the seller, from the email 
     */

    function get_user_id($email)
    {
        $this->db->select('user_id as user_id')->from('registered_user')->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    
    /*
     * Function to save rating details into the database
     */
    function insert_rating($seller_id, $logged_in_user_id, $rating)
    {
        $seller_user = $this->check_seller_id_user_id($seller_id, $logged_in_user_id);
        if(!$seller_user)
        {
            $new_record = array(
                   'seller_Id' => $seller_id,
                   'user_id' => $logged_in_user_id
                   );
                $insert = $this->db->insert('rate', $new_record);
            
            $exist_seller_id = $this->check_seller_id($seller_id);
            
            if($exist_seller_id)
            {
                $exist_rate = $this->getCurrentRating($seller_id);

                $x=($rating/10)+ $exist_rate;
                $new_rate = array(
                    'current_rate' => $x
                   );
                $this->db->where('seller_Id',$seller_id);
                $this->db->update('ratings',$new_rate);
            }
            else 
            {
                    $x=($rating/10);
                   $new_rate = array(
                   'seller_Id' => $seller_id,
                   'current_rate' => $x
                   );
                   //insert comment to the comment table
                   $insert = $this->db->insert('ratings', $new_rate);
                   return $insert;
            }
        }
        
    }
    /*
     * Getting the type of the seller from the seller id
     */
    function get_seller_type($seller_id)
    {
        $this->db->select('type as type')->from('registered_user')->where('user_id', $seller_id);
        $query = $this->db->get();
        return $query->row();
    }
    /*
     * Getting the seller id of the seller from ratings table to check wheather the seller is exsists or not 
     */

    function check_seller_id($seller_id)
    {
        $this->db->select('seller_Id as seller_Id')->from('ratings')->where('seller_Id', $seller_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    /*
     * Getting the seller id of the seller from rate table to check wheather the seller and the user are exsist or not 
     */
    function check_seller_id_user_id($seller_id,$logged_in_user_id)
    {
        $this->db->select('seller_Id')->from('rate')->where('seller_Id', $seller_id )->where('user_Id',$logged_in_user_id);
        $query = $this->db->get();
        return $query->row();
    }
}

