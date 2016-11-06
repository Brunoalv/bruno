var behance = function Behance()
{
	this.getUserProjects();
}

var num = 1;

behance.prototype.getUserProjects = function (n = 0) {
	num += n;
	
	if (sessionStorage.getItem('behance' + num)) {
		show();
	}
	else {
		jQuery.ajax({
			data: {client_id: 'a5mPwCsoCjcVjydZG6dFs9ACxvfrP4fm', page: num},
			dataType: 'jsonp',
			jsonp: 'callback',
			success: function (data) {
				data = JSON.stringify(data.projects);
				sessionStorage.setItem('behance' + num, data);
				show();
			},
			url: 'https://api.behance.net/v2/users/vasege/projects'
		});
	}
	
	function show() {
		var projetos = JSON.parse(sessionStorage.getItem('behance' + num));
		var lg = projetos.length;
		var ul = "";
		
		ul += '<ul class="row">';
		
		for (var i = 0; i < lg; i++) {
			ul += '<li class="col-sm-4 col-xs-6 col-lg-3"><div class="cover-project">';
			ul += '<div class="img-cover"><img src="' + projetos[i].covers[202] + '"></div>';
			ul += '<div class="cover-info"><h3><a href="' + projetos[i].url + '">' + projetos[i].name + '</a></h3>';
			ul += '<span class="data">' + new Date(projetos[i].published_on * 1000).toLocaleDateString() + '</span>';
            ul += '<div class="field-container">';
			
			for (var x in projetos[i].fields) ul += '<i class="fields">' + projetos[i].fields[x] + ', </i>';
            
            ul += '</div>';
			
			ul += '<button class="btn btn-primary" onclick="be.getProjectContent(' + projetos[i].id + ')" data-toggle="modal" data-target="#myModal">View</button>';
			ul += '</div></div></li>';
		}
		ul += '</ul>';
		
		ul += '<button class="btn-more" onclick="be.getUserProjects(1)">More</button>';
		if (num > 1) ul += '<button class="btn-return" onclick="be.getUserProjects(-1)">Retornar</button>';
		jQuery('#projects').html(ul);
	}
}

behance.prototype.getProjectContent = function (id) {
	if (sessionStorage.getItem('behanceProject' + id)) {
		showProject(id);
	}
	else {
		jQuery.ajax({
			beforeSend: function () {
				jQuery('#projectContent').html('<img src="media/img/loading.gif">');
			},
			data: {api_key: 'a5mPwCsoCjcVjydZG6dFs9ACxvfrP4fm'},
			dataType: 'jsonp',
			jsonp: 'callback',
			success: function (data) {
				data = JSON.stringify(data.project);
				sessionStorage.setItem('behanceProject' + id, data);
				showProject(id);
			},
			url: 'http://www.behance.net/v2/projects/' + id,
		});
	}
	
	function showProject() {
		var project = JSON.parse(sessionStorage.getItem('behanceProject' + id));
		var projectLength = project.modules.length;
		
		var content = '<h2>' + project.name + '</h2><br>';
		
		for (i = 0; i < projectLength; i++) {
			switch (project.modules[i].type) {
				case 'image':
					content += '<div class="project-img"><img src="' + project.modules[i].src + '"></div>';
					break;
				case 'text':
					content += project.modules[i].text;
					break;
				case 'video':
					content += '<iframe src="' + project.modules[i].src + '" width="' + project.modules[i].width + '" height="' + project.modules[i].height + '"></iframe>';
					break;
				case 'embed':
					content += project.modules[i].embed;
					break;
			}
		}
		
		jQuery('#projectContent').html(content);
	}
}

//var be = new behance();