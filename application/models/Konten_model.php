<?php

class Konten_model extends CI_Model
{
    public function get_carosel(){
        
            $result = $this->db->query("SELECT * FROM carosel;");
            return $result;
        
    }
    public function add_carosel($namafoto)
    {
        $data = [
            'image' => $namafoto,
        ];
        $this->db->insert('carosel', $data);
    }

    public function delete_carosel($id_carosel)
    {
        $this->db->where('id_carosel', $id_carosel);
        $this->db->delete('carosel');
    }


} ?>