<!DOCTYPE html>
<?php session_start() ;?>
<html lang="en">
	<?php
		include("head.php");
		?>

	<body class="no-skin">
	<?php
		include("navbar.php");
		?>
	<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<?php
				include("menu.php");
				?>
			
			<div class="main-content">
				<div class="main-content-inner">				
					<div class="page-content">				
						<div class="page-header">
							<h1>
								Absensi TTM
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Peragaan Absensi TTM
								</small>
							</h1>
						</div><!-- /.page-header -->
						<?php
						require_once("koneksi.php");
						
						if(isset($_GET['id'])){
							$qq = mysqli_query($koneksi,"SELECT * FROM absensi WHERE id_absensi='$_GET[id]'") or die (mysqli_error($koneksi));
							$rr = mysqli_fetch_object($qq);
							
							$a = $rr->id_absensi;
							$b = $rr->kode_kabko;
							$c = $rr->id_lokasi;
							$d = $rr->id_kelas;
							$e = $rr->semester;
							$f = $rr->id_mk;
							$g = $rr->id_tutor;
							$h = $rr->pertemuan;
							$i = $rr->jumlah;
							$j = $rr->fasilitator_upbjj;
							$m = $rr->fasilitator_pokjar;
							
						}else{
							$a = '';
							$b = '';
							$c = '';
							$d = '';
							$e = '';
							$f = '';
							$g = '';
							$h = '';
							$i = '';
							$j = '';
							$m = '';
							
						}
						
						if(isset($_POST['simpan'])){
							if(isset($_GET['id'])){
								$query = mysqli_query($koneksi,"UPDATE absensi SET kode_kabko='$_POST[kode_kabko]',id_lokasi='$_POST[id_lokasi]',id_kelas='$_POST[id_kelas]',semester='$_POST[semester]',id_mk='$_POST[id_mk]',id_tutor='$_POST[id_tutor]',
																pertemuan='$_POST[pertemuan]',jumlah='$_POST[jumlah]',fasilitator_upbjj='Anto',fasilitator_pokjar='$_POST[fasilitator_pokjar]' WHERE id_absensi='$_GET[id]'") or die (mysqli_error($koneksi));
								if($query){
									echo "<script>";
									echo "alert('Berhasil Dirubah!');";
									echo "location='absensi.php'";
									echo "</script>";
								}else{
									echo "<script>";
									echo "alert('Kabko GAGAL di Rubah');";
									echo "</script>";
								}
							}else{
								$query = mysqli_query($koneksi,"INSERT INTO absensi (id_absensi,kode_kabko,id_lokasi,id_kelas,semester,id_mk,id_tutor,pertemuan,jumlah,fasilitator_upbjj,fasilitator_pokjar) 
								VALUES ('','$_POST[nama_kabko]','$_POST[nama_lokasi]','$_POST[nama_kelas]','$_POST[semester]','$_POST[nama_mk]','$_POST[nama_lengkap]','$_POST[pertemuan]','$_POST[jumlah]','Anto','$_POST[fasilitator_pokjar]')") or die (mysqli_error($koneksi)); 
								if($query){
									echo "<script>";
									echo "alert('Data Berhasil ditambahkan!');";
									echo "location='absensi.php';";
									echo "</script>";
								}else{
									echo "<script>";
									echo "alert('Data Gagal diTambahkan!');";
									echo "</script>";
								}
							}
						}						
						?>
						<div class="row">						
							<div class="col-xs-12">
								<!-- Page Form Peragaan -->
								<form class="form-horizontal" action="" method="post" name="form" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> KABKO :</label>
										
										<div class="col-sm-4">										
															<select name="nama_kabko" class="chosen-select form-control" id="kabko" data-placeholder="Choose a State..." required >
																<option>-- Pilih Kabupaten Kota --</option>																
																
																<?php
																	require_once("koneksi.php");																	
																	$kabko=mysqli_query($koneksi,"SELECT * FROM kabko ORDER BY nama_kabko ");
																	while($k=mysqli_fetch_array($kabko))
																	{
																		echo "<option value='$k[kode_kabko]'>$k[nama_kabko]</option>";        
																	}																	 
																	?>																	
															</select>
											
											</div>
										</div>											
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> LOKASI TUTORIAL :</label>
										
										<div class="col-sm-4">										
															<select name="nama_lokasi" value="<?=$c;?>" class="chosen-select form-control" id="lokasi_tutorial" data-placeholder="Choose a State..." required >
																<option>-- Pilih Lokasi Tutorial --</option>				
															</select>
											
											</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> KELAS:</label>
										
										<div class="col-sm-4">										
															<select name="nama_kelas" class="chosen-select form-control" id="kelas" data-placeholder="Choose a State..." required >
																<option>-- Pilih Kelas --</option>																																
															</select>																							
											</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> SEMESTER :</label>
										
										<div class="col-sm-4">										
															<select name="semester" class="chosen-select form-control" id="semester" data-placeholder="Choose a State..." required >
																<option>-- Pilih Semester --</option>
																<?php
																	require_once("koneksi.php");																	
																	$semester=mysqli_query($koneksi,"SELECT * FROM semester ORDER BY nama_semester ");
																	while($s=mysqli_fetch_array($semester))
																	{
																		echo "<option value='$s[semester]'>$s[semester]</option>";        
																	}																	 
																	?>																			
															</select>
											
											</div>
										</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> MATA KULIAH :</label>
										
										<div class="col-sm-4">										
															<select name="nama_mk" class="chosen-select form-control" id="mata_kuliah" data-placeholder="Choose a State..." required >
																<option>-- Pilih Mata Kuliah --</option>
																
															</select>
											
											</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-select-3"> TUTOR :</label>
										
										<div class="col-sm-4">										
															<select name="nama_lengkap" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." required >
																<option>-- Pilih Tutor --</option>
																<?php
																	require_once("koneksi.php");																	
																	$query=mysqli_query($koneksi,"SELECT * FROM tutor ORDER BY nama_lengkap ");
																	while($w=mysqli_fetch_array($query))
																	{
																		echo "<option value=$w[id_tutor]>$w[nama_lengkap]</option>";        
																	}																	 
																	?>																	
															</select>
											
											</div>
										</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PERTEMUAN Ke :</label>

										<div class="col-sm-9">
											<input type="text" name="pertemuan" value="<?=$h;?>" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> JUMLAH MAHASISWA HADIR :</label>

										<div class="col-sm-9">
											<input type="text" name="jumlah" value="<?=$i;?>" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> FASILITATOR POKJAR :</label>

										<div class="col-sm-9">
											<input type="text" name="fasilitator_pokjar" value="<?=$m;?>" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" name="simpan" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Hapus
											</button>
											&nbsp; &nbsp; &nbsp;											
											<a href="lihatdataabsensi.php" class="green">
												<i class="ace-icon fa fa-eye bigger-130"></i>
												Lihat Data	
											</a>
										</div>
									</div>
									
									
								</form>

							</div><!-- /.Page Form Peragaan -->
							
							<div class="row"><!-- /.Page Hasil Peragaan -->
									<div class="col-xs-12">										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Hasil Peragaan TTM Pendas
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>No</th>														
														<th>Nama Kabko</th>
														<th>Lokasi Tutorial</th>
														<th>Kelas</th>
														<th>Semester</th>
														<th>Mata Kuliah</th>
														<th>Tutor</th>
														<th>Pertemuan Ke</th>
														<th>Jumlah Kehadiran</th>
														<th>Fasilitator UPBJJ</th>
														<th>Fasilitator Pokjar</th>
														<th>Tools</th>
													</tr>														
												</thead>

												<tbody>
												<?php													
													$absensi=mysqli_query($koneksi,"SELECT absensi.*,kabko.nama_kabko,lokasi_tutorial.nama_lokasi,kelas.nama_kelas,mata_kuliah.nama_mk,tutor.nama_lengkap FROM absensi 
													JOIN kabko ON kabko.kode_kabko=absensi.kode_kabko 
													JOIN lokasi_tutorial ON lokasi_tutorial.id_lokasi=absensi.id_lokasi
													JOIN kelas ON kelas.id_kelas=absensi.id_kelas
													JOIN mata_kuliah ON mata_kuliah.id_mk=absensi.id_mk
													JOIN tutor ON tutor.id_tutor=absensi.id_tutor") or die (mysqli_error($koneksi));
																									
													$id=0;
													while($rows = mysqli_fetch_object($absensi)){
														$id++;
												?>
													<tr>
														<td><?php echo $id;?></td>														
														<td><?php echo $rows->nama_kabko;?></td>														
														<td><?php echo $rows->nama_lokasi;?></td>
														<td><?php echo $rows->nama_kelas;?></td>
														<td><?php echo $rows->semester;?></td>
														<td><?php echo $rows->nama_mk;?></td>
														<td><?php echo $rows->nama_lengkap;?></td>
														<td><?php echo $rows->pertemuan;?></td>
														<td><?php echo $rows->jumlah;?></td>
														<td><?php echo $rows->fasilitator_upbjj;?></td>
														<td><?php echo $rows->fasilitator_pokjar;?></td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="btn btn-info btn-xs" href="absensi.php?id=<?php echo $rows->id_absensi;?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="btn btn-success btn-xs" onclick="javascript: return confirm('Apakah anda Yakin Ingin Menghapus Data  ?')" href="hapus.php?id=<?php echo $rows->id_absensi;?>&aksi=absensi">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>													
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div><!-- /.page-hasil-peragaan -->
							</div>
							
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php
				include "footer.php"
				?>
				
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript">
			function cek_database(){
				var nip = $("#kabkot").val();
				$.ajax({
					url: 'ajax_cek.php',
					data:"id="+id ,
				}).success(function (data) {
					var json = data,
					obj = JSON.parse(json);
					$('#nama_kabko').val(obj.nama_pegawai);
					$('#alamat').val(obj.alamat);
		 
					var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
				if(obj.jenis_kelamin == 'laki-laki'){
					$jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
				}else{
					$jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
				}
				});
			}
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>		
		
		<!--javacript untuk table -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		
		<!--  ini Javascript Untuk menghapus data -->
		<script>
			$(".hapus").click(function () {
				var jawab = confirm("Press a button!");
				if (jawab === true) {
		//            kita set hapus false untuk mencegah duplicate request
					var hapus = false;
					if (!hapus) {
						hapus = true;
						$.post('hapus.php', {id: $(this).attr('data-id')},
						function (data) {
							alert(data);
						});
						hapus = false;
					}
				} else {
					return false;
				}
			});
			
			
		</script>
		
		<!-- UNTUK MELOAD OTOMATIS -->
		<script src="jquery.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
		
		 <script type="text/javascript">
			var htmlobjek;
			$(document).ready(function(){
			//apabila terjadi event onchange terhadap object <select id=kabko>
				$("#kabko").change(function(){
					var kabko = $("#kabko").val();
					$.ajax({
						url: "ambil_lokasi_tutorial.php",
						data: "kabko="+kabko,
						cache: false,
						success: function(msg){
						//jika data sukses diambil dari server kita tampilkan
						//di <select id=lokasi_tutorial>
							$("#lokasi_tutorial").html(msg);
						}
					});
				});
				$("#lokasi_tutorial").change(function(){
					var lokasi_tutorial = $("#lokasi_tutorial").val();
					$.ajax({
						url: "ambil_kelas.php",
						data: "lokasi_tutorial="+lokasi_tutorial,
						cache: false,
						success: function(msg){
							$("#kelas").html(msg);
						}
					});
				});
				$("#semester").change(function(){
					var semester = $("#semester").val();
					$.ajax({
						url: "ambil_matakuliah.php",
						data: "semester="+semester,
						cache: false,
						success: function(msg){
							$("#mata_kuliah").html(msg);
						}
					});
				});
			});		 
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
		<!--javacript untuk table -->	
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false }
					  null, null, null, null, null, null, null, null, null, null,
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );						
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
			
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
		<script>
		if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
		
		//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
	</body>
</html>
