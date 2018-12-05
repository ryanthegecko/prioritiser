@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="main">


                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        @foreach ($goals as $goal)
                            <li>
                              <a href="/goal/{{ $goal->id }}/edit">{{ $goal->title }}</a> <span>{{ $goal->value() }}</span>
                              <ul>
                                    @foreach ($goal->consequences as $consequence)
                                        <li>
                                            {{ $consequence->title }}
                                        </li>
                                    @endforeach
                              </ul>


                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
