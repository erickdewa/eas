<html>
	<title>Nilai</title>
<head>
	<style scoped>
		@page { margin: 1cm 1.5cm;}
		body{
			background-color: #FFF;
			margin: 0px;
			padding: 0px;
			font-size: 15px;
			font-family: sans-serif;
		}
		.main{
			background-color: white;
		}
		.table-main{
			width: 100%;
			overflow: hidden;
			border-collapse: collapse;
			page-break-inside: avoid;
		}
        .table-data{
			width: 100%;
            border: 1px solid black;
			border-collapse: collapse;
			page-break-inside: avoid;
		}
		.table-data th, .table-data td{
            border: 1px solid black;
			padding: 2px 4px;
		}

		.text-uppercase{
			text-transform: uppercase;
		}
		.first-uppercase::first-letter {
		    text-transform: capitalize:
		}
        .center{ text-align: center }
        .right{ text-align: right }
        .left{ text-align: left }
	</style>
</head>
<body>
	<div class="main">
		<table class="table-main">
            <tr>
                <td class="center" style="font-size: 20px; font-weight: 800; padding-bottom: 20px">LAPORAN HASIL STUDI</td>
            </tr>
            <tr>
                <td>
                    <table class="text-left">
                        <tr>
                            <td width="125px">Tahun Ajaran</td>
                            <td width="10px" class="text-center">:</td>
                            <td>{{ $request->year }}</td>
                        </tr>
                        <tr>
                            <td width="125px">NBI</td>
                            <td width="10px" class="text-center">:</td>
                            <td>{{ $request->nbi }}</td>
                        </tr>
                        <tr>
                            <td width="125px">Nama</td>
                            <td width="10px" class="text-center">:</td>
                            <td>{{ optional($mahasiswa)->name }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="table-data" width="100%" style="margin-top: 20px">
                        <tr>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                            <th>Total</th>
                        </tr>
                        <?php $totalSks = 0 ?>
                        <?php $totalBobot = 0 ?>
                        <?php $total = 0 ?>
                        @foreach ($nilai as $item)
                            <?php $mk = App\Models\MataKuliah::where('code', $item->code_mk)->first() ?>
                            <tr>
                                <td>{{ optional($mk)->code }}</td>
                                <td>{{ optional($mk)->name }}</td>
                                <td class="center">
                                    {{ optional($mk)->sks }}
                                    <?php $totalSks += (optional($mk)->sks ?? 0) ?>
                                </td>
                                <td class="center">
                                    @if($item->nilai >= 85)
                                        <span>A</span>
                                    @elseif($item->nilai >= 80)
                                        <span>A-</span>
                                    @elseif($item->nilai >= 75)
                                        <span>B+</span>
                                    @elseif($item->nilai >= 70)
                                        <span>B</span>
                                    @elseif($item->nilai >= 65)
                                        <span>B-</span>
                                    @elseif($item->nilai >= 60)
                                        <span>C+</span>
                                    @elseif($item->nilai >= 55)
                                        <span>C</span>
                                    @elseif($item->nilai >= 50)
                                        <span>C-</span>
                                    @elseif($item->nilai >= 40)
                                        <span>D</span>
                                    @else
                                        <span>E</span>
                                    @endif
                                </td>
                                <td class="center">
                                    <?php
                                        $bobot = 0;
                                        if($item->nilai >= 85){
                                            $bobot = 4;
                                        }else if($item->nilai >= 80){
                                            $bobot = 3.7;
                                        }else if($item->nilai >= 75){
                                            $bobot = 3.3;
                                        }else if($item->nilai >= 70){
                                            $bobot = 3;
                                        }else if($item->nilai >= 65){
                                            $bobot = 2.7;
                                        }else if($item->nilai >= 60){
                                            $bobot = 2.3;
                                        }else if($item->nilai >= 55){
                                            $bobot = 2;
                                        }else if($item->nilai >= 50){
                                            $bobot = 1.7;
                                        }else if($item->nilai >= 40){
                                            $bobot = 1;
                                        }else if($item->nilai < 40){
                                            $bobot = 0;
                                        }

                                        $totalBobot += $bobot;
                                    ?>

                                    {{ $bobot }}
                                </td>
                                <td class="center">
                                    {{ $bobot * (optional($mk)->sks ?? 1) }}
                                    <?php $total += $bobot * (optional($mk)->sks ?? 1) ?>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="5" class="right">Total</th>
                            <th class="center">{{ $total }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="right">IPS</th>
                            <th class="center">{{ $total / $totalSks }}</th>
                        </tr>
                    </table>
                </td>
            </tr>
		</table>
	</div>
</body>
</html>
