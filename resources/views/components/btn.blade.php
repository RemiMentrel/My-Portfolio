@php
    $type = in_array($type, ['a', 'button', 'div']) ? $type : 'div';
    $mode = !empty($mode) ? $mode : 'classic';
    $style = !empty($style) ? $style : 'primary';
    $text = !empty($text) ? $text : 'Texte par défaut';
    $hasArrow = !empty($arrow) && in_array($arrow, ['up', 'next', 'down', 'back']);
@endphp

<{{ $type }} class="rm-c-Btn" data-mode="{{ $mode }}" data-style="{{ $style }}"
    @if (!empty($href)) href="{{ $href }}" @endif @if ($hasArrow) data-arrow-dir="{{ $arrow }}" @endif
    @if (!empty($blank)) target="_blank" rel="noreferrer" @endif
    @if (!empty($animationDelay)) style="animation-delay: {{ $animationDelay }}s" @endif
    @if (!empty($text) && ($mode === 'minimal')) title="{{ $text }}" @endif>
    
    @if (!empty($text))
        <span @if ($mode === 'minimal') class="rm-u-a11yhidden" @endif>{!! $text !!}</span>
    @endif
    
    @if ($hasArrow)
        <i data-dir="{{ $arrow }}">
            <b @if (!empty($animationDelay)) style="animation-delay: {{ $animationDelay }}s" @endif></b>
            <b @if (!empty($animationDelay)) style="animation-delay: {{ $animationDelay }}s" @endif></b>
        </i>
    @endif
</{{ $type }}>