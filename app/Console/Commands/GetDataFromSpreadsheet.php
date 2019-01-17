<?php

namespace App\Console\Commands;

use App\Gamemode;
use App\Today;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Console\Command;

class GetDataFromSpreadsheet extends Command
{

    private $spreadsheetId = "10RbKyc3yXgQCClFZihT7YTEQrbC6XHuGq73pQSiPjBg";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getdata:spreadsheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab\'s Today\'s gamemodes in Overwatch from the shared Google Spreadsheet';

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
        if (!Today::alreadyHaveGamemodeToday()) {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLESHEETS_APIKEY'));
            $service = new Google_Service_Sheets($client);

            $range = "Daily!A3:F";
            $response = $service->spreadsheets_values->get($this->spreadsheetId, $range);
            $gamemodes = end($response->values);

            $date = \Carbon\Carbon::createFromTimeString($gamemodes[0]);
            if(!$date->isToday()){
                $this->info("Last entry date is not from today");
                return;
            }

            $today = new Today();
            $today->tile_1 = Gamemode::getGamemodeIdByName($gamemodes[1]);
            $today->tile_2 = Gamemode::getGamemodeIdByName($gamemodes[2]);
            $today->tile_3 = Gamemode::getGamemodeIdByName($gamemodes[3]);
            $today->tile_4 = Gamemode::getGamemodeIdByName($gamemodes[4]);
            $today->tile_5 = Gamemode::getGamemodeIdByName($gamemodes[5]);
            $today->created_by = 1337;
            $today->save();
        }
    }
}
