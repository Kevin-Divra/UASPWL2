<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Babyneed;

class BabyneedsController extends Controller
{
   /**
    * Display a listing of the item.
    *
    * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return Babyneed::get();
    }

    /**
     * Store a newly created item in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response            
     */
    public function store(Request $request)
    {
        try{
        $babyneedss = new Babyneed;
        $babyneedss->fill($request->validated())->save();
        
        return $babyneedss;

    }catch(\Exception $exception){
        throw new HttpException(400, "Invalid data : {$exception->getMessage}");
        }
    }

    /**
     * Display the specified item.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $babyneedss = Babyneed::findOrfail($id);

        return $babyneedss;
    }

    /**
     * Update the specified item in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "invalid id");
        }

        try {
            $babyneedss = Babyneed::find($id);
            $babyneedss->fill($request->validated())->save();

            return $babyneedss;

        } catch(\Exception $exception){
            throw new HttpException(400, "Invalid data - {$exception->getmessage}");
        }
       
    }

    /**
     * Remove the specified item from storage.
     * 
     *  @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $babyneedss = Babyneed::findOrfail($id);
        $babyneedss->delete();

        return response()->json(null, 204);
    }
}
