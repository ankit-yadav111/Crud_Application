<?php

    class Blog extends CI_Controller{

        function deleteBlog(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $id = $_POST['id'];
                $this->load->model('Database');
                if($this->Database->deleteBlog($id)){
                    $this->session->set_flashdata('success','Blog Deleted Successfully');
                    // redirect(base_url('welcome/blog'));
                }
                else{
                    $this->session->set_flashdata('error','Unable to Delete Blog');
                    // redirect(base_url('welcome/blog'));
                }
            }
        }


        function createBlog(){
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $this->form_validation->set_rules('title','Title','required');
                // $this->form_validation->set_rules('blogImg','image','required');
                $this->form_validation->set_rules('blogCategory','category','required');

                if($this->form_validation->run()==TRUE && !empty($_FILES['blogImg']['name']))
                {
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $type = $this->input->post('blogCategory');

                    // $this->upload->allowed_types = 'jpg|jpeg|png';
                    // $this->upload->upload_path = './assests/tmp/';
                    // $this->upload->max_size = 2048;

                    $path='assests/tmp/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['upload_path'] = './'.$path;
                    $config['max_size'] = 2048;

                    $this->load->library('upload', $config);

                    $res=$this->upload->do_upload('blogImg');
                    $error = $this->upload->display_errors();

                    if($res){
                        $uploadData = $this->upload->data();
                        $fileName = basename($uploadData['full_path']);
                        $filePath=base_url($path)."".$fileName;
                        $data = array(
                            'Title'=>$title,
                            'link'=>$filePath,
                            'Description'=>$description,
                            'Category'=>$type
                        );

                        $this->load->model('Database');
                        $result=$this->Database->createBlog($data);
                        if($result==="success"){
                            $this->session->set_flashdata('success','Successfully Blog Created');
                            redirect(base_url('welcome/blogs'));
                        }
                        else{
                            $this->session->set_flashdata('error',$result);
                            redirect(base_url('welcome/blogs'));
                        }
                    }
                    else{
                        $this->session->set_flashdata('error',$error);
                        redirect(base_url('welcome/blogs'));
                    }
                }
            else
                {
                    $this->session->set_flashdata('error','Fill all the required fields');
                    redirect(base_url('welcome/blogs'));
                }
            }
        }

        function updateBlog(){
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $this->form_validation->set_rules('uTitle','Title','required');
                // $this->form_validation->set_rules('ublogImg','Image','required');
                $this->form_validation->set_rules('ucategory','category','required');

                if($this->form_validation->run()==TRUE)
                {
                    $title = $this->input->post('uTitle');
                    $link = $this->input->post('ublogImg');
                    $id = $this->input->post('uid');
                    $description = $this->input->post('udescription');
                    $type = $this->input->post('ucategory');
                    
                    if(!empty($_FILES['ublogImg']['name'])){

                        $path='assests/tmp/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['upload_path'] = './'.$path;
                        $config['max_size'] = 2048;

                        $this->load->library('upload', $config);

                        $res=$this->upload->do_upload('ublogImg');
                        $error = $this->upload->display_errors();

                        if($res){
                            $uploadData = $this->upload->data();
                            $fileName = basename($uploadData['full_path']);
                            $filePath=base_url($path)."".$fileName;

                            $data = array(
                                'Title'=>$title,
                                'link'=>$filePath,
                                'Description'=>$description,
                                'Category'=>$type
                            );

                            $this->load->model('Database');
                            $result=$this->Database->updateBlog($data,$id);
                            if($result==="success"){
                                $this->session->set_flashdata('success','Successfully Blog Updated');
                                redirect(base_url('welcome/blogs'));
                            }
                            else{
                                $this->session->set_flashdata('error',$result);
                                redirect(base_url('welcome/blogs'));
                            }
                        }
                        else{
                            $this->session->set_flashdata('error',$error);
                            redirect(base_url('welcome/blogs'));
                        }
                    }
                    else{
                        $data = array(
                            'Title'=>$title,
                            'Description'=>$description,
                            'Category'=>$type
                        );

                        $this->load->model('Database');
                        $result=$this->Database->updateBlog($data,$id);
                        if($result==="success"){
                            $this->session->set_flashdata('success','Successfully Blog Updated');
                            redirect(base_url('welcome/blogs'));
                        }
                        else{
                            $this->session->set_flashdata('error',$result);
                            redirect(base_url('welcome/blogs'));
                        }
                    }
                }
                else{
                    $this->session->set_flashdata('error','Fill all the required fields');
                    redirect(base_url('welcome/blogs'));
                }
            }
        }



    }
?>