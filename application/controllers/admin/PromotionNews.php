<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromotionNews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('PromotionNews_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$tintuc = $this->PromotionNews_model->get();
		$tintuc = array('tintuc' => $tintuc);
		$this->load->view('admin/PromotionNews_view', $tintuc, FALSE);
	}

	public function addPromotionNews()
	{
		$this->load->view('admin/add_PromotionNews_view');
	}

	// Add a new item
	public function add()
	{
		$target_dir = "uploads/ImagePromotionNews/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		if(basename( $_FILES["image"]["name"]) != "")
		{
			$image = base_url() . 'uploads/ImagePromotionNews/' . basename( $_FILES["image"]["name"]);
		}
		else
		{
			$image = $this->input->post('logo2');
		}

		$thongtincongty = array(
			'title' => $this->input->post('title'),
			'summary' => $this->input->post('summary'),
			'content' => $this->input->post('content'),
			'status' => $this->input->post('status'),
			'image' => $image
		);

		$check = $this->PromotionNews_model->insert($thongtincongty);
		if($check) 
		{
			$this->load->view('admin/add_PromotionNews_view', array('success' => true, 'dulieu' => $this->PromotionNews_model->get())); 
		} 
		else
		{
			$this->load->view('admin/add_PromotionNews_view', array('fail' => false , 'dulieu' => $this->PromotionNews_model->get()));
		}
	}

	public function editById($id)
	{
		$tintucById = $this->PromotionNews_model->get($id);
		$tintuc = array('tintuc' => $tintucById);
		$this->load->view('admin/edit_PromotionNews_view', $tintuc, FALSE);
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->PromotionNews_model->delete($id);
		$tintuc = $this->PromotionNews_model->get();
		$tintuc = array('tintuc' => $tintuc);
		$this->load->view('admin/PromotionNews_view', $tintuc, FALSE);
	}
}

/* End of file PromotionNews.php */
/* Location: ./application/controllers/admin/PromotionNews.php */
