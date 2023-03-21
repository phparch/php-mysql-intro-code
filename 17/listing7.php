</table>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="form-group row">
        <div class="col-sm-2">
            <button class="btn btn-danger" type="submit"
                    name="delete_movie_submission">Delete Movie
            </button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success" type="submit"
                    name="do_not_delete_movie_submission">Don't Delete
            </button>
        </div>
        <input type="hidden" name="id" value="<?= $id ?>">
    </div>
</form>
