<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($pages as $page)
    <url>
        <loc>{{ url($page['url']) }}</loc>
        @isset($page['updated_at'])
        <lastmod>{{ date('Y-m-d', strtotime($page['updated_at'])) }}</lastmod>
        @endisset
    </url>
@endforeach
</urlset>
