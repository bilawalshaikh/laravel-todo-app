@if(session()->has('message'))

<div x-data="{show:true}" x-init="setTimeout(()=> show = false,3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2  bg-gradient-to-r from-purple-100   bg-red text-black  border border-green-400 text-green-700 px-4 py-3 rounded relative
    ">
{{-- bg-gradient-to-r from-purple-400 text-2xl font-bold text-center text-gray-800 mb-8 --}}
<p>
    {{session('message')}}
</p>

</div>
@endif