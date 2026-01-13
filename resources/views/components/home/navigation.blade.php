@foreach($navigations as $navigation)
    <li>
        <a href="{{ $navigation['url'] ?? '#' }}" target="{{ $navigation['openInNewTab'] ? '_blank' : '_self' }}">
            {{ $navigation['name'] }}

            @if(count($navigation['subNavigations']) > 0)
                <i class="fa-solid fa-angle-down"></i>
            @endif
        </a>

        @if(count($navigation['subNavigations']) > 0)
            <ul class="dropdown-padding">
                @foreach($navigation['subNavigations'] as $subNavigation)
                    <li>
                        <a href="{{ $subNavigation['pageUrl'] ?: ($subNavigation['url'] ?? '#') }}" target="{{ $subNavigation['openInNewTab'] }}">
                            {{ $subNavigation['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
