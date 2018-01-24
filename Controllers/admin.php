<?php 

class Controllers_Admin extends Models_Food{
	
	public $username;
	public $insert_menuImage; 
	public $menu_items;
	public $features_items;
	public $insert_featuresImage; 
	public $insert_deliveryImage; 
	public $insert_dessertsImage;
	public $delivery_items;
	public $mainCourse_items;
	public $desserts_items;
	public $menu_list_items;
	public $news_items;
	public $delete_delivery_item;
	public $delete_features_item;
	public $delete_menu_item;
	public $admin;
	
	
	function __construct(){
		$this->model =  new Models_Food();
	}
	
	public function index(){
		
		echo 'barev';
	}
	public function login(){
		
		require_once 'views/admin/login.php';
	}
	public function logout(){
		
	session_start();
		if(session_destroy())
		{
			header("Location: adminform");
		}
		
	}
	
	public function check_admin(){
		
	   if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
		else
		{
			session_destroy();
			session_start(); 
		};
		$this->admin = $this->model->getAdminRow("id = '1'");
		
		if(isset($_POST['submit'])){
		
			$_SESSION['username'] = $_POST['login'];
			if (($_POST['login']== $this->admin['username'])&&($_POST['password']== $this->admin['password'])){
			
			
				$this->menu_items = $this->model->selectAllMenuItems();
				require_once 'views/admin/admin_page.php';
			
			}else{
					echo "<script type='text/javascript'>alert('There was false value');</script>";
					require_once 'views/admin/login.php';
				}

			} else{
					require_once 'views/admin/login.php';
				}
	}
	public function add_menu_item(){
		
		
		$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->menu_p1text = $_POST['p1text'];
					$this->menu_p2text = $_POST['p2text'];
					
					$menu_image = addslashes(file_get_contents($image));
					
					$this->insert_menuImage = $this->model->insertMenuImage($target_file,$menu_image,$this->menu_p1text,$this->menu_p2text );		
					$this->menu_items = $this->model->selectAllMenuItems();					
					// echo "File is an image - " . $check["mime"] . ".";	
					  //move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
					 require_once 'views/admin/admin_page.php';
				}else{
				
					echo "file is not image";
				}
			
		}
	}	
	public function edit_menu_items(){
		
			$id = $_POST['id'];
			$this->menu_items = $this->model->getMenuRow("id ='$id'");
			$this->menu_items['id'];
			//print_r($this->menu_items['menu_text']);
			require_once "views/admin/menu_edit.php";
		
	}
	
	public function edit_items_database(){
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->menu_p1text = $_POST['p1text'];
					$this->menu_p2text = $_POST['p2text'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->menu_image = addslashes(file_get_contents($image));	
					
				$this->insert_menu = $this->model->updateMenu("menu_p1text = '$this->menu_p1text' ","id = $this->id");
				$this->insert_menu = $this->model->updateMenu("menu_p2text = '$this->menu_p2text' ","id = $this->id");
				$this->insert_menu = $this->model->updateMenu(" menu_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_menu = $this->model->updateMenu(" menu_image='$this->menu_image ' ","id = $this->id");
				$this->menu_items = $this->model->selectAllMenuItems();
				
				 require_once 'views/admin/admin_page.php';
				}else{
				
					echo "file is not image";
				}
		}
	}
	public function admin_menu(){
		
			session_start();
			if(isset($_SESSION['username']))
				{
					$this->menu_items = $this->model->selectAllMenuItems();
					require_once 'views/admin/admin_page.php';
			}else{
						header("Location:adminform");
				}
		
		}
		
	public function admin_menu_list(){
		
			session_start();
			if(isset($_SESSION['username']))
				{
					$this->menu_list_items = $this->model->selectAllMenuListItems();
					require_once 'views/admin/admin_menu_list.php';
			}else{
						header("Location:adminform");
				}
		
		}
	public function admin_features(){
			session_start();
			if(isset($_SESSION['username'])){
				
					$this->features_items = $this->model->selectAllFeaturesItems();
					require_once 'views/admin/admin_features.php';
				}else{
						header("Location:adminform");
				}
			}
		
	public function admin_drinks(){
			session_start();
			if(isset($_SESSION['username'])){
				$this->drinks_items = $this->model->selectAllDrinksItems();
				require_once 'views/admin/admin_drinks.php';
				}else{
						header("Location:adminform");
				}
			}
	public function admin_news(){
		
			session_start();
			if(isset($_SESSION['username'])){
				$this->news_items = $this->model->selectAllNewsItems();
				require_once 'views/admin/admin_news.php';
				}else{
						header("Location:adminform");
				}
			}
	
	
	public function add_features_item(){
			
		$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->features_p1text = $_POST['p1text'];
					$this->features_p2text = $_POST['p2text'];
					
					$features_image = addslashes(file_get_contents($image));
					
					$this->insert_featuresImage = $this->model->insertFeaturesImage($target_file,$features_image,$this->features_p1text,$this->features_p2text );		
					$this->features_items = $this->model->selectAllFeaturesItems();					
					// echo "File is an image - " . $check["mime"] . ".";	
					  //move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
					 require_once 'views/admin/admin_features.php';
				}else{
				
					echo "file is not image";
				}
		}	
		
	}
	public function add_menu_list_item(){
			
	
		if(isset($_POST['submit'])){	
				
					$this->text = $_POST['text'];
					$this->insert_menuListItem = $this->model->insertMenuListItem($this->text );		
					$this->menu_list_items = $this->model->selectAllMenuListItems();					
					 require_once 'views/admin/admin_menu_list.php';
				}else{
				
					echo "file is not image";
				}
		}	
		
	
		public function add_drinks_item(){
			
		$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->drinks_name = $_POST['name'];
					$this->drinks_price = $_POST['price'];
					
					$drinks_image = addslashes(file_get_contents($image));
					
					$this->insert_drinksImage = $this->model->insertDrinksImage($target_file,$drinks_image,$this->drinks_name,$this->drinks_price );		
					$this->drinks_items = $this->model->selectAllDrinksItems();			
					
					 require_once 'views/admin/admin_drinks.php';
				}else{
				
					echo "file is not image";
				}
		}	
		
	}
	
	public function add_mainCourse_item(){
			
		$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->mainCourse_name = $_POST['name'];
					$this->mainCourse_price = $_POST['price'];
					
					$mainCourse_image = addslashes(file_get_contents($image));
					
					$this->insert_mainCourseImage = $this->model->insertMainCourseImage($target_file,$mainCourse_image,$this->mainCourse_name,$this->mainCourse_price );		
					$this->mainCourse_items = $this->model->selectAllMainCourseItems();			
					
					 require_once 'views/admin/admin_mainCourse.php';
				}else{	echo "file is not image";
				}
		}	
		
	}
		
	public function add_news_item(){
			
		$target_file =  basename($_FILES["image"]["name"]);
		
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					
					$news_image = addslashes(file_get_contents($image));
					
					$this->insert_News = $this->model->insertNewsImage($target_file,$news_image);		
					$this->news_items = $this->model->selectAllNewsItems();			
					
					 require_once 'views/admin/admin_news.php';
				}else{	echo "file is not image";
				}
		}	
		
	}
				
		
	public function edit_features_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->features_items = $this->model->getFeaturesRow("id ='$id'");
			$this->features_items['id'];
			
			require_once "views/admin/edit_features.php";
	} 
	public function edit_delivery_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->delivery_items = $this->model->getDeliveryRow("id ='$id'");
			$this->delivery_items['id'];
			echo $this->delivery_items['delivery_price'];
			require_once "views/admin/edit_delivery.php";
	}
	public function edit_drinks_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->drinks_items = $this->model->getDrinksRow("id ='$id'");
			$this->drinks_items['id'];
			//echo $this->delivery_items['delivery_price'];
			require_once "views/admin/edit_drinks.php";
	}
	public function edit_mainCourse_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->mainCourse_items = $this->model->getMainCourseRow("id ='$id'");
			$this->mainCourse_items['id'];
			//echo $this->delivery_items['delivery_price'];
			require_once "views/admin/edit_mainCourse.php";
	}
	public function edit_desserts_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->desserts_items = $this->model->getDessertsRow("id ='$id'");
			$this->desserts_items['id'];
			//echo $this->delivery_items['delivery_price'];
			require_once "views/admin/edit_desserts.php";
	}	
	public function edit_news_items(){
		
		$id = $_POST['id'];
		//echo $id;
			$this->news_items = $this->model->getNewsRow("id ='$id'");
			$this->news_items['id'];
			//echo $this->delivery_items['delivery_price'];
			require_once "views/admin/edit_news.php";
	}
	public function edit_features_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->features_p1text = $_POST['p1text'];
					$this->features_p2text = $_POST['p2text'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->features_image = addslashes(file_get_contents($image));	
					
				$this->insert_features = $this->model->updateFeatures("features_p1text = '$this->features_p1text' ","id = $this->id");
				$this->insert_features = $this->model->updateFeatures("features_p2text = '$this->features_p2text' ","id = $this->id");
				$this->insert_features = $this->model->updateFeatures(" features_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_features = $this->model->updateFeatures(" features_image='$this->features_image ' ","id = $this->id");
				$this->features_items = $this->model->selectAllFeaturesItems();
				
				 include_once 'views/admin/admin_features.php';
				}else{
				
					  echo '<script> alert("պարտադիր ընտրել նկար")</script>';
					  
				}
		}	

	}
	
	public function edit_delivery_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->delivery_text = $_POST['text'];
					$this->delivery_price = $_POST['price'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->delivery_image = addslashes(file_get_contents($image));	
					
				$this->insert_delivery = $this->model->updateDelivery("delivery_text = '$this->delivery_text' ","id = $this->id");
				$this->insert_delivery = $this->model->updateDelivery("delivery_price = '$this->delivery_price' ","id = $this->id");
				$this->insert_delivery = $this->model->updateDelivery("delivery_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_delivery = $this->model->updateDelivery("delivery_image='$this->delivery_image ' ","id = $this->id");
				$this->delivery_items = $this->model->selectAllDeliveryItems();
				
				 require_once 'views/admin/admin_delivery.php';
				}else{
				
					 echo '<script> alert("պարտադիր ընտրել նկար")</script>';
				}
		}	

	}
	
	public function edit_drinks_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->drinks_name = $_POST['name'];
					$this->drinks_price = $_POST['price'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->drinks_image = addslashes(file_get_contents($image));	
					
				$this->insert_drinks = $this->model->updateDrinks("drinks_name = '$this->drinks_name' ","id = $this->id");
				$this->insert_drinks = $this->model->updateDrinks("drinks_price = '$this->drinks_price' ","id = $this->id");
				$this->insert_drinks = $this->model->updateDrinks(" drinks_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_drinks= $this->model->updateDrinks(" drinks_image='$this->drinks_image ' ","id = $this->id");
				$this->drinks_items = $this->model->selectAllDrinksItems();
				
				 require_once 'views/admin/admin_drinks.php';
				}else{
				
					 echo '<script> alert("պարտադիր ընտրել նկար")</script>';
				}
		}	

	}
		
	public function edit_mainCourse_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->mainCourse_name = $_POST['name'];
					$this->mainCourse_price = $_POST['price'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->mainCourse_image = addslashes(file_get_contents($image));	
					
				$this->insert_mainCourse = $this->model->updateMainCourse("mainCourse_name = '$this->mainCourse_name' ","id = $this->id");
				$this->insert_mainCourse = $this->model->updateMainCourse("mainCourse_price = '$this->mainCourse_price' ","id = $this->id");
				$this->insert_mainCourse = $this->model->updateMainCourse("mainCourse_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_mainCourse = $this->model->updateMainCourse("mainCourse_image='$this->mainCourse_image ' ","id = $this->id");
				$this->mainCourse_items = $this->model->selectAllMainCourseItems();
				
				 require_once 'views/admin/admin_mainCourse.php';
				}else{
				
					 echo '<script> alert("պարտադիր ընտրել նկար")</script>';
				}
		}	

	}
		
	public function edit_desserts_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$this->desserts_name = $_POST['name'];
					$this->desserts_price = $_POST['price'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->desserts_image = addslashes(file_get_contents($image));	
					
				$this->insert_desserts = $this->model->updateDesserts("desserts_text = '$this->desserts_name' ","id = $this->id");
				$this->insert_desserts = $this->model->updateDesserts("desserts_price = '$this->desserts_price' ","id = $this->id");
				$this->insert_desserts = $this->model->updateDesserts("desserts_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_desserts = $this->model->updateDesserts("desserts_image='$this->desserts_image ' ","id = $this->id");
				$this->desserts_items = $this->model->selectAllDessertsItems();
				
				 require_once 'views/admin/admin_desserts.php';
				}else{
				
					 echo '<script> alert("պարտադիր ընտրել նկար")</script>';
				}
		}	

	}
	public function edit_news_inDatabase(){
		
		
		if(isset($_POST['submit_edit'])){
					
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$this->id = $_POST['id'];
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$this->target_file = basename($_FILES["image"]["name"]);
					$imageFileType = (pathinfo($this->target_file,PATHINFO_EXTENSION));
				
					$this->news_image = addslashes(file_get_contents($image));	
			
				$this->insert_news = $this->model->updateNews("news_image_name ='$this->target_file' ","id = $this->id");
				$this->insert_news = $this->model->updateNews("news_image='$this->news_image ' ","id = $this->id");
				$this->news_items = $this->model->selectAllNewsItems();
				
				 require_once 'views/admin/admin_news.php';
				}else{
				
					 echo '<script> alert("պարտադիր ընտրել նկար")</script>';
				}
		}	

	}
		
	public function admin_delivery(){
		
		session_start();
	if(isset($_SESSION['username']))
		{
					
		$this->delivery_items = $this->model->selectAllDeliveryItems();
		
		require_once 'views/admin/admin_delivery.php';
		}
		else{
			header("Location:adminform");
		}
		
	}
	
	public function admin_mainCourse(){
		
				
		session_start();
		if(isset($_SESSION['username']))
			{
			
				$this->mainCourse_items = $this->model->selectAllmainCourseItems();
				require_once 'views/admin/admin_mainCourse.php';
			}else{
					header("Location:adminform");
			}
		}
		
	public function admin_desserts(){
			session_start();
			if(isset($_SESSION['username']))
				{
					$this->desserts_items = $this->model->selectAllDessertsItems();
					require_once 'views/admin/admin_desserts.php';
				}else{
						header("Location:adminform");
				}
		}	
	public function add_delivery_item(){
		
				$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->delivery_text = $_POST['text'];
					$this->delivery_price = $_POST['price'];
					
					$delivery_image = addslashes(file_get_contents($image));
					
					$this->insert_deliveryImage = $this->model->insertDeliveryImage($target_file, $delivery_image, $this->delivery_text,$this->delivery_price );		
					$this->delivery_items = $this->model->selectAllDeliveryItems();					
					 require_once 'views/admin/admin_delivery.php';
					 
				}else{
				
					echo "file is not image";
				}
			
		}
		
	}
	public function add_desserts_item(){
				
				$target_file =  basename($_FILES["image"]["name"]);
		if(isset($_POST['submit'])){	
				$check = getimagesize($_FILES['image']['tmp_name']);
				if($check !==FALSE){
					
					$target_dir = "images/";	
					$image = $_FILES['image']['tmp_name'];
					$imageFileType = (pathinfo($target_file,PATHINFO_EXTENSION));
					$this->desserts_text = $_POST['name'];
					$this->desserts_price = $_POST['price'];
					
					$desserts_image = addslashes(file_get_contents($image));
					
					$this->insert_dessertsImage = $this->model->insertDessertsImage($target_file, $desserts_image, $this->desserts_text,$this->desserts_price );		
					$this->desserts_items = $this->model->selectAllDessertsItems();		
					
					 require_once 'views/admin/admin_desserts.php';
					 
				}else{
				
					echo "file is not image";
				}
			
		}
		
	}
	public function delete_menu(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_menu_item = $this->model->deleteMenu("id ='$id'");
		require_once 'views/admin/admin_page.php';
	}
	public function delete_features(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_features_item = $this->model->deleteFeatures("id ='$id'");
		require_once 'views/admin/admin_features.php';
	}
	
	public function delete_delivery(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_delivery_item = $this->model->deleteDelivery("id ='$id'");
		require_once 'views/admin/admin_delivery.php';
	}
	
	public function delete_drinks(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_drinks_item = $this->model->deleteDrinks("id ='$id'");
		require_once 'views/admin/admin_drinks.php';
	}
		
	public function delete_mainCourse(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_mainCourse_item = $this->model->deleteMainCourse("id ='$id'");
		require_once 'views/admin/admin_mainCourse.php';
	}
	public function delete_desserts(){
		
		$id = $_POST['id'];
		//var_dump($id);
		$this->delete_desserts_item = $this->model->deleteDesserts("id ='$id'");
		require_once 'views/admin/admin_desserts.php';
	}
}

?>