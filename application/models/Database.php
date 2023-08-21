<?php


    class Database extends CI_Model{


        # Crud operations on User
        function createUser($data)
        {
            if($this->db->insert('userdetails',$data)){
                return "success";
            } else {
                $error = $this->db->error();
                
                if ($error['code'] == 1062) {
                    return "Error: Duplicate key violation"; 
                } else {
                    // Other database error occurred
                    return "Error: Unable to create account";
                }
            }
        }

        function checkPassword($password,$email)
        {
            $query = $this->db->query("SELECT * FROM userdetails WHERE password='$password' AND email='$email'");
            if($query->num_rows()==1)
            {
                return $query->row();
            }
            else
            {
                return false;
            }

        }

        function getUsers() {
            $query = $this->db->get('userdetails'); 
            
            if ($query->num_rows() > 0) {
                return $query->result(); 
            } else {
                return array();     
            }
        }

        function deleteUser($email){
            $this->db->where('Email', $email);
            $this->db->delete('userdetails');
            
            if ($this->db->affected_rows() > 0) {
                return true; // Deletion was successful
            } else {
                return false; // Deletion failed or user does not exist
            }
        }





        # Crud Operations on Blogs: 
        function createBlog($data)
        {
            $this->db->insert('blogdetails',$data);

            if ($this->db->affected_rows() > 0) {
                return "success"; 
            } else {
                $error = $this->db->error();
                
                if ($error['code'] == 1062) {
                    return "Error: Duplicate key violation"; 
                } else {
                    // Other database error occurred
                    return "Error: Unable to create blog";
                }
            }
        }


        function getBlogs() {
            $query = $this->db->get('blogdetails'); 
            
            if ($query->num_rows() > 0) {
                return $query->result(); 
            } else {
                return array();     
            }
        }


        function deleteBlog($id){
            $this->db->where('id', $id);
            $this->db->delete('blogdetails');
            
            if ($this->db->affected_rows() > 0) {
                return true; // Deletion was successful
            } else {
                return false; // Deletion failed or user does not exist
            }
        }

        function updateBlog($data,$id){
            $this->db->where('id',$id);
            $status=$this->db->update('blogdetails',$data);
            if ($status) {
                return "success"; 
            } else {
                $error = $this->db->error();
                
                if ($error['code'] == 1062) {
                    return "Error: Duplicate key violation"; 
                } else {
                    // Other database error occurred
                    return "Error: Unable to Update Blogs";
                }
            }
            
        }


        // function getBlogsByCategory($cate){
        //     $this->db->where('Category',$cate);
        //     $query = $this->db->get('blogdetails'); 
            
        //     if ($query->num_rows() > 0) {
        //         return $query->result(); 
        //     } else {
        //         return array();     
        //     }
        // }

        function deleteBlogByCategory($cate){
            $this->db->where('Category',$cate);
            $this->db->delete('blogdetails');
        }
        

        # CRUD Operation for Category
        function createCategory($data)
        {
            $this->db->insert('categories',$data);

            if ($this->db->affected_rows() > 0) {
                return "success"; 
            } else {
                $error = $this->db->error();
                
                if ($error['code'] == 1062) {
                    return "Error: Duplicate key violation"; 
                } else {
                    // Other database error occurred
                    return "Error: Unable to create blog";
                }
            }
        }


        function getCategory() {
            $query = $this->db->get('categories'); 
            
            if ($query->num_rows() > 0) {
                return $query->result(); 
            } else {
                return array();     
            }
        }


        function deleteCategory($Category){
            $this->db->where('Category', $Category);
            $this->db->delete('categories');
            
            if ($this->db->affected_rows() > 0) {
                return true; // Deletion was successful
            } else {
                return false; // Deletion failed or data does not exist
            }
        }



    }


?>