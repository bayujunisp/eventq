<?php 
/**
* 
*/
class model_admin extends CI_Model
{	

	function category_list(){
		$this->db->order_by('id_category','Desc');
		$hasil=$this->db->get('category');
		
		return $hasil->result();
	}

	function save_category(){
		$data = array(
			'id_category' 	=> uniqid(), 
			'category' 	=> $this->input->post('category') 
			);
		$result=$this->db->insert('category',$data);
		return $result;
	}

	function update_category(){
		$id_category=$this->input->post('id_category');
		$category=$this->input->post('category');

		$this->db->set('category', $category);
		$this->db->where('id_category', $id_category);
		$result=$this->db->update('category');
		return $result;
	}

	function delete_category(){
		$id_category=$this->input->post('id_category');
		$this->db->where('id_category', $id_category);
		$result=$this->db->delete('category');
		return $result;
	}

	function event_list(){
		$this->db->order_by('id_event','Desc');
		$hasil=$this->db->get('event');
		
		return $hasil->result();
	}

	function save_event($image){

		$start = $this->input->post('start');
		$end = $this->input->post('end');	  
						   
		$data = array(
			'id_event' 	=> uniqid(), 
			'name_event' 	=> $this->input->post('name_event'),
			'organizer' 	=> $this->input->post('organizer'),
			'date_event' 	=> $this->input->post('date_event'),
			'start' 	=> $start,
			'end' 	=> $end,
			'max_attendance' 	=> $this->input->post('max_attendance'),
			'description' 	=> $this->input->post('description'),
			'location_event' 	=> $this->input->post('location_event'),
			'category_event' 	=> $this->input->post('category_event'),
			'images' 	=> $image,
			'status' 	=> 'Open', 
			);

		$result=$this->db->insert('event',$data);
		return $result;
	}

	function get_event_by_id($id){
        $hsl = $this->db->query("SELECT*FROM event WHERE id_event = '$id'");       
            foreach ($hsl->result() as $data) {
                $hasil = array(
			'id_event' 	=> $data->id_event, 
			'name_event' 	=> $data->name_event,
			'organizer' 	=> $data->organizer,
			'date_event' 	=> $data->date_event,
			'start' 	=>$data->start,
			'end' 	=> $data->end,
			'max_attendance' 	=> $data->max_attendance,
			'description' 	=> $data->description,
			'location_event' 	=> $data->location_event,
			'category_event' 	=> $data->category_event,
			'images' 	=> $data->images,
			'status' 	=> $data->status 
			);
            }
        return $hasil;
    }

	function update_event(){
		$id_event=$this->input->post('id_event');
		$event=$this->input->post('event');

		$this->db->set('event', $event);
		$this->db->where('id_event', $id_event);
		$result=$this->db->update('event');
		return $result;
	}

	function delete_event(){
		$id_event=$this->input->post('id_event');
		$this->db->where('id_event', $id_event);
		$result=$this->db->delete('event');
		return $result;
	}


}
?>