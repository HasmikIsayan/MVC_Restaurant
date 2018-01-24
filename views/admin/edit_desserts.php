<?php
	require_once 'views/layoute/header.php';
?> 
<body>

			<form   action = 'edit_desserts_item' method = 'post' class = 'edit_menu_form'  enctype="multipart/form-data">
				<?php echo '<img height = "175"  src="data:image;base64,'.base64_encode($this->desserts_items["desserts_image"]).' ">' ?>
				
				<input name="image" id="image"  type="file" >
				
				<div class = 'admin_menu_text_root'><p> Desserts Name</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->desserts_items['desserts_text'] ?>;" name="name" > <br />
				
				<div class = 'admin_menu_text_root'><p> Desserts Price</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->desserts_items['desserts_price'] ?>;" name="price" > <br />
				<button type="submit" name = 'submit_edit' class="admin_menu_add_button" >SAVE</button>		
				<input type = 'hidden' name="id" value = <?php echo $this->desserts_items['id']; ?> >
			</form>	

</body>
</html>