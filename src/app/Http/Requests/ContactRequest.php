<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tel' => $this->input('tel-1') . $this->input('tel-2') . $this->input('tel-3')
        ]);
    }

    public function rules()
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required','email'],
            'tel' => ['required', 'integer', 'min:5'],
            'address' => 'required',
            'category_id' => 'required',
            'detail' => ['required','max:150']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式を入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.integer' => '電話番号は半角英数字で入力してください',
            'tel.min' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください'
        ];
    }
}
