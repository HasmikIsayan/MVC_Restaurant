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
			<form   action = 'add_menu' method = 'post' class = 'add_menu_form admin_menu_add_hidden'  enctype="multipart/form-data">
				<input name="image" id="image"  type="file" required="required">
				<div class = 'admin_menu_text_root'><p>Menu P1 text</p></div>
				<input class = 'admin_menu_text' type="text"  name="p1text" required="required" > <br />
				<div class = 'admin_menu_text_root'><p>Menu P2 text</p></div>
				<input class = 'admin_menu_text' type="text"  name="p2text" required="required" > <br />
				<button type="submit" name = 'submit' class="admin_menu_add_button" > ADD</button>	
							
			</form>	
	
		</div>
		<div class = 'admin_menu_items'>
			<?php foreach($this->menu_items as $u){if($u){?>
			
			<div class = 'admin_menu_item'>
				<div class = 'admin_menu_item_image'><?php echo '<img height = "200" margin-left="50" src="data:image;base64,'.base64_encode($u["menu_image"]).' ">' ?> </div>
				<div class = 'admin_texts'>
					<label>Menu P1 text</label>
				</div>
				<div class = 'admin_menu_item_p1text'><?php echo $u['menu_p1text']; ?> </div>
				<div class = 'admin_texts'>
					<label>Menu P2 text</label>
				</div>
				<div class = 'admin_menu_item_p2text'><?php echo $u['menu_p2text']; ?> </div>
				
				</br>
				<form action = "menu_edit" method = 'post'>
					<button class="btn btn-primary a-btn-slide-text edit" type = 'submit' name = 'submit2'>
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
			<script>
$(document).ready(function(){
	$('.delete').click(function(e){
			e.preventDefault();
			var el = this;
			var id = this.id;
			var del = $(this).closest('.admin_menu_item');
			
			console.log(parent); 
		  $.ajax({
			   url: '/MVC_Restaurant/delete_menu',
			   type: 'POST',
			   data: {
				   id:id
				   },
			    dataType: "text",
               beforeSend: function() {
					del.animate({'backgroundColor':'#fb6c6c'},300);
			
					console.log(id);
					},            
			   success: function(response){

					del.fadeOut(1000, function(){
                        $(this).remove();
                    });            	
				
				}
			});
		
	});
});

				  
	</script>
<body>	