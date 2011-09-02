<?php

$this->dispatcher->connect('context.load_factories', function(sfEvent $event)
	{
		$config = sfProjectConfiguration::getActive();
		if ($config instanceof sfApplicationConfiguration)
		{
			$configCache = $config->getConfigCache();
			include($configCache->checkConfig('config/global.yml'));
		}
	}
);
