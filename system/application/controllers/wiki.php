<?php
$errno = error_reporting(0);
require_once('Text/Wiki/Mediawiki.php');
error_reporting($errno);

class Wiki extends Controller {

	function Wiki()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->renderPage('index');
	}
	
	function page($name)
	{
		$this->renderPage($name);
	}
	
	function renderPage($name)
	{
		$navitems = array();
		
		if (is_file("data/_navigation.txt")) {
			foreach (explode("\n", file_get_contents("data/_navigation.txt")) as $line) {
				if (substr($line, 0, 1)!='#') {
					$pair = explode('=>', $line);
					if ($pair && count($pair)==2) {
						$navitems[] = array(site_url(trim($pair[1])), trim($pair[0]));
					}
				}
			}
		}
		
		
		$content = file_get_contents("data/$name.txt");
		
		function check_wiki_page_exists($name) {
			return true;
		}
		
		$wiki = new Text_Wiki_Mediawiki();
		$wiki->setFormatConf('Xhtml', 'translate', HTML_SPECIALCHARS);
		$wiki->setRenderConf('Xhtml', 'Wikilink', 'view_url', 'wiki/page/%s');
		$wiki->setRenderConf('Xhtml', 'Wikilink', 'exists_callback', 'check_wiki_page_exists');
		
		$content = $wiki->transform($content, 'Xhtml');
				
		$copyright = '';
		
		if (is_file("data/_copyright.txt")) {
			$copyright = file_get_contents("data/_copyright.txt");
			$copyright = $wiki->transform($copyright, 'Xhtml');
		}
		
		
		$title = 'NO TITLE';
		
		if (is_file("data/_title.txt")) {
			$title = file_get_contents("data/_title.txt");
		}

		$data = array();
		$data['navitems'] = $navitems;
		$data['page_title'] = $title;
		$data['page_content'] = $content;
		$data['page_copyright'] = $copyright;

		$this->load->view('wiki_template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
