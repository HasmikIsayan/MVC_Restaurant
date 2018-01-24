<?php

$route = array(

	'index'=>'Controllers_User@index',
	'admin/index' =>'Controllers_Admin@index',
	'adminform'=> 'Controllers_Admin@login',
	'admin_page'=>'Controllers_Admin@check_admin',
	'add_menu'=>'Controllers_Admin@add_menu_item',
	'menu_edit'=>'Controllers_Admin@edit_menu_items',
	'edit_menu'=>'Controllers_Admin@edit_items_database',
	'admin_menu'=>'Controllers_Admin@admin_menu',
	'delete_menu'=>'Controllers_Admin@delete_menu',
	
	'admin_features'=> 'Controllers_Admin@admin_features',
	'add_features'=>'Controllers_Admin@add_features_item',
	'edit_features'=>'Controllers_Admin@edit_features_items',
	'edit_features_item'=>'Controllers_Admin@edit_features_inDatabase',
	'delete_features'=>'Controllers_Admin@delete_features',
	
	'admin_delivery'=>'Controllers_Admin@admin_delivery',
	'add_delivery'=>'Controllers_Admin@add_delivery_item',
	'delete_delivery'=>'Controllers_Admin@delete_delivery',
	'edit_delivery'=>'Controllers_Admin@edit_delivery_items',
	'edit_delivery_item'=>'Controllers_Admin@edit_delivery_inDatabase',
	
	'admin_drinks'=>'Controllers_Admin@admin_drinks',
	'add_drinks'=>'Controllers_Admin@add_drinks_item',
	'delete_drinks'=>'Controllers_Admin@delete_drinks',
	'edit_drinks'=>'Controllers_Admin@edit_drinks_items',
	'edit_drinks_item'=>'Controllers_Admin@edit_drinks_inDatabase',
	
	'admin_mainCourse'=>'Controllers_Admin@admin_mainCourse',
	'add_mainCourse'=>'Controllers_Admin@add_mainCourse_item',
	'delete_mainCourse'=>'Controllers_Admin@delete_mainCourse',
	'edit_mainCourse'=>'Controllers_Admin@edit_mainCourse_items',
	'edit_mainCourse_item'=>'Controllers_Admin@edit_mainCourse_inDatabase',
	
	'admin_desserts'=>'Controllers_Admin@admin_desserts',
	'add_desserts'=>'Controllers_Admin@add_desserts_item',
	'delete_desserts'=>'Controllers_Admin@delete_desserts',
	'edit_desserts'=>'Controllers_Admin@edit_desserts_items',
	'edit_desserts_item'=>'Controllers_Admin@edit_desserts_inDatabase',
	
	'admin_news'=>'Controllers_Admin@admin_news',
	'add_news'=>'Controllers_Admin@add_news_item',
	//'delete_desserts'=>'Controllers_Admin@delete_desserts',
	'edit_news'=>'Controllers_Admin@edit_news_items',
	'edit_news_item'=>'Controllers_Admin@edit_news_inDatabase',
	
	'admin_menu_list'=>'Controllers_Admin@admin_menu_list',
	'add_menu_list'=>'Controllers_Admin@add_menu_list_item',
	
	
	'sendmail'=>'Controllers_User@sendmail',
	'logout'=>'Controllers_Admin@logout',
	
);
	