<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Human business</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<style type="text/css">
	table {
		border-collapse: collapse;
	}
	table.bordered tr td {
		border: 1px solid #ddd;
	}
	.label-title td{
		font-weight: bold;
		text-align: center;
	}

	.invoice-box {
		font-size: 14px;
		line-height: 24px;
		font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	}
	.invoice-box table {
		width: 100%;
	}
	
	.invoice-box table td {
		padding: 5px;
		vertical-align: top;
	}

	.invoice-box table tr.top table td {
		padding-bottom: 10px;
	}

	.invoice-box table tr.top table td.logo {
		max-width: 150px;
		text-align: center;
		width: 200px;
	}

	.invoice-box table tr.top table td.title {
		text-align: center;
	}

	.invoice-box table tr.top table td.dates {
		max-width: 150px;
		text-align: center;
		width: 200px;
	}

	.invoice-box table tr.information table td {
		border: 1px solid #ddd;
		padding: 2px 2px 2px 5px;
	}

	.invoice-box table tr.information table td.info-title {
		background: #eee;
		font-weight: bold;
		max-width: 100px;
		width: 80px;
	}

	.invoice-box table tr td table tr.heading td {
		background: #eee;
		border: 1px solid #ddd;
		font-weight: bold;
	}

	.invoice-box table tr td table tr.content td {
		border: 1px solid #ddd;
		height: 80px;
	}

	.invoice-box table tr.footer td table tr.signature td {
		
		height: 80px;
	}

	.invoice-box table tr.footer td table tr.label-signature td {
		background: #eee;
		text-align: center;
		width: 250px;
	}
	table#data thead tr th {
		background: #eee;
		border: 1px solid #ddd;
		font-size: 12px;
		text-align: center;
		padding: 0px 5px;
	}
	table#data tbody tr td {
		border: 1px solid #ddd;
		font-size: 10px;
		padding: 0px 3px;
	}
	table#data tbody tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table>
			<tr class="top">
				<td>
					<table>
						<tr>
							<td class="logo">
								<img src="http://www.humanbusiness.com.mx/app/img/logo-512x512.png" style="width:100%; max-width:70px;">
							</td>
							<td class="title"><h1>HUMAN BUSINESS</h1></td>
							<td class="dates">
								Fecha <br>{{ date('d-m-Y', strtotime(NOW())) }}
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="label-title">
				<td>Reporte documentos por cliente por fecha</td>
			</tr>
			<tr>
				<td>
					<table id="data">
						<colgroup>
							<col>
						</colgroup>
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
						</tbody>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>