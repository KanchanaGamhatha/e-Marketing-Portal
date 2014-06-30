<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Search_controller extends CI_Controller {
    
    
    
    public function search()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
             $this->load->view('includes/header');
        } 
        else 
        {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
        }
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        $ad_filter = $this->input->post('ad_filter');
        
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =$search_category;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        $data['ad_filter'] =$ad_filter;
        $vehicle_ad = FALSE;
        
        $this->load->view('includes/search',$data);
        
        $this->load->model('Search_model');

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);          
        
        if($search_type == 0)
        {
            if (($search_category != -1) && ($search_location == 0))
            {
                $data['myAds']  = $this->Search_model->searchCategory($search_keyword,$search_category,$ad_filter);
                
                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds'],
                    'search_category' => $data['search_category']
                ));
            }
            else if (($search_category == -1) && ($search_location != 0))
            {
                $data['myAds']  = $this->Search_model->searchLocation($search_keyword,$search_location,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds'],
                    'search_category' => $data['search_category']
                ));
            }

            else if(($search_category == -1) && ($search_location == 0))
            {
                $data['myAds']  = $this->Search_model->search($search_keyword,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds'],
                    'search_category' => $data['search_category']
                ));
            }

            else
            {
                $data['myAds']  = $this->Search_model->searchCategoryLocation($search_keyword,$search_category,$search_location,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds'],
                    'search_category' => $data['search_category']
                ));
            }
        }
        else if ($search_type == 1 )
        {
            $this->filter_ads(1,$ad_filter);
        }
        else if ($search_type == 2 )
        {
            $this->filter_ads(2,$ad_filter);
        }
        if($search_category == 1)
        {
            $vehicle_ad = TRUE;
        }
        $data['vehicle_ad'] = $vehicle_ad;   
        $this->load->view('filter_view',$data);
        $this->load->view('includes/footer');
    }
    
   /*public function search_ajax()
    {
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        $ad_filter = $this->input->post('ad_filter');
        
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =$search_category;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        $data['ad_filter'] =$ad_filter;
        $vehicle_ad = FALSE;
        
        $this->load->model('Search_model');

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);          
        
        if(($search_category == -1) && ($search_location == 0) )
        {
            $data['myAds']  = $this->Search_model->search($search_keyword,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
        }
        else if(($search_category == 0) && ($search_location == 0) )
        {
            $data['myAds']  = $this->Search_model->search($search_keyword,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
        }
       
        else if($search_category != -1)
        {
            if  ($search_location == 0)
            {
                $data['myAds']  = $this->Search_model->searchCategory($search_keyword,$search_category,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
            }
            else if ($search_location != 0)
            {
                $data['myAds']  = $this->Search_model->searchLocation($search_keyword,$search_location,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
            }

        }
        
        if($search_category == 1)
        {
            $vehicle_ad = TRUE;
        }
        $data['vehicle_ad'] = $vehicle_ad;   
        $this->load->view('filter_view',$data);
    }*/
    
    public function search_ajax_category()
    {
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations(); 
       
        $this->load->model('Search_model');
        
        $search_category = $this->input->post('catogory_id');
        $search_keyword = $this->input->post('search');
        $ad_filter = $this->input->post('ad_filter');
        
        $vehicle_ad = FALSE;
        
        $this->load->model('Search_model');

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
        $data['search_category'] = $search_category;
        
        $this->load->view('category_view', $data);          
        
        if($search_category == -1)
        {
            $data['myAds']  = $this->Search_model->search($search_keyword,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
        }
        else 
        {
           $data['myAds']  = $this->Search_model->searchCategory($search_keyword,$search_category,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds'],
                    'search_category' => $search_category
                ));
        }
       
        if($search_category == 1)
        {
            $vehicle_ad = TRUE;
        }
        $data['vehicle_ad'] = $vehicle_ad;   
        $this->load->view('filter_view',$data);
    }
    
   public function search_ajax_location()
    {
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations(); 
       
        $this->load->model('Search_model');
        
        $search_location = $this->input->post('location_id');
        $search_keyword = $this->input->post('search');
        $ad_filter = $this->input->post('ad_filter');
        
        $vehicle_ad = FALSE;
        
        $this->load->model('Search_model');

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);          
        
        if($search_location == 0)
        {
            $data['myAds']  = $this->Search_model->search($search_keyword,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
        }
        else 
        {
           $data['myAds']  = $this->Search_model->searchLocation($search_keyword,$search_location,$ad_filter);

                $this->load->view('search_ads_view', array(
                    'myAds' => $data['myAds']
                ));
        }
        
        $data['vehicle_ad'] = $vehicle_ad;   
        $this->load->view('filter_view',$data);
    }
   
    
    public function filter_ads($type,$ad_filter)
    {
        $this->load->model('search_model');
        $data['categories'] = $this->search_model->getAllCategories();
        $data['locations'] = $this->search_model->getAllLocations();
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =$search_category;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        
        
        $this->load->model('Search_model');
        if (($search_category != -1) && ($search_location == 0))
        {
            $data['myAds']  = $this->Search_model->getAdsCategory($search_keyword,$search_category,$type,$ad_filter);
            $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $data['search_category']
            ));
        }
        else if (($search_category == -1) && ($search_location != 0))
        {
            $data['myAds']  = $this->Search_model->getAdsLocation($search_keyword,$search_location,$type,$ad_filter);
        
            $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $data['search_category']
            ));
        }
        
        else if(($search_category == -1) && ($search_location == 0))
        {
            $data['myAds']  = $this->Search_model->getAds($search_keyword,$type,$ad_filter);
            $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $data['search_category']
            ));
        }
        
        else
        {
            $data['myAds']  = $this->Search_model->getAdsCategoryLocation($search_keyword,$search_category,$search_location,$type,$ad_filter);
        
            $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $data['search_category']
            ));
        }
    }
    
    
    public function get_ad_location($location_id)
    {
        $this->load->model('Search_model');
        return $this->Search_model->getLocation($location_id)->location_name;
        
    }
    
    public function filter_by_price() 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
             $this->load->view('includes/header');
        } 
        else 
        {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
        }
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        $ad_filter = $this->input->post('ad_filter');
        
        $from_price = $this->input->post('from_filter_advertisement_Price');
        $to_price = $this->input->post('to_filter_advertisement_Price');
                
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =-1;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        $data['ad_filter'] =$ad_filter;
        
        $this->load->view('includes/search',$data);

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);
        
        $data['myAds']  = $this->Search_model->filterByPrice($from_price,$to_price);
        $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds']
        ));
        
        $this->load->view('filter_view');
        $this->load->view('includes/footer');
        
        
    }
    
    public function filter_vehicles() 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
             $this->load->view('includes/header');
        } 
        else 
        {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
        }
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        $ad_filter = $this->input->post('ad_filter');
        
        $from_vehicle_year = $this->input->post('from_vehicle_year');
        $to_vehicle_year = $this->input->post('to_vehicle_year');
        $from_vehicle_milage = $this->input->post('from_vehicle_milage');
        $to_vehicle_milage = $this->input->post('to_vehicle_milage');
                
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =-1;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        $data['ad_filter'] =$ad_filter;
        
        $this->load->view('includes/search',$data);

        $categories = Search_model::getCategory();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);
        
        if($from_vehicle_year != NULL && $to_vehicle_year!= NULL)
        {
            $data['myAds']  = $this->Search_model->filterVehicleByYear($from_vehicle_year,$to_vehicle_year);
        }
        else if($from_vehicle_milage != NULL && $to_vehicle_milage!= NULL)
        {
            $data['myAds']  = $this->Search_model->filterVehicleByMilage($from_vehicle_milage,$to_vehicle_milage);
        }
        
        $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds']
        ));
        
        $vehicle_ad = TRUE;
        $data['vehicle_ad'] = $vehicle_ad;   
        $this->load->view('filter_view',$data);
        $this->load->view('includes/footer');
        
        
    }
    
    public function getCategories()
    {
        
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
             $this->load->view('includes/header');
        } 
        else 
        {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
        }
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getAllCategories();
        $data['locations'] = $this->Search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        $ad_filter = $this->input->post('ad_filter');
        
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =-1;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        $data['ad_filter'] =$ad_filter;
        $vehicle_ad = FALSE;
        
        $this->load->view('includes/search',$data);

        $categories = Search_model::getCategory();
        $locations = Search_model::getLocations();
        $electronic_categories = Search_model::getElectronicSubcategory();
        $vehical_categories = Search_model::getVehicalSubCategory();
        $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
        $property_categories = Search_model::getPropertySubcategory();

        $data['categories'] = $categories;
        $data['locations'] = $locations;
        $data['electronic_categories'] = $electronic_categories;
        $data['vehical_categories'] = $vehical_categories;
        $data['homeandpersonal_categories'] = $homeandpersonal_categories;
        $data['property_categories'] = $property_categories;
       
        
        $this->load->view('category_view', $data);
        
        if (isset($_GET['location'])) 
        {
                $location_id =$_GET['location'];
                
                $data['myAds']  = Search_model::searchByLocations($location_id);
                $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $search_category
            ));
         }
        
        else if (isset($_GET['category']) && !isset($_GET['subcategory'])) 
        {
                $category_id =$_GET['category'];
                
                if($category_id == 1)
                {
                    $vehicle_ad = TRUE;
                }
                $data['myAds']  = Search_model::searchByCategory($category_id);
                $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $category_id
            ));
         }
         else if (isset($_GET['category']) && isset($_GET['subcategory'])) 
        {
                $category_id =$_GET['category'];
                $sub_category_id = $_GET['subcategory'];
                
                if($category_id == 1)
                {
                    $data['myAds']  = Search_model::searchBySubCategory('vehiclead ',$category_id,$sub_category_id,'vehicle_subcategory');
                    $vehicle_ad = TRUE;
                }
                else if($category_id == 2)
                {
                    $data['myAds']  = Search_model::searchBySubCategory('propertyad ',$category_id,$sub_category_id,'property_subcategory');
                }
                else if($category_id == 3)
                {
                    $data['myAds']  = Search_model::searchBySubCategory('electronicad ',$category_id,$sub_category_id,'electronic_subcategory');
                }
                else if($category_id == 4)
                {
                    $data['myAds']  = Search_model::searchBySubCategory('homeandpersonalad ',$category_id,$sub_category_id,'home_personal_subcategory');
                }


            /*$categoryAds  = Search_model::searchByCategory($category_id);
                $data['myAds'] = array();
                
                foreach ($categoryAds as $row)
                {
                    $post_date = $row->post_date_time;
                    $seller_id = $row->user_id;
                    if($category_id == 1)
                    {
                        $subCategoryAds  = Search_model::searchBySubCategory('vehiclead',$sub_category_id,'vehicle_subcategory');
                        foreach ($subCategoryAds as $sub_row)
                        {
                            if(($post_date == $sub_row->post_date_time)&& ($seller_id == $sub_row->user_id))
                            {
                                $data['myAds'] = $row;
                            }
                        }
                    }
                }*/
                
                $this->load->view('search_ads_view', array(
                'myAds' => $data['myAds'],
                'search_category' => $category_id
            ));
         }
      $data['vehicle_ad'] = $vehicle_ad;   
      $this->load->view('filter_view',$data);
      $this->load->view('includes/footer');
    }
}

