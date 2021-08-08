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
                    <h3>Create Anime:</h3>
                    <form role="{{route('anime.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputJudul3" class="col-sm-2 col-form-label text-white">Judul:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" >
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputSinopsis3" class="col-sm-2 col-form-label text-white">Sinopsis</label>
                            <div class="col-sm-10 input__item">
                                <textarea type="textarea" class="form-control" id="sinopsis" name="sinopsis" placeholder="Sinopsis" rows="5" cols="50" style="padding-left: 76px"></textarea>
                                @error('sinopsis')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputTipe3" class="col-sm-2 col-form-label text-white">Tipe:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="type" name="type" placeholder="Tipe" >
                                @error('tipe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputEpisodecount3" class="col-sm-2 col-form-label text-white">Episode count:</label>
                            <div class="col-sm-10 input__item">
                                <input type="number" class="form-control" id="episode_count" name="episode_count" placeholder="Episodecount" >
                                @error('episode_count')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputStatus3" class="col-sm-2 col-form-label text-white">Status:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="status" name="status" placeholder="Status" >
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputAireddate3" class="col-sm-2 col-form-label text-white">Aired date:</label>
                            <div class="col-sm-10 input__item">
                                <input type="date" class="form-control" id="aired_date" name="aired_date" placeholder="Aireddate" >
                                @error('aired_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputProducer3" class="col-sm-2 col-form-label text-white">Producer:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="producer" name="producer" placeholder="Producer" >
                                @error('producer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputStudio3" class="col-sm-2 col-form-label text-white">Studio:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="studio" name="studio" placeholder="Studio" >
                                @error('studio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputVideolink3" class="col-sm-2 col-form-label text-white">Video link:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Videolink" >
                                @error('video_link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>


                        <div class="form-group row">
                            <label for="inputVideolink3" class="col-sm-2 col-form-label text-white">Genre :</label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="genre_id" name="genre_id">
                                    <option value="">--Silakan Pilih--</option>
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
                            <label for="inputPoster3" class="col-sm-2 col-form-label text-white">Poster Tall:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="poster" name="poster" placeholder="Poster" >
                                @error('poster_wide')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>

                        <div class="form-group row">
                            <label for="inputPosterwide3" class="col-sm-2 col-form-label text-white">Poster Wide:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="poster_wide" name="poster_wide" placeholder="Posterwide" >
                                @error('poster_wide')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                    
                        
                        
                        <button class="btn btn-primary"><i class="fa fa-plus add" aria-hidden="true" id="add"></i> Tambahkan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

        

            {{-- <div class="form-group row">
                <label for="inputUmur3" class="col-sm-2 col-form-label text-white">Umur</label>
                <div class="col-sm-10 input__item">
                    <input type="number" class="form-control" id="inputUmur3" name="Umur" placeholder="Umur" >
                    @error('umur')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            
            </div>
    
            <div class="form-group row">
                <label for="inputSinopsis3" class="col-sm-2 col-form-label text-white">Sinopsis</label>
                <div class="col-sm-10 input__item">
                    <textarea type="textarea" class="form-control" id="inputSinopsis3" name="Sinopsis" placeholder="Sinopsis" rows="5" cols="50"></textarea>
                    @error('Sinopsis')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
@endsection
