<?php
class ModelMarketingPromo extends Model {
	public function addPromo($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "promo SET 
		    name = '" . $this->db->escape($data['name']) . "',
		      discount = '" . (float)$data['discount'] . "',
		        image = '" . $data['image'] . "',
		           date_start = '" . strtotime($this->db->escape($data['date_start'])) . "',
		            date_end = '" . strtotime($this->db->escape($data['date_end'])) . "',
		               status = '" . (int)$data['status'] . "', date_added = NOW()");

		$promo_id = $this->db->getLastId();

        foreach ($data['promo_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "promo_description SET promo_id = '" . (int)$promo_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
        }

		if (isset($data['promo_product'])) {
			foreach ($data['promo_product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promo_product SET promo_id = '" . (int)$promo_id . "', product_id = '" . (int)$product_id . "'");
			}
		}

		if (isset($data['promo_category'])) {
			foreach ($data['promo_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promo_category SET promo_id = '" . (int)$promo_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		return $promo_id;
	}

	public function editPromo($promo_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "promo SET name = '" . $this->db->escape($data['name']) . "', discount = '" . (float)$data['discount'] . "', image = '" . $data['image'] . "', date_start = '" . strtotime($this->db->escape($data['date_start'])) . "', date_end = '" . strtotime($this->db->escape($data['date_end'])) . "', status = '" . (int)$data['status'] . "' WHERE promo_id = '" . (int)$promo_id . "'");

        $this->db->query("DELETE FROM " . DB_PREFIX . "promo_description WHERE promo_id = '" . (int)$promo_id . "'");

        foreach ($data['promo_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "promo_description SET promo_id = '" . (int)$promo_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
        }
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "promo_product WHERE promo_id = '" . (int)$promo_id . "'");

		if (isset($data['promo_product'])) {
			foreach ($data['promo_product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promo_product SET promo_id = '" . (int)$promo_id . "', product_id = '" . (int)$product_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "promo_category WHERE promo_id = '" . (int)$promo_id . "'");

		if (isset($data['promo_category'])) {
			foreach ($data['promo_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promo_category SET promo_id = '" . (int)$promo_id . "', category_id = '" . (int)$category_id . "'");
			}
		}
	}

	public function deletePromo($promo_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "promo WHERE promo_id = '" . (int)$promo_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "promo_product WHERE promo_id = '" . (int)$promo_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "promo_category WHERE promo_id = '" . (int)$promo_id . "'");
//		$this->db->query("DELETE FROM " . DB_PREFIX . "promo_history WHERE promo_id = '" . (int)$promo_id . "'");
	}

	public function getPromo($promo_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "promo WHERE promo_id = '" . (int)$promo_id . "'");

		return $query->row;
	}

    public function getPromoDescriptions($promo_id) {
        $promo_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_description WHERE promo_id = '" . (int)$promo_id . "'");

        foreach ($query->rows as $result) {
            $promo_description_data[$result['language_id']] = array(
                'name'             => $result['name'],
                'description'      => $result['description'],
            );
        }

        return $promo_description_data;
    }

	public function getPromoByCode($code) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "promo WHERE code = '" . $this->db->escape($code) . "'");

		return $query->row;
	}

	public function getPromos($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "promo";

		$sort_data = array(
			'name',
			'code',
			'discount',
			'date_start',
			'date_end',
			'status'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getPromoProducts($promo_id) {
		$Promo_product_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_product WHERE promo_id = '" . (int)$promo_id . "'");

		foreach ($query->rows as $result) {
			$Promo_product_data[] = $result['product_id'];
		}

		return $Promo_product_data;
	}

	public function getPromoCategories($promo_id) {
		$Promo_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_category WHERE promo_id = '" . (int)$promo_id . "'");

		foreach ($query->rows as $result) {
			$Promo_category_data[] = $result['category_id'];
		}

		return $Promo_category_data;
	}

	public function getTotalPromos() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promo");

		return $query->row['total'];
	}

	public function getPromoHistories($promo_id, $start = 0, $limit = 10) {
		if ($start < 0) {
			$start = 0;
		}

		if ($limit < 1) {
			$limit = 10;
		}

		$query = $this->db->query("SELECT ch.order_id, CONCAT(c.firstname, ' ', c.lastname) AS customer, ch.amount, ch.date_added FROM " . DB_PREFIX . "promo_history ch LEFT JOIN " . DB_PREFIX . "customer c ON (ch.customer_id = c.customer_id) WHERE ch.promo_id = '" . (int)$promo_id . "' ORDER BY ch.date_added ASC LIMIT " . (int)$start . "," . (int)$limit);

		return $query->rows;
	}

	public function getTotalPromoHistories($promo_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promo_history WHERE promo_id = '" . (int)$promo_id . "'");

		return $query->row['total'];
	}
}