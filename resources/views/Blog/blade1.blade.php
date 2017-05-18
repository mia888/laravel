@extends('layout')

@section('header')
header
@stop


@section('content')
content
@stop


@section('footer')
footer
@stop

hee
{{$name}}

{{date('Y-m-d H:i:s',time())}}
{{--我是注释--}}

{{$name or 'default'}}
@include('section1',['message'=>3333])

<br/>
@if($name == '我是')
    true
@elseif($name == '我是变量')
    '对的'
@else
    false
@endif 

@unless(empty($name))
true
@endunless

@for($i=6;$i<10;$i++)
{{$i}}
@endfor


@foreach($post as $val)
{{$val->name}}
@endforeach


@forelse($post as $val)
{{$val->position}}
@empty
8888
@endforelse

<br/>
<a href="{{url('blog/url')}}">url()</a>

<a href="{{action('BlogController@urlTest')}}">action()</a>

<a href="{{route('url')}}">route()</a>




