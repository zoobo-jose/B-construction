function addArticleToCart(article_id){
    let item=document.querySelector('input[name=_token]');
    if(item){
        let csrf_token=item.value;
        fetch('/cart/add', {
            method: 'PUT', 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'url': '/payment',
                "X-CSRF-Token":csrf_token
            },
            body: JSON.stringify({article_id})
        }).then((response)=>response.json())
        .then((response)=>{
            Swal.fire(response.message);
            if(!response.error){
                set_nbr_articles(response.nbr_articles);
            }
        }).catch((error)=>{
            Swal.fire({
                title: "Internet?",
                text: "connexion internet instable?",
                icon: "question"
              });
        })
    }else{
       
        Swal.fire({
            title: "Connectez vous pour continuer",
            showConfirmButton: false,
            html: "<a href='/login' style='display:inline-block;color:white;background-color:var(--color1);padding:10px 20px;border-radius:10px;margin:2px;'>Connetez </a> vous ou creez un compte!",
          });
    }
}
function set_nbr_articles(n){
    console.log('----')
    let item =document.getElementById('nbr_articles');
    if(item){
        console.log('---- kk')
        item.innerText='('+n+')';
    }
}

function addArticleToWishList(article_id){
    let item=document.querySelector('input[name=_token]');
    if(item){
        let csrf_token=item.value;
        fetch('/wishlist/add', {
            method: 'PUT', 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'url': '/payment',
                "X-CSRF-Token":csrf_token
            },
            body: JSON.stringify({article_id})
        }).then((response)=>response.json())
        .then((response)=>{
            Swal.fire(response.message);
            if(!response.error){
                set_nbr_wishs(response.nbr_articles_wish);
            }
        }).catch((error)=>{
            Swal.fire({
                title: "Internet?",
                text: "connexion internet instable?",
                icon: "question"
              });
        })
    }else{
       
        Swal.fire({
            title: "Connectez vous pour continuer",
            showConfirmButton: false,
            html: "<a href='/login' style='display:inline-block;color:white;background-color:var(--color1);padding:10px 20px;border-radius:10px;margin:2px;'>Connetez </a> vous ou creez un compte!",
          });
    }
}
function set_nbr_wishs(n){
    console.log('----')
    let item =document.getElementById('nbr_wishs');
    if(item){
        console.log('---- kk')
        item.innerText='('+n+')';
    }
}