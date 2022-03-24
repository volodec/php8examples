<?php

namespace App\Services;

use App\Contracts\Formatter;
use App\Support\Attributes\PropConfig;

/**
 * @todo Абстрактный класс сервиса
 */
abstract class Service
{
    public function getConfig(): array|null
    {
        $class = new \ReflectionClass($this);

        $config = [];

        foreach ($class->getProperties() as $property) {
            $attributes = $property->getAttributes(PropConfig::class);
            if ( ! empty($attributes)) {
                $attr        = reset($attributes);
                $attrHandler = $attr->newInstance();

                $propName  = $property->getName();
                $propValue = $property->getValue($this);

                // Условия здесь не нужно, но написано для визуализации варианта реализации, если бы не было фильтра по типу атрибута.
                if ($attrHandler instanceof Formatter) {
                    $config[$propName] = $attrHandler->format($propValue);
                    continue;
                }

                $config[$propName] = $propValue;
            }
        }

        return $config;
    }
}
