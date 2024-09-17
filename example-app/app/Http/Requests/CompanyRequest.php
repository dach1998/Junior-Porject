<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Определить, авторизован ли пользователь для выполнения этого запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *  Правила проверки, которые применяются к запросу.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'email' => 'required|email|unique:companies,email,' . ($this->route('company') ? $this->route('company')->id : 'NULL'),
            'logotype' => 'nullable|image|max:2048',
            'website' => 'required|url',
        ];
    }

    /**
     * Получает данные, прошедшие валидацию.
     *
     * @param  string|array|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function validated($key = null, $default = null)
    {
        return $this->validator->validated($key, $default);
    }
}
