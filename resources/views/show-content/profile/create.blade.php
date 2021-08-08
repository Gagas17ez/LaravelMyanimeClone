@extends('master')

@section('hero')
    
@endsection

@section('subtitle')
    Biodata Pemain:
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
                    <h3>Create Profile:</h3>
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="inputNotlp3" class="col-sm-2 col-form-label text-white">Notlp:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Notlp" >
                                @error('no_tlp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTgllahir3" class="col-sm-2 col-form-label text-white">Tanggal Lahir:</label>
                            <div class="col-sm-10 input__item">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tgllahir" >
                                @error('tgl_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTempatlahir3" class="col-sm-2 col-form-label text-white">Tempat lahir:</label>
                            <div class="col-sm-10 input__item">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempatlahir" >
                                @error('tempat_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
            
                        <div class="form-group row">
                            <label for="inputBio3" class="col-sm-2 col-form-label text-white">Bio:</label>
                            <div class="col-sm-10 input__item">
                                <textarea type="textarea" class="form-control" id="bio" name="bio" placeholder="Bio" rows="5" cols="50" style="padding-left: 76px"></textarea>
                                @error('bio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputProfilepic3" class="col-sm-2 col-form-label text-white">Profile Picture:</label>
                            <div class="col-sm-10 input__item">
                                <input type="file" class="form-control" id="profile_pic" name="profile_pic" placeholder="Profilepic" >
                                @error('profile_pic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>                
                        </div>
                    
                        <button class="btn btn-info"><i class="fa fa-plus add" aria-hidden="true" id="add"></i> Tambahkan</button>
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
                <label for="inputBio3" class="col-sm-2 col-form-label text-white">Bio</label>
                <div class="col-sm-10 input__item">
                    <textarea type="textarea" class="form-control" id="inputBio3" name="Bio" placeholder="Bio" rows="5" cols="50"></textarea>
                    @error('Bio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
@endsection