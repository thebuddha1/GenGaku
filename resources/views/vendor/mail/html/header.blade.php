@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1>Gengaku</h1><!--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">-->
@else
<h1>Gengaku</h1><!--{{ $slot }}-->
@endif
</a>
</td>
</tr>
