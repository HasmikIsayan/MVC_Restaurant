<?php

class Models_Food extends Models_Db{
	
	public $select_all_menu_items;
	public $select_all_menu_item;
	public $items;
	public $select_all_features_items;
	public $select_all_features_item;
	public $select_all_delivery_items;
	public $select_all_delivery_item;
	public $select_all_drinks_items;
	public $select_all_drinks_item;
	public $select_all_desserts_items;
	public $select_all_news_items;
	public $select_all_menu_list_items;
	public $select_all_newsFirst_item;
	public $select_all_newsSecond_item;
	public $select_all_newsThird_item;
	public $delete_menu;
	public $delete_fea;
	public $delete_del;
	public $delete_drink;
	public $delete_mainCourse;
	public $delete_desserts;
	
	function  __construct(){
		$this->db = new Models_Db();
		}
		
	 public function getUserRows($where) {

			//$this->user = $db->getRow('users',$where);
			//var_dump($this->db->getRows('users',$where));
    }
    public function getMenuRow($where) {
		
        $this->items = $this->db->getRow('menu',$where);
		return $this->items;
	       
    }
	public function getAdminRow($where){
		
		$this->items =  $this->db->getRow('registr',$where);
		return $this->items;
	}
	public function getFeaturesRow($where) {
		
        $this->items = $this->db->getRow('features',$where);
		return $this->items;
	       
    }
	public function getDeliveryRow($where) {
		
        $this->items = $this->db->getRow('delivery',$where);
		return $this->items;
	       
    }
	public function getDrinksRow($where) {
		
        $this->items = $this->db->getRow('drinks',$where);
		return $this->items;
	       
    }
	public function getMainCourseRow($where) {
		
        $this->items = $this->db->getRow('main_course',$where);
		return $this->items;
	       
    }
	public function getDessertsRow($where) {
		
        $this->items = $this->db->getRow('desserts',$where);
		return $this->items;
	       
    }
	public function getNewsRow($where) {
		
        $this->items = $this->db->getRow('news',$where);
		return $this->items;
	       
    }
    public function updateMenu($data, $where){
		
        $this->update_menu = $this->db->update('menu',$data, $where);
		//return  $this->update_menu;
    }
	public function updateFeatures($data, $where){
		
        $this->update_features = $this->db->update('features',$data, $where);
		//return  $this->update_menu;
    }
	public function updateDelivery($data, $where){
		
        $this->update_delivery = $this->db->update('delivery',$data, $where);
		//return  $this->update_menu;
    }
   public function updateDrinks($data, $where){
		
        $this->update_drinks = $this->db->update('drinks',$data, $where);
		//return  $this->update_menu;
    }
   public function updateMainCourse($data, $where){
		
        $this->update_mainCourse = $this->db->update('main_course',$data, $where);
		//return  $this->update_menu;
    }	
   public function updateDesserts($data, $where){
		
        $this->update_desserts = $this->db->update('desserts',$data, $where);
		//return  $this->update_menu;
    }
   public function updateNews($data, $where){
		
        $this->update_news = $this->db->update('news',$data, $where);
		//return  $this->update_menu;
    }	
    public function countNumUser($where) {
        $this->countNum('users',$where);
    }
	
	public function selectAllMenuItems(){
		
		$this->select_all_menu_items = $this->db->selectTable('menu');
		return $this->select_all_menu_items;
	}
	public function selectAllFeaturesItems(){
		
		$this->select_all_features_items = $this->db->selectTable('features');
		return $this->select_all_features_items;
	}
	
	public function selectAllDeliveryItems(){
		
		$this->select_all_delivery_items = $this->db->selectTable('delivery');
		return $this->select_all_delivery_items;
	}
	
	public function selectAllDrinksItems(){
		
		$this->select_all_drinks_items = $this->db->selectTable('drinks');
		return $this->select_all_drinks_items;
	}
	
	public function selectAllMainCourseItems(){
		
		$this->select_all_mainCourse_items = $this->db->selectTable('main_course');
		return $this->select_all_mainCourse_items;
	}
	public function selectAllDessertsItems(){
		
		$this->select_all_desserts_items = $this->db->selectTable('desserts');
		return $this->select_all_desserts_items;
	}
	
