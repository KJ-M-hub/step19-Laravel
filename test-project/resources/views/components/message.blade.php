@props(['message'])
@if($message)
<div class="p-4 m-2 font-semibold rounded dark: bg-green-100">
   {{ $message }}
</div>
@endif


