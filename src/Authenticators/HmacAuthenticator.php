<?php

namespace ChrisReedIO\Saloon\WebhookPlugin\Authenticators;

use Saloon\Http\PendingRequest;
use Saloon\Contracts\Authenticator;

class HmacAuthenticator implements Authenticator
{
    public function __construct(
        public readonly string $secret,
        public readonly string $headerKey = 'X-HMAC-Signature'
    ) {
    }

    public function set(PendingRequest $pendingRequest): void
    {
        // Generate the HMAC signature
        $signature = hash_hmac('sha256', json_encode($pendingRequest->body()->all()), $this->secret);
        // Inject the signature into the request headers
        $pendingRequest->headers()->add($this->headerKey, $signature);
    }
}
