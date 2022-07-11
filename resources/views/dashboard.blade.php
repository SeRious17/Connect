
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posty</title>
        <script src="https://kit.fontawesome.com/48cdf94651.js" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        {{-- <script src="jquery.min.js" type="text/javascript"></script>
        <script src="jquery.timeago.js" type="text/javascript"></script> --}}

    <body class="images">
        <nav class="p-7 flex justify-between mb-1">
            
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-3"> <div class="logo">
                        <img src="../img/logo.png" alt="">
                    </div></a>
                </li>
                <li>
                    <a href="/" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Posts</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>
    </body>
</html>

<div class="flex justify-center">
    <div class="flex justify-center search border-2 border-white mb-4">
        <input type="search"name="search" onpvalue="" id="keyword" placeholder="Type something bitcoin..." class="input_search"style="width: 500px; height: 40px">
        <i class="fas fa-search" id="search" onclick="getnews()"></i>
    </div>
</div>

<div class="container-post">
    <div class="flex justify-center mb-3">
        <div class="spinner-border text-white" id ="load" role="status">
            <span class="sr-only">Loading...</span>
          </div>
    </div>

    <div class="newsart">

    </div>
</div>  
    <script>
        $(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    getnews(); 
  }
});
        getnews();
        function getnews(){
            $(".newsart").text("");
            var keyword = $("#keyword").val();
            if(!keyword==""){
                var url ="https://newsapi.org/v2/everything?q="+keyword+"&apiKey=513bef7588a84ed8851ba7672dc5ae69";
            }else{
                var url ="https://newsapi.org/v2/everything?q=everything&apiKey=513bef7588a84ed8851ba7672dc5ae69";
            }
            
            
            
            
        $("#load").show();

        $.get(url,(response)=>{
            $("#load").hide();
            console.log(response);
            for(let i=0;i<response.articles.length;i++){
                
                var html =`<div class="card news-card">
                                <img class="card-img-top" src="${response.articles[i].urlToImage}" alt="Card image cap">
                                <div class="card-body">
                                <b><h4 class="card-title h4title">${response.articles[i].title}</h4></b>
                                <p class="card-text desc-color">${response.articles[i].content.substring(0,200)}<a href = "${response.articles[i].url}"target ="_blank">read more</a></p>
                                <p class="card-text "><small class="date-time">${response.articles[i].publishedAt} | ${response.articles[i].author}</small></p>
                                </div>
                            </div>`;
                            $(".newsart").append(html)
            }
        })
    }
    </script>
