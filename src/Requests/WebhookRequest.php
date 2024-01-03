<?php

namespace ChrisReedIO\Saloon\WebhookPlugin\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\SoloRequest;

abstract class WebhookRequest extends Request
{
    /**
     * @inheritDoc
     */
    protected Method $method = Method::POST;

    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        // TODO: Implement resolveEndpoint() method.
    }
}
