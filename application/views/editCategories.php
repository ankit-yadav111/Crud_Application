<div class="container-fluid" style="margin-top:6%">
    <?php
      if($this->session->flashdata('success')) {	?>
      <div class="alert alert-success" ><?=$this->session->flashdata('success')?></div>
    <?php } ?>
    <?php
      if($this->session->flashdata('error')) {	?>
      <div class="alert alert-warning" ><?=$this->session->flashdata('error')?></div>
    <?php } ?>
        <div class="container mt-3 rounded " style="padding:15px;">
        <div>
            <h4>Add Category</h4>
            <form style="width:50%; padding:10px;" class="d-flex" method="post" action="<?= base_url('Category/createCategory')?>">
                <input type="Name" class="form-control " id="categoryName" name="categoryName" placeholder="Category" style="width:50%;" required/>
                <button type="submit" class="btn btn-primary mx-5" >Add</button>
            </form>
            </div>
            <div class="mt-2">
        <table id="CategoryDetails" class="table table-hover table-bordered" style="width:100%">
        <thead class="table-dark">
            <tr >
                <th>S.no</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-white">

            <?php $i=0;
            foreach ($categories as $Category): ?>
              <tr>
                <td><?=$i+1?></td>
                <td><?=($Category->Category) ?></td>
                <td><button type="button" class=" btn-danger rounded" onclick="deleteCategory('<?= $Category->Category ?>')" style="height:30px;">Del</button>
                </td>
              </tr>
              <?php $i=$i+1; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/bootstrap.bundle.min.js"></script>
    <script>
            var bar=document.getElementById("categoryBar");
            bar.classList.add("active");
            new DataTable('#CategoryDetails');
        </script>
        </body>
        </html>