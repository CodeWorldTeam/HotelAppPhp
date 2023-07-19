<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppModel extends CI_Model 
{
    public function getTable()
    {
        //$query = $this->db->query("SELECT tm.* from table_master tm left join temp_table tt on tm.table_id=tt.tableno ");
        //$query = $this->db->query("SELECT * from table_master where status='Active'");
        $query = $this->db->query("

        SELECT tm.*, tt.*
        FROM table_master tm
        LEFT JOIN (
            SELECT t.*
            FROM temp_table t
            JOIN (
                SELECT tableno, MAX(id) AS max_id
                FROM temp_table
                GROUP BY tableno
            ) sub ON t.tableno = sub.tableno AND t.id = sub.max_id
        ) tt ON tm.table_id = tt.tableno
        WHERE tm.status = 'Active'
        ORDER BY tm.table_id ASC
        ;
        
        
        ");
        return $query->result_array();
    }

    public function getTableColor()
    {
        $query = $this->db->query("SELECT tm.* from table_master tm, temp_table tt  where tm.table_id = tt.tableno ");
        return $query->result_array();
    }

    public function countTable()
    {
        $query = $this->db->query("SELECT * from table_master where status='Active'");
        return $query->num_rows();
    }

    public function getTableDetails($id)
    {   
        $query = $this->db->query("SELECT tm.*, wm.waiter_name as waiterName from table_master tm, temp_table tt, waiter_master wm where tm.table_id=$id AND tm.table_id=tt.tableno AND tt.waiterid=wm.waiter_id");
        return $query->result(); 
    }
}
?>