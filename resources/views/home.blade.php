
<!doctype html>
<html lang="en">
<head>        
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico">
  <title>Dapoer Mama</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Raleway:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-color: #FAFAFA;" id="home">  

{{-- navbar section --}}
@include('partials.navbar')





{{-- Instal Build Website --}}
<div  class="">
<div class="container">
<div style="margin-top:70px;" class=" hero-text ">
    <img style="width: 100%; border-radius:10px;" src="img/baner.png" alt="">
</div>
<form class="justify-content-center" id="personal-info-form" method="POST" action="{{ route('orderstore') }}" enctype="multipart/form-data">        
    @csrf
<div style=" margin-top:40px;"  class="serv hero-text row">
    <div id="template" class="serv container hero-text col-lg-8 col-12"> 
        <div id="searchTemplate" class="visible cart">   
            <div class="section" style="margin-bottom: 20px">
                <h4 style="padding:0px; text-align:center; color:rgba(0,0,0,0.9) !important; font-weight:bolder;" >Kue Kering & Gorengan</h4>
            </div>   
    
            <div class=" row" id="templateContainer">
                @foreach($templates as $template)
                    @include('partials.template_card', ['template' => $template])
                @endforeach
            </div>
        </div>
    </div>
    <div  id="order" class="serv col-lg-4 col-12">                
        <div style="margin: 0px" class="cart order">
            <div class="section" style="margin-bottom: 20px">
                <h4 style="padding:0px; text-align:center; color:rgba(0,0,0,0.9) !important; font-weight:bolder;" >Detail Pesanan</h4>
            </div>
                
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Masukan Nama Kamu..." required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="phone_number" class="form-control" placeholder="Masukan Nomor HP Kamu..." required>
                    </div>
                    <input type="hidden" name="order_detail" id="order_detail">
                    <input type="hidden" name="total_payment" id="total_payment">
                
                    <div id="order-items">-</div> 
        
                    <div class="Subtotal d-flex justify-content-between align-items-center">
                        <h5 style="color: rgba(0, 0, 0, 0.8) !important;" class="cart-title">Total Pesanan</h5>
                        <h5 class="cart-title price" id="Subtotal">Rp. 0</h5>
                    </div>
    
                <button id="next-button"  type="submit" class="w-100 nextBtn btn">PESAN</button>
        </div>        
    </div>
