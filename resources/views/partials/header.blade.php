<header class="blog-header py-3 container">
        <div class="row flex-nowrap justify-content-between align-items-center">
          

            @if (auth()->check())
            <span>{{ auth()->user()->name }} </span>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout')}}">Logout</a>
            @else
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('show-register') }}">Sign up</a>
            @endif

          </div>
        </div>
      </header>