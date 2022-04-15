<?php require viewsPath("partials/header"); ?>

    <form action="" method="POST" enctype="multipart/form-data"> <!-- multipart allows image uploads -->
        <div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">
            <h5 class="text-primary"><i class="fa-solid fa-burger my-2"></i> Add Product</h5>

            <!-- product details -->
            <div class="mb-3">
                <label for="productControlInput1" class="form-label">Product description</label>
                <input type="text" name="description" class="form-control <?= !empty($errors['description']) ? 'border-danger':''?>" id="productControlInput1" placeholder="Product description">
                <?php if(!empty($errors['description'])): ?>
                    <small class="text-danger col-12"><?= $errors['description'] ?></small>
                <?php endif; ?>
            </div> 

            <!-- barcode -->
            <div class="mb-3">
                <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                <input type="text" name="barcode" class="form-control <?= !empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Product barcode">
                <?php if(!empty($errors['barcode'])): ?>
                    <small class="text-danger col-12"><?= $errors['barcode'] ?></small>
                <?php endif; ?>
            </div>

            <!-- quantity -->
            <div class="input-group mb-3">
                <span class="input-group-text">Qty</span>
                <input type="number" name="qty" value="1" class="form-control <?= !empty($errors['qty']) ? 'border-danger':''?>" placeholder="Quantity" aria-label="Quantity">
                <span class="input-group-text">Amount (&#8358;)</span>
                <input type="number" value="0.00" step="0.01" name="amount" class="form-control <?= !empty($errors['amount']) ? 'border-danger':''?>" placeholder="Amount" aria-label="Amount">
                <?php if(!empty($errors['qty'])): ?>
                    <small class="text-danger col-12"><?= $errors['qty'] ?></small>
                <?php endif; ?>
                <?php if(!empty($errors['amount'])): ?>
                    <small class="text-danger col-12"><?= $errors['amount'] ?></small>
                <?php endif; ?>
            </div>

            <!-- image upload -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Product image</label>
                <input class="form-control <?= !empty($errors['image']) ? 'border-danger':''?>" name="image" type="file" id="formFile">
                <?php if(!empty($errors['image'])): ?>
                    <small class="text-danger col-12"><?= $errors['image'] ?></small>
                <?php endif; ?>
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