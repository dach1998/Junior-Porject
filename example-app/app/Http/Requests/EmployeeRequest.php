<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения этого запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Получает правила валидации, применяемые к запросу.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees,email,' . ($this->route('employee') ? $this->route('employee')->id : 'NULL'),
            'phone_number' => 'required|numeric|digits:11|unique:employees,phone_number,' . ($this->route('employee') ? $this->route('employee')->id : 'NULL'),
        ];
    }
}
