<?php
    include 'conexao.php';
    $vnome = $_POST['txtnome'];
    $vemail = $_POST['txtemail'];
    $vsenha = $_POST['txtsenha'];
    $vsexo = $_POST['txtsexo'];
    $vdtna = $_POST['txtdata'];
    $cadastrar = $cmd -> query("insert into tbprojeto(nome_p, emai_p, senh_p, sexo_p, dtna_p) values('$vnome','$vemail','$vsenha','$vsexo','$vdtna')");
    echo "<script language='JavaScript'>
        alert('Dados cadastrados com sucesso!!!');
        location.href='crud_cad.html';
    </script>";
    ?>