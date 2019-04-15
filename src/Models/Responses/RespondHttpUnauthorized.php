<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpUnauthorized extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_UNAUTHORIZED;
    protected $message = 'Unauthorized';
}
