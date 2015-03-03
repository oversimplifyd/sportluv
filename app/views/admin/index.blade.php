
@extends('admin/main_layout')

@section('additional_styles')
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700">
    <style>
        .btn.btn-default[disabled] {
            background-color: #aaa;
            border-color: #bbb;
            color: #333;
            cursor: not-allowed;
            pointer-events: all;
        }
        .form {
            position: relative;
        }
        .alert {
            position: absolute;
            bottom: -30px;
            right: 0;
        }
    </style>
@stop

@section('content')
    <section class="section-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{ url('/admin/find_post')}}" method="post" class="form">
                        <div class="group" style="margin: 35px auto">
                            <button type="submit" name="view_all" class="btn btn-primary"> View All</button>
                            <button type="button" name ="view_by_date" class="btn btn-primary">View by Date</button>
                            <button type="button" name ="view_by_tag" class="btn btn-primary">View By Tag</button>
                        </div>

                        <div class="datepickers">
                            <div class="form-group">
                                <input type="text" name="from" class="form-control" placeholder="From" />
                            </div>

                            <div class="form-group">
                                <input type="text" name="to" class="form-control" placeholder="To" />
                            </div>
                            <button type="submit" name="submit_by_date" class="btn btn-default" disabled>Go <i class="fa fa-rocket"></i></button>
                        </div>

                        <div class="select_tag">
                            <div class="form-group">
                                <select name="tag" class="form-control" required>
                                    @foreach($tags as $tag)
                                        <option>{{$tag}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="submit_by_tag" class="btn btn-default">Go <i class="fa fa-rocket"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('additional_scripts')
    <script src="{{asset('theme/js/validatePicker.min.js')}}"></script>
@stop
