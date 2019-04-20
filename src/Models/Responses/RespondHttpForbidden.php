<?php

namespace Krasnikov\JsonApi\Server\Models\Responses;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class RespondHttpForbidden extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_FORBIDDEN;
    protected $message = 'Forbidden';
}
