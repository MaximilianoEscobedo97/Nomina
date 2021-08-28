<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class General
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseRegisterNotFound()
    {
        return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 400, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseRegisterError()
    {
        return response()->json(['success' => false, 'message' => 'Ocurrió un érror al crear el registro'], 400, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseSuccess()
    {
        return response()->json(['success' => true , 'message' => 'Acción realizada con éxito'], 200, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseSuccessWithParams($params)
    {
        $body = ['success' => true , 'message' => 'Acción realizada con éxito'] + $params;
        return response()->json($body, 200, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public static function ResponseErrorWithParams($params)
    {
        $body = ['success' => false , 'message' => 'Error'] + $params;
        return response()->json($body, 400, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function makeResponse($body = [], $status = 200, $success = true)
    {
        $body = ['success' => $success] + $body;
        return response()->json($body, $status, [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE /*| JSON_NUMERIC_CHECK*/);
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function validateRequest($request, $rules = null)
    {
        $validator = Validator::make($request, $rules);
        return $validator->fails() ? General::makeResponse($validator->errors()->toArray(), 400, false) : [];
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function snakeCase($request)
    {
        if(!is_array($request))
            return Str::snake($request);

        foreach ($request as $key => $data)
            $request[$key] = Str::snake($data);

        return $request;
    }
}
