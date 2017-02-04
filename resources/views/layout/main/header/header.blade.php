<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        @include('layout.main.header.logo')
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @include('layout.main.header.notifications')
                @include('layout.main.header.inbox')
                @include('layout.main.header.tasks')
                @include('layout.main.header.user')
                @include('layout.main.header.sidebartoggle')
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>