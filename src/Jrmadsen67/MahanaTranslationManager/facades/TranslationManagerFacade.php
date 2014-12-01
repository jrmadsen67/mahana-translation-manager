<?php namespace Jrmadsen67\MahanaTranslationManager\Facades;

use Illuminate\Support\Facades\Facade;

class TranslationManagerFacade extends Facade
{

    /**
     * Get the registered name of the component
     *
     * @return string
     * @codeCoverageIgnore
     */
    protected static function getFacadeAccessor()
    {
        return 'mahana-translation-manager';
    }
}