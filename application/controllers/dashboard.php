<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	}
	 
	 
	 
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
		
		//~ $id = 1;
		//~ $location_name = "Waco, TX";
		//~ 
		//~ $restaraunts_list = $this->restaraunt_modal->get_restaraunts_by_location($id);
		$data['temp'] = "temp";
		
		$main_content = $this->load->view('widgets/dashboard', $data, true); // Select our view file that will display our main area
		//~ $restaraunt_list_main_content = $this->load->view('widgets/restaraunt_list_main_content', $data, true);
		
		//~ echo $content;
		
		$data['main_content'] = $main_content;
		
		$this->load->view('theme.php', $data);
		
		
	}
	
	
	
	public function login(){
		
		$data['site_name'] = "Salesman-crm";
		
		//~ $main_content = $this->load->view('widgets/dashboard', $data, true); // Select our view file that will display our main area
		//~ $restaraunt_list_main_content = $this->load->view('widgets/restaraunt_list_main_content', $data, true);
		//~ 
		//~ echo $content;
		//~ 
		//~ $data['main_content'] = $main_content;
		
		$this->load->view('login_theme.php', $data);
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
