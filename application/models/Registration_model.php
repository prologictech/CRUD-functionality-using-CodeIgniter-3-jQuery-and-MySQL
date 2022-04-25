<?php
//this model have pateints and consult details
class Registration_model extends CI_Model
{
    // insert registration details
    public function insert($data)
    {
        $respone = $this->db->insert('user_details', $data);
        return $respone;
    }
    /*function for submit data */
    function save($data)
    {
        $ins = $this->db->insert('user_details', $data);
        //if value insert then return data
        return $ins;
        echo json_encode($ins);
    }
    /*function for show data*/
    function show_data()
    {
        $query = $this->db->query("select * from user_details");
        return $query->result();
        echo json_encode($query);
    }

    /*function for update data with the help  of id*/
    function update_id($id, $data)
    {
        $this->db->where('user_id',$id);
        $value = $this->db->update('user_details', $data);
        return $value;
    }
    /*function for update view*/
    function update_view($id = null)
    {
        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_id', $id);
        $sql = $this->db->get()->row();
        return $sql;
    }
    /*function for delete records */
    function delete_record($id)
    {
        $this->db->where("user_id", $id);
        $response = $this->db->delete('user_details');
        //if response true the return
        if ($response) {
            return true;
        } else {
            return false;
        }
    }
 //function to show the datatable with details
    function get_records($postData = null)
    {
        $response = array();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $colums = array('user_id', 'first_name', 'last_name', 'email', 'city', 'gender', 'email', 'phone_no', 'country', 'user_dob');
        $searchQuery = "";
        // search query
        if ($searchValue !== "") {
            $searchQuery .= "(";
            // foreach for search query for multiple columns
            foreach ($colums as $recor) {
                $searchQuery .= "$recor like '%" . $searchValue . "%' or ";
            }
            $searchQuery = substr($searchQuery, 0, -3);
            $searchQuery .= ")";
        }
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('user_details')->result();
        $totalRecords = $records[0]->allcount;
        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        // search query is not empty
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('user_details')->result();
        $totalRecordwithFilter = $records[0]->allcount;
        ## Fetch records
        $this->db->select('*');
        // if search query is not empty
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('user_details')->result();
        $data = array();
        // for each to fetch record for the datatable
        foreach ($records as $record) {
            $data[] = array(


                "user_id" => $record->user_id,
                "first_name" => $record->first_name,
                "last_name" => $record->last_name,
                "email" => $record->email,
                "city" => $record->city,
                "gender" => $record->gender,
                "country" => $record->country,
                "phone_no" => $record->phone_no,
                "user_dob" => $record->user_dob,
                "edit" => '<a  href=update_view/' . $record->user_id . ' class="btn btn-warning mr-1 edit"><i class="fas fa-edit"></i></a>',
                "delete" => '<a href=delete_data/' . $record->user_id . ' class="btn btn-danger mr-1 delete"><i class="fas fa-trash"></i></a>'
            );
        }
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return $response;
    }
}
