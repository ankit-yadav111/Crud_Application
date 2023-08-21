	<!-- Card View -->
		<div class="row row-cols-1 row-cols-md-3 shadow  rounded mx-5 my-5" id="cardView" style="padding:15px;">

			<!-- JavaScript will print this -->

		</div>
		<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="<?php echo base_url(); ?>assests/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assests/js/script.js"></script>
		<script>

			function renderBlogs(cate){
				var blogsData = <?php echo json_encode($blogs); ?>;
				var cardView = document.getElementById('cardView');
				var card="";
				blogsData.forEach(blog => {
					if(cate=="all" || cate==blog.Category){
					card+= `<div class="col">
						<div class="card shadow my-3">
							<img src="${blog.link}" class="card-img-top" height="350px" alt="...">
							<div class="card-body">
							<h5 class="card-title">${blog.Title}</h5>
							<p class="card-text">${blog.Description}.</p>
							</div>
						</div>
						</div>`;
					}
					});
					cardView.innerHTML=card;
			}

			renderBlogs("all");
		</script>
	</body>
</html>