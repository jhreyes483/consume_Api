
    function update() {
        var nom = document.getElementById('nom_categoria').value;
        var des = document.getElementById('descripcion').value;
        fetch('http://127.0.0.1:8000/api/categorias/' + id, {
            method: 'PUT',
            headers: {
                "Content-Type": "application/json",
                api_key_laika: 'asdfdsafdsa'
            },
            body: JSON.stringify({ nom_categoria: nom, descript: des })
        })
            .then(res => res.json())
            .then(res => {
                alert(res.msg)
            });
    }


    function categoiras(){
        window.location.href = "index.html";
    }

function edit(id) {
   window.location.href = "edit.html?i=" + id;
}

function show(id) {
   window.location.href = "show.html?i=" + id;
}

function categoriasIndex() {
   window.location.href = "../categorias/cat_index.html"
}

function productos() {
   window.location.href = "../productos/pro_index.html"
}



    function getGET() {
    var loc = document.location.href;
    if (loc.indexOf('?') > 0) {
        var getString = loc.split('?')[1];
        var GET = getString.split('&');
        var get = {};
        for (var i = 0, l = GET.length; i < l; i++) {
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
    }
}
