<?php

namespace App\Http\Requests\User;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isCashier() ?? false;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in([Transaction::TYPE_LOAD, Transaction::TYPE_DISPENSE])],
            'coin_1' => ['nullable', 'integer', 'min:0'],
            'coin_5' => ['nullable', 'integer', 'min:0'],
            'coin_10' => ['nullable', 'integer', 'min:0'],
            'coin_20' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string', 'max:500'],
        ];
    }
}
