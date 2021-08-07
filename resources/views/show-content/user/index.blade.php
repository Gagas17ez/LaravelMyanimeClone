@extends('master')

@section('main')
    <table class="table table-dark">
        <thead style="background-color: #161F3A">
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Nama</th> 
                <th scope="col">Email</th> 
                <th scope="col">Password</th> 
            </tr>
        </thead>
        <tbody style="background-color: #2E3250">
            @foreach ($listuser as $user)
            <tr>
                <th scope="row">{{$user->user_id}}</th>
                {{-- <tr><img src="{{asset($short.$user->profile_pic)}}" alt=""></tr> --}}
                <td>{{$user->user_name}}</td>
                <td>{{$user->user_email}}</td>
                <td>{{$user->user_password}}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection