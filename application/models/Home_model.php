<?php
class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_nominee($data){
        $query =  $this->db->insert('mto_nominees', $data);
        return true; 
        // return $this->db->insert_id();
    }

    public function create_nomination($data){
        $query =  $this->db->insert('mto_categories', $data);
        return true; 
    }

    public function addVote($data){
        $query =  $this->db->insert('mto_votes', $data);
        return true; 
    }

    public function fetchNominees(){
        $this->db->where('mton_visible', 1);
        $query = $this->db->get('mto_nominees');
        return $query->result_array();
    }

    public function deleteNominee($nominee){
        $this->db->set('mton_visible', 0);
        $this->db->where('mton_rand', $nominee);
        $this->db->update('mto_nominees');
        return TRUE;
    }

    public function fetchNominations(){
        $this->db->where('mtoc_visible', 1);
        $query = $this->db->get('mto_categories');
        return $query->result_array();
    }

    public function checkNomination($name){
        $this->db->where('mtoc_name', $name);
        $query = $this->db->get('mto_categories');
        return $query->result_array();
    }

    public function fetchNominee($rand){
        $this->db->where('mton_rand', $rand);
        $query = $this->db->get('mto_nominees');
        return $query->row_array();
    }

    public function hour(){
        $this->db->select('mtos_hour');
        $query = $this->db->get('mto_settings');
        $res = $query->row_array();
        return $res['mtos_hour'];
    }

    public function fetchCategory($id){
        $this->db->select('mtoc_name');
        $this->db->where('mtoc_rand', $id);
        $query = $this->db->get('mto_categories');
        $res = $query->row_array();
        return $res;
    }

    public function fetchVote($category,$ip){
        $this->db->where('mtov_category', $category);
        $this->db->where('mtov_ip', $ip);
		$this->db->order_by("mtov_id", "desc");
		$this->db->limit(1);
        $query = $this->db->get('mto_votes');
        return $query->row_array();
    }

    public function updateHour($hour){
        $this->db->set('mtos_hour', $hour);
        $this->db->where('mtos_id', 1);
        $this->db->update('mto_settings');
        return TRUE;
    }

    public function fetchVotes(){
        $this->db->select('*');
        $this->db->join('mto_categories', 'mto_categories.mtoc_rand = mto_votes.mtov_category');
        $this->db->group_by('mtov_category');
        $query = $this->db->get('mto_votes');
        return $query->result_array();
    }

    public function voteCount($nominee,$category){
        $this->db->where('mtov_category', $category);
        $this->db->where('mtov_nominee', $nominee);
        $query = $this->db->get('mto_votes');
        return $query->num_rows();
    }
}