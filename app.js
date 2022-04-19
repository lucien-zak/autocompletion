document.addEventListener('DOMContentLoaded', (e) => {
	
    var search = document.querySelector('#search');
    search.addEventListener('input', (e) => {
        let html = '';
        document.querySelector('#collection').innerHTML = html;
        document.querySelector('#collection2').innerHTML = html;
        if (search.value.length > 1) {

        fetch('traitements.php?name='+search.value)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                // console.log(data);
                let html = '';
                let i = 0;
                data['exact'].forEach(function (res) {
                    let value = search.value;
                    let strongValue = '<strong>'+value+'</strong>';
                    html += '<p class="resultat">'+strongValue.toLowerCase()+res.ville_nom.substring(search.value.length).toLowerCase()+'</p>'
                    i++;
                });
                document.querySelector('#collection').innerHTML = html;
                var searchVille = document.querySelectorAll('p.resultat');
                searchVille.forEach(element => {
                    element.addEventListener('click', (e) => {
                        search.value = element.innerText;
                    })
                });

                let html2 = '';
                let j = 0;
                data['contenu'].forEach(function (res2) {
                    html2 += '<a href="element.php?id='+res2.ville_id+'"><p class="resultat"><strong>'+res2.ville_nom.toLowerCase()+'</strong> - '+res2.ville_departement.toLowerCase()+'</p></a>'
                    j++;
                });
                document.querySelector('#collection2').innerHTML = html2;
            }
                    );
                }
            });
    });




