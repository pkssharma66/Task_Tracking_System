<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Task Tracking Login</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Roboto',sans-serif;
}

body{
    height:100vh;
    display:flex;
}

.left-side{
    flex:1;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    overflow:hidden;
    position: relative;
}

.left-side h1{
    font-size:2.5rem;
    margin-bottom:20px;
    animation:fadeInUp 1s ease forwards;
}

.left-side p{
    font-size:1.1rem;
    line-height:1.6;
    text-align:center;
    width:70%;
    animation:fadeInUp 1.3s ease forwards;
}

@keyframes fadeInUp{
    0%{opacity:0; transform:translateY(20px);}
    100%{opacity:1; transform:translateY(0);}
}

/* Floating text animation */
.animated-text span{
    display:inline-block;
    opacity:0;
    animation:bounceText 1s forwards;
}

.animated-text span:nth-child(1){animation-delay:0.1s;}
.animated-text span:nth-child(2){animation-delay:0.2s;}
.animated-text span:nth-child(3){animation-delay:0.3s;}
.animated-text span:nth-child(4){animation-delay:0.4s;}
.animated-text span:nth-child(5){animation-delay:0.5s;}

@keyframes bounceText{
    0%{opacity:0; transform:translateY(20px);}
    60%{opacity:1; transform:translateY(-10px);}
    100%{opacity:1; transform:translateY(0);}
}

/* Right side login */
.right-side{
    flex:1;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f5f5f5;
}

.login-card{
    width:360px;
    padding:40px;
    border-radius:20px;
    background:white;
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
    color:#333;
    animation:slideInRight 1s ease forwards;
}

@keyframes slideInRight{
    0%{transform:translateX(50px); opacity:0;}
    100%{transform:translateX(0); opacity:1;}
}

.login-card h2{
    text-align:center;
    margin-bottom:30px;
}

.input-box{
    position:relative;
    margin-bottom:25px;
}

.input-box input{
    width:100%;
    padding:12px 10px;
    border:none;
    border-bottom:2px solid #ccc;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

.input-box input:focus{
    border-bottom:2px solid #667eea;
}

.input-box label{
    position:absolute;
    left:10px;
    top:12px;
    color:#999;
    font-size:14px;
    pointer-events:none;
    transition:0.3s;
}

.input-box input:focus + label,
.input-box input:valid + label{
    top:-10px;
    font-size:12px;
    color:#667eea;
}

.login-btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:30px;
    background:#667eea;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.login-btn:hover{
    background:#5a63c9;
    transform:translateY(-2px);
}

.extra{
    text-align:center;
    margin-top:15px;
    font-size:13px;
}

.extra a{
    color:#667eea;
    text-decoration:none;
}

.extra a:hover{
    text-decoration:underline;
}

@media screen and (max-width: 900px){
    body{
        flex-direction:column;
    }
    .left-side, .right-side{
        flex:unset;
        width:100%;
        height:50vh;
    }
}

</style>
</head>

<body>

<div class="left-side">
    <h1>Welcome to Task Tracker</h1>
    <p class="animated-text">
        <span id="typing"></span>
    </p>
</div>

<div class="right-side">
    <div class="login-card">
        <h2>Login</h2>
        <form name="login" method="POST" action="{{ url("login") }}">
            @csrf
            <div class="input-box">
                <input type="email" name="email" id="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>
            <button class="login-btn">Login</button>
            <div class="extra">
                Forgot password? <a href="#">Reset</a>
            </div>
        </form>
    </div>
</div>
<script>

const words = [
  "Manage tasks efficiently",
  "Track progress in real-time",
  "Collaborate with your team",
  "Get notifications instantly"
];

let i = 0;
let timer;

function typingEffect() {
    let word = words[i].split("");
    let loopTyping = function() {
        if(word.length > 0){
            document.getElementById('typing').innerHTML += word.shift();
            timer = setTimeout(loopTyping,100);
        } else {
            setTimeout(deletingEffect,2000);
        }
    };
    loopTyping();
}

function deletingEffect() {
    let word = document.getElementById('typing').innerHTML.split("");
    let loopDeleting = function() {
        if(word.length > 0){
            word.pop();
            document.getElementById('typing').innerHTML = word.join("");
            timer = setTimeout(loopDeleting,50);
        } else {
            i = (i + 1) % words.length;
            typingEffect();
        }
    };
    loopDeleting();
}

typingEffect();
</script>
</body>
</html>