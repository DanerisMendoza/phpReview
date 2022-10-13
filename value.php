<table>
    <tr>
        <td value='0'></td>
        <td value='0'></td>
        <td value='0'></td>
    </tr>
</table>
<?php
 $dom = new domDocument;
 $dom->loadHTML("value.php");
 $tables = $dom->getElementsByTagName('table');


 foreach ($tables as $row) {
 echo $row->childNodes[0]->nodeValue;
 }
?>