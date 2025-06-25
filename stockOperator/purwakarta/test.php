<!DOCTYPE html>
<html>
<head>
  <title>Sisa Pembayaran</title>
</head>
<body>
  <h2>Transaksi Pembayaran</h2>

  <table border="1" id="tabelPembayaran">
    <thead>
      <tr>
        <th>Item</th>
        <th>Harga</th>
        <th>Dibayar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Apel</td>
        <td class="harga">10000</td>
        <td class="dibayar">5000</td>
      </tr>
      <tr>
        <td>Pisang</td>
        <td class="harga">8000</td>
        <td class="dibayar">8000</td>
      </tr>
      <tr>
        <td>Jeruk</td>
        <td class="harga">9000</td>
        <td class="dibayar">4000</td>
      </tr>
    </tbody>
  </table>

  <br>

  <label>Sisa yang Harus Dibayar: 
    <input type="text" id="sisaPembayaran" readonly>
  </label>

  <script>
    function hitungSisaPembayaran() {
      const hargaEls = document.querySelectorAll('.harga');
      const dibayarEls = document.querySelectorAll('.dibayar');

      let totalHarga = 0;
      let totalDibayar = 0;

      hargaEls.forEach(el => {
        totalHarga += parseInt(el.textContent) || 0;
      });

      dibayarEls.forEach(el => {
        totalDibayar += parseInt(el.textContent) || 0;
      });

      const sisa = totalHarga - totalDibayar;

      document.getElementById('sisaPembayaran').value = sisa.toLocaleString();
    }

    window.onload = hitungSisaPembayaran;
  </script>
</body>
</html>
