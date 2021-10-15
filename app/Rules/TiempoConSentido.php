<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TiempoConSentido implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $inicio;

    public function __construct($inicio)
    {
        $this->inicio = $inicio;
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
        if ($value == null or $this->inicio == null) {
            return true;
        }
        $IN = Carbon::createFromTimeString($this->inicio);
        $fin = Carbon::createFromTimeString($value);
        return $IN->lessThanOrEqualTo($fin);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La hora de cierre es menor o igual a hora de inicio';
    }
}
