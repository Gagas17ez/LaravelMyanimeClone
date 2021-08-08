@extends('layouts.app')

@section('content')
<section class=" spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login__form">
                    <h3>Create Profile:</h3>>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label  text-white">{{ __('Name') }}</label>

                            <div class="col-sm-10 input__item">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label  text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-10 input__item">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label  text-white">{{ __('Password') }}</label>

                            <div class="col-sm-10 input__item">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-2 col-form-label  text-white">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-10 input__item">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 
<section class=" spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login__form">
                    <h3>Create Anime:</h3>
                    <form action="/anime" method="POST" enctype="multipart/form-data">
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
                            <label for="inputPoster3" class="col-sm-2 col-form-label text-white">Poster:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="poster" name="poster" placeholder="Poster" >
                                @error('Poster')
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
</section> --}}
@endsection
