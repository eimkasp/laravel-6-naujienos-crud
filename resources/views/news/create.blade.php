@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1> Sukurti naujiena </h1>

                <form method="post" action="{{ route() }}">
                    <div>
                        <input type="text" name="title" class="form-control" />
                    </div>

                    <div>
                       <textarea name="content" class="form-control"></textarea>
                    </div>

                    <input type="submit" value="Sukurti naujiena" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>
@endsection