@extends('main')

@section('title', ' | Users')

@section('content')
    <h1>All Users</h1>

    <table class="table dataTable" id="DTUser">
        <thead>
            <tr>
                <th>ID</th>
                <th>Branch</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->branch->name}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-default">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#DTUser').DataTable({
                dom: 'ftp'
            });
        });
    </script>
@endpush

