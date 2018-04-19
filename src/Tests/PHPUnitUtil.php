<?php

namespace Informagenie\Tests;

class PHPUnitUtil
{

		public static function callMethod($obj, $method, array $args)
		{
			$class = new \ReflectionClass($obj);
			$method = $class->getMethod($method);
			$method->setAccessible(true);
			return $method->invokeArgs($obj, [$args]);
		}
}
