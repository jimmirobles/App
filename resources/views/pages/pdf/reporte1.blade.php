<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Human business</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<style type="text/css">
	div.invoice-box {
		font-size: 14px;
		line-height: 24px;
		font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	}
	table {
		border-collapse: collapse;
		width: 100%;
	}
	table.top-titles tr td {
		/*border: 1px solid #ddd;*/
		vertical-align: top;
	}
	table.top-titles tr td.logo {
		max-width: 150px;
		text-align: center;
		width: 200px;
	}
	table.top-titles tr td.title {
		text-align: center;
	}
	table.top-titles tr td.dates {
		max-width: 150px;
		text-align: center;
		width: 200px;
	}
	table.top-titles tr td.label-title {
		font-weight: bold;
		height: 40px;
		text-align: center;
		text-transform: uppercase;
	}
	table.data thead tr th {
		background: #eee;
		border: 1px solid #ddd;
		font-size: 12px;
		text-align: center;
		padding: 0px 5px;
	}
	table.data tbody tr td {
		border: 1px solid #ddd;
		font-size: 10px;
		padding: 0px 3px;
		vertical-align: top;
	}
	table.data tbody tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	table.data tbody tr td.total {
		font-size: 14px;
		font-weight: bold;
		text-align: right;
	}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table class="top-titles">
			<tr>
				<td class="logo">
					<img src="http://www.humanbusiness.com.mx/app/img/logo-512x512.png" style="width:100%; max-width:70px;">
				</td>
				<td class="title"><h1>HUMAN BUSINESS</h1></td>
				<td class="dates">
					FECHA <br>{{ date('d/m/Y', strtotime(NOW())) }}
				</td>
			</tr>
			<tr>
				<td colspan="3" class="label-title">
					Documentos de <u>{{ $cliente->razon_social }}</u> <br>del {{ date('d/m/Y', strtotime($fecha1)) }} al {{ date('d/m/Y', strtotime($fecha2)) }}
				</td>
			</tr>
		</table>
		<table class="data">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Reporta</th>
					<th>Error</th>
					<th>Solucion</th>
					<th>Horas</th>
					<th>Asesor</th>
				</tr>
			</thead>
			<tbody>
				@foreach($documentos as $docto)
					<tr>
						<td>{{ $docto->folio }}</td>
						<td>{{ $docto->fecha }}</td>
						<td>{{ $docto->contacto_nombre }}</td>
						<td>{{ $docto->error }}</td>
						<td>{{ $docto->solucion }}</td>
						<td>{{ $docto->hInicial . " a " . $docto->hFinal }}</td>
						<td>{{ $docto->asesor_nombre }}</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="7" class="total">Tiempo total consumido: {{ $total_horas }}.</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>