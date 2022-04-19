@php
    $mode = in_array($mode, ['simple', 'switch']) ? $mode : 'simple';
@endphp

<nav class="rm-c-Tabs" data-mode="{{ $mode }}"
     @if (!empty($label)) aria-labelledby="{{ $label }}" @endif>
    
     <ul>
        @foreach ($tabs as $i=>$tab)
            <li @if ($tab['selected']) data-selected="true" @endif>
                <a href="{{ $tab['url'] }}">
                    @if (!empty($tab['icon']))
                        <i><img src="@asset('images/icons/'.$tab['icon'].'.svg')" alt="" /></i>
                    @endif
                    {{ $tab['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>