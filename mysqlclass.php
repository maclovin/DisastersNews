<?
class conexao {
    
	var $host = "...";
    var $user = "...";
    var $senha = "...";
    var $dbase = "...";

    var $query;
    var $link;
    var $resultado;
    
    function MySQL(){ //Construtor
    }
	
    function conecta(){
        $this->link = mysql_connect($this->host,$this->user,$this->senha);
		
        if(!$this->link)
        {
            echo "Ocorreu um Erro na conexao MySQL:";
            echo "<b>".mysql_error()."</b>";
            die();
        }

        elseif(!mysql_select_db($this->dbase,$this->link))
        {
            echo "Ocorreu um Erro em selecionar o Banco:";
            echo "<b>".mysql_error()."</b>";
            die();
        }
    }

    function sql_query($query)
    {
        $this->conecta();
        $this->query = $query;

        if($this->resultado = mysql_query($this->query))
        {
            $this->desconecta();
            return $this->resultado;
        }
        else
        {
            echo "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
            echo "<br><br>";
            echo "Erro no MySQL: <b>".mysql_error()."</b>";
            die();
            $this->desconecta();
        }        
    }


    function desconecta(){
        return mysql_close($this->link);
    }
}
?>