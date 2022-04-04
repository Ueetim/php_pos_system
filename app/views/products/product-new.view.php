<?php require viewsPath("partials/header"); ?>

    <form action="" method="POST">
        <div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">
            <h5 class="text-primary"><i class="fa-solid fa-burger my-2"></i> Add Product</h5>

            <!-- product details -->
            <div class="mb-3">
                <label for="productControlInput1" class="form-label">Product description</label>
                <input type="text" name="description" class="form-control" id="productControlInput1" placeholder="Product description">
            </div>

            <!-- quantity -->
            <div class="mb-3">
                <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                <input type="text" name="description" class="form-control" id="barcodeControlInput1" placeholder="Product barcode">
            </div>

            <!-- quantity -->
            <div class="input-group mb-3">
                <span class="input-group-text">Qty</span>
                <input type="number" name="qty" value="1" class="form-control" placeholder="Quantity" aria-label="Quantity">
                <span class="input-group-text">Amount</span>
                <input type="number" value="0.00" step="0.05" name="amount" class="form-control" placeholder="Amount" aria-label="Amount">
            </div>

            <!-- image upload -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Product image</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>

            <!-- buttons -->
            <div>
                <button class="btn btn-primary float-end">Save</button>
                <a href="index.php?pg=admin&tab=products">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </div>
        </div>
    </form>

<?php require viewsPath("partials/footer"); ?>