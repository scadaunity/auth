<?php namespace CodeIgniter\Session\Exceptions;

use CodeIgniter\Exceptions\ExceptionInterface;
use CodeIgniter\Exceptions\FrameworkException;

class SessionException extends FrameworkException implements ExceptionInterface
{
	public static function forMissingDatabaseTable()
	{
		return new static(lang('Auth.missingDatabaseTable'));
	}

	public static function forInvalidSavePath(string $path = null)
	{
		return new static(lang('Auth.invalidSavePath', [$path]));
	}

	public static function forWriteProtectedSavePath(string $path = null)
	{
		return new static(lang('Auth.writeProtectedSavePath', [$path]));
	}

	public static function forEmptySavepath()
	{
		return new static(lang('Auth.emptySavePath'));
	}

	public static function forInvalidSavePathFormat(string $path)
	{
		return new static(lang('Auth.invalidSavePathFormat', [$path]));
	}
}