</div>
</form>
</div>
</div>


 {{-- Footer Section --}}
 @include('partials.footer')  
 


 {{-- baru --}}     
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
 <script>
    sessionStorage.clear();
 
    document.addEventListener("DOMContentLoaded", function () {
    let selectedTemplates = JSON.parse(sessionStorage.getItem("selectedTemplates")) || [];

    function updateOrderList() {
        let orderItemsContainer = document.getElementById("order-items");
        let totalPrice = 0;
        orderItemsContainer.innerHTML = "";

        selectedTemplates.forEach((template, index) => {
            let itemTotalPrice = template.price * template.quantity; // Harga total per item
            totalPrice += itemTotalPrice; 

                orderItemsContainer.innerHTML += `
                <div class="mb-2">
                    <p style="padding:0px" class="cart-title mb-1">${template.title}</p>

                <div  class="d-flex align-items-center">
                    <p class="price mb-0" style="color:#FC9C07 !important; flex-grow: 1; padding:0px; margin:0px"  id="price-${index}">Rp. ${itemTotalPrice.toLocaleString()}</p>
                    <div class="d-flex align-items-center">
                        <button style="width:30px; height:20px; padding:0px; border-radius:5px;" class="btn btn-sm btn-outline-secondary quantity-decrease" data-index="${index}">-</button>
                        <input type="number" min="1" class="quantity-input text-center mx-1" data-index="${index}" value="${template.quantity}" style="width: 30px;  height:20px;">
                        <button style="width:30px; align-item:center; height:20px; padding:0px; border-radius:5px;" class="btn btn-sm btn-outline-secondary quantity-increase" data-index="${index}">+</button>
                    </div>
                </div>

                </div>

                `;
            });

            document.getElementById("Subtotal").innerText = "Rp. " + totalPrice.toLocaleString();
            
            let orderList = "<ol>";
selectedTemplates.forEach(order => {
orderList += `<li>${order.title} (${order.quantity})</li>`;
});
orderList += "</ol>";

// Hilangkan karakter yang tidak diinginkan
document.getElementById("order_detail").value = orderList;




            document.getElementById("total_payment").value = totalPrice;
            
        }
// Cek kembali checkbox saat halaman dimuat
document.querySelectorAll(".template-checkbox").forEach(checkbox => {
        let templateId = checkbox.dataset.templateId;
        if (selectedTemplates.some(t => t.id === templateId)) {
            checkbox.checked = true;
        }
    });

    // Event listener untuk checkbox
    document.body.addEventListener("change", function (event) {
        if (event.target.classList.contains("template-checkbox")) {
            let templateId = event.target.dataset.templateId;
            let templateTitle = event.target.dataset.templateTitle;
            let templatePrice = parseFloat(event.target.dataset.templatePrice);

            if (event.target.checked) {
                selectedTemplates.push({
                    id: templateId,
                    title: templateTitle,
                    price: templatePrice,
                    quantity: 1
                });
            } else {
                selectedTemplates = selectedTemplates.filter(t => t.id !== templateId);
            }

            sessionStorage.setItem("selectedTemplates", JSON.stringify(selectedTemplates));
            updateOrderList();
        }
    });

    // Fungsi update quantity dan harga
    function updateQuantity(index, newQuantity) {
        if (newQuantity > 0) {
            selectedTemplates[index].quantity = newQuantity;
            sessionStorage.setItem("selectedTemplates", JSON.stringify(selectedTemplates));
            document.getElementById(`price-${index}`).innerText = 
                "Rp. " + (selectedTemplates[index].price * newQuantity).toLocaleString();
            updateOrderList();
        }
    }

    // Event listener untuk tombol +
    document.body.addEventListener("click", function (event) {
        if (event.target.classList.contains("quantity-increase")) {
            let index = event.target.dataset.index;
            updateQuantity(index, selectedTemplates[index].quantity + 1);
        }
    });

    // Event listener untuk tombol -
    document.body.addEventListener("click", function (event) {
        if (event.target.classList.contains("quantity-decrease")) {
            let index = event.target.dataset.index;
            if (selectedTemplates[index].quantity > 1) {
                updateQuantity(index, selectedTemplates[index].quantity - 1);
            }
        }
    });

    // Event listener untuk input manual quantity
    document.body.addEventListener("input", function (event) {
        if (event.target.classList.contains("quantity-input")) {
            let index = event.target.dataset.index;
            let newQuantity = parseInt(event.target.value);
            updateQuantity(index, newQuantity);
        }
    });

    // Panggil saat pertama kali halaman dimuat
    updateOrderList();
});
</script>
<script>
    document.getElementById('next-button').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah submit otomatis sebelum validasi

        let name = document.querySelector('input[name="name"]').value.trim();
        let phone = document.querySelector('input[name="phone_number"]').value.trim();
        let order = document.getElementById('order_detail').value.trim();

        // Cek apakah input kosong
        if (name === '' || phone === '' || order === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Maaf...',
                text: 'Harap isi Nama dan Nomor Hp sebelum melanjutkan!',
                confirmButtonColor: "#E18903"
            });
            return; // Hentikan eksekusi jika ada input yang kosong
        }

        // Jika input sudah terisi, tampilkan konfirmasi checkout
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to proceed with the checkout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#488EFE",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Checkout!"
        }).then((result) => {
            if (result.isConfirmed) { 
                document.getElementById('personal-info-form').submit(); // Submit form
                
                // Tampilkan loading Swal
                Swal.fire({
                    title: 'Please wait...',
                    html: `<div style="text-align: center;">
                            <div class="spinner" style="display: inline-block; margin: 10px auto;"></div>
                        </div>`,
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

            } else {
                Swal.close();
            }
        });

    });
</script>

 
 </body>
 </html>

 {{-- end baru --}}