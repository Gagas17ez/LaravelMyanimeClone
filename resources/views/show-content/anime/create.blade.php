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
                    <form role="#" action="/#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputJudul3" class="col-sm-2 col-form-label text-white">Judul:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputJudul3" name="judul" placeholder="Judul" >
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputSinopsis3" class="col-sm-2 col-form-label text-white">Sinopsis</label>
                            <div class="col-sm-10 input__item">
                                <textarea type="textarea" class="form-control" id="inputSinopsis3" name="sinopsis" placeholder="Sinopsis" rows="5" cols="50" style="padding-left: 76px"></textarea>
                                @error('sinopsis')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputTipe3" class="col-sm-2 col-form-label text-white">Tipe:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputTipe3" name="ipe" placeholder="Tipe" >
                                @error('tipe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputEpisodecount3" class="col-sm-2 col-form-label text-white">Episode count:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputEpisodecount3" name="episode_count" placeholder="Episodecount" >
                                @error('episode_count')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputStatus3" class="col-sm-2 col-form-label text-white">Status:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputStatus3" name="status" placeholder="Status" >
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputAireddate3" class="col-sm-2 col-form-label text-white">Aired date:</label>
                            <div class="col-sm-10 input__item">
                                <input type="date" class="form-control" id="inputAireddate3" name="aired_date" placeholder="Aireddate" >
                                @error('aired_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="inputProducer3" class="col-sm-2 col-form-label text-white">Producer:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputProducer3" name="producer" placeholder="Producer" >
                                @error('producer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputStudio3" class="col-sm-2 col-form-label text-white">Studio:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputStudio3" name="studio" placeholder="Studio" >
                                @error('studio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputVideolink3" class="col-sm-2 col-form-label text-white">Video link:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="inputVideolink3" name="video_link" placeholder="Videolink" >
                                @error('video_link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputRating3" class="col-sm-2 col-form-label text-white">Rating:</label>
                            <div class="col-sm-10 input__item">
                                <input type="number" class="form-control" id="inputRating3" name="rating" placeholder="Rating" >
                                @error('rating')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputPoster3" class="col-sm-2 col-form-label text-white">Poster:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="inputPoster3" name="poster" placeholder="Poster" >
                                @error('Poster')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                        <button class="btn btn-info"><i class="fa fa-plus add" aria-hidden="true" id="add"></i> Tambahkan</button>
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
