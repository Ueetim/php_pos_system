<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
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
                    <td><?=esc($product->barcode)?></td>
                    <td><?=esc($product->description)?></td>
                    <td><?=esc($product->qty)?></td>
                    <td><?=esc($product->amount)?></td>
                    <td>Image</td>
                    <td><?=esc($product->date)?></td>
                    <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>