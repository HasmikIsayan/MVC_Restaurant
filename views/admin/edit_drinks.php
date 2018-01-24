<?php
	require_once 'views/layoute/header.php';
?> 
<body>

			<form   action = 'edit_drinks_item' method = 'post' class = 'edit_menu_form'  enctype="multipart/form-data">
				<?php echo '<img height = "175"  src="data:image;base64,'.base64_encode($this->drinks_items["drinks_image"]).' ">' ?>
				
				<input name="image" id="image"  type="file" >
				
				<div class = 'admin_menu_text_root'><p> Menu text P1</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->drinks_items['drinks_name'] ?>;" name="name" > <br />
				
				<div class = 'admin_menu_text_root'><p> Menu text P2</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->drinks_items['drinks_price'] ?>;" name="price" > <br />
				<button type="submit" name = 'submit_edit' class="admin_menu_add_button" >SAVE</button>		
				<input type = 'hidden' name="id" value = <?php echo $this->drinks_items['id']; ?> >
			</form>	

</body>
</html>