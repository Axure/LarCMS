@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>
                    {{ $article->title  }}
                </h2>

                <div>
                    {{ $article->content  }}
                </div>

                <div class="article-comment-list">
                    @foreach($comments as $comment)

                        <ol>
                            <div class="panel panel-default">
                                <div class="panel-heading"> {{ $comment->author  }}, created
                                    at {{ $comment->created_at  }}</div>
                                <div class="panel-body">  {{ $comment->content }}</div>
                            </div>
                        </ol>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection