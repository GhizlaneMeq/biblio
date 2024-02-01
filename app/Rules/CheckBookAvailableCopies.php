<?php

namespace App\Rules;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckBookAvailableCopies implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $book = Book::find($value);
        if (!$book || $book->available_copies <= 0) {
            $fail("The selected book must have available copies greater than 0.");
        }
        echo 'ggooood';
    }
}
