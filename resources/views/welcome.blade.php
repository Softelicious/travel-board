@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <br>
        <form action="{{ url('save') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="foto-container">
                <div class="foto-preview">
                    <img id="blah" src="https://www.utrgv.edu/_files/images/general-placeholder-image.jpg" alt="nuotrauka nepasirinkta" height="300px" width="300px" />
                </div>
                <div class="foto-select">
                    <input type='file' id="image" value="pasirink" name="image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
                </div>
            </div>
            <div class="info-container">
                <input  class="info-name" type="text" name="name" placeholder="keliones pavadinimas">
                <textarea class="info-description" name="description" placeholder="keliones aprasymas" id="description" ></textarea>
            </div>

            <div class="submit">
                <button type="submit" class="btn btn-success">Įkelti</button>
            </div>
        </form>
        <br>
        <hr>
        <br>
        @foreach ($tickets as $ticket)
            <div class="ticket">
                <div class="foto-container">
                    <img src="{{$ticket['image']}}" alt="" height="300px" width="300px">
                </div>
                <div class="info-container">
                    <div class="info-name">
                        {{$ticket->name}}
                    </div>
                    <div class="info-description">
                        {{$ticket->description}}
                    </div>
                </div>
{{--                <div>--}}
{{--                    <div>Likes {{$ticket['likes']}}</div>--}}
{{--                </div>--}}
                @auth
                    <div  class="submit">
                        <form action="delete" method="post">
                            @csrf
                            <input name="id" type="hidden" value={{$ticket->id}}>
                            <input type="submit" value="Ištrinti" class="btn btn-danger">
                        </form>
                    </div>
                @endauth
            </div>

            <br/>
        @endforeach
        <br/>
    </div>
@endsection