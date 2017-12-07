<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
}
class Admin_Controller extends MY_Controller{
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
          
        }}
class Public_Controller extends MY_Controller{
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
}
class Api_Controller extends MY_Controller{
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
}