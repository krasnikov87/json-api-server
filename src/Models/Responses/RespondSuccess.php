<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

abstract class RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
