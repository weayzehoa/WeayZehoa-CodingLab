<?php
    include_once("../inc/setdb.php");
    
    if(!empty($_POST['ckt_tseq'])){
        $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_teacher = '".$_POST['ckt_tseq']."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
        $ro = mysqli_query($link,$sql);
        $class['total'] = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);
        do{
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
            $class['date'][] = $row['c_date'];
            $class['week'][] = $row['c_w_n'];
            $class['clname'][] = $row['c_n_name'];
            $class['teacher'][] = $row['c_t_name'];
            $class['num'][] = $row['c_num'];
        }while($row = mysqli_fetch_assoc($ro));
        echo json_encode($class);
    }

?>