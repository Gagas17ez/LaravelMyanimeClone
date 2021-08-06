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
                    <h3>Create Genre :</h3>
                    <form action="/genre" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputJudul3" class="col-sm-2 col-form-label text-white">genre :</label>
                            <div class="col-sm-10 inputitem">
                                <input type="text" class="form-control" id="genre" name="genre" placeholder="genre" >
                                @error('genre')
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
@endsection