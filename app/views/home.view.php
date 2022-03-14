<?php require viewsPath("partials/header"); ?>

    <div class="container-fluid shadow-sm p-3">
        <h2 style="text-align:center"><?=APP_NAME?></h2>
    </div>

    <div class="d-flex p-5">
        <div style="height:400px; overflow-y:auto" class="border col p-4">
            <div style="text-align:center" class="row">
                <div class="input-group mb-3" style="display: flex; align-items: center; justify-content:center; gap: 5px">
                    <h5>Items</h5>
                    <input style="height:40px" type="text" class="ms-4 form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus >
                    <span style="height:40px" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        

        <div class="col bg-light p-4 pt-2">
            <h3 style="display: flex; align-items: center; justify-content:center; gap: 5px">Cart <span class="badge bg-primary rounded-circle" style="font-size:12px">3</span></h3>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </table>
        </div>
        
    </div>

    <?php require viewsPath("partials/footer"); ?>
