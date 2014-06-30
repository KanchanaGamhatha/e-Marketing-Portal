<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Rules_controller extends CI_Controller {
    
    function check_rule() 
    {
        $this->load->model('Rules_model');
        
        $description = $this->input->post('description_text');
        
        $keywords = preg_split("/[\s,]+/", $description);
        $error = FALSE;
        foreach ($keywords as $value) 
        {
            $rules = $this->Rules_model->getRules();
            //echo $value.'<br>';
            foreach ($rules as $rule) 
            {
                //echo strtoupper ($rule->rule_text).' -> '.strtoupper ($value).'<br>';
                if (strtoupper ($rule->rule_text) == strtoupper ($value))
                {
                    echo $value.', ';
                    $error = TRUE;
                }
            }
        }
        
        if($error == TRUE)
        {
            echo '<br>Description text contain unallowed text';
        }
        
    }
}
    


