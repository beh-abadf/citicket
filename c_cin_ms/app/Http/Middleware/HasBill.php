<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasBill
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (
                Order::where('film_id', '=', session('film_id'))
                    ->where('who_ordered_id', '=', Auth::user()->id)
                    ->exists()
            ) {
                return redirect('export-pdf/' . session('place_id'));
            } else {
                return $next($request);
            }
        } else {
            return redirect('../user-login');
        }
    }
}
