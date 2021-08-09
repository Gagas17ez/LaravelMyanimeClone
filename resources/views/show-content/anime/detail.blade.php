@extends('master')

@section('genre')

@endsection

@section('hero')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/anime"><i class="fa fa-home"></i> Home</a>
                    <a href="/anime/{{$anime->id}}">Detail</a>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg">
                        <img src="{{asset('poster/'.$anime->poster)}}" height="375px" width="auto">
                        <div class="comment"><i class="fa fa-comments"></i> {{count($comment)}}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{$anime->viewcount}}</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{$anime->judul}}</h3>
                            
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span></span>
                        </div>
                        <p>{{$anime->sinopsis}}</p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Type:</span>{{$anime->type}}</li>
                                        <li><span>Studios:</span>{{$anime->studio}}</li>
                                        <li><span>Date aired:</span>{{$anime->aired_date}}</li>
                                        <li><span>Status:</span>{{$anime->status}}</li>
                                        <li><span>Genre:</span> </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            
                            @if (Auth::user()->status == 'admin')
                                <a href="#" class="follow-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a href="#" class="follow-btn mx-5 thedelete" type="submit"
                                onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <i class="fa fa-eye" aria-hidden="true"></i> Delete</a>
                                <form role="form" action="/anime/{{$anime->id}}" method="post" style="display: none;" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="anime__trailer">
                Trailer
                <iframe width="1256" height="628" src="{{$anime->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <br><br><div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($comment as $item)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{asset('profilepic/'.$item->profile_pic)}}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>{{$item->nama_komentar}}<span>    Rating : {{$item->rating}}</span></h6>
                                <p>{{$item->komentar}}</p>
                                <div style="text-align: right;">
                                    <small><a href=""></a></small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="/komentar" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea class="form-control" id="komentar" name="komentar" placeholder="Komentar"></textarea>
                            @error('komentar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <h5>Your Rating</h5>
                            <input type="hidden" id="anime_id" name="anime_id" value="{{$anime->id}}" >
                            <input type="number" class="form-control" id="rating" name="rating" placeholder="Rating" ><br>
                                @error('rating')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <button type="submit"><i class="fa fa-location-arrow"></i>Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        @foreach ($listanime as $item)
                        <div class="product__sidebar__view__item set-bg">
                            <img src="{{asset('poster_wide/'.$item->poster_wide)}}">
                            <div class="ep">{{$item->episode_count}}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{$item->type}}</div>
                            <h5><a href="/anime/{{$item->id}}">{{$item->judul}}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection