<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
  <table border="1" cellpadding="8">
  <tr>
    <th>Tanggal</th>
    <th>Kode Transaksi</th>
    <th>Barang</th>
    <th>Jumlah</th>
    <th>Total Harga</th>
  </tr>

    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $create_at = date('d-m-Y', strtotime($data->create_at));

    		echo "<tr>";
    		echo "<td>".$create_at."</td>";
    		echo "<td>".$data->no_tiket."</td>";
    		echo "<td>".$data->masalah."</td>";
    		echo "<td>".$data->id_com."</td>";
    		echo "<td>".$data->id_user."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
  </table>
</body>
</html>