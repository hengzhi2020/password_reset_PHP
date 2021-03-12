<style type="text/css">
    .std-body {
        margin-top: 50px;
        margin-left: 50px;
        background-color: #F5F5F5;
    }

    .std-body-text {
        font-family: arial;
        font-weight: 400;
        size: 14px;
        color: #555555;
    }

    .std-button {
        font-family: arial;
        font-size: 14px;
        font-weight: 700;
        padding-top: 5px;
        padding-right: 10px;
        padding-bottom: 5px;
        padding-left: 10px;
        width: 80px;
        color: #FFFFFF;
        background-color: #007FAA;
        border: none;
    }

    .std-link {
        font-family: arial;
        font-weight: 400;
        font-size: 14px;
        color: #004C97;
    }

    .std-link:hover {
        font-family: arial;
        font-weight: 400;
        font-size: 14px;
        color: #112E51;
        text-decoration: underline;
    }

    #email-head {
        background-color: #ED5565;
        color: black;
        font-family: arial;
        font-size: 20px;
        width: 290px;
        height: 50px;
        padding-left: 30px;
        padding-top: 25px;
    }

    #email-confirm {
        background-color: #ED5565;
        color: black;
        font-family: arial;
        font-size: 20px;
        width: 400px;
        height: 50px;
        padding-left: 30px;
        padding-top: 25px;
    }

    #reset-head {
        background-color: #ED5565;
        color: black;
        font-family: arial;
        font-size: 20px;
        width: 300px;
        height: 50px;
        padding-left: 1px;
        padding-top: 25px;
    }

    #cmp-button {
        padding: 10px;
        width: 400px;
        height: 230px;
        background-color: #FFFFFF;
        border: none;
    }

    #cnstr-region {
        font-family: arial;
        padding: 1px;
        width: 520px;
        height: 185px;
        background-color: #F3DFE1;
        border: none;
    }

    .cnstr-alert {
        font-family: arial;
        font-size: 13px;
        color: #F3DFE1;

    }

    .enter-pass-row {
        padding-top: 6px
    }

    /*
    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
    }
*/
    /* Style the submit button */
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
    }

    /* Style the container for inputs */
    .container {
        background-color: #f1f1f1;
        padding: 20px;
    }

    /* The message1 box is shown when the user clicks on the password field */
    #message1 {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        margin-top: 20px;
        margin-left: 20px;
        padding-top: 5px;
        padding-bottom: 15px;
    }

    #message2 {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        margin-top: 20px;
        margin-left: 20px;
        padding-top: 5px;
        padding-bottom: 15px;
    }

    #message1 p {
        padding: 5px 15px;
        font-size: 16px;
        margin-top: 5px;
        margin-left: 40px;
    }

    #message1 h3 {
        padding: 5px 15px;
        margin-top: 5px;
        margin-left: 5px;
    }

    #message2 p {
        padding: 5px 15px;
        font-size: 16px;
        margin-top: 5px;
        margin-left: 40px;
    }

    #message2 h3 {
        padding: 5px 15px;
        margin-top: 5px;
        margin-left: 5px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
    }
</style>