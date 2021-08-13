@extends('layouts.app')
@php
    $isCollection = (get_class($data) == \Illuminate\Database\Eloquent\Collection::class) ? true : false;
    $item = ($isCollection) ? null : $data;
    $data = ($isCollection) ? $data : $data->all();
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="needs-validation" method="POST" action="{{route('editor', ['type' => $type, 'id' => $item->id ?? null, 'edit' => $item ? 'edit' : ''])}}">

                    @if($isCollection)
                        @method('POST')
                    @else
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">{{ (!$isCollection)? 'Save ' : 'Create new' }}</button>
                        @if(!$isCollection)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
                            </button>
                        @endif
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            or select another &nbsp
                        </button>
                        <ul class="dropdown-menu">
                            @forelse($data as $element)
                                <li>
                                    <a class="dropdown-item" href="{{route('editor', ['type' => $type, 'id' => $element->id, 'edit' => 'edit'])}}">{{ $element->name ?? $element->metaTitle ?? $element->id  }}</a>
                                </li>
                            @empty
                                <li>
                                    <span class="dropdown-item">no elements exists now</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    @switch($type)
                        @case('category')
                        @include('blog.category.formElements')
                        @break

                        @case('text')
                        @include('blog.post.text.formElements')
                        @break

                        @case('video')
                        @include('blog.post.video.formElements')
                        @break
                    @endswitch
                </form>
            @if(!$isCollection)
                <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Are you shure ?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    You want to delete
                                    <span class="text-danger">{{ $item->name ?? $item->metaTitle }}</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <form method="POST" action="{{route('editor', ['type' => $type, (isset($item)) ?? 'id' => $item->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
