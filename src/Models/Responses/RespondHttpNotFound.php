<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpNotFound extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_NOT_FOUND;
    protected $message = 'Not Found';
}
