<?php

namespace App\Services;

use App\Support\Attributes\PropConfig;
use App\Support\Enums\PropConfigEnum;

/**
 * @todo Сервис
 */
class AnyService extends Service
{
    #[PropConfig]
    private string $apiKey = 'api-key';

    #[PropConfig(PropConfigEnum::JSON)]
    private array $anyConfig = ['key' => 'value'];

    private string $otherProp = 'bla bla bla';

    public function __construct()
    {
    }


}
