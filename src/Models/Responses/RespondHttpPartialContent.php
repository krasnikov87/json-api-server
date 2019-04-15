<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpPartialContent extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_PARTIAL_CONTENT;
}
