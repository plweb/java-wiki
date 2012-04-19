<?php

class Admin extends Controller {

	var $messages = '';
	
	function Wiki()
	{
		parent::Controller();
	}

	function index()
	{
		$this->renderPage();
	}

	function edit($name)
	{
		$this->renderPage($name);
	}
	
	function save($name = null)
	{
		
		$filename = $this->input->post('form_filename');
		$filetext = $this->input->post('form_filetext');
		
		file_put_contents("data/$filename.txt", $filetext);
		
		$this->messages = '<span class="form-message-ok">File saved!!! '.date('Y-m-d h:i:s').'</span>';
		
		$this->renderPage($filename);
	}
	
	function renderPage($name = null)
	{
		//read file content
		if ($name) {
			$action = site_url("admin/save/$name");
			$filename = $name;
			$filetext = file_get_contents("data/$name.txt");
		}
		else {
			$action = site_url("admin/save");
			$filename = 'new_name';
			$filetext = '';
		}
		
		//make file list
		$files_src = scandir('data');
		$files = array();

		$files[] = array(site_url("admin"), '- new -');
		
		foreach ($files_src as $file) {
			if (substr($file, -4) == '.txt') {
				$name = str_replace('.txt', '', $file);
				$files[] = array(site_url("admin/edit/$name"), $name);
			}
		}
		
		$data = array();
		$data['files'] = $files;
		$data['form_action'] = $action;
		$data['form_filename'] = $filename;
		$data['form_filetext'] = $filetext;
		$data['form_messages'] = $this->messages;

		$this->load->view('admin_template', $data);
	}
}