<x-layouts>
    {{-- <div class="flex justify-center"> --}}
        <x-card>
 <div class="w-1.5/5 flex justify-center flex-col bg-gray-100 p-6 rounded-lg">
            <header class="text-center">
                <h2 class="text-2xl text-red-500 font-bold uppercase mb-1">Log In</h2>
                <p class="mb-4">Log in to post gigs</p>
            </header>
    
            <form method="POST" action="/users/authenticate">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                        value="{{old('password')}}" />
                </div>
    
    
                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Log In
                    </button>
                </div>
    
                <div class="mt-8">
                    <p>
                        Don't have an account?
                        <a href="/register" class="text-laravel">Register</a>
                    </p>
                </div>
            </form>
        </div>
        </x-card>
       
    {{-- </div> --}}
     
</x-layouts>
    