@if(session('emailHasVerified'))

    <div class="alert alert-success">
        @lang('auth.email has verified')
    </div>

@endif
