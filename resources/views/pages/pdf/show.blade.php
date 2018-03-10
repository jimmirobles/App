<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soporte folio: {{ $folio }}</title>
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
        border-bottom: 1px solid #ddd;
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
                                <img src="http://www.humanbusiness.com.mx/app/img/logo-512x512.png" style="width:100%; max-width:80px;">
                            </td>
                            <td class="title"><h1>HUMAN BUSINESS</h1></td>
                            <td class="dates">
                                <strong>Reporte de Servicio</strong><br>
                                Fecha: {{ date('d-m-Y', strtotime($fecha)) }}<br>
                                Folio: <big>{{ $folio }}</big>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="label-title">
                <td>1. Información del cliente</td>
            </tr>
            <tr class="information">
                <td>
                    <table cellspacing="0" cellpadding="0">
                    	<tr>
                    		<td class="info-title">Cliente:</td>
                    		<td colspan="3">{{ $razon_social }}</td>
                    	</tr>
                        <tr>
                            <td class="info-title">Contacto:</td>
                            <td>{{ $contacto_nombre }}</td>
                            <td class="info-title">Email:</td>
                            <td>{{ $contacto_email }}</td>
                        </tr>
                        <tr>
                            <td class="info-title">Vía:</td>
                            <td>
								@if($lugar == 0)
									En sitio
								@else
									Remoto
								@endif
							</td>
                            <td class="info-title">Domicilio:</td>
                            <td>{{ $direccion }}</td>
                        </tr>
                        <tr>
                            <td class="info-title">Tipo:</td>
                            <td>
                            	@if($tipo == 0)
									Soporte
								@else
									Iguala
								@endif
		                    </td>
                            <td class="info-title">Servicio:</td>
                            <td>{{ $servicio_nombre }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="label-title">
                <td>2. Información del servicio</td>
            </tr>
            <tr>
            	<td>
            		<table>
                        <tr>
                            <td>Hora inicial:</td>
                            <td>{{ $hInicial }}</td>
                            <td>Hora de finalización:</td>
                            <td>{{ $hFinal }}</td>
                        </tr>
	                	<tr class="heading">
	                		<td colspan="4">Error reportado:</td>
	                	</tr>
	                	<tr class="content">
	                		<td colspan="4">{{ $error }}</td>
	                	</tr>
	                	<tr class="heading">
	                		<td colspan="4">Actividad realizada:</td>
	                	</tr>
	                	<tr class="content">
	                		<td colspan="4">{{ $solucion }}</td>
	                	</tr>
	                	<tr class="heading">
	                		<td colspan="4">Comentarios adicionales:</td>
	                	</tr>
	                	<tr class="content">
	                		<td colspan="4">{{ $comentarios }}</td>
	                	</tr>
	                </table>
            	</td>
            </tr>
            <tr class="label-title">
                <td>3. Firmas de conformidad</td>
            </tr>
            <tr class="footer">
            	<td>
            		<table cellspacing="0" cellpadding="0" class="bordered">
            			<tr class="signature">
            				<td>&nbsp;</td>
            				<td></td>
            				<td>&nbsp;</td>
            			</tr>
            			<tr class="label-signature">
            				<td>Asesor: {{ $asesor_nombre }}</td>
            				<td></td>
            				<td>Firma cliente</td>
            			</tr>
            		</table>
            	</td>
            </tr>
        </table>
    </div>
</body>
</html>