@extends('admin.layouts.auth')
@section('content')
<main class="main" id="top">
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-8 col-xxl-5 py-3 position-relative">
                <div class="card overflow-hidden z-1">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <div class="col-md-5 text-center bg-card-gradient">
                                <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                                    <div class="bg-holder bg-auth-card-shape" style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);"></div><!--/.bg-holder-->
                                    <div class="z-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-5 d-inline-block fw-bolder" href="../../../index.html"></a>
                                        <p class="opacity-75 text-white"></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-7 d-flex flex-center">
                                <div class="p-4 p-md-5 flex-grow-1">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3>Account Login</h3>
                                        </div>
                                    </div>
                                    <form action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="card-email">Email address</label>
                                            <input class="form-control" id="card-email" type="email" name="email"> <!-- добавлен атрибут name="email" -->
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="card-password">Password</label>
                                            </div>
                                            <input class="form-control" id="card-password" type="password" name="password"> <!-- добавлен атрибут name="password" -->
                                        </div>
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100 mt-3">Log in</button>
                                        </div>
                                    </form>
                                    <div class="position-relative mt-4">
                                        <hr>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@section('content')
