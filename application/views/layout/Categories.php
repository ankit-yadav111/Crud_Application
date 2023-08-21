<?php

    
    if($this->session->userdata('UserLoginSession'))
    {
        $udata = $this->session->userdata('UserLoginSession');
        $data['udata']=$udata;
        $this->load->view("adminHeader",$data);
        $this->load->view("editCategories",array('categories'=>$Category));
    }
    else
    {
        redirect(base_url('welcome/login'));
    }
?>