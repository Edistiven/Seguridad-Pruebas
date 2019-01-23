<?php

namespace App\Http\Controllers;
use App\Account;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createAccounts(Request $request)
    {
        try{

            $data = $request->json()->all();
            $dataAccount = $data['account'];
            //DB::beginTransaction();
            $account = Account::create([

                'email' => ($dataAccount['email']),
                'alternative_email' => ($dataAccount['alternative_email']),
                'name' => ($dataAccount['name']),
                'password' => Hash::make($dataAccount['password']),
                //'password' => ($dataAccount['password']),
                'token' => str_random(60),
                'role' => $dataAccount['role'],
                'state' => $dataAccount['state']
                //'password' => Hash::make($dataAccount['password']),//hash encriptar la clave

            ]);
            //DB::commit();
            return response()->json(['account' => $account], 201);
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

    public function getAllAccounts(Request $request){
        try {
            $accounts = Account::get()->first();
            return response()->json($accounts, 200);
        } catch (ModelNotFoundException $e) {
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

    function updateAccounts(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataAccount = $data['account'];
            $account = Account::findOrFail($dataAccount['id'])->update([
                'email' => ($dataAccount['email']),
                'alternative_email' => ($dataAccount['alternative_email']),
                'name' => ($dataAccount['name']),
                'password' => ($dataAccount['password']),
                'token' => str_random(60),
                'role' => $dataAccount['role'],
                'state' => $dataAccount['state']
            ]);
            return response()->json($account, 201);
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
