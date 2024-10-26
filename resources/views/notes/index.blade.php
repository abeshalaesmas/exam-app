<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=@, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')
    @section('content')
    <h1>YOUR NOTES</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($notes->isEmpty())
        <p>No notes found.</p>
    @else
        <ul class="list-group">
            @foreach ($notes as $note)
                <li class="list-group-item">
                    <h4>{{ $note->title }}</h4>
                    <p>{{ $note->content }}</p>
                    <!-- <form action="{{ route('notes.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->
                </li>
            @endforeach
        </ul>
    @endif
</div>
    @endsection
</body>
</html>