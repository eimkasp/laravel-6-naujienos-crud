@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1> {{ $newsItem->title }} </h1>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <img class="card-img-top"
                                 src="https://thumbs.dreamstime.com/b/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ $newsItem->content }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Autorius: {{ $newsItem->author->name }}
                                </li>
                                <li class="list-group-item">Komentaru skaicius</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Redaguoti link</a>
                                <a href="#" class="card-link">Trinti link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h2>Komentarai</h2>
                        <hr>

                        <h3>Rasyti komentara</h3>

                        @guest
                            <h5> Jei norite komentuoti, prasome
                                <a href="{{ route('login') }}">
                                    prisijungti
                                </a>
                            </h5>
                        @else
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <textarea name="content" placeholder="Iveskite komentaro teksta"
                                          class="form-control"></textarea>
                                <input type="hidden" name="news_id" value="{{ $newsItem->id }}"/>
                                <div>
                                    <input type="submit" class="btn btn-success mt-3" value="Siusti"/>
                                </div>
                            </form>
                        @endguest
                    </div>

                    <div class="col-md-12 mt-3">
                        <h3>Naujausi komentarai</h3>

                        @foreach($newsItem->comments as $comment)
                            <div class="card mt-3">
                                <div class="card-header">
                                    {{ $comment->user->name }}
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>
                                            {{ $comment->content }}
                                        </p>
                                        <footer class="blockquote-footer">
                                            Paskelbtas {{ $comment->created_at }}
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                @guest
                    {{-- neprisijungusiam varototjui nerodome jokiu mygtuku --}}
                @else
                    <h6>Naujienos valdymas</h6>

                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="X"/>

                    </form>
                @endguest

            </div>


        </div>
    </div>
@endsection