@extends('admin')
@section('title', 'Admin Panel')
@section('body', 'donate')
@section('content')
    <div class="container"> 
        <form action="/" method="POST">

            <h4>{{$set->name}}</h4>
            <h5>A total of {{count($set->purchases)}} donations have been collected providing a total of <strong><span class="green-text">${{count($squares) * $set->price}}</span></strong> to be raised.</h5>

            <div class="donate-container">
                <div class="donate-overlay">
                    @foreach ($set->squares as $square)
                        @if(count($square->purchase) > 0)
                            @if(isset($square->purchase[0]->media))
                                @include('square.taken.media', ['square' => $square])
                            @else
                                @include('square.taken.index', ['square' => $square])
                            @endif
                        @else
                            @include('square.available', ['square' => $square])
                        @endif
                    @endforeach
                </div>

                <img id="donate-img" src="{{ URL::to('/') }}/img/floorplan.jpg" alt="Unsplashed background img 2" style="width:100%;" />
            </div>
        </form>
    </div>
@endsection