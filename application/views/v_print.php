<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-body">
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit" class="btn btn-info">Tampilkan</button>
        <a class="btn btn-warning" href="<?php echo base_url()."prints"; ?>">Reset Filter</a>
    </form>
    <hr />
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0"><b><?php echo $ket; ?></b><br><br>
    			<a class="btn btn-success btn-xs" href="<?php echo $url_cetak; ?>">CETAK PDF</a>
    		</h5>
            </div>
            <table class="table">
                  <thead>
                    <tr>
				        <th scope="col">No Tiket</th>
				        <th scope="col">Nama User</th>
				        <th scope="col">Masalah</th>
				        <th scope="col">Status</th>
                      	<th scope="col">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					    if( ! empty($transaksi)){
					    	$no = 1;
					    	foreach($transaksi as $data){
					            $create_at = date('m/d/Y', strtotime($data->create_at));
					            
					    		echo "<tr>";
						    		echo "<td>".$data->no_tiket."</td>";
						    		echo "<td>".$data->nama."</td>";
						    		echo "<td>".$data->masalah."</td>";
						    		echo "<td>".$data->nama_sts."</td>";
						    		echo "<td>".$create_at."</td>";
					    		echo "</tr>";
					    		$no++;
					    	}
					    }
					?>
                  </tbody>
            </table>
        </div>
    </div></div></div></div>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'DD/MM/YYYY' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
<?php $this->load->view('layout/fefooter'); ?>