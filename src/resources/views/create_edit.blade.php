@extends('layouts.crud.create_edit')



@section('content_header')
    @component('components.content_header')
        @slot('page_title')
            {{ $title_singular }}
        @endslot

        @slot('breadcrumb')
            {{ Breadcrumbs::render('utility_ratings_create_edit') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    @parent
    <div class="row">
        <div class="col-md-12">
            @component('components.box')
                {!! CoralsForm::openForm($rating) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! CoralsForm::select('review_rating','utility-rating::attributes.rating.rating', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], true,$rating->rating ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! CoralsForm::text('review_subject','utility-rating::attributes.rating.title', true, $rating->title, []) !!}

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! CoralsForm::textarea('review_text','utility-rating::attributes.rating.body', true, $rating->body, []) !!}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! CoralsForm::radio('status','Corals::attributes.status',true, trans('utility-rating::attributes.rating.status_options')) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! CoralsForm::formButtons() !!}
                    </div>
                </div>

                {!! CoralsForm::closeForm($rating) !!}
            @endcomponent
        </div>
    </div>
@endsection
