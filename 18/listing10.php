<div class="form-group row">
    <label for="movie_running_time_in_minutes"
           class="col-sm-3 col-form-label-lg">Running Time
        (min)</label>
    <div class="col-sm-8">
        <input type="number" class="form-control"
               id="movie_running_time_in_minutes"
               name="movie_running_time_in_minutes"
               value='<?= $movie_runtime ?>'
               placeholder="Running time (in minutes)" required>
        <div class="invalid-feedback">
            Please provide a valid running time in minutes.
        </div>
    </div>
</div>