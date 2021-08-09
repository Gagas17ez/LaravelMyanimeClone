@extends('master')

@section('main')
    <table class="table table-dark">
        <thead style="background-color: #161F3A">
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Nama</th> 
                <th scope="col">Email</th> 
                @auth
                    @if (Auth::user()->status == "admin")
                       <th scope="col">Password</th>  
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody style="background-color: #2E3250">
            @foreach ($listuser as $user)
            <tr>
                <th scope="row">{{$user->user_id}}</th>
                {{-- <tr><img src="{{asset($short.$user->profile_pic)}}" alt=""></tr> --}}
                <td>{{$user->user_name}}</td>
                @if ($user->user_status != "admin")
                    <td>{{$user->user_email}}</td>
                @else
                    <td>admin</td>
                @endif
                @auth
                    @if (Auth::user()->status == "admin" && $user->user_status == "admin" && Auth::user()->password != $user->user_password)
                        <td>otheradminpassword</td>
                    @elseif (Auth::user()->status != "admin")
                        
                    @else
                        <td>{{$user->user_password}}</td>
                        
                    @endif
                @endauth
                            
            </tr>
            @endforeach
        </tbody>
    </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection