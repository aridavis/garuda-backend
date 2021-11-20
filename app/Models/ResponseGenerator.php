<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseGenerator extends Model
{
    use HasFactory;

    public static function ListResponse($data){
        return response()->json([
            "contents" => $data
        ]);
    }

    public static function PaginationResponse($temp, $request){
        $data = $temp;

        if($request->sort != null){
            if($request->sort["sort_by"] != "" && $request->sort["direction"] != ""){
                $data = $data->orderBy($request->sort["sort_by"], $request->sort["direction"]);
            }
        }

        $data = $data->paginate($request->paging["size"], ['*'], 'page', $request->paging["page"]);

        return response()->json([
            "contents" => $data->items(),
            "total_page" => $data->lastPage(),
            "data_count" => $data->total()
        ]);
    }

    public static function SingleResponse($data){
        return response()->json([
            "content" => $data
        ]);
    }

    public static function ErrorResponse($data){
        try{
            if($data[strlen($data) - 1] == "."){
                return response()->json([
                    "message" => substr($data,0 ,-1)
                ], 400);
            }
            else{
                return response()->json([
                    "message" => $data
                ], 400);
            }
        }catch (\Exception $exception){
            return response()->json([
                "message" => $data
            ], 400);
        }
    }

    public static function NotFound($data){
        return response()->json([
            "message" => $data
        ], 404);
    }

    public static function FormikError($data){
        return response()->json($data, 400);
    }

    public static function Unauthorized(){
        return response()->json([
            "message" => "unauthorized"
        ], 401);
    }
}
