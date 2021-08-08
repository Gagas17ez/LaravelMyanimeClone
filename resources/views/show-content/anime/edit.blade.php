@extends('master')

@section('hero')
    
@endsection

@section('subtitle')
    Sinopsisdata Pemain:
@endsection

@section('back')
<a href="#"><button type="button" class="btn btn-primary" ><i class="fa fa-angle-left" aria-hidden="true"></i>
    Back</button></a><br>
@endsection


@section('main')

<section class=" spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login__form">
                    <h3>Edit Anime:</h3>
                    <form action="/anime/{{$anime->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputJudul3" class="col-sm-2 col-form-label text-white">Judul:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" value="{{$anime->judul}}" id="judul" name="judul" placeholder="Judul" >
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputSinopsis3" class="col-sm-2 col-form-label text-white">Sinopsis:</label>
                            <div class="col-sm-10 input__item">
                                <textarea class="form-control" type="textarea" id="sinopsis" name="sinopsis" placeholder="Sinopsis" rows="5" cols="50" style="padding-left: 76px">{{$anime->sinopsis}}</textarea>
                                @error('sinopsis')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputTipe3" class="col-sm-2 col-form-label text-white">Tipe:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="type" value="{{$anime->type}}" name="type" placeholder="Tipe" >
                                @error('tipe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputEpisodecount3" class="col-sm-2 col-form-label text-white">Episode count:</label>
                            <div class="col-sm-10 input__item">
                                <input type="number" class="form-control" id="episode_count" value="{{$anime->episode_count}}" name="episode_count" placeholder="Episodecount" >
                                @error('episode_count')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputStatus3" class="col-sm-2 col-form-label text-white">Status:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="status" value="{{$anime->status}}" name="status" placeholder="Status" >
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputAireddate3" class="col-sm-2 col-form-label text-white">Aired date:</label>
                            <div class="col-sm-10 input__item">
                                <input type="date" class="form-control" id="aired_date" value="{{$anime->aired_date}}" name="aired_date" placeholder="Aireddate" >
                                @error('aired_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputProducer3" class="col-sm-2 col-form-label text-white">Producer:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="producer" value="{{$anime->producer}}" name="producer" placeholder="Producer" >
                                @error('producer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputStudio3" class="col-sm-2 col-form-label text-white">Studio:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="studio" value="{{$anime->studio}}" name="studio" placeholder="Studio" >
                                @error('studio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputVideolink3" class="col-sm-2 col-form-label text-white">Video link:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="video_link" value="{{$anime->video_link}}" name="video_link" placeholder="Videolink" >
                                @error('video_link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>


                        <div class="form-group row">
                            <label for="inputVideolink3" class="col-sm-2 col-form-label text-white">Genre :</label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="genre_id" name="genre_id">
                                    
                                    @foreach ($listgenre as $genre)
                                    <option value="{{$genre->id}}">{{$genre->genre}}</option>    
                                    @endforeach
                                    @error('genre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>                
                        </div>

                        <div class="form-group row">
                            <label for="inputPoster3" class="col-sm-2 col-form-label text-white">Poster:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="poster" value="{{$anime->poster}}" name="poster" placeholder="Poster" >
                                @error('Poster')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>

                        <div class="form-group row">
                            <label for="inputPosterwide3" class="col-sm-2 col-form-label text-white">Poster Wide:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="poster_wide" value="{{$anime->poster_wide}}" name="poster_wide" placeholder="Posterwide" >
                                @error('poster_wide')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                    
                        
                        
                        <button class="btn btn-info"><i class="fa fa-plus add" aria-hidden="true" id="add"></i> edit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>