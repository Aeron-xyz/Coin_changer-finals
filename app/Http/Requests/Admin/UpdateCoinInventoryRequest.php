<?php

namespace App\Http\Requests\Admin;

use App\Models\CoinInventory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCoinInventoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [];

        foreach (CoinInventory::DENOMINATIONS as $value) {
            $rules["coin_{$value}"] = ['required', 'integer', 'min:0'];
        }

        return $rules;
    }
}
