@extends('admin/main_layout')

@section('content')
    <section class="login-section">
        <div class="container">
            <div class=row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 style="color: #ffffff" class="panel-title">Admin Sign-in</h3>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('error'))
                                    <h5 style="color: red">{{Session::get('error');}}</h5>
                            @endif
                            <form action="{{ url('/admin/post_login')}}" method="post">
                                {{--{{Form::open(array('action' => 'UsersController@postAdminLogin', 'method' => 'post'))}}--}}
                                <div class="form-group">
                                    <label for="username" style="font-size: 18px">Username:</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd" style="font-size: 18px">Password:</label>
                                    <input type="password" name="password" id="pwd" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="btn-group">
                                        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class=row">
            </div>
            <div class=row">
            </div>
            <div class=row">
            </div>
        </div>
    </section>
@stop