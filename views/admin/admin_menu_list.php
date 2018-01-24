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
				  <li class="active"><a href="admin_menu">Menu</a></li>
				  <li><a href="admin_features">Features</a></li>
				  <li><a href="admin_delivery">Delivery</a></li>
				  <li><a href="admin_news">News</a></li>
				  <li><a href="admin_drinks">Drinks</a></li>
				  <li><a href="admin_mainCourse">Main Course</a></li>
				  <li><a href="admin_desserts">Desserts</a></li>
				  <li><a href="admin_menu_list">Menu_list</a></li>
				</ul>
				
			</div>
		</nav>
		<div class = "logout"><a href="logout">logout</a></div> 
		
		<div class = "admin_menu">
			<form   action = 'add_menu_list' method = 'post' class = 'add_menu_form'  enctype="multipart/form-data">
				<div class = 'admin_menu_text_root'><p>Menu P1 text</p></div>
				<input class = 'admin_menu_text' type="text"  name="text" required="required" > <br />
				<button type="submit" name = 'submit' class="admin_menu_add_button" > ADD</button>	
							
			</form>	
	
		</div>
		<div class = 'admin_menu_list_items'>
			<?php foreach($this->menu_list_items as $u){if($u){?>
			
			<div class = 'admin_menu_list_item'>
				
				<div class = 'admin_menu_list_name'>
					<label>Menu P2 text</label>
				</div>
				<div class = 'admin_menu_item_name'><?php echo $u['admin_menu_list']; ?> </div>
				
				<form action = "menu_list_edit" method = 'post'>
					<button class="edit_menu_list" type = 'submit' name = 'submit2'>
					<span class="glyphicon glyphicon-edit" ></span>
					<span><strong> Edit</strong></span>
					</button>
					<input type = 'hidden' name="id" value = <?php echo $u['id']; ?> >		
				</form>
				<button class="btn btn-danger a-btn-slide-text delete admin_page_delete" id = <?php echo $u['id']; ?>  type = 'submit'>
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					<span><strong>Delete</strong></span> 
					<!--input type = 'hidden' name="id" value = <?php echo $u['id']; ?> -->					
				</button>
			</div>
			
			<?php }} ?>
		</div>
	</div>
			