@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1> Sukurti naujiena </h1>

                {{-- validacijos klaidu atvaizdavimas--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <form method="post" action="{{ route('news.store') }}">
                    @csrf
                    <div>
                        <input type="text" name="title" required value="{{ old('title') }}" class="form-control" />
                    </div>

                    <div>
                       <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                    </div>

                    <input type="submit" value="Sukurti naujiena" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
@endsection