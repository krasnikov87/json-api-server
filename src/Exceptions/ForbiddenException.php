<?php

namespace Krasnikov\JsonApi\Server\Exceptions;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class ForbiddenException extends JsonException
{
    protected $code = HttpCodes::HTTP_FORBIDDEN;

    public function render()
    {
        return $this->respondWithForbidden($this->message);
    }
}
