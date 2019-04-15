<?php

namespace Krasnikov\JsonApi\Server\Exceptions;

use Krasnikov\JsonApi\Server\Constants\HttpCodes;

class ContentTypeNotSupportedException extends JsonException
{
    protected $code = HttpCodes::HTTP_UNSUPPORTED_MEDIA_TYPE;
}
