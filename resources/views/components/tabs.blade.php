@php
    $mode = in_array($mode, ['simple', 'switch']) ? $mode : 'simple';
@endphp

<nav class="rm-c-Tabs" data-mode="{{ $mode }}"
     @if (!empty($label)) aria-labelledby="{{ $label }}" @endif>
    
     <ul>
        @foreach ($tabs as $i=>$tab)
            <li @if ($i === 0) data-selected="true" @endif>
                <a href="{{ $tab['link'] }}">
                    @if (!empty($tab['icon']))
                        <i><img src="@asset('images/icons/'.$tab['icon'].'.svg')" alt="" /></i>
                    @endif
                    {{ $tab['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>