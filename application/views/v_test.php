<div class="container">
	<div class="card-body">
	    <h5 class="card-title m-b-0">Static Table</h5>
	</div>
	<table class="table" id="target">
	      <thead>
	        <tr>
	          <th scope="col">Nama</th>
	          <th scope="col">Email</th>
	          <th scope="col">Divisi</th>
	          <th scope="col">Level</th>
	        </tr>
	      </thead>
	      <tbody>
	      </tbody>
	</table>
</div>
<script type="text/javascript">


	function ambilData() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url()."test/ambil"; ?>',
			dataType:'json',
			success:function(data){
				var baris ='';
				for (var i=0;i<data.length;i++) {
				baris+= '<tr>' +
							'<td>'+ data[i].nama +'</td>' +
							'<td>'+ data[i].email +'</td>' +
							'<td>'+ data[i].no_div +'</td>' +
							'<td>'+ data[i].level +'</td>' +
						'</tr>';
				}
				$('#target').html(baris);
			}
		});
	}
</script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
