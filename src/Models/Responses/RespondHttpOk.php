<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpOk extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_OK;
}
