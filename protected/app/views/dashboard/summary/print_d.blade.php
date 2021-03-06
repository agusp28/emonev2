<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
td{
  padding-right: 5px;
  padding-left: 5px;
}
</style>
<h2>Format D</h2>
<!-- END FORM SORTIR SUMMARY -->
<table>
  <thead>
      <tr>
        <th>Nama Paket Pekerjaan </th>
        <th>B/K/S/J</th>
        <th style="width: 130px">Nilai Kontrak</th>
        <th>Lokasi Kegiatan</th>
        <th>Nama KPA/PA/PPK</th>
        <th>Rekanan</th>
        <th>Nomor BAST </th>
        <th>Tanggal BAST </th>
        <th>Mulai</th>
        <th>Akhir </th>
        
      </tr>
  </thead>
  <tbody>
    @foreach($summary as $key => $value)
    <tr>
      <td>{{ $value->paket }}</td>
      <td>{{ Summary::ubah_jenis_pengadaan($value->jenis_pengadaan) }}</td>
      <td align="right">{{ "Rp ".number_format($value->nilai_kontrak,2,',','.') }}</td>
      <td>{{ Convert::ubah_kab($value->lokasi) }}</td>
      <td>{{ $value->pegawai }}</td>
      <td>{{ $value->rekanan }}</td>
      <td>{{ $value->nomor_bast }}</td>
      <td>{{ Convert::tgl_eng_to_ind($value->tgl_bast) }}</td>
      <td>{{ Convert::tgl_eng_to_ind($value->tanggal_mulai) }}</td>
      <td>{{ Convert::tgl_eng_to_ind($value->tanggal_selesai) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
    window.print();
  </script>