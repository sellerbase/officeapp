<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $type  // 追加するユーザータイプパラメータ
     */
    public function handle(Request $request, Closure $next, $type)
    {
        // Auth::user()がnullでないことを確認し、プロパティ 'type' が存在するかチェック
        if (Auth::check() && Auth::user()->type !== $type) {
            // ユーザータイプが一致しない場合はアクセス拒否
            abort(403);
        }

        return $next($request);
    }
}
