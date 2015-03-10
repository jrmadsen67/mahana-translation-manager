<?php namespace Jrmadsen67\MahanaTranslationManager;

use Jrmadsen67\MahanaTranslationManager\repositories\TranslationManagerRepositoryInterface;

class MahanaTranslationManager{

	protected $translation_manager_repo;

	public function __construct(TranslationManagerRepositoryInterface $translation_manager_repo)
	{
		$this->translation_manager_repo = $translation_manager_repo;
	}

	public function find($key, $lang_code){
		return $this->translation_manager_repo->find($key, $lang_code);
	}
	public function create($data){
		return $this->translation_manager_repo->create($data);
	}
	public function update($key, $lang_code, $data){
		$cascade = (isset($data['cascade']))? $data['cascade']:true;
		return $this->translation_manager_repo->update($key, $lang_code, $data, $cascade);
	}
	public function delete($key, $lang_code){
		return $this->translation_manager_repo->delete($key, $lang_code);
	}

	public function getValue($key, $lang_code ='')
	{
		$lang_code = (empty($lang_code))? \Config::get('mahana-translation-manager::translation_manager.default_lang'): $lang_code;
		$t = $this->translation_manager_repo->getValue($key, $lang_code);
		return (empty($t)) ? '': $t->value;
	}
	public function getLanguageSet($lang_code)
	{
		return $this->translation_manager_repo->getLanguageSet($lang_code);
	}
	public function getNeedTranslation($lang_code)
	{
		return $this->translation_manager_repo->getNeedTranslation($lang_code);
	}
	public function getNeedUpdate($lang_code)
	{
		return $this->translation_manager_repo->getNeedUpdate($lang_code);
	}
	public function getNeedManualtranslation($lang_code)
	{
		return $this->translation_manager_repo->getNeedManualtranslation($lang_code);
	}
		
} 