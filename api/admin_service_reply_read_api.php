<?php
    include_once("../inc/setdb.php");
    if (!empty($_GET["to"])) {
        $sql = "SELECT * from service_log where s_l_no = '".$_GET["to"]."' order by s_l_time desc ";
        $ro = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($ro); 
    }
    else{
?>

<script>document.location.herf="index.php"</script><?php exit();}?>

<?php
$line = 1;
$line_back = "";
do{
    if($line % 2 != 0){$line_back = "style='background-color:#FFF;'";}
    else{
        $line_back ="style='background-color:#ccc;'";}
    $line ++;
?>
<table width="100%" colspacing="0">
    <tr <?=$line_back?>>
        <td width="100" align="center"><?php if($row["s_l_to"]=='0'){echo "<span style='color:#00F'>客戶</span>";}else{echo $row["s_l_to"];}?></td>
        <td align="left" <?php if($row["s_l_to"]=='0'){echo "style='color:#00F'";}?>><?=$row["s_l_con"]?></td>
        <td width="200" align="center"><?=$row["s_l_time"]?></td>
    <tr>
</table>
<?php }while($row = mysqli_fetch_assoc($ro));?>