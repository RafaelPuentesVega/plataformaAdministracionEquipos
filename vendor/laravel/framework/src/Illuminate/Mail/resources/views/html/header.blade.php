<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Plataforma_ByG')
<img  width="15%" height="100%" src="https://www.bygsistemas.com.co/plataformabyg/public/assets/img/logo.png" class="logo" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
