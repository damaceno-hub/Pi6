<form class="form-signin auth_form" name="login" id="loginform" method="post" action="">

    <div class="text-center">
        <div class="logo">
            <img src="img/logo-oslog.png" class="img-fluid img-pointer"/>
            <ul>
                <li><a class="baixologo" href="index.php">Home</a></li>
                <li><a class="baixologo" href="index.php">Login</a></li>
            </ul>
        </div>
    </div>
    <br><br>

    <h2 class="title-pg color-white"><span class="text-light">Recuperar </span>Senha</h2>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="text" name="email" id="email" class="form-control" required="required" maxlength="50" placeholder="E-mail" autofocus="autofocus" />
    <button class="btn btn-lg btn-danger btn-block btn-color submit" type="submit" name="btnRec" value="Rec">Recuperar Senha</button>
    <input type="hidden" name="env" value="form">
    
    <p class="text-center text-success">
        <?php
            echo verifica_dados($conn);
        ?>
    </p>
</form>

<div class="col-md">
    <div class="text-center">
    
        <div>
            <!--inicio clock-->
            <div class="datetime">
                <div class="date">
                    <span id="dayname">Dia</span>,
                    <span id="daynum">00</span> de
                    <span id="month">Mes</span>,
                    <span id="year">Ano</span>
                </div>
                <div class="time">
                    <span id="hour">00</span>:
                    <span id="minutes">00</span>:
                    <span id="seconds">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
            <!--fim clock-->
        </div>
    </div>
</div>