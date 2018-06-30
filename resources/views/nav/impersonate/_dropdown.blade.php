<button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu">
    <a href="" class="dropdown-item ImpersonateButton" data-toggle="modal" data-target="#impersonate_modal">Impersonate</a>
    @impersonating
        <a href="{{route('impersonate.leave')}}" class="dropdown-item">Leave Impersonate</a>
    @else
        <a href="" class="dropdown-item disabled">Leave Impersonate</a>
    @endImpersonating
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">(Recent Impersonates)</a>
</div>
