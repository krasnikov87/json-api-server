<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpNoContent extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_NO_CONTENT;
}
