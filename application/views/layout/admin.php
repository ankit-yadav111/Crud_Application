<?php

    if($this->session->userdata('UserLoginSession'))
    {
        $udata = $this->session->userdata('UserLoginSession');
        if($udata['type']!='Normal User'){
            $data['udata']=$udata;
            $this->load->view("adminHeader",$data);
            $this->load->view('userDetails', array('users' => $users));
        }
        else{
            redirect(base_url('welcome/blogs'));
        }
    }
    else
    {
        redirect(base_url('welcome/login'));
    }
?>