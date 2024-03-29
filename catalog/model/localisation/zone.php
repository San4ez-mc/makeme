<?php

class ModelLocalisationZone extends Model
{
    public function getZone($zone_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE zone_id = '" . (int)$zone_id . "' AND status = '1'");

        return $query->row;
    }

    public function getZones($q, $limit = 10)
    {
        $where = '';
        if (strlen($q) > 0) {
            $where = ' AND (name = "' . $q . '" OR name LIKE "%' . $q . '%" )';
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE `name` <> '' AND status = '1' " . $where . " ORDER BY name LIMIT " . $limit);
        return $query->rows;
    }

    public function getZonesByCountryId($country_id)
    {
        $zone_data = $this->cache->get('zone.' . (int)$country_id);

        if (!$zone_data) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE country_id = '" . (int)$country_id . "' AND status = '1' ORDER BY name");

            $zone_data = $query->rows;

            $this->cache->set('zone.' . (int)$country_id, $zone_data);
        }

        return $zone_data;
    }
}