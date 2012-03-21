<?php
class JBuilderLibrary extends JBuilderExtension
{
	static function getOptions()
	{
		return parent::getOptions();
	}
	
	public function check()
	{
		return parent::check();
	}

	public function build()
	{
		$this->out(str_repeat('-', 79));
		$this->out('TRYING TO BUILD '.$this->options['name'].' LIBRARY...');
		$this->out(str_repeat('-', 79));
		
		$this->prepareMediaFiles();
		
		$this->prepareLanguageFiles(array('site', 'admin'));
		
		$this->addIndexFiles();
		
		$manifest = new JBuilderHelperManifest();
		
		$manifest = $this->setManifestData($manifest);
		
		//Here the missing options have to be set

		//Here we should save the manifest file to the disk
		//$this->out($manifest->main());
		
		$this->createPackage();
		
		$this->out(str_repeat('-', 79));
		$this->out('LIBRARY '.$this->options['name'].' HAS BEEN SUCCESSFULLY BUILD!');
		$this->out(str_repeat('-', 79));
	}
}