@if(session('type') && session('message'))
    <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div class="alert-icon contrast-alert">
            @if(session('type') === 'success')
                <i class="fa fa-check"></i>
            @elseif(session('type' === 'danger'))
                <i class="fa fa-close"></i>
            @endif
        </div>
        <div class="alert-message">
            <span>{{ session('message') }}</span>
        </div>
    </div>
@endif
