<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
    <div class="mt-card-item">
        <div class="mt-card-avatar mt-overlay-1">
            <img src="{{ asset('/layout/img/team1.jpg') }}" />
            <div class="mt-overlay">
                <ul class="mt-info">
                    <li>
                        <a class="btn default btn-outline" href="javascript:;">
                            <i class="fa fa-paper-plane-o"></i>
                        </a>
                    </li>
                    <li>
                        <a class="btn default btn-outline delete-prof" href="javascript:;" data-id="{{ $professional->id }}">
                            <i class="icon-trash"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-card-content">
            <h3 class="mt-card-name">{{ $professional->user->present()->fullName }}</h3>
            <p class="mt-card-desc font-grey-mint">{{ $professional->title }}</p>
        </div>
    </div>
</div>