<?php
namespace App\Trait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait ValidationTrait
{
    public function validationError(Validator $validator)
    {
        return response()->json([
            'success'   => false,
            'message'   => $validator->errors()->toArray(),
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
