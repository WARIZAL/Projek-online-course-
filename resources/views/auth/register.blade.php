@include('layout.header')
<div class="container col-lg-3 col-12">
    <div class="row mx-auto mt-5 shadow-lg rounded-3">
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Register akun</h4>
                </div>
                <form action="createAkun" method="post">
                    @csrf
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Username</label>
                                                <div class="position-relative">
                                                    <input class="form-control" type="text" name="username" placeholder="Username" id="first-name-icon" autofocus>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Email</label>
                                                <div class="position-relative">
                                                    <input class="form-control" type="email" name="email" placeholder="email@gmail.com" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Password</label>
                                                <div class="position-relative">
                                                    <input class="form-control" type="password" name="password" placeholder="password" id="password-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mx-auto">
                                            <div class="col-3 mr-4 mx-auto">
                                                <a href="login" class="btn btn-warning">Login</a>
                                            </div>
                                            <div class="col-3 ml-4 mx-auto">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')