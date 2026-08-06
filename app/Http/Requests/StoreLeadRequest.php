<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'source' => 'required|string|max:100',
            'status' => 'required|in:new,contacted,qualified,proposal_sent,negotiation,won,lost',
            'assigned_to' => 'nullable|exists:users,id',
            'message' => 'nullable|string',

        ];
    }
}
