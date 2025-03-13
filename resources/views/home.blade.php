<style>
    .carousel-indicators{
        margin-bottom: -30px !important;
        
    }
    .carousel-indicators li {
    background-color: rgba(225, 137, 3, 0.5) !important; /* Warna indikator default */
    opacity: 0.5;
}

.carousel-indicators .active {
    background-color: #E18903 !important; /* Warna indikator aktif */
    opacity: 1;
}
    
</style>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-color: #FAFAFA;" id="home">  

{{-- navbar section --}}
@include('partials.navbar')





{{-- Instal Build Website --}}
<div  class="">
<div class="container" style="margin-top: 70px">
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/baner.svg" class="d-block w-100 rounded-3" alt="Banner">
            </div>
            <div class="carousel-item">
                <img src="img/kastengel.png" class="d-block w-100 rounded-3" alt="kastengel">
            </div>
            <div class="carousel-item">
                <img src="img/semprit.png" class="d-block w-100 rounded-3" alt="semprit">
            </div>
            <div class="carousel-item">
                <img src="img/bawang.png" class="d-block w-100 rounded-3" alt="bawang">
            </div>
            <div class="carousel-item ">
                <img src="img/gabus.png" class="d-block w-100 rounded-3" alt="gabus">
            </div>
            <div class="carousel-item">
                <img src="img/kacang.png" class="d-block w-100 rounded-3" alt="kacang">
            </div>
            <div class="carousel-item">
                <img src="img/keju.png" class="d-block w-100 rounded-3" alt="Keju">
            </div>
            <div class="carousel-item">
                <img src="img/jambu.png" class="d-block w-100 rounded-3" alt="Jambu">
            </div>
            <div class="carousel-item">
                <img src="img/salju.png" class="d-block w-100 rounded-3" alt="Salju">
            </div>
        </div>

        <!-- Indikator (dot dot) -->
        <ol class="carousel-indicators">
            <li data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="2"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="3"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="4"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="5"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="6"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="7"></li>
            <li data-bs-target="#imageCarousel" data-bs-slide-to="8"></li>
        </ol>
    
        <!-- Tombol navigasi -->
        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button> --}}
    </div>
<form class="justify-content-center" id="personal-info-form" method="POST" action="{{ route('orderstore') }}" enctype="multipart/form-data">        
    @csrf
<div style="margin-top:20px;"  class="menu serv hero-text row">
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
    
                <button style="margin-top: 40px" id="next-button"  type="submit" class="w-100 nextBtn btn">PESAN</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            title: "Pesanan Kamu Benar?",
            text: "Apa pesanan kamu sudah benar dan ingin melanjutkan?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#488EFE",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya, Pesan",
            cancelButtonText: "Batal"
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