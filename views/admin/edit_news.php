<?php
	require_once 'views/layoute/header.php';
?> 
<body>

			<form   action = 'edit_news_item' method = 'post' class = 'edit_menu_form'  enctype="multipart/form-data">
				<?php echo '<img height = "175"  src="data:image;base64,'.base64_encode($this->news_items["news_image"]).' ">' ?>
				
				<input name="image" id="image"  type="file" >
				
				<!--div class = 'admin_menu_text_root'><p> Delivery Text</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->news_items['delivery_text'] ?>;" name="text" > <br />
				
				<div class = 'admin_menu_text_root'><p> Delivery Price</p></div>
				<input class = 'admin_menu_text' type="text" value="<?php echo $this->news_items['delivery_price'] ?>;" name="price" > <br /-->
				<button type="submit" name = 'submit_edit' class="admin_menu_add_button" >SAVE</button>		
				<input type = 'hidden' name="id" value = <?php echo $this->news_items['id']; ?> >
			</form>	

</body>
</html>