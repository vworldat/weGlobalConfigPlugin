weGlobalConfigPlugin
====================

Requirements
------------

- symfony 1.3 oder 1.4 (could work with previous versions too, untested)

Installation
------------

 * Install plugin in `/plugins/weGlobalConfigPlugin` using GIT, SVN or whatever you like
 * Enable plugin in `/config/ProjectConfiguration.class.php`

``` php
<?php

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
		...
		$this->enablePlugins('weGlobalConfigPlugin');
		...
	}
}
```

Usage
-----

* Add a file called global.yml to any config folder of your project (globally, in plugins, in apps)
* global.yml is environment aware, so you can use something like this:

``` yml
dev:
  some_key:
    some_other_key:
      some:         value

all:
  some_key:
    some_other_key:
      some:         completely different value
```

So what's the benefit to app.yml etc.?
--------------------------------------

The benefit and motivation for my own config handler comes from 2 facts:
* It's independent from all the default config in symfony (the app config in app.yml is crowded with existing settings)
* It fires an event as soon as the config has been loaded. I don't know why the symfony config handlers forgot about that.
  Using this event you can listen to the loading of custom configuration in your various plugin configurations and do awesome stuff.

``` php
<?php

$this->dispatcher->connect('config.global_configuration_loaded', {your callable goes here});
```

Note that the global config is initiated after context.load_factories has fired.

Who needs this?
---------------

Well, I do. Don't use it if you don't like it ;-)
