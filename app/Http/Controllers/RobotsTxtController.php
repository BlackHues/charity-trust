<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsTxtController extends Controller
{
    /**
     * Crawl rules for the public site. Admin is disallowed; all marketing pages are allowed.
     */
    public function __invoke(): Response
    {
        $base = rtrim((string) config('app.url'), '/');
        $sitemap = $base.'/sitemap.xml';

        $body = <<<TXT
User-agent: *
Allow: /
Disallow: /admin
Disallow: /admin/

Sitemap: {$sitemap}
TXT;

        return response($body."\n", 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
