<x-layouts>
    @include('partials/_search')
    <div
        class="lg:grid lg:grid-cols-2 gap-6 p-6 bg-white shadow-lg rounded-lg border border-gray-200 space-y-6 md:space-y-0 mx-4">
        <div>
            <img src="{{($listing['logo'])?asset('/storage/'.$listing['logo']):asset('/images/no-image.png')}}" alt="" srcset="">
        </div>
   

        <div>
            <p class="text-gray-600 text-sm font-semibold"><b>Title :</b></p>
            <p class="text-lg text-gray-900 mb-4">{!! $listing['title'] !!}</p>
        </div>

        <div class="col-span-2">
            <p class="text-gray-600 text-sm font-semibold"><b>Description :</b></p>
            <textarea class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring focus:ring-gray-300" cols="30"
                rows="6">{!! $listing['description'] !!}</textarea>
        </div>

        <div>
            <p class="text-gray-600 text-sm font-semibold"><b>Company :</b></p>
            <p class="text-lg text-gray-900 mb-4">{!! $listing['company'] !!}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm font-semibold"><b>Email :</b></p>
            <p class="text-lg text-gray-900 mb-4">{!! $listing['email'] !!}</p>
        </div>

        <div style="display:flex; gap: 10px">
            <p class="text-gray-600 text-sm font-semibold"><b>Tags :</b></p>
            <x-listing-tags :tags="$listing['tags']" />
        </div>

        <div>
            <p class="text-gray-600 text-sm font-semibold"><b>Website :</b></p>
            <p class="text-lg text-gray-900 mb-4">{!! $listing['website'] !!}</p>
        </div>

        <div class="col-span-2">
            <p class="text-gray-600 text-sm font-semibold"><b>Posted At :</b></p>
            <p class="text-lg text-gray-900">{!! $listing['created_at'] !!}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-600 text-sm font-semibold"><b>writen by {!! auth()->user()->name!!}</b></p>
            
        </div>
        <div class="col-span-2 flex justify-center content-center	">
            <p class=" w-32 text-center text-gray-600 text-sm font-semibold bg-blue-400 p-2 rounded-s-2xl"><b><a href="/listings/{!! $listing['id'] !!}/edit" class="text-white w-32">Edit</a></b></p>   
            
                <form action="/listings/{{$listing->id}}" method="post" class="w-32 text-white  text-center text-gray-600 text-sm font-semibold bg-red-400 p-2 rounded-e-2xl">
                    {{ csrf_field() }}
                    @method('DELETE')
                     <button class="text-white w-32 font-bold	" type="submit">Delete</button>
                </form>
          
                {{-- <b><a href="/listings/{!! $listing['id'] !!}/edit" class="text-white w-32">edit</a></b></p>    --}}
        </div>
    </div>
   
</x-layouts>
