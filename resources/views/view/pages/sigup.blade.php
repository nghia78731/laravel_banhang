@extends('view.layout.index')

@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index.html">Home</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('signup.store') }}" method="post" class="beta-form-checkout">
                @csrf
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="fullname">Fullname*</label>
                            <input type="text" id="fullname" name="fullname" >
                        </div>

                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" >
                        </div>

                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" id="password" name="password"  >
                        </div>

                        <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="password" id="password_confirmation " name="password_confirmation " >
                        </div>

                        <div class="form-block">
                            <label for="address">Address*</label>
                            <input type="text" id="address" name="address" >
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone" >
                        </div>

                        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>

                        <div class="form-block">
                            <button type="submit" class="btn btn-primary" id="register">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection()

@section('javascript')
   {{-- <script>
        jQuery(function ($) {
            $(document).ready(function () {
                $('#email').blur(function () {
                    var email = $('#email').val();

                    $.ajax({
                        url: "{{ route('signup.ajax') }}",
                        method: 'POST',
                        data: {email:email},
                        success:function (result) {
                          console(result);
                        }
                    })
                });
            });
        })
    </script>--}}
@endsection
