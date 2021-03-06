@extends('master')

@section('style')
    {{ HTML::style("/css/team-profile.css") }}
@stop

@section('content')
    <!-- breadcrumbs -->
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                @if( $league )
                    <li><a href="{{{ $league->url }}}"> {{{ $league->name }}} </a></li>
                @endif
                <li class="active"><a href="{{{ $team->url }}}"> {{{ $team->name }}} </a></li>
            </ol>
        </div>
    </div>

    <!-- general team info -->
    <div class="row team-info">
        <div class="col-sm-10">
            <h2><strong>{{{ $team->name }}}</strong></h2>
            <h3>
                Currently in: <a href="{{ $league->url }}">{{{ $league->name }}}</a>
            </h3>
        </div>
        <div class="col-sm-2">
            <img class="team-badge pull-right" src="{{{ $team->badge_image_url }}}" alt="{{{ $team->name }}} badge missing.">
        </div>
    </div>

    <!-- team players -->
    <div class="row">
        <div class="col-sm-12">
            <h4>Featuring</h4>
        </div>
        @foreach( $team->last_known_players as $player )
            <div class="col-sm-3 player-thumbnail">
                <a href="{{ $player->url }}">
                    <img class="player-image" src="{{{ $player->image_url }}}" alt="{{{ $player->name }}} profile image missing.">
                    <p class="name">{{{ $player->name }}}</p>
                </a>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script>
        $(function(){
            
        });
    </script>
@stop