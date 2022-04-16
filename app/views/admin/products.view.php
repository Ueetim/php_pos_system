<div class="table-responsive" style="max-height: 300px;">
    <table class="table table-striped table-hover">
        <tr style="position:sticky; top:0; background-color:white">
            <th>Barcode</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Image</th>
            <th>Date</th>
            <th>
                <a href="index.php?pg=product-new">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add new
                    </button>
                </a>
            </th>
        </tr>

        <!-- display each product info -->
        <?php if(!empty($products)):?> 
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?=esc($product['barcode'])?></td>
                    <td>
                        <a href="index.php?pg=product-single&id=<?=$product['id']?>">
                            <?=esc($product['description'])?>
                        </a>
                    </td>
                    <td><?=esc($product['qty'])?></td>
                    <td><?=esc($product['amount'])?></td>
                    <td><img src="<?=esc($product['image'])?>" alt="" style="width: 100%; max-width: 70px"></td>
                    <td><?=esc($product['date'])?></td>
                    <td>
                        <a href="index.php?pg=product-edit&id=<?=$product['id']?>">
                            <button class="btn btn-success btn-sm">Edit</button>
                        </a>
                        <a href="index.php?pg=product-delete&id=<?=$product['id']?>">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>