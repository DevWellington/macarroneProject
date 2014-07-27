/*
 * JavaScript Custom File
 * @autor: Wellington Ribeiro
 * @email: ribeiro.php@gmail.com
 * @fileName: custom.js
 */

$(document).ready(function(){

	$(".hero-unit p").css({"display": "inline"});

	$("#save").click(function(){

	    var pageName = $("#namePage").text().trim();
	    var data = CKEDITOR.instances.descricao.getData();

	    $.post("./admin/post/saveDescricao.post.php", {
	        pageName: pageName,
	        data: data
	    }, function(data){
	        alert(data);
	    });

	    console.log(CKEDITOR.instances.descricao.getData());
	});


	
	$(".btn-large").click(function(){

		for(name in CKEDITOR.instances){
			CKEDITOR.instances[name].destroy();
		}
		$("textarea").css("display", "none");						

	    var pageName = $(this).attr("id");

	    $.getJSON("./admin/get/getDescricao.get.php", {
		    pageName: pageName
		}, function(data){ 

	        $("textarea").val(data.descricao);
	        $("#namePage").text(data.nome);

	        $("textarea").css("display", "block");
	        CKEDITOR.replace("descricao");

		});
	});
});