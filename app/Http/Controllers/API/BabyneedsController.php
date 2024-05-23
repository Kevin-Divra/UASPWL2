<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Babyneed;
use OpenApi\Annotations as OA;

/**
 * Class Babyneed.
 * 
 * @author Bambang <bambang.422023005@civitas.ukrida.ac.id>
 */
class BabyneedsController extends Controller
{
   /**
    * @OA\Get(
    *   path="/api/babyneed",
    *   tags={"Babyneeds"},
    *   summary="Display a listing of items",
    *  operationId="index",
    *   @OA\Response(
    *       response=200,
    *       description="seccessful",
    *       @OA\JsonContent()
    *     )
    * )
    */
    public function index()
    {
        return Babyneed::get();
    }
    
    /**
     * @OA\Post(
     *      path="/api/babyneed",
     *      tags={"Babyneeds"},
     *      summary="Store a newly created item",
     *      operationId="store",
     *       @OA\Response(
     *          response=400,
     *          description="invalid input",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=201,
     *          description="successful",
     *          @OA\JsonContent()
     *      ),
     * 
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Babyneed",
     *              example={"Nama": "T SHIRT AND DENIM JOGGERS SET", "ukuran": "6 bulan",
     *                      "image": "https://freepngimg.com/png/53976-baby-clothes-download-hq-png",
     *                      "description" : "baju ini sangat nyaman dan tipis tidak membuat bayi keringatan.",
     *                      "price" : 50000
     *              }
     *          ),
     *      )   
     * )         
     */
     public function store(Request $request)
 {
     try {
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
         ]);
         if ($validator->fails()) {
            throw new HttpException(400, $validator->messages()->first());
         }
         $babyneedss = new Babyneed;
         $babyneedss->fill($request->all())->save();
         return $babyneedss;

     }catch(\Exception $exception){
        throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
     }
 }

    /**
     * @OA\Get(
     *      path="/api/babyneed/{id}",
     *      tags={"Babyneeds"},
     *      summary="Display the specified item",
     *      operationId="show",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid input",
     *          @OA\JsonContent()
     *      ),
     *  @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *       ),
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="ID of item that needs to be displayed",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *          )
     *      ),
     *     
     *   )
     */
    public function show($id)
    {
        $babyneedss = Babyneed::find($id);
        if(!$babyneedss){
            throw new HttpException(404, 'item not found');
        }

        return $babyneedss;
    }

    /**
 * @OA\Put(
 *      path="/api/babyneed/{id}",
 *      tags={"Babyneeds"},
 *      summary="Update the specified item",
 *      operationId="update",
 *      @OA\Response(
 *          response=404,
 *          description="item not found",
 *          @OA\JsonContent()
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="invalid input",
 *          @OA\JsonContent()
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful",
 *          @OA\JsonContent()
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID item that needs to be updated",
 *          required=true,
 *          @OA\Schema(
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          description="Request body description",
 *          @OA\JsonContent(
 *              ref="#/components/schemas/Babyneed",
 *              example={
 *                  "Nama": "T SHIRT AND DENIM JOGGERS SET",
 *                  "ukuran": "6 bulan",
 *                  "image": "https://freepngimg.com/png/53976-baby-clothes-download-hq-png",
 *                  "description": "baju ini sangat nyaman dan tipis tidak membuat bayi keringatan",
 *                  "price": 50000
 *              }
 *          )
 *      )
 * )
 */
    public function update(Request $request, $id)
    {
        $babyneedss = Babyneed::find($id);
        if (!$babyneedss) {
            throw new HttpException(400, "item not found");
        }

        try {
           $validator = Validator::make($request->all(), [
                'nama' => 'required',
           ]);
           if ($validator->fails()){
                throw new HttpException(400, $validator->messages()->first());
           }
         $babyneedss->fill($request->all())->save();
         return response()->json(array('message'=>'Updated sucessfully'), 200);
            return $babyneedss;

        } catch(\Exception $exception){
            throw new HttpException(400, "Invalid data : {$exception->getmessage()}");
        }  
    }

   /**
    * @OA\Delete(
    *     path="/api/babyneed/{id}",
    *     tags={"Babyneeds"},
    *     summary="Remove the specified item",
    *     operationId="destroy",
    *      @OA\Response(
     *          response=404,
     *          description="item not found",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=400,
     *          description="invalid input",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID item that needs to be updated",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
    *   )
    */
    public function destroy($id)
    {
        $babyneedss = Babyneed::find($id);
       if(!$babyneedss){
            throw new httpException(404, 'Item not found');
       }

       try {
            $babyneedss->delete();
            return response()->json(array('message'=>'Deleted successfully'), 200);
      
        } catch(\Exception $exception){
            throw new HttpException(400, "invalid data : {$exception->getMessage()}");
        }   
    }
}
