<style>
    .form-group{
        margin-top: 20px;
        font-size: 14px !important;
        input{
            font-size: 14px !important;
            padding:10px;
        }
    }
    .navbar{
        background-color: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan saat discroll */
        .nav-link{
        color: #191250 !important;
        }
        .white{      
        display:none;   
        }
        .blue{
        display:block;
        }
    }

    #home{
        background-color: #FAFAFA;
        /* background-color: rgba(0, 0, 0, 0.9) !important; */
    }

</style>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta name="title" content="Mitra Adidaya Rekayasa Digital">
    <title>Mitra Adidaya Rekayasa Digital</title>
    {{-- <title>{{ $sitename }}</title> --}}
    <meta name="keywords" content="digital solutions, business optimization, software development, IT consulting, buat website, domain, website, software, development, IT consultant">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/heroicons@2.0.16/css/heroicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
  </head>
  <body id="home">
    {{-- navbar section --}}
    @include('partials.navbar')

    <div id="services" class="services container hero-text ">
        <div class="row">
            
            <div class="serv col-md-8 col-12">                
                <div class="">
                    <div class="container">

                        <!-- Personal Information Section -->
                        <div class="cart">
                            <h5 class="form-section" data-lang-en="Personal Information" data-lang-id="Informasi Personal"></h5>
                            <form>
                                <div class="form-group">
                                    <label class="form-label" for="nik">NIK</label>
                                    <input  type="text" id="nik" name="nik" class="form-control" placeholder="Enter your NIK" required mainlength="16">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="name" data-lang-en="Name" data-lang-id="Nama"></label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone_number" data-lang-en="Phone Number" data-lang-id="Nomor Telepon"></label>
                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Enter your phone number" required maxlength="255">
                                </div>
                            </form>
                        </div>
                    
                        <!-- Additional Documents Section -->
                        <div id="doc" class="cart" style="margin-top: 20px">
                            <h5 class="form-section" style="color: black;" data-lang-en="Supporting Documents" data-lang-id="Dokumen Pendukung"></h5>
                            <form>
                                <div class="form-group">
                                    <label class="form-label" for="ktp">KTP</label>
                                    <input type="file" id="ktp" name="ktp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="siup">SIUP</label>
                                    <input type="file" id="siup" name="siup" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="npwp">NPWP</label>
                                    <input type="file" id="npwp" name="npwp" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>                
            </div> 
            <div class="serv col-md-4 col-12">                
                    {{-- <div class="cart order">
                        <div>   
                            <h5 style="text-align:center" data-lang-en="Order Summary" data-lang-id="Ringkasan Pemesanan"></h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="cart-title" data-lang-en="Domain (1 Year)" data-lang-id="Domain (1 Tahun)"></p>
                                <p class="cart-title" id="domain-price" class=" price"></p>
                            </div>
                            <span class="cart-des" id="selected-domain">-</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="cart-title" data-lang-en="Web Template" data-lang-id="Web Template"></p>
                                <p class="cart-title" id="template-price" class=" price"></p>
                            </div>
                            <span class="cart-des" id="selected-template">-</span>

                            <div class="Subtotal d-flex justify-content-between align-items-center">
                                <h5 class="cart-title" data-lang-en="Subtotal" data-lang-id="Subtotal"></h5>
                                <h5 class="cart-title" id="Subtotal" class="price"></h5>
                            </div>

                            <button id="next-button"  class="w-100 btn btn-primary" data-lang-en="Next" data-lang-id="Selanjutnya"></button>
                        </div>
                    </div> --}}
                    <div class="cart order">
                        <div>   
                            <h5 style="text-align:center" data-lang-en="Order Summary" data-lang-id="Ringkasan Pemesanan"></h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-left">
                                    <p class="cart-title" data-lang-en="Domain (" data-lang-id="Domain ("></p><p style="margin-right: 2px" class="cart-title" id="domainYears">1</p><p class="cart-title" data-lang-en="Years)" data-lang-id="Tahun)"></p>
                                </div>
                                <p class="cart-title" id="domain-price" class=" price"></p>
                            </div>
                            <span class="cart-des" id="selected-domain">-</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="cart-title" data-lang-en="Web Template" data-lang-id="Web Template"></p>
                                <p class="cart-title" id="template-price" class=" price"></p>
                            </div>
                            <span class="cart-des" id="selected-template">-</span>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-left">
                                    <p class="cart-title" data-lang-en="Subscription (" data-lang-id="Langanan ("></p><p style="margin-right: 2px" class="cart-title" id="subYears">1</p><p class="cart-title" data-lang-en="Years)" data-lang-id="Tahun)"></p>
                                </div>
                                    <p class="cart-title" id="subs-price-cart" class=" price">Rp. 0</p>
                            </div>
                            <span class="cart-des" id="" data-lang-en="Subscription fee for website management service." data-lang-id="Biaya langganan untuk layanan pengelolaan website"></span>

                            <div class="Subtotal d-flex justify-content-between align-items-center">
                                <h5 class="cart-title" data-lang-en="Subtotal" data-lang-id="Subtotal"></h5>
                                <h5 class="cart-title" id="Subtotal" class="price"></h5>
                            </div>

                            <button id="next-button"  class="w-100 btn btn-primary" data-lang-en="Next" data-lang-id="Selanjutnya"></button>
                        </div>
                    </div>
            </div>           
        </div>
    </div>

