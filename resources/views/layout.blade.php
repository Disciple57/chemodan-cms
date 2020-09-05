<!doctype html>
<html @stack('open_graph')>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
    <link href="/app/main.css?@stack('modify')" rel="stylesheet">
    <script src="/app/main.js?@stack('modify')"></script>
    <link rel="canonical" href="{{url()->current()}}">
</head>
<body>
<div class="d-flex flex-column parent">
  @yield('content')
</div>
</body>
</html>
