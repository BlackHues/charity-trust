<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Public site pages for search engines (excludes admin and form endpoints).
     */
    public function __invoke(): Response
    {
        $entries = [
            ['route' => 'home', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['route' => 'about', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['route' => 'services', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['route' => 'join-us', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['route' => 'leadership', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['route' => 'gallery', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['route' => 'donate', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['route' => 'contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        $lastmod = now()->toDateString();

        $urls = collect($entries)->map(fn (array $e) => [
            'loc' => route($e['route'], absolute: true),
            'lastmod' => $lastmod,
            'changefreq' => $e['changefreq'],
            'priority' => $e['priority'],
        ]);

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
