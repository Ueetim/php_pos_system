<?php require viewsPath("partials/header"); ?>

<div class="container-fluid shadow-sm p-3">
    <h2 style="text-align:center"><?= APP_NAME ?></h2>
</div>


<!-- MODALS -->

<!-- remove product modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modal-success">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- CHECKOUT MODALS -->

<!-- amount paid modal -->
<div class="modal fade amount-paid" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-primary">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-shopping-cart"></i> Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter amount paid">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary next">Next</button>
            </div>
        </div>
    </div>
</div>



<div class="d-flex p-5 items-cart-con">
    <div class="border col-8 p-4 items-con">
        <div style="text-align:center" class="row">
            <div class="input-group mb-3" style="display: flex; align-items: center; justify-content:center; gap: 5px">
                <h5>Items</h5>
                <input id="js-search" style="height:40px" type="text" class="ms-4 form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus>
                <span style="height:40px" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
        </div>

        <!-- product -->
        <div class="js-products d-flex" style="overflow-y:auto; height:90%; flex-wrap:wrap; justify-content:center">

            <!-- product skeleton preloader -->
            <template id="card-template">
                <div class="card m-2 border-0 skeleton" style="width:170px; height:max-content">
                    <div style="width:170px; height:170px;"></div>
                    <!-- <div class="p-2"> -->
                        <div class="text-muted" style="width:170px; height:20px;"></div>
                        <div class="" style="width:120px; height:20px;"></div>
                    <!-- </div> -->
                </div>
            </template>
        </div>
        <!-- product ends -->
    </div>


    <div class="col-4 bg-light p-4 pt-2 cart-con">
        <h3 style="display: flex; align-items: center; justify-content:center; gap: 5px">Cart <span class="badge bg-primary rounded-circle" style="font-size:12px" id="cart-items">0</span></h3>

        <!-- cart begins -->
        <div class="table-responsive" style="height:350px; overflow-y:auto">
            <table class="table table-striped table-hover">
                <tr style="border:1px solid white">
                    <th>Image</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>

                <tbody class="js-items">
                    <!-- item -->
                </tbody>
            </table>
        </div>
        <!-- cart ends -->

        <div id="totalAmount" class="alert alert-danger">Total: &#8358;</div>

        <!-- checkout -->
        <div>
            <button class="btn btn-success my-1 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showModal('amountPaid')">Checkout</button>
            <button class="btn btn-primary my-1 w-100" onclick="modalClearAll()" data-bs-toggle="modal" data-bs-target="#exampleModal">Clear All</button>
        </div>
    </div>

</div>

<script>
    // skeleton preloader
    const skeletonCon = document.querySelector(".js-products");
    const cardTemplate = document.getElementById("card-template");
    for (let i = 0; i < 10; i++) {
    skeletonCon.append(cardTemplate.content.cloneNode(true));
    }
</script>
<script src="assets/js/app.js"></script>

<?php require viewsPath("partials/footer"); ?>