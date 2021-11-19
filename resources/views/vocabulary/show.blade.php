@extends('layouts.app')
@section('content')
    @include('vocabulary.add')

    <h2 class="heading2 mt-4">Vocabulary list</h2>
    <div class="search">
        <?php
            if(!isset($search)){
                $search = '';
            }
        ?>
        <form action="{{route('vocabulary.search')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend w-100">
                    <input type="text" name="search" class="form-control" placeholder="Search a word..." value="{{$search}}">
                    <button type="submit" class="btn btn-info">Search</button>
                    <a href="{{route('vocabulary.show')}}" class="btn btn-secondary" style="width: 150px">Reset Search</a>
                </div>

            </div>
        </form>
    </div>
    <div class="vocabulary">
        <div class="vocabulary-heading">
            <div class="vocabulary-column vocabulary-column-es">Espanol</div>
            <div class="vocabulary-column vocabulary-column-lt">Lithuanian</div>
            <div class="vocabulary-column vocabulary-column-lesson-id">Lesson Nr</div>
            <div class="vocabulary-column vocabulary-column-actions"></div>
        </div>
        @forelse($vocabulary as $word)
            <div class="vocabulary-row">
                <div class="vocabulary-column vocabulary-column-es">{{$word->es}}</div>
                <div class="vocabulary-column vocabulary-column-lt">{{$word->lt}}</div>
                <div class="vocabulary-column vocabulary-column-lesson-id">{{$word->lesson_id}}</div>
                <div class="vocabulary-column vocabulary-column-actions">
                    <a href="#" class="btn btn-sm btn-info mr-2" data-id="{{$word->id}}" onclick="showEdit($(this))">Edit</a>
                    <form action="{{route('vocabulary.delete', $word->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$word->id}}">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @empty
        <p>There are nop new words</p>
            @endforelse
    </div>



    {{ $vocabulary->links() }}
@endsection