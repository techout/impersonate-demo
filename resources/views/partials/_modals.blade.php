<div class="modal fade" id="impersonate_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Impersonate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @isset($users)
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{route('impersonate', $user->id)}}" class="btn btn-default">{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endisset
            </div>
        </div>
    </div>
</div>
