@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Who's your daddy?</div>
                    <div class="panel-body">
                        {{ $message  }}
                        @foreach ($articles as $article)
                            This is an article titled
                            <h3>
                                {{ $article->title }}
                            </h3>
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