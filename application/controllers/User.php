<?php

    class User extends CI_Controller{

        function createUser()
        {

            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $this->form_validation->set_rules('name','User Name','required');
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('password','Password','required');
                $this->form_validation->set_rules('userType','Type','required');

                if($this->form_validation->run()==TRUE)
                {
                    $username = $this->input->post('name');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $type = $this->input->post('userType');
                    $userType="Normal User";
                    if($type==2){
                        $userType="Admin";
                    }

                    $data = array(
                        'Name'=>$username,
                        'Email'=>$email,
                        'Password'=>sha1($password),
                        'Type'=>$userType
                    );

                    $this->load->model('Database');
                    $result=$this->Database->createUser($data);
                    if($result==="success"){
                        $this->session->set_flashdata('success','Successfully User Created');
                        redirect(base_url('welcome/user'));
                    }
                    else{
                        $this->session->set_flashdata('error',$result);
                        redirect(base_url('welcome/user'));
                    }
                }
            }
            else
                {
                    $this->session->set_flashdata('error','Fill all the required fields');
                    redirect(base_url('welcome/user'));
                }
        }

        function deleteUser(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
                $email = $_POST['email'];
                $this->load->model('Database');
                // $status=$this->Database->deleteUser($email)
                if($this->Database->deleteUser($email)){
                    $this->session->set_flashdata('success','User Deleted Successfully');
                    // redirect(base_url('welcome/user'));
                }
                else{
                    $this->session->set_flashdata('error','Unable to Delete User');
                    // redirect(base_url('welcome/user'));  
                }
            }
        }
        function loginnow()
        {
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('password','Password','required');

                if($this->form_validation->run()==TRUE)
                {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $password = sha1($password);

                    $this->load->model('Database');
                    $status = $this->Database->checkPassword($password,$email);
                    if($status!=false)
                    {
                        $username = $status->Name;
                        $email = $status->Email;
                        $type = $status->Type;

                        $session_data = array(
                            'name'=>$username,
                            'email' => $email,
                            'type'=> $type
                        );

                        $this->session->set_userdata('UserLoginSession',$session_data);
                        if($type=="Normal User"){
                            redirect(base_url('welcome/blogs'));
                        }
                        else{
                        redirect(base_url('welcome/user'));}
                    }
                    else
                    {
                        $this->session->set_flashdata('error','Email or Password is Wrong');
                        redirect(base_url('welcome/login'));
                    }

                }
                else
                {
                    $this->session->set_flashdata('error','Fill all the required fields');
                    redirect(base_url('welcome/login'));
                }
            }
        }

        function logout()
        {
            session_destroy();
            redirect(base_url('welcome/login'));
        }

    }

?>