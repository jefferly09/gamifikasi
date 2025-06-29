<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if(session()->get("student_id") === null) {
      return redirect()->route("main.index")->withErrors([
        "message" => "You must register first before accessing the room."
      ]);
    }

    return $next($request);
  }
}
