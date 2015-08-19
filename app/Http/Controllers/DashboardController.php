<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   $user = \Auth::user();
        $articles = $user->publishedArticles;

        $managedComments = $user->managedComments;
        $publishedComments = $user->publishedComments;

        /**
         * The new article (which is redundant and only for test.)
         * @var $newArticle
         */
        $newArticle = new \App\Article([
            'title' => 'This is added manually?',
            'content' => 'I don\'t know',
        ]);

        $user->publishedArticles()->save($newArticle);

        return view('dashboard', [
            'user' => $user,
            'articles' => $articles,
            'message' => 'Who\'s your daddy?',
            'managedComments' => $managedComments,
            'publishedComments' => $publishedComments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