{{-- Footer Section --}}
@include('partials.footer')

<!-- Script untuk AJAX Pencarian -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('next-button').addEventListener('click', function(event) {
        const inputs = {
            nik: document.getElementById('nik'),
            name: document.getElementById('name'),
            email: document.getElementById('email'),
            phone_number: document.getElementById('phone_number')
        };

        const docSection = document.getElementById('doc');
        const docFields = {
            ktp: document.getElementById('ktp'),
            siup: document.getElementById('siup'),
            npwp: document.getElementById('npwp')
        };

        let isValid = true;

        const validateInput = (input, regex, minLength, maxLength, customMessage) => {
            if (input.value.trim() === '' || 
                (minLength && input.value.length < minLength) || 
                (maxLength && input.value.length > maxLength) || 
                (regex && !regex.test(input.value.trim()))) {
                input.style.border = '1px solid red';
                input.setCustomValidity(customMessage);
                isValid = false;
            } else {
                input.style.border = '';
                input.setCustomValidity('');
            }
            input.reportValidity();
        };

        validateInput(inputs.nik, /^\d{16}$/, 16, 16, 'Required valid NIK.');
        validateInput(inputs.name, null, 1, null, 'Required.');
        validateInput(inputs.email, /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/, 1, null, 'Required valid email.');
        validateInput(inputs.phone_number, /^\d{10,15}$/, 10, 15, 'Required valid phone number.');

        if (docSection.classList.contains('visible')) {
            if (!docFields.ktp.value.trim() || !docFields.siup.value.trim() || !docFields.npwp.value.trim()) {
                isValid = false;
                if (!docFields.ktp.value.trim()) {
                    docFields.ktp.style.border = '1px solid red';
                    docFields.ktp.setCustomValidity('KTP is required.');
                }
                if (!docFields.siup.value.trim()) {
                    docFields.siup.style.border = '1px solid red';
                    docFields.siup.setCustomValidity('SIUP is required.');
                }
                if (!docFields.npwp.value.trim()) {
                    docFields.npwp.style.border = '1px solid red';
                    docFields.npwp.setCustomValidity('NPWP is required.');
                }
            }
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const domain = sessionStorage.getItem("domain") || "-";
        const template = sessionStorage.getItem("template") || "-";
        const templateId = sessionStorage.getItem("templateId") || "-";
        const subYears = sessionStorage.getItem("year") || "1";
        const domainPrice = parseInt(sessionStorage.getItem("newDomainPrice")?.replace(/[^\d]/g, '') || "0", 10);
        const templatePrice = parseInt(sessionStorage.getItem("templatePrice")?.replace(/[^\d]/g, '') || "0", 10);
        const subsPrice = parseInt(sessionStorage.getItem("subsPrice")?.replace(/[^\d]/g, '') || "0", 10);

        if (domain.toLowerCase().includes('.co.id')) {
            $('#doc').addClass('visible');
        } else {
            $('#doc').removeClass('visible');
        }

        if (!domain || domain === "-" || !template || template === "-") {
            window.location.href = '/';
        }

        const Subtotal = domainPrice + templatePrice + subsPrice;

        const formatRupiah = (value) => value >= 0 ? `Rp. ${value.toLocaleString('id-ID')}` : "-";

        document.getElementById("selected-domain").innerText = domain;
        document.getElementById("domain-price").innerText = formatRupiah(domainPrice);
        document.getElementById("selected-template").innerText = template;
        document.getElementById("template-price").innerText = formatRupiah(templatePrice);
        document.getElementById("domainYears").innerText = formatRupiah(subYears);
        document.getElementById("subYears").innerText = formatRupiah(subYears);
        document.getElementById("subs-price-cart").innerText = formatRupiah(subsPrice);
        document.getElementById("Subtotal").innerText = formatRupiah(Subtotal);
    });

    $('#cart .btn-primary').on('click', function () {
        window.location.href = '/cart';
    });
</script>




    

    <script>
//   JS untuk toggle bahasa
        window.onload = function () {
            // Ambil preferensi bahasa dari localStorage
            const savedLanguage = localStorage.getItem('preferredLanguage') || 'en';

            // Atur posisi toggle sesuai bahasa tersimpan
            const languageToggle = document.getElementById('languageToggle');
            languageToggle.checked = (savedLanguage === 'en');
            
            // Set bahasa saat halaman dimuat
            switchLanguage(savedLanguage);
            updateToggleText(savedLanguage);
        };

        // Tambahkan event listener pada toggle
        const toggleCheckbox = document.getElementById('languageToggle');

        toggleCheckbox.addEventListener('change', function () {
            const selectedLang = toggleCheckbox.checked ? 'en' : 'id';

            // Simpan preferensi bahasa ke localStorage
            localStorage.setItem('preferredLanguage', selectedLang);

            // Ubah bahasa dan teks toggle
            switchLanguage(selectedLang);
            updateToggleText(selectedLang);
        });

        function switchLanguage(lang) {
            const elements = document.querySelectorAll('[data-lang-en]');

            elements.forEach(element => {
                element.textContent = element.getAttribute('data-lang-' + lang);
            });
        }

        function updateToggleText(lang) {
            const toggleInner = document.querySelector('.toggle-inner');
            toggleInner.textContent = lang === 'en' ? 'EN' : 'IN';
        }
//   End JS untuk toggle bahasa


    window.onscroll = function() {
        const navbar = document.getElementById('navbar');
        const floatingButton = document.getElementById("floatingButton");
        
        // Memeriksa scroll untuk navbar
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Menampilkan/menyembunyikan tombol berdasarkan scroll
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            floatingButton.style.display = "block";
        } else {
            floatingButton.style.display = "none";
        }
    };

    // Fungsi untuk menggulir ke atas saat tombol diklik
    function topFunction() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Smooth scroll untuk navigasi di halaman yang sama
document.querySelectorAll('a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');

        if (targetId && targetId.startsWith('/#')) {
            const targetElement = document.querySelector(targetId.slice(1)); // Menghapus '/' agar selector valid

            if (targetElement) { // Periksa apakah elemen target ada
                e.preventDefault(); // Mencegah navigasi default
                const offsetPosition = targetElement.getBoundingClientRect().top + window.scrollY - 80;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }
    });
});

// Pindah ke posisi elemen setelah halaman dimuat
window.addEventListener('load', () => {
    const hash = window.location.hash; // Mendapatkan bagian hash dari URL
    if (hash) {
        const targetElement = document.querySelector(hash); // Mencari elemen dengan ID hash
        if (targetElement) {
            const offsetPosition = targetElement.getBoundingClientRect().top + window.scrollY - 80;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth' // Bisa juga diubah menjadi 'auto' jika tidak ingin animasi di sini
            });
        }
    }
});

</script>
  
</body>
</html>
