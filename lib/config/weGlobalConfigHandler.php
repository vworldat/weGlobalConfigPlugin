<?php

/**
 * Custom config handler that loads the values like sfDefineEnvironmentConfigHandler
 *
 * @author david
 *
 */
class weGlobalConfigHandler extends sfDefineEnvironmentConfigHandler
{
	/**
	 * Executes this configuration handler.
	 *
	 * @param string $configFiles An absolute filesystem path to a configuration file
	 *
	 * @return string Data to be written to a cache file
	 *
	 * @throws sfConfigurationException If a requested configuration file does not exist or is not readable
	 * @throws sfParseException If a requested configuration file is improperly formatted
	 */
	public function execute($configFiles)
	{
		$config = parent::execute($configFiles);
		$config .=
			"\n\n".
			"// I found no other place for this. Ugly but works\n".
			"\$dispatcher = sfContext::getInstance()->getEventDispatcher();\n".
			"\$dispatcher->notify(new sfEvent(\$dispatcher, 'config.global_configuration_loaded'));\n"
		;
		return $config;
	}
}
