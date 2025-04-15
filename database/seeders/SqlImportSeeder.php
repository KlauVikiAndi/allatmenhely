<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SqlImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        $sql = file_get_contents( __DIR__ . "/menhely.sql" );

        if( $sql === false ) {

            Log::error( "Sikertelen beolvasás: " . $sqlFilePath );
            return;
        }

        Log::info( "SQL file: " . $sql );

        DB::unprepared( $sql );

        Log::info( "SqlImportSeeder lefutott." );
    }
}