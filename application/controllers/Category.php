<?php

    class Category extends CI_Controller{

        function deleteCategory(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cate'])) {
                $cate = $_POST['cate'];
                $this->load->model('Database');
                $this->Database->deleteBlogByCategory($cate);
                    if($this->Database->deleteCategory($cate)){
                        $this->session->set_flashdata('success','Category Deleted Successfully');
                    }
                    else{
                        $this->session->set_flashdata('error','Unable to Delete Category');
                    }
            }
        }

        function createCategory(){
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $this->form_validation->set_rules('categoryName','Name','required');

                if($this->form_validation->run()==TRUE)
                {
                    $cate = $this->input->post('categoryName');

                    $data = array(
                        'Category'=>$cate
                    );

                    $this->load->model('Database');
                    $result=$this->Database->createCategory($data);
                    if($result==="success"){
                        $this->session->set_flashdata('success','Successfully Category Created');
                        redirect(base_url('welcome/category'));
                    }
                    else{
                        $this->session->set_flashdata('error',$result);
                        redirect(base_url('welcome/category'));
                    }
                }
            }
            else
                {
                    $this->session->set_flashdata('error','Fill all the required fields');
                    redirect(base_url('welcome/category'));
                }
        }
    }

?>