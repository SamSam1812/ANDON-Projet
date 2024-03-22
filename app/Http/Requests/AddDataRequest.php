<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDataRequest extends FormRequest
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
            'robot_id' => 'required',
            'NbPieceDebutMachine' => ['nullable', 'numeric'],
            'NbPieceFinMachine' => ['required', 'numeric'],
            'TopPiece' => ['nullable'],
            'BP_Andon' => 'required',
            'NbRebus' => ['required', 'numeric'],
            'NiveauAppelAndon' => ['required', 'numeric'],
        ];
    }
}
