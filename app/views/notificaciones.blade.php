@extends('layout')
@section('contenido')
    <div class="container">
        <ul class="collection">
            <li class="collection-item center">
                <a href="ajax/leer-notificaciones"> Marcar Todas Como Leidas</a>
            </li>
            @forelse($notificaciones as $notificacion)
                <li class="collection-item">
                    <a href="ajax/marcar-leido/{{$notificacion->id}}" class="secondary-content badge @if($notificacion->leido ==0) blue @else white black-text @endif">
                        @if($notificacion->leido)
                            <i class="fa fa-bell-o fa-lg"></i>
                            Marcar como no leido
                        @else
                            <i class="fa fa-bell fa-lg"></i>
                            Marcar como leido
                        @endif
                    </a>
                    <p>{{$notificacion->mensaje}} <br>
                        <b>{{traducir_fecha(Carbon::now()->diffForHumans($notificacion->created_at))}}</b>
                    </p>
                </li>
            @empty

            @endforelse
        </ul>
        {{$notificaciones->links()}}
    </div>
@endsection