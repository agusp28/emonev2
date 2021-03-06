@extends('layout.dashboardLayout')

@section('content')
<style>
	#wrapper {
		width: 1000px;
	}
	#table-format {
		font-size: 14px;
	}
	#table-format td b.nama-skpd{
		font-size: 16px;
	}
</style>
<h2 class="menu__header">Format A4</h2>
<!-- FORM SORTIR SUMMARY -->
<form action="" style="margin-bottom: 30px;" class="form-inline" method="GET" role="form" data-toggle="validator">

			
	<legend>Sortir Summary</legend>
	<!-- Jika Masuk BUKAN sebagai admin skpd maka ada pilihan memilih SKPD -->
	
	@if(Auth::user()->level != 'adminskpd')
	
	<div class="form-group">
		<label for="">Perangkat Daerah</label>
			<select name="skpd_id" class="form-control" required>
				<option value="">------ Pilih Perangkat Daerah ----------</option>
				<!-- Menampilkan Semua SKPD -->
				@foreach($Skpd as $skpd)
					<option @if(isset($skpd_id) && $skpd_id == "$skpd->id") selected  @endif value="{{$skpd->id}}">{{$skpd->skpd}}</option>
				@endforeach
			</select>
	</div>


	@else
	
		<div class="form-group">
			<label for="">Perangkat Daerah</label>
		<input type="text" value="{{$Skpd->skpd}}" disabled class="form-control" style="width:500px;">
			<input type="hidden" name="skpd_id" value="{{$Skpd->id}}">
		</div>
	
	@endif
	<!-- pilihan memilih Tahun -->
	
	<div class="form-group">
		<label for="">Tahun</label>
		<select name="tahun_id" class="form-control" required>
			<option value="">------ Pilih Tahun ----------</option>
			<!-- Menampilkan Semua Tahun -->
			@foreach($Tahun as $tahun)
				<option @if(isset($tahun_id) && $tahun_id == "$tahun->id") selected  @endif value="{{$tahun->id}}">{{$tahun->tahun}}</option>
			@endforeach
		</select>
	


<button type="submit" name="pilihan" value="sortir" class="btn btn-primary">Submit</button>
<button type="submit" name="pilihan" value="print" class="btn btn-warning" ><i class="fa fa-print"></i> Print</button>
</div>
</form>
<!-- END FORM SORTIR SUMMARY -->

<table class="table table-striped" border="1" id="table-summary">
	<thead>
		<tr class="summary classheader">
			<th rowspan="2">No</th>
			<th rowspan="2">Nama Pekerjaan / Paket Pekerjaan</th>
			<th rowspan="2">Pagu (Rp)</th>
			<th rowspan="2">HPS (Rp)</th>
			<th rowspan="2">No Kontrak</th>
			<th rowspan="2"><span>Penyedia Barang/Jasa</span></th>
			<th colspan="2">Pelaksanaan Pekerjaan</th>
			<th colspan="2">Efisiensi</th>
		</tr>
		<tr>
			<th>Mulai</th>
			<th>Akhir</th>
			<th>Nilai</th>
			<th>%</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td><strong>Konstruksi</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@foreach($konstruksi as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->paket}}</td>
			<td align="right">{{ "Rp ".number_format($value->nilai_pagu_paket,2,',','.'); }}</td>
			<td align="right">{{$value->hps}},00</td>
			<td align="center">{{$value->nomor_kontrak}}</td>
			<td align="center">{{Convert::ubah_tanda_strip($value->metode)}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		<tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><strong></strong></td>
			<td><strong>Barang</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@foreach($barang as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->paket}}</td>
			<td align="right">{{ "Rp ".number_format($value->nilai_pagu_paket,2,',','.'); }}</td>
			<td align="right">{{$value->hps}},00</td>
			<td align="center">{{$value->nomor_kontrak}}</td>
			<td align="center">{{Convert::ubah_tanda_strip($value->metode)}}</td>
			<td>{{$value->tanggal_mulai}}</td>
			<td>{{$value->tanggal_selesai}}</td>
			<td></td>
			<td></td>
		<tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><strong>Konsultasi</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@foreach($konsultan as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->paket}}</td>
			<td align="right">{{ "Rp ".number_format($value->nilai_pagu_paket,2,',','.'); }}</td>
			<td align="right">{{$value->hps}},00</td>
			<td align="center">{{$value->nomor_kontrak}}</td>
			<td align="center">{{Convert::ubah_tanda_strip($value->metode)}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		<tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><strong>Jasa Lainnya</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@foreach($lainnya as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->paket}}</td>
			<td align="right">{{ "Rp ".number_format($value->nilai_pagu_paket,2,',','.'); }}</td>
			<td align="right">{{$value->hps}},00</td>
			<td align="center">{{$value->nomor_kontrak}}</td>
			<td align="center">{{Convert::ubah_tanda_strip($value->metode)}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		<tr>
		@endforeach
	</tbody>
</table>
@endsection