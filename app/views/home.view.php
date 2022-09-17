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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter amount paid">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Next</button>
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

            <!-- products fetched from db -->

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
    let productsArr = [];
    let items = [];

    // search feature
    let searchBox = document.querySelector('#js-search');
    searchBox.addEventListener('input', (e) => {
        let text = e.target.value.trim();
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

        ajax.addEventListener("readystatechange", (e) => {
            if (ajax.readyState == 4) {
                if (ajax.status == 200) {
                    handleResult(ajax.responseText);
                } else {
                    console.log("An error occurred. " + ajax.status);
                }
            }
        })

        ajax.open('post', 'index.php?pg=ajax', true); //empty string indicates current page
        ajax.setRequestHeader("Content-type", "application/json");

        data = JSON.stringify(data);
        ajax.send(data);
    }

    // process the received result
    function handleResult(result) {
        let obj = JSON.parse(result);

        if (typeof obj != "undefined") {
            // valid json
            if (obj.dataType == 'search') {
                let products = document.querySelector(".js-products");
                products.innerHTML = "";

                productsArr = [];

                if (obj.data != "") {

                    productsArr = obj.data;

                    for (let i = 0; i < obj.data.length; i++) {
                        products.innerHTML += `<div class="card m-2 border-0" style="width:170px; height:max-content">
                            <a style="cursor:pointer; object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                                <img src="${obj.data[i].image}" alt="" onclick="addItem(event)" class="product-img w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto;" data-name="${obj.data[i].description}" data-amount="${obj.data[i].amount}" data-id='${obj.data[i].id}'>
                            </a>
                            <div class="p-2">
                                <div class="text-muted">${obj.data[i].description}</div>
                                <div class=""><strong>&#8358;${obj.data[i].amount}</strong></div>
                            </div>
                        </div>`;
                    }
                }
            }
        }
    }

    // MODAL
    let modal = document.querySelector('#exampleModal');
    let modalTitle = modal.querySelector('#exampleModalLabel');
    let modalContent = modal.querySelector('.modal-body');
    let modalSuccess = modal.querySelector('#modal-success');


    let cartCont = document.querySelector('.js-items');

    let totalAmount = document.getElementById('totalAmount');
    totalAmount.textContent = "Total: ₦0";

    let prodObj = {};

    // number of items in cart
    let cartItems = document.getElementById('cart-items');
    cartNum = parseInt(cartItems.textContent);

    function addItem(e) {
        if (!e.target.classList.contains('added')) {

            // store value and amount in object
            prodObj[`${e.target.dataset.id}`] = [1, parseInt(e.target.dataset.amount)];


            cartCont.innerHTML += `<tr class="product" id="${e.target.dataset.id}">
                            <td style="width:80px; height:80px">
                                <img src="${e.target.src}" alt="" class="w-100 rounded border" style="object-fit:contain; max-width:100%; max-height:100%; width:auto; height:auto">
                            </td>
                            <td class="text-primary">
                            ${e.target.dataset.name}
                                <div class="input-group mb-3" style="max-width:110px">
                                    <span style="user-select:none; cursor:pointer" class="minus input-group-text text-primary" onclick="decrement(event)">-</span>
                                    <input class="prodInput" type="text" class="form-control" placeholder="" value="${prodObj[`${e.target.dataset.id}`][0]}" style="border:1px solid #d6d6d6; max-width: 40px" disabled>
                                    <span style="user-select:none; cursor:pointer" class="plus input-group-text text-primary" onclick="increment(event)">+</span>
                                </div>
                            </td>
                            <td style="position:relative;">
                                <strong class="product-amount">&#8358;${e.target.dataset.amount * prodObj[`${e.target.dataset.id}`][0]}</strong>
                                <button onclick="removeItem(event)" class="btn-danger rmv-btn" style="border:none; width: calc(100% - 20px); height: 30px; border-radius: 3px; position: absolute; right: 20px; bottom: 25px; font-size:13px">Remove 
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>`;
            e.target.classList.add('added');

            // retain value of qty of older items when new item is clicked
            let products = cartCont.querySelectorAll('.product');
            products.forEach((prod) => {
                let prodInput = prod.querySelector('.prodInput');
                prodInput.value = prodObj[`${prod.id}`][0];
            })

            // update number of cart items
            cartNum += 1;
            cartItems.textContent = cartNum;
        } else {
            // increment value by 1
            prodObj[`${e.target.dataset.id}`][0] += 1;

            // increment amount based on value
            let products = cartCont.querySelectorAll('.product');
            products.forEach((prod) => {
                if (prod.id == e.target.dataset.id) {
                    let prodInput = prod.querySelector('.prodInput');
                    prodInput.value = prodObj[`${e.target.dataset.id}`][0];

                    // amount object property equals the item amount * quantity(value)
                    prodObj[`${e.target.dataset.id}`][1] = e.target.dataset.amount * prodObj[`${e.target.dataset.id}`][0];

                    prod.querySelector('.product-amount').textContent = `₦${prodObj[`${e.target.dataset.id}`][1]}`;
                }
            })
        }

        incrementTotal()
    }

    // decrement on click of minus button
    function decrement(e) {
        let productId = e.target.parentNode.parentNode.parentNode.id;

        // update array
        prodObj[`${productId}`][0] -= 1;

        if (prodObj[`${productId}`][0] <= 1) {
            prodObj[`${productId}`][0] = 1;
        }

        // decrement quantity
        e.target.nextElementSibling.value = prodObj[`${productId}`][0];

        // decrement price

        let item = document.querySelectorAll('.card');
        item.forEach((prodItem) => {
            prodImg = prodItem.querySelector('.product-img');
            if (prodImg.dataset.id == productId) {
                prodObj[`${productId}`][1] = prodImg.dataset.amount * prodObj[`${productId}`][0];

                let prodPrice = e.target.parentNode.parentNode.nextElementSibling.firstElementChild;
                prodPrice.textContent = `₦${prodObj[`${productId}`][1]}`;
            }
        })

        incrementTotal()
    }

    // increment on click of plus button
    function increment(e) {
        let productId = e.target.parentNode.parentNode.parentNode.id;

        // update array
        prodObj[`${productId}`][0] += 1;

        // increment quantity
        e.target.parentNode.firstElementChild.nextElementSibling.value = prodObj[`${productId}`][0];

        // increment price

        let item = document.querySelectorAll('.card');
        item.forEach((prodItem) => {
            prodImg = prodItem.querySelector('.product-img');
            if (prodImg.dataset.id == productId) {
                prodObj[`${productId}`][1] = prodImg.dataset.amount * prodObj[`${productId}`][0];

                let prodPrice = e.target.parentNode.parentNode.nextElementSibling.firstElementChild;
                prodPrice.textContent = `₦${prodObj[`${productId}`][1]}`;
            }
        })

        incrementTotal();
    }

    // remove item from cart
    function removeItem(e) {
        let cartItem = e.target.parentElement.parentElement;

        // fix bug causing error when icon is clicked
        if (!cartItem.classList.contains('product')) {
            cartItem = cartItem.parentNode;
        }

        modalTitle.textContent = 'Remove Item';
        modalContent.textContent = 'Are you sure you want to remove the item from the cart?';

        let cartList = document.querySelectorAll('.product-img');
        cartList.forEach((cart) => {
            if (cart.dataset.id == cartItem.id) {
                cart.classList.remove('added');
                delete prodObj[cart.dataset.id];
            }
        })

        cartItem.remove();

        cartNum--;
        cartItems.textContent = cartNum;

        incrementTotal()

    }

    // remove all items
    function modalClearAll() {
        if (cartNum != 0) {
            modalTitle.textContent = 'Empty cart';
            modalContent.textContent = 'Are you sure you want to remove all items from the cart?';
            modalSuccess.style.display = 'block';
            modalSuccess.addEventListener('click', () => {
                removeAll();
            })
        } else {
            modalTitle.textContent = 'Empty cart';
            modalContent.textContent = 'No item found in cart!!';
            modalSuccess.style.display = 'none';
        }
    }

    function removeAll() {
        cartCont.innerHTML = '';
        prodObj = {};
        // console.log(prodObj);

        let cartList = document.querySelectorAll('.product-img');
        cartList.forEach((cart) => {
            if (cart.classList.contains('added')) {
                cart.classList.remove('added');
            }
        })

        cartNum = 0;
        cartItems.textContent = cartNum;

        totalAmount.textContent = "Total: ₦0";
    }

    function incrementTotal() {
        let amount = 0;
        for (key in prodObj) {
            // console.log(prodObj[key][1]);

            amount += prodObj[key][1];

        }
        // console.log(totalAmount)
        totalAmount.textContent = "Total: ₦" + amount;
    }

    // checkout modal
    function showModal(modal) {
        if (modal == 'amountPaid') {
            let amountPaidModal = document.querySelector('.amount-paid');
            let modalContent = amountPaidModal.querySelector('.modal-body');
            if (cartNum == 0) {
                modalContent.innerHTML = 'Please add items to the cart'
            } else {
                modalContent.innerHTML = `<div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter amount paid">
                </div>`;
                let input = modalContent.querySelector('.form-control');
                // input.value = '0.00';
                input.focus();
            }
        }
    }

    sendData({
        dataType: "search",
        text: "" //search is empty, so load everything
    });
</script>

<?php require viewsPath("partials/footer"); ?>