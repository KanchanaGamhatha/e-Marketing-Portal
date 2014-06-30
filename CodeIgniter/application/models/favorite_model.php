<?php

/*
 * Email_model class which extends from CI_Model
 * 
 */

class Favorite_model extends CI_Model
{
    /*
     * Function to delete favorite advertisements into the database
     */

    function add_to_favorite($adId, $userId)
    {
        if ($this->checkFavorite($adId, $userId))
        {
            redirect('favorite_controller/alreadyExist');
        } else 
        {
            $new_favorite = array(
                'user_id' => $userId,
                'advertisement_id' => $adId,
                'added_date' => date('Y-m-d H:i:s')
            );

            //insert comment to the comment table
            $insert = $this->db->insert('favorite', $new_favorite);
            return $insert;
        }
    }

    /*
     * Function to check whether advertisement is already exists in the favorite table
     */

    function checkFavorite($adId, $userId) 
    {
        $this->db->select();
        $this->db->from('favorite');
        $this->db->where('user_id', $userId);
        $this->db->where('advertisement_id', $adId);
        $query = $this->db->get();
        return $query->row();
    }

    /*
     * Getting the advertisement ID from the $userID
     */

    function getMyFavoriteAds($userID) 
    {
        $this->db->select('advertisement_id as advertisement_id')->from('favorite')->where('user_id', $userID);
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }

    /*
     * Getting the advertisement details from the $myFavoriteAdId
     */

    function getMyFavoriteAdDetails($myFavoriteAdId) 
    {

        $this->db->select('*')->from('advertisement')->where('advertisement_id', $myFavoriteAdId);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $data[] = $row;
                }
            return $data;
        }
    }

    /*
     * Function to delete favorite advertisements into the database
     */

    function deleteMyFavorites($myFavoriteAdId, $userId) 
    {
        $this->db->where('advertisement_id', $myFavoriteAdId);
        $this->db->where('user_id', $userId);
        $this->db->delete('favorite');
    }

}
