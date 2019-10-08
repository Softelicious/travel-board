@extends('layouts.app')

@section('content')
<div class="container atostogos">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(count($data['tags'])>0)
                        Žymės:
                        @foreach($data['tags'] as $tag)
                            <div class="zyme btn btn-dark">{{$tag}}</div>
                        @endforeach
                    @endif
                </div>

                <div class="card-body imageContainer">
                    <img src="{{'/'.$data['ticket']->image}}" alt="">
                </div>
                <div class="card-body">
                   <h3>{{$data['ticket']->name}}</h3>
                </div>
                <div class="card-body">
                    {{$data['ticket']->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
