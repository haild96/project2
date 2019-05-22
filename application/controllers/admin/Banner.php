<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Banner_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$quangcao = $this->Banner_model->get();
		$quangcao = array('quangcao' => $quangcao);
		$this->load->view('admin/Banner_view', $quangcao, FALSE);
	}

	public function addBanner()
	{
		$this->load->view('admin/add_Banner_view');
	}

	// Add a new item
	public function add()
	{
		$target_dir = "uploads/ImageBanner/";
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

		$image = 'uploads/ImageBanner/' . basename( $_FILES["image"]["name"]);

		$quangcao = array(
			'name' => $this->input->post('name'),
			'image' => $image,
			'content' => $this->input->post('content'),
			'link' => $this->input->post('link'),
			'type' => $this->input->post('type'),
			'status' => $this->input->post('status'),
			
		);

		$check = $this->Banner_model->insert($quangcao);
		if($check) 
		{
			$this->load->view('admin/add_Banner_view', array('status' => true, 'message' => 'Thêm quảng cáo thành công')); 
		} 
		else
		{
			$this->load->view('admin/add_Banner_view', array('status' => false , 'message' => 'Thêm quảng cáo không thành công'));
		}
	}

	public function editByID($id)
	{
		$quangcao = $this->Banner_model->get($id);
		$quangcao = array('quangcao' => $quangcao);
		$this->load->view('admin/edit_Banner_view', $quangcao, FALSE);
	}

	//Update one item
	public function update( $id = NULL )
	{
		$target_dir = "uploads/ImageBanner/";
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
		if(basename( $_FILES["image"]["name"]) !="")
		{
			$image = 'uploads/ImageBanner/' . basename( $_FILES["image"]["name"]);
		}
		else
		{
			$image = $this->input->post('image2');
		}

		$quangcao = array(
			'name' => $this->input->post('name'),
			'image' => $image,
			'content' => $this->input->post('content'),
			'link' => $this->input->post('link'),
			'type' => $this->input->post('type'),
			'status' => $this->input->post('status'),
			
		);

		$check = $this->Banner_model->update($quangcao, $id);
		if($check) 
		{
			$this->load->view('admin/add_Banner_view', array('status' => true, 'message' => 'Thêm quảng cáo thành công')); 
		} 
		else
		{
			$this->load->view('admin/add_Banner_view', array('status' => false , 'message' => 'Thêm quảng cáo không thành công'));
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		if($this->Banner_model->delete($id))
		{
			$this->load->view('admin/Banner_view', array('quangcao' => $this->Banner_model->get()), FALSE);
		}
	}
}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */
