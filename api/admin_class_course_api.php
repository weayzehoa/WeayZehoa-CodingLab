<?php
    include_once("../inc/setdb.php");
    if(!empty($_POST['myid']) && !empty($_POST['mypermit'])){
        
        if($_POST['myid'] != "guest" && $_POST['mypermit'] == $_SESSION['permit']){
            if(!empty($_POST['newteacher'])){
                $sql = "INSERT into class_teacher value(null,'".$_POST['newteacher']."')";
                mysqli_query($link,$sql);
                $sql = "SELECT * from class_teacher where c_t_name = '".$_POST['newteacher']."'";
                $ro = mysqli_query($link,$sql);
                $row = mysqli_fetch_assoc($ro);
               echo json_encode($row);
            }

            if(!empty($_POST['newclname'])){
                $sql = "INSERT into class_name value(null,'".$_POST['newclname']."')";
                mysqli_query($link,$sql);
                $sql = "SELECT * from class_name where c_n_name = '".$_POST['newclname']."'";
                $ro = mysqli_query($link,$sql);
                $row = mysqli_fetch_assoc($ro);
                echo json_encode($row);
            }

            if(!empty($_POST['cldate'])){
                $sql = "INSERT into class value(null,'".$_POST['cldate']."','".$_POST['clweek']."','".$_POST['clname']."','".$_POST['clteacher']."','".$_POST['clnum']."');";
                mysqli_query($link,$sql);
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date= '".$_POST['cldate']."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq";
                $ro = mysqli_query($link,$sql);
                $row = mysqli_fetch_assoc($ro);
                echo json_encode($row);
            }

            if(!empty($_POST['tseq'])){
                $sql = "UPDATE class_teacher set c_t_name = '".$_POST['modtname']."' where c_t_seq = '".$_POST['tseq']."'";
                mysqli_query($link,$sql);
                echo "老師名字修改成功";
            }

            if(!empty($_POST['cseq'])){
                $sql = "UPDATE class_name set c_n_name = '".$_POST['modclname']."' where c_n_seq = '".$_POST['cseq']."'";
                mysqli_query($link,$sql);
                echo "課程名稱修改成功";
            }

            if(!empty($_POST['delcseq'])){
                $sql = "DELETE from class_name where c_n_seq = '".$_POST['delcseq']."'";
                mysqli_query($link,$sql);
                $sql = "DELETE from class where c_name = '".$_POST['delcseq']."'";
                mysqli_query($link,$sql);
                echo "課程名稱已被刪除, 已紀錄的課程也一併刪除了";
            }

            if(!empty($_POST['deltseq'])){
                $sql = "DELETE from class_teacher where c_t_seq = '".$_POST['deltseq']."'";
                mysqli_query($link,$sql);
                $sql = "DELETE from class where c_teacher = '".$_POST['deltseq']."'";
                mysqli_query($link,$sql);
                echo "老師名字已被刪除, 已紀錄的課程也一併刪除了";
            }

            if(!empty($_POST['delclseq'])){
                $sql = "DELETE from class where c_seq = '".$_POST['delclseq']."'";
                mysqli_query($link,$sql);
                echo "課程已被刪除";
            }

            if(!empty($_POST['mod_cseq'])){
                $sql = "UPDATE class set c_date = '".$_POST['mod_cld']."' , c_week = '".$_POST['mod_clw']."' , c_name = '".$_POST['mod_cln']."' , c_teacher = '".$_POST['mod_cltn']."' , c_num = '".$_POST['mod_clnum']."'  where c_seq = '".$_POST['mod_cseq']."'";
                mysqli_query($link,$sql);
                echo "課程修改成功";
            }

            if(!empty($_POST['ckt_tseq'])){
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_teacher = '".$_POST['ckt_tseq']."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
                $ro = mysqli_query($link,$sql);
                $class['total'] = mysqli_num_rows($ro);
                $row = mysqli_fetch_assoc($ro);
                do{
                    $class['seq'][] = $row['c_seq'];
                    $class['date'][] = $row['c_date'];
                    $class['week'][] = $row['c_w_n'];
                    $class['clname'][] = $row['c_n_name'];
                    $class['teacher'][] = $row['c_t_name'];
                    $class['num'][] = $row['c_num'];
                }while($row = mysqli_fetch_assoc($ro));
                echo json_encode($class);
            }
                
            if(!empty($_POST['ckcl_seq'])){
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_name = '".$_POST['ckcl_seq']."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
                $ro = mysqli_query($link,$sql);
                $class['total'] = mysqli_num_rows($ro);
                $row = mysqli_fetch_assoc($ro);
                do{
                    $class['seq'][] = $row['c_seq'];
                    $class['date'][] = $row['c_date'];
                    $class['week'][] = $row['c_w_n'];
                    $class['clname'][] = $row['c_n_name'];
                    $class['teacher'][] = $row['c_t_name'];
                    $class['num'][] = $row['c_num'];
                }while($row = mysqli_fetch_assoc($ro));
                echo json_encode($class);
            }
        
            if(!empty($_POST['ckd_date'])){
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date = '".$_POST['ckd_date']."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
                $ro = mysqli_query($link,$sql);
                $class['total'] = mysqli_num_rows($ro);
                $row = mysqli_fetch_assoc($ro);
                do{
                    $class['seq'][] = $row['c_seq'];
                    $class['date'][] = $row['c_date'];
                    $class['week'][] = $row['c_w_n'];
                    $class['clname'][] = $row['c_n_name'];
                    $class['teacher'][] = $row['c_t_name'];
                    $class['num'][] = $row['c_num'];
                }while($row = mysqli_fetch_assoc($ro));
                echo json_encode($class);
            }
            
            if(!empty($_POST['ckm_date'])){
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date like '".$_POST['ckm_date']."%' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
                $ro = mysqli_query($link,$sql);
                $class['total'] = mysqli_num_rows($ro);
                $row = mysqli_fetch_assoc($ro);
                do{
                    $class['seq'][] = $row['c_seq'];
                    $class['date'][] = $row['c_date'];
                    $class['week'][] = $row['c_w_n'];
                    $class['clname'][] = $row['c_n_name'];
                    $class['teacher'][] = $row['c_t_name'];
                    $class['num'][] = $row['c_num'];
                }while($row = mysqli_fetch_assoc($ro));
                echo json_encode($class);
            }
        }
    }

?>