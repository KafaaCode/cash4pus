<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{


    public function rules()
    {
        $id = $this->route('category')?->id;
        return [
            'name'   => 'required|string|unique:categories,name,' . $id,
            'image' => 'nullable|image',
            'active' => 'required|boolean',
        ];
    }
}
