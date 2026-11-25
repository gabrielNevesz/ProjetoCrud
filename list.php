<?php
    echo "<link rel='stylesheet' type='text/css' href='formata.css'/>";
   	include 'conexao.php';
	$nome=$_POST['txtpesq'];
    $pesq=$cmd->query("select * from tbprojeto where nome_p like '$nome%'");
	$total_registros =$pesq->rowCount();
    if ($total_registros > 0)
     {
        echo "<h1>Resultado do Filtro Aplicado</h1>";
        echo "<hr/>";
        echo "<table>";
        echo "<tr>
                <th colspan=6>
                    Dados Cadastrados
                </th>
              </tr>";
        echo "<tr>
                <th>Código</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Sexo</th>
                <th>Nascimento</th>
              </tr>";
				
        while($linha=$pesq->fetch(PDO::FETCH_ASSOC))
        {
            $vcodi=$linha['codi_p'];
            $vnome=$linha['nome_p'];
            $vemai=$linha['emai_p'];
            $vsenh=$linha['senh_p'];
			$vsexo=$linha['sexo_p'];
            $vdtna=$linha['dtna_p'];
            echo "<tr>
                    <td>$vcodi</td>
                    <td>$vnome</td>
                    <td>$vemai</td>
                    <td>$vsenh</td>
                    <td>$vsexo</td>
   		            <td>$vdtna</td>          
                  </tr>";
		}
	    echo "</table>";
        echo "<br/><br/>";
        echo "<a class='botao_menu' href='pesq.html'>Nova Pesquisa</a>";/*ou window.history.back()*/
	}
    else
    {
        echo "<script language=javascript> 
                alert('Não existem registros para exibir!!!'); 
                location.href='pesq.html'; 
            </script>";
    }
?>