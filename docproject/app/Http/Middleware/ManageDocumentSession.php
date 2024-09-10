<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class ManageDocumentSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // List of routes where the session should be active
        $activeRoutes = [
            'marathidocument',
            'marathidocument_old',
            'marathidoc_stepone_submit'
        ];

        // Check if the current route is one of the active routes
        $currentRoute = Route::currentRouteName();

        if (in_array($currentRoute, $activeRoutes)) {
            // Keep the session alive for these routes
            return $next($request);
        }

        // Clear the session for other routes
        session()->forget('creating_document_id');

        return $next($request);
    }
}


?>