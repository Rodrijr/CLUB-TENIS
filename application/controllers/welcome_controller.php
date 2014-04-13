<<<<<<< HEAD
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
	{
		$this->load->view('welcome/index');	
    }

}
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
	{
		$this->load->view('welcome/index');	
    }

}
>>>>>>> 716bf531c99d2c40167527feb19c8531864a7797
?>