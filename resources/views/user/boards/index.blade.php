@extends('layouts.main')

@section('title', "User's board")


@section('content')
    @if(count($boards) == 0)
        <p>Aucun board</p>
        <a href="{{route('boards.create')}}">Ajouter un board</a>
    @else
        <p>Board : . </p>
        <a href="{{route('boards.create')}}">Ajouter un board</a>
    @endif
    @foreach ($boards as $board)
        <p>C'est le board "{{ $board->title }}". 
            @can('view', $board)
            <a href="{{route('boards.show', $board)}}">Détails</a> 
            @endcan
            @can('update', $board)
            <a href="{{route('boards.edit', $board)}}">Éditer</a></p></p>
            @endcan
            @can('delete', $board)
            <form action="{{route('boards.destroy', $board->id)}}" method='POST'>
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
            @endcan
    @endforeach
@endsection