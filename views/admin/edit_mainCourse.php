<?php
	require_once 'views/layoute/header.php';
?> 
<body>

			<form   action = 'edit_mainCourse_item' method = 'post' class = 'edit_menu_form'  enctype="multipart/form-data">
				<?php echo '<img height = "175"  src="data:image;base64,'.base64_encode($this->mainCourse_items["mainCourse_image"]).' ">' ?>
				
				<input name="image" id="image"  type="file" >
				
				<div class = 'admin_menu_text_root'><p> Main Course Name</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->mainCourse_items['mainCourse_name'] ?>;" name="name" > <br />
				
				<div class = 'admin_menu_text_root'><p> Main Course Price</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->mainCourse_items['mainCourse_price'] ?>;" name="price" > <br />
				<button type="submit" name = 'submit_edit' class="admin_menu_add_button" >SAVE</button>		
				<input type = 'hidden' name="id" value = <?php echo $this->mainCourse_items['id']; ?> >
			</form>	

</body>
</html>