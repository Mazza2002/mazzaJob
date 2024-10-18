@props(['listing'])
<tr class="border-b">
    <td class="p-5  text-lg text-gray-800 text-center"><img src="{{($listing['logo']) ?asset('/storage/'.$listing['logo']):asset('images/no-image.png')}}" /></td>
    <td class="p-4 text-lg text-gray-800 text-center">{!! $listing['id'] !!}</td>
    <td class="p-4 text-lg text-gray-800 text-center">{!! $listing['title'] !!}</td>
    <td class="p-4 text-lg text-gray-800 text-center">{!! $listing['company'] !!}</td>
    <td class="p-4 text-lg text-gray-800 text-center">{!! $listing['created_at'] !!}</td>
     
    <td><a href="/single-list/{!! $listing['id'] !!}" class="inline-block px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 text-white font-semibold rounded-md shadow-lg hover:from-red-600 hover:to-red-800 focus:ring-2 focus:ring-offset-2 focus:ring-red-300 transition-all duration-300 ease-in-out">
        Details...
    </a></td>
</tr>