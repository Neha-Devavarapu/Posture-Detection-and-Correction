<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            text-align: center;
        }

        body {
            overflow-x: hidden;
        }

        .Welcome {
            color: black;
            font-size: 54px;
            font-weight: 700;
            text-shadow: 1px 1px 3px #e0d1bc;
            font-family: Volkhov, serif;
        }

        .description {
            color: #76777a;
            font-family: Roboto Slab, serif !important;
            font-weight: 500;
            font-size: x-large;
            text-align: center;
            margin-left: 30px;
            margin-right: 30px;

        }

        img {
            height: 250px;
        }

        .plus {
            color: #14bdee;
            font-size: xx-large;
            font-weight: 800;
            margin-block: 15px;
        }

        .iconTitle {
            font-size: 20px;
            margin-top: 23px;
        }

        .icon {
            margin-block: 25px;
            align-items: center;
        }

        .list_inner:hover {
            box-shadow: 0px 10px 20px 2px rgba(0, 0, 0, 0.25);
            transition: all ease 0.2s;
            background-color: #fff;
        }

        .list_element {
            list-style: none;
            display: inline-flex;
            padding-left: 100px;
            padding-right: 100px;
            padding-block: 30px;
        }

        .icon_pic {
            margin-block: 25px;
        }

        .list_inner {
            padding-inline-end: 50px;
            width: 33.3333333333%;
            top: 50%;
            display: flex;
            justify-content: center;
        }

        .icon_inside {
            padding-block: 25px;
        }

        .header {
            position: sticky;
            top: 0;
            left: 0;
            background-color: rgba(233, 233, 233, 0.21);
            box-shadow: 0 4px 4px rgba(2, 5, 15, 0.25);
            width: 1440px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 12px 18px;
            box-sizing: border-box;
            align-items: flex-start;
            justify-content: flex-start;
            filter: drop-shadow(2px 4px 6px black);
            backdrop-filter: drop-shadow(2px 4px 6px black);
        }

        .buttons,
        .physio-high-resolution-logo-bl-parent {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 36px;
        }

        .physio-high-resolution-logo-bl-parent {
            gap: 705px;
        }

        .physio-high-resolution-logo-bl-icon {
            position: relative;
            width: 57px;
            height: 55px;
            flex-shrink: 0;
            object-fit: cover;
        }

        .contact-us4:hover {
            transform: scale(1.3);

        }

        .home1:hover {
            transform: scale(1.3);
        }

        .about-us3:hover {
            transform: scale(1.3);

        }

        .about-us3,
        .contact-us4,
        .home1 {
            cursor: pointer;
            border: 0;
            padding: 0;
            background-color: transparent;
            position: absolute;
            top: 0;
            left: 255px;
            font-size: var(--font-size-xl);
            font-weight: 600;
            font-family: var(--h3);
            color: var(--color-black);
            text-align: left;
            display: inline-block;
            width: 162.92px;
        }

        .about-us3,
        .home1 {


            left: 112px;
            width: 134px;
        }

        .home1 {
            left: 0;
            width: 86px;
        }

        .contact-us-parent {
            position: relative;
            width: 417.92px;
            height: 34px;
            flex-shrink: 0;
        }

        .btn-43,
        .btn-43 *,
        .btn-43 :after,
        .btn-43 :before,
        .btn-43:after,
        .btn-43:before {
            border: 0 solid;
            box-sizing: border-box;
        }

        .btn-43 {
            -webkit-tap-highlight-color: transparent;
            -webkit-appearance: button;
            background-color: #000;
            background-image: none;
            color: #fff;
            cursor: pointer;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
                Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
                Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            font-size: 100%;
            font-weight: 900;
            line-height: 1.5;
            margin: 0;
            -webkit-mask-image: -webkit-radial-gradient(#000, #fff);
            padding: 0;
        }

        .btn-43:disabled {
            cursor: default;
        }

        .btn-43:-moz-focusring {
            outline: auto;
        }

        .btn-43 svg {
            display: block;
            vertical-align: middle;
        }

        .btn-43 [hidden] {
            display: none;
        }

        .btn-43 {
            border: 1px solid;
            box-sizing: border-box;
            display: block;
            overflow: hidden;
            padding: 20px 60px;
            position: relative;
            text-transform: uppercase;
            margin-inline: 103px;
            border-radius: 20px;
        }
        .wrapper {
  height: 100vh;
  /*This part is important for centering*/
  display: grid;
  place-items: center;
  
}

.typing-demo {
  width: 22ch;
  animation: typing 2s steps(22), blink .5s step-end infinite alternate;
  white-space: nowrap;
  overflow: hidden;
  border-right: 3px solid;
  font-family: monospace;
  font-size: 2em;
}

@keyframes typing {
  from {
    width: 0
  }
}
    
@keyframes blink {
  50% {
    border-color: transparent
  }
}

        .btn-43 .new,
        .btn-43 .old {
            font-weight: 900;
        }

        .btn-43 .old {
            font-size: 15px;
        }

        .btn-43 .new {
            background: #fff;
            color: #000;
            content: "";
            display: grid;
            inset: 0;
            opacity: 0;
            place-items: center;
            position: absolute;
            transform: rotate(90deg) translateY(100%);
            transform-origin: bottom left;
            transition: transform 0.2s, opacity 0.2s;
        }

        .btn-43:hover .new {
            opacity: 1;
            transform: rotate(0deg) translateY(0);
        }

        .btn-43 .old {
            transition: opacity 0.2s;
        }


        .btn-43:hover .old {
            opacity: 0;
        }
    </style>
    <title>
        webcam page
    </title>
</head>

<body>
    
    <header class="header">
        <div class="physio-high-resolution-logo-bl-parent">
            <img class="physio-high-resolution-logo-bl-icon" alt=""
                src="public/physiohighresolutionlogoblackontransparentbackground-1@2x.png" />
              
               
                <div class="contact-us-parent" style="font-size: xx-large;">
                <div class="buttons">
                
                    <button class="contact-us4" id="contactUs" style="margin-inline-start: 86px;" onclick="location.href='home.php#CONTACT-US'">Contact Us</button>
                    <button class="about-us3" id="aboutUs" style="margin-inline-start: 50px;" onclick="location.href='home.php#ABOUT-US'">About
                        Us</button><button class="home1" id="home" style="margin-block-end: 86px;" onclick="location.href='home.php'">Home</button>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper" style="padding: block 45px;">
             <div class="typing-demo" style="margin-block: 65px;
    font-size: xxx-large;
    font-style: oblique;
    font-family: auto;color: #76777a;">               
                        Hello!!          
                                        
                                           
                                            <?php
                                            echo "   ";
                                            echo $_SESSION['email'];
                                            ?>
                                        </div>
    <div style="margin-left: 75px;margin-right: 75px;">
        <h1 class="Welcome" style="font-family: cursive;">
            WELCOME TO PHYSIO
        </h1>
        <div>
            <p class="description">
                "Your posture is a reflection of how you see yourself. So, if you don't like what you see, change it.
            </p>
        </div>

    </div>

    <div class="list_element">


        <div class="list_inner" style="justify-content: center;">
            <div class="icon" style="justify-content: center;">
                <div class="icon_inside" style="justify-content: center;">
                    <div style="justify-content: center;"><img src="public\pngwing.com.png" alt=""></div>
                    <div class="plus" style="text-align: center;">
                        Standing
                    </div>

                    <button class="btn-43">
                        <span class="old">Wanna try?</span>
                        <span class="new">Let's go</span>
                    </button>

                </div>
            </div>
        </div>
        <div class="list_inner">
            <div class="icon">
                <div class="icon_inside">
                    <div><img src="public\pngwing.com (1).png" alt=""></div>
                    <div class="plus" style="text-align: center;">
                        Squad
                    </div>

                    <button class="btn-43">
                        <span class="old">Wanna try?</span>
                        <span class="new">Let's go</span>
                    </button>

                </div>
            </div>
        </div>
        <div class="list_inner">
            <div class="icon">
                <div class="icon_inside">
                    <div><img src="public\pngwing.com (2).png" alt=""></div>
                    <div class="plus" style="text-align: center;">
                        Plank
                    </div>

                    <button class="btn-43">
                        <span class="old">Wanna try?</span>
                        <span class="new">Let's go</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</body>

</html>