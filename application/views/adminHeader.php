<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
		<!-- <title>Welcome Page</title> -->
	</head>
	<body>
        <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-bg-dark" style="width:20%; padding:10px;" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">DistrictD</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php if($udata['type'] != "Normal User"){ ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url('welcome/user')?>" name="userBar" id="userBar">Users</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('welcome/blogs')?>" name="blogs" id="blogBar">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('welcome/category')?>" name="category" id="categoryBar">Category</a>
                </li>
            </div>
            </div>
            <span class="h1 fw-bold mb-0"><img class="navbar-brand my-1" src="<?php echo base_url(); ?>assests/images/logo1.png" style="float:right;object-fit: cover; width: 50%;"></span>
            <div class="mx-5">
                <h5 class="text-white font-weight-bold">Hii, <?= $udata['name']?></h5>
                <a class="mt-0" style="font-size:14px;" href="<?= base_url('user/logout')?>">Logout</a>
            </div>
        </div>
        </nav>