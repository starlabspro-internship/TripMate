<?php

namespace App\Http\Middleware;

use Closure;

class CheckForbiddenWords
{
    public function handle($request, Closure $next)
    {

        $content = $request->input('driver_comments');

        if ($content) {
            $forbiddenWords = config('forbidden_words.words');

            foreach ($forbiddenWords as $word) {
                if (stripos($content, $word) !== false) {
                    return redirect()->back()->withErrors([
                        'driver_comments' => 'Your comments contain prohibited words. Please review and try again.',
                    ])->withInput();
                }
            }
        }

        return $next($request);
    }
}
