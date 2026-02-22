<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ $application['logo'] }}" alt="Logo Sekolah" class="navbar-logo">
            {{ $application['name'] }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                @foreach($navigations as $navigation)
                    <li class="nav-item {{ count($navigation['subNavigations']) > 0 ? 'dropdown' : '' }}">
                        <a href="{{ $navigation['url'] ?? '#' }}"
                           target="{{ $navigation['openInNewTab'] ? '_blank' : '_self' }}"
                           class="nav-link {{ count($navigation['subNavigations']) > 0 ? 'dropdown-toggle' : '' }}"

                           @if(count($navigation['subNavigations']) > 0)
                               id="navbarDropdown{{ str_replace(' ', '', $navigation['name']) }}"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false"
                           @endif
                        >

                            {{--<i class="bi bi-{{ $navigation['icon'] }}"></i>--}}
                            {{ $navigation['name'] }}
                        </a>

                        @if(count($navigation['subNavigations']) > 0)
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ str_replace(' ', '', $navigation['name']) }}">
                                @foreach($navigation['subNavigations'] as $subNavigation)
                                    <li>
                                        <a href="{{ $subNavigation['pageUrl'] ?: ($subNavigation['url'] ?? '#') }}"
                                           target="{{ $subNavigation['openInNewTab'] }}"
                                           class="dropdown-item"
                                        >
                                            <i class="bi bi-images me-2"></i>
                                            {{ $subNavigation['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="btn-group-nav d-flex align-items-center">
                <a href="#" class="btn btn-primary">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</nav>
