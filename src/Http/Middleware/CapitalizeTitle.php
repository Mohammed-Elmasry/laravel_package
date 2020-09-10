<?php


namespace Masry\Lighthouse\Http\Middleware;


use Closure;

class CapitalizeTitle
{
    public function handle($request, Closure $next)
    {
        echo "Hello from Middleware group WEB";
        if ($request->has("title")) {
            $request->merge([
                "title" => ucfirst($request->title)
            ]);
        }
        return $next($request);
    }
}
