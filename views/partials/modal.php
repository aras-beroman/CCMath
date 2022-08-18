
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Brand</span>
                        <input type="text" class="form-control" aria-label="Brand" aria-describedby="basic-addon1" name="brand">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Model</span>
                        <input type="text" class="form-control" aria-label="Model" aria-describedby="basic-addon1" name="model">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Year</span>
                        <input type="text" class="form-control" aria-label="Model" aria-describedby="basic-addon1" name="year">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" onClick="handleSubmit()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


