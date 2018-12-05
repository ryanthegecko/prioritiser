@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card edit-goal">
                <div class="card-header">
                  <h5 class="card-title">Edit goal</h5>
                  <button type="button" class="close"
                  data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/goal/{{ $goal->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>

                            <input class="form-control" type="text" name="title" placeholder="Title" value="{{ $goal->title }}"/>
                            <input class="form-control" type="hidden" name="value" disabled value="{{ $goal->value }}"/>

                        </div>

                        <div class="field">
                          <div class="control">
                              <button type="submit" class="button btn btn-primary is-link">Update title</button>
                          </div>
                        </div>
                    </form>
                    <br />

                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">Steps</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="card-title">Consequences</h5>
                        </div>
                        <div class="col-12 tab tab-steps">

                            <div class="tab-body">
                                {{--@if ($steps !== '')--}}
                                    <ul class="step-list">
                                        @foreach ($steps as $step)
                                        <li>
                                          {{ $step->title }}
                                            <div>
                                                <button
                                                    class="edit-step-modal"
                                                    value="edit"
                                                    data-toggle="modal"
                                                    data-target="#edit-step-modal"
                                                    data-id="{{ $step->id }}"
                                                    data-title="{{ $step->title }}"
                                                    data-deadline="{{ $step->deadline }}"
                                                    data-time-value="{{ $step->time_value }}">Edit
                                                </button>

                                                <form method="POST" action="/step/{{ $step->id}}">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" value="edit">Delete</button>
                                                </form>
                                            </div>
                                            <hr />
                                        </li>
                                        @endforeach
                                    </ul>
                                {{--@else
                                <p>
                                  No steps added yet
                                </p>
                                @endif--}}

                                <br />
                                <form method="POST" action="/step">
                                    {{ csrf_field() }}

                                    <h5>Add step</h5>

                                    <div class="form-group">
                                        <label hidden for="title">Step description</label>
                                        <input class="form-control" type="text" name="title" placeholder="Step description" />

                                    </div>

                                    <div class="control">
                                        <label for="sector">Consequence deadline</label>
                                        <div class="control">
                                            <input type="date" id="deadline" name="deadline">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="control">
                                        <label for="value">Consequence time value</label>
                                        <input type="range" name="time_value" list="tickmarks" min="1" max="4" value="0" step="1">

                                        <datalist id="tickmarks">
                                            <option value="1" label="1">
                                            <option value="3" label="3">
                                            <option value="7" label="7">
                                            <option value="15" label="15">
                                        </datalist>
                                        <input type="hidden" type="number" name="goal_id" value="{{ $goal->id }}" />
                                        <div class="control">
                                            <button type="submit" class="button btn btn-primary is-link">Save step</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 tab tab-consequences">

                            <div class="tab-body">
                                {{--@if ($consequences !== '')--}}
                                    <ul class="consequence-list">
                                        @foreach ($consequences as $consequence)
                                        <li>
                                          <hr />
                                          {{ $consequence->title }}
                                            <div>
                                                <button
                                                    class="edit-consequence-modal"
                                                    value="edit"
                                                    data-toggle="modal"
                                                    data-target="#edit-consequence-modal"
                                                    data-id="{{ $consequence->id }}"
                                                    data-title="{{ $consequence->title }}"
                                                    data-value="{{ getCalculatedArmValueReverse($consequence->value) }}">Edit
                                                </button>

                                                <form method="POST" action="/consequence/{{ $consequence->id}}">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" value="edit">Delete</button>
                                                </form>
                                            </div>
                                            <hr />
                                        </li>
                                        @endforeach
                                    </ul>
                                {{--@else
                                <p>
                                  No consequences added yet
                                </p>
                                @endif--}}

                                <br />
                                <form method="POST" action="/consequence">
                                    {{ csrf_field() }}

                                    <h5>Add consequence</h5>

                                    <div class="form-group">
                                        <label hidden for="title">Consequence description</label>
                                        <input class="form-control" type="text" name="title" placeholder="Consequence description" />

                                    </div>

                                    <div class="control">
                                        <label for="sector">Consequence sector</label>

                                        <div class="control">
                                            <select name="sector">
                                                <option class="personal" name="personal" value="1">Personal</option>
                                                <option class="social" name="social" value="2">Social</option>
                                                <option class="practical" name="practical" value="3">Practical</option>
                                                <option class="moral" name="moral" value="4">Moral</option>
                                                <option class="lifestyle" name="lifestyle" value="5">Lifestlye</option>
                                            </select>
                                        </div>

                                    </div>
                                    <br />
                                  <div class="control">
                                        <label for="value">Consequence value</label>

                                        <div class="control">
                                            <input type="range" name="value" list="tickmarks" min="1" max="4" value="0" step="1">

                                            <datalist id="tickmarks">
                                                <option value="1" label="1">
                                                <option value="3" label="3">
                                                <option value="7" label="7">
                                                <option value="15" label="15">
                                            </datalist>
                                        </div>
                                        <input type="hidden" type="number" name="goal_id" value="{{ $goal->id }}" />
                                        <div class="control">
                                            <button type="submit" class="button btn btn-primary is-link">Save consequence</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-step-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit step</h2>
                <button type="button" class="close"
                data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Step description</label>
                        <input class="form-control" type="text" name="title" />
                    </div>

                    <div class="control">
                        <label for="sector">Step deadline</label>
                        <div class="control">
                            <input class="form-control" type="date" id="deadline" name="deadline">
                        </div>
                    </div>
                    <br />
                    <div class="control">
                        <label for="value">Step time value</label>
                        <input type="range" name="time_value" list="tickmarks" min="1" max="4" value="0" step="1">

                        <datalist id="tickmarks">
                            <option value="1" label="1">
                            <option value="3" label="3">
                            <option value="7" label="7">
                            <option value="15" label="15">
                        </datalist>
                        <input type="hidden" type="number" name="goal_id" value="{{ $goal->id }}" />
                        <div class="control">
                            <button type="submit" class="button btn btn-primary is-link">Save step</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-consequence-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit consequence</h2>
                <button type="button" class="close"
                data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Consequence description</label>
                        <input class="form-control" type="text" name="title"/>
                    </div>

                    <div class="control">
                        <label for="sector">Consequence sector</label>

                        <div class="control">
                            <select name="sector">
                                <option class="personal" name="personal" value="1">Personal</option>
                                <option class="social" name="social" value="2">Social</option>
                                <option class="practical" name="practical" value="3">Practical</option>
                                <option class="moral" name="moral" value="4">Moral</option>
                                <option class="lifestyle" name="lifestyle" value="5">Lifestlye</option>
                            </select>
                        </div>

                    </div>

                    <div class="control">
                        <label for="value">Consequence value</label>

                        <div class="control">
                            <input type="range" name="value" list="tickmarks" min="1" max="4" value="0" step="1">

                            <datalist id="tickmarks">
                                <option value="1" label="1">
                                <option value="3" label="3">
                                <option value="7" label="7">
                                <option value="15" label="15">
                            </datalist>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control">
                            <button type="submit" class="btn btn-primary is-link">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function ($) {
    $(document).on("click", ".edit-consequence-modal", function () {
     var consequenceId = $(this).data('id');
     var consequenceTitle = $(this).data('title');
     var consequenceValue = $(this).data('value');
     $("#edit-consequence-modal .modal-content form ").attr('action','/consequence/'+ consequenceId);
     $("#edit-consequence-modal .modal-content form .form-control[name='title']").attr('value',consequenceTitle);
     $("#edit-consequence-modal .modal-content form input[type='range']").val(consequenceValue)

    });

    $(document).on("click", ".edit-step-modal", function () {
     var stepId = $(this).data('id');
     var stepTitle = $(this).data('title');
     console.log($(this).data('deadline'));
     var stepDeadline = $(this).data('deadline');
     var stepTimeValue = $(this).data('value');
     $("#edit-step-modal .modal-content form ").attr('action','/step/'+ stepId);
     $("#edit-step-modal .modal-content form .form-control[name='deadline']").attr('value',stepDeadline);
     $("#edit-step-modal .modal-content form .form-control[name='title']").val(stepTitle);
     $("#edit-step-modal .modal-content form input[type='range']").val(stepTimeValue)

    });
});
</script>
@endsection
