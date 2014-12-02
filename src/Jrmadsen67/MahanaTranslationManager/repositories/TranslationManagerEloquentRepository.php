<?php namespace Jrmadsen67\MahanaTranslationManager\repositories;

use Jrmadsen67\MahanaTranslationManager\models\Translations;
use Config;
 

class TranslationManagerEloquentRepository implements TranslationManagerRepositoryInterface
{
	public function find($key, $lang_code)
	{
		return Translations::whereKey($key)->whereLangCode($lang_code)->first();
	}
	public function create($data)
	{
		return Translations::create($data);
	}
	public function update($key, $lang_code, $data, $cascade)
	{
		$translation = self::getValue($key, $lang_code);
		$translation->fill($data);
		$translation->save();

		if ($cascade)
		{
			return Translations::whereLangCode($lang_code)->update(array('requires_update' => 1));
		}	

		return true;
	}

	public function delete($key, $lang_code)
	{
		$translation = self::getValue($key, $lang_code);
		$translation->delete();

		return true;
	}


	public function getValue($key, $lang_code)
	{
		return self::find($key, $lang_code);
	}
	public function getLanguageSet($lang_code)
	{
		return Translations::whereLangCode($lang_code)->get();
	}
	public function getNeedTranslation($lang_code)
	{

	}
	public function getNeedUpdate($lang_code)
	{
		return Translations::whereLangCode($lang_code)->whereRequireUpdate(1)->get();
	}
	public function getNeedManualtranslation($lang_code)
	{
		return Translations::whereLangCode($lang_code)->whereRequireManualTranslation(1)->get();
	}


}	