<h1>Create an account</h1>

<form action="<?= $_ENV['BASE'] ?>/register" method="post">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="first_name">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="last_name">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <textarea type="password" class="form-control" name="password" id="password" aria-describedby="password"></textarea>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <textarea type="password" class="form-control" name="password_confirm" id="password_confirm" aria-describedby="password_confirm"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>