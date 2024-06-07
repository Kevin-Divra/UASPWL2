<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Babyneed;
use OpenApi\Annotations as OA;

/**
 * Class BabyneedsController.
 * 
 * @author Bambang <bambang.422023005@civitas.ukrida.ac.id>
 */

class BabyneedsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/babyneed",
     *     tags={"Babyneeds"},
     *     summary="Display a listing of items",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="seccessful",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Parameter(
     *         name="_page",
     *         in="query",
     *         description="current page",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             example=1
     *       )
     *     ),
     *     @OA\Parameter(
     *         name="_limit",
     *         in="query",
     *         description="max item in a page",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             example=10
     *        )
     *     ),
     *     @OA\Parameter(
     *         name="_search",
     *         in="query",
     *         description="word to search",
     *         required=false,
     *         @OA\Schema (
     *             type="string",
     *       )
     *    ),
     *    @OA\Parameter(
     *        name="_size",
     *        in="query",
     *        description="search by size",
     *        required=false,
     *        @OA\Schema(
     *            type="string",
     *       )
     *    ),
     *    @OA\Parameter(
     *        name="_sort_by",
     *        in="query",
     *        description="word to search",
     *        required=false,
     *        @OA\Schema (
     *            type="string",
     *            example="latest"
     *       )
     *     ),
     * )
     */
    public function index(Request $request)
    {
        try {
            $data['filter']       = $request->all();
            $page                 = $data['filter']['_page']  = (@$data['filter']['_page'] ? intval($data['filter']['_page']) : 1);
            $limit                = $data['filter']['_limit'] = (@$data['filter']['_limit'] ? intval($data['filter']['_limit']) : 1000);
            $offset               = ($page?($page-1)*$limit:0);
            $data['products']     = Babyneed::whereRaw('1 = 1');
            
            if($request->get('_search')){
                $data['products'] = $data['products']->whereRaw('(LOWER(Nama) LIKE "%'.strtolower($request->get('_search')).'%")');
            }
            if($request->get('_size')){
                $data['products'] = $data['products']->whereRaw('LOWER(size) = "'.strtolower($request->get('_size')).'"');
            }
            if($request->get('_sort_by')){
            switch ($request->get('_sort_by')) {
                default:
                case 'latest_added':
                $data['products'] = $data['products']->orderBy('created_at','DESC');
                break;
                case 'Nama_asc':
                $data['products'] = $data['products']->orderBy('Nama','ASC');
                break;
                case 'Nama_desc':
                $data['products'] = $data['products']->orderBy('Nama','DESC');
                break;
                case 'price_asc':
                $data['products'] = $data['products']->orderBy('price','ASC');
                break;
                case 'price_desc':
                $data['products'] = $data['products']->orderBy('price','DESC');
                break;
            }
            }
            $data['products_count_total']   = $data['products']->count();
            $data['products']               = ($limit==0 && $offset==0)?$data['products']:$data['products']->limit($limit)->offset($offset);
            // $data['products_raw_sql']       = $data['products']->toSql();
            $data['products']               = $data['products']->get();
            $data['products_count_start']   = ($data['products_count_total'] == 0 ? 0 : (($page-1)*$limit)+1);
            $data['products_count_end']     = ($data['products_count_total'] == 0 ? 0 : (($page-1)*$limit)+sizeof($data['products']));
           return response()->json($data, 200);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
        }
    }

    /**
     * @OA\Post(
     *      path="/api/babyneed",
     *      tags={"Babyneeds"},
     *      summary="Store a newly created item",
     *      operationId="store",
     *       @OA\Response(
     *           response=400,
     *           description="invalid input",
     *           @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *           response=201,
     *           description="successful",
     *           @OA\JsonContent()
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Babyneed",
     *              example={ "nama": "DENIM JOGGERS SET", "size": "8 bulan",   "price": "15000", 
     *                        "description": "baju ini sangat nyaman dan tipis tidak membuat bayi keringatan",
     *                        "image": "https://freepngimg.com/thumb/jeans/54011-8-baby-clothes-free-photo-png.png"            
     *              }
     *          ),
     *      ),
     *      security={{"passport_token_ready":{},"passport":{}}}
     * )
     */
    public function store(Request $request)
    {
        try{
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'size' => 'required',
        ]);
        if ($validator->fails()){
            throw new HttpException(400, $validator->messages()->first());
        }
        $babyneedss = new Babyneed;
        $babyneedss->fill($request->all())->save();
        return $babyneedss;

    } catch(\Exception $exception) {
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
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Parameter(
     *            name="id",
     *            in="path",
     *            description="ID of item that needs to be displayed",
     *            required=true,
     *            @OA\Schema(
     *                type="integer",
     *                format="int64"
     *          )
     *      ),
     * )
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
 *              example={ "nama": "JOGGERS SET", "size": "9 bulan", "price": "500000", 
 *                        "description": "baju ini sangat hangat sehingga akan membuat bayi anda tetap hangat",
 *                        "image": "https://freepngimg.com/png/53976-baby-clothes-download-hq-png"
 *               }                     
 *          ),
 *      ),
 *      security={{"passport_token_ready":{},"passport":{}}}
 * )
 */
    public function update(Request $request, $id)
    {
        $babyneedss = Babyneed::find($id);
        if (!$babyneedss) {
            throw new HttpException(404, "item not found");
        }

        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'size' => 'required',
            ]);
            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }
           $babyneedss->fill($request->all())->save();
           return response()->json(array('message'=> 'Updated successfuly'), 200);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
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
     *      security={{"passport_token_ready":{},"passport":{}}}
     *   )
     */
    public function destroy($id)
    {
        $babyneedss = Babyneed::find($id);
        if(!$babyneedss){
            throw new HttpException(404, 'item not found');
        }

        try {
            $babyneedss->delete();
            return response()->json(array('message'=> 'Deleted successfully'), 200);

        } catch(\Exception $exception){
            throw new HttpException(400, "Invalid data : {$exception->getMessage()}");
        }
    }
}