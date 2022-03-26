@php
    $type = in_array($type, ['a', 'button', 'div']) ? $type : 'div';
    $mode = $mode ?: 'classic';
    $text = $text ?: 'Texte par défaut';
@endphp

<{{ $type }} class="rm-c-Btn" data-mode="{{ $mode }}"
    @if (!empty($href)) href="{{ $href }}" @endif
    @if (!empty($blank)) target="_blank" rel="noreferrer" @endif>
    
    @if (!empty($text))
        <span @if ($mode === 'minimal') class="rm-u-a11yhidden" @endif>{!! $text !!}</span>
    @endif
    
    @if (!empty($arrow) && in_array($arrow, ['up', 'next', 'down', 'back']))
        <i data-dir="{{ $arrow }}"></i>
    @endif
</{{ $type }}>