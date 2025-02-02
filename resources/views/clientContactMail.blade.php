<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Message Has Been Received</title>
    <style>
        .justify-content-center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; /* opsional, untuk memberi jarak */
        }
        .cart-des{
            color: rgba(0, 0, 0, 0.6) !important;
        }
        body {
            font-family: "Raleway", sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            /* padding: 20px; */
        }
        .tittle {
            font-weight: bolder;
            text-align: center;
            color: #488EFE;
        }
        .header img {
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            width: 100%; /* Lebar penuh */
            height: auto;
        }
        .content {
            padding-top: 0px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container" style="padding: 0px; width:600px;">
        
        <div class="header">
            <div class="kop">
                <img src="{{ config('app.url') }}/img/kop.png" alt="kop" style="max-width: 100%; height: auto;">

            </div>
        </div>
        <div class="content">
            <div class="content">
                <h2 class="tittle" style="font-size: bolder;">Pesan Berhasil Diterima</h2>
                <p>Yth. {{ $validated['name'] }},</p>
                <p>Terima kasih telah menghubungi <a href="{{ config('app.url') }}" target="_blank"> {{ config('app.name') }}</a>, Pesan Anda telah kami terima dengan baik.</p>
                <p>Kami sangat menghargai ketertarikan Anda. Tim kami akan segera menghubungi Anda untuk mendiskusikan lebih lanjut mengenai peluang kerja sama yang dapat kita jalin.</p>
                <p>Kami percaya bahwa melalui kolaborasi yang tepat, kita dapat menciptakan solusi inovatif yang memberikan nilai tambah bagi bisnis Anda. Kami menantikan kesempatan untuk bekerja sama dengan Anda.</p> 
                <p>Jika Anda membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
                <table style="margin-top: 50px;">
                    <tr>
                        <td style="width: 50%"></td>
                        <td style="width: 50%">
                            <div class="flex-column ">  
                                <p>Hormat kami,</p>
                                <p><strong>{{ config('app.name') }}</strong></p>
                                <a style="color: black; text-decoration:inherit; margin-top:20px;" href="https://wa.me/62895405543809" target="_blank"> Rizky Mardiyansyah</a>
                                <a style="color: black; text-decoration:inherit;" href="https://wa.me/62895405543809" target="_blank">0895-4055-43809</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <hr style="margin: 20px 0; border: 1px solid #ccc;">
            
            <div class="content">
                <h2 class="tittle" style="font-size: bolder;">Your Message Has Been Received</h2>
                <p>Dear {{ $validated['name'] }},</p>
                <p>Thank you for contacting <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>. We have successfully received your message.</p>
                <p>We greatly appreciate your interest. Our team will reach out to you shortly to further discuss potential collaboration opportunities.</p>
                <p>We believe that through the right collaboration, we can create innovative solutions that add value to your business. We look forward to the opportunity to work together.</p>
                <p>If you need further assistance, please do not hesitate to contact us.</p>
                <table style="margin-top: 50px;">
                    <tr>
                        <td style="width: 50%"></td>
                        <td style="width: 50%">
                            <div class="flex-column">  
                                <p>Best regards,</p>
                                <p><strong>{{ config('app.name') }}</strong></p>
                                <a style="color: black; text-decoration: inherit; margin-top: 20px;" href="https://wa.me/62895405543809" target="_blank">Rizky Mardiyansyah</a>
                                <a style="color: black; text-decoration: inherit;" href="https://wa.me/62895405543809" target="_blank">0895-4055-43809</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer">
            <div class="footer">
                <p>Copyright © <span id="year"></span> | {{ ucwords(strtolower(config('app.name'))) }}</p>
            </div>

    </div>
    </div>
</body>

</html>
