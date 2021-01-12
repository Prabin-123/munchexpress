<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Category;

class RestoCategoryValidation implements Rule
{
    private $restoId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($restoId)
    {
        $this->restoId = $restoId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $conditions = [
            'resto_id' => $this->restoId,
            'name' => $value,
        ];

        if (Category::where($conditions)->first()) {
            return true;
        }

        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This category does not belong to this restaurant.';
    }
}
