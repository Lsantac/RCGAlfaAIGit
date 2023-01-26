<?php

namespace App\Http\Requests;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlterPartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /*'nome_part'=> ['required',new Fullname],*/
            'nome_part'=> 'required',
            'endereco'=> 'required',
            'cidade'=> 'required',
            'cep'=> 'required',
            'estado'=> 'required',
            'pais'=> 'required',
            'email'=> 'required|email',
            
            ];
    }

    public function messages()
    {
        return[
            'nome_part.required' => 'O campo Nome é obrigatório!',
            'endereco.required' => 'O campo Endereço é obrigatório!',
            'email.required' => 'O campo Email é obrigatório!',
            'email.email' => 'Email inválido!',
            
            'cidade.required' => 'O campo Cidade é obrigatório!',
            'estado.required' => 'O campo Estado é obrigatório!',
            'pais.required' => 'O campo Pais é obrigatório!',
            'cep.required' => 'O campo Cep é obrigatório!',
            
             ];
        
    }
}
