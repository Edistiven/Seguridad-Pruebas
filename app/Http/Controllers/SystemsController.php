<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Exception;
Use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
Use Illuminate\Database\Eloquent\ModelNotFoundException;

class SystemsController extends Controller
{
    public function createSystems(Request $request)
    {
        try{

            $data = $request->json()->all();
            $dataSystem = $data['system'];
            //DB::beginTransaction();
            $system = System::create([

                'system_name' => ($dataSystem['system_name']),
                'state' => ($dataSystem['state']),
                'url' => ($dataSystem['url']),
                //'password' => Hash::make($dataAccount['password']),//hash encriptar la clave

            ]);
            //DB::commit();
            return response()->json(['system' => $system], 201);
        }catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 409);
        } catch (\PDOException $e) {
            return response()->json($e, 409);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function getSystems($id)
    {
        try {
            $system = System::where('id', $id)->first();
            return response()->json(['system' => $system], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException  $e) {
            return response()->json($e, 405);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function updateSystems(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataSystem = $data['system'];
            $system = System::findOrFail($dataSystem['id'])->update([

                'system_name' => ucfirst ($dataSystem['system_name']),
                'state' => ($dataSystem['state']),
                'url' => ($dataSystem['url']),
            ]);
            return response()->json($system, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (QueryException $e) {
            return response()->json($e, 500);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

}
