<?php require viewsPath("partials/header"); ?>

<?php if (!empty($row)) : ?>

    <div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- multipart allows image uploads -->
            <h5 class="text-primary"><i class="fa-solid fa-burger my-2"></i> Delete Product</h5>

            <div class="alert alert-danger text-center">Are you sure you want to delete this product?</div>

            <!-- product details -->
            <div class="mb-3">
                <label for="productControlInput1" class="form-label">Product description</label>
                <input disabled value="<?=set_value('description', $row['description'])?>" type="text" name="description" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product description">
                <?php if (!empty($errors['description'])) : ?>
                    <small class="text-danger col-12"><?= $errors['description'] ?></small>
                <?php endif; ?>
            </div>

            <!-- barcode -->
            <div class="mb-3">
                <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                <input disabled value="<?=set_value('barcode', $row['barcode'])?>" type="text" name="barcode" class="form-control <?= !empty($errors['barcode']) ? 'border-danger' : '' ?>" id="barcodeControlInput1" placeholder="Product barcode">
                <?php if (!empty($errors['barcode'])) : ?>
                    <small class="text-danger col-12"><?= $errors['barcode'] ?></small>
                <?php endif; ?>
            </div>

            
            <img class="mx-auto d-block" src="<?=$row['image']?>" alt="" style="max-height:200px;">
            <br><br>

            <!-- buttons -->
            <div>
                <button class="btn btn-danger float-end">Delete</button>
                <a href="index.php?pg=admin&tab=products">
                    <button type="button" class="btn btn-outline-primary">Cancel</button>
                </a>
            </div>
        </form>

    <?php else : ?>
        Product not found
        <br>

        <a href="index.php?pg=admin&tab=products">
            <button type="button" class="btn btn-primary">Back to products</button>
        </a>
    <?php endif; ?>
    </div>


    <?php require viewsPath("partials/footer"); ?>