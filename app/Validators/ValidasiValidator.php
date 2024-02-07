<?php

namespace App\Validators;

use App\Contracts\ValidasiInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class ValidasiValidator.
 *
 * @package namespace App\Validators;
 */
class ValidasiValidator implements ValidasiInterface
{
    /**
     * Validation Rules
     *
     * @var array
     */
    public function validate($data, $rules)
    {
        $validate = Validator::make($data, $rules);
        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
    }
}
