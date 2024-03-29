<?php

namespace Corals\Utility\Rating\Http\Requests;

use Corals\Foundation\Http\Requests\BaseRequest;
use Corals\Utility\Rating\Models\Rating;

class RatingRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setModel(Rating::class);

        return $this->isAuthorized();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->setModel(Rating::class);
        $rules = parent::rules();

        if ($this->isUpdate() || $this->isStore()) {
            $rules = array_merge($rules, [
                'review_subject' => 'required_without:criteria|max:191',
                'review_text' => 'required_without:criteria|max:191',
                'review_rating' => 'required|integer|min:0|max:5',
            ]);
        }


        return $rules;
    }

    public function messages()
    {
        return [
            'review_subject.required_without' => trans('validation.required', ['attribute' => 'review_subject']),
            'review_text.required_without' => trans('validation.required', ['attribute' => 'review_text']),
        ];
    }
}
