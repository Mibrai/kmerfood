function loadViewCategorie(){
    $.get("cathegorieView.php",function(rep){
        $("#bloc_central").html(rep);
    });
}

function loadListCommand(){
    $.get("showCommand.php",function(rep){
        $("#bloc_central").html(rep);
    });
}

function loadListProduct(){
    $.get("showProduct.php",function(rep){
        $("#bloc_central").html(rep);
    });
}

function saveCathegorie(){
    var name_ = document.getElementById("label").value;
    console.log(name_);
    if(name_ != "" && name_.length > 3){
        console.log(name_.length);
        $.get("../models/saveCathegorie.php?name_cathegorie="+name_ , function(rep){
            $("#bloc_central").html(rep);
        });
    }
}

function saveCommand(id_product,current_price){
    var nom = $("#inputNom"+id_product).val();
    var mail = $("#inputEmail"+id_product).val();
    var phone = $("#inputTelefone"+id_product).val();
    var adresse = $("#inputAdress"+id_product).val();
    var qty = $("#inputQte"+id_product).val();
    console.log(id_product +" <==> "+ current_price);
        $.get("models/saveCommand.php?nom="+nom+"&mail="+mail+"&phone="+phone+"&adresse="+adresse+"&qty="+qty+"&id_product="+id_product+"&current_price="+current_price , function(rep){
            console.log(rep);
            $("#col_result").html(rep);
            alert("Commande Valide !!!");
            location.reload();
        });
}


function updateCommand(id_cmd){
    var status = document.getElementById("status").value;
    var delivry = document.getElementById("delivry").value;
    console.log(status +" "+ delivry);
        $.get("../models/updateCommand.php?id_cmd="+id_cmd+"&status="+status+"&delivry="+delivry, function(rep){
            console.log(rep);
            $("#col_result").html(rep);
        });

}


function updateProduct(id_product){
    var old_price = $("#old_price"+id_product).val();
    var new_price = $("#new_price"+id_product).val();
        $.get("../models/updateProduct.php?id_product="+id_product+"&old_price="+old_price+"&new_price="+new_price, function(rep){
            console.log(rep);
            $("#col_result").html(rep);
            alert("Produit mise a jour !!!");
            location.reload();
        });

}

function checkIfExist(name){
    $.get("../controller/checkProduct.php?name="+name,function(rep){
            $("body").prepend(rep);
    });
}