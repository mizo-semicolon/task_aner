<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!auth()->check()){
            return false;
        }
        else 
        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title'=>'required|max:255',
                'post'=>'required',
                'image'=>'image'
            ];
        }
        else {
            return [
                'title'=>'required|max:255',
                'post'=>'required',
                'image'=>'required|image'
            ];
        }
        
    }
}
