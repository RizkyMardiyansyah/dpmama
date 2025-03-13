@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

  <body id="home">
    {{-- navbar section --}}
    @include('partials.navbar')

    <div id="services" class="services container hero-text ">
        
            <div class="row">
                @csrf
                <div class="finishCart container serv">                
                    <div class="">

                        <div class="cart">
                            <div class="section">
                                <h5 style="text-align: center; font-size:30px !important;" class="form-section mb-4">Pemesanan Berhasil</h5>
                                    <h6 style="text-align:center; font-family: Poppins;">{{ $pesanan->updated_at->translatedFormat('d F Y | H:i:s') }}</h6>
                            </div>
                            <div>
                                <p class="cart-title">Hi, <strong class="cart-title">{{ $pesanan->name }}</strong></p>
                                <p class="cart-title">Terimakasih sahabat dapoer mama, pesananmu berhasil berhasil disimpan dan segera kami proses, silahkan tunggu informasi lebih lanjut dari kami. 
                                </p>

                                
                                <div class="orderp20" style="padding-top: 20px">
                                    <div style="border: none" class="order">   
                            
                                        <div class="p-0 cart mb-4">
                                            <div class="section p-0">
                                                <p  class="cart-title" style="text-align:center; font-weight:bold">Detail Pesanan</p>
                                            </div>
                                            <div class="p-3">
                            
                                                <span class="cart-des">{!! $pesanan->orders !!}</span>
                                                
                    
                                                <div class="Subtotal d-flex justify-content-between align-items-center">
                                                    <p  style="font-weight: 700 !important; color: rgba(0, 0, 0, 0.8) !important;" class="cart-title" >Total Pesanan</p>
                                                    <p style="font-weight:  700 !important;" class="cart-title" class="price">{{ $pesanan->total_payment == 0 ? 'Rp. 0' : 'Rp. ' . number_format( $pesanan->total_payment, 0, ',', '.') }}</p>
                                                </div>  
                                            </div>              
                                        </div>
                                       
                                        <a href="/" style="font-weight: bolder" type="submit" class="nextBtn w-100 btn btn-primary">Kembali Ke Halaman Utama</a>
                                    </div>
                                </div>

                            </div>
                                                       
                        </div>
                    </div>
                </div> 
            </div>
        
    </div>

{{-- Footer Section --}}
@include('partials.footer')

<!-- Script untuk AJAX Pencarian -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        title: 'Horee!',
        text: 'Pemesanan kamu berhasil.',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500,
        });
    });
</script>  
</body>
</html>
