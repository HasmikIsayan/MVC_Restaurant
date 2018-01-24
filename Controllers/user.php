<?php 

class Controllers_User extends Models_Food{
	
	public $insert_menuImage; 
	public $menu_items;
	public $features_items;
	public $delivery_items;
	public $mainCourse_items;
	public $desserts_items;
	public $news_items;
	public $newsFirst_item;
	public $newsSecond_item;
	public $newsThird_item;
	
	function __construct(){
		$this->model =  new Models_Food();
	}
	public function index(){
		
		$this->newsFirst_item = $this->model->selectNewsFirstItem();
		$this->newsSecond_item = $this->model->selectNewsSecondItem();
		$this->newsThird_item = $this->model->selectNewsThirdItem();
		$this->menu_items = $this->model->selectAllMenuItem();
		$this->features_items = $this->model->selectAllFeaturesItem();
		$this->delivery_items = $this->model->selectAllDeliveryItems();
		$this->drinks_items = $this->model->selectAllDrinksItems();
		$this->mainCourse_items = $this->model->selectAllMainCourseItems();
		$this->desserts_items = $this->model->selectAllDessertsItems();
		$this->news_items = $this->model->selectAllNewsItems();
		
		require_once 'views/home/index.php';
	}
	public function sendmail(){

	if(isset($_POST['submit'])){
			
			$message = 'Name:' .$_POST['name']."\n"
					.'Email: '.$_POST['email'] ."\n"
					.'Subject: '.$_POST['subject'] ."\n"
					.'Message: '.$_POST['message'] ."\n";
			$subject = 'Message from Web pages';
			$page_mail = '19has91@gmail.com';
			$headers = "From: ".$page_mail." \r\n" .
						"CC: somebodyelse@example.com";
				
			mail($page_mail, $subject, $message,$headers);
				
			echo "Your mail has been sent successfuly ! Thank you for your feedback";
				
		}else{
				echo 'Mail does not sent! There was a problem.';
				
			}
			
		
		
		$this->newsFirst_item = $this->model->selectNewsFirstItem();
		$this->newsSecond_item = $this->model->selectNewsSecondItem();
		$this->newsThird_item = $this->model->selectNewsThirdItem();
		$this->menu_items = $this->model->selectAllMenuItem();
		$this->features_items = $this->model->selectAllFeaturesItem();
		$this->delivery_items = $this->model->selectAllDeliveryItems();
		$this->drinks_items = $this->model->selectAllDrinksItems();
		$this->mainCourse_items = $this->model->selectAllMainCourseItems();
		$this->desserts_items = $this->model->selectAllDessertsItems();
		$this->news_items = $this->model->selectAllNewsItems();
		
		require_once 'views/home/index.php';
	}
}