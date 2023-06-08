<div class="container mt-4">
    <div class="row">
        <div class="col d-flex justify-content-end">
            <button class="btn text-light" style="background-color: #49281A; border: none;" data-bs-toggle="modal" data-bs-target="#ModalCheckOut">
                CHECK OUT
            </button>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 mt-2 g-5">
        <div class="col">
            <div class="card">
                <img src="img/image.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Product's Name</h5>
                    <p class="card-text text-info">IDR *****</p>
                    <input placeholder="Enter Qty" type="number" min="1" max="100" style="width: 100px;" />
                    <button type="button" class="btn-secondary"><i class="bi bi-trash3"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $inputNet.on("input", function(event) {
        $inputGross.val($(event.target).val() * 1.19)
    })
    $inputGross.on("input", function(event) {
        $inputNet.val($(event.target).val() / 1.19)
    })
</script>