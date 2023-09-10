<div>
    <form method="post" action="{{ $route }}">
        @csrf
        <button
            class="btn btn-xs btn-success mb-1"
            id="finish">@lang('Print certificate')</button>
    </form>
</div>