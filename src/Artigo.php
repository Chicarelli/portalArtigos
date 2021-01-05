<?php 

class Artigo{

    private $mysql;

    public function __construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function exibirTodos() : array {
                 
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');

        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
        
        return $artigos; 
    }    

    public function exibirUm(string $id){
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");

        $selecionaArtigo->bind_param('s', $id);

        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();

        return $artigo;

    }

    public function adicionar(string $titulo, string $conteudo): void {
       $insereArtigo =  $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) values (?,?);');
       $insereArtigo->bind_param('ss', $titulo, $conteudo);
       
       $insereArtigo->execute();
    }

    public function excluirArtigo(string $id): void{
         $deletaArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
         $deletaArtigo->bind_param('s', $id);
         $deletaArtigo->execute();
        
    }

    public function editarArquivo(string $titulo, string $conteudo, string $id) : void {
        $editaArquivo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $editaArquivo->bind_param('sss', $titulo, $conteudo, $id);
        $editaArquivo->execute();
    }
    
}

?>