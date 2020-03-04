<?php
class GeneralModel extends CI_Model{
	### General Functions Start ###
	public function insert_data($table , $data){
		return $this->db->insert($table, $data);
	}
	public function fetch_by_all($table, $order=null, $limit=null){
		if(gettype($order) == 'integer')
			$limit = $order;
		if($order == 'ASC')
			$this->db->order_by('id',$order);
		else
			$this->db->order_by('id','DESC');
		if($limit)
			$this->db->limit($limit);

		$qry = $this->db->get($table);
		return $qry->result();
	}
	
	public function fetch_by_all_select($select, $table, $order=null, $limit=null){
		$this->db->select($select);
		if(gettype($order) == 'integer')
			$limit = $order;
		if($order == 'ASC')
			$this->db->order_by('id',$order);
		else
			$this->db->order_by('id','DESC');
		if($limit)
			$this->db->limit($limit);

		$qry = $this->db->get($table);
		return $qry->result();
	}

	public function fetch_by_id($table, $id){
		$qry = $this->db
						->where('id',$id)
						->get($table);
		return $qry->row();
	}
	public function fetch_by_col($table, $col, $limit=null){
		$this->db->where($col);
		$this->db->order_by('id', 'DESC');
		if($limit){
			$this->db->limit($limit);
		}

		$qry = $this->db->get($table);
		return $qry->result();
	}
	public function fetch_by_col_num($table, $col){
		$qry = $this->db->where($col)
						->get($table);
		return $qry->num_rows();
	}
	public function fetch_by_col_select($select, $table, $col, $limit=null){
		$this->db->select($select);
		$this->db->where($col);
		$this->db->order_by('id', 'DESC');
		if($limit){
			$this->db->limit($limit);
		}

		$qry = $this->db->get($table);
		return $qry->result();
	}
	public function update_by_id($table, $post, $id){
		return $this->db
						->set($post)
						->where('id',$id)
						->update($table);
	}
	public function update($table, $post){
		return $this->db
						->set($post)
						->update($table);
	}
	public function update_by_where($table, $post, $where){
		return $this->db
						->set($post)
						->where($where)
						->update($table);
	}
	public function delete_by_id($table, $id, $img = null){
		if($img != null){
			$data = $this->fetch_by_id($table, $id);
			$data = $data[0];
			$type = substr($data->img,0,1);
			// echo "<pre>"; print_r($data); exit;
			if($type == '.'){
				
				if(isset($data->img))
					unlink(substr($data->img,3));
				if(isset($data->img_thumb))
					unlink(substr($data->img_thumb,3));
			}
			else{
				if(isset($data->img))
					unlink($data->img );
				if(isset($data->img_thumb))
					unlink($data->img_thumb);
			}
		}
		return $this->db
						->where('id', $id)
						->delete($table);
	}
	public function delete_by_where($table, $where){
		return $this->db
						->where($where)
						->delete($table);
	}
	public function fetch_by_where($table, $where){
		$qry = $this->db
						->where($where)
						->get($table);
		return $qry->result();
	}
	public function check_table_exist($table){
		if ($this->db->table_exists($table) ){
		  // table exists some code run query
			return true;
		}
		else{
		  // table does not exist
			return false;
		}
	}
	public function empty_table($table){
		if($this->db->truncate($table))
			return true;
		else
			return false;
	}
	

	### General Functions Ends ###
}
?>