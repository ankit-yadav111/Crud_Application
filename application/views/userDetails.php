
    <div class="container-fluid" style="margin-top:7%">
    <?php
      if($this->session->flashdata('success')) {	?>
      <div class="alert alert-success" ><?=$this->session->flashdata('success')?></div>
    <?php } ?>
    <?php
      if($this->session->flashdata('error')) {	?>
      <div class="alert alert-warning" ><?=$this->session->flashdata('error')?></div>
    <?php } ?>
        <div class="container mt-5 rounded " style="padding:15px;"  >
        <button type="button" class="btn btn-primary float-right ms-3" id="addUser" name="addUser" onclick="openModal('userModal')">Add User</button>
    <table id="userDetails" class="table table-hover table-bordered" style="width:100%">
        <thead class="table-dark">
            <tr >
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-white">

            <?php foreach ($users as $user): ?>
              <?php if($user->Type!="Super Admin"){?>
              <tr>
                <td><?=($user->Name) ?></td>
                <td><?=($user->Email) ?></td>
                <td><?=($user->Type) ?></td>
                <td><button type="button" class=" btn-danger rounded" onclick="deleteUser('<?= $user->Email ?>')" style="height:30px;">Del</button>
                </td>
              </tr>
              <?php }else{ ?>
                <tr class="table-secondary">
                <td><?=($user->Name) ?></td>
                <td><?=($user->Email) ?></td>
                <td><?=($user->Type) ?></td>
                <td><button type="button" class=" btn-secondary rounded" onclick="deleteUser('<?= $user->Email ?>')" style="height:30px;" disabled>Del</button>
                </td>
              </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>


<!-- Modal -->
<div class="modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('userModal')">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=base_url('User/createuser')?>" method="post">
            <div class="form-group">
              <span style="color: red;">* </span><label for="formGroupExampleInput">Name</label>
              <input type="text" class="form-control " id="name" name="name" placeholder="Name" required/>
            </div>
            <div class="form-group">
            <span style="color: red;">* </span><label for="formGroupExampleInput2">Email</label>
              <input type="email" class="form-control " name="email" id="email" placeholder="example@gmail.com" required/>
            </div>
            <div class="form-group">
              <span style="color: red;">* </span><label for="formGroupExampleInput">Password</label>
              <input type="password" class="form-control " id="password" name="password" required/>
            </div>
            <div class="form-group">
            </span><label for="formGroupExampleInput2">Type of User</label>
              <select class="form-select " aria-label="Default select example" id="userType" name="userType">
                <option value="1">Noraml User</option>
                <option value="2">Admin</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('userModal')">Close</button>
              <button type="submit" class="btn btn-primary" >Save</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/bootstrap.bundle.min.js"></script>
    <script>
      var bar=document.getElementById("userBar");
      bar.classList.add("active");
      new DataTable('#userDetails');</script>
    </body>
</html>