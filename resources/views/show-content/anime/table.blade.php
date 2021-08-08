@extends('master')

@section('main')
    <table class="table table-dark">
        <thead style="background-color: #161F3A"><br><br><br>
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">judul</th> 
                <th scope="col">sinopsis</th> 
                <th scope="col">episode_count</th>
                <th scope="col">aired_date</th> 
                <th scope="col">producer</th> 
                <th scope="col">studio</th> 
                <th scope="col">video_link</th> 
                <th scope="col">poster</th>
                 
                <th scope="col">action</th> 
                  
            </tr>
        </thead>
        <tbody style="background-color: #2E3250">
            @forelse ($anime as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                {{-- <tr><img src="{{asset($short.$user->profile_pic)}}" alt=""></tr> --}}
                <td>{{$item->id}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->sinopsis}}</td>
                <td>{{$item->type}}</td>  
                <td>{{$item->episode_count}}</td>                  
                <td>{{$item->status}}</td>  
                <td>{{$item->aired_date}}</td>  
                <td>{{$item->poster}}</td>  
                
                <td style="display: flex;">  
                    <a href="/anime/{{$item->id}}/edit" class="btn btn-sm btn-success">Update</a>&nbsp; 
                    
                    <form role="form" action="/anime/{{$item->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-sm btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection