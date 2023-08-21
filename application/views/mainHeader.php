<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
		<title>Welcome Page</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<span class="h1 fw-bold mb-0 mx-3"><img class="navbar-brand" src="<?php echo base_url(); ?>assests/images/logo1.png" style="margin-top: 3%; object-fit: cover; width: 50%"></span>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item ">
				<a class="nav-link active text-white" aria-current="page" href="<?php base_url(); ?>">Home</a>
				</li>
				<li class="nav-item dropdown mx-3 " id="homeCat">
				<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Category
				</a>
				<ul class="dropdown-menu bg-white">
					<?php foreach($categories as $cate): ?>
					<li><a class="dropdown-item" onclick="renderBlogs('<?= $cate->Category?>')"><?= $cate->Category ?></a></li>
					<?php endforeach;?>
				</ul>
				</li>
				<li class="nav-item mx-3">
				<a class="nav-link text-white" href="<?php echo base_url();?>welcome/user">Admin</a>
				</li>
				</li>
			</ul>
			<form class="d-flex" id="HomeSearch" style="margin-left:42%;" role="search">
				<input class="form-control me-3 mt-2" type="search" placeholder="Search" aria-label="Search" name="search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
			</div>
		</div>
		</nav>