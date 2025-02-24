<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Http\Resources\Size as SizeResource;


class SizeController extends ResponseController {

    public function getSizes() {

        $types = Size::all();

        return $this->sendResponse( SizeResource::collection( $types ), "Típusok betöltve");
    }   

    public function newSize( SizeRequest $request ) {
      
        //    $request->validated();
            $size = new Size();

            $size->size = $request[ "size" ];
            $size->save();

            return $this->sendResponse( new SizeResource( $size ), "Típus kiírva");     
    }

    public function modifySize( SizeRequest $request ) {

        $request->validated();

        $size = Size::find(request [$id] );
        if( !is_null( $size )) {

            $size->size = $request[ "size" ];

            $size->update();

            return $this->sendResponse( new SizeResource( $size ), "Méret módosítva");

        }else {

            return $this->sendError( "Adathiba", [ "Nincs ilyen méret!" ], 406 );
        }

    }

    public function destroySize( Request $request ) {

        $size = Size::find( $request[ "id" ]);

        if( !is_null( $size )) {

            $size->delete();

            return $this->sendResponse( new SizeResource( $size ), "Méret törölve" );

        }else {

            return $this->sendError( "Adathiba", [ "Méret nem létezik!" ], 406 );
        }


    }

    public function getSizeId( $sizeName ) {

        $size = Size::where( "size", $sizeName )->first();

        $id = $size->id;

        return $id;
    }
}
