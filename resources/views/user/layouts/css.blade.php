<link href="./assets/slick/material.css" rel="stylesheet">
<link rel="stylesheet" href="styles.0d3c7203ee65bc47357c.css">
<style>
    .mat-progress-bar[_ngcontent-c0] {
        position: fixed;
        z-index: 99999
    }

</style>
<style>
    [_nghost-c1] {
        position: relative;
        display: block
    }

    .loading-bar-fixed[_nghost-c1]>div[_ngcontent-c1] .bar[_ngcontent-c1] {
        position: fixed
    }

    .loading-bar-fixed[_nghost-c1]>div#loading-bar-spinner[_ngcontent-c1] {
        position: fixed;
        top: 10px;
        left: 10px
    }

    .loading-bar-fixed[_nghost-c1]>div[_ngcontent-c1] .peg[_ngcontent-c1] {
        display: block
    }

    [_nghost-c1]>div[_ngcontent-c1] {
        pointer-events: none;
        -webkit-transition: 350ms linear all;
        transition: 350ms linear all;
        color: #29d
    }

    [_nghost-c1]>div[_ngcontent-c1] .bar[_ngcontent-c1] {
        -webkit-transition: width 350ms;
        transition: width 350ms;
        background: #29d;
        position: absolute;
        z-index: 10002;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        border-bottom-right-radius: 1px;
        border-top-right-radius: 1px
    }

    [_nghost-c1]>div[_ngcontent-c1] .peg[_ngcontent-c1] {
        display: none;
        position: absolute;
        width: 70px;
        right: 0;
        top: 0;
        height: 2px;
        opacity: .45;
        -webkit-box-shadow: 1px 0 6px 1px;
        box-shadow: 1px 0 6px 1px;
        color: inherit;
        border-radius: 100%
    }

    [_nghost-c1]>div#loading-bar-spinner[_ngcontent-c1] {
        display: block;
        position: absolute;
        z-index: 10002;
        top: 5px;
        left: 0
    }

    [_nghost-c1]>div#loading-bar-spinner[_ngcontent-c1] .spinner-icon[_ngcontent-c1] {
        width: 14px;
        height: 14px;
        border: 2px solid transparent;
        border-top-color: inherit;
        border-left-color: inherit;
        border-radius: 50%;
        -webkit-animation: .4s linear infinite loading-bar-spinner;
        animation: .4s linear infinite loading-bar-spinner
    }

    @-webkit-keyframes loading-bar-spinner {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    @keyframes loading-bar-spinner {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

</style>
<style>
    .backdrop[_ngcontent-c2] {
        z-index: 1999;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.3);
    }

    .spinner-circle[_ngcontent-c2],
    .spinner-circle[_ngcontent-c2]:after {
        border-radius: 50%;
        width: 10em;
        height: 10em;
    }

    .spinner-circle[_ngcontent-c2] {
        font-size: 6px;
        //text-indent: -9999em;
        border-top: 1.1em solid rgba(255, 255, 255, 0.2);
        border-right: 1.1em solid rgba(255, 255, 255, 0.2);
        border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
        border-left: 1.1em solid #ffffff;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load8 1.1s infinite linear;
        animation: load8 1.1s infinite linear;
    }

    @-webkit-keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load8 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .spinner-circle-swish[_ngcontent-c2] {
        font-size: 60px;
        overflow: hidden;
        width: 1em;
        height: 1em;
        z-index: 2000;
        font-size: 60px;
        border-radius: 50%;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
        animation: load6 1.7s infinite ease, round 1.7s infinite ease;
    }

    @-webkit-keyframes load6 {
        0% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }

        5%,
        95% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }

        10%,
        59% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
        }

        20% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
        }

        38% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
        }

        100% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
    }

    @keyframes load6 {
        0% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }

        5%,
        95% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }

        10%,
        59% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
        }

        20% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
        }

        38% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
        }

        100% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
    }

    @-webkit-keyframes round {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes round {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .sk-cube-grid[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube[_ngcontent-c2] {
        width: 33%;
        height: 33%;
        background-color: #333;
        float: left;
        -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
        animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube1[_ngcontent-c2] {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube2[_ngcontent-c2] {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube3[_ngcontent-c2] {
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube4[_ngcontent-c2] {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube5[_ngcontent-c2] {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube6[_ngcontent-c2] {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube7[_ngcontent-c2] {
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube8[_ngcontent-c2] {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }

    .sk-cube-grid[_ngcontent-c2] .sk-cube9[_ngcontent-c2] {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    @-webkit-keyframes sk-cubeGridScaleDelay {

        0%,
        70%,
        100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
        }

        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
        }
    }

    @keyframes sk-cubeGridScaleDelay {

        0%,
        70%,
        100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
        }

        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
        }
    }

    .spinner-double-bounce[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
    }

    .double-bounce1[_ngcontent-c2],
    .double-bounce2[_ngcontent-c2] {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #333;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .double-bounce2[_ngcontent-c2] {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    @-webkit-keyframes sk-bounce {

        0%,
        100% {
            -webkit-transform: scale(0.0)
        }

        50% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes sk-bounce {

        0%,
        100% {
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        }

        50% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }

    .spinner-pulse[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        background-color: #333;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0)
        }

        100% {
            -webkit-transform: scale(1.0);
            opacity: 0;
        }
    }

    @keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        100% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
            opacity: 0;
        }
    }

    .spinner-three-bounce[_ngcontent-c2] {
        width: 70px;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 20px;
        margin: auto;
        z-index: 2000;
    }

    .spinner-three-bounce[_ngcontent-c2]>div[_ngcontent-c2] {
        width: 18px;
        height: 18px;
        background-color: #ffffff;
        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    .spinner-three-bounce[_ngcontent-c2] .bounce1[_ngcontent-c2] {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }

    .spinner-three-bounce[_ngcontent-c2] .bounce2[_ngcontent-c2] {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }

    @-webkit-keyframes sk-bouncedelay {

        0%,
        80%,
        100% {
            -webkit-transform: scale(0)
        }

        40% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes sk-bouncedelay {

        0%,
        80%,
        100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
    }

    .spinner-sk-rotateplane[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        background-color: #ffffff;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
        -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
        animation: sk-rotateplane 1.2s infinite ease-in-out;
    }

    @-webkit-keyframes sk-rotateplane {
        0% {
            -webkit-transform: perspective(120px)
        }

        50% {
            -webkit-transform: perspective(120px) rotateY(180deg)
        }

        100% {
            -webkit-transform: perspective(120px) rotateY(180deg) rotateX(180deg)
        }
    }

    @keyframes sk-rotateplane {
        0% {
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg)
        }

        50% {
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg)
        }

        100% {
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
        }
    }

    .spinner-rectangle-bounce[_ngcontent-c2] {
        width: 50px;
        height: 40px;
        font-size: 10px;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
    }

    .spinner-rectangle-bounce[_ngcontent-c2]>div[_ngcontent-c2] {
        background-color: #ffffff;
        height: 100%;
        width: 6px;
        display: inline-block;
        -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
        animation: sk-stretchdelay 1.2s infinite ease-in-out;
    }

    .spinner-rectangle-bounce[_ngcontent-c2] .rect2[_ngcontent-c2] {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }

    .spinner-rectangle-bounce[_ngcontent-c2] .rect3[_ngcontent-c2] {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    .spinner-rectangle-bounce[_ngcontent-c2] .rect4[_ngcontent-c2] {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    .spinner-rectangle-bounce[_ngcontent-c2] .rect5[_ngcontent-c2] {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }

    @-webkit-keyframes sk-stretchdelay {

        0%,
        40%,
        100% {
            -webkit-transform: scaleY(0.4)
        }

        20% {
            -webkit-transform: scaleY(1.0)
        }
    }

    @keyframes sk-stretchdelay {

        0%,
        40%,
        100% {
            transform: scaleY(0.4);
            -webkit-transform: scaleY(0.4);
        }

        20% {
            transform: scaleY(1.0);
            -webkit-transform: scaleY(1.0);
        }
    }

    .spinner-wandering-cubes[_ngcontent-c2] {
        width: 60px;
        height: 58px;
        font-size: 10px;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
    }

    .cube1[_ngcontent-c2],
    .cube2[_ngcontent-c2] {
        background-color: #ffffff;
        width: 15px;
        height: 15px;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-animation: sk-cubemove 1.8s infinite ease-in-out;
        animation: sk-cubemove 1.8s infinite ease-in-out;
    }

    .cube2[_ngcontent-c2] {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    @-webkit-keyframes sk-cubemove {
        25% {
            -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5)
        }

        50% {
            -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg)
        }

        75% {
            -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5)
        }

        100% {
            -webkit-transform: rotate(-360deg)
        }
    }

    @keyframes sk-cubemove {
        25% {
            transform: translateX(42px) rotate(-90deg) scale(0.5);
            -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
        }

        50% {
            transform: translateX(42px) translateY(42px) rotate(-179deg);
            -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
        }

        50.1% {
            transform: translateX(42px) translateY(42px) rotate(-180deg);
            -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
        }

        75% {
            transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
            -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
        }

        100% {
            transform: rotate(-360deg);
            -webkit-transform: rotate(-360deg);
        }
    }

    .sk-circle[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
    }

    .sk-circle[_ngcontent-c2] .sk-child[_ngcontent-c2] {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }

    .sk-circle[_ngcontent-c2] .sk-child[_ngcontent-c2]:before {
        content: '';
        display: block;
        margin: 0 auto;
        width: 15%;
        height: 15%;
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
        animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
    }

    .sk-circle[_ngcontent-c2] .sk-circle2[_ngcontent-c2] {
        -webkit-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        transform: rotate(30deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle3[_ngcontent-c2] {
        -webkit-transform: rotate(60deg);
        -ms-transform: rotate(60deg);
        transform: rotate(60deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle4[_ngcontent-c2] {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle5[_ngcontent-c2] {
        -webkit-transform: rotate(120deg);
        -ms-transform: rotate(120deg);
        transform: rotate(120deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle6[_ngcontent-c2] {
        -webkit-transform: rotate(150deg);
        -ms-transform: rotate(150deg);
        transform: rotate(150deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle7[_ngcontent-c2] {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle8[_ngcontent-c2] {
        -webkit-transform: rotate(210deg);
        -ms-transform: rotate(210deg);
        transform: rotate(210deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle9[_ngcontent-c2] {
        -webkit-transform: rotate(240deg);
        -ms-transform: rotate(240deg);
        transform: rotate(240deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle10[_ngcontent-c2] {
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle11[_ngcontent-c2] {
        -webkit-transform: rotate(300deg);
        -ms-transform: rotate(300deg);
        transform: rotate(300deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle12[_ngcontent-c2] {
        -webkit-transform: rotate(330deg);
        -ms-transform: rotate(330deg);
        transform: rotate(330deg);
    }

    .sk-circle[_ngcontent-c2] .sk-circle2[_ngcontent-c2]:before {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle3[_ngcontent-c2]:before {
        -webkit-animation-delay: -1s;
        animation-delay: -1s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle4[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle5[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle6[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.7s;
        animation-delay: -0.7s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle7[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.6s;
        animation-delay: -0.6s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle8[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.5s;
        animation-delay: -0.5s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle9[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.4s;
        animation-delay: -0.4s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle10[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.3s;
        animation-delay: -0.3s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle11[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.2s;
        animation-delay: -0.2s;
    }

    .sk-circle[_ngcontent-c2] .sk-circle12[_ngcontent-c2]:before {
        -webkit-animation-delay: -0.1s;
        animation-delay: -0.1s;
    }

    @-webkit-keyframes sk-circleBounceDelay {

        0%,
        80%,
        100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        40% {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes sk-circleBounceDelay {

        0%,
        80%,
        100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        40% {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    .spinner-chasing-dots[_ngcontent-c2] {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 2000;
        text-align: center;
        -webkit-animation: sk-rotate 2.0s infinite linear;
        animation: sk-rotate 2.0s infinite linear;
    }

    .dot1[_ngcontent-c2],
    .dot2[_ngcontent-c2] {
        width: 60%;
        height: 60%;
        display: inline-block;
        position: absolute;
        top: 0;
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
        animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .dot2[_ngcontent-c2] {
        top: auto;
        bottom: 0;
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    @-webkit-keyframes sk-rotate {
        100% {
            -webkit-transform: rotate(360deg)
        }
    }

    @keyframes sk-rotate {
        100% {
            transform: rotate(360deg);
            -webkit-transform: rotate(360deg)
        }
    }

    @-webkit-keyframes sk-bounce {

        0%,
        100% {
            -webkit-transform: scale(0.0)
        }

        50% {
            -webkit-transform: scale(1.0)
        }
    }

    @keyframes sk-bounce {

        0%,
        100% {
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        }

        50% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }

    .full-screen[_ngcontent-c2] {
        position: fixed;
    }

</style>
<style>
    .banner[_ngcontent-c4] {
        background: url(nen_bg.7372f84cd18d17a5e229.jpg) center center/cover no-repeat;
        height: 80px;
        padding: 5px 0;
        width: 100%
    }

    @media screen and (min-width:576px) and (max-width:767px) {
        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            max-width: none
        }
    }

    @media screen and (min-width:768px) and (max-width:1200px) {
        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            max-width: 95%
        }
    }

    @media only screen and (max-width:600px) {
        .banner[_ngcontent-c4] {
            padding: 0;
            background: url(data:image/png;base64,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) center center no-repeat;
            height: 60px;
            z-index: 999
        }
    }

    .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:first-child {
        height: 70px;
        padding-top: 7px;
        padding-bottom: 7px
    }

    .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:last-child {
        display: none
    }

    @media only screen and (max-width:767px) {
        .banner[_ngcontent-c4] {
            padding: 0;
            background: url(data:image/png;base64,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) center center no-repeat;
            height: 60px;
            z-index: 999
        }

        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            padding-left: 10px;
            padding-right: 10px
        }

        .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:first-child {
            display: none
        }

        .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:last-child {
            display: inline-block;
            height: 46px;
            margin-top: 5px
        }
    }

    .banner[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
        padding: 0;
        text-align: right;
        margin-bottom: 0;
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: 999998
    }

    .banner[_ngcontent-c4] .right[_ngcontent-c4] .sub-nav[_ngcontent-c4] {
        display: inline-block;
        padding-top: 12px;
        padding-right: 1px
    }

    .button-btn[_ngcontent-c4] {
        width: 300px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis
    }

    .btn[_ngcontent-c4] {
        color: #fff
    }

    .btn[_ngcontent-c4]:first-child .maDonVi[_ngcontent-c4] {
        display: none
    }

    @media only screen and (max-width:1199px) {
        .btn[_ngcontent-c4]:first-child .donVi[_ngcontent-c4] {
            display: none
        }

        .btn[_ngcontent-c4]:first-child .maDonVi[_ngcontent-c4] {
            display: inline-block
        }

        .btn[_ngcontent-c4] .idAccount[_ngcontent-c4] {
            display: none !important
        }
    }

    .banner[_ngcontent-c4] .right[_ngcontent-c4] ul[_ngcontent-c4] li[_ngcontent-c4] a[_ngcontent-c4] {
        color: #fff
    }

    .mat-menu-item[_ngcontent-c4] {
        float: left;
        min-width: 160px;
        margin: 2px 0 0;
        font-size: 14px;
        background-color: #fff;
        line-height: 0;
        height: 31px;
        padding: 5px 8px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        text-align: left;
        text-decoration: none;
        max-width: 100%;
        position: relative
    }

    .mat-menu-item[_ngcontent-c4]:hover {
        background: #0372b9 !important;
        color: #fff
    }

    .mat-menu-item[_ngcontent-c4] .fa-color[_ngcontent-c4] {
        color: #0c4e84 !important
    }

    .mat-tooltip {
        font-size: 12px
    }

    .pot-header[_ngcontent-c4] img[_ngcontent-c4]:first-child {
        padding-left: 37px
    }

    .mar-header[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
        -webkit-transform: translateX(-12px);
        transform: translateX(-12px)
    }

    .display[_ngcontent-c4] {
        display: inline-block;
        width: 100%
    }

    .mat-menu-content {
        padding: 0 !important
    }

    .dropdown[_ngcontent-c4] {
        position: relative;
        display: inline-block
    }

    .dropdown-content[_ngcontent-c4] {
        display: none;
        position: absolute
    }

    .dropdown-content[_ngcontent-c4] a[_ngcontent-c4],
    .dropdown-content[_ngcontent-c4] button[_ngcontent-c4] {
        display: block
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] {
        max-height: calc(55vh - 80px);
        overflow: scroll;
        display: block;
        min-width: 112px;
        max-width: 280px;
        background: #fff;
        right: 10.875px;
        width: 280px;
        align-items: flex-end;
        justify-content: flex-start
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] button[_ngcontent-c4] {
        width: 100%
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] .list-menu[_ngcontent-c4] {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis
    }

    @media all and (min-width:350px) and (max-width:430px) {
        .dropdown[_ngcontent-c4] .dropdown-dv[_ngcontent-c4] {
            left: -100px
        }
    }

    @media all and (max-width:350px) {
        .dropdown[_ngcontent-c4] .dropdown-dv[_ngcontent-c4] {
            left: -69px
        }
    }

    @media all and (max-width:1200px) {
        .button-btn[_ngcontent-c4] {
            width: auto
        }
    }

    .banner .ke-khai-nav.right {
        -webkit-transform: translateX(-12px) !important;
        transform: translateX(-12px) !important
    }

    @media (min-width:769px) {
        .mar-header[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
            margin-right: 32px
        }

        .banner .ke-khai-nav.right {
            margin-right: 32px
        }
    }

    .banner .ke-khai-nav button.btn.button-btn.mat-button {
        text-align: right
    }

</style>
<style>
    .menu-left[_ngcontent-c5] {
        display: none
    }

    @media only screen and (max-width:767px) {
        .menu-left[_ngcontent-c5] {
            background-color: #efefef;
            width: 200px;
            height: 812px;
            display: block !important;
            position: fixed;
            left: -200px;
            color: #06274f;
            top: 64px;
            z-index: 999;
            transition-delay: 20ms;
            -webkit-animation-duration: .5s;
            animation-duration: .5s
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5]:first-child {
            background: #0780d3;
            width: 250px;
            height: 41px;
            margin-top: -5px;
            transition: .5s;
            -webkit-animation-duration: .5s;
            animation-duration: .5s
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5]:first-child img[_ngcontent-c5] {
            width: 15px;
            height: 19px;
            margin-right: 13px
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] {
            overflow: hidden;
            white-space: nowrap
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5] {
            padding: 0 10px;
            display: block;
            color: #06274f;
            text-align: left;
            border-radius: 0
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5] span[_ngcontent-c5] {
            padding-left: 8px
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a.active[_ngcontent-c5],
        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5]:hover {
            background-color: #0a76b1;
            height: 40px
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a.active[_ngcontent-c5] span[_ngcontent-c5],
        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5]:hover span[_ngcontent-c5] {
            color: #fff
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a.active[_ngcontent-c5] .img-show[_ngcontent-c5],
        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5]:hover .img-show[_ngcontent-c5] {
            display: none
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a.active[_ngcontent-c5] .img-hide[_ngcontent-c5],
        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5]:hover .img-hide[_ngcontent-c5] {
            display: block
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a.active[_ngcontent-c5] .mat-button-focus-overlay[_ngcontent-c5],
        .menu-left[_ngcontent-c5] li[_ngcontent-c5] a[_ngcontent-c5]:hover .mat-button-focus-overlay[_ngcontent-c5] {
            opacity: 1
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] img[_ngcontent-c5] {
            width: 20px;
            height: 20px;
            float: left;
            top: 50%;
            -webkit-transform: translateY(50%);
            transform: translateY(50%)
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] .img-hide[_ngcontent-c5] {
            display: none
        }

        .menu-left[_ngcontent-c5] li[_ngcontent-c5] button[_ngcontent-c5] {
            float: right
        }

        .open[_ngcontent-c5] {
            -webkit-animation-name: open;
            animation-name: open;
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards
        }

        .open[_ngcontent-c5] li[_ngcontent-c5]:first-child {
            width: 200px
        }

        @-webkit-keyframes open {
            from {
                left: -200px
            }

            to {
                left: 0
            }
        }

        @keyframes open {
            from {
                left: -200px
            }

            to {
                left: 0
            }
        }

        .close[_ngcontent-c5] {
            opacity: 1;
            font-size: 13px;
            font-weight: 400;
            -webkit-animation-name: close;
            animation-name: close;
            -webkit-animation-duration: .5s;
            animation-duration: .5s
        }

        @-webkit-keyframes close {
            from {
                left: 0
            }

            to {
                left: -200px
            }
        }

        @keyframes close {
            from {
                left: 0
            }

            to {
                left: -200px
            }
        }
    }

</style>
<style>
    #footer[_ngcontent-c7] {
        bottom: 0;
        width: 100%;
        height: auto;
        background: #142b50;
        font-size: 14px;
        line-height: 1.42857143
    }

    .footer[_ngcontent-c7] {
        padding: 10px 0
    }

    .footer[_ngcontent-c7] p[_ngcontent-c7] {
        color: #fff;
        margin-bottom: 0
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] {
        padding: 0;
        text-align: right;
        margin-top: 3px
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] li[_ngcontent-c7] {
        display: inline-block;
        padding: 5px 3px
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] li[_ngcontent-c7] img[_ngcontent-c7] {
        height: 25px
    }

    .footer[_ngcontent-c7] .trusted-box[_ngcontent-c7] {
        text-align: right
    }

    @media (max-width:1000px) {
        .footer[_ngcontent-c7] {
            padding: 10px
        }
    }

    @media (max-width:768px) {

        .footer[_ngcontent-c7],
        .footer[_ngcontent-c7] .trusted-box[_ngcontent-c7],
        .footer[_ngcontent-c7] ul[_ngcontent-c7] {
            text-align: center
        }
    }

</style>
<style>
    a[_ngcontent-c13],
    a[_ngcontent-c13]:active,
    a[_ngcontent-c13]:focus,
    a[_ngcontent-c13]:hover,
    a[_ngcontent-c13]:link {
        text-decoration: none
    }

    ul[_ngcontent-c13] {
        list-style-type: none;
        margin-bottom: 0
    }

    @font-face {
        font-family: MYRIADPRO_BOLD;
        src: url(MYRIADPRO_BOLD.2cf8f410e326366c0ba1.OTF)
    }

    @font-face {
        font-family: UTM_Avo;
        src: url(UTM_Avo.5b5fcc354ed196046001.ttf)
    }

    #content[_ngcontent-c13] {
        font-size: 14px;
        line-height: 1.42857143
    }

    .banner[_ngcontent-c13] {
        position: relative
    }

    .banner[_ngcontent-c13] .banner-img[_ngcontent-c13] {
        background-size: cover;
        display: block;
        margin: auto;
        padding: 0
    }

    .banner[_ngcontent-c13] .menu[_ngcontent-c13] {
        position: absolute;
        top: 47%;
        z-index: 1;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .banner[_ngcontent-c13] .boc-banner[_ngcontent-c13] {
        background: linear-gradient(to right, #20293e, #121825)
    }

    .ul-menu[_ngcontent-c13] {
        text-align: center
    }

    .ul-menu[_ngcontent-c13] li[_ngcontent-c13] {
        height: 116px;
        background: #113160;
        border-top: 4px solid #58a7f7;
        width: calc((100% / 3) - 6px);
        display: inline-block;
        position: relative;
        z-index: 1;
        margin-right: 3px
    }

    .ul-menu[_ngcontent-c13] li[_ngcontent-c13] img[_ngcontent-c13] {
        height: 45px;
        margin: 30px auto 0;
        display: block
    }

    .ul-menu[_ngcontent-c13] li[_ngcontent-c13]:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: top center;
        transform-origin: top center;
        background: #0f91ea;
        z-index: -1;
        transition: transform .3s;
        transition: transform .3s, -webkit-transform .3s
    }

    .ul-menu[_ngcontent-c13] li[_ngcontent-c13]:hover::after {
        -webkit-transform: scaleY(1);
        transform: scaleY(1)
    }

    ._ivan[_ngcontent-c13] {
        background: #f2f2f2;
        padding-top: 90px;
        padding-bottom: 30px
    }

    ._ivan[_ngcontent-c13] ul[_ngcontent-c13] {
        margin-top: 30px
    }

    ._ivan[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
        box-shadow: 2px -2px 5px 0 rgba(96, 96, 96, .2);
        display: inline-block;
        background: #fff;
        margin-left: 4px;
        margin-bottom: 8px;
        padding: 0 10px;
        width: calc((100% / 4) - 7px)
    }

    @media (max-width:767px) {
        ._ivan[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            width: calc((100% / 2) - 7px)
        }
    }

    @media (max-width:500px) {
        ._ivan[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            margin-left: 0;
            width: 100%
        }
    }

    .p-title[_ngcontent-c13] {
        font-family: UTM_Avo;
        font-size: 22px;
        text-align: center
    }

    .mar-top-30[_ngcontent-c13] {
        margin-top: 30px
    }

    .mar-top-button-10[_ngcontent-c13] {
        margin: 10px 0
    }

    ._thu-so[_ngcontent-c13] {
        padding-top: 2px;
        background: #fff;
        padding-bottom: 50px
    }

    ._thu-so[_ngcontent-c13] ul[_ngcontent-c13] {
        margin-top: 30px
    }

    ._thu-so[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
        box-shadow: none;
        display: inline-block;
        background: #fff;
        margin-left: 4px;
        margin-bottom: 8px;
        padding: 0 10px;
        width: calc((100% / 4) - 7px)
    }

    @media (max-width:767px) {
        ._thu-so[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            width: calc((100% / 2) - 7px)
        }
    }

    @media (max-width:500px) {
        ._thu-so[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            margin-left: 0;
            width: 100%
        }
    }

    ._chuc-nang[_ngcontent-c13] {
        background: #efefef
    }

    ._chuc-nang[_ngcontent-c13] ul[_ngcontent-c13] {
        margin-top: 30px
    }

    ._chuc-nang[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
        box-shadow: none;
        display: inline-block;
        width: calc((100% / 4) - 7px)
    }

    @media (max-width:767px) and (min-width:501px) {
        ._chuc-nang[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            width: calc((100% / 2) - 7px);
            margin-bottom: 4px
        }
    }

    @media (max-width:500px) {
        ._chuc-nang[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
            margin-left: 0;
            width: 100%
        }
    }

    .newDot[_ngcontent-c13] {
        padding-right: 0;
        float: right
    }

    .newDot[_ngcontent-c13] li[_ngcontent-c13] {
        border: 0;
        width: 12px;
        height: 12px;
        background-color: #e0e0e0;
        border-radius: 12px;
        margin: 3px;
        cursor: pointer;
        float: left
    }

    .newDot[_ngcontent-c13] li[_ngcontent-c13] [_ngcontent-c13]:last-child {
        margin-right: 0
    }

    .boc-message[_ngcontent-c13] {
        background: #fff;
        height: 40px;
        font-family: UTM_Avo;
        margin-right: auto;
        margin-left: auto;
        position: static
    }

    .boc-message[_ngcontent-c13] .left[_ngcontent-c13] {
        float: left
    }

    .boc-message[_ngcontent-c13] .right[_ngcontent-c13] {
        text-align: right
    }

    .boc-message[_ngcontent-c13] .flex-unset[_ngcontent-c13] {
        flex-wrap: unset
    }

    .boc-message[_ngcontent-c13] .flex-unset[_ngcontent-c13] .col-sm-12[_ngcontent-c13] {
        flex: auto
    }

    .slick-slide[_ngcontent-c13] img[_ngcontent-c13] {
        width: 100%
    }

    .slide-list[_ngcontent-c13] .content[_ngcontent-c13] {
        height: auto
    }

    @media (max-width:768px) {
        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] {
            height: 65px
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] img[_ngcontent-c13] {
            margin-top: 18px;
            height: 28px
        }

        .boc-message[_ngcontent-c13] {
            height: 60px
        }

        .p-title[_ngcontent-c13] {
            font-size: 14px
        }

        .banner[_ngcontent-c13] .banner-img[_ngcontent-c13] {
            width: 100% !important;
            height: auto !important
        }

        .banner[_ngcontent-c13] .menu[_ngcontent-c13] {
            top: 40%
        }

        .slick-slide[_ngcontent-c13] {
            height: auto !important
        }
    }

    @media (max-width:1000px) {
        .banner[_ngcontent-c13] .banner-img[_ngcontent-c13] {
            width: 100% !important;
            height: auto !important
        }

        .banner[_ngcontent-c13] .menu[_ngcontent-c13] {
            position: relative;
            -webkit-transform: translateY(2%);
            transform: translateY(2%)
        }

        .boc-message[_ngcontent-c13] p[_ngcontent-c13] {
            font-size: 13px
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] {
            padding: 0
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] {
            width: 100%;
            height: 75px
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] img[_ngcontent-c13] {
            margin-top: 20px;
            height: 35px
        }

        .slick-slide[_ngcontent-c13] {
            height: auto !important
        }

        .p-title[_ngcontent-c13] {
            font-size: 14px
        }
    }

    @media (min-width:768px) {
        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] {
            height: 65px
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] img[_ngcontent-c13] {
            margin-top: 18px;
            height: 28px
        }

        .boc-message[_ngcontent-c13] .left[_ngcontent-c13],
        .boc-message[_ngcontent-c13] .right[_ngcontent-c13] {
            margin-top: 5px
        }

        .p-title[_ngcontent-c13] {
            font-size: 22px
        }

        .banner[_ngcontent-c13] .banner-img[_ngcontent-c13] {
            width: 100%;
            height: auto
        }

        .banner[_ngcontent-c13] .menu[_ngcontent-c13] {
            top: 60%
        }

        .slick-slide[_ngcontent-c13] {
            height: auto !important
        }
    }

    @media (min-width:992px) {
        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] {
            height: 115px
        }

        .banner-list[_ngcontent-c13] ul.ul-menu[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] img[_ngcontent-c13] {
            height: 45px;
            margin-top: 30px
        }
    }

    .bg-blue[_ngcontent-c13] {
        border-bottom: 7px solid #0372b6
    }

    .bg-green[_ngcontent-c13] {
        border-bottom: 7px solid #7bad0d
    }

    .bg-orange[_ngcontent-c13] {
        border-bottom: 7px solid #de8010
    }

    .bg-purple[_ngcontent-c13] {
        border-bottom: 7px solid #4f2699
    }

    .bg-dark-blue[_ngcontent-c13] {
        border-bottom: 7px solid #042c6a
    }

    .bg-bold-orange[_ngcontent-c13] {
        border-bottom: 7px solid #c94a30
    }

    .bg-pink[_ngcontent-c13] {
        border-bottom: 7px solid #901c6b
    }

    .bg-yellow[_ngcontent-c13] {
        border-bottom: 7px solid #f8a91b
    }

    .bg-sapphire[_ngcontent-c13] {
        border-bottom: 7px solid #008f8b
    }

    .row2-banner[_ngcontent-c13] img[_ngcontent-c13] {
        width: calc((100% / 5) * 3.3)
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] {
        display: flex;
        justify-content: center
    }

    @media (max-width:768px) {
        .menu[_ngcontent-c13] .block[_ngcontent-c13] {
            position: absolute;
            margin: auto;
            width: 96%
        }

        ._ivan[_ngcontent-c13] {
            padding-top: 210px
        }
    }

    .block[_ngcontent-c13] .name-chartpie[_ngcontent-c13] {
        text-transform: uppercase;
        font-size: 13px;
        color: #5ed6fc;
        text-align: center;
        font-weight: 600;
        padding: 15px 5px 5px
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .name-chartpie[_ngcontent-c13] .line[_ngcontent-c13] {
        height: 1px;
        background: #5ed6fc;
        margin: 8px 42px
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13],
    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block3[_ngcontent-c13] {
        height: 292px;
        background: rgba(4, 48, 84, .8);
        width: 332px;
        margin: 0 36px
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] {
        margin-right: 15px !important
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] {
        flex-wrap: nowrap;
        border-bottom: 0;
        position: relative
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13]:after {
        content: "";
        position: absolute;
        height: 1px;
        right: 15px;
        left: 15px;
        background: #5ed6fc;
        bottom: 0
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
        flex: 1;
        height: 53px;
        align-items: center;
        justify-content: center;
        display: flex
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
        color: #5ed6fc;
        font-size: 12px;
        text-transform: uppercase;
        background: 0 0;
        border: 0;
        padding: 16px 10px 10px;
        height: 100%;
        text-align: center;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        line-height: 18px
    }

    @media (max-width:992px) {
        .menu[_ngcontent-c13] .block[_ngcontent-c13] {
            margin: auto
        }

        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13],
        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block3[_ngcontent-c13] {
            width: 48%;
            margin: 5px 0 20px
        }

        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
            font-size: 14px
        }
    }

    @media (max-width:767px) {
        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
            font-size: 12px
        }
    }

    @media (width:1024px) {
        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
            font-size: 10px;
            padding: 5px
        }
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13]:hover {
        border: 0
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] a.active[_ngcontent-c13] {
        background: rgba(94, 214, 252, .2);
        border-radius: 0;
        color: #fff
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .tiepnhan[_ngcontent-c13] {
        display: flex;
        justify-content: space-around;
        margin-top: 45px
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .tiepnhan[_ngcontent-c13] h4[_ngcontent-c13] {
        margin-top: 12px !important
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .item[_ngcontent-c13] {
        color: #fff;
        text-align: center
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .item[_ngcontent-c13] .name[_ngcontent-c13] {
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 600
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .item[_ngcontent-c13] h4[_ngcontent-c13] {
        font-size: 25px;
        margin: 0;
        font-weight: 700
    }

    .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13] .tab-content[_ngcontent-c13] .item[_ngcontent-c13] .text[_ngcontent-c13] {
        font-size: 14px
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] {
        padding: 2px 20px;
        margin: auto;
        width: 300px
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] {
        display: flex;
        justify-content: space-between
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] {
        flex: 1;
        color: #fff;
        font-size: 10px;
        display: flex;
        align-items: center;
        white-space: nowrap;
        line-height: 19px;
        font-weight: 600;
        margin-right: 10px
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color[_ngcontent-c13] {
        height: 9px;
        width: 9px;
        border-radius: 50%;
        margin: 0 2px 0 0
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_1[_ngcontent-c13] {
        background: #ff7712
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_2[_ngcontent-c13] {
        background: #d8001f
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_3[_ngcontent-c13] {
        background: #a40bf4
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_4[_ngcontent-c13] {
        background: #00ffbc
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_5[_ngcontent-c13] {
        background: #1569ff
    }

    .block[_ngcontent-c13] .block3[_ngcontent-c13] .chuthich[_ngcontent-c13] ul[_ngcontent-c13] li[_ngcontent-c13] .color_6[_ngcontent-c13] {
        background: #00a8ba
    }

    @media (max-width:1000px) {
        .row2-banner[_ngcontent-c13] img[_ngcontent-c13] {
            width: 112%;
            margin-bottom: 20px;
            -webkit-transform: translateX(-5%);
            transform: translateX(-5%)
        }

        .menu[_ngcontent-c13] .block[_ngcontent-c13] {
            display: contents
        }

        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block1[_ngcontent-c13],
        .menu[_ngcontent-c13] .block[_ngcontent-c13] .block3[_ngcontent-c13] {
            width: 100%;
            background: #113160
        }

        ._ivan[_ngcontent-c13] {
            padding-top: 30px
        }
    }

    .box-logo[_ngcontent-c13] {
        text-align: center
    }

    .box-logo[_ngcontent-c13] img[_ngcontent-c13] {
        max-width: 198px;
        max-height: 75px
    }

</style>

<style type="text/css">
    .yhy-append-wrap {
        overflow: hidden;
        width: 100%;
        height: 40px;
        padding-top: 10px;
    }

    .yhy-append {
        display: flex;
        align-items: center;
    }

    .yhy-append .yhy-append-btn {
        display: flex;
        align-items: center;
        margin-right: 5px;
        padding: 5px 8px;
        background: #EC3237;
        box-shadow: 0px -1px 30px rgb(0 0 0 / 15%);
        border-radius: 10px 10px 0px 0px;
        border: 0;
        font-family: 'Arial';
        cursor: pointer;
        text-decoration: none;
    }

    .yhy-append .yhy-append-icon {
        width: 24px;
        height: 24px;
    }

    .yhy-append .yhy-append-icon {
        width: 24px;
        height: 24px;
    }

    .yhy-append .yhy-btn-btttt .yhy-append-icon {
        width: 28px;
        height: 26px;
    }

    .yhy-append .yhy-btn-btttt .append-icon>img {
        width: 100%;
    }

    .yhy-append .yhy-btn-emc .yhy-append-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
        border-radius: 50%;
    }

    .yhy-append .yhy-append-txt {
        margin-left: 5px;
        font-size: 14px;
        line-height: 16px;
        color: #FFFFFF;
    }

</style>
<style>
    .mat-progress-bar[_ngcontent-c0] {
        position: fixed;
        z-index: 99999
    }

</style>
<style>
    .banner[_ngcontent-c4] {
        background: url(nen_bg.7372f84cd18d17a5e229.jpg) center center/cover no-repeat;
        height: 80px;
        padding: 5px 0;
        width: 100%
    }

    @media screen and (min-width:576px) and (max-width:767px) {
        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            max-width: none
        }
    }

    @media screen and (min-width:768px) and (max-width:1200px) {
        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            max-width: 95%
        }
    }

    @media only screen and (max-width:600px) {
        .banner[_ngcontent-c4] {
            padding: 0;
            background: url(data:image/png;base64,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) center center no-repeat;
            height: 60px;
            z-index: 999
        }
    }

    .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:first-child {
        height: 70px;
        padding-top: 7px;
        padding-bottom: 7px
    }

    .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:last-child {
        display: none
    }

    @media only screen and (max-width:767px) {
        .banner[_ngcontent-c4] {
            padding: 0;
            background: url(data:image/png;base64,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) center center no-repeat;
            height: 60px;
            z-index: 999
        }

        .banner[_ngcontent-c4] .container[_ngcontent-c4] {
            padding-left: 10px;
            padding-right: 10px
        }

        .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:first-child {
            display: none
        }

        .banner[_ngcontent-c4] .left[_ngcontent-c4] a[_ngcontent-c4] img[_ngcontent-c4]:last-child {
            display: inline-block;
            height: 46px;
            margin-top: 5px
        }
    }

    .banner[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
        padding: 0;
        text-align: right;
        margin-bottom: 0;
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: 999998
    }

    .banner[_ngcontent-c4] .right[_ngcontent-c4] .sub-nav[_ngcontent-c4] {
        display: inline-block;
        padding-top: 12px;
        padding-right: 1px
    }

    .button-btn[_ngcontent-c4] {
        width: 300px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis
    }

    .btn[_ngcontent-c4] {
        color: #fff
    }

    .btn[_ngcontent-c4]:first-child .maDonVi[_ngcontent-c4] {
        display: none
    }

    @media only screen and (max-width:1199px) {
        .btn[_ngcontent-c4]:first-child .donVi[_ngcontent-c4] {
            display: none
        }

        .btn[_ngcontent-c4]:first-child .maDonVi[_ngcontent-c4] {
            display: inline-block
        }

        .btn[_ngcontent-c4] .idAccount[_ngcontent-c4] {
            display: none !important
        }
    }

    .banner[_ngcontent-c4] .right[_ngcontent-c4] ul[_ngcontent-c4] li[_ngcontent-c4] a[_ngcontent-c4] {
        color: #fff
    }

    .mat-menu-item[_ngcontent-c4] {
        float: left;
        min-width: 160px;
        margin: 2px 0 0;
        font-size: 14px;
        background-color: #fff;
        line-height: 0;
        height: 31px;
        padding: 5px 8px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        text-align: left;
        text-decoration: none;
        max-width: 100%;
        position: relative
    }

    .mat-menu-item[_ngcontent-c4]:hover {
        background: #0372b9 !important;
        color: #fff
    }

    .mat-menu-item[_ngcontent-c4] .fa-color[_ngcontent-c4] {
        color: #0c4e84 !important
    }

    .mat-tooltip {
        font-size: 12px
    }

    .pot-header[_ngcontent-c4] img[_ngcontent-c4]:first-child {
        padding-left: 37px
    }

    .mar-header[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
        -webkit-transform: translateX(-12px);
        transform: translateX(-12px)
    }

    .display[_ngcontent-c4] {
        display: inline-block;
        width: 100%
    }

    .mat-menu-content {
        padding: 0 !important
    }

    .dropdown[_ngcontent-c4] {
        position: relative;
        display: inline-block
    }

    .dropdown-content[_ngcontent-c4] {
        display: none;
        position: absolute
    }

    .dropdown-content[_ngcontent-c4] a[_ngcontent-c4],
    .dropdown-content[_ngcontent-c4] button[_ngcontent-c4] {
        display: block
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] {
        max-height: calc(55vh - 80px);
        overflow: scroll;
        display: block;
        min-width: 112px;
        max-width: 280px;
        background: #fff;
        right: 10.875px;
        width: 280px;
        align-items: flex-end;
        justify-content: flex-start
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] button[_ngcontent-c4] {
        width: 100%
    }

    .dropdown[_ngcontent-c4]:hover .dropdown-content[_ngcontent-c4] .list-menu[_ngcontent-c4] {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis
    }

    @media all and (min-width:350px) and (max-width:430px) {
        .dropdown[_ngcontent-c4] .dropdown-dv[_ngcontent-c4] {
            left: -100px
        }
    }

    @media all and (max-width:350px) {
        .dropdown[_ngcontent-c4] .dropdown-dv[_ngcontent-c4] {
            left: -69px
        }
    }

    @media all and (max-width:1200px) {
        .button-btn[_ngcontent-c4] {
            width: auto
        }
    }

    .banner .ke-khai-nav.right {
        -webkit-transform: translateX(-12px) !important;
        transform: translateX(-12px) !important
    }

    @media (min-width:769px) {
        .mar-header[_ngcontent-c4] .ke-khai-nav.right[_ngcontent-c4] {
            margin-right: 32px
        }

        .banner .ke-khai-nav.right {
            margin-right: 32px
        }
    }

    .banner .ke-khai-nav button.btn.button-btn.mat-button {
        text-align: right
    }

</style>
<style>
    #footer[_ngcontent-c7] {
        bottom: 0;
        width: 100%;
        height: auto;
        background: #142b50;
        font-size: 14px;
        line-height: 1.42857143
    }

    .footer[_ngcontent-c7] {
        padding: 10px 0
    }

    .footer[_ngcontent-c7] p[_ngcontent-c7] {
        color: #fff;
        margin-bottom: 0
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] {
        padding: 0;
        text-align: right;
        margin-top: 3px
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] li[_ngcontent-c7] {
        display: inline-block;
        padding: 5px 3px
    }

    .footer[_ngcontent-c7] ul[_ngcontent-c7] li[_ngcontent-c7] img[_ngcontent-c7] {
        height: 25px
    }

    .footer[_ngcontent-c7] .trusted-box[_ngcontent-c7] {
        text-align: right
    }

    @media (max-width:1000px) {
        .footer[_ngcontent-c7] {
            padding: 10px
        }
    }

    @media (max-width:768px) {

        .footer[_ngcontent-c7],
        .footer[_ngcontent-c7] .trusted-box[_ngcontent-c7],
        .footer[_ngcontent-c7] ul[_ngcontent-c7] {
            text-align: center
        }
    }

</style>
<style>
    .widget-title[_ngcontent-c13] h1[_ngcontent-c13],
    .widget-title[_ngcontent-c13] h2[_ngcontent-c13] {
        font: 18px/30px arial;
        color: #1d70b7;
        margin: 0;
        padding-bottom: 5px
    }

    .pl20[_ngcontent-c13] {
        padding-left: 20px
    }

    .thongbao[_ngcontent-c13] li[_ngcontent-c13]:first-child {
        border: 0
    }

    .gioithieu[_ngcontent-c13] li[_ngcontent-c13] {
        border-bottom: 1px dotted #d1d1d1 !important;
        padding: 5px 0 !important
    }

    .gioithieu[_ngcontent-c13] li[_ngcontent-c13]:last-child {
        border-bottom: 0 !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
        color: #575756
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li.active[_ngcontent-c13] a[_ngcontent-c13],
    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13]:hover a[_ngcontent-c13] {
        color: #1d70b7;
        font-family: Roboto_Bold, sans-serif
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] ul.gt-sub[_ngcontent-c13] {
        padding: 0;
        list-style-type: none
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] ul.gt-sub[_ngcontent-c13] li[_ngcontent-c13]:before {
        width: 0;
        height: 0
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] ul.gt-sub[_ngcontent-c13] li[_ngcontent-c13]:first-child {
        border-top: 1px dotted #d1d1d1 !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] ul.gt-sub[_ngcontent-c13] li[_ngcontent-c13] {
        padding-left: 30px !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c13] li[_ngcontent-c13] ul.gt-sub[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
        font-family: Roboto_Regular;
        color: #575756
    }

    .thongbao.hoatdong[_ngcontent-c13] li[_ngcontent-c13]:first-child:before {
        height: 0;
        width: 0
    }

    .thongbao.hoatdong[_ngcontent-c13] li[_ngcontent-c13]:before {
        position: relative;
        height: 5px;
        width: 2px;
        content: "";
        color: #2d8fad;
        float: left;
        padding-right: 6px;
        background-image: url("data:image/svg+xml,%3Csvg id%3D%22Layer_1%22 data-name%3D%22Layer 1%22 xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox%3D%220 0 3.5 3.5%22%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill%3A%238b0304%3B%7D%3C%2Fstyle%3E%3C%2Fdefs%3E%3Ctitle%3Ehinh_vuong_do%3C%2Ftitle%3E%3Crect class%3D%22cls-1%22 width%3D%223.5%22 height%3D%223.5%22%2F%3E%3C%2Fsvg%3E");
        top: 23px;
        margin-right: 8px
    }

    .thongbao.hoatdong.ul-none-border[_ngcontent-c13] li[_ngcontent-c13]:before {
        position: relative;
        height: 11px;
        width: 7px;
        content: "";
        color: #2d8fad;
        float: left;
        padding-right: 6px;
        background-image: url("data:image/svg+xml,%3Csvg id%3D%22Layer_1%22 data-name%3D%22Layer 1%22 xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox%3D%220 0 4.35 6.94%22%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill%3A%23be1e2d%3B%7D%3C%2Fstyle%3E%3C%2Fdefs%3E%3Ctitle%3Emui_ten_do%3C%2Ftitle%3E%3Cpath class%3D%22cls-1%22 d%3D%22M.05%2C4.32V.61C.05.14.29-.05.58.19l1.23%2C1L2.86%2C2%2C4.08%2C3a.53.53%2C0%2C0%2C1%2C0%2C.86l-1.22%2C1L1.8%2C5.75l-1.23%2C1c-.29.24-.53%2C0-.53-.43Z%22%2F%3E%3C%2Fsvg%3E");
        top: 4px;
        margin-right: 8px
    }

    .thongbao.hoatdong.ul-none-border[_ngcontent-c13] li[_ngcontent-c13] a[_ngcontent-c13] {
        color: #1d70b7
    }

    .margin-bottom-20[_ngcontent-c13] {
        margin-bottom: 20px
    }

    .margin-bottom-10[_ngcontent-c13] {
        margin-bottom: 10px
    }

    .btn.btn-primary.dangky[_ngcontent-c13] {
        font-size: 15px;
        padding: 15px 20px;
        margin: 0 40px 50px 0
    }

    @media (max-width:768px) {
        .btn.btn-primary.dangky[_ngcontent-c13] {
            margin: 0 40px 50px 0
        }
    }

    .control-label[_ngcontent-c13] {
        text-align: right;
        line-height: 30px
    }

    @media (min-width:992px) and (max-width:1199px) {
        .control-label[_ngcontent-c13] {
            line-height: 2.5em
        }
    }

    @media (min-width:768px) and (max-width:991px) {
        .control-label[_ngcontent-c13] {
            line-height: 2.5em
        }
    }

    @media (max-width:767px) {
        .control-label[_ngcontent-c13] {
            text-align: left
        }
    }

    .alert-msg[_ngcontent-c13] {
        margin-top: -14px;
        padding-left: 14px;
        color: red;
        margin-bottom: 15px;
        font-size: .9em
    }

    .w100[_ngcontent-c13] {
        width: 100%
    }

    legend[_ngcontent-c13] {
        font-size: 1.3em
    }

    [type=checkbox][_ngcontent-c13],
    [type=radio][_ngcontent-c13] {
        box-sizing: border-box;
        padding: 0;
        cursor: pointer;
        position: relative;
        top: 2px
    }

    .form-inline[_ngcontent-c13] {
        text-align: justify
    }

    .form-check[_ngcontent-c13] {
        margin-bottom: .25rem
    }

    .form-check-label[_ngcontent-c13] {
        padding-left: 0;
        margin-bottom: 0;
        margin-top: 3px;
        text-align: justify
    }

    .form-check-input[_ngcontent-c13] {
        margin-top: .25rem;
        margin-left: 0
    }

    .selectedCoQuan[_ngcontent-c13] {
        margin-right: 15px;
        padding: 8px;
        background: #f8f8ff
    }

    .mat-radio-button[_ngcontent-c13] {
        display: block
    }

    .register[_ngcontent-c13] .form-doituong-cn-cq[_ngcontent-c13] {
        margin-bottom: 30px
    }

    .register[_ngcontent-c13] .form-doituong-cn-cq[_ngcontent-c13] .form-doituong[_ngcontent-c13] {
        width: 200px;
        margin: auto
    }

    .msbhxh-input[_ngcontent-c13] .mat-icon-button[_ngcontent-c13] {
        background-color: #fff;
        margin-right: 0
    }

    .hdsd-container[_ngcontent-c13] {
        background-color: rgba(0, 0, 0, .025);
        padding: 12px 20px
    }

    .hdsd-box[_ngcontent-c13] {
        max-width: 500px;
        margin: auto
    }

    .hdsd-box.hdsd-title[_ngcontent-c13] {
        border-bottom: 1px solid rgba(0, 0, 0, .12);
        padding-bottom: 3px;
        margin: 20px 0;
        max-width: 100%
    }

    .hdsd-box[_ngcontent-c13] p[_ngcontent-c13] {
        overflow: auto
    }

    .hdsd-box[_ngcontent-c13] p[_ngcontent-c13] img[_ngcontent-c13] {
        width: 100%;
        max-width: 500px
    }

    .docs-api-h3[_ngcontent-c13] {
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        margin: auto;
        padding-bottom: 3px;
        text-transform: uppercase;
        max-width: 500px
    }

    .docs-api-h4[_ngcontent-c13] {
        font-weight: 600;
        font-size: 16px
    }

    img.fill[_ngcontent-c13] {
        -o-object-fit: fill;
        object-fit: fill
    }

    img.contain[_ngcontent-c13] {
        -o-object-fit: contain;
        object-fit: contain
    }

    img.cover[_ngcontent-c13] {
        -o-object-fit: cover;
        object-fit: cover
    }

    img.scale-down[_ngcontent-c13] {
        -o-object-fit: scale-down;
        object-fit: scale-down
    }

    img.none[_ngcontent-c13] {
        -o-object-fit: none;
        object-fit: none
    }

</style>
<style>
    .mat-stepper-horizontal,
    .mat-stepper-vertical {
        display: block
    }

    .mat-horizontal-stepper-header-container {
        white-space: nowrap;
        display: flex;
        align-items: center
    }

    .mat-stepper-horizontal-line {
        border-top-width: 1px;
        border-top-style: solid;
        flex: auto;
        height: 0;
        margin: 0 -16px;
        min-width: 32px
    }

    .mat-horizontal-stepper-header {
        display: flex;
        height: 72px;
        overflow: hidden;
        align-items: center;
        padding: 0 24px
    }

    .mat-horizontal-stepper-header .mat-step-icon,
    .mat-horizontal-stepper-header .mat-step-icon-not-touched {
        margin-right: 8px;
        flex: none
    }

    [dir=rtl] .mat-horizontal-stepper-header .mat-step-icon,
    [dir=rtl] .mat-horizontal-stepper-header .mat-step-icon-not-touched {
        margin-right: 0;
        margin-left: 8px
    }

    .mat-vertical-stepper-header {
        display: flex;
        align-items: center;
        padding: 24px;
        max-height: 24px
    }

    .mat-vertical-stepper-header .mat-step-icon,
    .mat-vertical-stepper-header .mat-step-icon-not-touched {
        margin-right: 12px
    }

    [dir=rtl] .mat-vertical-stepper-header .mat-step-icon,
    [dir=rtl] .mat-vertical-stepper-header .mat-step-icon-not-touched {
        margin-right: 0;
        margin-left: 12px
    }

    .mat-horizontal-stepper-content[aria-expanded=false] {
        height: 0;
        overflow: hidden
    }

    .mat-horizontal-content-container {
        overflow: hidden;
        padding: 0 24px 24px 24px
    }

    .mat-vertical-content-container {
        margin-left: 36px;
        border: 0;
        position: relative
    }

    [dir=rtl] .mat-vertical-content-container {
        margin-left: 0;
        margin-right: 36px
    }

    .mat-stepper-vertical-line::before {
        content: '';
        position: absolute;
        top: -16px;
        bottom: -16px;
        left: 0;
        border-left-width: 1px;
        border-left-style: solid
    }

    [dir=rtl] .mat-stepper-vertical-line::before {
        left: auto;
        right: 0
    }

    .mat-vertical-stepper-content {
        overflow: hidden
    }

    .mat-vertical-content {
        padding: 0 24px 24px 24px
    }

    .mat-step:last-child .mat-vertical-content-container {
        border: none
    }

</style>
<style>
    .mat-radio-button {
        display: inline-block;
        -webkit-tap-highlight-color: transparent
    }

    .mat-radio-label {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
        vertical-align: middle
    }

    .mat-radio-container {
        box-sizing: border-box;
        display: inline-block;
        position: relative;
        width: 20px;
        height: 20px;
        flex-shrink: 0
    }

    .mat-radio-outer-circle {
        box-sizing: border-box;
        height: 20px;
        left: 0;
        position: absolute;
        top: 0;
        transition: border-color ease 280ms;
        width: 20px;
        border-width: 2px;
        border-style: solid;
        border-radius: 50%
    }

    ._mat-animation-noopable .mat-radio-outer-circle {
        transition: none
    }

    .mat-radio-inner-circle {
        border-radius: 50%;
        box-sizing: border-box;
        height: 20px;
        left: 0;
        position: absolute;
        top: 0;
        transition: transform ease 280ms, background-color ease 280ms;
        width: 20px;
        transform: scale(.001)
    }

    ._mat-animation-noopable .mat-radio-inner-circle {
        transition: none
    }

    .mat-radio-checked .mat-radio-inner-circle {
        transform: scale(.5)
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-radio-checked .mat-radio-inner-circle {
            border: solid 10px
        }
    }

    .mat-radio-label-content {
        display: inline-block;
        order: 0;
        line-height: inherit;
        padding-left: 8px;
        padding-right: 0
    }

    [dir=rtl] .mat-radio-label-content {
        padding-right: 8px;
        padding-left: 0
    }

    .mat-radio-label-content.mat-radio-label-before {
        order: -1;
        padding-left: 0;
        padding-right: 8px
    }

    [dir=rtl] .mat-radio-label-content.mat-radio-label-before {
        padding-right: 0;
        padding-left: 8px
    }

    .mat-radio-disabled,
    .mat-radio-disabled .mat-radio-label {
        cursor: default
    }

    .mat-radio-ripple {
        position: absolute;
        left: calc(50% - 25px);
        top: calc(50% - 25px);
        height: 50px;
        width: 50px;
        z-index: 1;
        pointer-events: none
    }

</style>
<style>
    .mat-button,
    .mat-flat-button,
    .mat-icon-button,
    .mat-stroked-button {
        box-sizing: border-box;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        display: inline-block;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: baseline;
        text-align: center;
        margin: 0;
        min-width: 88px;
        line-height: 36px;
        padding: 0 16px;
        border-radius: 2px;
        overflow: visible
    }

    .mat-button::-moz-focus-inner,
    .mat-flat-button::-moz-focus-inner,
    .mat-icon-button::-moz-focus-inner,
    .mat-stroked-button::-moz-focus-inner {
        border: 0
    }

    .mat-button[disabled],
    .mat-flat-button[disabled],
    .mat-icon-button[disabled],
    .mat-stroked-button[disabled] {
        cursor: default
    }

    .mat-button.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-button.cdk-program-focused .mat-button-focus-overlay,
    .mat-flat-button.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-flat-button.cdk-program-focused .mat-button-focus-overlay,
    .mat-icon-button.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-icon-button.cdk-program-focused .mat-button-focus-overlay,
    .mat-stroked-button.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-stroked-button.cdk-program-focused .mat-button-focus-overlay {
        opacity: 1
    }

    .mat-button::-moz-focus-inner,
    .mat-flat-button::-moz-focus-inner,
    .mat-icon-button::-moz-focus-inner,
    .mat-stroked-button::-moz-focus-inner {
        border: 0
    }

    .mat-button .mat-button-focus-overlay,
    .mat-icon-button .mat-button-focus-overlay {
        opacity: 0
    }

    .mat-button:hover .mat-button-focus-overlay,
    .mat-stroked-button:hover .mat-button-focus-overlay {
        opacity: 1
    }

    @media (hover:none) {

        .mat-button:hover .mat-button-focus-overlay,
        .mat-stroked-button:hover .mat-button-focus-overlay {
            opacity: 0
        }
    }

    .mat-raised-button {
        box-sizing: border-box;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        display: inline-block;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: baseline;
        text-align: center;
        margin: 0;
        min-width: 88px;
        line-height: 36px;
        padding: 0 16px;
        border-radius: 2px;
        overflow: visible;
        transform: translate3d(0, 0, 0);
        transition: background .4s cubic-bezier(.25, .8, .25, 1), box-shadow 280ms cubic-bezier(.4, 0, .2, 1)
    }

    .mat-raised-button::-moz-focus-inner {
        border: 0
    }

    .mat-raised-button[disabled] {
        cursor: default
    }

    .mat-raised-button.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-raised-button.cdk-program-focused .mat-button-focus-overlay {
        opacity: 1
    }

    .mat-raised-button::-moz-focus-inner {
        border: 0
    }

    .mat-raised-button:not([class*=mat-elevation-z]) {
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12)
    }

    ._mat-animation-noopable.mat-raised-button {
        transition: none;
        animation: none
    }

    .mat-raised-button:not([disabled]):active:not([class*=mat-elevation-z]) {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, .2), 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12)
    }

    .mat-raised-button[disabled] {
        box-shadow: none
    }

    .mat-stroked-button {
        border: 1px solid currentColor;
        padding: 0 15px;
        line-height: 34px
    }

    .mat-stroked-button:not([class*=mat-elevation-z]) {
        box-shadow: 0 0 0 0 rgba(0, 0, 0, .2), 0 0 0 0 rgba(0, 0, 0, .14), 0 0 0 0 rgba(0, 0, 0, .12)
    }

    .mat-flat-button:not([class*=mat-elevation-z]) {
        box-shadow: 0 0 0 0 rgba(0, 0, 0, .2), 0 0 0 0 rgba(0, 0, 0, .14), 0 0 0 0 rgba(0, 0, 0, .12)
    }

    .mat-fab {
        box-sizing: border-box;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        display: inline-block;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: baseline;
        text-align: center;
        margin: 0;
        min-width: 88px;
        line-height: 36px;
        padding: 0 16px;
        border-radius: 2px;
        overflow: visible;
        transform: translate3d(0, 0, 0);
        transition: background .4s cubic-bezier(.25, .8, .25, 1), box-shadow 280ms cubic-bezier(.4, 0, .2, 1);
        min-width: 0;
        border-radius: 50%;
        width: 56px;
        height: 56px;
        padding: 0;
        flex-shrink: 0
    }

    .mat-fab::-moz-focus-inner {
        border: 0
    }

    .mat-fab[disabled] {
        cursor: default
    }

    .mat-fab.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-fab.cdk-program-focused .mat-button-focus-overlay {
        opacity: 1
    }

    .mat-fab::-moz-focus-inner {
        border: 0
    }

    .mat-fab:not([class*=mat-elevation-z]) {
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12)
    }

    ._mat-animation-noopable.mat-fab {
        transition: none;
        animation: none
    }

    .mat-fab:not([disabled]):active:not([class*=mat-elevation-z]) {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, .2), 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12)
    }

    .mat-fab[disabled] {
        box-shadow: none
    }

    .mat-fab:not([class*=mat-elevation-z]) {
        box-shadow: 0 3px 5px -1px rgba(0, 0, 0, .2), 0 6px 10px 0 rgba(0, 0, 0, .14), 0 1px 18px 0 rgba(0, 0, 0, .12)
    }

    .mat-fab:not([disabled]):active:not([class*=mat-elevation-z]) {
        box-shadow: 0 7px 8px -4px rgba(0, 0, 0, .2), 0 12px 17px 2px rgba(0, 0, 0, .14), 0 5px 22px 4px rgba(0, 0, 0, .12)
    }

    .mat-fab .mat-button-wrapper {
        padding: 16px 0;
        display: inline-block;
        line-height: 24px
    }

    .mat-mini-fab {
        box-sizing: border-box;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
        border: none;
        -webkit-tap-highlight-color: transparent;
        display: inline-block;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: baseline;
        text-align: center;
        margin: 0;
        min-width: 88px;
        line-height: 36px;
        padding: 0 16px;
        border-radius: 2px;
        overflow: visible;
        transform: translate3d(0, 0, 0);
        transition: background .4s cubic-bezier(.25, .8, .25, 1), box-shadow 280ms cubic-bezier(.4, 0, .2, 1);
        min-width: 0;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        padding: 0;
        flex-shrink: 0
    }

    .mat-mini-fab::-moz-focus-inner {
        border: 0
    }

    .mat-mini-fab[disabled] {
        cursor: default
    }

    .mat-mini-fab.cdk-keyboard-focused .mat-button-focus-overlay,
    .mat-mini-fab.cdk-program-focused .mat-button-focus-overlay {
        opacity: 1
    }

    .mat-mini-fab::-moz-focus-inner {
        border: 0
    }

    .mat-mini-fab:not([class*=mat-elevation-z]) {
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12)
    }

    ._mat-animation-noopable.mat-mini-fab {
        transition: none;
        animation: none
    }

    .mat-mini-fab:not([disabled]):active:not([class*=mat-elevation-z]) {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, .2), 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12)
    }

    .mat-mini-fab[disabled] {
        box-shadow: none
    }

    .mat-mini-fab:not([class*=mat-elevation-z]) {
        box-shadow: 0 3px 5px -1px rgba(0, 0, 0, .2), 0 6px 10px 0 rgba(0, 0, 0, .14), 0 1px 18px 0 rgba(0, 0, 0, .12)
    }

    .mat-mini-fab:not([disabled]):active:not([class*=mat-elevation-z]) {
        box-shadow: 0 7px 8px -4px rgba(0, 0, 0, .2), 0 12px 17px 2px rgba(0, 0, 0, .14), 0 5px 22px 4px rgba(0, 0, 0, .12)
    }

    .mat-mini-fab .mat-button-wrapper {
        padding: 8px 0;
        display: inline-block;
        line-height: 24px
    }

    .mat-icon-button {
        padding: 0;
        min-width: 0;
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        line-height: 40px;
        border-radius: 50%
    }

    .mat-icon-button .mat-icon,
    .mat-icon-button i {
        line-height: 24px
    }

    .mat-button-focus-overlay,
    .mat-button-ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none;
        border-radius: inherit
    }

    .mat-button-focus-overlay {
        background-color: rgba(0, 0, 0, .12);
        border-radius: inherit;
        opacity: 0;
        transition: opacity .2s cubic-bezier(.35, 0, .25, 1), background-color .2s cubic-bezier(.35, 0, .25, 1)
    }

    ._mat-animation-noopable .mat-button-focus-overlay {
        transition: none
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-button-focus-overlay {
            background-color: rgba(255, 255, 255, .5)
        }
    }

    .mat-button-ripple-round {
        border-radius: 50%;
        z-index: 1
    }

    .mat-button .mat-button-wrapper>*,
    .mat-fab .mat-button-wrapper>*,
    .mat-flat-button .mat-button-wrapper>*,
    .mat-icon-button .mat-button-wrapper>*,
    .mat-mini-fab .mat-button-wrapper>*,
    .mat-raised-button .mat-button-wrapper>*,
    .mat-stroked-button .mat-button-wrapper>* {
        vertical-align: middle
    }

    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button,
    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button {
        display: block;
        font-size: inherit;
        width: 2.5em;
        height: 2.5em
    }

    @media screen and (-ms-high-contrast:active) {

        .mat-button,
        .mat-fab,
        .mat-flat-button,
        .mat-icon-button,
        .mat-mini-fab,
        .mat-raised-button {
            outline: solid 1px
        }
    }

</style>
<script charset="utf-8" src="31.0b0c46d7319ba7e2f553.js"></script>
<script charset="utf-8" src="30.54d8b0c54b2d9812fa00.js"></script>
<script charset="utf-8" src="29.3fe2e439036532af02c0.js"></script>
<style>
    .widget-title[_ngcontent-c17] h1[_ngcontent-c17],
    .widget-title[_ngcontent-c17] h2[_ngcontent-c17] {
        font: 18px/30px arial;
        color: #1d70b7;
        margin: 0;
        padding-bottom: 5px
    }

    .no-margin[_ngcontent-c17] {
        margin: 0;
        padding: 0
    }

    .pl20[_ngcontent-c17] {
        padding-left: 20px
    }

    .thongbao[_ngcontent-c17] li[_ngcontent-c17]:first-child {
        border: 0
    }

    .gioithieu[_ngcontent-c17] li[_ngcontent-c17] {
        border-bottom: 1px dotted #d1d1d1 !important;
        padding: 5px 0 !important
    }

    .gioithieu[_ngcontent-c17] li[_ngcontent-c17]:last-child {
        border-bottom: 0 !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] a[_ngcontent-c17] {
        color: #575756
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li.active[_ngcontent-c17] a[_ngcontent-c17],
    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17]:hover a[_ngcontent-c17] {
        color: #1d70b7;
        font-family: Roboto_Bold, sans-serif
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] ul.gt-sub[_ngcontent-c17] {
        padding: 0;
        list-style-type: none
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] ul.gt-sub[_ngcontent-c17] li[_ngcontent-c17]:before {
        width: 0;
        height: 0
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] ul.gt-sub[_ngcontent-c17] li[_ngcontent-c17]:first-child {
        border-top: 1px dotted #d1d1d1 !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] ul.gt-sub[_ngcontent-c17] li[_ngcontent-c17] {
        padding-left: 30px !important
    }

    .thongbao.hoatdong.ul-none-border.gioithieu[_ngcontent-c17] li[_ngcontent-c17] ul.gt-sub[_ngcontent-c17] li[_ngcontent-c17] a[_ngcontent-c17] {
        font-family: Roboto_Regular;
        color: #575756
    }

    .thongbao.hoatdong[_ngcontent-c17] li[_ngcontent-c17]:first-child:before {
        height: 0;
        width: 0
    }

    .thongbao.hoatdong[_ngcontent-c17] li[_ngcontent-c17]:before {
        position: relative;
        height: 5px;
        width: 2px;
        content: "";
        color: #2d8fad;
        float: left;
        padding-right: 6px;
        background-image: url("data:image/svg+xml,%3Csvg id%3D%22Layer_1%22 data-name%3D%22Layer 1%22 xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox%3D%220 0 3.5 3.5%22%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill%3A%238b0304%3B%7D%3C%2Fstyle%3E%3C%2Fdefs%3E%3Ctitle%3Ehinh_vuong_do%3C%2Ftitle%3E%3Crect class%3D%22cls-1%22 width%3D%223.5%22 height%3D%223.5%22%2F%3E%3C%2Fsvg%3E");
        top: 23px;
        margin-right: 8px
    }

    .thongbao.hoatdong.ul-none-border[_ngcontent-c17] li[_ngcontent-c17]:before {
        position: relative;
        height: 11px;
        width: 7px;
        content: "";
        color: #2d8fad;
        float: left;
        padding-right: 6px;
        background-image: url("data:image/svg+xml,%3Csvg id%3D%22Layer_1%22 data-name%3D%22Layer 1%22 xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox%3D%220 0 4.35 6.94%22%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill%3A%23be1e2d%3B%7D%3C%2Fstyle%3E%3C%2Fdefs%3E%3Ctitle%3Emui_ten_do%3C%2Ftitle%3E%3Cpath class%3D%22cls-1%22 d%3D%22M.05%2C4.32V.61C.05.14.29-.05.58.19l1.23%2C1L2.86%2C2%2C4.08%2C3a.53.53%2C0%2C0%2C1%2C0%2C.86l-1.22%2C1L1.8%2C5.75l-1.23%2C1c-.29.24-.53%2C0-.53-.43Z%22%2F%3E%3C%2Fsvg%3E");
        top: 4px;
        margin-right: 8px
    }

    .thongbao.hoatdong.ul-none-border[_ngcontent-c17] li[_ngcontent-c17] a[_ngcontent-c17] {
        color: #1d70b7
    }

    .margin-bottom-20[_ngcontent-c17] {
        margin-bottom: 20px
    }

    .margin-bottom-10[_ngcontent-c17] {
        margin-bottom: 10px
    }

    .btn.btn-primary.dangky[_ngcontent-c17] {
        font-size: 15px;
        padding: 15px 20px;
        margin: 0 40px 50px 0
    }

    @media (max-width:768px) {
        .btn.btn-primary.dangky[_ngcontent-c17] {
            margin: 0 40px 50px 0
        }
    }

    .control-label[_ngcontent-c17] {
        text-align: right;
        line-height: 30px
    }

    @media (min-width:992px) and (max-width:1199px) {
        .control-label[_ngcontent-c17] {
            line-height: 2.5em
        }
    }

    @media (min-width:768px) and (max-width:991px) {
        .control-label[_ngcontent-c17] {
            line-height: 2.5em
        }
    }

    @media (max-width:767px) {
        .control-label[_ngcontent-c17] {
            text-align: left
        }
    }

    .alert-msg[_ngcontent-c17] {
        margin-top: -14px;
        padding-left: 14px;
        color: red;
        margin-bottom: 15px;
        font-size: .9em
    }

    .w100[_ngcontent-c17] {
        width: 100%
    }

    legend[_ngcontent-c17] {
        font-size: 1.3em
    }

    [type=checkbox][_ngcontent-c17],
    [type=radio][_ngcontent-c17] {
        box-sizing: border-box;
        padding: 0;
        cursor: pointer;
        position: relative;
        top: 2px
    }

    .form-inline[_ngcontent-c17] {
        text-align: justify
    }

    .form-check[_ngcontent-c17] {
        margin-bottom: .25rem
    }

    .form-check-label[_ngcontent-c17] {
        padding-left: 0;
        margin-bottom: 0;
        margin-top: 3px;
        text-align: justify
    }

    .form-check-input[_ngcontent-c17] {
        margin-top: .25rem;
        margin-left: 0
    }

    .selectedCoQuan[_ngcontent-c17] {
        margin-right: 15px;
        padding: 8px;
        background: #f8f8ff
    }

    .mat-radio-button[_ngcontent-c17] {
        display: block
    }

    .register[_ngcontent-c17] .form-doituong-cn-cq[_ngcontent-c17] {
        margin-bottom: 30px
    }

    .register[_ngcontent-c17] .form-doituong-cn-cq[_ngcontent-c17] .form-doituong[_ngcontent-c17] {
        width: 200px;
        margin: auto
    }

    .msbhxh-input[_ngcontent-c17] .mat-icon-button[_ngcontent-c17] {
        background-color: #fff;
        margin-right: 0
    }

    .hd-container[_ngcontent-c17] {
        display: flex;
        flex-direction: column;
        align-items: flex-start
    }

    .hd-ava[_ngcontent-c17] {
        position: absolute;
        display: block;
        width: 130px;
        height: 143px;
        float: left;
        cursor: pointer;
        order: 2
    }

    .hd-title[_ngcontent-c17] {
        margin: auto 150px;
        float: left;
        order: 1
    }

    .cmnd-box[_ngcontent-c17] {
        margin-bottom: -25px
    }

    .cmnd-box[_ngcontent-c17] .cmnd-upload[_ngcontent-c17] {
        top: -56px
    }

    @media (max-width:768px) {
        .hd-ava[_ngcontent-c17] {
            position: relative;
            display: block;
            float: none;
            margin: 5px auto 20px
        }

        .hd-title[_ngcontent-c17] {
            margin: auto
        }

        .cmnd-box[_ngcontent-c17] {
            margin-bottom: 10px
        }

        .cmnd-box[_ngcontent-c17] .cmnd-upload[_ngcontent-c17] {
            top: 0
        }
    }

    @media (min-width:768px) {
        .giaykhaisinh[_ngcontent-c17] {
            float: right
        }
    }

    .lablegiaykhaisinh[_ngcontent-c17] {
        display: block;
        text-align: center;
        position: relative;
        padding-bottom: 2px;
        top: -88px;
        background: #fff;
        width: 85%;
        margin: auto
    }

    .captcha[_ngcontent-c17] {
        height: 61px;
        width: 335px
    }

    .captcha[_ngcontent-c17] .captcha-img[_ngcontent-c17] {
        width: calc(100% - 70px);
        display: inline-block;
        height: 100%
    }

    .captcha[_ngcontent-c17] .captcha-img[_ngcontent-c17] img[_ngcontent-c17] {
        width: 100%;
        height: 100%
    }

    .captcha[_ngcontent-c17] .refresh[_ngcontent-c17] {
        width: 60px;
        display: inline-block;
        padding-left: 10px
    }

    .icon[_ngcontent-c17] {
        height: 20px;
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px)
    }

</style>
<style>
    @media (min-width:768px) {
        .bhxh-label[_ngcontent-c19] {
            padding: 0 15px
        }

        .bhxh-label[_ngcontent-c19] .control-label[_ngcontent-c19] {
            position: relative
        }

        .bhxh-label[_ngcontent-c19] .control-label.radio-label[_ngcontent-c19] {
            bottom: .2em
        }

        .bhxh-label[_ngcontent-c19] .control-label.otp-label[_ngcontent-c19] {
            bottom: -.5em
        }

        .bhxh-label[_ngcontent-c19] .control-label.checkbox-label[_ngcontent-c19] {
            bottom: 0
        }
    }

    .control-label[_ngcontent-c19] {
        line-height: 2em
    }

    .mat-error[_ngcontent-c19] {
        position: relative;
        top: -1.6em;
        font-size: 75%;
        font-weight: 400;
        color: #e57373;
        text-align: left;
        line-height: 1.125;
        margin-top: .54166667em
    }

    .bhxh-radio[_ngcontent-c19] .mat-error[_ngcontent-c19] {
        top: -.8em
    }

    .mat-hint[_ngcontent-c19] {
        position: relative;
        top: -1.6em;
        font-size: 75%;
        text-align: left;
        line-height: 1.125;
        margin-top: .54166667em
    }

    .red.ng-star-inserted[_ngcontent-c19] {
        margin-left: 2px
    }

    .color-icon-input-file[_ngcontent-c19] {
        color: #009fe3
    }

    [_nghost-c19] .mat-form-field-readonly {
        cursor: not-allowed;
        pointer-events: none
    }

    [_nghost-c19] .mat-form-field-readonly .mat-form-field-wrapper .mat-form-field-underline {
        background-image: linear-gradient(to right, rgba(0, 0, 0, .42) 0, rgba(0, 0, 0, .42) 33%, transparent 0) !important;
        background-size: 4px 100% !important;
        background-repeat: repeat-x !important;
        background-position: 0 !important;
        background-color: transparent !important
    }

</style>
<style>
    .mat-form-field {
        display: inline-block;
        position: relative;
        text-align: left
    }

    [dir=rtl] .mat-form-field {
        text-align: right
    }

    .mat-form-field-wrapper {
        position: relative
    }

    .mat-form-field-flex {
        display: inline-flex;
        align-items: baseline;
        box-sizing: border-box;
        width: 100%
    }

    .mat-form-field-prefix,
    .mat-form-field-suffix {
        white-space: nowrap;
        flex: none;
        position: relative
    }

    .mat-form-field-infix {
        display: block;
        position: relative;
        flex: auto;
        min-width: 0;
        width: 180px
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-infix {
            border-image: linear-gradient(transparent, transparent)
        }
    }

    .mat-form-field-label-wrapper {
        position: absolute;
        left: 0;
        box-sizing: content-box;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none
    }

    .mat-form-field-label {
        position: absolute;
        left: 0;
        font: inherit;
        pointer-events: none;
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        transform-origin: 0 0;
        transition: transform .4s cubic-bezier(.25, .8, .25, 1), color .4s cubic-bezier(.25, .8, .25, 1), width .4s cubic-bezier(.25, .8, .25, 1);
        display: none
    }

    [dir=rtl] .mat-form-field-label {
        transform-origin: 100% 0;
        left: auto;
        right: 0
    }

    .mat-form-field-can-float.mat-form-field-should-float .mat-form-field-label,
    .mat-form-field-empty.mat-form-field-label {
        display: block
    }

    .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label {
        display: none
    }

    .mat-form-field-can-float .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label {
        display: block;
        transition: none
    }

    .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,
    .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label {
        display: none
    }

    .mat-form-field-can-float .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,
    .mat-form-field-can-float .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label {
        display: block
    }

    .mat-form-field-label:not(.mat-form-field-empty) {
        transition: none
    }

    .mat-form-field-underline {
        position: absolute;
        width: 100%;
        pointer-events: none;
        transform: scaleY(1.0001)
    }

    .mat-form-field-ripple {
        position: absolute;
        left: 0;
        width: 100%;
        transform-origin: 50%;
        transform: scaleX(.5);
        opacity: 0;
        transition: background-color .3s cubic-bezier(.55, 0, .55, .2)
    }

    .mat-form-field.mat-focused .mat-form-field-ripple,
    .mat-form-field.mat-form-field-invalid .mat-form-field-ripple {
        opacity: 1;
        transform: scaleX(1);
        transition: transform .3s cubic-bezier(.25, .8, .25, 1), opacity .1s cubic-bezier(.25, .8, .25, 1), background-color .3s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-subscript-wrapper {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        overflow: hidden
    }

    .mat-form-field-label-wrapper .mat-icon,
    .mat-form-field-subscript-wrapper .mat-icon {
        width: 1em;
        height: 1em;
        font-size: inherit;
        vertical-align: baseline
    }

    .mat-form-field-hint-wrapper {
        display: flex
    }

    .mat-form-field-hint-spacer {
        flex: 1 0 1em
    }

    .mat-error {
        display: block
    }

    .mat-form-field._mat-animation-noopable .mat-form-field-label,
    .mat-form-field._mat-animation-noopable .mat-form-field-ripple {
        transition: none
    }

</style>
<style>
    .mat-form-field-appearance-fill .mat-form-field-flex {
        border-radius: 4px 4px 0 0;
        padding: .75em .75em 0 .75em
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-appearance-fill .mat-form-field-flex {
            outline: solid 1px
        }
    }

    .mat-form-field-appearance-fill .mat-form-field-underline::before {
        content: '';
        display: block;
        position: absolute;
        bottom: 0;
        height: 1px;
        width: 100%
    }

    .mat-form-field-appearance-fill .mat-form-field-ripple {
        bottom: 0;
        height: 2px
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-appearance-fill .mat-form-field-ripple {
            height: 0;
            border-top: solid 2px
        }
    }

    .mat-form-field-appearance-fill:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
        opacity: 1;
        transform: none;
        transition: opacity .6s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-appearance-fill._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
        transition: none
    }

    .mat-form-field-appearance-fill .mat-form-field-subscript-wrapper {
        padding: 0 1em
    }

</style>
<style>
    .mat-form-field-appearance-legacy .mat-form-field-label {
        transform: perspective(100px);
        -ms-transform: none
    }

    .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon,
    .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon {
        width: 1em
    }

    .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button,
    .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button {
        font: inherit;
        vertical-align: baseline
    }

    .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button .mat-icon,
    .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button .mat-icon {
        font-size: inherit
    }

    .mat-form-field-appearance-legacy .mat-form-field-underline {
        height: 1px
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-appearance-legacy .mat-form-field-underline {
            height: 0;
            border-top: solid 1px
        }
    }

    .mat-form-field-appearance-legacy .mat-form-field-ripple {
        top: 0;
        height: 2px;
        overflow: hidden
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-appearance-legacy .mat-form-field-ripple {
            height: 0;
            border-top: solid 2px
        }
    }

    .mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline {
        background-position: 0;
        background-color: transparent
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline {
            border-top-style: dotted;
            border-top-width: 2px
        }
    }

    .mat-form-field-appearance-legacy.mat-form-field-invalid:not(.mat-focused) .mat-form-field-ripple {
        height: 1px
    }

</style>
<style>
    .mat-form-field-appearance-outline .mat-form-field-wrapper {
        margin: .25em 0
    }

    .mat-form-field-appearance-outline .mat-form-field-flex {
        padding: 0 .75em 0 .75em;
        margin-top: -.25em;
        position: relative
    }

    .mat-form-field-appearance-outline .mat-form-field-prefix,
    .mat-form-field-appearance-outline .mat-form-field-suffix {
        top: .25em
    }

    .mat-form-field-appearance-outline .mat-form-field-outline {
        display: flex;
        position: absolute;
        top: .25em;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-end,
    .mat-form-field-appearance-outline .mat-form-field-outline-start {
        border: 1px solid currentColor;
        min-width: 5px
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-start {
        border-radius: 5px 0 0 5px;
        border-right-style: none
    }

    [dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-start {
        border-right-style: solid;
        border-left-style: none;
        border-radius: 0 5px 5px 0
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-end {
        border-radius: 0 5px 5px 0;
        border-left-style: none;
        flex-grow: 1
    }

    [dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-end {
        border-left-style: solid;
        border-right-style: none;
        border-radius: 5px 0 0 5px
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-gap {
        border-radius: .000001px;
        border: 1px solid currentColor;
        border-left-style: none;
        border-right-style: none
    }

    .mat-form-field-appearance-outline.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-outline-gap {
        border-top-color: transparent
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-thick {
        opacity: 0
    }

    .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-end,
    .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-gap,
    .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-start {
        border-width: 2px;
        transition: border-color .3s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-appearance-outline.mat-focused .mat-form-field-outline,
    .mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline {
        opacity: 0;
        transition: opacity .1s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-appearance-outline.mat-focused .mat-form-field-outline-thick,
    .mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline-thick {
        opacity: 1
    }

    .mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline {
        opacity: 0;
        transition: opacity .6s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline-thick {
        opacity: 1
    }

    .mat-form-field-appearance-outline .mat-form-field-subscript-wrapper {
        padding: 0 1em
    }

    .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline,
    .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-end,
    .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-gap,
    .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-start,
    .mat-form-field-appearance-outline._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-outline {
        transition: none
    }

</style>
<style>
    .mat-input-element {
        font: inherit;
        background: 0 0;
        color: currentColor;
        border: none;
        outline: 0;
        padding: 0;
        margin: 0;
        width: 100%;
        max-width: 100%;
        vertical-align: bottom;
        text-align: inherit
    }

    .mat-input-element:-moz-ui-invalid {
        box-shadow: none
    }

    .mat-input-element::-ms-clear,
    .mat-input-element::-ms-reveal {
        display: none
    }

    .mat-input-element,
    .mat-input-element::-webkit-search-cancel-button,
    .mat-input-element::-webkit-search-decoration,
    .mat-input-element::-webkit-search-results-button,
    .mat-input-element::-webkit-search-results-decoration {
        -webkit-appearance: none
    }

    .mat-input-element::-webkit-caps-lock-indicator,
    .mat-input-element::-webkit-contacts-auto-fill-button,
    .mat-input-element::-webkit-credentials-auto-fill-button {
        visibility: hidden
    }

    .mat-input-element[type=date]::after,
    .mat-input-element[type=datetime-local]::after,
    .mat-input-element[type=datetime]::after,
    .mat-input-element[type=month]::after,
    .mat-input-element[type=time]::after,
    .mat-input-element[type=week]::after {
        content: ' ';
        white-space: pre;
        width: 1px
    }

    .mat-input-element::placeholder {
        transition: color .4s .133s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-input-element::-moz-placeholder {
        transition: color .4s .133s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-input-element::-webkit-input-placeholder {
        transition: color .4s .133s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-input-element:-ms-input-placeholder {
        transition: color .4s .133s cubic-bezier(.25, .8, .25, 1)
    }

    .mat-form-field-hide-placeholder .mat-input-element::placeholder {
        color: transparent !important;
        -webkit-text-fill-color: transparent;
        transition: none
    }

    .mat-form-field-hide-placeholder .mat-input-element::-moz-placeholder {
        color: transparent !important;
        -webkit-text-fill-color: transparent;
        transition: none
    }

    .mat-form-field-hide-placeholder .mat-input-element::-webkit-input-placeholder {
        color: transparent !important;
        -webkit-text-fill-color: transparent;
        transition: none
    }

    .mat-form-field-hide-placeholder .mat-input-element:-ms-input-placeholder {
        color: transparent !important;
        -webkit-text-fill-color: transparent;
        transition: none
    }

    textarea.mat-input-element {
        resize: vertical;
        overflow: auto
    }

    textarea.mat-input-element.cdk-textarea-autosize {
        resize: none
    }

    textarea.mat-input-element {
        padding: 2px 0;
        margin: -2px 0
    }

</style>
<style>
    .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-datepicker-toggle-default-icon,
    .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-datepicker-toggle-default-icon {
        width: 1em
    }

    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-datepicker-toggle-default-icon,
    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-datepicker-toggle-default-icon {
        display: block;
        width: 1.5em;
        height: 1.5em
    }

    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button .mat-datepicker-toggle-default-icon,
    .mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button .mat-datepicker-toggle-default-icon {
        margin: auto
    }

</style>
<style>
    .mat-step-header {
        overflow: hidden;
        outline: 0;
        cursor: pointer;
        position: relative;
        box-sizing: content-box;
        -webkit-tap-highlight-color: transparent
    }

    .mat-step-optional {
        font-size: 12px
    }

    .mat-step-icon,
    .mat-step-icon-not-touched {
        border-radius: 50%;
        height: 24px;
        width: 24px;
        flex-shrink: 0;
        position: relative
    }

    .mat-step-icon-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .mat-step-icon .mat-icon {
        font-size: 16px;
        height: 16px;
        width: 16px
    }

    .mat-step-label {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        min-width: 50px;
        vertical-align: middle
    }

    .mat-step-text-label {
        text-overflow: ellipsis;
        overflow: hidden
    }

    .mat-step-header-ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none
    }

</style>
<style>
    .navbar-container[_ngcontent-c10] {
        background: #e8e9ea;
        height: 40px
    }

    .navbar-container[_ngcontent-c10] .none-sidebar[_ngcontent-c10] {
        display: inline-block;
        padding: 0
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] {
        padding-left: 45px;
        margin: 0;
        line-height: 40px
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10] {
        float: left
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10] img[_ngcontent-c10] {
        width: 20px;
        position: relative;
        color: #06274f
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li.active[_ngcontent-c10],
    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10]:hover {
        background-color: #cecece
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10] a[_ngcontent-c10] {
        color: #06274f
    }

    .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10] a[_ngcontent-c10] span[_ngcontent-c10] {
        display: block
    }

    .mat-button[_ngcontent-c10] {
        min-width: 0;
        padding-top: 2.25px;
        padding-bottom: 1.25px;
        border-radius: 0;
        line-height: 35px
    }

    .img[_ngcontent-c10] {
        width: 27px;
        height: 19px;
        display: none;
        background-repeat: no-repeat
    }

    @media only screen and (max-width:767px) {
        .navbar-container[_ngcontent-c10] .none-sidebar[_ngcontent-c10] {
            padding-left: 22px !important
        }

        .navbar-container[_ngcontent-c10] ul.menu-left[_ngcontent-c10] li[_ngcontent-c10] a[_ngcontent-c10] span[_ngcontent-c10] {
            display: none
        }

        .img[_ngcontent-c10] {
            display: inline-block
        }
    }

</style>
<style>
    @font-face {
        font-family: UTM_AvoBold;
        /* src: url(UTM_AvoBold.4e22c697b31728d0ad4f.ttf) */
    }

    #logo[_ngcontent-c15] {
        text-align: center;
        background-color: #0a76b1;
        padding-bottom: 1rem
    }

    .modal-header[_ngcontent-c15] {
        background-color: transparent;
        color: #142b50;
        padding: 20px 35px 10px;
        border: 0
    }

    .modal-header[_ngcontent-c15] .ca-nhan[_ngcontent-c15] span[_ngcontent-c15],
    .modal-header[_ngcontent-c15] .to-chuc[_ngcontent-c15] span[_ngcontent-c15] {
        color: #002a5a !important;
        font-size: 14px !important
    }

    .modal-body[_ngcontent-c15] {
        padding: 10px 35px 20px;
        background: #fff;
        position: relative
    }

    #logo[_ngcontent-c15] div[_ngcontent-c15] {
        max-width: 46%;
        margin: auto;
        border: 5px solid #fff;
        border-radius: 50%
    }

    input[_ngcontent-c15] {
        width: 100%;
        font-size: 1.5rem
    }

    .mat-dialog-content[_ngcontent-c15] {
        text-align: center;
        overflow: visible;
        margin: -24px !important;
        padding: 0 !important
    }

    mat-form-field[_ngcontent-c15] {
        width: 100%
    }

    #phanloaitk[_ngcontent-c15] {
        text-align: right;
        -webkit-transform: translateX(-20px);
        transform: translateX(-20px);
        padding-top: 1rem
    }

    .forgotpassword[_ngcontent-c15] span[_ngcontent-c15] {
        cursor: pointer;
        font-size: 14px;
        color: #002a5a
    }

    #phanloaitk[_ngcontent-c15],
    #phanloaitk[_ngcontent-c15] mat-radio-button[_ngcontent-c15]:last-child,
    mat-error[_ngcontent-c15] {
        padding-left: 5%
    }

    @media (min-width:768px) {
        .fa[_ngcontent-c15] {
            font-size: 1.5rem
        }
    }

    @media (max-width:767px) {
        input[_ngcontent-c15] {
            font-size: 1rem
        }
    }

    .checkbox[_ngcontent-c15] {
        position: relative;
        display: block;
        margin-top: 10px;
        margin-bottom: 10px
    }

    .checkbox[_ngcontent-c15] .mat-checkbox-label[_ngcontent-c15] {
        font-size: 14px;
        color: #002a5a;
        min-height: 20px;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: 400;
        cursor: pointer
    }

    .checkbox[_ngcontent-c15] p[_ngcontent-c15] {
        color: #1b7bd0;
        font-family: UTM_AvoBold;
        font-size: 18px;
        position: relative;
        bottom: 4px;
        white-space: nowrap
    }

    .icon[_ngcontent-c15] {
        height: 20px;
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px)
    }

    .captcha[_ngcontent-c15] {
        height: 61px
    }

    .captcha[_ngcontent-c15] .captcha-img[_ngcontent-c15] {
        width: calc(100% - 70px);
        display: inline-block;
        height: 100%
    }

    .captcha[_ngcontent-c15] .captcha-img[_ngcontent-c15] img[_ngcontent-c15] {
        width: 100%;
        height: 100%
    }

    .captcha[_ngcontent-c15] .refresh[_ngcontent-c15] {
        width: 65px;
        display: inline-block
    }

    .login[_ngcontent-c15],
    .register[_ngcontent-c15] {
        width: 50%;
        border: 0;
        padding: 10px 0;
        color: #002a5a;
        font-size: 16px;
        height: 42px;
        line-height: normal;
        border-radius: 0
    }

    #cdk-overlay-0[_ngcontent-c15] {
        position: relative
    }

    .modal-footer[_ngcontent-c15] {
        border: 0;
        padding: 10px 0 0
    }

    .modal-footer[_ngcontent-c15] .register[_ngcontent-c15] {
        background: #cbcbcb !important;
        color: #002a5a !important;
        margin-left: -4px !important
    }

    .modal-footer[_ngcontent-c15] .login[_ngcontent-c15] {
        background: #0f8ee7 !important;
        color: #fff !important;
        margin-left: -4px !important;
        margin-right: 0
    }

    .modal-footer[_ngcontent-c15] .login-dvcqg[_ngcontent-c15] {
        white-space: break-word;
        width: 100%;
        height: 100%;
        padding: 10px 0 8px
    }

    .modal-footer[_ngcontent-c15] .login-dvcqg[_ngcontent-c15] .logo-dvcqg[_ngcontent-c15] {
        height: 26px;
        margin-right: 10px
    }

    .modal-footer[_ngcontent-c15] .login-vneid[_ngcontent-c15] {
        white-space: break-word;
        width: 100%;
        height: 100%;
        padding: 10px 0 8px
    }

    .modal-footer[_ngcontent-c15] .login-vneid[_ngcontent-c15] .logo-vneid[_ngcontent-c15] {
        height: 50px;
        margin-right: 10px
    }

    .modal-footer[_ngcontent-c15] .login-vneid[_ngcontent-c15] span[_ngcontent-c15] {
        display: inline-flex
    }

    .modal-footer[_ngcontent-c15] .login-vneid[color=warn][_ngcontent-c15] {
        background-color: #ba1a1a !important
    }

    .modal-footer[_ngcontent-c15]:nth-last-of-type(1) {
        padding-bottom: 10px
    }

    @media all and (max-width:576px) {
        .modal-header[_ngcontent-c15] {
            padding: 20px 15px 10px;
            display: block
        }

        .modal-header[_ngcontent-c15] .ca-nhan[_ngcontent-c15],
        .modal-header[_ngcontent-c15] .to-chuc[_ngcontent-c15] {
            text-align: left !important;
            width: 50%;
            display: inline-block
        }

        .modal-body[_ngcontent-c15] {
            padding: 10px 15px 20px
        }

        .title-login[_ngcontent-c15] {
            text-align: left
        }
    }

</style>
<style>
    @keyframes mat-checkbox-fade-in-background {
        0% {
            opacity: 0
        }

        50% {
            opacity: 1
        }
    }

    @keyframes mat-checkbox-fade-out-background {

        0%,
        50% {
            opacity: 1
        }

        100% {
            opacity: 0
        }
    }

    @keyframes mat-checkbox-unchecked-checked-checkmark-path {

        0%,
        50% {
            stroke-dashoffset: 22.91026
        }

        50% {
            animation-timing-function: cubic-bezier(0, 0, .2, .1)
        }

        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes mat-checkbox-unchecked-indeterminate-mixedmark {

        0%,
        68.2% {
            transform: scaleX(0)
        }

        68.2% {
            animation-timing-function: cubic-bezier(0, 0, 0, 1)
        }

        100% {
            transform: scaleX(1)
        }
    }

    @keyframes mat-checkbox-checked-unchecked-checkmark-path {
        from {
            animation-timing-function: cubic-bezier(.4, 0, 1, 1);
            stroke-dashoffset: 0
        }

        to {
            stroke-dashoffset: -22.91026
        }
    }

    @keyframes mat-checkbox-checked-indeterminate-checkmark {
        from {
            animation-timing-function: cubic-bezier(0, 0, .2, .1);
            opacity: 1;
            transform: rotate(0)
        }

        to {
            opacity: 0;
            transform: rotate(45deg)
        }
    }

    @keyframes mat-checkbox-indeterminate-checked-checkmark {
        from {
            animation-timing-function: cubic-bezier(.14, 0, 0, 1);
            opacity: 0;
            transform: rotate(45deg)
        }

        to {
            opacity: 1;
            transform: rotate(360deg)
        }
    }

    @keyframes mat-checkbox-checked-indeterminate-mixedmark {
        from {
            animation-timing-function: cubic-bezier(0, 0, .2, .1);
            opacity: 0;
            transform: rotate(-45deg)
        }

        to {
            opacity: 1;
            transform: rotate(0)
        }
    }

    @keyframes mat-checkbox-indeterminate-checked-mixedmark {
        from {
            animation-timing-function: cubic-bezier(.14, 0, 0, 1);
            opacity: 1;
            transform: rotate(0)
        }

        to {
            opacity: 0;
            transform: rotate(315deg)
        }
    }

    @keyframes mat-checkbox-indeterminate-unchecked-mixedmark {
        0% {
            animation-timing-function: linear;
            opacity: 1;
            transform: scaleX(1)
        }

        100%,
        32.8% {
            opacity: 0;
            transform: scaleX(0)
        }
    }

    .mat-checkbox-checkmark,
    .mat-checkbox-mixedmark {
        width: calc(100% - 4px)
    }

    .mat-checkbox-background,
    .mat-checkbox-frame {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        border-radius: 2px;
        box-sizing: border-box;
        pointer-events: none
    }

    .mat-checkbox {
        transition: background .4s cubic-bezier(.25, .8, .25, 1), box-shadow 280ms cubic-bezier(.4, 0, .2, 1);
        cursor: pointer;
        -webkit-tap-highlight-color: transparent
    }

    ._mat-animation-noopable.mat-checkbox {
        transition: none;
        animation: none
    }

    .mat-checkbox-layout {
        cursor: inherit;
        align-items: baseline;
        vertical-align: middle;
        display: inline-flex;
        white-space: nowrap
    }

    .mat-checkbox-inner-container {
        display: inline-block;
        height: 20px;
        line-height: 0;
        margin: auto;
        margin-right: 8px;
        order: 0;
        position: relative;
        vertical-align: middle;
        white-space: nowrap;
        width: 20px;
        flex-shrink: 0
    }

    [dir=rtl] .mat-checkbox-inner-container {
        margin-left: 8px;
        margin-right: auto
    }

    .mat-checkbox-inner-container-no-side-margin {
        margin-left: 0;
        margin-right: 0
    }

    .mat-checkbox-frame {
        background-color: transparent;
        transition: border-color 90ms cubic-bezier(0, 0, .2, .1);
        border-width: 2px;
        border-style: solid
    }

    ._mat-animation-noopable .mat-checkbox-frame {
        transition: none
    }

    .mat-checkbox-background {
        align-items: center;
        display: inline-flex;
        justify-content: center;
        transition: background-color 90ms cubic-bezier(0, 0, .2, .1), opacity 90ms cubic-bezier(0, 0, .2, .1)
    }

    ._mat-animation-noopable .mat-checkbox-background {
        transition: none
    }

    .mat-checkbox-checkmark {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        width: 100%
    }

    .mat-checkbox-checkmark-path {
        stroke-dashoffset: 22.91026;
        stroke-dasharray: 22.91026;
        stroke-width: 2.66667px
    }

    .mat-checkbox-mixedmark {
        height: 2px;
        opacity: 0;
        transform: scaleX(0) rotate(0)
    }

    @media screen and (-ms-high-contrast:active) {
        .mat-checkbox-mixedmark {
            height: 0;
            border-top: solid 2px;
            margin-top: 2px
        }
    }

    .mat-checkbox-label-before .mat-checkbox-inner-container {
        order: 1;
        margin-left: 8px;
        margin-right: auto
    }

    [dir=rtl] .mat-checkbox-label-before .mat-checkbox-inner-container {
        margin-left: auto;
        margin-right: 8px
    }

    .mat-checkbox-checked .mat-checkbox-checkmark {
        opacity: 1
    }

    .mat-checkbox-checked .mat-checkbox-checkmark-path {
        stroke-dashoffset: 0
    }

    .mat-checkbox-checked .mat-checkbox-mixedmark {
        transform: scaleX(1) rotate(-45deg)
    }

    .mat-checkbox-indeterminate .mat-checkbox-checkmark {
        opacity: 0;
        transform: rotate(45deg)
    }

    .mat-checkbox-indeterminate .mat-checkbox-checkmark-path {
        stroke-dashoffset: 0
    }

    .mat-checkbox-indeterminate .mat-checkbox-mixedmark {
        opacity: 1;
        transform: scaleX(1) rotate(0)
    }

    .mat-checkbox-unchecked .mat-checkbox-background {
        background-color: transparent
    }

    .mat-checkbox-disabled {
        cursor: default
    }

    .mat-checkbox-anim-unchecked-checked .mat-checkbox-background {
        animation: 180ms linear 0s mat-checkbox-fade-in-background
    }

    .mat-checkbox-anim-unchecked-checked .mat-checkbox-checkmark-path {
        animation: 180ms linear 0s mat-checkbox-unchecked-checked-checkmark-path
    }

    .mat-checkbox-anim-unchecked-indeterminate .mat-checkbox-background {
        animation: 180ms linear 0s mat-checkbox-fade-in-background
    }

    .mat-checkbox-anim-unchecked-indeterminate .mat-checkbox-mixedmark {
        animation: 90ms linear 0s mat-checkbox-unchecked-indeterminate-mixedmark
    }

    .mat-checkbox-anim-checked-unchecked .mat-checkbox-background {
        animation: 180ms linear 0s mat-checkbox-fade-out-background
    }

    .mat-checkbox-anim-checked-unchecked .mat-checkbox-checkmark-path {
        animation: 90ms linear 0s mat-checkbox-checked-unchecked-checkmark-path
    }

    .mat-checkbox-anim-checked-indeterminate .mat-checkbox-checkmark {
        animation: 90ms linear 0s mat-checkbox-checked-indeterminate-checkmark
    }

    .mat-checkbox-anim-checked-indeterminate .mat-checkbox-mixedmark {
        animation: 90ms linear 0s mat-checkbox-checked-indeterminate-mixedmark
    }

    .mat-checkbox-anim-indeterminate-checked .mat-checkbox-checkmark {
        animation: .5s linear 0s mat-checkbox-indeterminate-checked-checkmark
    }

    .mat-checkbox-anim-indeterminate-checked .mat-checkbox-mixedmark {
        animation: .5s linear 0s mat-checkbox-indeterminate-checked-mixedmark
    }

    .mat-checkbox-anim-indeterminate-unchecked .mat-checkbox-background {
        animation: 180ms linear 0s mat-checkbox-fade-out-background
    }

    .mat-checkbox-anim-indeterminate-unchecked .mat-checkbox-mixedmark {
        animation: .3s linear 0s mat-checkbox-indeterminate-unchecked-mixedmark
    }

    .mat-checkbox-input {
        bottom: 0;
        left: 50%
    }

    .mat-checkbox-ripple {
        position: absolute;
        left: calc(50% - 25px);
        top: calc(50% - 25px);
        height: 50px;
        width: 50px;
        z-index: 1;
        pointer-events: none
    }

</style>
