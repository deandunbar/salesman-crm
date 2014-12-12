<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 	 function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		
		/* make sure that users are logged in before they use the api
		 * */
		 if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
		/* Load the modal for contacts
		 * */
		 $this->load->model('contacts_modal');
		
	}
	
	
	public function index()
	{
		$main_content = $this->load->view('widgets/test_table_json'); // Select our view file that will display our main area
		echo $main_content;
	}
	
	public function api_test(){
		$main_content = $this->load->view('widgets/test_table_json'); // Select our view file that will display our main area
		echo $main_content;	
	}
	
	public function get_contacts(){
	
	$lim = $this->input->post('lim');
	$off = $this->input->post('off');
	
	//~ echo var_dump($lim);
	
	
	
	$contacts_list = $this->contacts_modal->get_contacts($lim, $off);
	
	$results_list = [];
	$results_list["data"] = $contacts_list["data"];
	$results_list["num_rows"] = $contacts_list["num_rows"];
	
	echo json_encode($results_list); 
	return;
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
