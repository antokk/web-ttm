<!DOCTYPE html>
<?php session_start() ;?>
<html lang="en">
	<?php
		include "head.php"
		?>

	<body class="no-skin">
		<?php
			include "navbar.php"
			?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php
				include "menu.php"
				?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Form Data Tutor
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Tambahkan Tutor
								</small>
							</h1>
						</div><!-- /.page-header -->
						<?php 
							require_once "koneksi.php";
												
							// mencari kode barang dengan nilai paling besar
							$qq = mysqli_query($koneksi,"SELECT max(id_tutor) as maxKode FROM tutor");
							$rr = mysqli_fetch_array($qq);
							$id_tutor = $rr['maxKode'];
													 
							// mengambil angka atau bilangan dalam kode anggota terbesar,
							// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
							// misal 'BRG001', akan diambil '001'
							// setelah substring bilangan diambil lantas dicasting menjadi integer
							$noUrut = (int) substr($id_tutor, 5, 5);
													 
							// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
							$noUrut++;
														 
							// membentuk kode anggota baru
							// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
							// misal sprintf("%03s", 12); maka akan dihasilkan '012'
							// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
							$char = "TTR24";
							$id_tutor = $char . sprintf("%03s", $noUrut);													
													
						?>
						<?php
						require_once("koneksi.php");
						
						if(isset($_GET['id'])){
							$qq = mysqli_query($koneksi,"SELECT * FROM tutor WHERE id_tutor='$_GET[id]'") or die (mysqli_error($koneksi));
							$rr = mysqli_fetch_object($qq);
							
							$a = $rr->id_tutor;
							$b = $rr->nip;
							$c = $rr->nama_lengkap;
							$d = $rr->namasingkat;
							$e = $rr->jenis_kelamin;
							$f = $rr->tgl_lahir;
							$g = $rr->alamat;
							$h = $rr->telepon;
							$i = $rr->email;
						}else{
							$a = $id_tutor;
							$b = '';
							$c = '';
							$d = '';
							$e = '';
							$f = '';
							$g = '';
							$h = '';
							$i = '';
						}
						
						if(isset($_POST['simpan'])){
							if(isset($_GET['id'])){
								$query = mysqli_query($koneksi,"UPDATE tutor SET nip='$_POST[nip]',nama_lengkap='$_POST[nama_lengkap]',
								namasingkat='$_POST[namasingkat]',jenis_kelamin='$_POST[jenis_kelamin]',tgl_lahir='$_POST[tgl_lahir]',
								alamat='$_POST[alamat]',telepon='$_POST[telepon]',email='$_POST[email]' WHERE id_tutor='$_GET[id]'") or die (mysqli_error($koneksi));
								if($query){
									echo "<script>";
									echo "alert('Berhasil Dirubah!');";
									echo "location='tutor.php';";
									echo "</script>";
								}else{
									echo "<script>";
									echo "alert('Data Tutor GAGAL Dirubah!');";
									echo "</script>";
								}
							}else{							
								$query = mysqli_query($koneksi,"INSERT INTO tutor (id_tutor,nip,nama_lengkap,namasingkat,jenis_kelamin,tgl_lahir,alamat,telepon,email)
								VALUES ('$_POST[id_tutor]','$_POST[nip]','$_POST[nama_lengkap]','$_POST[namasingkat]','$_POST[jenis_kelamin]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[telepon]','$_POST[email]')");
								if($query){
									echo "<script>";
									echo "alert('Data Berhasil Disimpan');";
									echo "location='tutor.php';";
									echo "</script>";
								}else{
									echo "<script>";
									echo "alert('Data GAGAL Disimpan');";
									echo "</script>";
								}
							}
						}						
						?>
						<div class="row">
							<div class="col-xs-13">
								
								<form class="form-horizontal" action="" method="post" name="form" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID Tutor</label>

										<div class="col-sm-9">
											<input type="text" name="id_tutor" value="<?=$a;?>" readonly="readonly" id="form-field-1" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> NIP</label>

										<div class="col-sm-9">
											<input type="text" name="nip" value="<?=$b;?>" id="form-field-1" placeholder="NIP" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Nama Lengkap</label>

										<div class="col-sm-9">
											<input type="text" name="nama_lengkap" value="<?=$c;?>" id="form-field-1" placeholder="Nama Lengkap" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Nama Singkat</label>

										<div class="col-sm-9">
											<input type="text" name="namasingkat" value="<?=$d;?>" id="form-field-1" placeholder="Nama Singkat" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Jenis Kelamin</label>

										<div class="col-sm-4">
											<select class="chosen-select form-control" name="jenis_kelamin" value="<?=$e;?>" id="form-field-select-3" placeholder="Jenis Kelamin" required >
																<option value="">  </option>
																<option> L </option>
																<option> P</option>																													
															</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Tanggal Lahir</label>

										<div class="col-sm-9">
											<input type="date" name="tgl_lahir" value="<?=$f;?>" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Alamat</label>

										<div class="col-sm-9">
											<input type="text" name="alamat" value="<?=$g;?>" id="form-field-1" placeholder="Alamat" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Telepon</label>

										<div class="col-sm-9">
											<input type="text" name="telepon" value="<?=$h;?>" id="form-field-1" placeholder="08xxxxxxxxxxxx" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-left" for="form-field-1"> Email</label>

										<div class="col-sm-9">
											<input type="text" name="email" value="<?=$i;?>" id="form-field-1" placeholder="email anda" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" name="simpan" type="submit">
												<i class="ace-icon fa fa-check bigger-100"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-100"></i>
												Reset
											</button>
											&nbsp; &nbsp; &nbsp;
											<a href="tutor.php" class="btn btn-green">
												<i class="ace-icon fa fa-arrow-left"></i>
												Go Back
											</a>
										</div>
									</div>
									
									
								</form>

							</div><!-- /.col -->
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
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
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
	</body>
</html>
