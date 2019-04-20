<?php

namespace Krasnikov\JsonApi\Server\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Krasnikov\JsonApi\Server\Exceptions\ContentTypeNotSupportedException;

class InspectContentType
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @throws ContentTypeNotSupportedException
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ('application/vnd.api+json' !== $request->header('Content-Type') && 'application/vnd.api+json' !== $request->header('Accept')) {
            throw new ContentTypeNotSupportedException('Your request should be in json api format. (Content-Type: application/vnd.api+json)');
        }

        return $next($request);
    }
}
