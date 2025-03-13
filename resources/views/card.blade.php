<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Raleway", sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            padding: 20px;
        }
        .header img {
            width: 150px;
            height: auto;
        }
        .tittle {
            font-weight: bold;
            text-align: center;
            color: #488EFE;
            margin-bottom: 20px;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .order-details th, .order-details td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .order-details th {
            background-color: #488EFE;
            color: white;
            font-weight: bold;
        }
        .totalPayment {
            color: #488EFE;
            font-weight: bold;
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
    <div class="header">
        <img src="mamalogo.svg" alt="Logo Mamalogo">
    </div>
    <div class="container">
        <h2 class="tittle">INVOICE</h2>
        <table>
            <tr>
                <td>Pelanggan</td>
                <td>: {{ $record['name'] }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $record['updated_at']->translatedFormat('d F Y | H:i:s') }}</td>
            </tr>
        </table>
        <div class="order-details">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                </tr>
                <tr>
                    <td>Pesanan</td>
                    <td>{!! $record['orders'] !!}</td>
                    <td>-</td>
                    <td>Rp. {{ number_format($record['total_payment'], 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="totalPayment" colspan="3">TOTAL PEMBAYARAN</td>
                    <td class="totalPayment">Rp. {{ number_format($record['total_payment'], 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih telah melakukan pemesanan di MARDSoft.</p>
            <p>Jika ada pertanyaan, hubungi kami di <a href="mailto:hi@mardsoft.com">hi@mardsoft.com</a></p>
        </div>
    </div>
</body>
</html>
