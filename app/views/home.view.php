<?php require viewsPath("partials/header"); ?>

    <div class="container-fluid shadow-sm p-3">
        <h2 style="text-align:center"><?=APP_NAME?></h2>
    </div>

    <div class="d-flex p-5">
        <div style="height:600px" class="border col-8 p-4">
            <div style="text-align:center" class="row">
                <div class="input-group mb-3" style="display: flex; align-items: center; justify-content:center; gap: 5px">
                    <h5>Items</h5>
                    <input id="js-search" style="height:40px" type="text" class="ms-4 form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" autofocus >
                    <span style="height:40px" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <!-- product -->
            <div class="js-products d-flex" style="overflow-y:auto; height:90%; flex-wrap:wrap; justify-content:center">
                <!-- <div class="card m-2 border-0" style="width:170px; height:170px">
                    <a href="" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                        <img src="assets/images/drinks-soft-1.jpg" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">Coca-cola</div>
                        <div class=""><strong>&#8358;500.00</strong></div>
                    </div>
                </div>

                <div class="card m-2 border-0" style="width:170px; height:170px">
                    <a href="" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                        <img src="assets/images/79-790767_free-png-fast-food-burger-png-images-transparent.png" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">Hamburger</div>
                        <div class=""><strong>&#8358;1500.00</strong></div>
                    </div>
                </div>

                <div class="card m-2 border-0" style="width:170px; height:170px">
                    <a href="" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                        <img src="assets/images/6127_squarerootsquare_677999.jpg" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">Square drink</div>
                        <div class=""><strong>&#8358;700.00</strong></div>
                    </div>
                </div>

                <div class="card m-2 border-0" style="width:170px; height:170px">
                    <a href="" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto;">
                        <img src="assets/images/gettyimages-1321142153-1024x1024.jpg" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">Cheese burger</div>
                        <div class=""><strong>&#8358;2000.00</strong></div>
                    </div>
                </div> -->
            </div>
            <!-- product ends -->
        </div>
        

        <div class="col-4 bg-light p-4 pt-2">
            <h3 style="display: flex; align-items: center; justify-content:center; gap: 5px">Cart <span class="badge bg-primary rounded-circle" style="font-size:12px">3</span></h3>

            <!-- cart begins -->
            <div class="table-responsive" style="height:350px; overflow-y:auto">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>

                    <!-- item -->
                    <tr>
                        <td style="width:80px; height:80px"><img src="assets/images/drinks-soft-1.jpg" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto"></td>
                        <td class="text-primary">
                            Coca-cola
                            <div class="input-group mb-3" style="max-width:110px">
                                <span class="input-group-text text-primary" style="cursor:pointer">-</span>
                                <input type="text" class="form-control" placeholder="1" value="1">
                                <span class="input-group-text text-primary" style="cursor:pointer">+</span>
                            </div>
                        </td>
                        <td><strong>&#8358;500.00</strong></td>
                    </tr>
                    <!-- item ends -->

                    <!-- item -->
                    <tr>
                        <td style="width:80px; height:80px"><img src="assets/images/gettyimages-1321142153-1024x1024.jpg" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto"></td>
                        <td class="text-primary">
                            Cheese burger
                            <div class="input-group mb-3" style="max-width:110px">
                                <span class="input-group-text text-primary" style="cursor:pointer">-</span>
                                <input type="text" class="form-control" placeholder="1" value="1">
                                <span class="input-group-text text-primary" style="cursor:pointer">+</span>
                            </div>
                        </td>
                        <td><strong>&#8358;2000.00</strong></td>
                    </tr>
                    <!-- item ends -->
                </table>
            </div>
            <!-- cart ends -->

            <div class="alert alert-danger">Total: &#8358;10000.00</div>

            <!-- checkout -->
            <div>
                <button class="btn btn-success my-1 w-100">Checkout</button>
                <button class="btn btn-primary my-1 w-100">Clear All</button>
            </div>
        </div>
        
    </div>

    <script>

        // search feature
        let searchBox = document.querySelector('#js-search');
        searchBox.addEventListener('input', (e)=>{
            let text = e.target.value.trim();
            console.log(text);
            // if (text == "") 
                // return;
            
            let data = {};
            data.dataType = "search"; // to detect a search
            data.text = text;

            sendData(data);
        })


        // create ajax request to db
        function sendData(data) {
            let ajax = new XMLHttpRequest();

            ajax.addEventListener("readystatechange", (e)=>{
                if (ajax.readyState == 4) {
                    if (ajax.status == 200) {
                        handleResult(ajax.responseText);
                    } else {
                        console.log("An error occurred. " + ajax.status);
                    }
                }
            })

            ajax.open('post', 'index.php?pg=ajax', true); //empty string indicates current page
            ajax.setRequestHeader("Content-type","application/json");

            data = JSON.stringify(data);
            ajax.send(data);
        }

        // process the received result
        function handleResult(result){
            let obj = JSON.parse(result);
            console.log(obj);
                        
            if (typeof obj != "undefined"){
                // valid json
                
                let products = document.querySelector(".js-products");
                products.innerHTML = "";
                
                for (let i = 0; i < obj.length; i++) {
                    // products.innerHTML += obj[i].description + "<br>";
                    products.innerHTML += `<div class="card m-2 border-0" style="width:170px; height:max-content">
                    <a href="" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                        <img src="${obj[i].image}" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">${obj[i].description}</div>
                        <div class=""><strong>&#8358;${obj[i].amount}</strong></div>
                    </div>
                </div>`;
                }
            }
            
        }

        sendData({
            dataType: "search",
            text: "" //search is empty, so load everything
        });
    </script>

    <?php require viewsPath("partials/footer"); ?>
