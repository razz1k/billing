@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <article>
          <h1>{{ $category->name }}</h1>
          <div class="description">
            <p class="mb-0 fs-3">Да, у этой категории действительно такое имя</p>
            <p class="fs-6 text-muted">
              тут могло быть имя создателя данной категории, но увы эта информация отсутствует
            </p>
            <p>на данный момент это все что мы знаем про данную категорию</p>
            <p>PS: честно-пречестно большего сказать не можем</p>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection
