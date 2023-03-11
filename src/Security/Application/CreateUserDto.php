<?php

namespace Src\Security\Application;

use Illuminate\Validation\Rule;
use Src\Shared\Presentation\Utils\BaseDto;

class CreateUserDto extends BaseDto
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => ['required', Rule::in(['001', '002', '003'])],
            'fullName' => 'required|max:100',
            'email' => 'required|unique:users|max:50|email',
            'password' => 'required|min:6|max:15',
        ];
    }
}
