<?php

namespace App\Support\Attributes;

use App\Contracts\Formatter;
use App\Support\Enums\PropConfigEnum;

/**
 * @todo Атрибут форматер
 */
#[\Attribute]
class PropConfig implements Formatter
{

    private PropConfigEnum $format;

    public function __construct($format = PropConfigEnum::NULL) {
        $this->format = $format;
    }

    public function format($value)
    {
        return match ($this->format) {
            PropConfigEnum::JSON => json_encode($value, JSON_THROW_ON_ERROR),
            PropConfigEnum::STRING => '' . $value,
            default => $value,
        };
    }
}
