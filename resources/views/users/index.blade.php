@extends('layouts.master')
              <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            a.element-link {
                text-decoration:none;
                color: #333;
                cursor: pointer;
            }
        </style>
        @section('content')
                <main role="main">
                <section class="jumbotron text-center">
                        <div class="container">
                                <h1 class="jumbotron-heading">User Managaement</h1>
                        </div>
                </section>
                <a href="/users/create" class="btn btn-primary btn-lg" role="button">Create new user</a>
                <br><br>

                @foreach ($users as $user)
                        @include ('users.user')
                @endforeach
        @endsection