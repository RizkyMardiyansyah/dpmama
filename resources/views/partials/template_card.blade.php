<div class="card webtemplate col-lg-4 col-md-6 col-12">
    <a href="{{ $template->link }}" target="_blank">
        <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->title }}">
    </a>
    <div class="d-flex" style="padding: 0px">
        <div class="card-title">
            <a style="text-decoration: none; color: black;">
                {{ $template->title }}
            </a>
            <br>
            <a style="text-decoration: none; color: inherit;">
                Rp.{{ number_format($template->price, 0, ',', '.') }}
            </a>
            
        </div>
        <div class="d-flex" style="margin-left: auto">
            <input style="width: 20px;" type="checkbox" class="template-checkbox" 
                   data-template-id="{{ $template->id }}" 
                   data-template-title="{{ $template->title }}" 
                   data-template-price="{{ $template->price }}">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let selectedTemplates = JSON.parse(sessionStorage.getItem("selectedTemplates")) || [];

        // Cek kembali checkbox berdasarkan sessionStorage saat halaman dimuat
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
                let templatePrice = event.target.dataset.templatePrice;

                if (event.target.checked) {
                    // Tambahkan template ke array dengan quantity default = 1
                    selectedTemplates.push({
                        id: templateId,
                        title: templateTitle,
                        price: templatePrice,
                        quantity: 1
                    });
                } else {
                    // Hapus template dari array
                    selectedTemplates = selectedTemplates.filter(t => t.id !== templateId);
                }

                // Simpan kembali ke sessionStorage
                sessionStorage.setItem("selectedTemplates", JSON.stringify(selectedTemplates));
            }
        });
    });
</script>
