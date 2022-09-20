<?php
class Job_model extends CI_Model{

    function searchJob($title, $location, $categori){
        $data_filter = array();

        if(! empty($title)) {
            $data_filter[] = "j.title like '%$title%'";
        }
        if(! empty($location)) {
            $data_filter[] = "j.id_provinces='$location'";
        }
        if(! empty($categori)) {
            $data_filter[] = "j.id_category='$categori'";
        }
        $filter ='';
        if (count($data_filter) > 0) {
            $filter = " WHERE " . implode(' AND ', $data_filter);
        }
        
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = j.id_provinces
        $filter ";

        // echo '<pre>';
        // print_r($sql);
        // echo '</pre>';
        // die;

    	$result = $this->db->query($sql);
        return $result;
    }

    function searchJobPerpage($title, $location, $categori, $limit, $offset){
        $data_filter = array();

        if(! empty($title)) {
            $data_filter[] = "j.title like '%$title%'";
        }
        if(! empty($location)) {
            $data_filter[] = "j.id_provinces='$location'";
        }
        if(! empty($categori)) {
            $data_filter[] = "j.id_category='$categori'";
        }
        $filter ='';
        if (count($data_filter) > 0) {
            $filter = " WHERE " . implode(' AND ', $data_filter);
        }
        
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = j.id_provinces
        $filter 
        LIMIT $limit OFFSET $offset";

        $result = $this->db->query($sql);
        return $result;
    }

    function rekomJob(){
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = LEFT(c.address, 2)
        order by j.created_at desc limit 6";

    	$result = $this->db->query($sql)->result();
        return $result;
    }

    function ShowJob($slug){
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi,t.name as type FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = j.id_provinces
        left join type t on t.id = j.id_type
        where j.slug = '$slug' GROUP BY j.id LIMIT 1";
    	$result = $this->db->query($sql)->result();
        return $result;
    }

    function ApplyJob($id_user, $id_job){
        $sql = "SELECT * FROM apply WHERE id_user = $id_user AND id_job = $id_job";
    	$result = $this->db->query($sql)->result();
        return $result;
    }

    function ProsesJob($id_user){
        $sql = "SELECT a.status,b.title,c.name as company,d.username FROM apply a
        LEFT JOIN job b ON a.id_job = b.id
        LEFT JOIN company c ON b.id_company = c.id
        LEFT JOIN user_account d ON a.id_user = d.id
        WHERE a.id_user = $id_user";
    	$result = $this->db->query($sql)->result();
        return $result;
    }

    function newJob(){
        $sql = "SELECT * FROM job";
    	$result = $this->db->query($sql)->result();
        return $result;
    }

    function get_all_job(){
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = j.id_provinces";
    	$result = $this->db->query($sql);
        return $result;
    }

    function get_job_perpage($offset,$limit){
        $sql = "SELECT j.*, c.address, c.name as company, p.name as provinsi FROM job j
        left join company c on c.id = j.id_company
        left join provinces p on p.id = j.id_provinces
        LIMIT $limit 
        OFFSET $offset";
    	$result = $this->db->query($sql);
        return $result;
    }

    function JobCategory(){
        $sql = "SELECT * FROM job_category WHERE status = 1 ORDER BY name ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function UserProfile($id_user){
        $sql = "SELECT a.*, b.* FROM user_profile a
        left join user_account b on a.id_account = b.id
         WHERE a.id_account = $id_user";
        $result = $this->db->query($sql)->result();
        return $result;
    }


}