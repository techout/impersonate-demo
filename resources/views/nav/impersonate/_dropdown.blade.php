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
    <div id="ImpersonateRecents"></div>
</div>

@push('js')
<script>
    $(document).ready(function(){
        $("#ImpersonateDropdown").on('show.bs.dropdown', function(){
            $.ajax({
                method: 'GET',
                url: '/api/getRecentImpersonates',
                success: function(data){
                    $dropdown = $('div#ImpersonateRecents');
                    if(!$dropdown.length) return false;
                    $dropdown.html("");

                    $.each(data, function(k, v){
                        $dropdown.append('<a class="dropdown-item" href="impersonate/take/' + data[k]['imp_user_id'] + '">' + data[k]['impersonated_user']['name'] + '</a>')
                    });
                }
            });
        });
    });
</script>
@endpush
