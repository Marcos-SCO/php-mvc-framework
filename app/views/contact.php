<h1>Contact us</h1>

<form action="<?=$_ENV['BASE']?>/contact" method="post">
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subject">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea type="text" class="form-control" name="body" id="body" aria-describedby="body"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>