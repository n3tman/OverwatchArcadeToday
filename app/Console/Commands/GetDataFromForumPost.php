<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Sunra\PhpSimple\HtmlDomParser;

class GetDataFromForumPost extends Command
{
    private $forumurl = "https://us.forums.blizzard.com/en/overwatch/t/wiki-what-arcade-modes-are-available-today/391/999999";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getdata:forum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab\'s Today\'s gamemodes in Overwatch on the Overwatch forums';

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
     * @return mixed
     */
    public function handle()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->forumurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36");
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        try {
//            $output = curl_exec($ch);
//            File::put('database/data/forum.html', $output);
            $output = File::get('database/data/forum.html');
            $html = HtmlDomParser::str_get_html($output);
            $this->info(count( $html->find('div[itemscope][itemtype=http://schema.org/DiscussionForumPosting]')));
            $this->info( $html->find('div[itemscope][itemtype=http://schema.org/DiscussionForumPosting]')[19]);

        } catch (\Exception $exception) {
            return ($exception);
        }
    }
}
