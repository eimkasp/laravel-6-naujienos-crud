@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1> Naujienos </h1>

                <div class="row">
                    @foreach($newsItems as $item)
                        <div class="col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="https://thumbs.dreamstime.com/b/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('news.show', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        Cia bus naujienos aprasymas
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Naujienos autrius cia bus</li>
                                    <li class="list-group-item">Komentaru skaicius</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Redaguoti link</a>
                                    <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="X" />

                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection