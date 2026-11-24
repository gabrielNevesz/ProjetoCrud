<?php
    echo "<link rel='stylesheet' type='text/css' href='listar.css'/>";
    include 'conexao.php';
	$listar=$cmd->query("select * from tbprojeto");
	$total_registros=$listar->rowCount();
    if ($total_registros > 0)
    {
        echo "<h1>Listar Registros</h1>";
        echo "<hr/>";
        echo "<div class='bgl' href='index.html'>";
        echo "<tr>
                <h2>
                    Dados Cadastrados
                </h2>
              </tr>";
         while($linha=$listar->fetch(PDO::FETCH_ASSOC))
        {
            $vcodi=$linha['codi_p'];
            $vnome=$linha['nome_p'];
            $vemai=$linha['emai_p'];
            $vsenh=$linha['senh_p'];
			$vsexo=$linha['sexo_p'];
            $vdtna=$linha['dtna_p'];
		}
        echo "<br><br><div>
                <ol>
                    <li><h4>Código</h4>$vcodi</li>
                    <li><h4>nome</h4>$vnome</li>
                    <li><h4>Email</h4>$vemai</li>
                    <li><h4>Senha</h4>$vsenh</li>
                    <li><h4>Sexo</h4>$vsexo</li>
   		            <li><h4>Data</h4>$vdtna</li>          
                </ol>
              </div>";
	    echo "</div>";
        echo "<br/><br/>";
        echo "<a class='botao_menu' href='index.html'>Menu</a>";/*ou window.history.back()*/

      
        }
	
    else
    {
        echo "<script language=javascript>
                window.alert('Não existem registros para exibir!!!');
                location.href='index.html'; 
              </script>";
    }
?>