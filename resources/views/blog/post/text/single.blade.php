@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <article>
                    <h1>{{ $data->title }}</h1>
                    <div class="description">
                        <p class="mb-0 fs-3">{{ $data->description }}</p>
                        <p class="fs-6 text-muted">
                            Author: {{ \App\Models\User::get()->where('id', $data->author_id)->first()->first_name }}
                        </p>
                        <p>{{ $data->content }}</p>
                        <p>{{ $data->after }}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
