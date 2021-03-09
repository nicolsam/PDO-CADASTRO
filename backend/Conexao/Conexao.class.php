<?php
class Conexao{
   /* Definição dos atributos para conectar ao SGBD */
   private $usr;
   private $pwd;
   private $server;
   private $db;
   private $driver;
   private $pdo;
   
   /* Sem encapsulamento pois todos os dados devem ser manipulados somente nesta classe */

   /* Construtor
    * Abre a conexão com o SGBD 
    * Receber um arquivo XML ou INI e preencher atributos da classe 
    * Usar PDO com os atributos da classe para efetuar conexão */
      function __construct($arq){
         try{
            /* file_exists(arq)
             * Verifica se arq existe
             * retorna boolean
             * */
            if(file_exists($arq)){
               /* parse_ini_file(arq)
                * Recebe as informações de arquivo ini
                * Retorna Array associativo 
                */
               $config = parse_ini_file($arq);
               /* Populando objeto da classe */
               $this->usr = $config['usuario'];
               $this->pwd = $config['password'];
               $this->server = $config['host'];
               $this->db = $config['database'];
               $this->driver = $config['driver'];
               switch($this->driver){
                  case "mysql":
                     $this->pdo = new PDO("{$this->driver}:host={$this->server};dbname={$this->db}",$this->usr,$this->pwd);
                     $this->getPDO()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     echo "<script>console.log('Conexão efetuada com sucesso');</script>";
                     break;
                  case "pgsql":
                     // Código do postgre
                     break;
                  case "oracle":
                     // Código do oracle
                     break;
                  default:
                     die("<script>console.error('SGBD Incompatível com o sistema');</script>");  
               }
            }else{
               die("<script>console.error('Arquivo de configuração não encontrado');</script>");
            }    
         }catch(PDOException $e){
            $error = addslashes($e->getMessage());
            echo "<script>console.error('Erro ao conectar ao banco: {$error}');</script>";
         }catch(Exception $e){
            echo "<script>console.error('Erro ao processar o arquivo');</script>";
         }
      }      
   function getPDO(){
      return $this->pdo;
   }
   function fecharConexao(){
      $this->pdo = NULL;
   }

}
?>
