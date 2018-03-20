
<head>
    <link rel="stylesheet" href="stylesheets/main.css">
</head>

<body class="body">

    <div id="gmap" style="top:.5px">
        <div id="gmap-draw">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d448.5920350631842!2d-116.203811!3d43.605593!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1518656799172" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>



        </div>
        <div id="gmap-content">
            <div class="signIn">
                <div id="container" >
                    <div id="content">
<!--                        <form>-->
                        <form name="form" action="/outPut.php" method="POST">
<!--                            <form name="frm" action="/user.php" method="POST">-->
<!--#sql           allow a user to sign in so check with sql to see if a entry exists with user and password the same-->
<!--                            also renavigate-->
                            <input type="text" placeholder="username" class="text_box" name="username"><br>
                            <input type="text" placeholder="email" class="text_box" name="email"><br>
                            <input type="password" placeholder="password" class="text_box" name="password"><br>
                            <input type="submit" class="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacedFooter">
        <span>&copy Kepa Totorica</span>
        <span>(208)599-5425</span>

    </div>

</body>

