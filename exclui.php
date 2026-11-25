<!doctype HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Deletar Registros</title>
		<link rel="stylesheet" type="text/css" href="formata.css"/>
	</head>
    <body>
        <h1>Excluir Registros</h1>
        <hr/>
        <form method="post" action="exclui.php">             
            <label for="txtcodi">Código do registro a ser apagado:</label>                 
            <input type="text" name="txtcodi" id="txtcodi" class="codigo"/>
            <input type="submit" name="bt" value="Confirma"/> 
            <input type="button" value="Menu" onClick="location.href='index.html'"/>
        </form>
        
        <?php 
        include 'conexao.php';
        $lista=$cmd->query("select * from tbprojeto");
		$total_registros =$lista->rowCount();
        if ($total_registros == 0)
        {
            echo "<script language=javascript> 
                    alert('Não existem registros para excluir!!!'); 
                    location.href='index.html';
                </script>";
        }
        else
        {
            //monta a lista geral para escolha do código
            echo "<table>";
            echo "<tr>
                    <th colspan=6>Dados Cadastrados</th>
                 </tr>";
            echo "<tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Sexo</th>
                    <th>Nascimento</th>
                 </tr>";
				
            while($linha=$lista->fetch(PDO::FETCH_ASSOC))
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
            //recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
            if (isset($_POST['bt'])) //se o botão confirma foi clicado 
         		{
                $vcodi=$_POST['txtcodi'];
    			if ($vcodi!='') //se não está vazio o código escolhido 
    			    {                    
                        //verifica se o código escolhido EXISTE na tabela                 
                        $pesq=$cmd->query("select * from tbprojeto where codi_p='$vcodi'");
                        $total_registros =$pesq->rowCount();
                        if ($total_registros > 0)
			                {
                                $excl=$cmd->query("delete from tbprojeto where codi_p='$vcodi'");
 			                    echo "<script language=javascript> 
                                        alert('Registro excluído com sucesso!!! '); 
                                     </script>";
                                echo "<meta http-equiv='refresh' content='0'/>";
                                //location.reload() é a mesma coisa que F5
                                // ou no HTML --> <meta http-equiv='refresh' content='0'/>
                            }
                        else
                            {
                                echo "<script language=javascript> 
                                        alert('Esse código não existe!');
                                        document.getElementById('txtcodi').value='';
                                        document.getElementById('txtcodi').focus();
                                    </script>";
                            }                      
	                }
                else
                    {
                        echo "<script language=javascript> 
                               alert('Não pode ser vazio. Escolha um código para excluir!!!'); 
                               document.getElementById('txtcodi').focus();
                             </script>";
                    }		
            }
        }
    ?>
    </body>
</html>