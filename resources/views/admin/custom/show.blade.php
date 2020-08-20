<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Show</h3>

        <div class="box-tools">

        </div>
    </div>
    <form action="#" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab-show-1" data-toggle="tab" aria-expanded="false">
                            Profile <i class="fa fa-exclamation-circle text-red hide"></i>
                        </a>
                    </li>
                </ul>

                <div class="tab-content fields-group">
                    <div class="tab-pane active" id="tab-show-1">
                        @include('admin.custom.modules.profile')
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</div>
