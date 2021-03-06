<?php
/**
 * Note : Code is released under the GNU LGPL
 *
 * Please do not change the header of this file 
 *
 * This library is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * Lesser General Public License as published by the Free Software Foundation; either version 2 of 
 * the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * See the GNU Lesser General Public License for more details.
 */

/**
 * File:        FrontContainer.php
 * 
 * @author      Anis BEREJEB
 * 
 */

/**
 * Dependency Container for the Front Module
 * Extends the Container Class
 * Inject any other dependencies to the object
 * set methodes with a get prefix to build the objects
 * (i.e. getCacheManager builds the CacheManager object)
 * 
 */
class FrontContainer extends Container
{
    public static $languages = null;

    /**
     * Language object Setter
     * 
     * @return array
     */
    public function setLanguage()
    {
        if (isset(self::$languages))
        {
            return self::$languages;
        }
        else
        {
            $lang  = (isset($this['Session']['lang'])) ? $this['Session']['lang'] : 'en';
            $parser = new INIConfigurationParser();
            $parser->loadFile(BUSINESS . 'conf/languages.' . $lang . '.ini');
            $parser->parse();
            self::$languages = $parser->getConfigs();
            return self::$languages;
        }
    }
}
