<table border="1" id="table-summary">
  <thead>
    <tr>
      <th rowspan="2">SKPD</th>
      <th rowspan="2">Program</th>
      <th rowspan="2">Kegiatan</th>
      <th rowspan="2">Belanja Menurut DIPA/DPA Sebelum Perubahan</th>
      <th rowspan="2">Belanja Menutut DIPA/DPA Sesudah Perubahan</th>
      <th rowspan="2">Bobot</th>
      <th rowspan="2">Nilai Kontrak Swakelola</th>
      <th colspan="3">Realisasi Fisik</th>
      <th colspan="4">Realisasi Keuangan</th>
      <th rowspan="2">Persentase Keuangan</th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th>Rencana</th>
      <th>Realisasi</th>
      <th>Tertimbang</th>
      <th>Nilai SKO/SPD</th>
      <th>Nilai SPM/SP2D</th>
      <th>Realisasi SPM/SP2D</th>
      <th>Pengeluaran/SPJ</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $Skpd as $item_Skpd )
    @if ( isset($Kegiatan[$item_Skpd->id]) )
      {{-- */ $head_skpd = '<td rowspan="' . (count( $Kegiatan[$item_Skpd->id], COUNT_RECURSIVE ) - count( $Kegiatan[$item_Skpd->id] )) . '"><b class="nama-skpd">' . $item_Skpd->skpd . '</b></td>'; /* --}}
      @foreach( $Program[$item_Skpd->id] as $item_Program)
          {{-- */ $head_program = '<td rowspan="' . count( $Kegiatan[$item_Skpd->id][$item_Program->id] ) . '">' . $item_Program->program . '</td>'; /* --}}
          @foreach( $Kegiatan[$item_Skpd->id][$item_Program->id] as $item_Kegiatan )
            <tr>
              {{ $head_skpd }}
              {{ $head_program }}
              <td>{{ $item_Kegiatan->kegiatan }}</td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pagu_awal,0,',','.'); }}</td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pagu_perubahan,0,',','.'); }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td>{{ $item_Kegiatan->fisik }}</td>
              <td></td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pengeluaran,0,',','.'); }}</td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pengeluaran,0,',','.'); }}</td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pengeluaran,0,',','.'); }}</td>
              <td>{{ "Rp ".number_format($item_Kegiatan->pengeluaran,0,',','.'); }}</td>
              <td>{{ $item_Kegiatan->uang }}</td>
            </tr>

            {{-- */ $head_skpd = ''; /* --}}
            {{-- */ $head_program = ''; /* --}}

            {{-- */ $head_program = '<td></td>'; /* --}}

          @endforeach
      @endforeach
    @endif
  @endforeach
  </tbody>
</table>