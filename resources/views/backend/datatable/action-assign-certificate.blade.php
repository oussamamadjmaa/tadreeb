<div class="d-inline">
    <form method="post" action="{{ $route }}" class="d-inline">
        @csrf
        <button
            class="btn btn-xs btn-success mb-1"
            id="finish">@lang('Print certificate')</button>
    </form>
</div>