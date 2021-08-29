<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Carbon\Carbon;

class ThemeController extends Controller
{
    /**
     * トップ画面表示
     *　- $themeは常に最新のIDのお題を抽出（1件のみ）
     *  - $postsは$themeに紐づいている投稿を全て抽出
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $theme  = Theme::orderBy('id','desc')->first();
       $posts  = $theme -> posts() ->get();

       $count = 1;

        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url') .'top-headlines?country=jp&pageSize='.$count.'&apiKey=' . config('newsapi.news_api_key'));
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $news = [];

            for ($idx = 0; $idx < $count; $idx++) {
                array_push($news, [
                    'name' => $response['articles'][$idx]['title'],
                    'url' => $response['articles'][$idx]['url'],
                    'thumbnail' => $response['articles'][$idx]['urlToImage'],
                ]);
            }

            $data = $news[0]['name'];

            //ニュースお題の日付(日時→「日にち」のみ表示)
            $date = $theme->created_at;
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $theme->created_at)->format('Y-m-d');

            //今日の日付（日にちのみ表示）
            $today = Carbon::now()->toDateString();

            //まず、一日に一回しか保存できないようにする。
            if( $date !== $today){
              $theme = new Theme;
              $theme -> title  = $data;
              $theme -> save();
            }


        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

       return view('theme.index',compact('theme','posts','news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        //
    }

}
