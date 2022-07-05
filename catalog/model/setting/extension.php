<?php
class ModelSettingExtension extends Model {
	public function getExtensions($type, $code = null) {
	    $str = "SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = '" . $this->db->escape($type) . "'";

	    if($code){
            $str .= " AND `code` = '" . $this->db->escape($code) . "'";
        }

		$query = $this->db->query($str);

		return $query->rows;
	}

}