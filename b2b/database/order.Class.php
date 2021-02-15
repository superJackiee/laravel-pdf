<?php

	class Orders {

		 public function saveOrder($cart, $token)
		 {
			global $DB;

			$objStock = new Stock();
			$user = new User();
			$user_id = $user->getUserIdByToken($token);

			$grand_total = ($cart->total - $cart->discount) + $cart->tax;
			$DB->query("INSERT INTO `orders`(`user_id`, `total`, `tax`, `discount`, `grand_total`, `order_number`, `address_id`) 
									  VALUES(?,?,?,?,?,?,?)", array($user_id, $cart->total, $cart->tax, $cart->discount, $grand_total, $this->getOrderNumber(16), $cart->address_id));
			$order_id = $DB->lastInsertId();
			$item_array = $cart->item;
			
			foreach ($item_array as $item) {

				$objStock->createStockLog($item->product_id, $item->quantity, $user_id, $order_id, "--- User Ordered ---");
				$objStock->deductProductfromStock($item->product_id, $item->quantity);
				$grand_total = ($item->total - $item->discount) + $item->tax;
				$DB->query("INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `total`, `tax`, `discount`, `grand_total`) 
							VALUES (?,?,?,?,?,?,?)", array($order_id, $item->product_id, $item->quantity, $item->total, $item->tax, $item->discount, $grand_total));
			}

			return $order_id;
		}

		public function updateOrder($order_id, $payment_id)
		{
			global $DB;
			return $DB->query("UPDATE `orders` SET razor_payment_id = ?, `status` = 0, `updated_at` = NOW() WHERE `id` = ?", array($payment_id, $order_id));
		}

		private function getOrderNumber($size) {

			$alpha_key = '';
			$keys = range('A', 'Z');
			
			for ($i = 0; $i < 8; $i++) {
				$alpha_key .= $keys[array_rand($keys)];
			}
			
			$length = $size - 8;
			
			$key = '';
			$keys = range(0, 9);
			
			for ($i = 0; $i < $length; $i++) {
				$key .= $keys[array_rand($keys)];
		   }
		   
		   $order_string = substr(str_shuffle($alpha_key . $key), 0, $size);
		   $arr = array();
		   $arr[] = substr($order_string, 0, 4);
		   $arr[] = substr($order_string, 4, 4);
		   $arr[] = substr($order_string, 8, 4);
		   $arr[] = substr($order_string, 12, 4);
		
		   return join("-", $arr);
		}

		public function getOrder($order_id)
		{
			global $DB;
			$row = $DB->query("SELECT od.order_number, od.grand_total, od.tax, od.discount, CONCAT(u.first_name, ' ', u.last_name) AS `name`
									  FROM `orders` od 
									  INNER JOIN users u ON u.id = od.user_id 
									  WHERE od.id = ?", array($order_id));
			if (count($row)) {
				$row[0]["items"] = $this->getOrderDetail($order_id);
				return $row;
			} 
		}

		public function getOrderDetail($order_id)
		{
			global $DB;
			return $DB->query("SELECT  od.grand_total, od.tax, od.discount, p.title 
						FROM order_detail od
						INNER JOIN products p ON p.id = od.product_id
						WHERE od.order_id = ? AND od.status = 1 AND od.deleted = 0", array($order_id));
		}

		public function getAllOrders($filter_query = "")
		{
			global $DB;
			$orders = $DB->query("SELECT o.id, o.razor_payment_id, o.order_number, Concat(u.first_name, ' ', u.last_name) AS name, u.email, u.mobile, 
							      od.quantity, p.title, o.total, o.grand_total, o.tax, o.discount, 
							      o.status, od.status, o.refunded, o.address_id, o.payment_done, 
							      ua.address, c.city, s.name AS state_name, ua.pincode,
								  od.total AS od_total, od.grand_total AS od_grand_total, od.tax AS od_tax, 
								  od.discount AS od_discount, DATE_FORMAT(o.updated_at, '%d %b %Y %h:%i %p') AS updated_at 
							      FROM orders AS o
							      INNER JOIN order_detail od ON od.order_id = o.id
							      INNER JOIN products p ON p.id = od.product_id
							      INNER JOIN users u ON u.id = o.user_id
							      INNER JOIN user_addresses ua ON ua.id = o.address_id
							      INNER JOIN states s ON s.id = ua.state_id
							      INNER JOIN cities c ON c.id = ua.city_id
							      WHERE o.deleted = 0 AND od.deleted = 0 ". $filter_query);
			
			$order_data = array();
			foreach ($orders as $order) {

				$product = array("title" => $order["title"], 
								 "quantity" => $order["quantity"], 
								 "total" => $order["od_total"],
								 "grand_total" => $order["od_grand_total"], 
								 "tax" => $order["od_tax"], 
								 "discount" => $order["od_discount"]);
				if (key_exists($order["id"], $order_data)) {
					
					$products = $order_data[$order["id"]]["products"];
					$products[] = $product;
					$order_data[$order["id"]]["products"] = $products;

				} else {

					$order_data[$order["id"]] = array("razor_payment_id" => $order["razor_payment_id"], "order_number" => $order["order_number"],
														"user_name" => $order["name"],
														"email" => $order["email"],
														"mobile" => $order["mobile"],
												      "address" => $order["address"],
												      "city" => $order["city"],
												      "state_name" => $order["state_name"],
												      "pincode" => $order["pincode"],
												      "payment_done" => $order["payment_done"],
												      "total" => $order["total"],
												      "grand_total" => $order["grand_total"],
												      "tax" => $order["tax"],
													  "discount" => $order["discount"], 
													  "updated_at" => $order["updated_at"], 
													  "products" => array($product));
				}								  
			}

			$keys = array_keys($order_data);
			

			$order_array = array();
			foreach ($keys as $key) {
				$data = $order_data[$key];
				$data["order_id"] = $key; 

				$order_array[] = $data;
			}

			return $order_array; 
		}
	}
?>