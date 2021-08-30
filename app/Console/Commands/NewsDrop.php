<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Theme;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NewsDrop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'NEWSをDBに登録して7日経ったら削除する。';

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

        $post = Post::whereDate('created_at','<',now()->subDay(7));
        $themes = Theme::whereDate('created_at','<',now()->subDay(7));
        $post -> delete();
        $themes -> delete();
    }
}
