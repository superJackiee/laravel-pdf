<?php

	class Product {

		public function getActiveProducts($id = 0)
		{
			global $DB;

			$where = "";
			if ($id > 0) {
				$where = " AND p.category_id = '$id' ";
			}
			
			$objStock = new Stock();
			$stock = $objStock->getAllProductStockInformation();
			$product_array = $DB->query("SELECT p.id, p.title, p.desciption, CONCAT('".WS_PRODUCT_PATH."', p.thumbnail) AS thumbnail, p.price, p.discount, p.tax, c.title AS category_name, CONCAT(u.first_name, ' ' , u.last_name) AS name, u.mobile, u.email
										 FROM products p 
										 INNER JOIN categories c ON c.id = p.category_id
										 INNER JOIN users u ON u.id = p.user_id
										 WHERE p.status = 1 AND c.status = 1 AND p.deleted = 0 AND c.deleted = 0 AND u.status = 1 AND u.deleted = 0 ".$where."
										 ORDER BY p.title");
			
			
			$gallery_array = $this->getProductsGallery();
			$products = $this->getProductListing($product_array, $gallery_array, $stock);

			return $products;						 
		}

		public function searchProducts($searchString)
		{
			global $DB;

			$searchString = urldecode($searchString);
			$objStock = new Stock();
			$stock = $objStock->getProductStockInformation();
			$product_array = $DB->query("SELECT p.id, p.title, p.desciption, CONCAT('".WS_PRODUCT_PATH."', p.thumbnail) AS thumbnail, p.price, c.title AS category_name, CONCAT(u.first_name, ' ' , u.last_name) AS name, u.mobile, u.email
										 FROM products p 
										 INNER JOIN categories c ON c.id = p.category_id
										 INNER JOIN users u ON u.id = p.user_id
										 WHERE p.status = 1 AND c.status = 1 AND p.deleted = 0 AND c.deleted = 0 AND u.status = 1 AND u.deleted = 0 AND (p.title LIKE '%$searchString%' OR p.desciption LIKE '%$searchString%' OR c.title LIKE '%$searchString%') 
										 ORDER BY p.title");
			
			
			
			$gallery_array = $this->getProductsGallery();
			$products = $this->getProductListing($product_array, $gallery_array, $stock);
			return $products;						 
		}

		public function getProducts()
		{
			global $DB;
			return $DB->query("SELECT p.id, p.title, p.price, c.title AS category_name, p.status AS `status`, c.status AS cat_status, s.quantity, CONCAT(u.first_name, ' ' , u.last_name) AS seller 
						FROM products p 
						INNER JOIN categories c ON c.id = p.category_id 
						INNER JOIN users u ON u.id = p.user_id 
						LEFT JOIN stocks s ON s.product_id = p.id 
						WHERE c.deleted = 0 AND p.deleted = 0
						ORDER BY p.title ASC");
		}

		private function getProductsGallery()
		{
			global $DB;
			$gallery_array = $DB->query("SELECT product_id, CONCAT('".WS_PRODUCT_GALLERY_PATH."',product_id, '/', thumbnail) AS `thumbnail` FROM product_gallery WHERE `status` = 1");
			return $gallery_array;
		}

		private function getProductListing($product_array, $gallery_array, $stocks)
		{
			$products = array();
			foreach($product_array as $product) {

				$arr_gallery = array();
				foreach($gallery_array as $gallery) {

					if ($gallery["product_id"] == $product["id"]) {
						
						$arr_gallery[] = $gallery;
					}

				}
				$product["gallery"] = $arr_gallery;
				$products[] = $product;
			}

			$productswithStock = array();
			foreach($products as $product) {
				$product["stock"] = 0;
				foreach($stocks as $stock) {
				
					if ($stock["product_id"] == $product["id"]) {
						$product["stock"] = $stock["quantity"];
					}
				}

				$productswithStock[] = $product;
			}

			return $productswithStock;
		}

		public function addProduct($data, $gallery)
		{
			global $DB;
			$DB->query("INSERT INTO products (category_id, title, desciption, price, `user_id`, thumbnail) VALUES (?,?,?,?,?,?)", $data);
			$product_id = $DB->lastInsertId();
			$this->uploadProductImages($product_id, $gallery);
		}

		public function editProduct($data)
		{
			global $DB;
			$DB->query("UPDATE products SET category_id = ?, title = ?, desciption = ?, price = ? WHERE id = ?", $data);
		}

		private function uploadProductImages($product_id, $gallery)
		{
			global $DB;

			if (!is_dir(DIR_PRODUCT_PATH.$product_id)) {
				mkdir(DIR_PRODUCT_PATH.$product_id, 0777);
			}

			$image_number = 1;
			$file_counter = 0;
			$thumbnail_name = "";
			while($file_counter < count($gallery["name"])) {

				$extension = getFileExt($gallery['name'][$file_counter]);
				$filename = "$image_number".".".$extension;
				$filePath = DIR_PRODUCT_PATH.$product_id."/".$filename;
				if (move_uploaded_file($gallery['tmp_name'][$file_counter], $filePath)) {

					$image_number += 1;
					$DB->query("INSERT INTO product_gallery (product_id, thumbnail) VALUES (?,?)", array($product_id, $filename));
					if ($thumbnail_name == "") {
						$thumbnail_name = $filename;
					}
				}

				$file_counter += 1;
			}

			if ($thumbnail_name != "") {

				$DB->query("UPDATE products SET thumbnail = ? WHERE id = ?", array($thumbnail_name, $product_id));
			}
		}

		public function getProductById($id)
		{
			global $DB;
			return $DB->query("SELECT `id`, `category_id`, `title`, `desciption`, `price` FROM products WHERE id = ?", array($id));
		}
	}
?>