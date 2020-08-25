@isset($meta['title'])
    <title>{{$meta['title']}}</title>
@endisset
@isset($meta['description'])
    <meta name="description" content="{{$meta['description']}}"/>
@endisset
@isset($meta['extra'])
    {!! $meta['extra'] !!}
@endisset
@if(isset($meta['og_title']) || isset($meta['og_description']) || isset($meta['og_image']))
    @php echo '@push("open_graph")prefix="og: http://ogp.me/ns#"@endpush'; @endphp
    @isset($meta['og_image'])
        <meta property="og:image" content="{{asset('app/img/'.$meta['og_image'])}}/>
    @endisset
    @isset($meta['og_title'])
        <meta property="og:title" content="{{$meta['og_title']}}"/>
    @endisset
    @isset($meta['og_description'])
        <meta property="og:description" content="{{$meta['og_description']}}"/>
    @endisset
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{asset('')}}"/>
@endif