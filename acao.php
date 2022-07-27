<?php
//
include 'class/conexao.php';
header('Content-Type: application/json');
$acao= isset($_POST['acao'])?$_POST['acao']:$_GET['acao'];

$nome= isset($_POST['nome'])?$_POST['nome']: (isset($_GET['nome'])?$_GET['nome']:$nome='');
$email= isset($_POST['email'])?$_POST['email']: (isset($_GET['email'])?$_GET['email']:$nome='');
$id= isset($_POST['id'])?$_POST['id']:$id='';

if($acao=='insert'){
   
    $insert= "insert into cliente (nome, email) values (:nome, :email)";
    $smt= $con->prepare($insert);
    $smt->bindValue(':nome',$nome);
    $smt->bindValue(':email',$email);
    $smt->execute();
    echo json_encode('ok');
}
if($acao=='atualizar'){
    $update= "update cliente set nome= :nome, email= :email where id= :id";
    $smt= $con->prepare($update);
    $smt->bindValue(':nome',$nome);
    $smt->bindValue(':email',$email);
    $smt->bindValue(':id',$id);
    $smt->execute();
}
if($acao== 'delete' ){
    $delete= "delete from cliente where id= :id";
    $smt=$con->prepare($delete);
    $smt->bindValue(':id', $id);
    $smt->execute();
}
if($acao=='all'){
   
    $select='select * from cliente';
    $smt= $con->prepare($select);
    $smt->execute();
    echo json_encode($smt->fetchAll(PDO::FETCH_ASSOC)); 
}
if($acao=='search'){
    $search='select * from cliente where id= :id';
    $smt= $con->prepare($search);
    $smt->bindValue(':id', $id);
    $smt->bindValue($search);
    return $smt->fetch(); 
}



?>