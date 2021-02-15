<?php

	class Stock {

		public function updateStock($product_id, $seller_id, $quantity) {

			global $DB;

			$this->createStockLog($product_id, $quantity, $seller_id, null, "--- PURCHASED ---");

			return $DB->query("INSERT INTO stocks(`product_id`, `user_id`, `quantity`) VALUES (?,?,?) ON DUPLICATE KEY UPDATE `product_id` = ?, `user_id` = ?, `quantity` = ?", array($product_id, $seller_id, $quantity, $product_id, $seller_id, $quantity));
		}

		public function getStockList()
		{
			global $DB;
			return $DB->query("SELECT p.id, p.title, CONCAT(u.first_name, ' ' , u.last_name) AS seller, s.quantity, u.id AS `user_id`
							   FROM products AS p 
							   LEFT JOIN stocks AS s ON s.product_id = p.id
							   LEFT JOIN users AS u ON u.id = p.user_id 
							   ORDER BY p.title ASC");
		}
		
		public function getProductStockInformation($product_ids)
		{
			global $DB;
			return $DB->query("SELECT SUM(quantity) AS quantity, product_id 
							   FROM stocks 
							   WHERE product_id IN (".implode(",",$product_ids).") 
							   AND status = 1 AND deleted = 0 GROUP BY product_id");
		}

		public function createStockLog($product_id, $quantity, $user_id, $order_id, $reason)
		{
			global $DB;
			$DB->query("INSERT INTO stock_log (product_id, `user_id`, quantity, order_id, reason) VALUE(?,?,?,?,?)", array($product_id, $user_id, $quantity, $order_id, $reason));
		}

		public function deductProductfromStock($product_id, $quantity)
		{
			global $DB;
			$stock_info = $DB->query("SELECT * FROM stocks WHERE product_id = ? AND quantity > 0 ORDER BY quantity DESC LIMIT 0, 1", array($product_id))[0];
			$updated_qty = $stock_info["quantity"] - $quantity;
			$DB->query("UPDATE stocks SET updated_at = NOW(), quantity = ? WHERE `user_id` = ? AND product_id = ?", array($updated_qty, $stock_info["user_id"], $stock_info["product_id"]));
		}

		public function getAllProductStockInformation()
		{
			global $DB;
			$stock = $DB->query("SELECT SUM(quantity) AS quantity, product_id 
								 FROM stocks 
								 WHERE status = 1 AND deleted = 0 
								 GROUP BY product_id");
			return $stock;
		}
	}
?>