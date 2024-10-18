  <x-layouts>
      <x-flash-message />

      @include('partials/_hero')
      @include('partials/_search')
      @if (count($listings) > 0)
          <div class="flex justify-center">
              <table class="w-4/5 bg-gradient-to-r from-red-500 to-red-700 rounded-md shadow-lg">
                  <thead>
                      <tr class="bg-red-600">
                          <th class="p-4 text-sm font-semibold text-white text-center"><b>ID</b></th>
                          <th class="p-4 text-sm font-semibold text-white text-center"><b>Title</b></th>
                          <th class="p-4 text-sm font-semibold text-white text-center"><b>Email</b></th>
                          <th class="p-4 text-sm font-semibold text-white text-center"><b>Company</b></th>
                          <th class="p-4 text-sm font-semibold text-white text-center"><b>Published at</b></th>
                      </tr>
                  </thead>
                  <tbody class="bg-white">
                      @foreach ($listings as $listing)
                          <x-listing-card :listing="$listing" />
                      @endforeach

                  </tbody>
              </table>

          </div>
      @else
          <b>No data found !</b>

      @endif
      <div class="mt-6 p-4 flex justify-center">
          {{ $listings->links() }}
      </div>

  </x-layouts>
