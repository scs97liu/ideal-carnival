<li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="{{ $user->present()->gravatar() }}" />
        <span class="username username-hide-on-mobile"> {{ $user->present()->fullName() }} </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="{{ route('setting.index') }}">
                <i class="fa fa-gears"></i> Preferences </a>
        </li>
        <li>
            <a href="{{ url('/logout') }}">
                <i class="icon-key"></i> Log Out </a>
        </li>
    </ul>
</li>