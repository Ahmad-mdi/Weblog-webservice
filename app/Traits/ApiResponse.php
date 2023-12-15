<?php
namespace App\Traits;
trait ApiResponse{
    protected function successResponse($code,$data,$message=null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ],$code);
    }
    protected function errorResponse($code,$data,$message=null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'Failed',
            'message' => $message,
            'data' => null,
        ],$code);
    }
}
