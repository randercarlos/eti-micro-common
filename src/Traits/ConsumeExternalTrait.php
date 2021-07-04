<?php

namespace Randercarlos\EtiMicroCommon\Traits;

use Illuminate\Support\Facades\Http;

class ConsumeExternalTrait
{
    private function configDefaultHeaders(array $headers) {
        return array_merge($headers, [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
        ]);
    }

    public function request(string $method, string $endpoint, array $params = [], array $headers = []) {
        $headers = $this->configDefaultHeaders($headers);
        return Http::withHeaders($headers)->$method($this->url . $endpoint, $params);
    }
}
