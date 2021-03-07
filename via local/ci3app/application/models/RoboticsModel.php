<?php

class RoboticsModel extends CI_Model
{
    //Query Read All Data
    public function getAllData()
    {
        $query = $this->db->get('robotics');
        return $query->result_array();
    }

    //Query Read Pagination Search
    public function getData($limit, $start, $keyword=null)
    {
        if($keyword){
            $this->db->like('nama', $keyword);
        }

        return $this->db->get('robotics', $limit, $start)->result_array();
    }

    //Query Count Data
    public function countAllData()
    {
        $query = $this->db->get('robotics')->num_rows();
        return $query;
    }

    //Query Create
    public function createData()
    {
        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'wa' => $this->input->post('wa')
        ];

        $this->db->insert('robotics', $data);
    }

    //Query Update
    public function updateData($id)
    {
        $data = [
            'id' => $id,
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'wa' => $this->input->post('wa')
        ];

        $this->db->where('id', $id);
        $this->db->update('robotics', $data);
    }

    //Query Delete
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('robotics');
    }

    //Query Reset ID
    public function getReset()
    {
        $query = "SET @num := 0; UPDATE robotics SET id = @num := (@num+1);";
        $this->db->query($query);
    }

}