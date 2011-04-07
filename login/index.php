<?php include '../header.php';?><html><head><script type="text/javascript" >
    var title = new blueTitle("Entrar");
</script>


<meta name="flux-custom-url" content="http://tfcdmt/login/" ></head><body><div id="container" >

<div style="clear:both; " ><div></div></div>


<div class="content" >
    <div class="contentbox" >
        <?php
        if(count($error)) {

            ?>
        <div class="smb" >
<b class="smb_rb" >
<b class="smb_rb1" ><b></b></b>
<b class="smb_rb2" ><b></b></b>
<b class="smb_rb3" ></b>
<b class="smb_rb4" ></b>
<b class="smb_rb5" ></b>
</b>
<div class="smb_rbcontent" >
	<table>
	<tbody><tr>
		<td class="smb_ico" ><img src="http://static.rememberthemilk.com/img/ico/ico_exclaim_org_org.gif" alt="Warning" ></td>
                <td class="smb_msg" >Lo sentimos, el registro no se ha podido relizar. Por favor inténtalo de nuevo. Si has olvidado tu contraseña siempre puedes <a href="/login/forgot.php" >cambiarla</a>.</td>
	</tr>
	</tbody></table>
</div>
<b class="smb_rb" >
<b class="smb_rb5" ></b>
<b class="smb_rb4" ></b>
<b class="smb_rb3" ></b>
<b class="smb_rb2" ><b></b></b>
<b class="smb_rb1" ><b></b></b>
</b>
</div>

        <?php
        }

        ?>
<div class="contentboxwrap" >

        <form id="loginform" method="post" action="" >
        <table>
		<tbody><tr>
			<td class="label" ><label id="lUsername" for="username" >Usuario</label></td>
                        <td class="field" ><input id="username" name="username" type="text" class="textfield" style="width:18.5em; " value="<?php echo (isset($_POST['username']))?$_POST['username']:''; ?>" /></td>
			<td class="status" ><span id="usernameStatus" ></span></td>
		</tr>
		<tr>
                    <td class="label" ><label id="lPassword" for="password" >Contraseña</label></td>
                    <td class="field" ><input id="password" name="password" type="password" class="textfield" style="width:18.5em; " /></td>
			<td class="status" ><span id="passwordStatus" ></span></td>
		</tr>
		<tr>
			<td class="hiddenlabel" ><label></label></td>
			<td class="field" colspan="2" >
                            <input id="remember" name="rememberMe" type="checkbox" value="1" />
			<label id="lRemember" for="rememberMe" style="font-weight:normal; padding-left:3px; " >Recordarme en este equipo</label>
			</td>
		</tr>
		<tr>
			<td class="hiddenlabel" ><label for="loginsubmit" >Entrar</label></td>
			<td class="field" colspan="2" >
			<input id="loginsubmit" name="submit" value="Entrar" type="submit" />
                        <span style="padding-left:3px; " ><a href="/login/forgot.php" >¿Olvidaste tu contraseña?</a></span>
			</td>
		</tr>

<tr>
	<td class="hiddenlabel" ><label></label></td>
	<td class="field" colspan="2" style="padding-top:15px; " >
	</td>
</tr>
		</tbody></table>

		<input name="continue" value="home" type="hidden" />
																<input name="u" type="hidden" value="1" />
        </form>

	</div>
    </div>
    </div>
</div>




</body></html>