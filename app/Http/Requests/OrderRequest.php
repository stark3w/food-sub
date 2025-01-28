<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|unique:orders,client_phone',
            'tariff_id' => 'required|exists:tariffs,id',
            'schedule_type' => 'required|in:EVERY_DAY,EVERY_OTHER_DAY,EVERY_OTHER_DAY_TWICE',
            'comment' => 'nullable|string',
            'delivery_dates' => 'required|array',
            'delivery_dates.*.from' => 'required|date|before_or_equal:delivery_dates.*.to',
            'delivery_dates.*.to' => 'required|date',
        ];
    }
}
