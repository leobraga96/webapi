# Welcome to <img src="http://i65.tinypic.com/o8gwet.png" width="200">

Browse and contribute to the cataloging of our Exploit database, Shellcode, and Exploit database file security documents in our Api Web.

 Exploit Finder is a web site that maps public files from the corresponding vulnerable software exploits, developed for use by penetration testers and vulnerability researchers. The goal is to make it easier for our users to find and navigate better in a more comprehensive collection of exploits. In order to conduct explorations through direct submissions, mailing lists and other public sources, and present them in a search engine freely available and easy to navigate.

<img src="http://i68.tinypic.com/ncz0qr.png" width="150"> [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/UniCEUB-Web-Development-2017-2/leonardo-santos/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/UniCEUB-Web-Development-2017-2/leonardo-santos/?branch=master)[![SensioLabsInsight](https://insight.sensiolabs.com/projects/eac459d1-a54c-419f-90fd-0ca2c7d1d159/small.png)](https://insight.sensiolabs.com/projects/eac459d1-a54c-419f-90fd-0ca2c7d1d159)

##### Trabalho de Leonardo Cezar Braga Santos - RA21654253
<table id="sheet0" class="sheet0 gridlines" border="0" cellpadding="0" cellspacing="0"><colgroup><col class="col0"> <col class="col1"> <col class="col2"> <col class="col3"> <col class="col4"></colgroup>

<tbody>

<tr class="row0">

<td class="column0 style0 s">METHOD</td>

<td class="column1 style0 s">URI</td>

<td class="column2 style0 s">QUERY STRING</td>

<td class="column3 style0 s">BODY REQUEST</td>

<td class="column4 style0 s">BODY RESPONSE</td>

</tr>

<tr class="row1">

<td class="column0 style0 s">POST</td>

<td class="column1 style0 s">/user/</td>

<td class="column2 style0 s">Vazio</td>

<td class="column3 style0 s">{ "name":"braga", "registernumber":"1", "username":"leobraga96", "password":"123456", "email":"uniceub@gmail.com", "id_tipo":"1" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row2">

<td class="column0 style0 s">GET</td>

<td class="column1 style0 s">/user/</td>

<td class="column2 style0 s">?registernumber=1 or ?username= leobraga96</td>

<td class="column3 style0 s">Vazio</td>

<td class="column4 style0 s">{ "name":"braga", "registernumber":"1", "username":"leobraga96", "password":"123456", "email":"uniceub@gmail.com", "id_tipo":"1" }</td>

</tr>

<tr class="row3">

<td class="column0 style0 s">PUT (update)</td>

<td class="column1 style0 s">/user/</td>

<td class="column2 style0 s">?registernumber=1 or ?name= braga or ?username= leobraga96</td>

<td class="column3 style0 s">{ "name":"braga_new", "registernumber":"1", "username":"leobraga98", "password":"12345678", "email":"uniceub@gmail.com", "id_tipo":"1" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row4">

<td class="column0 style0 s">PUT (delete)</td>

<td class="column1 style0 s">/user/disable/</td>

<td class="column2 style0 s">Vazio</td>

<td class="column3 style0 s">{ "registernumber":"1" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row5">

<td class="column0 style0 s">POST (login)</td>

<td class="column1 style0 s">/user/login/</td>

<td class="column2"> </td>

<td class="column3 style0 s">{ "username":"leobraga96", "password":"123456" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row6">

<td class="column0 style0 s">METHOD</td>

<td class="column1 style0 s">URI</td>

<td class="column2 style0 s">QUERY STRING</td>

<td class="column3 style0 s">BODY REQUEST</td>

<td class="column4 style0 s">BODY RESPONSE</td>

</tr>

<tr class="row7">

<td class="column0 style0 s">POST</td>

<td class="column1 style0 s">/exploit/</td>

<td class="column2 style0 s">Vazio</td>

<td class="column3 style0 s">{     "idexploit":"37060",     "porta":"0",     "desc":"Microsoft Internet Explorer 11 - Crash (PoC) (1)",     "type":"dos",     "file":"platforms/windows/dos/37060.html",     "plataforma":"windows" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row8">

<td class="column0 style0 s">GET</td>

<td class="column1 style0 s">/exploit/</td>

<td class="column2 style0 s">?idexploit=37060 or ?desc=Microsoft or ?porta=0 or ?plataforma= windows or ?type= dos or ?file= platforms/windows/dos/37060.html</td>

<td class="column3 style0 s">Vazio</td>

<td class="column4 style0 s">{     "idexploit":"37060",     "porta":"0",     "desc":"Microsoft Internet Explorer 11 - Crash (PoC) (1)",     "type":"dos",     "file":"platforms/windows/dos/37060.html",     "plataforma":"windows" }</td>

</tr>

<tr class="row9">

<td class="column0 style0 s">PUT (update)</td>

<td class="column1 style0 s">/exploit/</td>

<td class="column2 style0 s">?idexploit=37060</td>

<td class="column3 style0 s">{     "idexploit":"37060",     "porta":"0",     "desc":"Microsoft Internet Explorer 12 - Crash (PoC) (1)",     "type":"dos",     "file":"platforms/windows/dos/37060.html",     "plataforma":"windows" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr class="row10">

<td class="column0 style0 s">PUT (delete)</td>

<td class="column1 style0 s">/exploit/disable/</td>

<td class="column2 style0 s">Vazio</td>

<td class="column3 style0 s">{     "idexploit":"37060" }</td>

<td class="column4 style0 s">{ “code” : 200, “message” : “OK” }</td>

</tr>

<tr>

<td></td>

</tr>

</tbody>

</table>

# Client in production

<img src="https://github.com/leobraga96/webapi/blob/master/1.png?raw=true" width="800">
<img src="https://github.com/leobraga96/webapi/blob/master/2.png?raw=true" width="800">
<img src="https://github.com/leobraga96/webapi/blob/master/3.png?raw=true" width="800">
<img src="https://github.com/leobraga96/webapi/blob/master/5.png?raw=true" width="800">
