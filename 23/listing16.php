<body>
<div class="card">
    <div class="card-body">
        <h1>Login to Movie Reservations Account</h1>
        <hr/>
        <form class="needs-validation" novalidate method="POST"
              action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label-lg">User
                    Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user_name"
                           name="user_name" placeholder="Enter a user name"
                           required>
                    <div class="invalid-feedback">
                        Please provide a valid user name.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label-lg">Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="password"
                           name="password" placeholder="Enter a password" required>
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit"
                    name="login_submission">Log In
            </button>
        </form>
    </div>
</div>
</body>