@extends('master')

@section('main')
<a href="{{ route('anime.create') }}" style="color: white"><button class="btn btn-primary m-4"><i class="fa fa-plus" aria-hidden="true"></i>
 Add Anime</button></a>
    <table class="table table-dark">
        <thead style="background-color: #161F3A">
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
    </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection