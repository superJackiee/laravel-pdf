<?php
      session_start();
      error_reporting(E_ALL);
       
      $rootDir = $_SERVER['DOCUMENT_ROOT']."/b2b/";
      $websitePath = "http://".$_SERVER['HTTP_HOST']."/b2b/";
      $server = $_SERVER['SERVER_NAME'];
      $rootDir = $_SERVER['DOCUMENT_ROOT']."/b2b/";
      $websitePath = "http://".$_SERVER['HTTP_HOST']."/b2b/";
      $keyid = "rzp_test_zUBm1aOQQzldFa";
      $secrect_key = "9xjQx5AMarMDaq71ZuDnXYmD";
      if ($server == "localhost") {
		$db_name = "cpixelsn_b2b";
		$db_host = "localhost";
		$db_pwd = "root"; 
            $db_user = "root";
            $secret_key = "4e9e601f867f31f8f8892fc54e6f1aeb";
            $issuer = "Trade APP";
            $keyid = "rzp_test_jyOnEZUHIJRWOc";
            $secrect_key = "2sk580tXhUWwh61SikyiFBRS";
	} else {
		$db_name = "cpixelsn_b2b";
		$db_host = "localhost";
		$db_pwd = "pU}tm?fOgZ%n";
            $db_user = "cpixelsn_b2b";
            $secret_key = "4e9e601f867f31f8f8892fc54e6f1aeb";
            $issuer = "Trade APP";
            $keyid = "rzp_test_jyOnEZUHIJRWOc";
            $secrect_key = "2sk580tXhUWwh61SikyiFBRS";
  	}

      ini_set('upload_max_filesize', '15M');
      ini_set('post_max_size', '15M');
      ini_set('max_input_time', 300);
      ini_set('max_execution_time', 300);
      
      require_once $rootDir.'database/db_config.php';
      require_once $rootDir."JWT/JWT.php";
      require_once $rootDir."JWT/BeforeValidException.php";
      require_once $rootDir."JWT/ExpiredException.php";
      require_once $rootDir."JWT/SignatureInvalidException.php";

      require_once $rootDir.'includes/utility.php'; 
      require_once $rootDir."includes/model.php";
      require_once $rootDir.'database/user.Class.php'; 
      require_once $rootDir.'database/address.Class.php'; 
      require_once $rootDir.'database/category.Class.php'; 
      require_once $rootDir.'database/product.Class.php';
      require_once $rootDir.'database/stock.Class.php';
      require_once $rootDir.'database/order.Class.php'; 
      
      
      define('SECRET_KEY', $secret_key);
      define('ISSUER', $issuer);

      define('DIR_CATEGORY_PATH', $rootDir.'media/categories/');
      define('WS_CATEGORY_PATH', $websitePath.'media/categories/');
      define('DIR_PRODUCT_PATH', $rootDir.'media/products/gallery/');
      define('WS_PRODUCT_PATH', $websitePath.'media/products/');
      define('WS_PRODUCT_GALLERY_PATH', WS_PRODUCT_PATH.'gallery/');
      define('DIR_USER_PATH', $rootDir.'media/users/');
      define('WS_USER_PATH', $websitePath.'media/users/');
      define('API_PRODUCT_PATH', $websitePath.'products/');

      define('RAZOR_KEY_ID', $keyid);
      define('RAZOR_SECRET_ID', $secrect_key);
      
      date_default_timezone_set("Asia/Kolkata"); 
?>
