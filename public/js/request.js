function buyArticle(article_id){
    addArticleToCart(article_id,()=>{
        window.location="/cart"
    })
}
function addArticleToCart(article_id,callback){
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
            console.log(response)
            if(response.nbr_articles||response.error===true){
                if(callback){
                    callback(response);
                }else{
                    Swal.fire(response.message);
                    if(!response.error){
                        set_nbr_articles(response.nbr_articles);
                    }
                }
                
            }else{
                show_message_connect_you()
            }
           
        }).catch((error)=>{
            Swal.fire({
                title: "Internet?",
                text: "connexion internet instable?",
                icon: "question"
              });
        })
    }else{
        show_message_connect_you()
       
    }
}

function  show_message_connect_you(){
    Swal.fire({
        title: "Connectez vous pour continuer",
        showConfirmButton: false,
        html: "<a href='/login' style='display:inline-block;color:white;background-color:var(--color1);padding:10px 20px;border-radius:10px;margin:2px;'>Connetez </a> vous ou creez un compte!",
      });
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
            if(response.nbr_articles_wish||response.error===true){
                Swal.fire(response.message);
                if(!response.error){
                    set_nbr_wishs(response.nbr_articles_wish);
                }
            }else{
                show_message_connect_you();
            }
        }).catch((error)=>{
            Swal.fire({
                title: "Internet?",
                text: "connexion internet instable?",
                icon: "question"
              });
        })
    }else{
       
        show_message_connect_you();
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
function set_user_rate(n){
    let user_rate=document.getElementById('user_rate');
    if(user_rate){
        user_rate.value=n;
    }
}
function addCommentToArticle(){
    let item=document.querySelector('input[name=_token]');
    let user_name=document.getElementById('user_name').value;
    let user_email=document.getElementById('user_email').value;
    let user_rate=parseInt(document.getElementById('user_rate').value);
    let content=document.getElementById('content').value;
    let article_id=parseInt(document.getElementById('article_id').value);
    if(item){
        console.log({article_id,user_name,user_email,user_rate,content})
        let csrf_token=item.value;
        fetch('/comment/add', {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'url': '/payment',
                "X-CSRF-Token":csrf_token
            },
            body: JSON.stringify({article_id,user_name,user_email,user_rate,content})
        }).then((response)=>response.json())
        .then((response)=>{
           
            Swal.fire(response.message);
            console.log(response)
            if(!response.error){
                set_nbr_comments(response.n_comments);
                display_new_comment(response.comment);
            }
        }).catch((error)=>{
            console.log(error)
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
function set_nbr_comments(n){
    console.log('----')
    let item =document.getElementById('nbr_comments');
    if(item){
        console.log('---- kk')
        item.innerText='('+n+')';
    }
}
function display_new_comment(comment){
    let item =document.getElementById('list-comments');
    let rate="";
    for(let i=0;i<comment.user_rate;i++){
        rate+='<i class="fa fa-star"></i>'
    }
    if(item){
        console.log('---- kk')
        item.innerHTML+='<div class="reviews-submitted">\
        <div class="reviewer">'+comment.user_name+' - <span>'+comment.created_at+'</span></div>\
        <div class="ratting">'+rate+'</div>\
        <p>'+comment.content+'</p>\
        </div>';
    }
}