
        <div class="container-fluid" style="margin-top:6%;">
        <?php
      if($this->session->flashdata('success')) {	?>
      <div class="alert alert-success" style="padding:10px;" ><?=$this->session->flashdata('success')?></div>
    <?php } ?>
    <?php
      if($this->session->flashdata('error')) {	?>
      <div class="alert alert-warning" ><?=$this->session->flashdata('error')?></div>
    <?php } ?>
            <button type="button" class="btn btn-primary " style="margin-left:90%;" id="addUser" name="addUser" onclick="openModal('blogModal')">Add Blogs</button>
            <div class="shadow rounded mx-5 my-2">
                <!-- PHP Category Start -->
                <?php foreach($categories as $cate): 
                    $category=$cate->Category;?>
                    <h3 class="mx-3 " style="padding:10px;"><?= $category ?></h3>
                    <div class="row row-cols-1 row-cols-md-3 " style="padding:15px;">
                        <?php foreach ($blogs as $blog): 
                            if($blog->Category==$category){?>
                                <div class="col" style="padding:15px;">
                                    <div class="card shadow " style="padding:10px;">
                                    <img src="<?=($blog->link) ?>" class="card-img-top" height="350px" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=($blog->Title) ?></h5>
                                            <p class="card-text"><?=($blog->Description) ?>.</p>
                                            <button type="button" class=" text-white rounded btn-danger float-right mx-2"  onclick="deleteBlog(<?= $blog->id ?>)"style="height:30px;">Delete</button>
                                            <button type="button" class=" rounded btn-primary mx-2 float-left" style="height:30px;" onclick="openUpdateModal('<?= $blog->id ?>','<?= $blog->Title ?>','<?= $blog->Description ?>','<?= $blog->link ?>','<?= $blog->Category ?>')">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach;?>
            <!-- PHP Category End -->  
        </div>
                </div>



        <!-- Modal -->

    <div class="modal" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalHeading">Add New Blog</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('blogModal')">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Blog/createBlog')?>" method="post">
                <div class="form-group">
                <span style="color: red;">* </span><label for="formGroupExampleInput">Title</label>
                <input type="text" class="form-control " id="title" name="title" placeholder="Title" required/>
                </div>
                <div class="form-group">
                <span style="color: red;">* </span><label for="formGroupExampleInput">Link</label>
                <input type="text" class="form-control " id="link" name="link" placeholder="web link" required/>
                </div>
                <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" style="height: 130px;"></textarea>
                </div>
                <div class="form-group">
                </span><label for="formGroupExampleInput2">Category</label>
                <select class="form-select " aria-label="Default select example" id="blogCategory" name="blogCategory">
                <?php foreach($categories as $cate): ?>
                    <option value="<?= $cate->Category ?>"><?= $cate->Category ?></option>
                    <?php endforeach;?>
                </select>
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('blogModal')">Close</button>
            <button type="submit" class="btn btn-primary" >Save</button>
            </div>
            </form>
            
            </div>
        </div>
        </div>
      </div>


      <!-- Modal-2 -->

    <div class="modal" id="blogUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalHeading">Update Blog</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('blogUpdateModal')">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Blog/updateBlog')?>" method="post">
                <input type="text" class="invisible" style="height:1px; width:1px" id="uid" name="uid"/>
                <div class="form-group">
                <span style="color: red;">* </span><label for="formGroupExampleInput">Title</label>
                <input type="text" class="form-control " id="uTitle" name="uTitle" placeholder="Title" required/>
                </div>
                <div class="form-group">
                <span style="color: red;">* </span><label for="formGroupExampleInput">Link</label>
                <input type="text" class="form-control " id="ulink" name="ulink" placeholder="web link" required/>
                </div>
                <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea class="form-control" id="udescription" name="udescription" placeholder="Description" style="height: 130px;"></textarea>
                </div>
                <div class="form-group">
                </span><label for="formGroupExampleInput2">Category</label>
                <select class="form-select " aria-label="Default select example" id="ucategory" name="ucategory">
                <?php foreach($categories as $cate): ?>
                    <option value="<?= $cate->Category ?>"><?= $cate->Category ?></option>
                    <?php endforeach;?>
                </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('blogUpdateModal')">Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
            
            </div>
            
        </div>
        </div>
      </div>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="<?php echo base_url(); ?>assests/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assests/js/script.js"></script>
        <script>
            var bar=document.getElementById("blogBar");
            bar.classList.add("active");
        </script>
    </body>
</html>