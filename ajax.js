
$(document).ready(function(){
   function carregarTodos(){
    $.ajax({
        url:'acao.php',
        method:'get',
        dataType:'json',
         data:{
            acao:'all'
        } 
    }).done(function( retorno ) {
        console.log(retorno);
        for(var i=0; i < retorno.length; i++ ){
            $('.box_coment').prepend('<div class="b_com"><div class="d-inline-block w-25 mt-5 "><h4>'+retorno[i].nome+'</h4><p>'+retorno[i].email+'</p></div><div class="d-sm-inline-block w-25 mt-5"><button type="button" class="btn btn-primary"><i class="bi bi-trash"></i></button></div></div><hr>')
        }


      });

   }
   carregarTodos()
      $("#salvar").on("click",function(){
        nome=$("#nome").val();
        email=$("#email").val();
    $.ajax({
        url:"acao.php",
        mehtod:"post",
        dataType:'json',
        data:{
            nome:nome, email:email, acao:'insert'
        }
    }).done(function(retorno){
        $("#nome").val('');
        $("#email").val('');
        console.log(retorno);

        carregarTodos();
        
        
    })
    })

    $("#delete").on("click", function(){
        id=$("#id").val();
        $.ajax({
            url:'acao.php',
            method:'delete',
            dataType:'json',
            data:{
                acao:'delete',
            }
        })
    })
    $("#update").on("click", function(){
        id=$("#id").val();
        nome=$("#nome").val();
        email=$("#email").val();
        $.ajax({
            url:'acao.php',
            method:'put',
            data:{
                acao:'acao', id:id, nome:nome, email:email
            }
        })
    })
    $("#search").on("clieck", function(){
        id= $("#id").val();
        $.ajax({
            url:'acao.php',
            method:'get',
            dataType:'json',
            data:{
                acao:'search', id:id
            }
        }).done(function(retorno){
            alert(retorno)
        })
    })

    
})
