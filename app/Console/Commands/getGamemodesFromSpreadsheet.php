<?php

namespace App\Console\Commands;

use Google_Client;
use Google_Service_Sheets;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class getGamemodesFromSpreadsheet extends Command
{
    private $spreadsheetId = "10RbKyc3yXgQCClFZihT7YTEQrbC6XHuGq73pQSiPjBg";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getgamemode:spreadsheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab all gamemodes from Google spreadsheet';

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
        $client = new Google_Client();
        $client->setDeveloperKey(env('GOOGLESHEETS_APIKEY'));
        $service = new Google_Service_Sheets($client);

        $range = "Gamemodes!A3:D";
        $response = $service->spreadsheets_values->get($this->spreadsheetId, $range);
        $gamemodes = [];

        // Gamemodes info
        foreach ($response as $gamemode) {
            $gamemodes[] = [
                "name" => $gamemode[0],
                "players" => $gamemode[1],
                "code" => strtolower(str_replace([" ", "’", "'", "-"], "", $gamemode[0])),
                "emoji" => $gamemode[3] ?? null
            ];
        }

        File::put('database/data/gamemodes-spreadsheet.json', json_encode($gamemodes));
    }
}
