<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>E-Ticket(<?php echo $cetak[0]['kd_order'];?>)</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>
<style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    
    img{float:left;padding-right:10px;}
    </style>
</head>
<body onload="window.print()">
  <table width="100%">
    <tr>
        <td valign="top"><img src="<?php echo base_url($cetak[0]['qrcode_order']) ?>" alt="" width="200"/></td>
        <td align="right">
            <h1>E-TICKET</h1>
            <pre>
                <b><span style='font-size:15px'>Ticket Details </span></b>
                </br>
                Booking Code : <?php echo $cetak[0]['kd_order'];?></br>
                Schedule Code : <?php echo $cetak[0]['sefer_kodu'];?></br>
                Date : <?php echo $cetak[0]['alim_tarih'];?></br>
                Customer : <?php echo $cetak[0]['sahip'];?></br>
                Schedule : <?php echo hari_indo(date('N',strtotime($cetak[0]['hareket_tarihi']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$cetak[0]['hareket_tarihi'].'')));?><br>
                Departure DateTime : <?php echo date('H:i',strtotime($cetak[0]['kalkis_saat'])).' To '.date('H:i',strtotime($cetak[0]['varis_saat'])) ?>
                Departing from : <?php echo strtoupper($asal['yolculuk_sehir']);?></br>
                Destination to : <?php echo strtoupper($cetak[0]['yolculuk_sehir']); ?>
            </pre>
        </td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Ticket No.</th>
        <th>Passenger</th>
        <th>Age </th>
        <th>Seat</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cetak as $row) { ?>
        <tr>
           <td scope="row"><?php echo $row['kd_bilet']; ?></td>
           <td align="left"><?php echo $row['onay_isim']; ?></td>
           <td align="center"><?php echo $row['yolcu_yas']; ?> Years</td>
            <td align="center"><?php echo $row['koltuk_no']; ?> </td>
           <td align="left"><?php echo '$'.number_format(($row['ucret'])); ?></td>
        <tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total</td>
            <td align="right" class="gray"><?php $total = count($cetak) * $cetak[0]['ucret']; echo '$'.number_format(($total));?></td>
        </tr>
    </tfoot>
  </table>
  <div id="container">
</div>

</body>
</html>