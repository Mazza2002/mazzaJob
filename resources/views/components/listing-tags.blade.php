@props(['tags'])
@php
   $tags=explode(',',$tags); 
@endphp
@foreach ($tags as $tag)
  <a href="/?tag={!!$tag!!}" class="text-lg text-gray-900 mb-4 bg-red">{!! $tag !!}</a>  
@endforeach
