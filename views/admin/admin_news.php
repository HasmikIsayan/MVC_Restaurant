<?php
	require_once 'views/layoute/header.php';

	?>


<body>
	<div class = "admin_all_menus">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Food_Admin</a>
				</div>
				<ul class="nav navbar-nav">
				  <li><a href="admin_menu">Menu</a></li>
				  <li><a href="admin_features">Features</a></li>
				  <li ><a href="admin_delivery">Delivery</a></li>
				  <li class='active'><a href="admin_news">News</a></li>
				  <li><a href="admin_drinks">Drinks</a></li>
				  <li><a href="admin_mainCourse">Main Course</a></li>
				  <li><a href="admin_desserts">Desserts</a></li>
				</ul>
				
			</div>
		</nav>
		<div class = "logout"><a href="logout">logout</a></div> 
		<div class = "admin_menu">
			<form   action = 'add_news' method = 'post' class = 'add_menu_form add_news_image'  enctype="multipart/form-data">
			<h2>Add Image</h2>
			<br>
			<br>
				<input name="image" id="image"  type="file" required="required">
				<button type="submit" name = 'submit' class="admin_menu_add_button" > ADD</button>	
							
			</form>	
	
		</div>
		<div class = 'admin_menu_items'>
		
			<?php 

			foreach($this-> news_items as $u){ if($u){ ?>
			
			<div class = 'admin_menu_item admin_news'>
				<div class = 'admin_menu_item_image'><?php echo '<img width = "200"  src="data:image;base64,'.base64_encode($u["news_image"]).' ">' ?> </div>
		
				</br>
				<form action = "edit_news" method = 'post'>
					<button class="btn btn-primary a-btn-slide-text edit" type = 'submit' name = 'submit2'>
						<span class="glyphicon glyphicon-edit" ></span>
						<span><strong> Edit</strong></span>
					</button>
					<input type = 'hidden' name="id" value = <?php echo $u['id']; ?> >		
				</form>
				
			</div>
			
			<?php  } }?>
	
		</div>
	</div>
		
<body>	
