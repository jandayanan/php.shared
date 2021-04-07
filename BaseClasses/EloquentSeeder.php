<?php

namespace Shared\BaseClasses;
use Illuminate\Support\Facades\DB;

/**
 * Class Controller
 * @package App\Http\Controllers
 *
 * @function all() Retrieves all related data of a specific definition
 */
abstract class EloquentSeeder extends \Illuminate\Database\Seeder
{
    public function execute( $target ){
        $data = $target;
        if( array_key_exists ( "table", $target) ){
            $data = [];
            $data[] = $target;
        }

        foreach( (array) $data as $target ){
            echo "SEEDING: " . $target['table'] . "\n";
            DB::table( $target['table'] )
                ->insert( $target['items'] );
        }
    }
}
