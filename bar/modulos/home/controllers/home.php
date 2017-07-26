<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{	
				
		$this->load->model('usuario_model');
		$this->load->model('crud_model');

        $config = array(
            'title' => 'Pedidos'
        );
	
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$dados['pagina'] 	= 'Home';
		$dados['pdv'] 		= $this->usuario_model->verificaPDV();
		$dados['user'] 		= $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$dados['pedidos'] 	= $this->crud_model->listar('pedidos ORDER BY id DESC LIMIT 5');
		$dados['clientes'] 	= $this->crud_model->listar('clientes ORDER BY id DESC LIMIT 5');
		
		$this->load->view('header', $dados);				
		$this->load->view('index', $dados);
		$this->load->view('footer');				
		
	}
	
	public function backup() {
		
		// Load the DB utility class
		$this->load->dbutil();
		
		$prefs = array(
                #'tables'      => array('table1', 'table2'),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => 'backup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

		$backup = $this->dbutil->backup($prefs); 
				
		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('assets/backup/backup-'.date('w').'.zip', $backup); 
		
		redirect('home');

	}
	
}

?>