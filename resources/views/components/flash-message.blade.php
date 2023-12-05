@if(session()->has('message'))

<div x-data="{show:true}" x-init="setTimeout(()=> show = false,3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red text-black  bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">

<p>
    {{session('message')}}
</p>

</div>
@endif