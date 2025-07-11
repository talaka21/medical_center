<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

  // جلب قيمة اللغة من الـ query string أو من الـ session
        $locale = $request->get('lang') ?? session('locale', 'en');

        // لو اللغة مو عربية ولا انجليزية نخليها انجليزي افتراضياً
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }

        // حفظ اللغة في الجلسة عشان تبقى ثابتة مع التنقل بين الصفحات
        session(['locale' => $locale]);

        // تعيين لغة التطبيق
        app()->setLocale($locale);

        return $next($request);
    }
    }

