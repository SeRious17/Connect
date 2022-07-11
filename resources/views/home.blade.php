@extends('layouts.app')

@section('content')
    <div class="home-container">
        <div class="left-container">
            <div class="png">
                <img src="../img/talk.png" alt="">
            </div>
            <a href="{{route('posts')}}">
                <button class="button-53" role="button">See Post</i></button></a>  
        </div>

        <div class="right-container">
            <div class="h1-right">
                <h1>Let's share your opinion with the world</h1>
            </div>
            <p>Sign in or Create an Account</p>
            <div class="right-btn">
                <a href="{{route('login')}}"><button type="submit" class="bg-white loginbtn  px-4 py-3 rounded font-medium">Login</button></a>
                <a href="{{route('register')}}"> <button type="submit" class="bg-white rightbtn  px-4 py-3 rounded font-medium">Create an account</button></a>
                <center><hr width="15%" class="hr-tag"></center>
                <div class="social">
                    <div class="social-icon">
                        <a href="#" class="icon">
                            <i class="fab fa-facebook"></i>
                        </a>   
                        <a href="#" class="icon">
                            <i class="fab fa-google"></i>
                        </a>   
                        <a href="#" class="icon">
                            <i class="fab fa-twitter"></i>
                        </a>   
                        <a href="#" class="icon">
                            <i class="fab fa-linkedin"></i>
                        </a>      
                         
                    </div>  
                </div>
            </div>
            
        </div>
    </div>
@endsection