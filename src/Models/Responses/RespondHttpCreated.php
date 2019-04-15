<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpCreated extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_CREATED;
}
