@props(['url'])
<tr>
    <td class="header" style="text-align: center; padding: 20px 0;">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <h1 style="text-align: center;">🎓 Webinar de Emprendimiento</h1>
            @else
                <span style="font-size: 20px; font-weight: bold; color: #333;">{{ $slot }}</span>
            @endif
        </a>
    </td>
</tr>
