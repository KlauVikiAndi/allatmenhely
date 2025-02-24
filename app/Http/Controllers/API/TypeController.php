<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Resources\Type as TypeResource;

class TypeController extends ResponseController {

    public function getTypes() {

        $types = Type::all();

        return $this->sendResponse( TypeResource::collection( $types ), "Állatfajták betöltve");
    }   

    public function newType( TypeRequest $request ) {
      
            $request->validated();
            $type = new Type();

            $type->type = $request[ "type" ];
            $type->save();

            return $this->sendResponse( new TypeResource( $type ), "Állatfajta kiírva");     
    }

    public function modifyType( TypeRequest $request ) {

        $request->validated();

        $type = Type::find(request [$id] );
        if( !is_null( $type )) {

            $type->type = $request[ "type" ];

            $type->update();

            return $this->sendResponse( new TypeResource( $type ), "Állatfajta módosítva");

        }else {

            return $this->sendError( "Adathiba", [ "Nincs ilyen Állatfajta!" ], 406 );
        }

    }

    public function destroyType( Request $request ) {

        $type = Type::find( $request[ "id" ]);

        if( !is_null( $type )) {

            $type->delete();

            return $this->sendResponse( new TypeResource( $type ), "Állatfajta törölve" );

        }else {

            return $this->sendError( "Adathiba", [ "Állatfajta nem létezik!" ], 406 );
        }


    }

    public function getTypeId( $typeName ) {

        $type = Type::where( "type", $typeName )->first();

        $id = $type->id;

        return $id;
    }
}


