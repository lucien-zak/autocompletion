document.addEventListener('DOMContentLoaded', function () {
    
    var suiv = document.querySelector('.suiv');
    var villes = document.querySelectorAll('div.ville');
    var nombreResultat = document.querySelector('button.suiv span');
    if ( nombreResultat.innerText < 5) { 
        suiv.classList.add('invisible');
        for (let ville = 0 ; ville < nombreResultat.innerText ; ville++) {
            villes[ville].classList.remove('invisible');
            }
    }
    else {
        nombreResultat.innerText = nombreResultat.innerText - 5 ;
    for (let ville = 0 ; ville < 5 ; ville++) {
        villes[ville].classList.remove('invisible');
        }
        var index = 10;
    suiv.addEventListener('click',(e) => {
        
        nombreResultat.innerText = nombreResultat.innerText - 5 ;
            if ( nombreResultat.innerText < 5) { 
                for (let ville = 0 ; ville < villes.length ; ville++) {
                    villes[ville].classList.remove('invisible');
                }    
                suiv.classList.add('invisible');
            }   
            else 
            {
                for (let ville = 5 ; ville < index ; ville++) {
                    villes[ville].classList.remove('invisible');
                }

                index = index + 5;
    
            }
    })
    }
});