@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your published articles</div>
                    <div class="panel-body">
                        @foreach ($articles as $article)
                            <div class="panel panel-default">

                                <div class="panel-heading">This is an article titled</div>
                                <div class="panel-body">
                                    {{ $article->content }}
                                </div>
                            </div>
                        @endforeach

                        <h3>{{ $user->title  }}</h3>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection