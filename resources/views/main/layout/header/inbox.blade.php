<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        @if(count($mail) > 0)
            <i class="icon-envelope"></i>
            <span class="badge badge-default"> {{ count($mail) }} </span>
        @else
            <i class="icon-envelope-open"></i>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3>You have
                <span class="bold">{{ count($mail) }} New</span> Messages</h3>
            <a href="{{ route('communication.index') }}">view all</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                @foreach($mail as $message)
                    <li>
                        <a href="{{ route('communication.show', $message->id) }}">
                            <span class="photo">
                                <img src="{{ $message->sender->present()->gravatar }}" class="img-circle" alt="">
                            </span>
                            <span class="subject">
                                <span class="from"> {{ $message->sender->present()->fullName }} </span>
                            </span>
                            <span class="message">{{ $message->text }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>