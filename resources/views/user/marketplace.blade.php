@extends('layout.app')
@section('title', 'Marketplace')
@section('content')
<div class="scroll-smooth md:scroll-auto mx-5 my-5 w-full">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-4">
        <!-- Kategori -->
        <div class="rounded-lg bg-gray-200 max-h-full">
            <div class="mx-auto max-w-screen-xl px-6 pb-6">
                <div>
                    @foreach ($categories as $category)
                    <h1 class="text-3xl font-bold pt-5">{{ $category->categoryName }}</h1>
                    <div class="text-center text-2xl font-medium text-white">
                        @foreach ($category->subcategory as $subCategory)
                        <article class="mt-3 h-15 relative overflow-hidden rounded-lg shadow transition hover:shadow-lg">
                            <img src="{{ asset('storage/images/'.$subCategory->subCategoryImagePath) }}" class="absolute w-full h-full object-cover object-center" />
                            <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 p-5">
                                <button onclick="updateProductList('{{ $subCategory->subCategoryId }}', '{{ $subCategory->subCategoryName }}')" class="w-full text-white">
                                    <h3>{{ $subCategory->subCategoryName }}</h3>
                                </button>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Kategori End -->

        <!-- Menu -->
        <div class="rounded-lg bg-gray-200 lg:col-span-2">
            <section id="productContainer">
                <div class="mx-auto max-w-screen-xl p-6 h-[624px] max-h-[624px]">
                    <div class="mx-auto max-w-3xl">
                        <header class="text-left">
                            <h1 id="categoryTitle" class="text-xl font-bold text-gray-900 sm:text-3xl">All Products</h1>
                        </header>
                        <div class="mt-3">
                            <div class="p-2 sm:p-4 bg-gray-300 rounded-lg max-h-[530px] snap-y snap-mandatory relative overflow-y-auto"> <!--the overflow to hide the item-->
                                <ul id="menuContainer" class="space-y-4 snap-y h-full max-h-[520px] "> </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Menu End  -->

        <!-- Detail Order -->
        <div class="rounded-lg bg-gray-200">
            <div class="rounded-lg bg-gray-200 mx-auto max-w-screen-xl p-6">
                <h1 class="text-3xl font-bold border-gray-600 border-b">Cart</h1>
                <div class="rounded-lg max-h-[380px] overflow-y-auto snap-y snap-mandatory">
                    <ul id="cartMenuContainer" class="space-y-4 snap-y"></ul>
                </div>
                <div class="flex justify-end border-t border-gray-600 pt-2">
                    <div class="w-full space-y-4">
                        <dl class="space-y-0.5 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <dt>Subtotal</dt>
                                <dd>Rp. <span id="subtotal">0</span></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Tax</dt>
                                <dd>Rp. <span id="tax">0</span></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Discount</dt>
                                <dd>Rp. <span id="discount">0</span></dd>
                            </div>
                            <div class="flex justify-between !text-base font-medium">
                                <dt>Total</dt>
                                <dd>Rp. <span id="total">0</span></dd>
                            </div>
                        </dl>
                        <div class="flex justify-end">
                            <button onclick="confirmClearCart()" class="mr-1 block rounded w-18 h-12 bg-red-600 px-5 py-3 text-sm text-gray-100 transition">
                                <span class="sr-only">Clear Cart</span>
                                <svg class="w-full h-full text-gray-100 transition hover:text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </button>
                            <button href="#" class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Order End -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Menampilkan semua product di menu
        updateProductList(0, "All Products");
        updateCartDisplay();
    });

    function createToast() {
        return Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            timer: 1000
        });
    }

    function formatPrice(price) {
        return price.toLocaleString("id-ID", {
            minimumFractionDigits: 0
        });
    }

    function updateProductList(subCategoryId, subCategoryName) {
        console.time("productLooping")
        try {
            document.getElementById("categoryTitle").innerText = subCategoryName;
            fetch(`product?subCategoryId=${subCategoryId}`, {
                    headers: {
                        "Accept": "application/json"
                    },
                })
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Network response was not ok " + response.statusText);
                    return response.json();
                })
                .then((data) => {
                    try {
                        const menuContainer = document.getElementById("menuContainer");
                        if (data.error) throw new Error(data.error);
                        if (!menuContainer) {
                            throw new Error("Menu container element not found.");
                        }
                        menuContainer.innerHTML = "";
                        const productItems = data.products.map(product => {
                            return `
                            <li class="flex items-center snap-start h-28">
                            <img src="/storage/images/${product.prodImagePath}" alt="" class="w-14 h-14 sm:w-20 sm:h-20 rounded object-cover object-center" />
                            <div class="ml-2 md:ml-4">
                              <h2 class="text-xs sm:text-base text-gray-900 font-semibold">${product.prodName}</h2>
                              <dl class="mt-1 space-y-px text-[10px] text-gray-600">
                                <div>
                                  <label for="quantity${product.prodId}" class="sr-only">Quantity</label>
                                  <div class="flex items-center justify-items-center w-full gap-1">
                                    <button type="button" onclick="changeQuantity(${product.prodId}, -1,${product.stock})" class="bg-gray-200 text-center w-4 h-4 md:w-6 md:h-6 rounded text-gray-700 transition hover:bg-gray-600">
                                        <svg class="w-full h-full text-gray-800 dark:text-white hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <input type="number" id="quantity${product.prodId}" value="1" class=" [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none <!-- menghilangkan updown -->
                                    text-xs w-6 h-4 md:w-12 md:h-6 p-0 rounded bg-gray-100 border-gray-200 text-center " />
                                    <button type="button" onclick="changeQuantity(${product.prodId}, 1, ${product.stock})" class="bg-gray-200 justify-items-center w-4 h-4 md:w-6 md:h-6 rounded text-gray-700 transition hover:bg-gray-600">
                                        <svg class="w-full h-full text-gray-800 dark:text-white hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M5 12h14m-7 7V5"/>
                                        </svg>
                                    </button>
                                  </div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <h4 class="text-xs sm:text-sm font-semibold">Stock : ${product.stock}</h4>
                                </div>
                              </dl>
                            </div>
                            <div class="flex flex-1 justify-end">
                              <h2 id="productPrice" class="text-xs md:text-sm text-gray-900 font-semibold" value="${product.price}">Rp. ${formatPrice(product.price)}</h2>
                            </div>
                          </li>
                          <div class="flex justify-center">
                            <button value="${product.prodId}" onclick="addToCart(${product.prodId})" class="w-40 md:w-52 block rounded bg-gray-700 px-10 py-1.5 text-sm text-gray-100 transition hover:bg-gray-600">
                              <h3>Add to Cart</h3>
                            </button>
                          </div>
                          <hr>
                          `
                        })
                        menuContainer.innerHTML = productItems.join('');
                    } catch (innerError) {
                        console.error("Error processing data: ", innerError);
                    }
                    console.timeEnd("productLooping")
                })
                .catch((fetchError) => {
                    console.error("Error fetching data: ", fetchError);
                });
        } catch (error) {
            console.error("Error in updateProductList: ", error);
        }
    }


    // Increase and Decrease quantity
    function changeQuantity(productId, delta, maxQuantity) {
        const quantityInput = document.getElementById("quantity" + productId);
        let currentQuantity = parseInt(quantityInput.value, 10);

        // Adjust the quantity based on the delta
        let newQuantity = currentQuantity + delta;

        // Ensure the quantity is at least 1
        if (newQuantity < 1) {
            newQuantity = 1;
        } else if (newQuantity > maxQuantity) {
            newQuantity = maxQuantity;
        }

        // Update the quantity input value
        quantityInput.value = newQuantity;
    }

    function addToCart(productId) {

        const quantityInput = document.getElementById("quantity" + productId);
        const quantity = parseInt(quantityInput.value, 10);
        const Toast = createToast();

        if (quantity > 0) {
            const bodyData = {
                id: productId,
                quantity: quantity,
            };
            fetch("/add-to-cart", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(bodyData),
                })
                .then((response) => response.json()) // Expect a JSON response
                .then((responseJson) => {
                    if (responseJson.success) {
                        // Panggil fungsi untuk mengambil dan menampilkan data session cart di console
                        updateCartDisplay();
                        Toast.fire({
                            icon: "success",
                            title: `${responseJson.message}`
                        });
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: `${responseJson.error}`
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat mengirim permintaan.");
                });
        } else {
            Toast.fire({
                icon: "info",
                title: `Quantity must be at least 1`
            });
        }
    }

    function updateCartDisplay() {
        fetch("fetch-cart", {
                header: {
                    "Accept": "application/json",
                }
            })
            .then((response) => response.json())
            .then((data) => {
                if (!data.success) {
                    console.error("Error fetching cart data:", data.error);
                    return;
                }
                const cartMenuContainer = document.getElementById("cartMenuContainer");
                cartMenuContainer.innerHTML = ""; // Clear existing items
                let subtotal = 0;
                let discount = 0;
                Object.keys(data.cart).forEach((productId) => {
                    const product = data.cart[productId];
                    subtotal += product.price * product.quantity;
                    discount = product.discount * product.quantity;
                    const productItem = `
                        <li class="flex items-center gap-1 xl:gap-4 snap-start border-b border-gray-50">
                            <img src="/storage/images/${product.image}" alt="" class="w-14 h-14 sm:w-14 sm:h-14 rounded object-cover object-center" />
                            <div>
                            <h2 class="text-sm text-gray-900 font-semibold lg:ml-2 xl:ml-0">${product.prodName}</h2>
                            <div>
                                <div class="text-sm lg:ml-2 xl:ml-0">${formatPrice(product.price)}</div>
                            </div>
                            </div>
                            <div class="flex flex-1 items-center justify-end gap-2 mr-4 text-xl text-gray-700 text-xs lg:text-sm">
                                ${product.quantity}
                            </div>
                            <button onClick="confirmDelete(${product.prodId},'${product.prodName}')">
                                <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white hover:text-red-600"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </button>
                        </li>
                `;
                    cartMenuContainer.insertAdjacentHTML("beforeend", productItem);
                });
                let totalTax = 0.11 * subtotal;
                const totalDiscount = discount;
                const total = subtotal - discount + totalTax || 0;
                document.getElementById("tax").innerText = formatPrice(totalTax);
                document.getElementById("subtotal").innerText = formatPrice(subtotal);
                document.getElementById("total").innerText = formatPrice(total);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }

    function confirmDelete(cartProductId, name) {
        Swal.fire({
            title: `Are you sure you want to delete <b>${name}</b> from the cart?`,
            icon: 'warning',
            iconColor: "#E02424",
            showCancelButton: true,
            confirmButtonColor: '#E02424',
            cancelButtonColor: '#374151',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItemCart(cartProductId);
            }
        });
    }

    function deleteItemCart(cartProductId) {
        const Toast = createToast();
        fetch(`/cart/delete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    productId: cartProductId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartDisplay();
                    Toast.fire({
                        icon: "success",
                        title: `${data.message}`
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: `${data.error}`
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Delete Item Cart function start here.
    function confirmClearCart() {
        Swal.fire({
            icon: "warning",
            iconColor: "#E02424",
            title: "Do you want to clear the cart?",
            showCancelButton: true,
            cancelButtonColor: "#374151",
            confirmButtonText: "Delete",
            confirmButtonColor: "#E02424",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                clearCart();
            }
        });
    }

    function clearCart() {
        fetch('/clear-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    updateCartDisplay();
                    Swal.fire(
                        'Cart Cleared',
                        `${data.message}`,
                        'success'
                    );
                } else {
                    switch (data.type) {
                        case 'empty_cart':
                            Swal.fire(
                                'Empty Cart',
                                `${data.message}`,
                                'info'
                            );
                            break;
                        case 'csrf_error':
                            Swal.fire(
                                'CSRF Error',
                                `${data.error}`,
                                'error'
                            );
                            break;
                        default:
                            Swal.fire(
                                'Unable to Clear',
                                `An unknown error occurred.`,
                                'error'
                            );
                            break;
                    }
                }
            })
    }
</script>
@endsection