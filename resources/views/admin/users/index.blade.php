@extends('admin.layout')

@section('content')

    <div class="d-flex my-4">
        <h1 class="mx-2">Users</h1>
    </div>

    <br>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td> {{$user->id}} </td>
                <td> {{$user->name}} </td>
                <td> {{$user->email}} </td>
                <td> {{$user->created_at}} </td>
                <td>
                    <form action="{{route('users.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group d-flex">
                            <select name="newRole" id="" class="form-control">
                                <option {{ $user->role == 'customer' ? 'selected' : '' }} value="customer">customer</option>
                                <option {{ $user->role == 'publisher' ? 'selected' : '' }} value="publisher">publisher</option>
                                <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">admin</option>
                            </select>

                            <button class="button-dark ml-3" type="submit">Change Role</button>
                        </div> 
                    </form>
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-link" class="d-block">
                            <i class="fa fa-times" aria-hidden="true"></i>Del
                        </button>
                    </form>
                </td>           
            </tr>
        @endforeach
    </table>
@endsection