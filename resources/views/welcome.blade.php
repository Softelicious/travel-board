@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <br/>
            @foreach ($tickets as $index => $ticket)
                <div class="ticket">
                    <div class="foto-container">
                        <img src="{{$ticket['image']}}" alt="" >
                    </div>
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
                        <div  class="submit">
                            <div class="far fa-trash-alt del" onclick="event.preventDefault();
                                                document.getElementById('delete').submit();">
                            </div>
                            <form class="trash" action="delete" id="delete" method="post">
                                @csrf
                                <input name="id" type="hidden" value={{$ticket->id}}>
{{--                                <input type="submit" value="Ištrinti" class="btn btn-danger">--}}
                            </form>
                        </div>
                    @endauth
                </div>
                @if((1+$index)%5===0)
                    <br>
                @endif
            @endforeach
        <br/>
    </div>
@endsection