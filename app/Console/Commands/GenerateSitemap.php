<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml file';

    public function handle()
    {
        $urls = [
            url('/'),
            url('/about/our-clients'),
            url('/about/why-choose-us'),
            url('/page/contact-us'),
            url('/page/certificates'),
            url('/page/our-business'),
            url('/about/our-team'),
            url('/about/our-story'),
            url('/about/our-gallery'),
            url('/service-area'),
            url('/page/blog'),
            url('/product/our-product-list'),
            url('/page/services'),
            url('/page/projects'),
            url('/page/projects?status=upcoming'),
            url('/page/projects?status=ongoing'),
            url('/page/projects?status=completed'),
        ];

        $services = \App\Models\Service::all();
        foreach ($services as $service) {
            $urls[] = url('/' . $service->slug);
        }

        $serviceAreas = \App\Models\ServiceArea::all();
        foreach ($serviceAreas as $area) {
            $urls[] = url('/service-area/' . $area->area_slug);
        }

        $blogs = \App\Models\Blog::all();
        foreach ($blogs as $blog) {
            $urls[] = url('/blog/' . $blog->slug);
        }
        
        $blogCategories = \App\Models\BlogCategory::all();
        foreach ($blogCategories as $category) {
            $urls[] = url('/blog/category/' . $category->slug);
        }

        $pages = \App\Models\Pages\Page::all();
        foreach ($pages as $page) {
            $urls[] = url('/page/' . $page->slug);
        }

        $projects = \App\Models\Project::all();
        foreach ($projects as $project) {
            $urls[] = url('/project/' . $project->slug);
        }


        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . $url . '</loc>';
            $xml .= '<lastmod>' . Carbon::now()->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>daily</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully!');
    }
}