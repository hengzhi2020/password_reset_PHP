<html lang="en">

<head>
    <title>test</title>
</head>

<body>
    <style>
        input {
            background-color: yellow;
        }

        #message {
            display: none;
        }

        #message p {
            font-size: 18px;
        }

        .valid {
            color: green;
        }

        .valid:before {
            padding-left: 5px;
            padding-right: 10px;
            content: "\2713"
        }

        .invalid {
            color: red;
        }

        .invalid:before {
            padding-left: 5px;
            padding-right: 10px;
            content: "x"
        }
    </style>

    <h2>hello</h2>

    username: <input type='text'><br><br>
    password: <input type='passwsord' id="password">
    <hr>
    <div id="message">
        <p id="letter" class="invalid">Letters in lowercase</p>
        <p id="number" class="invalid">Numbers</p>
    </div>

    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var number = document.getElementById("number");

        myInput.onfocus = () => {
            document.getElementById("message").style.display = "block";
        }
        myInput.onblur = () => {
            document.getElementById("message").style.display = "none";
        }
        myInput.onkeyup = () => {
            var lowerCaseLetter = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetter)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            var numberIn = /[0-9]/g;
            if (myInput.value.match(numberIn)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
        }
    </script>
</body>

</html>