<?php

	class Category {

		public function addCategory($catInfo, $adding, $file = array()) {
			global $DB;
			
			if ($adding == false) {
				 
				$category_id = $catInfo[0];
				$name = addslashes($catInfo[1]);
				$parent = $catInfo[2];
				$DB->query("UPDATE categories SET `title`= ? , `parent` = ? WHERE `id` = ?", array($name, $parent, $category_id));
			} else {
				$DB->query("INSERT INTO categories(`title`,`parent`) VALUES(?,?)", $catInfo);
				$category_id = $DB->lastInsertId();
			}

			if (isset($file["name"])) {

				$extension = getFileExt($file['name']);
				$filename = $category_id.".".$extension;
				$filePath = DIR_CATEGORY_PATH.$filename;

				if (move_uploaded_file($file['tmp_name'], $filePath)) {

					//$objThumbnail = new Thumbnail();
					//$tmb = $objThumbnail->resize($filePath, '200', '200');
					//unlink($filePath);
					$DB->query("UPDATE categories SET `thumbnail`= ? WHERE `id` = ?", array($filename, $category_id));
				}
			}
		}

		public function getActiveParentCategories()
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `parent`, CONCAT('".WS_CATEGORY_PATH."', `thumbnail`) AS thumbnail, CONCAT('".API_PRODUCT_PATH."', `id`) AS 'product_link' 
							   FROM categories 
							   WHERE `deleted` = 0 AND `status` = 1 
							   ORDER BY title ASC");
		}

		public function getParentCategories()
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `status` FROM categories WHERE `parent` = 0 AND `deleted` = 0 ORDER BY title ASC");
		}

		public function getAllSubCategories()
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `parent`, `status` FROM categories WHERE `deleted` = 0 AND `parent` > 0 ORDER BY title ASC");
		}

		public function getAllSubCategoriesById($parent)
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `status` FROM categories WHERE `parent` = ? AND `deleted` = 0 ORDER BY title ASC", array($parent));
		}

		public function getAllCategories()
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `thumbnail`, `parent`, `status` FROM categories WHERE `deleted` = 0 ORDER BY title ASC");
		}

		public function getCategoryById($id)
		{
			global $DB;
			return $DB->query("SELECT `id`, `title`, `parent`, `thumbnail`, `status` FROM categories WHERE id = ?", array($id));
		}

		public function deleteCategory($category_id) {
			global $DB;
			return $DB->query("UPDATE categories SET deleted = 1 WHERE id = ?", array($category_id));
		}

		public function activeInactiveCategory($category_id, $status) {
			global $DB;
			return $DB->query("UPDATE categories SET `status` = ?, updated_at = NOW() WHERE id = ?", array($status, $category_id));
		}
	}
?>