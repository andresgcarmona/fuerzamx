<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include('layouts.includes.head')
    @yield('head')
</head>
@php
    // $notifications = App::make('notifications');
@endphp
<body {{isset($login) && $login ? 'class=login' : ''}}>
<div id="app" class="container-fluid {{!empty($notifications) ? 'notifications' : ''}}">
    {{-- @include('layouts.includes.header') --}}
    @yield('main')
</div>
@section('scripts')
    @if(app()->environment('production') || app()->environment('test'))
    @endif
    <script src="/js/src/globals.js"></script>
    <script src="/js/libs/nprogress/nprogress.js"></script>
    <script src="/js/libs/requirejs/require.js" data-main="/js/src/{{$module}}/main"></script>
    @if(app()->environment('production') || app()->environment('test'))
    <script src="/js/libs/jquery/jquery.min.js"></script>
    <script>
        require.config({
            paths: {
                'main': '/js/dist/' + '{{$module}}' + '/main.js' + '?bust=' + '{{$version}}',
            }
        });
    </script> 
    @endif
    @if(!isset($loading))
    {{-- @include('layouts.includes.loading') --}}
    @endif
@show
</body>
</html>