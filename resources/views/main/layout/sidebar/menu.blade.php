<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('log.create') }}" class="nav-link">
        <i class="fa fa-heartbeat"></i>
        <span class="title">Add Log Entry</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('log.index') }}" class="nav-link">
        <i class="fa fa-list-alt"></i>
        <span class="title">History</span>
    </a>
</li>
<li class="nav-item">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-line-chart"></i>
        <span class="title">Graphs & Summaries</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item  ">
            <a href="{{ route('graph.bg') }}" class="nav-link ">
                <span class="title">Blood Sugar Overview</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ route('graph.average') }}" class="nav-link ">
                <span class="title">Averages</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-stethoscope"></i>
        <span class="title">Communications</span>
        <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="{{ route('communication.create') }}" class="nav-link ">
                <span class="title">Send a Message</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('communication.manage') }}" class="nav-link ">
                <span class="title">Manage Connections</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('tool.index') }}" class="nav-link">
        <i class="fa fa-upload"></i>
        <span class="title">Import / Export</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('setting.index') }}" class="nav-link">
        <i class="fa fa-cog"></i>
        <span class="title">Settings</span>
    </a>
</li>