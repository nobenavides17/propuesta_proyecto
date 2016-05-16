// JavaScript Document
			
			function fn_cantidad(){
				cantidad = $("#tablesA").find("tr").length - 1;
				$("#span_cantidad").html(cantidad);
			};
            
            function fn_agregar(){
                cadena = "<tr>";
                cadena = cadena + "<td><input type='text' style='width:30px' name='idprod"+ $("#idp").val() +"' value='" + $("#idp").val() + "' readonly></td>";
                cadena = cadena + "<td><input type='text'  name='nombprod"+ $("#idp").val() +"' value='" + $("#producto").val() + "' readonly></td>";
                cadena = cadena + "<td><input type='text'  style='width:50px' name='precprod"+ $("#idp").val() +"' value='" + $("#prec").val() + "' readonly></td>";
                cadena = cadena + "<td><input type='text' name='cantprod"+ $("#idp").val() +"' style='width:30px' value='" + $("#canto").val() + "' readonly></td>";
                cadena = cadena + "<td><input type='number' name='tota"+$("#idp").val()+"' style='width:100px' readonly value='"+$("#canto").val() * $("#prec").val()+"'></td>";
                cadena = cadena + "<td><a class='elimina btn btn-primary'>Borrar</a></td>";
                $("#tablesA").append(cadena);
                 $("#idp").val("");
                 $("#producto").val("");
                 $("#prec").val("");
                 $("#canto").val("");
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
                fn_dar_eliminar();
				fn_cantidad();
            };
            function multiplicar(val, id){
                var prec = $("#precprod"+id).value;
                $("#tota"+id).value= prec * val; 
            }
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                });
            };
