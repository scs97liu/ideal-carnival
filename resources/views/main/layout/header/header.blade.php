<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        @include('main.layout.header.logo')
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @include('main.layout.header.notifications')
                @include('main.layout.header.inbox')
                @include('main.layout.header.tasks')
                @include('main.layout.header.user')
                @include('main.layout.header.sidebartoggle')
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>