<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 7:44 PM
 */

namespace LTDBeget\sphinxConfigurator\lib;


use LTDBeget\sphinxConfigurator\SphinxConfiguration;

abstract class Settings
{
    /**
     * @var SphinxConfiguration
     */
    private $sphinxConfiguration;

    /**
     * @param SphinxConfiguration $sphinxConfiguration
     */
    public function __construct(SphinxConfiguration $sphinxConfiguration)
    {
        $this->sphinxConfiguration = $sphinxConfiguration;
    }

    /**
     * @return SphinxConfiguration
     */
    public function getConfiguration() : SphinxConfiguration
    {
        return $this->sphinxConfiguration;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return "{$this->getType()}";
    }

    /**
     * @return string
     */
    protected function getType() : string
    {
        return strtolower(str_replace("Settings", "", (new \ReflectionClass($this))->getShortName()));
    }

    /**
     * @return bool
     */
    abstract public function validate() : bool;
}