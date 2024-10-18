@if (session('message'))
<div class="flex justify-center ">
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
      class="bg-green-100 border w-2/4 flex justify-center items-center border-white-400 text-green-700 px-4 py-6 rounded"
      role="alert">
      <strong class="font-bold">success message </strong>
      <span class="block sm:inline">{{ session('message') }}</span>
  </div>
</div>

@endif
