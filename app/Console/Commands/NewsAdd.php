<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Theme;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Carbon\Carbon;

class NewsAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'news:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '1日1回定時にランダムでNEWS APIからトピックを１つDBに格納する。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = 1;

        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url') .'top-headlines?country=jp&pageSize='.$count.'&apiKey=' . config('newsapi.news_api_key'));
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $news = [];

            for ($idx = 0; $idx < $count; $idx++) {
                array_push($news, [
                    'title' => $response['articles'][$idx]['title'],
                    'url' => $response['articles'][$idx]['url'],
                    'image' => $response['articles'][$idx]['urlToImage'],
                    'description' => $response['articles'][$idx]['description'],
                ]);
            }
              $theme = new Theme;
              $theme -> title      = $news[0]['title'];
              $theme -> url        = $news[0]['url'];
              $theme -> image        = $news[0]['image'];
              $theme -> description =$news[0]['description'];
              $theme -> save();

        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }
}
