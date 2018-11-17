<!DOCTYPE html>
<html>
	<head>
		<title> Meu app </title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
	
		<table class="table table-dark table-bordered table-striped table_people">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Peso</th>
					<th>Cor do Cabelo</th>
					<th>Cor do Olho</th>
					<th>Sexo</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		
		<nav>
		  <ul class="pagination"></ul>
		</nav>
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		<script
		  src="https://code.jquery.com/jquery-3.3.1.js"
		  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		  crossorigin="anonymous"></script>
		
		<script>
				
				buscarDados();
			
				function buscarDados(pagina = 1){
					
					$('.table_people tbody').html('');
					$('.pagination').html('');
					
					$.ajax({
					  url: "https://swapi.co/api/people/?page="+pagina,
					  method: "GET",
					  success: function(data) {
						
						 let count = data.count;
						 let paginas = Math.round(count/10);
						 let tbody = '';
						 let links = '';
						 
						 
							 for (let j = 0; j < data.results.length; j++){
								 tbody += '<tr>';
								 tbody += '<td>'+data.results[j].name+'</td>';
								 tbody += '<td>'+data.results[j].mass+'</td>';
								 tbody += '<td>'+data.results[j].hair_color+'</td>';
								 tbody += '<td>'+data.results[j].eye_color+'</td>';
								 tbody += '<td>'+data.results[j].gender+'</td>';
								 tbody += '</tr>';
							 }
						 
							for (let k = 0; k < parseInt(paginas); k++){
								
								let active = '';
								
								if (k == 0 && pagina == 1){
									active = ' active';
								}else if ((k+1) == pagina){
									active = ' active';
								}
								
								links = '<li class="page-item'+active+'" pagina="'+(parseInt(k)+1)+'"><a class="page-link">'+(parseInt(k)+1)+'</a></li>'
								
								$('.pagination').append(links);
							}
							
						 $('.table_people tbody').html(tbody);
						
						$('.page-link').click(function(){
							buscarDados($(this).parents('.page-item').attr('pagina'));
						}); 
					  }
					});
					
			
					$('.active').removeClass('active');
					
				}	
			
		</script>
	</body>
</html>