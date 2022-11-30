<a href="{{ route('compare') }}" class="d-flex align-items-center text-reset">
    <i class="lar la-user la-2x opacity-80">
        @if(Session::has('compare'))
            <span class="badge badge-primary badge-inline badge-pill">{{ count(Session::get('compare'))}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill">0</span>
        @endif
    </i>
    <span class="flex-grow-1 ml-1">
        <span class="nav-box-text d-none d-xl-block opacity-70">تسجيل الدخول / تسجيل حساب</span>
    </span>
</a>