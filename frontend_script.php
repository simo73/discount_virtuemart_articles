<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="css/demo_table.css" />

</head>

<body>

<script type="text/javascript" charset="utf-8">
$(document).ready( function() {
var oTable = $('#example').dataTable( {
"bPaginate": true,
"bLengthChange": false,
"bFilter": false,
"bSort": true,
"bInfo": false,
"bAutoWidth": true,
"sPaginationType": "full_numbers",
"bStateSave": true
});
});
</script>
<div style="margin: 0 auto;width:550px;"><img src="http://captainhook.bg/images/christmas_promo.png" width="550" height="150" alt="Promo" /></div>

<div style="margin-left:auto;margin-right:auto;width:550px;padding-top:15px;padding-bottom:15px;" id="source"></div>

<div style="margin: 0 auto;width:550px;"><img src="http://captainhook.bg/images/christmas_promo.png" width="550" height="150" alt="Promo" /></div>
<script type="text/javascript" charset="utf-8">
var html1='';var html3='';var html2='';
html1 +='<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="text-align: center;width:500px;margin-top:10px;">';
html1 +='<thead>';
html1 +='<tr>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Снимка</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Наименование</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Категория</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Валута</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Стара цена</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Нова цена</th>';
html1 +='<th height="40" align="center" valign="middle" class="center" style="border-top: 1px solid #D9DBDB;height:35px;vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;font-weight: normal;">Купи</th>';
html1 +='</tr>';
html1 +='</thead>';
html1 +='<tbody>';
var request_url = "test.php";
var inside_info="";

$.ajax({
url: request_url,
type: 'POST',
global: false,
async:false,
cache: true,
success: function(data) {

inside_info=data;

},
error:function (XMLHttpRequest, textStatus, errorThrown){
alert(errorThrown);
}
});


if (inside_info) {
var mas = eval(inside_info);
var i = 0;
var l = mas.length;
//var jk=0;
for (var i=0;i<l; i++) {

html2+='<tr class="odd">';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].links)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:left; color:#555555;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].product_name)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].catname)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].curency)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#FF0000;border-right: 1px solid #D9DBDB;width:20px;text-decoration: line-through;">'+(mas[i].original_price)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#01CC00;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].new_price)+'</td>';
html2+='<td class="even" style="vertical-align: middle; text-align:center; color:#555555;border-right: 1px solid #D9DBDB;width:20px;">'+(mas[i].urls)+'</td>';

html2+='</tr>';





}
}

html3 +='</tbody>';
html3 +='</table>';
var html_all = html1+html2+html3;

$("#source").html(html_all);
</script>

</body>
</html>