@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        <script>
                            function hideAlert(){
                                window.location.href = "/anime";
                            }
                            setTimeout("hideAlert()", 2000);
                        </script>
                        
                    @endif

                    You are logged in!
                    <a href="/anime">Click here go to the animelist!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
