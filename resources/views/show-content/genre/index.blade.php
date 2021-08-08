@extends('master')

@section('main')
<button class="btn btn-primary m-4"><a href="/genre/create" style="color: white"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i>
 Add Genre</a></button>
    <table class="table table-dark">
        <thead style="background-color: #161F3A">
            <tr>
                <th scope="col">ID</th> 
                <th scope="col">Genre</th>
                <th scope="col">Action</th>  
            </tr>
        </thead>
        <tbody style="background-color: #161F3A">
            @forelse ($listgenre as $item)
            <tr>
                {{-- <tr><img src="{{asset($short.$user->profile_pic)}}" alt=""></tr> --}}
                <td>{{$item->id}}</td>
                <td>{{$item->genre}}</td>  
                <td style="display: flex;">  
                    <a href="/genre/{{$item->id}}/edit" class="btn btn-sm btn-success">Update</a>&nbsp; 
                    
                    <form role="form" action="/genre/{{$item->id}}" method="post">
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
