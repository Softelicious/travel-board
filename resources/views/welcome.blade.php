@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <br/>
            @foreach ($tickets as $index => $ticket)
                <div class="ticket">
                    <a href="atostogos/{{$ticket->id}}">
                        <div class="foto-container">
                            <img src="{{$ticket['image']}}" alt="" >
                        </div>
                    </a>
                    <div class="info-container">
                        <div class="info-name">
                            {{str_limit($ticket->name, 15, '...')}}
                        </div>
                        <div class="info-description">
                            {{str_limit($ticket->description, 40, '...')}}
                        </div>
                    </div>
                    <form id="like-form l{{$index}}" method="post" action='like'>
                        <label for="sub{{$index}}" class="likes">
                            <div class="far fa-heart heart"   style="color: {{ session()->exists('id_'.$ticket->id) ? "red" : "black" }}"></div>
                            <div class="like-count">{{$ticket->likes}}</div>
                        </label>
                        <input type="hidden" value="{{$ticket->id}}" name="index" id="index">
                        @csrf
                        <input style="display: none" id="sub{{$index}}" name="sub{{$index}}" type="submit">
                    </form>
                    @auth
                        <form class="submit" method="post" action='delete' >
                            <label for="del{{$index}}" class="far fa-trash-alt del"></label>
                            <input type="hidden" value="{{$ticket->id}}" name="id" id="id">
                            @csrf
                            <input style="display: none" id="del{{$index}}" name="del{{$index}}" type="submit">
                        </form>
                    @endauth
                </div>
            @endforeach
        <br/>
    </div>
@endsection