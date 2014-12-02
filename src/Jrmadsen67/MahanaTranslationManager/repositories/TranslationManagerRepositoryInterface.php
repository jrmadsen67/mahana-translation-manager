<?php namespace Jrmadsen67\MahanaTranslationManager\repositories;
/**
 * Interface for the translation manager repo
 */
interface TranslationManagerRepositoryInterface
{
	public function find($key, $lang_code);
	public function create($data);
	public function update($key, $lang_code, $data);
	public function delete($key, $lang_code);

	public function getValue($key, $lang_code);
	public function getLanguageSet($lang_code);
	public function getNeedTranslation($lang_code);
	public function getNeedUpdate($lang_code);
	public function getNeedManualtranslation($lang_code);
}