	public function selectAllNewsItems(){
		
		$this->select_all_news_items = $this->db->selectTable('news');
		return $this->select_all_news_items;
	}
	public function selectAllMenuListItems(){
		
		$this->select_all_menu_list_items = $this->db->selectTable('menu_list');
		return $this->select_all_menu_list_items;
	}
	public function selectAllMenuItem(){
		
		$this->select_all_menu_item = $this->db->getRow('menu', "id = '1'");
		return $this->select_all_menu_item;
	}
	public function selectAllFeaturesItem(){
		
		$this->select_all_features_item = $this->db->getRow('features', "id = '1'");
		return $this->select_all_features_item;
	}
	public function selectNewsFirstItem(){
		
		$this->select_all_newsFirst_item = $this->db->getRow('news', "id = '1'");
		return $this->select_all_newsFirst_item;
	}
	public function selectNewsSecondItem(){
		
		$this->select_all_newsSecond_item = $this->db->getRow('news', "id = '2'");
		return $this->select_all_newsSecond_item;
	}
	public function selectNewsThirdItem(){
		
		$this->select_all_newsThird_item = $this->db->getRow('news', "id = '3'");
		return $this->select_all_newsThird_item;
	}
	
	public function insertMenuImage($name,$image,$text1,$text2){
		
		$this->insert_menuImage = $this->db->insert("INSERT INTO menu ( menu_image_name,menu_image, menu_p1text, menu_p2text) VALUES ('$name', '$image', '$text1', '$text2')" );
			
	}
	public function insertFeaturesImage($name,$image,$text1,$text2){
		
		$this->insert_featuresImage = $this->db->insert("INSERT INTO features ( features_image_name,features_image, features_p1text, features_p2text) VALUES ('$name', '$image', '$text1', '$text2')" );
				
	}
	public function insertDeliveryImage($name,$image,$text,$price){
		
		$this->insert_deliveryImage = $this->db->insert("INSERT INTO delivery ( delivery_image_name, delivery_image, delivery_text, delivery_price) VALUES ('$name', '$image', '$text', '$price')" );
		
	}
	public function insertDrinksImage($name,$image,$text,$price){
		
		$this->insert_drinksImage = $this->db->insert("INSERT INTO drinks ( drinks_image_name, drinks_image, drinks_name, drinks_price) VALUES ('$name', '$image', '$text', '$price')" );
		
	}
	public function insertMainCourseImage($name,$image,$text,$price){
		
		$this->insert_mainCourseImage = $this->db->insert("INSERT INTO main_course ( mainCourse_image_name, mainCourse_image,mainCourse_name, mainCourse_price) VALUES ('$name', '$image', '$text', '$price')" );
		
	}
	public function insertDessertsImage($name,$image,$text,$price){
		
		$this->insert_dessertsImage = $this->db->insert("INSERT INTO desserts ( desserts_image_name, desserts_image, desserts_text, desserts_price) VALUES ('$name', '$image', '$text', '$price')" );
		
	}
	public function insertNewsImage($name,$image){
		
		$this->insert_news = $this->db->insert("INSERT INTO news ( news_image_name, news_image) VALUES ('$name', '$image')" );
		
	}
	public function insertMenuListItem($text){
		
		$this->insert_menu_list = $this->db->insert("INSERT INTO menu_list ( admin_menu_list) VALUES ('$text')" );

	}
	public function deleteMenu($where){
		
		$this->delete_menu = $this->db->delete("Delete from menu where $where");
	}
	
	public function deleteFeatures($where){
		
		$this->delete_fea = $this->db->delete("Delete from features where $where");
	}
	
	public function deleteDelivery($where){
		
		$this->delete_del = $this->db->delete("Delete from delivery where $where");
	}
	

	public function deleteDrinks($where){
		
		$this->delete_drink = $this->db->delete("Delete from drinks where $where");
	}
	public function deleteMainCourse($where){
		
		$this->delete_mainCourse = $this->db->delete("Delete from main_course where $where");
	}
	public function deleteDesserts($where){
		
		$this->delete_desserts = $this->db->delete("Delete from desserts where $where");
		
	}
	
		
}




 ?>