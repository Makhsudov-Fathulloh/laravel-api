<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link active">{{ __('Bosh sahifa') }}</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('Biz haqimizda') }}</a>
            <a href="{{ route('services') }}" class="nav-item nav-link">{{ __('Xizmatlar') }}</a>
            {{-- <a href="{{ route('projects') }}" class="nav-item nav-link">Proektlar</a> --}}

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('Mahsulotlar') }}</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{ route('posts.index') }}" class="dropdown-item">{{ __('Mahsulotlar') }}</a>
                    {{-- <a href="{{ route('single') }}" class="dropdown-item">Blog Detallaari</a> --}}
                </div>
            </div>

            <a href="{{ route('contacts') }}" class="nav-item nav-link">{{ __('Al\'oqa') }}</a>
        </div>

        {{-- Language --}}
        <div class="nav-item dropdown">
            <button href="#" class="btn btn-primary mr-3 d-none d-lg-block dropdown-toggle"
                data-toggle="dropdown">{{ __('Tilni tanlang') }}</button>
            <div class="dropdown-menu rounded-0 m-0">
                @foreach ($all_locales as $locale)
                    {{-- <a href="{{ route('locale.change', ['locale' => $locale]) }}" class="dropdown-item">{{ $locale }}</a> --}}
                    @switch($locale)
                        @case ('uz')
                            <a href="{{ route('locale.change', ['locale' => $locale]) }}" class="dropdown-item">Uzbekcha</a>
                        @break
                            <br>
                        @case ('ru')
                            <a href="{{ route('locale.change', ['locale' => $locale]) }}" class="dropdown-item">Русский</a>
                        @break
                            <br>
                        @case ('en')
                            <a href="{{ route('locale.change', ['locale' => $locale]) }}" class="dropdown-item">English</a>
                        @break

                        @default
                    @endswitch
                @endforeach
            </div>
        </div>

        @auth
            <a href=" {{ route('notifications.index') }} " class="btn btn-primary mr-3">
                <i class="fa fa-bell"></i>
                <span class="badge badge-light"> {{ auth()->user()->unreadNotifications()->count() }} </span>
                <span class="sr-only">unread messages</span>
            </a>

            <div class="mr-2">
                {{ auth()->user()->name }}
            </div>

            @if (auth()->user()->hasRole('admin'))
            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-3 d-none d-lg-block">{{ __('Post qo\'shish') }}</a>
            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger mr-3 d-none d-lg-block">{{ __('Chiqish') }}</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">{{ __('Kirish') }}</a>
        @endauth
    </div>
</nav>
