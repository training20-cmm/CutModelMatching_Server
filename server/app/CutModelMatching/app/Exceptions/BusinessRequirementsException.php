<?php

namespace App\Exceptions;

use Exception;

class BusinessRequirementsException extends Exception
{

    public static function length(string $resource, int $length): BusinessRequirementsException
    {
        return new BusinessRequirementsException("$resource must be $length characters in length");
    }

    public static function maxLength(string $resource, int $maxLength): BusinessRequirementsException
    {
        return new BusinessRequirementsException("$resource must be $maxLength characters or less in length");
    }

    public static function min(string $resource, int $min)
    {
        return new BusinessRequirementsException("$resource must be greater then or equal $min");
    }

    public function __construct(string $message)
    {
    }
}
